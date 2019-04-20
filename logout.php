<?php

session_start();

unset($_SESSION["uid"]);

unset($_SESSION["name"]);
unset($_SESSION["user_image"]);

header("location:index.php");

?>