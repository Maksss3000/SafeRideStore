<?php

namespace application\controllers;

use application\core\Controller;

class OrdersController extends Controller
{
    public function checkOutAction()
    {
        $this->view->render('Check Out');
    }
    //Function to View to Customer all his Order`s Information.
    public function orderHistoryAction()
    {
        $vars['orders'] = $this->model->getOrdersByUserName($_SESSION['userName']);
        $this->view->render('My Orders', $vars);
    }
    public function orderProductsAction()
    {
        $id = intval($this->route['id']);
        $productsIds = $this->model->productsInOrder($id);
        $products = $this->model->getOrderProdustsByIds($productsIds);

        echo $this->prepareProductsInOrder($products);
    }

    public function prepareProductsInOrder($products)
    {
        $str = "";
        foreach ($products as $product) {
            $str .=
                "<tr>
                <td>" . $product['productId'] . "</td>
                <td>" . $product['inStockId'] . "</td>
                <td>" . $product['productName'] . "</td>
                <td>" . $product['color'] . "</td>
                <td>" . $product['size'] . "</td>
                <td>$" . $product['price'] . "</td>
                <td>" . $product['quantity'] . "</td>
            </tr>";
        }
        return $str;
    }
}
