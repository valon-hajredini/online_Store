<div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <?php $category_name = new Shop(new Database());?>
        <?php if(isset($_GET["product"])){?>
        <h2 class="title text-center"><?php echo $category_name->find($_GET["product"], "categories")["category_name"]; ?> </h2>
        <?php } else {?>
            <h2 class="title text-center">All products </h2>
        <?php } ?>
<!--        Product section-->
            <?php $shoq = new Shop(new Database())?>
        <?php if (isset($_GET["product"])){?>
        <?php $products = $shoq->categoryProducts($_GET["product"])?>
        <?php foreach ($products as $product){?>
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
        <?php } }else {?>

        <?php $products = $shoq->products()?>
        <?php foreach ($products as $product){?>
        <a href="<?php echo "product.php?product=".$product["id"].""?>" class="index_products">
<!--            ------------------------------------------------------------------------------->
            
            <!--            ------------------------------------------------------------------------------->

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
            <!--            ------------------------------------------------------------------------------->

        </a>
        <?php }}?>
<!-- ----------------------------------- -->
    </div><!--features_items-->



<!--    <div class="recommended_items"><!--recommended_items-->
<!--        <h2 class="title text-center">recommended items</h2>-->
<!---->
<!--        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">-->
<!--            <div class="carousel-inner">-->
<!--                <div class="item active">-->
<!--                    <div class="col-sm-4">-->
<!--                        <div class="product-image-wrapper">-->
<!--                            <div class="single-products">-->
<!--                                <div class="productinfo text-center">-->
<!--                                    <img src="assets/images/home/recommend1.jpg" alt="" />-->
<!--                                    <h2>$56</h2>-->
<!--                                    <p>Easy Polo Black Edition</p>-->
<!--                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
<!--                                </div>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-sm-4">-->
<!--                        <div class="product-image-wrapper">-->
<!--                            <div class="single-products">-->
<!--                                <div class="productinfo text-center">-->
<!--                                    <img src="assets/images/home/recommend2.jpg" alt="" />-->
<!--                                    <h2>$56</h2>-->
<!--                                    <p>Easy Polo Black Edition</p>-->
<!--                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
<!--                                </div>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-sm-4">-->
<!--                        <div class="product-image-wrapper">-->
<!--                            <div class="single-products">-->
<!--                                <div class="productinfo text-center">-->
<!--                                    <img src="assets/images/home/recommend3.jpg" alt="" />-->
<!--                                    <h2>$56</h2>-->
<!--                                    <p>Easy Polo Black Edition</p>-->
<!--                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
<!--                                </div>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="item">-->
<!--                    <div class="col-sm-4">-->
<!--                        <div class="product-image-wrapper">-->
<!--                            <div class="single-products">-->
<!--                                <div class="productinfo text-center">-->
<!--                                    <img src="assets/images/home/recommend1.jpg" alt="" />-->
<!--                                    <h2>$56</h2>-->
<!--                                    <p>Easy Polo Black Edition</p>-->
<!--                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
<!--                                </div>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-sm-4">-->
<!--                        <div class="product-image-wrapper">-->
<!--                            <div class="single-products">-->
<!--                                <div class="productinfo text-center">-->
<!--                                    <img src="assets/images/home/recommend2.jpg" alt="" />-->
<!--                                    <h2>$56</h2>-->
<!--                                    <p>Easy Polo Black Edition</p>-->
<!--                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
<!--                                </div>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-sm-4">-->
<!--                        <div class="product-image-wrapper">-->
<!--                            <div class="single-products">-->
<!--                                <div class="productinfo text-center">-->
<!--                                    <img src="assets/images/home/recommend3.jpg" alt="" />-->
<!--                                    <h2>$56</h2>-->
<!--                                    <p>Easy Polo Black Edition</p>-->
<!--                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>-->
<!--                                </div>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">-->
<!--                <i class="fa fa-angle-left"></i>-->
<!--            </a>-->
<!--            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">-->
<!--                <i class="fa fa-angle-right"></i>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div><!--/recommended_items-->

</div>