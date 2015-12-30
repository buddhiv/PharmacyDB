<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('Location: http://localhost/PharmacyDB/index.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pharmacy | Admin Account</title>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper" class="container">

    <?php include 'admin_menu.php' ?>

    <section class="header_text sub">

        <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products">
        <h4 class="title"><span class="text"><strong>Change</strong> Administrator Password </span></h4>
    </section>

    <div class="container">
        <div class="row">
            <div class=" center">
                <form name="customerForm" action="php/controller/userController.php" onsubmit="return validateForm()" method="post">
                    <input type="hidden" name="next" value="/">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label">Password</label>

                            <div class="controls">
                                <input type="password" placeholder="Password" id="password" name="password"
                                       class="input-xlarge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Retype Password</label>

                            <div class="controls">
                                <input type="password" placeholder="Password" id="retypepassword" name="retypepassword"
                                       class="input-xlarge">
                            </div>
                        </div>

                        <input type="hidden" name="updateAdmin" value="admin" >

                        <div class="control-group">
                            <input tabindex="3" class="btn btn-primary" type="submit"
                                   value="Update Password">
                            <hr>

                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>

</div>
<script src="themes/js/common.js"></script>
<script src="./bootstrap/bootbox.min.js"></script>
<script>
    $(document).ready(function () {
        $('#checkout').click(function (e) {
            document.location.href = "checkout.php";
        })
    });

    var Example = (function() {
        "use strict";
        var elem,
            hideHandler,
            that = {};
        that.init = function(options) {
            elem = $(options.selector);
        };
        that.show = function(text) {
            clearTimeout(hideHandler);
            elem.find("span").html(text);
            elem.delay(200).fadeIn().delay(4000).fadeOut();
        };
        return that;
    }());

    function validateForm() {
        var x = document.forms["customerForm"]["password"].value;
        if (x == null || x == "") {

            bootbox.dialog({
                title:"Password must be filled out",
                message: "Please type correct password",
                buttons: {
                    success: {
                        label: "OK",
                        className: "btn-danger"
                    }
                }
            });
            return false;
        }
        var y = document.forms["customerForm"]["retypepassword"].value;
        if (y != x) {

            bootbox.dialog({
                title:"Password dismatch.",
                message: "Please type correct password",
                buttons: {
                    success: {
                        label: "OK",
                        className: "btn-danger"
                    }
                }
            });
            return false;
        }else{
            //bootbox.alert("Your registration was successful");
            bootbox.dialog({
                title:"Password Changed.",
                message: "  ",
                buttons: {
                    success: {
                        label: "OK",
                        className: "btn-success"
                    }
                }
            });

        }
    }

</script>
</body>
</html>