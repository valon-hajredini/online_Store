<?php
$message = "";
if (isset($_GET["message"])){
if($_GET["message"] == "Email_wos_not_sent"){
    ?>
    <style>
        #email_content{
            border:1px solid red;
        }
        .email_msg{
            color:red;
        }
    </style>
    <?php
    $message = "Email wos not sent";
}else if($_GET["message"] == "success"){

    ?>
    <style>
        #email_content{
            border:1px solid green;
        }
        .email_msg{
            color: #2cad1f;
        }
    </style>
    <?php
    $message = "Email wos sent succesfully";
}

}
?>
<?php
include "controllers/products_controller.php";
class Product extends Product_controller{
    public $product;
    public function __construct(Database $product){

    }
    

}
$product_image = new Product(new Database());
$comment_instance =  new Product(new Database());
$all_comments = $comment_instance->comments($_GET["product"]);
//print_r();
$rew = new Product(new Database());
$product = new Product(new Database());
$product->categories();
$seller = new Product(new Database());

$pro_img= new Product(new Database);
$image = $pro_img->image($_GET["product"]);
//print_r ($image);
if (!isset($_GET["product"])){
    header("Location: index2.php");
}
$db = new Product(new Database());
$conn = $db->connectDB();
function product( $db,$id){
    $query = "SELECT * FROM products where id = '".$id."' ORDER BY id ASC limit 1";
    $result = mysqli_query($db, $query);
    if ($result){
        $row = mysqli_fetch_assoc($result);
        return $row;
    }else{
        return "0";
    }
}
$product = product($conn,$_GET["product"]);


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
    <?php include "partial_code/layout/headers.php"?>

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
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
                            <li><a href="index.php">Home</a></li>
                            <li class="dropdown"><a href="shop.php">Products</a>


                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">

                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php $ctategories = new Product(new Database());?>
                        <?php $all_categories = $ctategories->categories();?>
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="shop.php">All</a></h4>
                        </div>
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
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
<!--                            <img src="--><!--" alt="" />-->
                            <img src="<?php echo $image["name"]?>" alt="" />
<!--                            <h3>ZOOM</h3>-->
                        </div>


                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="assets/images/offerts/new.png" width="110" height="80" class="newarrival" alt="" />
                            <h2><?php echo $product["product_name"]?></h2>


								<span>
									<span><?php echo $product["price"]?> $</span>
<!--									<label>Quantity:</label>-->


                                        <input type="hidden" value=" <?php echo $product["id"]?>">

<!--									<input type="text" value="3" />-->

                      <a href="#" class="btn btn-fefault cart" data-toggle="modal" data-target="#myModal"> <i class="fa fa-shopping-cart"></i> Add to card</a>

								</span>
                            <p><b>Availability:</b>  <?php echo $product["quantity"]?> In Stock</p>

                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
<!--                ------------------------------------------------------------------------->
                <div class="modal fade" id="myModal" role="dialog">
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
<!--                ------------------------------------------------------------------------->

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Details</a></li>
                            <li class="active"><a href="#companyprofile" data-toggle="tab">Seller</a></li>

                            <li ><a href="#reviews" data-toggle="tab">Reviews (<?php echo  mysqli_num_rows($all_comments)?>)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">

                        <div class="tab-pane fade" id="details" >
                           <div class="col-md-12">
                               <img src="<?php echo $image["name"]?>" width="100%" alt="">
                           </div>
                            <div class="col-md-4">
                                <h3><?php echo $product["product_name"]?></h3>
                                <p><b><?php echo $product["quantity"]?> </b> are  avelable with the price <?php echo $product["price"]?></p>
                            </div>
                            <div class="col-md-8">
                                <p><b>Description: </b> <?php echo $product["product_description"]?></p>

                            </div>
                        </div>
                        <div class="tab-pane fade active in" id="companyprofile" >
                            <?php $seller = $seller->seller($product["user_id"])?>
                            <h2>Seller name: <?php echo $seller["emri"]?> <?php echo $seller["mbiemri"]?></h2><span class="email_msg"><?php echo $message ?></span>
                            <p><b>Seller email: </b><?php echo $seller["email"]?></p>
                            <div class="col-md-12">
                                <form action="controllers/Email_controller.php" method="POST">
                                    <input type="hidden" name="seller_email" value="<?php echo $seller["email"]?>">
                                    <input type="hidden" name="user" id="user" value="<?php echo $product["user_id"]?>">
                                    <input type="hidden" name="product" id="product" value="<?php echo $_GET["product"]?>">
                                    <div class="form-group">
                                    <textarea name="email_content" id="email_content" rows="4"></textarea>
                                        </div>
                                    
                                    <div class="form-group">
                                    <input type="submit" class="btn btn-default" value="Email the seller" name="submit_email">
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="tab-pane fade " id="reviews" >
                            <div class="col-sm-12">
                                <?php foreach($all_comments as $comment){?>
                                    <?php
                                    $usr_instance = new Product(new Database());
                                    $user_review = $usr_instance->find($comment["user_id"], "users");
                                    ?>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="assets/images/home/user_profile.png" width="100%" height="90" alt="">
                                        <p style="text-align: center;"><?php echo $user_review["emri"]?> <?php echo $user_review["mbiemri"]?> </p>
                                    </div>
                                    <div class="col-sm-10">
                                        <p>
                                            <?php echo $comment["comment"]?>

                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <?php }?>

                                <form action="controllers/products_controller.php" method="POST">
                                    <input type="hidden" name="seller" value="<?php echo $product["user_id"]?>">
                                    <input type="hidden" name="user" value="<?php echo $_SESSION["user"]["id"]?>">
                                    <input type="hidden" name="product"  value="<?php echo $_GET["product"]?>">
                                    <textarea name="comment" id="comment" placeholder="Liv a comment here about the product" ></textarea>
