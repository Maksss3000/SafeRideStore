<div class="container">
    <div class="row">
        <?php

        $order = $vars['order'];
        $customer = $vars['customer'];
    $products = $vars['products'];
        ?>

        <h4>View Order # <?= $order->getOrderId(); ?></h4>

        <table class="table-admin-small table-bordered table-striped table">
            <tr>
                <td>Order ID</td>
                <td><?= $order->getOrderId(); ?></td>
            </tr>
            <tr>
                <td>Customer Name</td>
                <td><?= $customer->getfirstName() . ' ' . $customer->getlastName(); ?></td>
            </tr>
            <tr>
                <td>Customer Phone No.</td>
                <td><?= $customer->getPhoneNumber(); ?></td>
            </tr>
            <tr>
                <td>Customer Email</td>
                <td><?= $customer->getEmail(); ?></td>
            </tr>
            <tr>
                <td>Customer Address</td>
                <td><?= $customer->getAddress() ?></td>
            </tr>
            <tr>
                <td><b>Order Status </b></td>
                <td><?= $order->getOrderStatus(); ?></td>
            </tr>
            <tr>
                <td><b>Order Date</b></td>
                <td><?= $order->getOrderDate(); ?></td>
            </tr>
        </table>

        <h5>Producs In Order</h5>

        <table class="table-admin-medium table-bordered table-striped table ">
            <tr>
                <th>Product ID</th>
                <th>InStock ID</th>
                <th>Product Name</th>
                <th>Color</th>
                <th>Size</th>
                <th>Price</th>
                <th>Quantity</th>

            </tr>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= $product['productId']; ?></td>
                    <td><?= $product['inStockId']; ?></td>
                    <td><?= $product['productName']; ?></td>
                    <td><?= $product['color']; ?></td>
                    <td><?= $product['size']; ?></td>
                    <td>$<?= $product['price']; ?></td>
                    <td><?= $product['quantity']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
     