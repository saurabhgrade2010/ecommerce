<?php
    session_start();
    include('db.php'); 
    $email = $_POST['email'];
    $query = "SELECT * FROM user_info WHERE email='$email'";
    $fire = mysqli_query($con,$query);
    $count = mysqli_num_rows($fire);
    $result = mysqli_fetch_assoc($fire);
    if($count > 0){
            $str = "0123456789qwertyuiopasdfghjklzmcnb";
            $str = str_shuffle($str);
            $str = substr($str, 0, 6);
			$ptr=$str;
			$password=$str;
            $str= md5($str);
            //$url = "https://bcamlt.ml/data/resetPassword.php?token=$str&alemail=$email";
            $query = "UPDATE user_info SET password='$str' WHERE email='$email'";
            $fire = mysqli_query($con,$query);

    require 'phpmailer/PHPMailerAutoload.php';
    
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
         echo "Mail_Sent_Successfully";
		 exit();	 
    }
   }
    else
    {
        $msg = "<b class='alert alert-danger fade in'>User Not Found</b>";
		echo $msg;
		exit();
    }
?>