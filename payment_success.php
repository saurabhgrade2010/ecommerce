<?php
session_start();
require 'phpmailer/PHPMailerAutoload.php';
if(isset($_SESSION["uid"]))
{
	   include "db.php";
	    //header("location:index.php");
		$name1=$_POST["name1"];
		$address1=$_POST["address1"];
		$adddress2=$_POST["address2"];
		$mobile=$_POST["mobile1"];
		$user_id=$_SESSION["uid"];
		$email=$_SESSION["email"];
		$str = "HJEISSNCLER01234567893PORTYHJDKSMNCBCXASEWDONDNKSDLDAENJORDW65378291023";
            $str = str_shuffle($str);
            $str = substr($str, 0,17);
			$sql="select * from shiping1 where user_id='$user_id'";
			$resul=mysqli_query($con,$sql);
			if(mysqli_num_rows($resul)>0)
			{
				$sql1="update shiping1 set name='$name1',address1='$address1',address2='$adddress2',mobile='$mobile' where user_id='$user_id'";
			    mysqli_query($con,$sql1);
			}
			else{
			$sql1="INSERT INTO shiping1 (user_id,name,address1,address2,mobile) VALUES ('$user_id','$name1','$address1','$adddress2','$mobile')";
			mysqli_query($con,$sql1);
			}
		$sql = "SELECT p_id,qty FROM cart WHERE user_id ='$user_id'";
		$query = mysqli_query($con,$sql);
		if (mysqli_num_rows($query) > 0) 
		{
			while ($row=mysqli_fetch_array($query)) 
			{
			   $product_id[] = $row["p_id"];
			   $qty[] = $row["qty"];
			}
            $x=0;
			for ($i=0; $i < count($product_id); $i++) 
			{ 
				$sql = "INSERT INTO orders (user_id,product_id,qty,trx_id,STATUS) VALUES ('$user_id','".$product_id[$i]."','".$qty[$i]."','$str','$x')";
				mysqli_query($con,$sql);
			}
			if($i==count($product_id))
			{
			$mail = new PHPMailer();
               $mail->Host = "smtp.gmail.com";
               $mail->isSMTP();
               $mail->SMTPAuth = true;
               $mail->Username = "saurabhgrade2010@gmail.com";
               $mail->Password = "Grade1234@";
               $mail->SMTPSecure = "ssl";
               $mail->Port = "465";
               $mail-> addAddress($email);
               $mail-> setFrom('saurabhgrade2010@gmail.com', 'SGR.com');
               $mail->Subject = "About your Order...";
               $mail->isHTML(true);
               $mail->Body = "Hello ,Your payment process is 
							successfully completed"." "."$str";
               if($mail->send())
	           {
		            echo "<b class='alert alert-danger'>Mail not Send.....try again</b>";
	           }
			}
		}
			$sql = "DELETE FROM cart WHERE user_id = '$user_id'";
			if (mysqli_query($con,$sql)) 
			{
				?>
					<!DOCTYPE html>
					<html>
						<head>
							<meta charset="UTF-8">
							<title>Online Selling</title>
							<link rel="stylesheet" href="css/bootstrap.min.css"/>
							<script src="js/jquery2.js"></script>
							<script src="js/bootstrap.min.js"></script>
							<script src="main.js"></script>
							<style>
								table tr td {padding:10px;}
							</style>
						</head>
					<body>
						<div class="navbar navbar-inverse navbar-fixed-top">
							<div class="container-fluid">	
								<div class="navbar-header">
									<a href="#" class="navbar-brand">Online Selling</a>
								</div>
								<ul class="nav navbar-nav">
									<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
									<li><a href="profile.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
								</ul>
							</div>
						</div>
						<p><br/></p>
						<p><br/></p>
						<p><br/></p>
						<div class="container-fluid">
						
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
										<div class="panel-body">
											<h1>Thankyou </h1>
											<hr/>
											<p>Hello <?php echo "<b>".$_SESSION["name"]."</b>"; ?>,Your payment process is 
											successfully completed and your Transaction id is <b><?php echo $str; ?></b><br/>
											you can continue your Shopping <br/></p>
											<a href="index.php" class="btn btn-success btn-lg">Continue Shopping</a>
										</div>
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</body>
					</html>

				<?php
			}
		}
		else
		{
			header("location:index.php");
		}
?>

















































