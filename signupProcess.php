<?php

include "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$password = $_POST["p"];
$mobile = $_POST["m"];
$gender = $_POST["g"];

if (empty($fname)) {
    echo ("Please enter your First Name.");
} else if (strlen($fname) > 20) {
    echo ("First Name must contain LOWER THAN 20 characters.");
} else if (empty($lname)) {
    echo ("Please enter your Last Name.");
} else if (strlen($lname) > 20) {
    echo ("Last Name must contain LOWER THAN 20 characters.");
} else if (empty($email)) {
    echo ("Please enter yourEmail Address.");
} else if (strlen($email) > 100) {
    echo ("Email must contain LOWER THAN 100 characters.");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Addrres.");
} else if (empty($password)) {
    echo ("Please enter your password.");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("The password must contain 5 to 20 characters.");
} else if (empty($mobile)) {
    echo ("Please enter your Mobile Number.");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Invalid Mobile Number.");
} else {
    $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."' OR `mobile` = '".$mobile."'");
    $user_num = $user_rs->num_rows;

    if ($user_num > 0) {

        echo ("User with the same Email Address or Mobile Number already exists.");

    } else {

        
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user`(`fname`,`lname`,`email`,`password`,`mobile`,`gender_id`,`joined_date`,`status_id`) 
        VALUES('".$fname."','".$lname."','".$email."','".$password."','".$mobile."','".$gender."','".$date."','1')");

        echo("success");
    }
}
