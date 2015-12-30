<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pharmacy | About</title>
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

    <?php include 'menu.php'; ?>

    <section class="header_text sub">
        <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products">
        <h4 class="title"><span class="text"><strong>About</strong> Us</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span7 center" style="margin-left: 275px">
                We are Limited a 100% subsidiary and one of the 1st branded retail
                Pharmaceutical Chains in Sri Lanka that has entered the market with a view of creating a difference in
                the retail pharmaceutical trade. Headed by a team of professionals, we have introduced an
                innovative concept centered on superior customer care, latest technology in data management, a wide
                product assortment, affordable prices and a host of value additions.
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

</div>
<script src="themes/js/common.js"></script>
</body>
</html>