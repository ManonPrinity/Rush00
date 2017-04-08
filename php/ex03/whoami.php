<?php
session_start();
echo $_SESSION['logged_on_user'];
if (!$_SESSION['logged_on_user'])
	echo "ERROR";
echo "\n";
?>