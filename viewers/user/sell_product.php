<div class="tab-pane fade " id="reviews">
    <div class="col-sm-12">
        <ul>
            <li><a href=""><i class="fa fa-clock-o"></i><?php echo date(" g:i a");?></a></li>
            <li><a href=""><i class="fa fa-calendar-o"></i><?php echo date('l \t\h\e jS');?></a></li>
        </ul>
        <p>Terms of use for selling the product</p>
        <p><b>Form for the seller to sell e new product</b></p>
<!-- Form for the seller -->
        <form action="controllers/products_controller.php" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="product_name" class="col-sm-2 form-control-label">Product name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product name">
                </div>
            </div>
            <div class="form-group row">
                <label for="product_category" class="col-sm-2 form-control-label">Category</label>
                <div class="col-sm-10">
                    <select class="selectpicker" data-live-search="true" name="product_category">
                        <?php foreach($categories as $category){?>
                        <option data-tokens="<?php $category["id"]?>" value="<?php echo $category["id"]?>"><?php echo  $category["category_name"]?></option>
                        <?php }?>

                    </select>


                </div>
            </div>
            <div class="form-group row">
                <label for="product_quantity" class="col-sm-2 form-control-label">Product Quantity</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="product_quantity" name="product_quantity" placeholder="Quantity">
                </div>
            </div>
            <div class="form-group row">
                <label for="product_price" class="col-sm-2 form-control-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="product_price" name="product_price" placeholder="Post price">
                </div>
            </div>
            <div class="form-group row">
                <label for="product_post_price" class="col-sm-2 form-control-label">Post price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="product_post_price" name="product_post_price" placeholder="Post price">
                </div>
            </div>

            <div class="form-group row">
                <label for="product_description" class="col-sm-2 form-control-label">Product description</label>
                <div class="col-sm-10">
                    <textarea class = "form-control" rows = "3" name="product_description" id="product_description" placeholder="Product description"></textarea>
                </div>
            </div>
            <div class="form-group row">

                <label for="Product_images" class="col-sm-2 form-control-label">Brows images</label>
                <div class="col-sm-10">
                    <input type="file" name="product_images" id="product_images" multiple>
                </div>

            </div>
            <div class="form-group row">
                <label class="col-sm-2">Public the product</label>
                <div class="col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Public
                        </label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION["user"]["id"]?> ">
            <div class="form-group row">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit" class="btn btn-secondary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>