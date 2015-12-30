<?php

include 'php/controller/MedicineController.php';
include 'php/controller/CategoryController.php';
include 'php/controller/StockController.php';
include 'php/controller/UserController.php';
include 'php/controller/CustomerOrderController.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PharmacyDB | Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!--[if ie]>
    <meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
    <!-- bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="themes/css/bootstrappage.css" rel="stylesheet"/>

    <!-- global styles -->
    <link href="themes/css/flexslider.css" rel="stylesheet"/>
    <link href="themes/css/main.css" rel="stylesheet"/>

    <!-- scripts -->
    <script src="themes/js/jquery-1.7.2.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="themes/js/superfish.js"></script>
    <script src="themes/js/jquery.scrolltotop.js"></script>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>


<div id="wrapper" class="container">

<?php include 'admin_menu.php'; ?>

<section class="header_text sub">
    <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products">
    <h4 class="title"><span class="text"><strong>Administrator</strong> Dashboard</span></h4>
</section>
<section class="main-content">
    <div class="row">

        <div class="span9">
            <div class="right">
                <a href="adminpanel.php?option=3"><h3 class="btn btn-success btn-lg"  role="button">< Back to Admin</h3></a>
            </div>
            <h4 class="title"><span class="text"><strong>Order</strong> Details</span></h4>
            <ul class="thumbnails listing-products">

                <table class="table table-striped" style="margin-left: 20px">
                    <thead>
                    <tr>
                        <th>Medicine Id</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Amount</th>
                    </tr>
                    <tbody>

                    <?php
                    if(isset($_POST['detail'])){
                        $results = showOrderDetails($_POST['orderId']);
                    }


                    foreach ($results as $result) {
                        ?>
                        <tr>
                            <td><?php echo $result['MedicineId']; ?></td>
                            <td><?php echo $result['Quantity']; ?></td>
                            <td><?php echo $result['UnitPrice']; ?></td>
                            <td><?php echo $result['Quantity']*$result['UnitPrice']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                    </thead>
                </table>

            </ul>
            <hr>

            <!--                <div class="pagination pagination-small pagination-centered">-->
            <!--                    <ul>-->
            <!--                        <li><a href="#">Prev</a></li>-->
            <!--                        <li class="active"><a href="#">1</a></li>-->
            <!--                        <li><a href="#">2</a></li>-->
            <!--                        <li><a href="#">3</a></li>-->
            <!--                        <li><a href="#">4</a></li>-->
            <!--                        <li><a href="#">Next</a></li>-->
            <!--                    </ul>-->
            <!--                </div>-->

        </div>


</section>

<?php include 'footer.php'; ?>

</div>
<script src="themes/js/common.js"></script>
</body>
</html>