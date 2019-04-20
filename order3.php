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
				<li><a href="admin_index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="admin_product.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
				<li><div class='panel-heading'>
						<a href="order2.php" style="color:#333; list-style:none;"><button class="btn btn-success">Confirmed Orders</button></a>
					<a href="order1.php" style="color:#333; list-style:none;"><button class="btn btn-success">Pending Orders</button></a>
					<form  action="total_sell1.php" method="post" class="navbar-form navbar-left" >
		                 <div class="form-group">
		                     <input type="date" class="form-control"  name="searchdate">
		                 </div>   <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" style='float:right;'></span></button>
		               </form>
					</div></li>
			</ul>
		</div>
	</div>
	<div class="row">
					<div class="col-md-12 col-xs-12" id="confirm_order1">
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
						<h1>Cancel Orders:-</h1>
						<hr/>
						<?php
							include_once("db.php");
							$x=0;
							$orders_list = "SELECT o.order_id,o.user_id,o.product_id,o.order_date,o.qty,o.trx_id,o.STATUS,p.product_title,p.product_price,p.product_image FROM orders o,products p WHERE o.product_id=p.product_id and o.confirm=1";
							$query = mysqli_query($con,$orders_list);
							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_array($query)) {
									$pid=$row['order_id'];
									$dt=$row["order_date"];
									$date1=DATE($dt);
									?>
										<div class="row">
											<div class="col-md-6">
												<img style="float:right;" src="product_images/<?php echo $row['product_image']; ?>" class="img-responsive img-thumbnail"/>
											</div>
											<div class="col-md-6">
												<table>
												     <tr><td>Customer Id</td><td><b><?php echo $row["user_id"]; ?></b> </td></tr>
													 <tr><td>Product Name</td><td><b><?php echo $row["product_title"]; ?></b> </td></tr>
													 <tr><td>Product Price</td><td><b><?php echo "$ ".$row["product_price"]; ?></b></td></tr>
													 <tr><td>Quantity</td><td><b><?php echo $row["qty"]; ?></b></td></tr>
													 <tr><td>Transaction Id</td><td><b><?php echo $row["trx_id"]; ?></b></td></tr>
													 <tr><td>Date</td><td><b><?php echo $date1; ?></b></td></tr>
												     <tr> <td>  <div class='panel-heading'>
							
											
								               </div></td></tr> 
												</table>
											</div>
										</div>
										<br><br><hr color="black">
									<?php
								}
							}
						?>
						
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>