<?php
session_start();
include "models/ProductModel.php";
class Product_controller extends ProductModel{
    public $products;
    public function __construct(Product_model $products){
            $this->products->$products;
    }


}

if (isset($_POST["submit"])){
    $user_id                = $_POST["user_id"];
    $product_name           = $_POST["product_name"];
    $product_category       = $_POST["product_category"];
    $product_quantity       = $_POST["product_quantity"];
    $product_price          = $_POST["product_price"];
    $product_post_price     = $_POST["product_post_price"];
    $product_description    = $_POST["product_description"];
    $product_images         = $_FILES["product_images"];
    $product_shipment_time  = "30";
    $product_shipment_date  = "111";
    $product_description = str_replace("'", "", $product_description);
    $new_product = new ProductModel(new Database());
    $product = ["user_id" => $user_id, "product_name" => $product_name, "product_description" => $product_description, "quantity" => $product_quantity, "category_id" => $product_category, "price" => $product_price, "post_price" => $product_post_price, "shipment_time" => $product_shipment_time, "shipment_date" => $product_shipment_date];
//    print_r ($product_images);
    $new_product->createProduct($product, $product_images );
    

echo "Action ok!";
}else if (isset($_POST["submit_category"])){
    $new_category = new ProductModel(new Database());
    $category_name          = $_POST["category_name"];
    $category_description   = $_POST["category_description"];
    $product = ["category_name" => $category_name, "category_descriptin" => $category_description];
    $new_category->createCategory($product );

}else if(isset($_POST["submit_review"])){
    print_r($_POST);
    $seller     = $_POST["seller"];
    $user       = $_POST["user"];
    $comment    = $_POST["comment"];
    $product    = $_POST["product"];
    $new_review = new ProductModel(new Database());
    $new_review->add_review($seller,$user,$product,$comment);
    
}else if (isset($_POST["add_to_cart"])){
    $user       = $_POST["user_id"];
    $product    = $_POST["product_id"];
    $cart = new ProductModel(new Database());
    $cart->add_to_cart($user,$product);
    echo "Product is ";


}

