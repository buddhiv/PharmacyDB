<?php
include 'php/controller/CategoryController.php';

$categories = getCategoryDetails();

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
        <h4><span>Shopping Cart</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span9">
                <h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
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
                    <tr>
                        <td><input type="checkbox" value="option1"></td>
                        <td><a href="product_detail.php"><img alt="" src="themes/images/ladies/9.jpg"></a></td>
                        <td>Fusce id molestie massa</td>
                        <td><input type="text" placeholder="1" class="input-mini"></td>
                        <td>$2,350.00</td>
                        <td>$2,350.00</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" value="option1"></td>
                        <td><a href="product_detail.php"><img alt="" src="themes/images/ladies/1.jpg"></a></td>
                        <td>Luctus quam ultrices rutrum</td>
                        <td><input type="text" placeholder="2" class="input-mini"></td>
                        <td>$1,150.00</td>
                        <td>$2,450.00</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" value="option1"></td>
                        <td><a href="product_detail.php"><img alt="" src="themes/images/ladies/3.jpg"></a></td>
                        <td>Wuam ultrices rutrum</td>
                        <td><input type="text" placeholder="1" class="input-mini"></td>
                        <td>$1,210.00</td>
                        <td>$1,123.00</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><strong>$3,600.00</strong></td>
                    </tr>
                    </tbody>
                </table>
                <h4>What would you like to do next?</h4>

                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                    delivery cost.</p>
                <label class="radio">
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                    Use Coupon Code
                </label>
                <label class="radio">
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Estimate Shipping &amp; Taxes
                </label>
                <hr>
                <p class="cart-total right">
                    <strong>Sub-Total</strong>: $100.00<br>
                    <strong>Eco Tax (-2.00)</strong>: $2.00<br>
                    <strong>VAT (17.5%)</strong>: $17.50<br>
                    <strong>Total</strong>: $119.50<br>
                </p>
                <hr/>
                <p class="buttons center">
                    <button class="btn" type="button">Update</button>
                    <button class="btn" type="button">Continue</button>
                    <button class="btn btn-inverse" type="submit" id="checkout">Checkout</button>
                </p>
            </div>


            <div class="span3 col">
                <div class="block">
                    <ul class="nav nav-list">
                        <li class="nav-header">CATEGORIES</li>

                        <?php foreach ($categories as $category) {
                            ?>
                            <li><a href="products.php"><?php echo $category['title']; ?></a></li>
                            <?php
                        } ?>
                    </ul>
                </div>
            </div>
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