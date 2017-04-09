<?php
	include("head.php");
if ($_POST['name'] && $_POST['password'])
{
	$login = $_POST['name'];
	$password = hash('whirlpool', $_POST['password']);
	$user = "SELECT * FROM User WHERE name = '".$_POST['name']."'";
	$pris = mysqli_query($db, $user);
	if ($pris->fetch_object())
		header('Location: ../index.php');
	else
	{
		$user = "INSERT INTO User (`name`, `pass`, `admin`) VALUES ('".$login."', '".$password."', 0)";
		mysqli_query($db, $user);
		$_SESSION['log'] = $login;
		header('Location: ../page_produit.php');
	}
}
header('Location: ../index.php');
?>