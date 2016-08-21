<?php
include "controllers/models/Application_model.php";
class  Test extends ApplicationModel{
public $test;
public function __construct(Database $test){

}
    public function users($param){
        $conn = $this->connectDB();
        $query = "SELECT * FROM users limit $param,3";
        $user = mysqli_query($conn, $query);
        return $user;
    }
    public function count_users(){
        $conn = $this->connectDB();
        $query = "SELECT * FROM users";
        $user = mysqli_query($conn, $query);
        return $user;
    }
    public function Pagination_param($param){
        if ($param == null || $param == "" || $param == 1){
            return 0;
        }else{
             $param = ($param*3) - 3;
            return $param;
        }

    }

}
//if (isset($_GET["page"])){
//    $page = $_GET["page"];
//}else{
//    $page = 1;
//}
//
//if ($page == "" || $page == 1 ){
//    $page = 0;
//
//}
//else{
//    $page = ($page*3) - 3;
//}
$page = new Test(new Database());

$t = new Test(new Database());
echo $page_param = $_GET["page"];
echo "<br>";
$all_user = $t->users($t->Pagination_param($page_param));

foreach ($all_user as $u){
    echo $u["id"]."->".$u["emri"];
    ?>
    <br>
    <?php

}
$t = new Test(new Database());
$a_user = $t->count_users();
$total = mysqli_num_rows($a_user);
$total = $total / 3;
$total =  ceil($total);
for ($i = 1; $i<= $total; $i++){
     ?>
    <a href="test.php?page=<?php echo $i?>"><?php echo $i?></a>
    <?php
}
?>