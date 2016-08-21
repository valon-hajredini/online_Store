<?php

include "controllers/index_controller.php";
class Index2 extends Index_controller{
    public $all_products;
    public function __construct(Database $all_products){

    }
}
$ind = new Index2(new Database());
$conn = $ind->connectDB();


?>

<!DOCTYPE html>
<html>
<head>
    <title>

    </title>
    <style>
        #search{
            width:400px;
            padding:10px;
            display: block;
            margin:0 auto;
            display: block;
            margin-bottom:50px;

        }
        div#back_result{
            padding:10px;
            width: 400px;
            margin:0 auto;
            border:1px solid silver;

        }
    </style>
</head>
<body>
<form action="#" method="POST">
    <input type="text" name="search" id="search" placeholder="Search..">
</form>
<div id="back_result"></div>
    <script   src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
    <script>
       $(document).ready(function(){
           $('#search').keyup(function(){
               var name = $(this).val();
               $.post('get_users.php',{name:name}, function(data){

                    $('div#back_result').html(data);
                  
               });
           });
       });

    </script>
</body>
</html>