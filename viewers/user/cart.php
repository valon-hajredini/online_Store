<div class="tab-pane fade active in" id="cart">
    <?php


    foreach ($carta as $c ){
        $prod = new user_profile(new Database());
        $img = new user_profile(new Database());
        $produkt = $prod->find($c["product_id"],"products");


    ?>
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>Product</th>
                <th>Product</th>
                <th>Order time</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div class="product_mini">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-4" >
                                    <img src="<?php echo $img->product_image($produkt["id"])["name"]?>" alt="" style="width: 100%;margin-top:10px;
                                                    margin-right: 10px;border:1px solid #8d8d89;padding:3px">
                                </div>
                                <div class="col-md-offset-1 col-xs-offset-1 col-mxs-offset-1 col-md-7 col-sm-7 col-xs-7">
                                    <p><b>Product name</b>: <?php echo $produkt["product_name"];?> </p>
                                    <p> <b>Price: </b><?php echo $produkt["price"];?> $ </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <p><a href="product.php?product=<?php echo $produkt["id"]?>">View product</a></p>
                </td>
                <td>
                    <p><b>You ordert in</b></p>
                    <p><?php echo $c["created_at"]?></p>
                </td>
            </tr>

            </tbody>
        </table>
    <?php }?>
</div>