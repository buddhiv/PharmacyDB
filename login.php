<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PharmacyDB | Log In</title>
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

    <?php include 'menu.php' ?>


    <?php
    if (isset($_GET['attempt'])) {
        echo '<script src="./bootstrap/bootbox.min.js"></script>
            <script>
            bootbox.alert("Wrong username or password.");
            </script>
        ';
    }
    ?>

    <section class="header_text sub">

        <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products">
        <h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
    </section>

    <div class="container">
        <div class="row">
            <div class="center">
                <form action="./php/controller/userController.php" method="post">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label">User Name</label>

                            <div class="controls">
                                <input type="text" placeholder="" id="username" class="input-xlarge" name="username">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Password</label>

                            <div class="controls">
                                <input type="password" placeholder="" id="password" name="password"
                                       class="input-xlarge">
                            </div>
                        </div>
                        <input type="hidden" name="login" value="user" >

                        <div class="control-group">
                            <input tabindex="3" class="btn btn-primary" type="submit" value="Sign In">
                            <hr>
                            <p class="reset"><a tabindex="4" href="register.php">Don't have an account?</a></p>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>

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