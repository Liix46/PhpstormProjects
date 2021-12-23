<?php
//print_r ($_SERVER);
//phpinfo();
$x = 10;
@include "functions.php";
if ( ! function_exists ("print_hello")){
    echo "<i>Runtime error </i>";
    exit;
}

function print_x(){
    global $x;
    echo $x;
}

$f = function(){
    return "Hello";
};

include_once "view.php";