<?php

    include "connection.php";

    $email = $_POST["e"];
    $password1 = $_POST["p1"];
    $password2 = $_POST["p2"];
    $pvcode = $_POST["pvcode"];

    $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."'");
    $user_num = $user_rs->num_rows;
    $user_data = $user_rs->fetch_assoc();
    $unid = uniqid();

    if($user_num == '0'){
        echo("This email address is not registered.");
    }else if(empty($pvcode)){
        echo("Please enter your verification code.");
    }else if($user_data["verification_code"] != $pvcode){
        echo("Incorrect varification code.");
    }else if(empty($password1)){
        echo("Please enter your New Password.");
    }else if(strlen($password1) > 20 || strlen($password1) < 5 ){
        echo("The password must contain 5 to 20 characters.");
    }else if(empty($password2)){
        echo("Please Re-type your New Password.");
    }else if(strlen($password2) > 20 || strlen($password2) < 5 ){
        echo("The password must contain 5 to 20 characters.");
    }else if($password1 != $password2){
        echo("Your passwords do not match");
    }else{

        Database::iud("UPDATE `user` SET `password` = '".$password1."',`verification_code` = '".$unid."' WHERE `email` = '".$email."'");
        echo("success");

    }

?>