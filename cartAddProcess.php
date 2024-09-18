<?php

session_start();

if(isset($_SESSION["u"])){

    $pid = $_GET["id"];
    $email = $_SESSION["u"]["email"];

    include "connection.php";
    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `cart_product_id` = '".$pid."' AND `user_email` = '".$email."' ");
    $cart_num = $cart_rs->num_rows;
    $cart_data = $cart_rs->fetch_assoc();

    if($cart_num >= 1){
        echo("cart update");

    }else{
        Database::iud("INSERT INTO `cart`(`cart_qty`,`user_email`,`cart_product_id`) 
        VALUES('1','".$email."','".$pid."') ");
        echo("cart add");
    }

}else{
    echo("Please login.");
}

?>