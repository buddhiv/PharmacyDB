<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pharmacy | Log In</title>
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

<?php include 'cart_controls.php' ?>

<div id="wrapper" class="container">

    <?php include 'menu.php' ?>

    <section class="header_text sub">

        <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products">
        <h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
    </section>

    <div class="container">
        <div class="row">
            <div class=" center">
                <form name="customerForm" action="php/controller/UserController.php" onsubmit="return validateForm()" method="post">
                    <input type="hidden" name="next" value="/">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label">User Name</label>

                            <div class="controls">
                                <input type="text" placeholder="User Name" id="username" name="username"
                                       class="input-xlarge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Full Name</label>

                            <div class="controls">
                                <input type="text" placeholder="Full Name" id="fullname" name="fullname"
                                       class="input-xlarge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Address</label>

                            <div class="controls">
                                <input type="text" placeholder="Address" id="address" name="address"
                                       class="input-xlarge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Telephone</label>

                            <div class="controls">
                                <input type="text" placeholder="Telephone" id="telephone" name="telephone"
                                       class="input-xlarge">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">NIC</label>

                            <div class="controls">
                                <input type="text" placeholder="NIC" id="nic" name="nic"
                                       class="input-xlarge">
                            </div>
                        </div>

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

                        <input type="hidden" name="addUser" value="user" >

                        <div class="control-group">
                            <input tabindex="3" class="btn btn-primary" type="submit"
                                   value="Sign Up">
                            <hr>
                            <p class="reset"><a tabindex="4" href="login.php">Already have an account?</a></p>
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
        var x = document.forms["customerForm"]["username"].value;
        if (x == null || x == "") {
            bootbox.dialog({
                title:"User name must be filled out",
                message: "Please fill the full form and submit again.",
                buttons: {
                    success: {
                        label: "OK",
                        className: "btn-danger"
                    }
                }
            });
            return false;
        }
        x = document.forms["customerForm"]["fullname"].value;
        if (x == null || x == "") {
            //bootbox.alert("Customer Name must be filled out");
            bootbox.dialog({
                title:"Customer Name must be filled out",
                message: "Please fill the full form and submit again.",
                buttons: {
                    success: {
                        label: "OK",
                        className: "btn-danger"
                    }
                }
            });
            return false;
        }
        x = document.forms["customerForm"]["address"].value;
        if (x == null || x == "") {

            bootbox.dialog({
                title:"Address must be filled out",
                message: "Please fill the full form and submit again.",
                buttons: {
                    success: {
                        label: "OK",
                        className: "btn-danger"
                    }
                }
            });
            return false;
        }
        x = document.forms["customerForm"]["telephone"].value;
        if (x == null || x == "") {

            bootbox.dialog({
                title:"Telephone must be filled out",
                message: "Please fill the full form and submit again.",
                buttons: {
                    success: {
                        label: "OK",
                        className: "btn-danger"
                    }
                }
            });
            return false;
        }
        x = document.forms["customerForm"]["nic"].value;
        if (x == null || x == "") {

            bootbox.dialog({
                title:"NIC must be filled out",
                message: "Please fill the full form and submit again.",
                buttons: {
                    success: {
                        label: "OK",
                        className: "btn-danger"
                    }
                }
            });
            return false;
        }
        x = document.forms["customerForm"]["password"].value;
        if (x == null || x == "") {

            bootbox.dialog({
                title:"Password must be filled out",
                message: "Please fill the full form and submit again.",
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
                message: "Please fill the full form and submit again.",
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
                title:"Registration successful",
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