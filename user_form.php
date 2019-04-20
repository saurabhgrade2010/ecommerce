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
				<div class="panel panel-info">
					<div class="panel-heading">Users</div>
					<div class="panel-body">
					<!--	<form onsubmit="return false" id="user_form">
						 <input type="submit" class="btn btn-success" style="float:left;" Value="users">
						</form>-->
						<?php
						session_start();
    include "db.php";
	$product_query = "SELECT * FROM user_info";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0)
	{
		
		while($row = mysqli_fetch_array($run_query))
		{
			$x="";
			$pro_id    = $row['user_id'];
			$pro_first   = $row['first_name'];
			$pro_email = $row['email'];
			$pro_check = $row['type_check'];
			if($pro_check==1)
			{
				if($row[9]==1)
					continue;
				$x="Activated";
				 echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_first
								</div>
								<div class='panel-body'>
									 <div class='panel-heading'>$pro_id
								     </div>
								     <div class='panel-heading'>$pro_first
								     </div>
								     <div class='panel-heading'>$pro_email
								     </div>
							     </div>
								 <div class='panel-heading'>$x
									<button pid='$pro_id' style='float:right;' id='edit_form' class='btn btn-danger btn-xs'>Edit Profile</button>
								</div>
							</div>
						</div>	
			";
			}
            else
            {  
		      $x="Not Activated";				
			  echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_first
								</div>
								<div class='panel-body'>
									 <div class='panel-heading'>$pro_id
								     </div>
								     <div class='panel-heading'>$pro_first
								     </div>
								     <div class='panel-heading'>$pro_email
								     </div>
							     </div>
								 <div class='panel-heading'>$x
									<button pid='$pro_id' style='float:right;' id='active_form' class='btn btn-danger btn-xs'>Active</button>
								</div>
							</div>
						</div>	
			";
			}
		}
	}
	else
	{
		echo "nahi hua bhai";
	}
?>
					</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>
















































