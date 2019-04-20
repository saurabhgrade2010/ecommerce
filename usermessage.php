<?php
session_start();
require 'phpmailer/PHPMailerAutoload.php';
include "db.php";
$id=$_SESSION["uid"];
$email=$_SESSION["email"];
$msg=$_POST["msg"];
$sql="INSERT INTO `chating`(`user_id`,`usermsg`) VALUES('$id','$msg')";
if(mysqli_query($con,$sql)>0)
{
	/*$email1="rajputji2010@gmail.com";
	                       $mail = new PHPMailer();
                           $mail->Host = "smtp.gmail.com";
                           $mail->isSMTP();
                           $mail->SMTPAuth = true;
                           $mail->Username = "saurabhgrade2010@gmail.com";
                           $mail->Password = "Grade1234@";
                           $mail->SMTPSecure = "ssl";
                           $mail->Port = "465";
                           $mail-> addAddress($email1);
                           $mail-> setFrom('saurabhgrade2010@gmail.com', 'user message');
                           $mail->Subject = "Message...";
                           $mail->isHTML(true);	   
                           $mail->Body = "you have a message from ".$email."<br>".$msg;
						   if($mail->send())
	                       {*/
					       header("location:message.php");
}
else
{
	  header("location:message.php");
}
?>