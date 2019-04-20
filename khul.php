<?php
session_start();
if(isset($_POST["kholde"]))
{
	$p_idd=$_POST["proId"];
	if(isset($_SESSION["mid"]))
	{
	 $_SESSION["mid"]=$p_idd;
	}
	echo $p_idd;
	exit();
}
else
{
	$p_idd=$_POST["proId"];
	if(isset($_SESSION["mid"]))
	{
	 $_SESSION["mid"]=$p_idd;
	}
	echo $p_idd;
	exit();
}
?>