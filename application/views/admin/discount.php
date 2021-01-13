<?php
$brands = $vars['brands'];
$products = $vars['products'];
$productsDiscounts = $vars['productsDiscounts'];

?>
<div class="container  ">
    <div class="row justify-content-center">
        <h2 class="title ">Mange Discounts</h2>
    </div>



    <form class="mt-5" action="/SafeRideStore/admin/discount" method="POST">
        <div class="form-group row justify-content-center">
            Enter the discount amount in the Discount field and select a discount type
        </div>
        <div class="form-group row justify-content-center">
            <div class="col input-group">
            </div>
            <label for="discount" class="col-sm-2 col-form-label">Discount field:</label>
            <div class="col-2">
                <div class="input-group">
                    <input type="text" class="form-control" id="discount" type="text" name="discountValue" required oninput="this.value = this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');">
                    <div class="input-group-append">
                        <span class="input-group-text">%</span>

                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
        <div class="form-group row justify-content-center">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="customRadio" name="type" value="percentage" checked>
                <label class="custom-control-label" for="customRadio"><b>% : </b>A percentage is deducted from the product price</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="customRadio2" name="type" value="amount">
                <label class="custom-control-label" for="customRadio2"><b>$ : </b>A fixed amount is deducted from the product price </label>
            </div>
        </div>

        <div class="form-group row justify-content-center mt-5">
            <div class="col-3">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="customRadio3" name="choose" value="byCategory" checked>
                    <label class="custom-control-label" for="customRadio3"> Discount For Category </label>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group row justify-content-center">
                    <select class="form-control" name="category">
                        <option value="helmet">Helmet</option>
                        <option value="protection">Protection</option>
                        <option value="jeans">Jeans</option>
                        <option value="jacket">Jacket</option>
                        <option value="Accessories">Accessories</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <div class="col-3">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="customRadio4" name="choose" value="byBrand">
                    <label class="custom-control-label" for="customRadio4"> Discount For Brand </label>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group row justify-content-center">
                    <select class="form-control" name="brand">
                        <?php for ($i = 0; $i < count($brands); $i++) {
                            echo '<option value=' . $brands[$i]["brand"] . '>' . $brands[$i]["brand"] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>


        <div class="form-group row justify-content-center">
            <div class="col-1">
            </div>
            <div class="col-6">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="customRadio5" name="choose" value="byProduct">
                    <label class="custom-control-label" for="customRadio5"> Discount For Selected Product </label>
                </div>
            </div>

        </div>
        <div class="productsList" style=" display: none;">
            <div class="form-group row justify-content-center">
                <strong>Products list:</strong>
            </div>
            <div class="form-group row justify-content-center ml-5">
                <?php for ($i = 0; $i < count($products); $i++) {

                    echo ' <div class=" col-lg-6 col-sm-12 my-2">
                      <input class="form-check-input" type="checkbox" value="' . $products[$i]["productId"] . '" id=' . $products[$i]["productId"] . ' name="products[]">
                      <label class="form-check-label" for=' . $products[$i]["productId"] . '>
                      (ID: '   . $products[$i]["productId"] . ') ' . $products[$i]["productName"] . '
                      </label>
                      </div>';
                }
                ?>
            </div>
        </div>
        <div class="form-group row justify-content-center my-5">
            <button type='submit' class="btn btn-primary" name="applyDiscount" value="applyDiscount"> Apply </button>
        </div>
    </form>
    <div class="row justify-content-center mt-5 pt-5">
        <h2 class="title m-5">Existing Discounts</h2>
    </div>
    <table class="table mt-3 ">
        <thead class="thead-dark">
            <tr>
                <th>products ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Discount</th>
                <th> Discout in $ </th>
                <th> </th>

            </tr>
        </thead>
        <tbody class="productsBody">
            <?php
            if ($productsDiscounts)
                echo $productsDiscounts;
            else
                echo 'No Discounts!';

            ?>

</div>
<?php if (isset($vars['massage']))
    echo $vars['massage'];
?>