<?php
if (empty($_POST) === false) {
    $controller = $vars['controller'];

    if (isset($_POST['register'])) {
        //check if customer with entered  user name or emalil exists in data base
        $massage = $controller->checkIfExists($_POST['userName'], $_POST['email']);
        if ($massage != "")
            $controller->regMassage($massage);
        else {
            $cst = $controller->customerCreate();
            $controller->register($cst);
        }
        $this->redirect("/SafeRideStore");
    }
}

?>
<div class="container mt-4">
    <h2> Registration </h2>
    <form action="" class="reg-form" method="POST">

        <label for="firstName" class="">
            First Name:
        </label>
        <input type="text" class="form-control" name="firstName" pattern="[A-Za-z]{3}" title="Three letters" required>

        <label for="lastName" class="">
            Last Name:
        </label>
        <input type="text" class="form-control" name="lasttName" required>

        <label for="email" class="">
            Email:
        </label>
        <input type="email" class="form-control" name="email" required>

        <label for="address" class=" ">
            Street Address
        </label>
        <input name="address" placeholder="Street 12/34" type="text" value="" class="form-control">

        <label for="zip" class=" ">
            Zip Code
        </label>
        <input name="zip" type="text" value="" class="form-control">
        </label>

        <label for="city" class=" ">
            City
        </label>
        <input name="city" type="text" value="" class="form-control">

        <label for="phoneNumber" class=" ">
            Phone Number
        </label>
        <input name="phoneNumber" type="text" value="" class="form-control">

        <label for="userName" class=" ">
            User Name:
        </label>
        <input type="text" class="form-control" name="userName" required>

        <label for="password" class=" ">
            Password:
        </label>
        <input type="password" class="form-control" name="password" minlength="8">

        <button type='submit' class="btn btn-reg mt-2" name="register" value="register">Register</button>
    </form>
</div>