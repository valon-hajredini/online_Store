<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title"><a href="shop.php">All</a></h4>
                </div>

            </div>
            <?php $ctategories = new Shop(new Database())?>
            <?php $all_categories = $ctategories->categories();?>
            <?php foreach($all_categories as $cat){?>

                <div class="panel panel-default">

                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="shop.php?product=<?php echo $cat["id"]?>"><?php echo $cat["category_name"]?></a></h4>
                    </div>

                </div>
            <?php }?>
        </div>
        <div class="price-range">
           
        </div>

        <div class="shipping text-center">
            <img src=" assets/images/home/posta.jpg" alt="" width="100%" />

        </div>
    </div>
</div>