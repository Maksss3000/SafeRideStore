<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;
use application\components\Product;
use application\components\Cart;

class AdminController extends Controller
{
    public function notifyAction()
    {
        require 'application/components/notify.php';
    }
    public function discountAction()
    {
        $this->checkAdmin();
        if (isset($_POST['applyDiscount'])) {
            $this->addDiscount($_POST['discountValue']);
            $vars['massage'] = "<script>f$(document).ready(function() {
                alert('discount has been added')
              });</script>";
        }
        $vars = $this->loadDiscountVars();
        $this->view->render('discount', $vars);
    }
    public function discountDeleteAction()
    {
        $this->checkAdmin();
        $this->model->removeDiscount($this->route['id']);
        $vars = $this->loadDiscountVars();
        $vars['massage'] = " <script>$(document).ready(function() {
                             alert('discount has been removed')
                            });</script>";

        $this->view->render('discount', $vars);
    }
    public function loadDiscountVars()
    {
        $vars['productsDiscounts'] = $this->prepareDiscounts($this->model->getDiscounts());
        $vars['products'] = $this->model->getProductsIds();
        $vars['brands'] = $this->model->getBrands();
        $vars['admin'] = "";
        return $vars;
    }
    public function prepareDiscounts($discounts)
    {
        $output = "";
        if (!empty($discounts))
            for ($i = 0; $i < count($discounts); $i++) {
                $output .= ' <tr>
            <td>' . $discounts[$i]->getProductId() . '</td>
            <td>' . $discounts[$i]->getProductName() . '</td>
            <td>' . $discounts[$i]->getCategory() . '</td>
            <td>' . $discounts[$i]->getBrand() . '</td>
            <td>' . $discounts[$i]->getPrice() . ' $</td>
            <td>' . $discounts[$i]->getDiscount() . ' %</td>
            <td >' . (round(($discounts[$i]->getDiscount() * $discounts[$i]->getPrice() / 100))) . ' $</td>
            <td class="nav justify-content-start">
                <a class="mx-2 text-danger" title="Remove Discount" href="/SafeRideStore/admin/discount/delete/' . $discounts[$i]->getProductId() . '"><i class="fas fa-times"></i></a>
            </td>
            </tr>';
            }
        return $output;
    }
    public function addDiscount($value)
    {
        $percentType = $this->defineDiscountType();
        if ($_POST['choose'] == 'byCategory') {
            $this->model->addDiscountByCategory($_POST['category'], $value, $percentType);
        } else if ($_POST['choose'] == 'byBrand')
            $this->model->addDiscountByBrand($_POST['brand'], $value, $percentType);
        else
            $this->model->addDiscountProducts($_POST['products'], $value, $percentType);
    }
    public function defineDiscountType()
    {
        if ($_POST['type'] == "amount")
            return false;
        return true;
    }
    public function salesStatisticsAction()
    {
        $this->checkAdmin();
        $this->view->render('Sales Statistics', ['admin' => true]);
    }
    public function loadSalesAction()
    {
        $this->checkAdmin();
        $year = intval($this->route['id']);
        $sales = array();
        for ($i = 1; $i <= 12; $i++) {
            $sales["month" . $i] = $this->model->getSalesBymonth($i, $year);
            if ($sales["month" . $i] == null)
                $sales["month" . $i] = 0;
        }
        echo json_encode($sales);
    }
    public function customersStatisticsAction()
    {
        $this->checkAdmin();
        $this->view->render('Customers Statistics', ['admin' => true]);
    }
    public function loadCustomersAction()
    {
        $this->checkAdmin();
        $year = intval($this->route['id']);
        $sales = array();
        for ($i = 1; $i <= 12; $i++) {
            $sales["month" . $i] = $this->model->getCustomersBymonth($i, $year);
            if ($sales["month" . $i] == null)
                $sales["month" . $i] = 0;
        }
        echo json_encode($sales);
    }
    /**
     * action for admin page
     */
    public function adminAction()
    {
        $this->checkAdmin();
        $this->view->render('Admin Dashboard', ['admin' => true]);
    }
    /**
     * action for admin Products page
     */
    public function adminProductsAction()
    {
        $this->checkAdmin();
        //products model
        $products = $this->model->getAllProducts();
        $vars['products'] = $this->praperProducts($products);
        $vars['admin'] = "";
        $this->view->render('Admin Products', $vars);
    }
    public function adminProductsFilterAction()
    {
        $this->checkAdmin();
        $filter = $_POST['filter'];
        //products model
        $products = $this->model->getProductsBySearch($filter);
        echo $this->praperProducts($products);
    }

    public function praperProducts($products)
    {
        $output = "";
        if (!empty($products))

            for ($i = 0; $i < count($products); $i++) {
                $output .= ' <tr>
            <td>' . $products[$i]->getProductId() . '</td>
            <td>' . $products[$i]->getProductName() . '</td>
            <td>' . $products[$i]->getCategory() . '</td>
            <td>' . $products[$i]->getBrand() . '</td>
            <td>' . $products[$i]->getPrice() . ' $</td>
            <td class="nav justify-content-end">
                <a class="deleteProduct mx-2 text-danger" title="Delete Product" href="" url="/SafeRideStore/admin/products/delete/' . $products[$i]->getProductId() . '"><i class="fas fa-trash-alt"></i></a>
               <a class="mx-2 "title="View/Edit Product" href="products/edit/' . $products[$i]->getProductId() . '"><i class="far fa-eye"></i></a>
               <a class=" mx-2" title="Mange Product Stock" href="products/manage-stock/' . $products[$i]->getProductId() . '"><i class="fas fa-dolly"></i></a>
            </td>
            </tr>';
            }
        return $output;
    }
    /**
     * action for admin Customers page
     */
    public function adminCustomersAction()
    {
        $this->checkAdmin();
        //customers model
        $vars['customers'] = $this->model->getAllCustomers();
        $vars['admin'] = "";
        $this->view->render('Admin customers', $vars);
    }
    /**
     * action for admin Edit Products page
     */
    public function adminProductEditAction()
    {
        $this->checkAdmin();
        $id = intval($this->route['id']);
        if (isset($_POST['edit'])) {
            $product = $this->praperProduct();
            $vars['massage']  = $this->updateProduct($product, $id);
        }
        //products model
        $vars['products'] = $this->model->getById($id);
        $vars['admin'] = "";
        $vars['add/edit'] = "edit";
        $this->view->render('Admin Products Edit', $vars);
    }
    /**
     * action for admin add Products page
     */
    public function adminProductAddAction()
    {
        $this->checkAdmin();
        $vars['admin'] = "";
        $vars['add/edit'] = "add";
        if (isset($_POST['add'])) {
            $product = $this->praperProduct();
            $vars['massage']  = $this->addProduct($product);
        }
        $this->view->render('Admin Products add', $vars);
    }
    public function adminProductDeleteAction()
    {
        $this->checkAdmin();
        //products model
        $vars['admin'] = "";
        $this->model->deleteProduct(intval($this->route['id']));
        $this->view->redirect("/SafeRideStore/admin/products");
    }
    public function praperProduct(): Product
    {
        $product = new Product();
        $product->setProductName($_POST['name']);
        $product->setProductId($_POST['id']);
        $product->setPrice($_POST['price']);
        $product->setCategory(trim($_POST['category']));
        $product->setSubCategory(trim($_POST['subCategory']));
        $product->setBrand($_POST['brand']);
        if ($product->getCategory() === 'helmet')
            $product->setImgPath("/SafeRideStore/public/images/products/" .  $product->getBrand() . "/" .   $product->getSubCategory() . "/" . $product->getProductId() . '.jpg');
        else
            $product->setImgPath("/SafeRideStore/public/images/products/RidingGear/" . $product->getSubCategory() . "/" . $product->getProductId() . '.jpg');
        return $product;
    }


    /**
     * action for admin Manage Stock page
     */
    public function adminManageStockAction()
    {
        $this->checkAdmin();
        $id = intval($this->route['id']);
        //products model
        $vars['products'] = $this->model->getInstockByProductId($id);
        $vars['id'] = $id;
        $vars['admin'] = "";
        $this->view->render('Admin Manage Stock', $vars);
    }

    /**
     * action for admin add product to stock page(Using Ajax)
     */
    public function addStockAction()
    {
        $this->checkAdmin();
        $id = intval($this->route['id']);
        $amount = intval($this->route['amount']);
        $color = $this->route['color'];
        $size = $this->route['size'];
        //products model
        if (!$this->model->isStockExists($id, $size, $color)) {
            echo  json_encode($this->model->addToStock($id, $size, $color, $amount));
        } else {
            echo  json_encode($this->model->updateStock($id, $size, $color, $amount));
        }
    }
    public function updateStockAction()
    {
        $this->checkAdmin();
        $inStockid = intval($this->route['id']);
        $quantity = intval($this->route['amount']);
        if ($quantity == 0)
            $this->model->deleteStockById($inStockid);
        else
            $this->model->updateStockById($inStockid, $quantity);
    }
    public function adminOrdersDatesAction()
    {
        $this->checkAdmin();
        $sDate = $_POST['startDate'];
        $eDate = $_POST['endDate'] . '23:59:59';
        $orders = $this->model->getOrdersByDate($sDate, $eDate);
        echo $this->praperOrders($orders);
    }
    public function adminOrdersUserAction()
    {
        $this->checkAdmin();
        $userName = $_POST['userName'];
        $orders = $this->model->getOrdersByUserName($userName);
        echo $this->praperOrders($orders);
    }
    public function praperOrders($orders)
    {
        $output = "";
        for ($i = 0; $i < count($orders); $i++) {
            $output .= '<tr>
            <td>' . $orders[$i]->getOrderId() . '</td>
            <td>' . $orders[$i]->getUserName() . '</td>
            <td>' . $orders[$i]->getTotalAmount() . ' $</td>
            <td>' . $orders[$i]->getOrderStatus() . '</td>
            <td>' . $orders[$i]->getOrderDate() . ' </td>
            <td class="nav justify-content-end">
                <a class="mx-2" title="View/Edit Order" href="order/viewOrder/' . $orders[$i]->getOrderId() . '"><i class="far fa-eye"></i></a>
            </td>
        </tr> ';
        }
        return $output;
    }

    public function adminOrdersAction()
    {
        $this->checkAdmin();
        $vars['admin'] = "";
        $orders = $this->model->getOrders();
        $vars['orders'] = $this->praperOrders($orders);
        $this->view->render('Admin Orders', $vars);
    }
    public function adminViewOrderAction()
    {
        $this->checkAdmin();
        $id = intval($this->route['id']);
        $vars['admin'] = "";
        $productsInOrder = $this->model->productsInOrder($id); # array of inStock Ids
        $vars['order'] = $this->model->getOrderById($id);
        $vars['customer'] = $this->model->getCustomerByOrder($id);
        $vars['products'] = $this->model->getOrderProdustsByIds($productsInOrder);
        $this->view->render('Admin View Order ', $vars);
    }
    public function changeVatAction()
    {
        $this->checkAdmin();
        Cart::setVat(intval($_POST['inputvat']));
        $this->view->redirect("/SafeRideStore/admin");
    }

    private function updateProduct($product, $oldId)
    {
        $newId = $_POST['id'];
        $flag = 0;
        //Checking if there is same Id in Data Base in case the id needs to be changed.
        if ($oldId != $newId) {
            $flag = $this->model->checkId($newId);
        }
        if (!$flag) {
            if ($this->model->updateProduct($product, $oldId)) {
                // if file uploaded move and rename
                if (is_uploaded_file($_FILES["image"]["tmp_name"]))
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "{$product->getImgPath()}");
                $message = "<div class='text-success mb-4 font-weight-bold '>Product data updated successfully </div>";
            } //Can`t changing Id,because of Same ID in our DB.
        } else
            $message = "<div class='text-danger font-weight-bold mb-2'>Product with same id already exists</div>";
        return $message;
    }
    private function addProduct($product)
    {
        //Checking if there is same Id in Data Base in case the id needs to be changed.
        $flag = $this->model->checkId($product->getProductId());
        if (!$flag) {
            $this->model->addProduct($product);
            // if file uploaded move and rename
            if (is_uploaded_file($_FILES["image"]["tmp_name"]))
                move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "{$product->getImgPath()}");
            $message = "<div class='text-success mb-4 font-weight-bold '>Product added succesfully</div>";
        } //Can`t changing Id,because of Same ID in our DB.
        else
            $message = "<div class='text-danger font-weight-bold mb-2'>Product with same id already exists</div>";
        return   $message;
    }


    /**
     * function checkout admin role promission if no prommision redirect to page erorr 403
     */
    private function checkAdmin()
    {
        if (!isset($_SESSION['admin']))
            View::errorCode(403);
    }
}
