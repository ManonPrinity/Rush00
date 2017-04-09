<?php
	include("head.php");
	session_start();
	$_SESSION['panier'] []= 1;//$_GET['id'];
	header('Location: ../panier_p.php');
?>