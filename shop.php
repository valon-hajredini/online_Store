<?php session_start() ?>
<?php
include "controllers/shop_controller.php";
class Shop extends Shop_controller{
    public $all_products;
    public function __construct(Database $all_products){

    }
    public function products(){
        $query = "SELECT * FROM products ORDER BY id DESC limit 12";
        $rezult = mysqli_query($this->connectDB(), $query);
        return $rezult;
    }
    public function categoryProducts($category_id){
        $connect = $this->connectDB();
        $query = "SELECT * FROM `products` WHERE `category_id` = $category_id order BY id DESC";
        $rezult = mysqli_query($connect, $query);
        return $rezult;
    }
}
$product_image = new Shop(new Database());
$product_image = new Shop(new Database());
$db = new Shop(new Database());
$conn = $db->connectDB();
$tategories = new Shop(new Database())
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | ONLINE STORE</title>
    <?php include "assets/stylesheet.php"?>
    <!--[if lt IE 9]>
    <script src="assets/scripts/html5shiv.js"></script>
    <script src="assets/scripts/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/ic ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->

    <?php include "partial_code/layout/headers.php"?>

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php" >Home</a></li>
                            <li class=""><a href="shop.php" class="active">Products</a>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <form action="#" class="form-inline" role="form">
                    <div class="">
                        <div class="form-group" style="width: 78%;margin-right: 2%;">
                            <input type="text" class="form-control" id="email" placeholder="Search">
                        </div>


                        <button type="submit_search" class="btn btn-default">Search</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <section id="advertisement">
                    <div class="container">

                    </div>
                </section>

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <?php if ((!isset($_GET['shop'])) or (isset($_GET['shop']) and ( $_GET["shop"] != "cart"))){?>

            <?php include "viewers/shop/_sidebar.php"?>
            <?php }?>
            <?php if(isset($_GET['shop']) and ( $_GET["shop"] == "cart")){?>
                <?php include "viewers/shop/cart.php"?>
                <?php }else if(isset($_GET['shop']) and ( $_GET["shop"] == "product_datale")) {?>

                <?php include "viewers/shop/product_datails.php"?>
                <?php } else {?>
            <?php include "viewers/shop/products.php"; }?>
        </div>
    </div>
</section>

<?php include "partial_code/layout/footer.php" ?>



<?php include "assets/script.php"?>
</body>
</html>