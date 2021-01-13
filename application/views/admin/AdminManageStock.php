<?php $products = $vars['products']; ?>

<div class="container">

    <h4>Stock Manage Product #<?= $vars['id'] ?></h4>
    <table class="table" id="stockTable">
        <thead class="thead-dark">
            <tr>
                <th>Size</th>
                <th>Color</th>
                <th>Amount</th>


            </tr>
        </thead>
        <tbody id="tableData">
            <?php
            if (!empty($products))
                for ($i = 0; $i < count($products); $i++) {
            ?>
                <tr>
                    <td><?= $products[$i]['size'] ?></td>
                    <td><?= $products[$i]['color'] ?></td>
                    <td> <input type="text" size="3" id="<?= $products[$i]['inStockId'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');" value="<?= $products[$i]['amount'] ?>" required onkeyup="quantityChange()"> </td>
                </tr>
            <?php
                }
            ?>

        </tbody>
    </table>
    <form action="" method="post">

        <div class="row m-4">
            <div class="col-2">
                <label>Size:&nbsp&nbsp</label>
                <select id="sizes">
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large">Large</option>
                </select>
            </div>
            <div class="col-2">
                <label>Color:&nbsp&nbsp</label>
                <select id="colors">
                    <option value="Red">Red</option>
                    <option value="Pink">Pink</option>
                    <option value="Yellow">Yellow</option>
                </select>
            </div>
            <div class="col-2">
                <label>Amount:&nbsp</label>
                <input type="text" size="3" id="quantity" oninput="this.value = this.value.replace(/[^1-9.]/g, '').replace(/(\..*)\./g, '$1');" required> <!-- Only digits input-->
            </div>
            <div class="col-2 ">
                <a href="#" class="addStock btn btn-primary" data-id="<?= $vars['id'] ?>">Add</a>
            </div>
        </div>
    </form>

</div>