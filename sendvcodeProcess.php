<?php

$email = $_GET["e"];

include "connection.php";

include "SMTP.php";
include "PHPMailer.php";
include "Exception.php";


use PHPMailer\PHPMailer\PHPMailer;

$user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."'");
$user_num = $user_rs->num_rows;

$vcode = uniqid();

if(empty($email)){
    echo("Please enter your Email.");
}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Addrres.");
}else{
    if($user_num == '1'){

        Database::iud("UPDATE `user` SET `verification_code` = '".$vcode."' WHERE `email` = '".$email."'");

         // email code
         $mail = new PHPMailer;
         $mail->IsSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->Username = 'shalukaroshan76@gmail.com';
         $mail->Password = 'egfxoqwapdlsaxrx';
         $mail->SMTPSecure = 'ssl';
         $mail->Port = 465;
         $mail->setFrom('shalukaroshan76@gmail.com', 'Teddy Fashon || Community');
         $mail->addReplyTo('shalukaroshan76@gmail.com', 'Teddy Fashon || Community');
         $mail->addAddress($email);
         $mail->isHTML(true);
         $mail->Subject = 'Teddy Fashon Forgot Password Verification Code';
         $bodyContent = '<h1 style="color: rgb(255, 0, 200);font-family: Segoe UI;">Your Verification Code Is : ' . $vcode . '</h1>';
         $mail->Body    = $bodyContent;



      if(!$mail->send()){
         echo ("Email sent Failed.");
      }else{
         echo ("success");
      }
        
    }else{
        echo("This email address is not registered.");
    }
}


?>