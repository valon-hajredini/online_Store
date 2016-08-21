<?php


include "database/Database.php";
class ApplicationModel extends Database{
    public $dataase;
    public function __construct(Database $database ){
        $this->dataase = $database;
    }
   public function find($id, $table){
       $query = "SELECT * FROM $table WHERE id= '".$id."'ORDER BY id DESC limit 1";
       $result = mysqli_query($this->connectDB(), $query);
       if ($result){
           $row = mysqli_fetch_assoc($result);
           return $row;
       }else{
           return "0";
       }
   }
    public function find_address_by_user_id($user_id){
        $query = "SELECT * FROM `user_addres` WHERE `user_id` = $user_id";
        $result = mysqli_query($this->connectDB(), $query);
        if ($result){
            $row = mysqli_fetch_assoc($result);
            return $row;
        }else{
            return "0";
        }

    }
    public function recumendet_items($seller_id, $category_id){
        $query = "SELECT * FROM `products` WHERE `user_id` = $seller_id and`category_id` = $category_id  ORDER BY id DESC limit 9";
        $result = mysqli_query($this->connectDB(), $query);
        return $result;
    }
    public function review($product_id){
//        $conn = $this->connectDB();
        $query = "SELECT * FROM `review` WHERE   `product_id`= $product_id ORDER BY id DESC";
        $result = mysqli_query($this->connectDB(), $query);
        return $result;
    }
    public function add_review($seller, $user, $product ,$comment){
        $query = "INSERT INTO `review` (`user_id`, `seller_id`, `product_id`, `comment`) VALUES ( '".$user."', '".$seller."', '".$product."', '".$comment."');";
        $result = mysqli_query($this->connectDB(), $query);
        if ($result){
            header("Location:../product.php?product=$product");
        }
    }
    public function random_products(){
        $conn = $this->connectDB();
        $query = "SELECT * FROM products ORDER BY rand() LIMIT 9";
        $result = mysqli_query($conn, $query);
        return $result;

    }
    public  function cart($user_id){
        $conn = $this->connectDB();
        $query = "SELECT * FROM `cart_product` WHERE `user_id` = $user_id";
        $result  = mysqli_query($conn, $query);
        return $result;
    }
    public function product_image($product_id){
        $conn  = $this->connectDB();
        $query = "SELECT * FROM `product_images` WHERE `product_id` = $product_id LIMIT 1";
        $result = mysqli_query($conn, $query);
        if ($result){
            $row = mysqli_fetch_assoc($result);
            return $row;
        }else{
            return "0";
        }
    }
    public function seller_products($user_id){
    $conn = $this->connectDB();
        $query = "SELECT * FROM `products` WHERE `user_id` = $user_id";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function slide(){
        $conn = $this->connectDB();
        $query = "SELECT * FROM `slide_offer`";
        $result = mysqli_query($conn, $query);
        return $result;
    }
   
}