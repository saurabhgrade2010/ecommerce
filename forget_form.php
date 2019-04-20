<?php 
if (isset($_GET["forget"])) {
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
			<div class="col-md-8" id="forget_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">Forget Password</div>
					<div class="panel-body">
						<!--User Login Form-->
						<form onsubmit="return false" id="forget_form">
							<label for="email">Email:</label>
							<input type="email" class="form-control" name="email" id="email" required/>
							<p><br/></p>
							<input type="submit" class="btn btn-success" style="float:right;" Value="forget">
							<!--If user dont have an account then he/she will click on create account button-->	
                            <div><a href="customer_registration.php?register=1">Create a new account?</a></div>								
						</form>
				</div>
				<div class="panel-footer"><div id="e_msg"></div></div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>
<?php
}
?>
