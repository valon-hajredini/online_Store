<?php
session_start();
include "application_controller.php";
class UserProfile_Controller extends Application_controller{
    
}
$init_user = new UserProfile_Controller(new Database());
if ($_POST["upload_profile_image"]){
//    $_FILES["image"];
    $product_images         = $_FILES["user_images"];
//    print_r( $product_images);
   $_image =  $init_user->upload_profile_image($product_images);
    echo $_image;
    echo "<br>";
    $query = "UPDATE `users` SET `image` = '$_image' WHERE `users`.`id` = ".$_SESSION["user"]["id"]." ";
    if (mysqli_query($init_user->connectDB(),$query)){
        $_SESSION["user"] = $init_user->current_user("SELECT * FROM `users` where id = ".$_SESSION["user"]["id"]."  limit 1");
        header("Location: ../user_profile.php");
    }else {
        echo "Not ok";
    }

}
?>