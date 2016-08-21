<?php
css_load("bootstrap.min.css");
css_load("font-awesome.min.css");
css_load("prettyPhoto.css");
css_load("prettyPhoto.css");
css_load("animate.css");
css_load("main.css");
css_load("responsive.css");

function css_load($path_script){
    echo " <link href=\"assets/stylesheets/$path_script\" rel=\"stylesheet\">";
}

?>

