
<div class="header_top"><!--header_top-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="contactinfo">
                    <ul class="nav nav-pills">
                        <li><a href="#"><i class="fa fa-phone"></i> +37744-111-222</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> info@onlinestore.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="social-icons pull-right">
                    <ul class="nav navbar-nav">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header_top-->

<div class="header-middle"><!--header-middle-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo pull-left">
                    <a href="index.php"><img src="assets/images/home/logo.png" alt="" width="130" height="50" /></a>
                </div>
                <div class="btn-group pull-right">
                </div>
            </div>
            <div class="col-sm-8">
                <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav">
                        <?php if (isset($_SESSION["user"])){?>

                        <li><a href="user_profile.php"><i class="fa fa-user"></i> <?php echo $_SESSION["user"]["emri"];?> <?php echo $_SESSION["user"]["mbiemri"];?></a></li>
<!--                        <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>-->
<!--                        <li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>-->
                        <li><a href="user_profile.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                        <?php }?>
                        <?php if( !isset($_SESSION["user"])){?>
                        <li><a href="login_register.php"><i class="fa fa-lock"></i> Login</a></li>
                        <?php } else {?>
                        <li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-middle-->