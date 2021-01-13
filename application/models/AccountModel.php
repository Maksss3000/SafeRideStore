<?php

namespace application\models;

use application\components\Product;
use application\core\Model;


class AccountModel extends Model
{


    /**
     * Function find customer in Data Base by his user Name.
     * @param string $userName userName of customer.
     * @return Customer $customer Customer.
     * (Return All Data of Specific Customer.)
     */
    public function getByUsername($userName)
    {
        $statement = $this->db->query("SELECT * FROM customers WHERE userName=:userName", ["userName" => $userName]);
        $customer =  $statement->fetchObject('application\components\Customer');
        return $customer;
    }


    /**
     * Function find customer in Data Base by his email.
     * @param string $email Email of customer.
     * @return Customer $customer Customer.
     * (Return All Data of Specific Customer.)
     */
    public function getByEmail($email)
    {
        $statement = $this->db->query("SELECT * FROM customers WHERE email=:email", ["email" => $email]);
        $customer =  $statement->fetchObject('application\components\Customer');
        return $customer;
    }

    /**
     * Function Adding New Customer to Data Base.
     * @param Customer $customer New Customer.
     */
    public function addCustomer($customer)
    {
        $this->db->query("INSERT INTO customers (firstName,lastName,email,userName,phoneNumber,address,zipCode,city,password) VALUES (:firstName,:lastName,:email,:userName,:address,:zipCode,:city,:phoneNumber,:password)", ["firstName" => $customer->getFirstName(), "lastName" => $customer->getLastName(), "email"  => $customer->getEmail(), "userName"  => $customer->getUserName(), "address" => $customer->getAddress(), "zipCode" => $customer->getzipCode(), "city" => $customer->getcity(), "phoneNumber" => $customer->getPhoneNumber(), "password" => $customer->getPassword()]);
        $this->db->query("INSERT INTO carts (cartId,userName) VALUES ((SELECT cartId FROM customers WHERE userName=:userName),:userName)", ["userName"  => $customer->getUserName()]);
    }
    /**
     * Function Updating Customer`s Data.
     * @param Customer $cst New Customer Data.
     * @param string $currentUserName Current User Name.
     */
    public function updateCustomer($cst, $currentUserName)
    {
        $this->db->query("UPDATE customers SET userName=:userName, firstName=:firstName,lastName=:lastName,email=:email,address=:address,zipCode=:zipCode,city=:city,phoneNumber=:phoneNumber WHERE userName=:currentUserName", ["firstName" => $cst->getFirstName(), "lastName" => $cst->getLastName(), "email"  => $cst->getEmail(),  "address" => $cst->getAddress(), "zipCode" => $cst->getzipCode(), "city" => $cst->getcity(), "phoneNumber" => $cst->getPhoneNumber(),  "userName"  => $cst->getUserName(), "currentUserName"  => $currentUserName]);
    }
    /**
     * Function Updating Customer`s Password.
     * @param string $userName Custumer User Name.
     * @param  $password new Password.
     */
    public function chagePass($userName, $password)
    {
        $this->db->query("UPDATE customers SET password=:password WHERE userName=:userName", ["password" => $password, "userName"  => $userName]);
    }
    /**
     * Function Getting Customer`s Password.
     * @param string $userName Custumer User Name.
     * @return string $password Custumer`s current password.
     */
    public function getPaswordByUserName($userName)
    {
        $password = $this->db->column("SELECT password FROM customers WHERE userName=:userName", ["userName" => $userName]);
        return $password;
    }
    /**
     * Function Getting Customer`s Full Name.
     * @param string $userName Custumer User Name.
     * @return string $row Custumer`s First and Last Name.
     */
    public function getFullName($userName)
    {
        $row = $this->db->row("SELECT firstName,lastName FROM customers WHERE userName=:userName", ["userName" => $userName]);
        return $row;
    }
    /**
     * Function Getting All Customer`s from Data Base.
     * @return array $customers All Custumer`s in Data Base.
     */
    public function getAllCustomers()
    {
        $statement = $this->db->query("SELECT * FROM customers");
        $customers = array();
        while ($row =  $statement->fetchObject('application\components\Customer'))
            $customers[] = $row;
        return $customers;
    }
    /**
     * Function Getting Role of user.
     * @param string $userName Custumer User Name.
     * @return string  Custumer`s role.
     */
    public function checkRole($userName)
    {
        return $this->db->column("SELECT role FROM customers WHERE userName=:userName", ["userName" => $userName]);
    }
    /**
     * Function Getting Customer`s Product`s in Cart.
     * @param string $userName Custumer User Name.
     * @return array $products All Custumer`s product`s in Cart.
     */
    public function loadCart($userName)
    {
        $products = array();
        $result = $this->db->row("SELECT productId,quantity FROM products_in_cart WHERE cartId=(SELECT cartId FROM carts WHERE userName=:userName)", ["userName" => $userName]);
        for ($i = 0; $i < count($result); $i++) {
            $inStockId = $result[$i]['productId']; #product inStockId from cart DB
            $products[$inStockId] = $result[$i]['quantity'];
        }
        return $products;
    }
}
