<?php
//include 'php/controller/CategoryController.php';

//$categories = getCategoryDetails();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['customerId'])) {
    header('Location: http://localhost/PharmacyDB/login.php');
}

include "./php/controller/CartController.php";
include "./php/mysql_connector.php";
include "./php/controller/MedicineController.php";

if (isset($_POST['medicineId'])) {
    addMedicineToCart($_POST['medicineId'], $_POST['quantity']);
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bootstrap E-commerce Templates</title>
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
    <script src="themes/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php include 'cart_controls.php' ?>

<div id="wrapper" class="container">

    <?php include 'menu.php' ?>

    <section class="header_text sub">
        <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products">
        <h4 class="title"><span class="text"><strong>Shopping</strong> cart</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <h4 class="title"><span class="text"><strong>View</strong> Your Cart</span></h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Remove</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                        $cardTotal = 0;
                        $i=0;
                    if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
                        echo "<h2 align='center'>Your shopping cart is empty</h2>";
                    } else {
                        $cardTotal = 0;
                        foreach ($_SESSION["cart_array"] as $each_medicine) {
                            $medicineId = $each_medicine['medicineId'];
                            $row = getItemDetailsById($medicineId);
                            $amount = 0;

                            $name = $row["Name"];
                            $unitPrice = $row["Price"];

                            $quantity = $each_medicine['quantity'];
                            $amount = $unitPrice * $each_medicine['quantity'];
                            $cardTotal = $cardTotal + $amount;
                            ?>
                            <tr>
                                <form method="POST" action="./php/controller/CartController.php" name="removeMedicineForm">
                                <td>
                                    <input class="btn btn-danger" type="submit" value="Remove"></td>
                                    <input name="removeItemFromCart" type="hidden"  <?php echo "value=$i"?> />
                                </form>

                                <td><a href="<?php echo 'product_detail.php?medicineId=' . $medicineId ?>"><img alt=""
                                                                      src="<?php echo './images/products/' . $medicineId . '.jpg' ?>"></a>
                                </td>
                                <td><?php echo $name ?></td>
                                <td><?php echo $quantity ?></td>
                                <td>Rs. <?php echo $unitPrice ?></td>
                                <td>Rs. <?php echo $amount ?></td>
                            </tr>

                        <?php
                            $i++;
                        }
                    }
                    ?>

                    </tbody>
                </table>
                <hr/>

                <h4 class="right">
                    <strong>Total  : Rs. <?php echo $cardTotal ?> </strong><br>
                </h4>
                <hr/>
                <form name="clearCartForm" action="./php/controller/CartController.php" method="POST">
                <p class="buttons left">
                    <input name="clearCart" type="hidden" value="clearCart" />
                    <button class="btn btn-danger" type="submit">Clear Cart</button>
                </p>
                </form>

                <p class="buttons right">
                    <button class="btn btn-success" type="submit" id="checkout">Checkout</button>
                </p>
            </div>

            <?php include 'sidebar.php'; ?>

        </div>
    </section>

    <?php include 'footer.php' ?>

</div>
<script src="themes/js/common.js"></script>
<script>
    $(document).ready(function () {
        $('#checkout').click(function (e) {
            document.location.href = "checkout.php";
        })
    });
</script>
</body>
</html>
