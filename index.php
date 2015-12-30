<?php
include 'php/mysql_connector.php';
include 'php/controller/MedicineController.php';
include 'php/controller/CategoryController.php';
include 'php/controller/StockController.php';

if (isset($_SESSION['admin'])) {
    header('Location: http://localhost/PharmacyDB/adminpanel.php?option=1');
}

$items = getItemsListForHome();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pharmacy Home</title>
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

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['customerId'])) {
    include 'cart_controls.php';
}
?>

<div id="wrapper" class="container">

    <?php include 'menu.php' ?>

    <section class="homepage-slider" id="home-slider">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img src="themes/images/carousel/banner-1.jpg" alt=""/>
                </li>
                <li>
                    <img src="themes/images/carousel/banner-2.jpg" alt=""/>
                </li>
            </ul>
        </div>
    </section>
    <section class="header_text">
        We have introduced an innovative concept centered on superior customer care,<br/> a wide product assortment and
        a host of value additions
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <div class="row">
                    <div class="span12">
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><span
                                        class="line">Featured <strong>Products</strong></span></span></span>
                        </h4>

                        <div id="myCarousel" class="myCarousel carousel slide">
                            <div class="carousel-inner">
                                <div class="active item">
                                    <ul class="thumbnails">
                                        <?php foreach ($items as $item) {
                                            $categoryname = getCategoryName($item['CategoryId']);
                                            $isinstock = isItemInStock($item['MedicineId']);

                                            $medicineId = $item['MedicineId'];
                                            ?>
                                            <li class="span3">
                                                <div class="product-box">
                                                    <span class="sale_tag"></span>

                                                    <p>
                                                        <a href="<?php echo 'product_detail.php?medicineId=' . $medicineId ?>"><img
                                                                src="<?php echo './images/products/' . $medicineId . '.jpg' ?>"
                                                                alt=""/></a></p>
                                                    <a href="<?php echo 'product_detail.php?medicineId=' . $medicineId ?>"
                                                       class="title"><?php echo $item['Name']; ?></a><br/>
                                                    <a class="category"><?php echo $categoryname; ?></a>

                                                    <p class="price"><?php echo $item['Price']; ?></p>
                                                </div>
                                            </li>
                                            <?php
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>

                <div class="row feature_box">
                    <div class="span4">
                        <div class="service">
                            <div class="responsive">
                                <img src="themes/images/feature_img_3.png" alt=""/>
                                <h4>EVERYTHING <strong>AT A SINGLE CLICK</strong></h4>

                                <p>All the information about your most needed medicines are just a click away.</p>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="service">
                            <div class="customize">
                                <img src="themes/images/feature_img_3.png" alt=""/>
                                <h4>FREE <strong>RESERVATION</strong></h4>

                                <p>Reserve and keep items at your cart at anytime for free.</p>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="service">
                            <div class="support">
                                <img src="themes/images/feature_img_3.png" alt=""/>
                                <h4>24/7 LIVE <strong>DATABASE</strong></h4>

                                <p>Keep your eye on and be updated with our databases 24/7.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our_client">
        <h4 class="title"><span class="text">Partners</span></h4>

        <div class="row">
            <div class="span2">
                <a href="#"><img alt="" src="themes/images/clients/1.png"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="themes/images/clients/2.png"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="themes/images/clients/3.png"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="themes/images/clients/4.png"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="themes/images/clients/5.png"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="themes/images/clients/6.png"></a>
            </div>
        </div>
    </section>

    <?php include 'footer.php' ?>

</div>
<script src="themes/js/common.js"></script>
<script src="themes/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
    $(function () {
        $(document).ready(function () {
            $('.flexslider').flexslider({
                animation: "fade",
                slideshowSpeed: 4000,
                animationSpeed: 600,
                controlNav: false,
                directionNav: true,
                controlsContainer: ".flex-container" // the container that holds the flexslider
            });
        });
    });
</script>
</body>
</html>