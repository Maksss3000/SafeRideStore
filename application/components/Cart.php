<?php

/**
 * Class Cart
 *Includes static function`s for work with cart 
 */

namespace application\components;

use application\lib\Db;
use application\models\AdminModel;
use application\models\CartModel;

abstract class Cart
{


    //Function Count`s product`s in cart.
    public static function countItems()
    {
        //Check if there is product`s in ssesion.
        if (isset($_SESSION['products'])) {
            //Count how many product`s in ssesion.
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            //If there is no products return 0
            return 0;
        }
    }
    //Function return`s all products in cart.
    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }
    /**
     * Function to Delete product from cart.
     * @param  $id Id of Product to Delete.
     */
    public static function deleteProduct($id)
    {
        // Get array with ids and quantity of products in cart
        $productsInCart = self::getProducts();
        // Delete from array element with specified id.
        unset($productsInCart[$id]);
        $_SESSION['products'] = $productsInCart;
    }

    //Function returns total price of poducts in cart.
    public static function totalPrice()
    {
        return (new CartModel)->getCartTotal($_SESSION['userName']);
    }
    public static function priceNoVat()
    {
        $vat = self::getVat();
        $total = self::totalPrice();

        return round(($total / (1 + $vat)), 2);
    }

    /**
     * Function checking if User was verified(Logged-In).
     * @return boolean True-User Logged-In,else-False.
     */
    public static function checkLoged()
    {
        if (isset($_SESSION['fullName']))
            return true;
        return false;
    }
    public static function getVat()
    {
        return (new Db)->column("SELECT vat FROM tax") / 100;
    }
    public static function setVat($value)
    {
        return (new Db)->query("UPDATE tax SET vat=:vat", ["vat" => $value]);
    }
    public static function calVat()
    {
        return (round(self::priceNoVat() * self::getVat(), 2));
    }
    public static function quatityChangeRet()
    {
        $subTotal = self::priceNoVat();
        $output = array(
            'totalPrice' => self::TotalPrice(),
            'subTotal'  => $subTotal,
            'vat' => self::calVat(),
            'totalItems'  => self::countItems()
        );
        return json_encode($output);
    }
    public static function calDiscount($discount, $price)
    {
        return $price - round($discount * $price / 100);
    }
}
