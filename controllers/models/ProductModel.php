<?php
include "Application_model.php";
class ProductModel extends ApplicationModel{


    public function createProduct(array $data, array $image){
        $query= "INSERT INTO `products` (`id`, `user_id`, `product_name`, `product_description`, `quantity`, `category_id`, `price`, `post_price`, `shipment_time`, `shipment_date`, `created_at`, `updated_at`) VALUES (NULL, '".$data["user_id"]."', '".$data["product_name"]."', '".$data["product_description"]."', '".$data["quantity"]."', '".$data["category_id"]."', '".$data["price"]."', '".$data["post_price"]."','".$data["shipment_time"]."', '".$data["shipment_date"]."', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
        $this->productQuery($query, $image);
        
    }
    public function createCategory(array $data){
        $query = "INSERT INTO `categories` (`id`, `category_name`, `category_descriptin`, `created_at`, `updated_at`) VALUES (NULL, '".$data["category_name"]."', '".$data["category_descriptin"]."', CURRENT_TIMESTAMP, '')";
        $this->dataase->categoryQuery($query);
    }
    public function add_to_cart($user, $product){
        $conn  = $this->connectDB();
        $querty = "INSERT INTO `cart_product` (`user_id`, `product_id`) VALUES ( '".$user."', '".$product."')";
        $result = mysqli_query($conn, $querty);
        echo $user."<br>".$product;
        if ($result){
            header("Location: ../index.php");
        }

    }
}
