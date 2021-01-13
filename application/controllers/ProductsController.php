<?php

namespace application\controllers;


use application\core\Controller;
use application\components\Product;

class ProductsController extends Controller
{

    //Function to see product`s from specific category.
    public function productByCategoryAction()
    {
        $category = $this->route['category'];
        $vars['products'] = $this->model->getProductsByCategory($category);
        $this->view->render('Riding Gear', $vars);
    }
    //Function to see product`s from specific Sub-Category.
    public function productBySubCategoryAction()
    {
        $category = $this->route['category'];
        $vars['products'] = $this->model->getProductsBySubCategory($category);
        $this->view->render('Riding Gear', $vars);
    }
    /*
    public function productByProtectionAction()
    {
        $vars['controller'] = $this;
        $this->view->render('Protection', $vars);
    }
*/
    ///Function to view  Products by search Action.
    public function productSearchAction()
    {
        if (isset($_POST['submit-search']))
            $search = ($_POST["searching"]);
        $vars['products'] = $this->model->getProductsBySearch($search);
        $this->view->render('Search For You', $vars);
    }
    //Function return`s all Products from Data Base
    // by Brand or ProtectionCategory.
    public function productByBrandAction()
    {
        $search = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $words = explode('/', $search);
        $lastWord = array_pop($words);
        $vars['products'] = $this->model->getProductsBySearch($lastWord);
        $this->view->render('Brands', $vars);
    }
    //Function to View Specific Product Information.
    public function productDetailsAction()
    {
        $vars['productId'] = $this->route['id'];
        $vars['product'] = $this->model->getById($vars['productId']);
        $vars['colors'] = $this->model->getAvailableColors($vars['productId']);
        $this->view->render('Riding Gear', $vars);
    }

    //Sizes that are available for choosen product 
    //with specific color(In stock).
    public function sizesAjaxAction()
    {
        $productId = intval($this->route['id']);
        $color = $this->route['color'];
        $sizes = array('small', 'medium', 'large');
        $sizesAvaileble = $this->model->getAvailableSizes($productId, $color);
        $output = '';
        for ($i = 0; $i < count($sizes); $i++) {
            $status = 'disabled';
            for ($j = 0; $j < count($sizesAvaileble); $j++) {
                if ($sizes[$i] == $sizesAvaileble[$j]) #if current size available for chosen color customer will be able to choose
                    $status = ' '; #enabled
            }
            $output .= '
                        <div class="form-check form-check-inline pl-0">
                        <input type="radio" class="form-check-input" value=' . $sizes[$i] . ' name="sizes"' .  $status . '  >
                        <label class="form-check-label small text-uppercase" for=' . $sizes[$i] . '>' . $sizes[$i] . '</label>
                        </div>';
        }
        echo $output;
    }
    /*
    public function getArrayOfproducts(): array
    {
        $products = $this->model->getByCategory('helmet', $this->route['action']);
        return $products;
    }
*/

    //Function to get most Selling Product`s.
    public function topSelling()
    {
        return  $this->model->getTopSelling();
    }
}
