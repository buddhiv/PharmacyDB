<?php
include 'php/mysql_connector.php';
include 'php/controller/CategoryController.php';
include 'php/controller/MedicineController.php';
include 'php/controller/StockController.php';


if(isset($_SESSION['admin'])){
    header('Location: http://localhost/PharmacyDB/adminpanel.php?option=1');
}

$categories = getCategoryDetails();

if (isset($_GET['medicineId'])) {
    $medicineId = $_GET['medicineId'];
    $medicine = getItemDetailsById($medicineId);

    $categoryname = getCategoryName($medicine['CategoryId']);
    $isinstock = isItemInStock($medicineId);

    $items = getItemsListForCart();
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
        <link href="themes/css/main.css" rel="stylesheet"/>
        <link href="themes/css/jquery.fancybox.css" rel="stylesheet"/>

        <!-- scripts -->
        <script src="themes/js/jquery-1.7.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="themes/js/superfish.js"></script>
        <script src="themes/js/jquery.scrolltotop.js"></script>
        <script src="themes/js/jquery.fancybox.js"></script>
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

    <?php include 'cart_controls.php'; ?>

    <div id="wrapper" class="container">

        <?php include 'menu.php'; ?>

        <section class="header_text sub">
            <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products">
            <h4 class="title"><span class="text"><strong>Product </strong>Details</span></h4>
        </section>
        <section class="main-content">
            <div class="row">
                <div class="span9">
                    <div class="row">
                        <div class="span4">
                            <a href="<?php echo './images/products/' . $medicineId.'.jpg' ?>" class="thumbnail" data-fancybox-group="group1"
                               title="Description 1"><img alt="" src="<?php echo './images/products/' . $medicineId.'.jpg' ?>"></a>
                            <br/>
                        </div>
                        <div class="span5">
                            <h4><strong><?php echo $medicine['Name']; ?></strong><br></h4>

                            <address>
                                <strong>Category:</strong> <span><?php echo $categoryname; ?></span><br>
                                <strong>Availability:</strong> <span><?php echo $isinstock; ?></span><br>
                            </address>
                            <h4><strong>Price: <?php echo $medicine['Price']; ?></strong></h4>
                        </div>
                        <div class="span5">
                            <form class="form-inline" id="addToCartForm" name="addToCartForm" action="./cart.php" method="POST">
                                <!--                                <label class="checkbox">-->
                                <!--                                    <input type="checkbox" value=""> Option one is this and that-->
                                <!--                                </label>-->
                                <!--                                <br/>-->
                                <!--                                <label class="checkbox">-->
                                <!--                                    <input type="checkbox" value=""> Be sure to include why it's great-->
                                <!--                                </label>-->

                                <p>&nbsp;</p>
                                <label>Qty:</label>
                                <input type="hidden" name="medicineId" value=<?php echo $medicineId ?> />
                                <input type="text" id="quantity" name="quantity" class="span1" placeholder="1" value="1">
                                <button class="btn btn-inverse" type="submit">Add to cart</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span9">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active"><a href="#remarks">Remarks</a></li>
                                <li class=""><a href="#information">Additional Information</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="remarks">
                                    <?php echo $medicine['Remarks']; ?>
                                </div>
                                <div class="tab-pane" id="information">
                                </div>
                            </div>
                        </div>
                        <div class="span12">
                            <br>
                            <h4 class="title">
                                <span class="pull-left"><span
                                        class="text"><strong>Recent</strong> Products</span></span>
                            </h4>

                            <div id="myCarousel-1" class="carousel slide">
                                <div class="carousel-inner">
                                    <div class="active item">
                                        <ul class="thumbnails listing-products">
                                            <?php foreach ($items as $item) {
                                                $categoryname = getCategoryName($item['CategoryId']);
                                                $isinstock = isItemInStock($item['MedicineId']);

                                                $medicineId = $item['MedicineId'];
                                                ?>
                                                <li class="span3">
                                                    <div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <a href="<?php echo 'product_detail.php?medicineId=' . $medicineId ?>"><img alt=""
                                                                                          src="<?php echo './images/products/' . $medicineId.'.jpg' ?>"></a><br/>
                                                        <a href="<?php echo 'product_detail.php?medicineId=' . $medicineId ?>"
                                                           class="title"><?php echo $item['Name']; ?></a><br/>
                                                        <a class="category"><?php echo $categoryname; ?></a>

                                                        <p class="price"><?php echo $item['Price']; ?></p>
                                                        <a class="category"><?php echo $isinstock; ?></a>
                                                    </div>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include 'sidebar.php'; ?>

            </div>
        </section>

        <?php include 'footer.php'; ?>

    </div>
    <script src="themes/js/common.js"></script>
    <script>
        $(function () {
            $('#myTab a:first').tab('show');
            $('#myTab a').click(function (e) {
                e.preventDefault();
                $(this).tab('show');
            })
        })
        $(document).ready(function () {
            $('.thumbnail').fancybox({
                openEffect: 'none',
                closeEffect: 'none'
            });

            $('#myCarousel-2').carousel({
                interval: 2500
            });
        });
    </script>
    </body>
    </html>
    <?php
} else {
    header('');
}
?>