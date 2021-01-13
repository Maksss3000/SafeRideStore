<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/SafeRideStore/public/styles/adminStyle.css?version=4">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <title>
        <?php
        echo $title;
        ?>
    </title>

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">SafeRide Admin Panel </div>
            <div class="list-group list-group-flush">
                <a href="/SafeRideStore/admin/products" class="list-group-item list-group-item-action bg-light">Products</a>
                <a href="/SafeRideStore/admin/customers" class=" list-group-item list-group-item-action bg-light">Customers</a>
                <a href="/SafeRideStore/admin/orders" class="list-group-item list-group-item-action bg-light">Orders</a>
                <a href="#" class="list-group-item list-group-item-action bg-light dropdown-toggle" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseReports">Statistics &nbsp &nbsp</a>
                <div class="collapse" id="collapseReports">
                    <div class="card-body">
                        <a href="/SafeRideStore/admin/salesStatistics" class="list-group-item list-group-item-action bg-light">Sales Statistics</a>
                        <a href="/SafeRideStore/admin/customersStatistics" class="list-group-item list-group-item-action bg-light">Customers Statistics</a>


                    </div>
                </div>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link" href="/SafeRideStore">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#vat">Change VAT</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="/SafeRideStore/admin/discount">
                                Discount
                            </a>

                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <?= $content; ?>

            </div>
        </div>
        <?php require 'vatDialog.php'; ?>

    </div>
    <script src="/SafeRideStore/public/script/adminScript.js"></script>
</body>


</html>