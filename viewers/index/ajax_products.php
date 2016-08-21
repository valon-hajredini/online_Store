<?php
    $host = 'localhost';
    $db = 'onlinestore';
    $user = 'root';
    $password = '';
//    $ajax_conn = new PDO('mysql:host='.$host.'; dbname='.$db.'; user='.$user.'; pass'.$password.'');
    $ajax_conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);

?>
<?php
if ($_POST['name'] != "") {
    $query = "SELECT * FROM `products` WHERE `product_name` LIKE '% a %'";
}else{
    $query = "SELECT * FROM `products`";
}
$product = $ajax_conn->query($query);
?>
<?php foreach ($product  as $product ){?>
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