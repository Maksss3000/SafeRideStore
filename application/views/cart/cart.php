<section>

    <div class="row">

        <div class="col-lg-8">

            <!-- Card -->
            <div class="mb-3">
                <div class="pt-4 wish-list">
                    <?php

                    use application\components\Cart;

                    $products = array();
                    if (!isset($vars['products'])) {
                    ?>
                        <h5 class="m-4">The cart is empty!</h5>

                    <?php
                    } else {
                        $products = $vars['products'];
                    ?>
                        <h5 class="m-4" id="itemsCount">Cart (<span><?= $count = Cart::countItems(); ?></span> items)</h5>

                        <?php for ($i = 0; $i < count($products); $i++) {
                            $id = $products[$i]['inStockId'];
                            $quantity = $_SESSION['products'][$id]; ?>
                            <div class="row mb-4">
                                <div class="col-md-5 col-lg-3 col-xl-3">
                                    <div class="rounded mb-3 mb-md-0">
                                        <img class="img-fluid w-100" src="<?= $products[$i]['imgPath']; ?>" alt="Sample">
                                        <a href="#!">

                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-9 col-xl-9">
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5 class="font-weight-bold"><?= $products[$i]['productName']; ?> </h5>
                                                <?php
                                                if ($products[$i]['discount'] > 0){
                                                    echo '<p class="text-uppercase font-weight-bold">Price: <del>' . $products[$i]['price'] . '$</del> <span class="text-danger">'.Cart::calDiscount($products[$i]['discount'],$products[$i]['price']).'$  (SALE)</span></p>';
                                                  
                                                }
                                                else   echo '<p class="text-uppercase font-weight-bold">Price:' . $products[$i]['price'] . '$ </p>';
                                                ?>

                                                <p class="mb-2 text-muted text-uppercase small">Brand: <?= $products[$i]['brand']; ?> </p>
                                                <p class="mb-2 text-muted text-uppercase small">Color: <?= $products[$i]['color']; ?></p>
                                                <p class="mb-2 text-muted text-uppercase small">Size: <?= $products[$i]['size']; ?></p>
                                            </div>
                                            <div>
                                                <div class="qty mb-0 w-100">
                                                    <span data-id="<?= $id ?>" class="minus bg-dark">-</span>
                                                    <input type="number" id="countCart<?= $id ?>" class="count" min="1" max="99" name="qty" disabled value=<?= $quantity ?>>
                                                    <span data-id="<?= $id ?>" class="plus bg-dark">+</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="cart/delete/<?= $id ?>" type="button" class="card-link-secondary small text-uppercase mr-3"><i class="fas fa-trash-alt mr-1"></i> Remove item </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                    <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Do not delay the purchase, adding items to your cart does not mean booking them.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <!-- Card -->
            <div class="mb-3">
                <div class="pt-4">
                    <h5 class="mb-3">The total amount</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                            Temporary amount:
                            <span id="subTotalPrice">$<?= $subTotal = Cart::priceNoVat($products); ?> </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                            VAT (<?= $subTotal = Cart::getVat() * 100; ?>%):

                            <span id="vat">$<?= $subTotal = Cart::calVat($products); ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Shipping:
                            <span>Gratis</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-2">
                            <div>
                                <strong>The total amount </strong>
                                <strong>
                                    <p class="mb-0">(including VAT)</p>
                                </strong>
                            </div>
                            <strong> <span id="TotalPrice">$<?= Cart::TotalPrice($products) ?></span></strong>
                        </li>
                    </ul>

                    <?php require_once '../SafeRideStore/application/components/payPalSubmit.php';
                    ?>
                </div>
            </div>

        </div>


    </div>


</section>