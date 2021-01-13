<?php

use application\components\Product;
use application\components\Pdf;


$products = $vars['products'];
?>
<div class="container ">
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-8">
            <h2 class="row justify-content-center">Products in store</h2>
        </div>
        <div class="col-2">

            <a class="btn btn-primary mt-2 " href="products/add">Add Product</a>
            <form method="post">
                <input class="btn btn-primary mt-2" type="submit" name="pdfProducts" value="Create PDF" />
            </form>
        </div>
    </div>
    <div class="row justify-content-center m-2">
        <span class=""> <b>You can filter by entering Product name, Brand or Catecory</b></span>
    </div>
    <div class="row justify-content-center m-2">
        <div class="col-10">
            <form action="" class="form" method="POST">
                <input type="text" class="form-control" id="filterProducts" required>
            </form>
        </div>
    </div>
    <?php ob_start(); ?>
    <table class="table ">
        <thead class="thead-dark">
            <tr>
                <th>products ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Price</th>
                <th> </th>

            </tr>
        </thead>
        <tbody class="productsBody">
            <?php
            echo $products;

            ?>

        </tbody>
    </table>

    <?php

    $data = ob_get_flush();

    //Creation of PDF file.
    if (isset($_POST['pdfProducts'])) {

        $htmlName = "products.html";
        $fh = fopen($htmlName, 'w');
        fwrite($fh, $data);
        fclose($fh);
        $pdfName = "products.pdf";
        Pdf::createPdf($htmlName, $pdfName);
    }

    ?>