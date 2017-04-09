<?php
	include("head.php");
	$sql = "UPDATE Pokemon SET name = '".$_POST['name']."', prix = ".$_POST['prix']." WHERE id = ".$_POST['id'];
	mysqli_query($db, $sql);
	header('Location: ../admin_panel.php');
?>