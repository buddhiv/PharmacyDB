<?php
if(isset($_SESSION['admin'])){
    header('Location: http://localhost/PharmacyDB/adminpanel.php?option=1');
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Pharmacy | Checkout</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
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

			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<h4><span>Check Out</span></h4>
			</section>
            <?php
            if (isset($_GET['attempt'])) {
                echo '<script src="./bootstrap/bootbox.min.js"></script>
            <script>
            bootbox.dialog({
                title:"Wrong username or password.",
                message: "Please enter correct username and password.",
                buttons: {
                    success: {
                        label: "OK",
                        className: "btn-danger"
                    }
                }
            });
            </script>
        ';
            }
            ?>

			<section class="main-content">
				<div class="row">
					<div class="span12">
						<div class="accordion" id="accordion2">
							<div class="accordion-group center">
								<div id="collapseOne" class="accordion-body in collapse center">
									<div class="accordion-inner center">
										<div class="row-fluid center">

											 <div class="span6 center">
												<h4>Confirm Customer</h4>
												<p>Please confirm your account. We have to confirm customer before you purchase.</p>
												<form action="./php/controller/CustomerOrderController.php" method="post">
													<fieldset>
														<div class="control-group">
															<label class="control-label">Username</label>
															<div class="controls">
																<input type="text" name="username" placeholder="Enter your username" id="username" class="input-xlarge">
															</div>
														</div>
														<div class="control-group">
															<label class="control-label">Password</label>
															<div class="controls">
															<input type="password" name="password" placeholder="Enter your password" id="password" class="input-xlarge">
															</div>
														</div>
                                                        <input type="hidden" name="addOrder" id="addOrder" value="addOrder">
														<button class="btn btn-inverse" type="submit">Continue</button>
													</fieldset>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>				
					</div>
				</div>
			</section>

            <?php include 'footer.php' ?>

		</div>
		<script src="themes/js/common.js"></script>
    </body>
</html>