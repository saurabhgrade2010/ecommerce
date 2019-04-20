<?php
session_start();
include "db.php";
if(!isset($_SESSION["mid"]))
{
	$_SESSION["mid"]=36;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
		<meta charset="UTF-8">
		<title>FreeShop.com</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  background-color:black;
}

/* Style the header */
header {
  background-color: #666;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}

/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 30%;
  height: 500px; /* only for demonstration, should be removed */
  background: #ccc;
  padding: 20px;
  background-color: pink;
  overflow: scroll;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

article {
  float: left;
  padding: 20px;
  width: 50%;
  background-color: #f1f1f1;
  height: 500px; /* only for demonstration, should be removed */
}

/* Clear floats after the columns */
section:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
article.ex1 {
  background-color: lightblue;
  overflow: scroll;
}
.container1 {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}
.darker1 {
  border-color: #ccc;
  background-color: #ddd;
}

.container1::after {
  content: "";
  clear: both;
  display: table;
}

.container1 img {
  float: left;
  max-width: 60px;
  width: 90%;
  margin-right: 20px;
  border-radius: 20%;
}

.container1 img.right1 {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right1 {
  float: right;
  color: #aaa;
}

.time-left1 {
  float: left;
  color: #999;
}
.right-section-bottom{
	background: #fff;
	width: 50%;
	padding: 15px;
	float: right;
	bottom: 0px;
	border-top:1px solid #E6E6E6;
	text-align: center;
}
.right-section-bottom input{
	border:0px;
	padding:8px 5px;
	width:calc(100% - 150px);
}
.right-section-bottom .btn-send{
	border:0px;
	padding: 8px 10px;
	float: right;
	margin-right: 30px;
	color: #009EF7;
	font-size: 18px;
	background: #fff;
	cursor: pointer;
}
 form:focus { 
            background-color: limegreen; 
        } 
section.ec1{
	padding-left:150px;
}
</style>
<script>
focusMethod = function getFocus() {           
  document.getElementById("myTextField").focus();
}
</script>
</head>
<body>
<br><br>
<a href="admin_index.php"><span class="glyphicon glyphicon-home"></span>Home</a>
<br><br><br>
<section class="ec1">
  <nav>
    <ul>
	<?php
	             $ab="";
				 $sql="select DISTINCT user_id from `chating`";
				 
				 $result=mysqli_query($con,$sql);
				 if(mysqli_num_rows($result)>0)
				 {
					 while($row=mysqli_fetch_array($result))
					 {
						 $pid=$row[0];
					     
						 $sql1="select * from `user_info` where user_id='$pid'";
						 $result1=mysqli_query($con,$sql1);
						 if(mysqli_num_rows($result1)>0)
						 {
							 $row1=mysqli_fetch_array($result1);
							  $pro_image=$row1["img"];
							 ?>
							<li>
								
							<div class='container1'>
							<?php echo $row1["first_name"]." ".$row1["last_name"]; 

								  ?> 
							<?php
							 echo 
							 "<a href='#' id='khul_form' pid='$pid'>
							
							
                              <img src='product_images/$pro_image' alt='Avatar' style='width:100%;'/>
                              
                             <span class='time-right1'></span>
                                </a>";
								 ?>
							</div>

						    </li>
						 <?php 
						 }
					 }
				 }
              ?>				 
    </ul>
  </nav>
  
  <article class="ex1">
   <?php
     $idd=$_SESSION["mid"];
	 $sql="select * from `user_info` where user_id='$idd'";
	 $result=mysqli_query($con,$sql);
	 if(mysqli_num_rows($result)>0)
	 {
		 $row=mysqli_fetch_array($result);
		 global $pro_img;
		$pro_img=$row[10];
	 }
     $sql="select * from `chating` where user_id='$idd'";
	 $result=mysqli_query($con,$sql);
	 if(mysqli_num_rows($result)>0)
	 { 
           $y=1;
		 while($row=mysqli_fetch_array($result))
		 {
		    if($row[2]=="")
		    { 
		        if($row[4]==0)
			    {
				 ?>   
				 
		            <div class="container1">
                  <?php   echo "<img src='product_images/$pro_img' alt='Avatar' style='width:100%;'/>"; ?>
                      <p style="color:red;">    <?php echo $row[1]; ?></p>
                      <span class="time-right1"><?php echo $row[3]; ?></span>
                  </div> 
				  <?php
				  if($y==1)
				  {
				  
				    $sql1="UPDATE `chating` set ch='$y' where user_id='$idd'";
					mysqli_query($con,$sql1);
					$y++;
				  }
				}
			    else
				{
				?>
		              <div class="container1">
                 <?php echo "<img src='product_images/$pro_img' alt='Avatar'  style='width:100%;'>"; ?>
                     <?php echo $row[1]; ?>
                      <span class="time-right1"><?php echo $row[3]; ?></span>
					  </div>
		        <?php
		        }
	        }
			 else
			 {
				 ?>

         <div class="container1 darker1">
         <img src='product_images/gents-formal-250x250.jpg' alt="Avatar" class="right1"  style="width:100%;">
         <?php echo $row[2]; ?>
          <span class="time-left1"><?php echo $row[3]; ?></span>
           </div>
		   <?php 
		 }
	 }
	 }
   ?>
   <div class="right-section-bottom" id="myTextField">
     <form action="adminmsg.php" method="post">
						<input type="text" name="msg" placeholder="type here...">
						<button type="submit" class="btn-send">send</button>
					</form></div>
    </article>
</section>


</body>
</html>
