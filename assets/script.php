<?php
script_load("jquery.js");
script_load("bootstrap.min.js");
script_load("jquery.scrollUp.min.js");
script_load("price-range.js");
script_load("jquery.prettyPhoto.js");
script_load("main.js");


function script_load($path_script){
    echo " <script src=\"assets/scripts/$path_script\" ></script >";
}

?>