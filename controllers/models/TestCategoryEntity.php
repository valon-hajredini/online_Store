<?php
///**
// * Created by PhpStorm.
// * User: Valon Hajredini
// * Date: 5/9/2016
// * Time: 12:16 PM
// */
//include "database/Database.php";
//include "entity/Category.php";
//
//function findAllCategory(){
//    $rezultdb = new Database();
//    $rezult = $rezultdb->categories();
//    $categorys = array();
//    foreach ($rezult as $rreshti){
//        $category = new Category();
//        $category->setId($rreshti['id']);
//        $category->setName($rreshti['category_name']);
//        $category->setDescription($rreshti['category_descriptin']);
//        $category->setCreatedAt($rreshti['created_at']);
//        $category->setUpdatedAt($rreshti['updated_at']);
//        array_push($categorys, $category);
//    }
//    return $categorys;
//}
//
//    $all = findAllCategory();
//    foreach ($all as $category ){
//        $cat = new $category( );
////        $c = get_object_vars($category );
//        echo "<pre>";
//        print_r( $cat);
////            echo $category["id"];
//        echo "</pre>";
//    }
//
//?>


