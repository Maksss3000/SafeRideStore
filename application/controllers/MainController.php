<?php

namespace application\controllers;

use application\core\Controller;
use application\models\ProductsModel;

class MainController extends Controller
{

    //Function to View Most Popular/Best Selling Product`s. 
    public function indexAction()
    {
        $this->model = new ProductsModel;
        $vars['products'] = $this->model->getTopSelling();
        $this->view->render('Main page', $vars);
    }
}
