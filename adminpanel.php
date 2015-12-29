<?php
include 'php/mysql_connector.php';
include 'php/controller/MedicineController.php';
include 'php/controller/CategoryController.php';
include 'php/controller/StockController.php';
include 'php/controller/UserController.php';
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

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["customerId"])) {
    include 'cart_controls.php';
}
?>

<div id="wrapper" class="container">

    <?php include 'menu.php'; ?>

    <section class="header_text sub">
        <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products">
        <h4 class="title"><span class="text"><strong>Administrator</strong> Dashboard</span></h4>
    </section>
    <section class="main-content">

        <?php
        if (!isset($_GET['option']) || $_GET['option'] == 1) {
            ?>

            <div class="row">
                <div class="span9">
                    <h4 class="title"><span class="text"><strong>User</strong> Information</span></h4>
                    <ul class="thumbnails listing-products">

                        <table class="table table-striped" style="margin-left: 20px">
                            <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Telephone</th>
                                <th>NIC</th>
                                <th></th>
                            </tr>
                            <tbody>

                            <?php
                            $users = getAllUserDetails();

                            foreach ($users as $user) {
                                ?>
                                <tr>
                                    <td><?php echo $user['CustomerId']; ?></td>
                                    <td><?php echo $user['FullName']; ?></td>
                                    <td><?php echo $user['Address']; ?></td>
                                    <td><?php echo $user['NIC']; ?></td>
                                    <td><?php echo $user['Telephone']; ?></td>
                                    <td></td>
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

                <?php include 'adminsidebar.php' ?>

            </div>

            <?php
        } else if ($_GET['option'] == 2) {
            ?>
            <div class="row">
                <div class="span9">
                    <h4 class="title"><span class="text"><strong>User</strong> Information</span></h4>
                    <ul class="thumbnails listing-products">

                        <table class="table table-striped" style="margin-left: 20px">
                            <thead>
                            <tr>
                                <th>Medicine ID</th>
                                <th>Category ID</th>
                                <th>Supplier ID</th>
                                <th>Name</th>
                                <th>Price</th>
                            </tr>
                            <tbody>

                            <?php
                            $medicine = getAllMedicineDetails();

                            foreach ($medicine as $med) {
                                ?>
                                <tr>
                                    <td><?php echo $med['MedicineId']; ?></td>
                                    <td><?php echo $med['CategoryId']; ?></td>
                                    <td><?php echo $med['SupplierId']; ?></td>
                                    <td><?php echo $med['Name']; ?></td>
                                    <td><?php echo $med['Price']; ?></td>
                                    <td></td>
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

                <?php include 'adminsidebar.php' ?>
            </div>

            <?php
        } else if ($_GET['option'] == 3) {
            ?>
            <div class="row">
                <div class="span9">
                    <h4 class="title"><span class="text"><strong>Settings</strong></span></h4>
                    <ul class="thumbnails listing-products">

                        <?php
                        $items = getItemsByCategoryId($categoryId);
                        foreach ($items as $item) {
                            $categoryname = getCategoryName($item['CategoryId']);
                            $isinstock = isItemInStock($item['MedicineId']);

                            $medicineId = $item['MedicineId'];
                            ?>
                            <li class="span3">
                                <div class="product-box">
                                    <span class="sale_tag"></span>
                                    <a href="<?php echo 'product_detail.php?medicineId=' . $medicineId ?>">
                                        <img alt=""
                                             src="<?php echo './images/products/' . $medicineId . '.jpg' ?>"/></a>
                                    <br/>
                                    <a href="<?php echo 'product_detail.php?medicineId=' . $medicineId ?>"
                                       class="title"><?php echo $item['Name']; ?></a><br/>
                                    <a class="category"><?php echo $categoryname; ?></a>

                                    <p class="price"><?php echo $item['Price']; ?></p>
                                    <a class="category"><?php echo $isinstock; ?></a>
                                </div>
                            </li>
                            <?php
                        } ?>

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

                <?php include 'adminsidebar.php' ?>

            </div>
            <?php
        }
        ?>
    </section>

    <?php include 'footer.php'; ?>

</div>
<script src="themes/js/common.js"></script>
</body>
</html>