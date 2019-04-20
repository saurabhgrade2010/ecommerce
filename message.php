<?php
session_start();
include "db.php";
$id=$_SESSION["uid"];
$email=$_SESSION["email"];
$name=$_SESSION["name"];
$user_image=$_SESSION["uimg"];
?>
<!DOCTYPE html>
<html>
<head>
         <meta charset="UTF-8">
		<title>FreeShop.com</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.css">
</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
</script>
<style>
body{
    font-family: 'Raleway', sans-serif;
	background-color: #ACCEDC;
	margin: 50px 0px;
}
.main-section small{
	font-size: 12px;
}
.main-section h3, .main-section h5{
	margin: 0px;
}
.main-section{
	width: 960px;
	background-color: #fff;
	margin: auto;
}
.head-section{
	border-bottom:1px solid #E6E6E6;
	clear: both;
	overflow: hidden;
	width: 100%;
}
.headLeft-section{
	width: calc(30% - 1px);
	float: left;
	border-right:1px solid #E6E6E6;
}
.headLeft-sub{
	padding: 15px;
	text-align: center;
}
.headLeft-sub input{
	width: 60%;
	border-radius: 0px;
	border:1px solid #E6E6E6;
	padding: 7px;
}
.headLeft-sub button{
	background: #009EF7;
	color: #fff;
	border:1px solid #E6E6E6;
	padding: 7px 15px;
}
.headRight-section{
	width: 70%;
	float: left;
}
.headRight-sub{
	padding: 10px 15px 0px 15px;
}

.body-section{
	clear: both;
	overflow: hidden;
	width: 100%;
}

.left-section{
	width: calc(30% - 1px);
	float: left;
	height: 500px;
	border-right:1px solid #E6E6E6;
	background-color: #FFF;
	z-index: 1;
	position: relative;
}
.left-section ul{
	padding: 0px;
	margin: 0px;
	list-style: none;
}
.left-section ul li{
	padding: 15px 0px;
	cursor: pointer;
}
.left-section ul li.active{
	background: #009EF7;
	color: #fff;
	position: relative;
}
.mCustomScrollBox, .mCSB_container{
	overflow: unset !important;
}
.left-section ul li.active .desc .time{
	color: #fff;
}
.left-section ul li.active:before{
	position: absolute;
	content: '';
	right: -10px;
	border:5px solid #009EF7;
	top: 0px;
	bottom: 0px;
	border-radius: 0px 3px 3px 0px;
}
.left-section ul li.active:after{
  position: absolute;
  content: "";
  bottom: 0px;
  right: 0px;
  left: auto;
  width: 100%;
  top: 0px;
  -webkit-box-shadow: -8px 4px 10px #a1a1a1;
  -moz-box-shadow: -8px 4px 10px #a1a1a1;
  box-shadow: -8px 4px 10px #a1a1a1;
}

.left-section .chatList{
	overflow: hidden;
}
.left-section .chatList .img{
	width: 60px;
	float: left;
	text-align: center;
	position: relative;
}
.left-section .chatList .img img{
	width: 30px;
	border-radius: 50%;
}
.left-section .chatList .img i{
	position: absolute;
	font-size: 10px;
	color: #52E2A7;
	border:1px solid #fff;
	border-radius: 50%;
	left: 10px;
}
.left-section .chatList .desc{
	width: calc(100% - 60px);
	float: left;
	position: relative;
}
.left-section .chatList .desc h5{
	margin-top: 6px;
	line-height: 5px;
}
.left-section .chatList .desc .time{
	position: absolute;
	right: 15px;
	color: #c1c1c1;
}
.right-section{
	width: 70%;
	float: left;
	height: 500px;
	background-color: #F6F6F6;
	position: relative;
}
.message{
	height: calc(100% - 68px);
	font-family: sans-serif;
}
.message ul{
	padding: 0px;
	list-style: none;
	margin: 0px auto;
	width: 90%;
	overflow:hidden;
}
.message ul li{
	position: relative;
	width: 80%;
	padding: 15px 0px;
	clear: both;
}
.message ul li.msg-left{
	float: left;
}
.message ul li.msg-left img{
	position: absolute;
	width: 40px;
	bottom: 30px;
}
.message ul li.msg-left .msg-desc{
	margin-left: 70px;
	font-size: 12px;
	background: #E8E8E8;
	padding:5px 10px;
	border-radius: 5px 5px 5px 0px;
	position: relative;
}
.message ul li.msg-left .msg-desc:before{
	position: absolute;
	content: '';
	border:10px solid transparent;
	border-bottom-color: #E8E8E8;
	bottom: 0px;
	left: -10px;
}
.message ul li.msg-left small{
	float: right;
	color: #c1c1c1;
}

