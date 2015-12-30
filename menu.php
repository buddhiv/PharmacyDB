<!--Code for the main menu-->

<section class="navbar main-menu">
    <div class="navbar-inner main-menu">
        <a href="index.php" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
        <div class="span4" style="margin-left: 200px; margin-top: 5px">
            <form method="POST" class="search_form" action="searchproduct.php">
                <input type="text" name="searchItem" class="input-block-level search-query" Placeholder="Search Pharmacy" style="color: darkgray">
            </form>
        </div>

        <nav id="menu" class="pull-right">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="about.php">About</a></li>
                <?php
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                if (isset($_SESSION["customerId"])) {
                    echo('<li><a href="logout.php">Log out</a></li>');
                }else{
                    echo('<li><a href="login.php">Log in</a></li>');
                }
                ?>

            </ul>
        </nav>
    </div>
</section>
