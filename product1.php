<?php
    include "db.php";
	$product_query = "SELECT * FROM products";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0)
	{
		
		while($row = mysqli_fetch_array($run_query))
		{
			$x="";
			$pro_id    = $row['product_id'];
			$pro_title   = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_desc=$row[5];
				 echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title
								</div>
								<div class='panel-body'>
									 <div class='panel-heading'>$pro_id
								     </div>
								     <div class='panel-heading'>$pro_title
								     </div>
								     <div class='panel-heading'>$pro_price
								     </div>
							     </div>
								 <div class='panel-heading'>
									<button pid='$pro_id' style='float:left;' id='edit_form1' class='btn btn-danger btn-xs'>Edit</button>
									<button pid='$pro_id'  id='desc_form1' class='btn btn-danger btn-xs'>description</button>
									<button pid='$pro_id' style='float:right;' id='delete_form1' class='btn btn-danger btn-xs'>Delete</button>
								</div>
							</div>
						</div>	
			";
		}
	}
	else
	{
		echo "nahi hua bhai";
		exit();
	}
?>