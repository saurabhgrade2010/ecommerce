<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Online selling</title>
		
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		
		
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
						<a href="order1.php" style="color:#333; list-style:none;"><button class="btn btn-success">pending Orders</button></a>
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
						<h1>Total selling:-</h1>
						<hr/>
						<?php
							include_once("db.php");
							$x=$_POST["searchdate"];
		                    
							$orders_list = "SELECT o.qty,p.product_price,p.product_title,o.trx_id FROM orders o,products p WHERE o.product_id=p.product_id  AND DATE(o.order_date) = '$x'";
							$query = mysqli_query($con,$orders_list);
							
							if (mysqli_num_rows($query) > 0) 
							{
								$total=0;
								?>
								 <table class="table">
								<thead>
                                      <tr>
                                           <th>Product Name</th>
                                           <th>price</th>
                                            <th>Qty</th>
											<th>Trx_Id</th>
                                                 </tr>
                                          </thead>
										  <?php
								while ($row=mysqli_fetch_array($query)) 
								{
									$total1=0;
									$qty=$row["qty"];
									$price=$row["product_price"];
									$title=$row["product_title"];
									$trx_id=$row["trx_id"];
									$total=$total+$qty*$price;
									$total1=$total1+$total;
									?>
										 <tbody>
                                          <tr>
                                            <td><?php echo $title; ?></td>
                                            <td><?php echo $price; ?></td>
                                              <td><?php echo $qty; ?></td>
											  <td><?php echo $trx_id ?></td>
                                               </tr>
                                                <tr>
                                        </tbody>
									<?php
								}
								?></table>
								<h1>Total Ammount:<?php echo $total1; ?></h1>
								<?php
							}
							else
							{
								?>
										<div class="row">
											<div class="col-md-6">
												<table>
												     <tr><td>Total Ammount:</td><td><b>0.00$</b> </td></tr>
												     <tr> <td>  <div class='panel-heading'>
									    
											
								               </div></td></tr> 
												</table>
											</div>
										</div>
										<br><br><hr color="black">
									<?php
							
							}?>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>