<!--                                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />-->
                                    <input type="submit" name="submit_review" id="submit_review" class="btn btn-default pull-right">

                                </form>
                            </div>
                        </div>

                    </div>
                </div><!--/category-tab-->
                <?php $seller_items = new Product(new Database()) ?>
                <?php $recument = $seller_items->recumendet_items($product["user_id"],$product["category_id"])?>
                <?php $row = 1 ?>
                <?php if ($num_rows = mysqli_num_rows($recument) > 0 ){?>
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">


                                <?php foreach ($recument as $re_product){?>
                                    <?php if ($row == 1 ){
                                       echo ' <div class="item active">';
                                    }?>
                                    <?php if($row <= 3){ ?>

                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <a href="<?php echo "product.php?product=".$re_product["id"].""?>" class="index_products">
                                            <div class="productinfo text-center">
                                                <?php $img = $seller_items->image($re_product["id"])?>
                                                <img src="<?php echo $img["name"]?>" alt="" />
                                                <h2>$ <?php echo  $re_product["price"]?></h2>
                                                <p><?php echo  $re_product["product_name"]?></p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                                </a>
                                        </div>
                                    </div>
                                </div>

                                    <?php $row = $row + 1?>
                                        <?php }else if (($row >3) or ($row <= 6) ){?>
                                            <?php
                                                if ($row == 4){
                                                    echo '</div><div class="item">';
                                                }
                                            ?>


                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <a href="<?php echo "product.php?product=".$re_product["id"].""?>" class="index_products">
                                                        <div class="productinfo text-center">
                                                            <?php $img = $seller_items->image($re_product["id"])?>
                                                            <img src="<?php echo $img["name"]?>" alt="" />
                                                            <h2>$ <?php echo  $re_product["price"]?></h2>
                                                            <p><?php echo  $re_product["product_name"]?></p>
                                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                        </div>
                                                            </a>
                                                    </div>
                                                </div>
                                            </div>

                                <?php
                                        $row = $row + 1;
                                    } else if (($row >6) or ($row <= 9) ){?>
                                        <?php
                                            if ($row == 7){
                                                echo '</div><div class="item">';
                                            }
                                        ?>
                                        <div class="item">
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <a href="<?php echo "product.php?product=".$re_product["id"].""?>" class="index_products">
                                                        <div class="productinfo text-center">
                                                            <?php $img = $seller_items->image($re_product["id"])?>
                                                            <img src="<?php echo $img["name"]?>" alt="" />
                                                            <h2>$ <?php echo  $re_product["price"]?></h2>
                                                            <p><?php echo  $re_product["product_name"]?></p>
                                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                        </div>
                                                            </a>
                                                    </div>
                                                </div>
                                            </div>

                                <?php $row = $row + 1; }else{?>

                                <?php }?>
                                <?php }?>


                                        </div>

                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->
                <?php }?>
            </div>
        </div>
    </div>
</section>
<!--Loading footer content-->
<?php include "partial_code/layout/footer.php" ?>


<!-- Loading javascript assets -->
<?php include "assets/script.php"?>
</body>