<?php 
session_start();
include "db.php";
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
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
         <div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="change_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>		
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Online Selling</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">Payment</div>
					<div class="panel-body">
					<?php
					        $x=0;
							$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
							$query = mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($query))
							{
								$x++;
								$pro_title=$row["product_title"];
								echo '<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
								}
							  
					?>
					<!--	<form id="change_form1" onsubmit="return false">
							<p><br/></p>
							<input style="width:100%;" value="proceed to pay" type="submit" name="signup_button" class="btn btn-success btn-lg">
					</form>-->
					<?php
					$a="";
					$b="";
					$c="";
					$d="";
					$id=$_SESSION["uid"];
					 $sql="select * from shiping1 where user_id='$id'";
					 $result=mysqli_query($con,$sql);
					 if(mysqli_num_rows($result)>0)
					 {
						 $row=mysqli_fetch_array($result);
						 $a=$row[1];
						 $b=$row[2];
						 $c=$row[3];
						 $d=$row[4];
					 }
					?>
					<form action="payment_success.php" method="post">
					<div class="row">
							<div class="col-md-12">
								<label for="address">Business Name:</label>
								<input type="text" id="address" name="name1" value="<?php echo $a; ?>" class="form-control">
							</div>
							<div class="col-md-12">
								<label for="address">Address1:</label>
								<input type="text" id="address" name="address1" value="<?php echo $b; ?>"class="form-control">
							</div>
							<div class="col-md-12">
								<label for="address">Address2:</label>
								<input type="text" id="address" name="address2" value="<?php echo $c; ?>" class="form-control">
							</div>
							<div class="col-md-12">
								<label for="address">Mobile:</label>
								<input type="text" id="address" name="mobile1" value="<?php echo $d; ?>" class="form-control">
							</div>
						</div>
					<button style="width:100%;" value="cash" type="submit" name="signup_button" class="btn btn-success btn-lg">Place Order</button>
					</form>
				</div>
				<div class="panel-footer"><div id="e_msg"></div></div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>





















