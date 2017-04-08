<?php
	session_start();
	include 'auth.php';
	if ($_GET['login'] && $_GET['passwd'] && auth($_GET['login'], $_GET['passwd']))
	{
		$_SESSION['logged_on_user'] = $_GET['login'];
		echo "OK";
	}
	else
		echo "ERROR\n";
?>