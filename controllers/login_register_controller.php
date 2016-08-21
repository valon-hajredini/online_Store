<?php
session_start();
include "models/Login_Register_Model.php";
class login_register_controller extends LoginRegisterModel{

    public function login_user($email, $password){
        header("Location:index2.php");

    }
}

if(isset($_POST["submit"])){
    $name       = $_POST["fName"];
    $lastname   = $_POST["lName"];
    $email      = $_POST["email"];


    $password   =  md5($_POST["password"]);



    $name       = ucfirst($name);
    $lastname   = ucfirst($lastname);
    $user = new LoginRegisterModel(new Database());
    $userController = new login_register_controller(new Database());

    if($user->create(["emri" => $name, "mbiemri"=>$lastname,"email"=> $email, "password"=>$password])){
    $current_user =   $use->current_user("SELECT * from users where email = '".$email."' and password = '".$password."'");
    print_r($current_user);
//        echo "bla bla bla";
    $_SESSION["user"] = $current_user;
    header(" n:../user_profile.php");
    }
}
if (isset($_POST["login_submit"])){
//    header("Location: ../login_register.php?error=1");
    $email = $_POST["email"];
    $password = $_POST["password"];
    $okay = preg_match(
        '/^[A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/', $email
    );
    if ($okay) {
        header("Location: ../login_register.php?error=1");
    }else{
        header("Location: ../login_register.php?error=2");
    }
//    $userController->login_user($email, $password);
    $use = new LoginRegisterModel(new Database());
   $current_user =   $use->current_user("SELECT * from users where email = '".$email."' and password = '". md5($password)."'");
//    print_r($current_user);
 $_SESSION["user"] = $current_user;

    header("Location:../user_profile.php");
}


?>