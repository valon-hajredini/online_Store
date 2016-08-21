<?php $items = new Index(new Database()) ?>
<?php //$seller_items =?>
<?php $recument = $items->random_products()?>

<?php if ($num_rows = mysqli_num_rows($recument) > 0 ){?>
    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">recommended items</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <?php $row = 1; ?>
                <?php foreach ($recument as $re_product){?>

                <?php if($row <= 3){ ?>
                    <?php if ($row == 1 ){
                        echo ' <div class="item active">';
                    }?>

                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <a href="<?php echo "product.php?product=".$re_product["id"].""?>" class="index_products">
                                    <div class="productinfo text-center">
                                        <?php $img = $items->image($re_product["id"])?>
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
                <?php }else if (($row >3) and ($row <= 6) ){?>
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
                                        <?php $img = $items->image($re_product["id"])?>
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
                } else if (($row >6) and ($row <= 9) ){?>
                <?php
                if ($row == 7){
                    echo '</div><div class="item">';
                }
                ?>

                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <a href="<?php echo "product.php?product=".$re_product["id"].""?>" class="index_products">
                                    <div class="productinfo text-center">
                                        <?php $img = $items->image($re_product["id"])?>
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
                    
                    }
                    }?>


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