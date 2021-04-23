<?php

/**
 * Controller AccountController
 * Includes functions for work with users action on their accounts such as registretion,login,logout,edit acccount.
 */

namespace application\controllers;

use application\core\Controller;
use application\components\Customer;

class AccountController extends Controller
{
    /**
     * Action for registration page.
     * Registration of New Customer.
     */
    public function registerAction()
    {
        if (empty($_POST) === false) {
            if (isset($_POST['register'])) {
                //Function Checking if customer with entered 
                // user name or emalil exists in Data Base.
                $message = $this->checkIfExists($_POST['userName'], $_POST['email']);
                //Message that user Already exist. 
                if ($message != "")
                    $this->regMassage($message);
                //Registrating a new Customer and Adding him to Data Base.
                else {
                    $cst = $this->customerCreate();
                    $this->register($cst);
                }
            }
        }
        $this->view->render('Register');
    }

    //Function For Editing Customer`s Data.
    public function editAccountAction()
    {
        //Current customer Data.
        $cst = $this->model->getByUserName($_SESSION['userName']);
        if (empty($_POST) === false) {
            //User want to Update his Data.
            if (isset($_POST['update'])) {
                $message = "";
                $currentUserName = $cst->getuserName();
                //Check if customer`s  new  User Name or 
                //new Email exists in Data Base.
                if ($currentUserName != $_POST['userName'])
                    $message = $this->checkIfExists($_POST['userName'], "");
                if (!$message)
                    if ($cst->getemail() != $_POST['email'])
                        $message = $this->checkIfExists("", $_POST['email']);
                if ($message != "")
                    $this->regMassage($message);
                //Upadating Customer`s Data.
                else {
                    $cst = $this->customerCreate();
                    $this->update($cst, $currentUserName);
                    $_SESSION['userName'] = $_POST['userName'];
                }
            }
        }

        $vars['update'] = "";
        $vars['customer']  = $cst;
        $this->view->render('edit profile', $vars);
    }

    /**
     * Action for Log-in.
     */
    public function LoginAction()
    {
        //If customer verified sucessfully.
        if (empty($msg = $this->customerVerify($_POST['userName'], $_POST['password']))) {
            $_SESSION['fullName'] = $this->getFullName($_POST['userName']);
            $_SESSION['userName'] = $_POST['userName'];
            $_SESSION['products'] = $this->model->loadCart($_SESSION['userName']);
            //If loged user is an Admin
            if ($this->checkAdmin($_POST['userName']))
                header("Location: /SafeRideStore/admin");
            else
                header("Location: /SafeRideStore");
        }
        $vars['msg'] = $msg;
        $this->view->render('Login', $vars);
    }
    /**
     * Action for Log-Out (unsets session).
     */
    public function logoutAction()
    {
        session_unset();
        header("Location: /SafeRideStore");
    }
    /**
     * Action for Password changing.
     */
    public function changePasswordAction()
    {
        $message = array();
        $message['success'] = "";
        $message['verify'] = $this->customerVerify($_SESSION['userName'],  $_POST['currentPass']);
        if (!$message['verify']) {
            $message['confirm'] = $this->checkConfirm($_POST['newPass'], $_POST['confirmPass']);
            if (!$message['confirm']) {
                $this->model->chagePass($_SESSION['userName'], password_hash($_POST['newPass'], PASSWORD_DEFAULT));
                $message['success'] = "Your password has been changed";
            }
        }
        echo json_encode($message);
    }


    /**
     * Function check`s that new Password and his confirmation was 
     *  entered both times correctly. 
     * @param  $newPass new Password.
     * @param  $confPass password for confirmation.
     * @return string Empty string - Confirmation Match,else-relevant Message. 
     */
    public function checkConfirm($newPass, $confPass)
    {
        if ($newPass !== $confPass)
            return "The password confirmation doesn't match.";
        return "";
    }

    //Function rediderct to Contact Page.
    public function contactAction()
    {
        $this->view->render('Contact Us');
    }

