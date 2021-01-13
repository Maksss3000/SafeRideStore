<?php
$update = false;
if (isset($vars['update'])) {
    $update = true;
    $cst = $vars['customer'];
}


?>
<div class="container mt-4">
    <?php
    if (!$update) { ?>
        <h2 class="title"> Registration </h2>
    <?php } else { ?>
        <h2 class="title"> Edit Profile </h2>
    <?php } ?>
    <div class="row justify-content-center">
        <form action="" class="reg-form" method="POST">

            <label for="firstName" class="">
                First Name:
            </label>
            <input type="text" class="form-control" name="firstName" value="<?php if ($update)  echo $cst->getfirstName()
                                                                            ?>" required pattern="[A-Za-zа-ьА-ь]{3,}" title="Only letters are allowed(Min-3)">

            <label for=" lastName" class="">
                Last Name:
            </label>
            <input type="text" class="form-control" name="lasttName" value="<?php if ($update) echo $cst->getlastName()
                                                                            ?>" required pattern="[A-Za-zа-ьА-ь]{3,}" title="Only letters are allowed(Min3)">

            <label for="email" class="">
                Email:
            </label>
            <input type="email" class="form-control" name="email" value="<?php if ($update) echo $cst->getemail() ?>" required>

            <label for="address" class=" ">
                Street Address
            </label>
            <input name="address" placeholder="Street 12/34" type="text" value="<?php if ($update) echo $cst->getaddress() ?>" class="form-control" title="Enter Address Correct" required>

            <label for="zip" class=" ">
                Zip Code
            </label>
            <input name="zip" type="text" value="<?php if ($update) echo $cst->getzipCode() ?>" class="form-control" required>
            </label>

            <label for="city" class=" ">
                City
            </label>
            <input name="city" type="text" value="<?php if ($update) echo $cst->getcity() ?>" class="form-control" required>

            <label for="phoneNumber" class=" ">
                Phone Number
            </label>
            <input name="phoneNumber" type="text" value="<?php if ($update) echo $cst->getphoneNumber() ?>" class="form-control" required pattern="[0-9-]{5,}" title="Please Enter just numbers(Min-5)">

            <label for="userName" class=" ">
                User Name:
            </label>
            <input type="text" class="form-control" name="userName" value="<?php if ($update) echo $cst->getuserName() ?>" required>
            <?php if (!$update) { ?>
                <label for="password" class=" ">
                    Password:
                </label>
                <input type="password" class="form-control" name="password" minlength="8" value="" required>
            <?php
            }
            if (!$update) { ?>
                <h2> <button type='submit' class="btn btn-reg mt-2" name="register" value="register">Register</button> </h2>
            <?php } else {
            ?>
                <h2><button type='submit' class="btn btn-reg mt-2" name="update" value="update">Update</button> </h2>
            <?php } ?>

        </form>
    </div>
</div>