.message ul li.msg-right{
	float: right;
}
.message ul li.msg-right img{
	position: absolute;
	width: 40px;
	right: 0px;
	bottom: 30px;
}
.message ul li.msg-right .msg-desc{
	margin-right: 70px;
	font-size: 12px;
	background: #cce5ff;
	color: #004085;
	padding:5px 10px;
	border-radius: 5px 5px 5px 0px;
	position: relative;
}
.message ul li.msg-right .msg-desc:before{
	position: absolute;
	content: '';
	border:10px solid transparent;
	border-bottom-color: #cce5ff;
	bottom: 0px;
	right: -10px;
}
.message ul li.msg-right small{
	float: right;
	color: #c1c1c1;
	margin-right: 70px;
}
.message ul li.msg-day{
	border-top:1px solid #EBEBEB;
	width: 100%;
	padding: 0px;
	margin: 15px 0px;
}
.message ul li.msg-day small{
	position: absolute;
	top: -10px;
	background: #F6F6F6;
	color: #c1c1c1;
	padding: 3px 10px;
	left: 50%;
	transform: translateX(-50%);
}
.right-section-bottom{
	background: #fff;
	width: 100%;
	padding: 15px;
	position: absolute;
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
.upload-btn{
  position: relative;
  overflow: hidden;
  display: inline-block;
  float: left;
}
.upload-btn .btn{
  	border:0px;
	padding: 8px 10px;
	color: #009EF7;
	font-size: 18px;
	background: #fff;
	cursor: pointer;
}
.upload-btn input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
</style>
<body>
<a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a>
	<div class="main-section">
		<div class="body-section">
			<div class="right-section">
				<div class="message mCustomScrollbar" data-mcs-theme="minimal-dark">
					<ul>
					<?php
				      
					   $sql="select * from `chating` where user_id='$id'";
					   $result=mysqli_query($con,$sql);
					   if(mysqli_num_rows($result)>0)
					   {
						   while($row=mysqli_fetch_array($result))
						   {
							   if($row[1]=="")
							   {
								   ?>
    						<br><li class="msg-left">
							 <div class="msg-left-sub">
							<img src='product_images/gents-formal-250x250.jpg'>
								<div class="msg-desc">
									<?php echo $row[2]; ?>
								</div>
								<small><?php echo $row[3]; ?></small>
							</div>
						</li>
						<?php
					  }
					  else
					  { 
				         ?>
						<li class="msg-right">
							<div class="msg-left-sub">
						    <?php  echo "<img src='product_images/$user_image'>"; ?>
								<div class="msg-desc">
							 <p	style="color:black;">	<?php echo $row[1]; ?></p>
								</div>
								<small><?php echo $row[3]; ?></small>
							</div>
						</li><br><br>
						<?php 
					  }
				}
					   }
					   ?>
					</ul>
				</div>
				<div class="right-section-bottom">
					<form action="usermessage.php" method="post">
						<input type="text" name="msg" placeholder="type here...">
						<button type="submit" class="btn-send"><i class="fa fa-send"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>