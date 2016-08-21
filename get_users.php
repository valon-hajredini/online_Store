<?php
include "controllers/index_controller.php";
class Get_users extends Index_controller{
public $all_products;
public function __construct(Database $all_products){

}
}
$ind = new Get_users(new Database());
$conn = $ind->connectDB();
if ($_POST['name'] != ""){
$query = "SELECT * FROM users WHERE `emri` LIKE '%".$_POST["name"]."%'";
$result = mysqli_query($conn, $query);
foreach ($result as $user){
?>
<p><?php  echo $user['emri']?></p>
<?php }}?>
