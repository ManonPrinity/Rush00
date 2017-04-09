<?php
	session_start();
	$db = new mysqli('localhost', 'root', 'root', 'PokeShop');
	// include("head.php");
if ($_POST['name'] && $_POST['password'])
{
	$login = $_POST['name'];
	$password = hash('whirlpool', $_POST['password']);
	$user = "SELECT * FROM User WHERE name = '".$login."' && pass = '".$password."'";
	$pris = mysqli_query($db, $user);
	if ($pris->fetch_object())
	{
		$_SESSION['log'] = $login;
		header('Location: ../page_produit.php');
	}
	else
		header('Location: ../index.php');
}
?>