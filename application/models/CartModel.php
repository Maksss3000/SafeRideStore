<?php

namespace application\models;

use application\core\Model;


class CartModel extends Model
{
    /**
     * Function Deliting product from User`s Cart in Data Base.
     * @param  $productId Product with this id will be deleted.
     * @return string $userName User Name of Customer.
     */
    public function deleteProductFromCart($producId, $userName)
    {
        $this->db->query("DELETE FROM  products_in_cart WHERE cartId=(SELECT cartId FROM carts WHERE userName=:userName) AND productId=:producId", ["userName" => $userName, "producId" => $producId]);

        $this->updateCartTotal($userName);
    }

    /**
     * Function Updating Count of Product in Data Base.
     * @param $productId  Id of Product to update.
     * @param string $userName Customer`s User Name.
     * @param $quantity Product`s new Quantity in Cart.
     */
    public function updateCartDb($producId, $userName, $quantity)
    {
        $this->db->query(
            "UPDATE products_in_cart
           SET quantity =:quantity
           WHERE productId=:productId AND cartId=(SELECT cartId FROM carts WHERE userName=:userName)",
            ["productId" => $producId, "userName" => $userName, "quantity" => $quantity]
        );
        $this->updateCartTotal($userName);
    }
    /**
     * Function Adding new product to Cart of Customer in Data Base.
     * @param $producId Id of Product that will be Added to Customer Cart in Data Base.
     * @param string $userName User Name of cusromer.
     * @param $quantity Quantity of specific product.
     */
    public function addProductTocartDb($producId, $userName, $quantity)
    {
        $this->db->query("INSERT INTO  products_in_cart (cartId,productId,quantity) VALUES ((SELECT cartId FROM carts WHERE userName=:userName),:producId, :quantity)", ["userName" => $userName, "producId" => $producId, "quantity" => $quantity]);
        $this->updateCartTotal($userName);
    }
    /**
     * Function get`s product data and check`s if this product is in Stock.
     * @param  $id Specific Product Id.
     * @param string $color Color of Product.
     * @param string $size Size of Product.
     * @return   'ProductInStock Id and Amount if Product exist`s or Null if Not.
     */
    public function productInStock($id, $color, $size)
    {
        $result = $this->db->row("SELECT inStockId,amount FROM in_stock WHERE productId=:productId And color=:color AND size=:size", ["productId" => $id, "color" => $color, "size" => $size]);
        if ($result) #if result returned there is only one row 
            return  $result[0];
        return null;
    }

    /**
     * Function Updating Total Price in Cart with discount`s and VAT.
     * @param string $userName User Name of customer.
     */
    public function updateCartTotal($userName)
    {
        $totalAmount = 0;
        foreach ($_SESSION['products'] as $id => $quanity) {
            $data = ($this->db->row("SELECT price,discount FROM products  WHERE productId=(SELECT productId FROM in_stock WHERE inStockId=:inStockId)", ["inStockId" => $id]))[0];
            $price = ($data['price'] - $data['price'] * $data['discount'] / 100) * $quanity;
            $totalAmount += $price;
        }


        $this->db->query(
            "UPDATE carts
         SET totalAmount =:totalAmount
         WHERE  cartId=(SELECT * FROM (SELECT cartId FROM carts WHERE userName=:userName) as id)",
            ["userName" => $userName, "totalAmount" => $totalAmount]
        );
    }
    /**
     * Function return total Amount of Product`s in specific Cart.
     * @param string $userName User Name of customer.
     * @return ' Total Amount of products in Customer Cart.
     */
    public function getCartTotal($userName)
    {
        return $this->db->column("SELECT totalAmount FROM carts WHERE cartId= (SELECT cartId FROM carts WHERE userName=:userName) ", ["userName" => $userName]);
    }
}
