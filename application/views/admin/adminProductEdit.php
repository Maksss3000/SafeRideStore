<?php
$flag = false;
if ($vars['add/edit'] !== 'add') {
    $product = $vars['products'];
    $flag = true;
}

?>

<div class="row">
    <div class="col-4">
    </div>
    <div class="col-4">
        <h4 class="m-4"><?= ucfirst($vars['add/edit']) ?> Product #<?php if ($flag) echo $product->getProductId(); ?></h4>
        <?php
        if (isset($vars['massage']) && !empty($vars['massage']))
            echo $vars['massage'];
        ?>
        <form class="form" action="" method="post" enctype="multipart/form-data">

            <p>Product Name</p>
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="" value="<?php if ($flag) echo $product->getProductName(); ?> " required>
            </div>
            <p>Product Id</p>
            <div class="form-group">
                <input class="form-control" type="text" name="id" placeholder="" value="<?php if ($flag) echo $product->getProductId(); ?>" required>
            </div>
            <p>Price, $</p>
            <div class="form-group">
                <input class="form-control" type="text" name="price" placeholder="" value="<?php if ($flag) echo $product->getPrice(); ?>" required oninput="this.value = this.value.replace(/[^0-9.]/g,'').replace(/(\..*)\./g, '$1');">
            </div>
            <p>Category</p>
            <div class=" form-group">
                <select class="form-control" name="category">
                    <?php if ($flag)
                        echo '<option selected value=" ' . $product->getCategory() . '"> ' . $product->getCategory() . '</option>';
                    ?>
                    <option value="helmet">Helmet</option>
                    <option value="protection">Protection</option>
                    <option value="jeans">Jeans</option>
                    <option value="jacket">Jacket</option>
                    <option value="Accessories">Accessories</option>
                </select>
            </div>
            <p>Sub Category</p>
            <div class="form-group">
                <select class="form-control" name="subCategory">
                    <?php if ($flag)
                        echo '<option selected value=" ' . $product->getSubCategory() . '"> ' . $product->getSubCategory() . '</option>';
                    ?>
                    <option value="DualSport">Dual Sport</option>
                    <option value="Dirt">Dirt</option>
                    <option value="OpenFace">Open Face</option>
                    <option value="Half">Half</option>
                    <option value="RaceSuit">RaceSuit</option>
                    <option value="jeans">Jeans</option>
                    <option value="RainGear">Rain Gear</option>
                    <option value="Armored">Armored</option>
                    <option value="Electronic">Electronic</option>
                    <option value="fullFace">Full Face</option>
                    <option value="Modular">Modular</option>
                    <option value="jackets">Jackets</option>
                    <option value="boots">Boots</option>
                    <option value="gloves">Gloves</option>
                </select>
            </div>

            <p>Brand</p>
            <div class="form-group">
                <input class="form-control" type="text" name="brand" placeholder="" value="<?php if ($flag) echo $product->getBrand(); ?>" required>
            </div>
            <p>Product Image</p>
            <img src="<?php if ($flag) echo $product->getImgPath() ?>" width="200" alt="" />
            <div class="custom-file">
                <input class="m-2" type="file" name="image" class="custom-file-input" id="inputGroupFile" placeholder="" value="<?php if ($flag) echo $product->getImgPath(); ?>">
                <label class="custom-file-label" for="inputGroupFile">Choose file</label>
            </div>
            <div class="mx-5">
                <button type="submit" name="<?= $vars['add/edit'] ?>" class="btn btn-primary my-4">Submit</button>
            </div>
        </form>

    </div>

</div>
</section>