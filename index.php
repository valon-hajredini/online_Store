<?php session_start();
include "controllers/index_controller.php";
class Index extends Index_controller{
    public $all_products;
    public function __construct(Database $all_products){

    }
    public function products($page){
        $query = "SELECT * FROM products ORDER BY id DESC limit $page,12";
        $rezult = mysqli_query($this->connectDB(), $query);
        return $rezult;
    }
    public function pagination_param($param){
        if ($param == null || $param == "" || $param == 1){
            return 0;
        }else{
            $param = ($param*12) - 12;
            return $param;
        }

    }
    public function count_products(){
        $conn = $this->connectDB();
        $query = "SELECT * FROM products";
        $user = mysqli_query($conn, $query);
        return $user;
    }
}
$pagination = new Index(new Database());
if (!isset($_GET["page"])){
    $_GET["page"] = "";
}
$pagination = $pagination->pagination_param($_GET["page"]);
$product_image = new Index(new Database());
$db = new Index(new Database());
$conn = $db->connectDB();
$tategories = new Index(new Database())
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
    <script src="assets/scripts/html5shiv.js"></script>
    <script src="assets/scripts/respond.min.js"></script>
<body>
<header id="header"><!--header-->

<?php require "partial_code/layout/headers.php"?>

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
                            <li><a href="index.php" class="active">Home</a></li>
                            <li class="dropdown"><a href="shop.php">Products</a>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">


                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<?php include "viewers/index/slide.php"?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="shop.php">All</a></h4>
                        </div>
                        <?php $all_categories = $tategories->categories();?>
                        <?php foreach($all_categories as $cat){?>

                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="shop.php?product=<?php echo $cat["id"]?>"><?php echo $cat["category_name"]?></a></h4>
                            </div>

                        </div>
                        <?php }?>
                    </div><!--/category-products-->
                    <div class="price-range"><!--price-range-->
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src=" assets/images/home/posta.jpg" alt="" width="100%" />

                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">

                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    <?php ?>
                    <?php $product = new Index(new Database())?>
                    <?php foreach ($product->products($pagination) as $product ){?>

                        <a href="<?php echo "product.php?product=".$product["id"].""?>" class="index_products">
                            <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="<?php echo $product_image->image($product["id"])["name"]?>" alt="" />
                                    <h2>$ <?php echo $product["price"] #print_r($product)?></h2>
                                    <p><?php echo $product["product_name"] #print_r($product)?></p>
                                    <a href="#" class="btn btn-default add-to-cart" data-toggle="modal" data-target="#myModal_<?php echo $product["id"]?>"><i class="fa fa-shopping-cart"></i>Add to card</a>
                                </div>
                            </div>

                            <div class="choose">
                            </div>
                        </div>
                                <div class="modal fade" id="myModal_<?php echo $product["id"]?>" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content" style="width: 400px; margin: 0px auto;">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><?php echo $product["product_name"]?></h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="<?php echo $product_image->image($product["id"])["name"]?>" width="180" height="180" alt="" />
                                                            <h2>$ <?php echo $product["price"] #print_r($product)?></h2>
                                                            <p><?php echo $product["product_name"] #print_r($product)?></p>

                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                            <p style="text-align: center"><b>Do you want to add this product to cart</b></p>
                                            <div class="modal-footer">
                                                <form action="controllers/products_controller.php" method="POST">
                                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION["user"]["id"]?>">
                                                    <input type="hidden" name="product_id" value="<?php echo $product["id"]?>">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                    <button type="submit" name="add_to_cart" class="btn btn-success" >Add to cart</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                    </div>
                        </a>
                         <?php
                    }

                    ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class=" text-center">
                            <nav>
                                <ul class="pagination pagination-lg">
                            <?php
                            $t = new Index(new Database());
                            $a_user = $t->count_products();
                            $total = mysqli_num_rows($a_user);
                            $total = $total / 12;
                            $total =  ceil($total);

                            for ($i = 1; $i<= $total; $i++){
                                ?>

                                        <li class="page-item"><a class="page-link"  href="index.php?page=<?php echo $i?>"><?php echo $i?></a></li>

                                <?php
                            }
                            ?>
                                </ul>
                            </nav>
                            </h2>
                        </div>

                    </div>
                </div>

                <?php include "viewers/index/recomendet_items.php"?>

            </div>
        </div>
    </div>
</section>

<?php include "partial_code/layout/footer.php" ?>



<?php include "assets/script.php"?>
</body>
</html>