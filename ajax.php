<?php
session_start();
echo    $cantry         = $_GET['cantry'];
echo    $city           = $_GET['city'];
echo    $address        = $_GET['address'];
echo    $zip            = $_GET['zip'];
echo    $phone          = $_GET['phone'];
echo    $user           = $_SESSION["user"]["id"];
print_r($_GET);
$_SESSION['test'] =$address;
include "controllers/application_controller.php";
class Ajax extends Application_controller{
    public $ajax;
    public function __construct(Database $ajax){

    }
    public function add_address($user, $cantry, $city, $zip, $phone){
    $conn = $this->connectDB();
     if ($this->address($user)["user_id"] != $user){
        $query = "INSERT INTO `user_addres` (`user_id`, `cantry`, `city`, `zip`, `phone`) VALUES ('$user', '$cantry', '$city', '$zip', '$phone')";
     echo "new<br>";
     }else{
         $query = "UPDATE `user_addres` SET  `cantry` = '$cantry', `city` = '$city', `zip` = '$zip', `phone` = '$phone' WHERE `user_addres`.`user_id` = '$user'";
        echo "update<br>";
     }
        print_r($this->address($user));
         if (mysqli_query($conn, $query)){
        echo $query;
    }else {
        echo "Not ok";
    }
    }

}
if ($_GET["form"] == 'on') {
    $insert_Address = new Ajax(new Database());
    $insert_Address->add_address($user, $cantry, $city, $zip, $phone);
}
    $conn = new Ajax(new Database());
    $address = $conn->address($_SESSION["user"]["id"]);
    ?>
    <h2>Your shiping address</h2>
    <p><?php echo $_SESSION["user"]["id"] ?></p>
    <p><b>Name: </b> <?php $_SESSION["user"]["emri"]; ?></p>
    <p><b>Last name: </b> <?php $_SESSION["user"]["mbiemri"]; ?></p>
    <p><b>Email: </b> <?php $_SESSION["user"]["email"]; ?></p>
    <p><b>Phone: </b><?php $address["phone"] ?></p>
    <p><b>Cantry: </b><?php $address["cantry"] ?></p>
    <p><b>City: </b><?php $address["city"] ?></p>
    <p><b>Zip Code: </b><?php $address["zip"] ?></p>
    <br>
    <?php print_r($_POST) ?>


    <?php



?>

