<div class="tab-pane fade " id="add_categorie">
    <div class="col-sm-12">
        
        <p>Terms of use for selling the product</p>
        <p><b>Add a new Category</b></p>
        <!-- Form for the seller -->
        <form action="controllers/products_controller.php" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="product_name" class="col-sm-2 form-control-label">Category name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category name">
                </div>
            </div>

            <div class="form-group row">
                <label for="product_description" class="col-sm-2 form-control-label">Category description</label>
                <div class="col-sm-10">
                    <textarea class = "form-control" rows = "3" name="category_description" id="category_description" placeholder="Category description"></textarea>
                </div>
            </div>

            <input type="hidden" name="user_id" value="<?php echo $_SESSION["user"]["id"]?> ">
            <div class="form-group row">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="submit_category" class="btn btn-secondary">Save Category</button>
                </div>
            </div>
        </form>
    </div>
</div>