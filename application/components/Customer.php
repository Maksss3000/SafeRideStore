<?php
/**
 * Class Customer
 * Entity class fo customer
 */
namespace application\components;

class Customer
{
    protected $userName;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $address;
    protected $zipCode;
    protected $city;
    protected $password;
    protected $phoneNumber;
    protected $cartId;
    public function getfirstName()
    {
        return $this->firstName;
    }
    public function setfirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    public function getlastName()
    {
        return $this->lastName;
    }
    public function setlastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function getzipCode()
    {
        return $this->zipCode;
    }
    public function setzipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }
    public function getcity()
    {
        return $this->city;
    }
    public function setcity($city)
    {
        $this->city = $city;
    }
    public function getUserName()
    {
        return $this->userName;
    }
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }
    public function getCartId()
    {
        return $this->cartId;
    }
    public function setCartId($cartId)
    {
        $this->cartId = $cartId;
    }
}
