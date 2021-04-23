<?php

use application\components\Cart;

$productsArray = $vars['products'];
?>
<div class="container-fluid">
    <div id="carusel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#carusel" data-slide-to="0" class="active"></li>
            <li data-target="#carusel" data-slide-to="1"></li>
            <li data-target="#carusel" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner ">

            <div class="carousel-item active">
                <img src="public/images/banner_dainese.jpg " class="d-block img-fluid w-100">
            </div>
            <div class="carousel-item ">
                <img src="public/images/banner_agv.jpg" class="d-block img-fluid w-100">
                <div class="carousel-caption d-none d-md-block">
                    <section class=" text-light text-center py-1 my-5">
                        <h5 class="main-title "> <span class="thead-dark"> AGV <span class="s-title">HELMETS</span></span></h5>
                        <p><a href="/SafeRideStore/productDetails/' . $productsArray[$i]->getProductId()  . '" type="submit" name="btnViewProduct" value="" class="btn btn-primary">Shop Now</a></p>
                    </section>
                </div>
            </div>
            <div class="carousel-item">
                <img src="public/images/banner_shark.jpg" class="d-block img-fluid w-100 ">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#carusel" data-slide="prev" role="button">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#carusel" data-slide="next" role="button">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>


<div class="container my-5">
    <div class="row ">
        <div class="col "></div>
        <div class="row  text-center">
            <div class="col ">
                <a>
                    <div class="top-link m-3 h3 title">SALES</div>
                    <img src="public/images/sales.png" class="d-block img-fluid w-75 ">
                </a>
            </div>
            <div class="col">
                <a>
                    <div class="top-link m-3 h3 title">HELMETS</div>
                    <img src="public/images/Helmet_Banner (2).jpg" class="d-block img-fluid w-75 ">
                </a>
            </div>
            <div class="col">
                <a>
                    <div class="top-link m-4 h3 title">RIDING GEAR</div>
                    <img src="public/images/Racesuit_Banner.jpg" class="d-block img-fluid w-75 ">
                </a>
            </div>
        </div>
    </div>
</div>
<section class="thead-dark text-light text-center py-1 my-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="main-title"> TRENDING <span class="s-title">PRODUCTS</span>
                </h1>
            </div> <!-- e col -->

        </div>
    </div>
</section>
<div class="container-fluid px-5">
    <div id="ProductsCarusel" class="carousel slide m-5" data-ride="carusel">
        <!-- Indicators -->

        <!-- The slideshow -->
        <div class="carousel-inner  ">
            <div class="carousel-item active">
                <div class="row text-center mx-5">
                    <?php
                    for ($i = 0; $i < 3; $i++) {
                        if ($productsArray[$i]->getDiscount() > 0) {
                            $priceTag = '<p class="card-text"><del>' . $productsArray[$i]->getPrice() . '$</del> <span class="text-danger font-weight-bold">' . Cart::calDiscount($productsArray[$i]->getDiscount(), $productsArray[$i]->getPrice()) . '$ (SALE)</span></p>';
                        } else $priceTag = '<p class="card-text">' . $productsArray[$i]->getPrice() . ' $</p>';
                        echo
                        '
                            <div class=" col-sm-4  d-flex align-items-center flex-column">
                            <div class="card " style="width: 16rem;">
                                <img src="../../../' . $productsArray[$i]->getImgPath() . '" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">' . $productsArray[$i]->getProductName() . '</h5>
                                    ' . $priceTag . '
                                    <a href="/SafeRideStore/productDetails/' . $productsArray[$i]->getProductId()  . '" type="submit" name="btnViewProduct" value="" class="btn btn-primary">ViewProduct</a>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>

                </div>
            </div>
            <div class="carousel-item">
                <div class="row text-center">
                    <?php
                    for ($i = 3; $i < 6; $i++) {
                        if ($productsArray[$i]->getDiscount() > 0) {
                            $priceTag = '<p class="card-text"><del>' . $productsArray[$i]->getPrice() . '$</del> <span class="text-danger font-weight-bold">' . Cart::calDiscount($productsArray[$i]->getDiscount(), $productsArray[$i]->getPrice()) . '$ (SALE)</span></p>';
                        } else
                            $priceTag = '<p class="card-text">' . $productsArray[$i]->getPrice() . ' $</p>';
                        echo
                        '<div class=" col-sm-4  d-flex align-items-center flex-column">
                            <div class="card " style="width: 16rem;">
                                <img src="../../../' . $productsArray[$i]->getImgPath() . '" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">' . $productsArray[$i]->getProductName() . '</h5>
                                    ' . $priceTag . '
                                    <a href="/SafeRideStore/productDetails/' . $productsArray[$i]->getProductId()  . '" type="submit" name="btnViewProduct" value="" class="btn btn-primary">ViewProduct</a>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>

                </div>
            </div>
            <div class="carousel-item">
                <div class="row text-center">
                    <?php
                    for ($i = 6; $i < count($productsArray); $i++) {
                        if ($productsArray[$i]->getDiscount() > 0) {
                            $priceTag = '<p class="card-text"><del>' . $productsArray[$i]->getPrice() . '$</del> <span class="text-danger font-weight-bold">' . Cart::calDiscount($productsArray[$i]->getDiscount(), $productsArray[$i]->getPrice()) . '$ (SALE)</span></p>';
                        } else $priceTag = '<p class="card-text">' . $productsArray[$i]->getPrice() . ' $</p>';
                        echo
                        '<div class=" col-sm-4  d-flex align-items-center flex-column">
                            <div class="card " style="width: 16rem;">
                                <img src="../../../' . $productsArray[$i]->getImgPath() . '" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">' . $productsArray[$i]->getProductName() . '</h5>
                                    ' . $priceTag . '
                                    <a href="/SafeRideStore/productDetails/' . $productsArray[$i]->getProductId()  . '" type="submit" name="btnViewProduct" value="" class="btn btn-primary">ViewProduct</a>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>

                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev mr-5" href="#ProductsCarusel" data-slide="prev" role="button">
            <span class="mr-5 contolIcon"><i class="fas fa-chevron-left"></i></span>
        </a>
        <a class="carousel-control-next" href="#ProductsCarusel" data-slide="next" role="button">
            <span class="ml-5 contolIcon"><i class="fas fa-chevron-right"></i></span>
        </a>

    </div>
    </body>
</div>