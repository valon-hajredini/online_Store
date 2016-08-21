<?php
    $s = new Index(new Database());
    $find_product = new Index(new Database());
    $prod_img = new Index(new Database());
    $slide_count = $s->slide();
    $slide = $s->slide();
?>
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                        $count = 0;
                        foreach ($slide_count as $c){
                        if ($count == 0 ){
                        ?>
                        <li data-target="#slider-carousel" data-slide-to="<?php echo $count?>" class="active"></li>
                            <?php
                            $count = $count + 1;
                        } else{

                        ?>
                        <li data-target="#slider-carousel" data-slide-to="<?php echo $count?>"></li>
                            <?php
                            $count = $count + 1;
                        }
                        }
                        ?>

                    </ol>

                    <div class="carousel-inner">
                        <?php
                        $count = 1;
                        foreach ($slide as $s){
                            $slide_product = $find_product->find($s["product_id"], "products");
                            $img = $prod_img->product_image($slide_product["id"]);
                            if ($count == 1 ){

                                ?>
                                <div class="item active">
                                    <div class="col-sm-6">
                                        <h1><?php echo $slide_product["product_name"]?></h1>
                                        <h2>$ <?php echo $slide_product["price"]?></h2>
                                        <p class="giveMeEllipsis">
                                            <?php echo $slide_product["product_description"]?>
                                        </p>
                                        <!--                                <button type="button" class="btn btn-default get">Get it now</button>-->
                                        <a href="product.php?product=<?php echo $slide_product["id"]?>" class="btn btn-default get"">Get it now</a>

                                    </div>
                                    <div class="col-sm-6">
                                        <div style="height: 220px">
                                            <img src="<?php echo  $img["name"]?>" class="girl img-responsive" height="100" alt="" />
                                        </div>
                                        <!--<img src="images/home/pricing.png"  class="pricing" alt="" />-->
                                    </div>
                                </div>
                                <?php
                                $count = $count + 1;
                            } else{

                        ?>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><?php echo $slide_product["product_name"]?></h1>
                                <h2>$ <?php echo $slide_product["price"]?></h2>
                                <p class="giveMeEllipsis">
                                    <?php echo $slide_product["product_description"]?>
                                </p>
<!--                                <button type="button" class="btn btn-default get">Get it now</button>-->
                                <a href="product.php?product=<?php echo $slide_product["id"]?>" class="btn btn-default get"">Get it now</a>
                            </div>
                            <div class="col-sm-6">
                                <div style="height: 220px">
                                    <img src="<?php echo  $img["name"]?>" class="girl img-responsive" height="100" alt="" />

                                </div>
                            </div>
                        </div>

                        <?php
                                $count = $count + 1;
                            }
                        }
                        ?>
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>

        </div>
    </div>
</section><!--/slider-->