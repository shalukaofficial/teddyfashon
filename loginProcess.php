<?php

session_start();
include "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

if(empty($email)){
    echo("Please enter your email address.");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo("Invalid email address.");
}else if(empty($password)){
    echo("Please enter your password.");
}else if(strlen($password) > 20 || strlen($password) < 5 ){
    echo("The password must contain 5 to 20 characters.");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `password`='".$password."'");
    $num = $rs->num_rows;

    if($num == 1){

        echo ("success");
        $data = $rs->fetch_assoc();
        $_SESSION["u"] = $data;

        if($rememberme == "true"){

            setcookie("email",$email,time()+(60*60*60*1));
            setcookie("password",$password,time()+(60*60*60*1));

        }

    }else{
        echo("Incorrect email adrress OR password.");
    }
}

?>