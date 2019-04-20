<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Online selling</title>
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
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">Online selling</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="admin_index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li><a href="admin_product.php?product1=1"><span class="glyphicon glyphicon-home"></span>Product</a></li>
			</ul>
			<form class="navbar-form navbar-left" >
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search user" name="searchuser">
		        </div>
		        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" style='float:right;'></span></button>
		     </form>
			<ul class="nav navbar-nav navbar-right">
			</ul>
			<ul class="nav navbar-nav">
				<li><a href="logout_admin.php"><span class="glyphicon glyphicon-home"></span>Logout</a></li>
			</ul>
		</div>
	</div>
</div>	
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2 col-xs-12">
			</div>
			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="user_msg">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-xs-12" id="order_data_msg">
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">Order</div>
					<div class="panel-body">
						<div class='panel-heading'>
						<a href="order1.php" style="color:#333; list-style:none;"><button class="btn btn-success">Pending Orders</button>	</a>
					</div><br>
                        <div class='panel-heading'>
						<a href="order1.php" style="color:#333; list-style:none;"><button class="btn btn-success">Confirmed Orders</button></a>
					
					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>