    //Function for  sending a Message from Customer to Admin Email. 
    public function messageAction()
    {
        $to  = 'alextsi037@gmail.com';
        $subject = "contact us form";
        $message = $_POST['message'];
        $headers  = 'Content-type: text/html; charset=windows-1251 \r\n';
        $headers .= 'From:' . $_POST['email'] . '\r\n';
        $headers .= 'Reply-To: reply-to@' . $_POST['email'] . '\r\n';
        mail($to, $subject, $message, $headers);
        $this->view->render('Contact Us');
    }
    /**
     * Add Cuctomer to Data Base
     * @param Customer $cst Customer to Add.
     */
    public function register(Customer $cst)
    {
        $this->model->addCustomer($cst);
    }

    /**
     * Updating Cuctomer`s Data in Data Base.
     * @param Customer $cst Customer with new Data to Update.
     * @param string $currentUserName Current User Name For Updating in Data Base.
     */
    public function update($cst, $currentUserName)
    {
        $this->model->updateCustomer($cst, $currentUserName);
    }
    /**
     * Check if cusromer with passed User Name or Email exist in Data Base.
     * @param string $userName User Name to check.
     * @param string $email Email to check.
     * @return string empty string if Customer Doesn't exist , else relevant message.
     */
    public function checkIfExists($userName, $email)
    {
        //Function checking by email if Customer exists in Data Base.  
        $emailChk = $this->model->getByEmail($email);
        //Function checking by User Name if Customer exists in Data Base. 
        $userNameChk = $this->model->getByUserName($userName);
        $massage = "";
        if ($emailChk)
            $massage = "User with this email already exists";
        if ($userNameChk)
            if ($massage != "")
                $massage = "User with this email and this user name already exists";
            else
                $massage = "User with this user name already exists";
        return $massage;
    }
    /**
     * Function adds java script alert with registration message .
     * @param string $message message for alert
     */
    public function regMassage($message)
    {
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    /**
     * Function Create`s new Entity for Customer from Data that New User Entered.
     * @return Customer $cst creates entity for Customer.
     */
    public function customerCreate(): Customer
    {
        $cst = new Customer();
        $cst->setfirstName($_POST['firstName']);
        $cst->setlastName($_POST['lasttName']);
        $cst->setEmail($_POST['email']);
        $cst->setuserName($_POST['userName']);
        $cst->setAddress($_POST['address']);
        $cst->setzipCode($_POST['zip']);
        $cst->setcity($_POST['city']);
        $cst->setPhoneNumber($_POST['phoneNumber']);
        if (isset($_POST['password'])) {
            $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $cst->setPassword($pass);
        }
        return $cst;
    }

    /**
     *Getting by userName customer`s password from Data Base and verify with entered password. 
     *Return empty message if customer verified sucessfully.  
     *Else return relevant message(Reason of Verified Problem). 
     * @param string $userName Customer`s User Name .
     * @param string $passTocheck Customer`s Password.
     * @return "Empty Message if Verified Correct , else Relevant Message."
     */
    public function customerVerify($userName, $passTocheck)
    {
        //Getting customer`s passwor if he exists in Data Base , if  not get null.
        $password = $this->model->getPaswordByUserName($userName);
        if ($password)
            //If the customer verified save the full name to ssesion and redirect to main page.
            if (password_verify($passTocheck, $password)) {

                return "";
            } else
                return "Wrong password";
        else
            return "There is no customer whith this User Name";
    }
    public function loadCustomerCart()
    {
    }
    /**
     * Function get`s cusromers full name by passed userName
     * @param string $userName userName of cusromer to get full name
     * @return string $fullName customers full name
     */
    public function getFullName($userName)
    {
        $fullNameArray = $this->model->getFullName($userName);
        $fullName = $fullNameArray[0]['firstName'] . " " . $fullNameArray[0]['lastName'];
        return $fullName;
    }

    /**
     * Function to check if user Andim or not
     * @param string $userName userName to check
     * @return boolean True for Admin , Not Admin-False.
     */
    private function checkAdmin($userName)
    {
        $result =  $this->model->checkRole($userName);
        if ($result === 'admin')
            return $_SESSION['admin'] = true;
        return false;
    }
}
