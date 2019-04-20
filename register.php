<?php
session_start();
require 'phpmailer/PHPMailerAutoload.php';
include "db.php";
if (isset($_POST["f_name"])) 
{
    $f_name = $_POST["f_name"];
	$l_name = $_POST["l_name"];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$user_img=$_POST["user_img"];
	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";
	$atr=$f_name." ".$l_name." ".$email;

   if(empty($f_name) || empty($l_name) || empty($email) ||
	 empty($mobile) || empty($address1) || empty($address2) || empty($user_img)){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	} 
	else 
	{
		if(!preg_match($name,$f_name))
		{
		  echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $f_name is not valid..!</b>
			</div>
		  ";
		   exit();
	    }
	   if(!preg_match($name,$l_name))
	   {
		  echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $l_name is not valid..!</b>
			</div>
	    	";
		  exit();
	   }
	   if(!preg_match($emailValidation,$email))
	   {
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $email is not valid..!</b>
			</div>
		 ";
		exit();
	   }
	  /*  if(strlen($password) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is weak</b>
			</div>
		";
		exit();
	    }
	    if(strlen($repassword) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Password is weak</b>
			</div>
		";
		exit();
	    }
	    if($password != $repassword){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>password is not same</b>
			</div>
		";
	    }*/
	    if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number $mobile is not valid</b>
			</div>
		";
		exit();
	    }
	    if(!(strlen($mobile) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 10 digit</b>
			</div>
		";
		exit();
	    }
		$sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1" ;
	   $check_query = mysqli_query($con,$sql);
	    $count_email = mysqli_num_rows($check_query);
	     if($count_email > 0)
	    {
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Email Address is already available Try Another email address</b>
			</div>
		";
		exit();
	    } 
     	else 
    	{
		    $str = "HJEISSNCLER01234567893PORTYHJDKSMNCBCXASEWDONDNKSDLDAENJORDW65378291023";
            $str = str_shuffle($str);
            $str = substr($str, 0,6);
			$ptr=$str;
			$password=$str;
            $str= md5($password);
            //$url = "https://bcamlt.ml/data/resetPassword.php?token=$str&alemail=$email";
		    $sql = "INSERT INTO `user_info` 
		          (`user_id`, `first_name`, `last_name`, `email`, 
		          `password`, `mobile`, `address1`, `address2`,`img`) 
		           VALUES (NULL, '$f_name', '$l_name', '$email', 
		          '$str', '$mobile', '$address1', '$address2','$user_img')";
		          $run_query = mysqli_query($con,$sql);
		         // $_SESSION["uid"] = mysqli_insert_id($con);
		         // $_SESSION["name"] = $f_name;
		          $ip_add = getenv("REMOTE_ADDR");
		    //$sql = "UPDATE cart SET user_id = '$_SESSION[uid]' WHERE ip_add='$ip_add' AND user_id = -1";
		    //if(mysqli_query($con,$sql))
		    //{
               $mail = new PHPMailer();
               $mail->Host = "smtp.gmail.com";
               $mail->isSMTP();
               $mail->SMTPAuth = true;
               $mail->Username = "saurabhgrade2010@gmail.com";
               $mail->Password = "Grade1234@";
               $mail->SMTPSecure = "ssl";
               $mail->Port = "465";
               $mail-> addAddress($email);
               $mail-> setFrom('saurabhgrade2010@gmail.com', 'R_Saurabh');
               $mail->Subject = "Reset Your Password.";
               $mail->isHTML(true);
               $mail->Body = "$ptr";
               if(!$mail->send())
	           {
		            echo "<b class='alert alert-danger'>Mail not Send.....try again</b>";
		            exit();
	           }
               else
	           {
                  echo "register_success";
			   exit();
               }
		    //}
	}}
}
 ?>