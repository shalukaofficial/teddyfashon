<?php

session_start();
include "connection.php";

if (isset($_SESSION)) {

    $semail = $_SESSION["u"]["email"];

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
    $province = $_POST["province"];
    $district = $_POST["district"];
    $city = $_POST["city"];
    $postalCode = $_POST["postalCode"];

    if (empty($fname)) {
        echo ("Please fill your first Name.");
    } else if (empty($lname)) {
        echo ("Please fill your Last Name.");
    } else if (empty($mobile)) {
        echo ("Please fill your Mobile Number.");
    } else if (empty($address)) {
        echo ("Please fill your Address Line.");
    } else if (empty($province)) {
        echo ("Please fill your Province.");
    } else if (empty($district)) {
        echo ("Please fill your Districe.");
    } else if (empty($city)) {
        echo ("Please fill your City.");
    } else if (empty($postalCode)) {
        echo ("Please fill your Postal Code.");
    } else {
        $change = Database::iud("UPDATE `user` SET `fname` = '" . $fname . "' , `lname` = '" . $lname . "' , `mobile` = '" . $mobile . "' WHERE `email` = '" . $semail . "' ");


        $address_rs = Database::search("SELECT * FROM `address` WHERE `user_email` = '".$semail."' ");
        $address_num = $address_rs->num_rows;

        if ($address_num == 1) {
            Database::iud("UPDATE `address` SET `address_line` = '" . $address . "', `province_id` = '" . $province . "' , `district_id` = '" . $district . "' , `city` = '" . $city . "' , `postal_code` = '" . $postalCode . "' 
        WHERE `user_email` = '" . $semail . "'");
            echo ("updated");
        } else {
            Database::iud("INSERT INTO `address`(`address_line`,`city`,`user_email`,`district_id`,`postal_code`,`province_id`)
            VALUES('" . $address . "','" . $city . "','" . $semail . "','" . $district . "','" . $postalCode . "','" . $province . "') ");
            echo ("updated");
        }
        if (sizeof($_FILES) == 1) {

            $image = $_FILES["img"];
            $image_extension = $image["type"];
            $allowed_img_extensions = array("image/jpeg", "image/png", "image/svg+xml");

            if (in_array($image_extension, $allowed_img_extensions)) {
                $new_img_extension;

                if ($image_extension == "image/jpeg") {
                    $new_img_extension = ".jpeg";
                } else if ($image_extension == "image/png") {
                    $new_img_extension = ".png";
                } else if ($image_extension == "image/svg+xml") {
                    $new_img_extension = ".svg";
                }

                $file_name = "resources//profile_images//" . $fname . "_" . uniqid() . $new_img_extension;
                move_uploaded_file($image["tmp_name"], $file_name);

                $img_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $semail . "'");

                if ($img_rs->num_rows == 1) {
                    Database::iud("UPDATE `profile_image` SET `path`='" . $file_name . "' WHERE `user_email`='" . $semail . "'");
                    echo ("updated");
                } else {
                    Database::iud("INSERT INTO `profile_image`(`path`,`user_email`) VALUES ('" . $file_name . "','" . $semail . "')");
                    echo ("updated");
                }
            }
        }
    }
}
