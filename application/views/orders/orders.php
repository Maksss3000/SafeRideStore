<?php
$orders = $vars['orders'];


?>
<div class="container">
    <h2 class="my-5 ">My Orders</h2>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Order ID</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Order Date</th>
                <th></th>

            </tr>
        </thead>
        <tbody class="orderBody">
            <?php
            if (!empty($orders))
                for ($i = 0; $i < count($orders); $i++) {
            ?>
                <tr>

                    <td><?= $orders[$i]->getOrderId() ?></td>
                    <td><?= $orders[$i]->getTotalAmount() ?> $</td>
                    <td><?= $orders[$i]->getOrderStatus() ?></td>
                    <td><?= $orders[$i]->getOrderDate() ?> </td>
                    <td class="nav justify-content-start " id="showProducts">
                        <i class="fas fa-eye accordion-toggle collapsed" data-id="<?= $orders[$i]->getOrderId() ?>" id="accordion" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>"></i>
                    </td>
                </tr>
                <tr class="hide-table-padding">
                    <td></td>
                    <td colspan="3">
                        <div id="collapse<?= $i ?>" class="collapse in p-3">
                            <h5>Producs In Order</h5>
                            <table class="table-admin-medium table-bordered table-striped table ">
                                <thead class="thead">
                                    <tr>
                                        <th>Product ID</th>
                                        <th>InStock ID</th>
                                        <th>Product Name</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody id="orderData<?= $orders[$i]->getOrderId() ?>">

                                </tbody>
                            </table>
                        </div>
                    </td>
                    <td></td>
                </tr>
            <?php
                }
            else
                echo '<div>You hove no orders history</div>'
            ?>

        </tbody>
    </table>
</div>