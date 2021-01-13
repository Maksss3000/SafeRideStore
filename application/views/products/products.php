<?php
use application\components\Cart;
$productsArray = $vars['products'];

echo '<div class="container">
        <div class="row text-center">';
for ($i = 0; $i < count($productsArray); $i++) {
    if ($productsArray[$i]->getDiscount() > 0){
        $priceTag='<p class="card-text"><del>' . $productsArray[$i]->getPrice() . '$</del> <span class="text-danger font-weight-bold">'.Cart::calDiscount($productsArray[$i]->getDiscount(),$productsArray[$i]->getPrice()).'$  (SALE)</span></p>';
      
    }
    else    $priceTag='<p class="card-text">' . $productsArray[$i]->getPrice() . ' $</p>';
    echo
        '<div class="col-md-4 col-sm-6 mt-4 "> 
            <div class="card " style="width: 16rem;">
                <img src="../../../' . $productsArray[$i]->getImgPath() . '" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">' . $productsArray[$i]->getProductName() . '</h5>
                    ' .  $priceTag . ' 
                    <a  href="/SafeRideStore/productDetails/' . $productsArray[$i]->getProductId()  . '" type="submit" name="btnViewProduct" value="" class="btn btn-primary" >View Product</a>
                </div>
            </div>
        </div>';
}
echo '</div>  </div>';
