<div class="tab-pane fade" id="tag">
    <?php
    $s_p = new user_profile(new Database());
    $img_pro = new user_profile(new Database());
    $user_product = $s_p->seller_products($_SESSION["user"]["id"]);
    foreach ($user_product as $product){
        $image = $img_pro->product_image($product["id"]);
    ?>
    <div class="col-sm-2">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img class="s" src=" <?php echo  $image["name"]?>" alt="">
                    <h2>$ <?php echo $product["price"]?></h2>
                    <p><?php echo $product["product_name"]?></p>
<!--                    <button type="button" class=""><i class="fa fa-shopping-cart"></i></button>-->
                    <a href="product.php?product=<?php echo $product["id"]?>" class="btn btn-default add-to-cart">View product</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>