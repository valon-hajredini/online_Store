<?php

class Database{
    private $host       = "localhost";
    private $username   = 'root';
    private $password   = "";
    public $database    = 'onlinestore';

    public function connectDB(){
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database)or die("Conecten with database has tailed");
        return $conn ;

    }
    public function last($table){
        $query = "SELECT * FROM $table ORDER BY id DESC limit 1";
        $result = mysqli_query($this->connectDB(), $query);
        if ($result){
            $row = mysqli_fetch_assoc($result);
            return $row;
        }else{
            return "0";
        }

    }
//    Ban rediredt te produkti i krijuar
    public function header_to_product($product_id){
        header("Location: ../product.php?product=$product_id");
    }
    public function query($sql){

        if (mysqli_query($this->connectDB(),$sql) ){
            echo "Sucssess created";
            header("Location: ../index.php");

        }else{
            echo "is not created";
        }



    }
    public function userquery($sql){

        if (mysqli_query($this->connectDB(),$sql) ){
//            echo "Sucssess created";
            $new_user = $this->last("users");
            $_SESSION["user"] = $new_user;
            header("Location: ../user_profile.php");

        }else{
            echo "is not created";
        }



    }
    public function upload_product_image($image){

        $image_name     = $image["name"];
        $image_type     = $image["type"];
        $image_tmp_name = $image["tmp_name"];
        $image_error    = $image["error"];
        $image_size     = $image["size"];
        if (!file_exists('../public/products/'.$_SESSION["user"]["id"].'/')) {
            mkdir('../public/products/'.$_SESSION["user"]["id"].'/', 0777, true);
        }
            if(($image_name)and (($image_type == "image/png")or ($image_type == "image/jpg")or ($image_type == "image/jpeg")) and $image_size < 5000000) {
                move_uploaded_file($image_tmp_name, '../public/products/'.$_SESSION["user"]["id"].'/'.$image_name.'');

                echo  'public/products/'.$_SESSION["user"]["id"].'/'.$image_name.'<br>';
                $time = time();
                rename('../public/products/'.$_SESSION["user"]["id"].'/'.$image_name.'', '../public/products/'.$_SESSION["user"]["id"].'/'.$time.'_'.$image_name.'');
                return 'public/products/'.$_SESSION["user"]["id"].'/'.$time.'_'.$image_name.'';
            }else{
                header("Location: ../user_profile.php?error=".$image_error."&type=$image_type&size=$image_size");
                return $image_error;
            }



    }
    public function upload_profile_image(array  $image){
        $image_name     = $image["name"];
        $image_type     = $image["type"];
        $image_tmp_name = $image["tmp_name"];
        $image_error    = $image["error"];
        $image_size     = $image["size"];
        if (!file_exists('../public/users/')) {
            mkdir('../public/users/', 0777, true);
        }
        if(($image_name)and (($image_type == "image/png")or ($image_type == "image/jpg")or ($image_type == "image/jpeg")) and $image_size < 5000000) {
            move_uploaded_file($image_tmp_name, '../public/users/'.$image_name.'');

//            echo  'public/userssss/'.$image_name.'';
            $time = time();
            rename('../public/users/'.$image_name.'', '../public/users/'.$time.'_'.$image_name.'');
            return 'public/users/'.$time.'_'.$image_name.'';
        }else{
            header("Location: ../user_profile.php?error=".$image_error."&type=$image_type&size=$image_size");
            return $image_error;
        }

    }
    public function productQuery($sql, $image){

        if (mysqli_query($this->connectDB(),$sql) ){
            $pro = $this->last('products');
          $image=   $this->upload_product_image($image);

            $query = "INSERT INTO `product_images` (`id`, `product_id`, `name`, `created_at`, `updated_at`) VALUES (NULL, '".$pro["id"]."', '".$image."', '','');";
            if (mysqli_query($this->connectDB(),$query)){
            $this->header_to_product($pro["id"]);
            }

        }else{
            echo "is not created ,Query=".$sql;
        }

    }
    public function categories(){
        $query = "SELECT * FROM `categories`";
        $result = mysqli_query($this->connectDB(), $query);
        return $result;
    }
    public function categoryQuery($sql){

        if (mysqli_query($this->connectDB(),$sql) ){
           header("Location: ../user_profile.php?category=created");
        }else{
            echo "is not created";
        }

    }
    public function seller($user_id){
        $conn = $this->connectDB();
        $query = "SELECT * FROM `users` where id = ".$user_id."  limit 1";
        $result = mysqli_query($conn, $query);
        if ($result){
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }
    public function address($user_id){
        $conn = $this->connectDB();
        $query = "SELECT * FROM `user_addres` where user_id = ".$user_id."  limit 1";
        $result = mysqli_query($conn, $query);
        if ($result){
            $row = mysqli_fetch_assoc($result);
            return $row;
        }else{
            return null;
        }
    }
    public function current_user($query){
        $conn = $this->dataase->connectDB();
        $result = mysqli_query($conn, $query);
        if ($result){
            $row = mysqli_fetch_assoc($result);
            return $row;
        }else{
            "Nuk u logua";
        }
    }

    public function image($id){
        $conn =    $this->connectDB();
        $query = "SELECT * FROM `product_images` WHERE product_id = $id limit 1";
        $result = mysqli_query($conn, $query);
        if ($result){
            $row = mysqli_fetch_assoc($result);
            return $row;
        }else{
            return "0";
        }

    }
    public function review($product_id){
//        $conn = $this->connectDB();
        $query = "SELECT * FROM `review` WHERE   `product_id`= $product_id ORDER BY id DESC";
        $result = mysqli_query($this->connectDB(), $query);
        return $result;
    }
    public function comments($prod_id){
        $conn =    $this->connectDB();
        $query = "SELECT * FROM `review` WHERE `product_id` = $prod_id ORDER BY id DESC";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function create(array $data){
        $query = "INSERT INTO `users` (`id`, `emri`, `mbiemri`, `email`, `password`) VALUES (NULL, '".$data["emri"]."', '".$data["mbiemri"]."', '".$data["email"]."', '".$data["password"]."')";
        $this->dataase->userquery($query);

    }
   
}