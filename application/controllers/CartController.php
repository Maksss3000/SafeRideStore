<?php

namespace application\controllers;

use application\core\Controller;
use application\components\Cart;
use application\models\ProductsModel;

class CartController extends Controller
{
    /**
     * Action for cart Page.
     */
    public function cartAction()
    {
        $vars = array();
        //Getting Data of products in specific Cart.
        $vars['products'] = $this->getProductsData();
        $this->view->render('cart', $vars);
    }
    /**
     * Function get`s relevant data for products in cart.
     * @return array $productsData products data in cart.
     */
    public function getProductsData()
    {
        $productsInCart = Cart::getProducts();
        $productsData = array();
        //If cart not empty getting products data.
        if ($productsInCart) {
            //Getting array of products id`s (ids from in_stock table )
            $productsIds = array_keys($productsInCart);
            $productsData = (new ProductsModel)->getProdustsDitailsByIds($productsIds);
        }
        return $productsData;
    }
    /**
     * Action for Adding Product to cart(using Ajax).
     */
    public function addAjaxAction()
    {
        if (Cart::checkLoged()) {
            //Convert to int
            $productId = intval($this->route['id']);
            $amount = intval($this->route['amount']);
            $color = $this->route['color'];
            $size = $this->route['size'];
            echo ' (' . $this->addProduct($productId, $amount, $color, $size) . ')'; # quantity of products after adding
        } else
            echo "(0) <script>window.alert('Plese log-in to add product to your cart')</script>";
    }
    /**
     * Action for increase quantity of product in Cart(using Ajax)
     */
    public function incAjaxAction()
    {
        $productsData = $this->getProductsData();
        $id = intval($this->route['id']);
        $_SESSION['products'][$id]++;
        $this->model->updateCartDb($id,  $_SESSION['userName'], $_SESSION['products'][$id]);
        echo ' ' . Cart::quatityChangeRet($productsData) . ' ';
    }
    /**
     * Action for decrease quantity of poduct in Cart(using Ajax)
     */
    public function decAjaxAction()
    {
        $productsData = $this->getProductsData();
        $id = intval($this->route['id']);  #inStock id
        $_SESSION['products'][$id]--;
        $this->model->updateCartDb($id,  $_SESSION['userName'], $_SESSION['products'][$id]);
        echo ' ' . Cart::quatityChangeRet($productsData) . ' ';
    }

    /**
     * Action to Delete product from cart.
     */
    public function deleteAction()
    {
        Cart::deleteProduct($this->route['id']);
        $this->model->deleteProductFromCart(intval($this->route['id']), $_SESSION['userName']);
        header("Location: /SafeRideStore/cart");
    }
    /**
     * Function Adding Product to Customer`s Cart if Product in Stock. 
     * @param $productId-Id Of Product that Customer want to Add.
     * @param $quantity -Amount of Product that Customer want to Add.
     * @param $color-Product Color.
     * @param $size -Product Size.
     * @return int 'Amount of Product`s in Customer`s Cart,after adding new Product.
     */
    private function addProduct($productId, $quantity, $color, $size)
    {
        //Get`s id and quantity of product in stock.
        $inStock = $this->model->ProductInStock($productId,  $color, $size);
        if ($inStock != null && $inStock['amount'] > 0) {
            $productsInCart = array();
            // Check if there is products in cart (session)
            if (isset($_SESSION['products'])) {
                $productsInCart = $_SESSION['products'];
            }
            // Check if this product is already in cart.
            if (array_key_exists($inStock['inStockId'], $productsInCart)) {
                $productsInCart[$inStock['inStockId']] += $quantity;
                $_SESSION['products'] = $productsInCart;
                $this->model->updateCartDb($inStock['inStockId'],  $_SESSION['userName'],  $productsInCart[$inStock['inStockId']]);
            } else
            //Product not in Cart,Customer add Product first time to Cart.
            {
                $productsInCart[$inStock['inStockId']] = $quantity;
                $_SESSION['products'] = $productsInCart;
                $this->model->addProductTocartDb($inStock['inStockId'],  $_SESSION['userName'], $productsInCart[$inStock['inStockId']]);
            }

            echo "<script>window.alert('product added to cart')</script>";
        } else
            echo "<script>window.alert('SORRY,this product out of stock')  </script>";
        return Cart::countItems();
    }
}
