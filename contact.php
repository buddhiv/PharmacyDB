<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PharmacyDB | Contact</title>
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
        <h4 class="title"><span class="text"><strong>Contact</strong> Us</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span7 center" style="margin-left: 275px">
                <?php
                if (isset($_GET['success'])) {
                    if ($_GET['success'] == 'true') {
                        ?>
                        <h4>Your message was sent successfully</h4>
                        <?php
                    } else if ($_GET['success'] == 'false') {
                        ?>
                        <h4>Your message failed</h4>
                        <?php
                    }
                }
                ?>
                <p>
                    Contact us 24/7. Our service associates will be happy to assist you further.
                </p>

                <form method="post" action="contact_func.php">
                    <fieldset>
                        <div class="clearfix">
                            <label for="name"><span>Name:</span></label>

                            <div class="input">
                                <input tabindex="1" size="18" id="name" name="name" type="text" value=""
                                       class="input-xlarge" placeholder="Name">
                            </div>
                        </div>

                        <div class="clearfix">
                            <label for="email"><span>Email:</span></label>

                            <div class="input">
                                <input tabindex="2" size="25" id="email" name="email" type="text" value=""
                                       class="input-xlarge" placeholder="Email Address">
                            </div>
                        </div>

                        <div class="clearfix">
                            <label for="message"><span>Message:</span></label>

                            <div class="input">
                                <textarea tabindex="3" class="input-xlarge" id="message" name="message" rows="7"
                                          placeholder="Message"></textarea>
                            </div>
                        </div>

                        <div class="actions">
                            <button tabindex="3" type="submit" class="btn btn-inverse">Send message</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

</div>
<script src="themes/js/common.js"></script>
</body>
</html>