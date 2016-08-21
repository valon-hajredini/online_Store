<?php session_start();

if($_SESSION["user"] == null){header("Location:login_register.php");}
include "controllers/application_controller.php";

class user_profile extends Application_controller{
    public $data;
    public function __construct(Database $data){
        $this->data = $data;
    }
}
$users_cart = new user_profile(new Database());
$cat = new user_profile(new Database());
$categories = $cat->categories();
$address = new user_profile(new Database());
$addres = $address->find_address_by_user_id($_SESSION["user"]["id"]);

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
    <!--[if lt IE 9]>
    <script src="assets/scripts/html5shiv.js"></script>
    <script src="assets/scripts/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/ic ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->

    <?php require "partial_code/layout/headers.php"?>


</header><!--/header-->


<div class="container">
    <div class="row">


        <div class="col-sm-12 padding-right">
            <div class="product-details"><!--product-details-->
                <div class="col-sm-3">
                    <div class="view-product" id="profil_pic">
                        <?php if ($_SESSION["user"]["image"]){?>
                        <img src="<?php echo $_SESSION["user"]["image"]?>"width="200" height="260" alt="">
                        <?php }else { print_r($_SESSION["user"])?>
                            <img src="assets/images/home/user_profile.png" alt="">
                        <?php }?>
                        <p class="profile_name"><?php echo $_SESSION["user"]["emri"];?> <?php echo $_SESSION["user"]["mbiemri"];?></p>
                        <div id="upload_image">
                            <form action="controllers/User_profile_controller.php" method="POST" enctype="multipart/form-data">
                                <input type="file" name="user_images" id="user_images">
                                <input type="submit" value="submit"  name="upload_profile_image" class="btn btn-default" id="submit_image">
                            </form>
                        </div>
                    </div>


                </div>
                <div class="col-md-offset-1 col-sm-8">
                    <div class="product-information">
                        <div id="user_addres">


                            <div class="all_params">
                               <p><b>Emri Mbiemri: </b> <?php echo $_SESSION["user"]["emri"]?> <?php echo $_SESSION["user"]["mbiemri"]?></p>
                               <p><b>Email: </b> <?php echo $_SESSION["user"]["email"]?></p>
                                <div id="addresa_ajax"></div>

                            </div>
                            <p><a href="#" data-toggle="modal" data-target="#Address">Add Address</a></p>

                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="Address" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Shipment address</h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php if ($addres != 0){?>
                                            <div class="form-group">
                                                <label for="cantry">Cantry:</label>
                                                <input type="text" class="form-control" name="cantry" id="cantry" value="<?php echo $addres["cantry"]?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="city">City:</label>
                                                <input type="text" class="form-control" name="city" id="city" value="<?php echo $addres["city"]?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">ZIP:</label>
                                                <input type="number" class="form-control" name="zip" id="zip" value="<?php echo $addres["zip"]?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Phone number:</label>
                                                <input type="number" class="form-control" name="phone" id="phone" value="<?php echo $addres["phone"]?>">
                                            </div>
                                            <?php }else{?>

                                            <div class="form-group">
                                                <label for="cantry">Cantry:</label>
                                                <input type="text" class="form-control" name="cantry" id="cantry">
                                            </div>
                                            <div class="form-group">
                                                <label for="city">City:</label>
                                                <input type="text" class="form-control" name="city" id="city">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address:</label>
                                                <input type="text" class="form-control" name="address" id="address">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">ZIP:</label>
                                                <input type="number" class="form-control" name="zip" id="zip">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Phone number:</label>
                                                <input type="number" class="form-control" name="phone" id="phone">
                                            </div>
                                        <?php }?>
                                        <input type="hidden" name="user" value="<?php echo $_SESSION["user"]["id"]?>">


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <a href="#" onclick="add_update_address()" class="btn btn-success" data-dismiss="modal">Save</a>


                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>


                    </div><!--/product-information-->
                </div>
            </div><!--/product-details-->
            <div class="category-tab shop-details-tab"><!--category-tab-->
                <div class="col-sm-12">
                    <ul class="nav nav-tabs nav_user">
                        <?php $carta = $users_cart->cart($_SESSION["user"]["id"]);?>
                        <li class="active"><a href="#cart" data-toggle="tab">Cart </a></li>
<!--                        <li class=""><a href="#cart" data-toggle="tab">Cart</a></li>-->
                        <li class=""><a href="#tag" data-toggle="tab">Store</a></li>
                        <li  class=""><a href="#reviews" data-toggle="tab">Sell a new product</a></li>
                        <?php if ($_SESSION["user"]["category"] == "1"){?>
                        <li ><a href="#add_categorie" data-toggle="tab">Add a categorie</a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="tab-content">
                    <?php include "viewers/user/orders.php"?>

                    <?php include "viewers/user/cart.php"?>

                   <?php include "viewers/user/store.php"?>

                    <?php include "viewers/user/sell_product.php"?>

                    <?php include "viewers/user/add_categorie.php"?>

                </div>
            </div>


        </div>
    </div>
</div>

<?php include "partial_code/layout/footer.php" ?>



<?php include "assets/script.php"?>
<script>

    function add_update_address() {
        var cantry = document.getElementById('cantry').value;
        alert(cantry);
//        $.ajax({
//            url: "ajax.php",
//            type: 'POST',
//            data: {
//                submit_address: 'ok',
//                cantry: "Gjakov",
//                city: 'Gjakov',
//                address: 'Berjah',
//                zip: '50000',
//                phone: '123321'
//            },
//            success: function(){
//                console.log("success");
//            }
//        });
//        alert("is completed");

            var xhttp = new XMLHttpRequest();
            var category = document.getElementById("cantry").value;
            var city = document.getElementById("city").value;
            var address = document.getElementById("address").value;
            var zip = document.getElementById("zip").value;
            var phone = document.getElementById("phone").value;
            var form = document.getElementById("form").value;
//                var c = "ekoloni";
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("demo").innerHTML = xhttp.responseText;
                }
            };

            xhttp.open("GET", "ajax.php?cantry="+category+"&city="+city+"&zip="+zip+"&phone="+phone+"&form=on", true);
            xhttp.send();


    };
</script>
</body>
</html>