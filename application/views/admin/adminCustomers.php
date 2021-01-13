<?php

use application\components\Customer;
use application\components\Pdf;

$customers = $vars['customers'];
?>
<div class="container ">
    <div class="row">
        <form method="post">
            <input class="btn btn-primary mt-2" type="submit" name="pdfCustomers" value="Create PDF" />
        </form>
    </div>

    <div class="row justify-content-center">
        <h2>Customers</h2>
    </div>
    <div class="row justify-content-center">
        <p>Those are registered Customers</p>
    </div>
    <?php ob_start(); ?>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>User name</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Phone number</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($customers))
                for ($i = 0; $i < count($customers); $i++) {
            ?>
                <tr>
                    <td><?= $customers[$i]->getUserName() ?></td>
                    <td><?= $customers[$i]->getfirstName() ?></td>
                    <td><?= $customers[$i]->getlastName() ?></td>
                    <td><?= $customers[$i]->getEmail() ?></td>
                    <td><?= $customers[$i]->getPhoneNumber() ?></td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

    <?php

    $d = ob_get_flush();
    //Creation of PDF file.
    if (isset($_POST['pdfCustomers'])) {

        $htmlName = "customers.html";
        $fh = fopen($htmlName, 'w');
        fwrite($fh, $d);
        fclose($fh);
        $pdfName = "customers.pdf";
        Pdf::createPdf($htmlName, $pdfName);
    }
    ?>