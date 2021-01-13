<?php

namespace application\controllers;

use application\core\Controller;

class OrderController extends Controller
{
    public function checkOutAction()
    {
        $this->view->render('Check Out');
    }
}
