<?php
if ($_POST['submit']=='OK' && $_POST['login'] && $_POST['passwd'])
{
	$login = $_POST['login'];
	$passwd = hash('whirlpool', $_POST['passwd']);
	$logs = array(
      "login" => "$login",
      "passwd" => "$passwd",
      ); 
	if (!file_exists("../private"))
		mkdir("../private");
	else if (file_exists("../private/passwd"))
	{
		$data = unserialize(file_get_contents("../private/passwd"));
		foreach ($data as $d) {
			if ($d['login'] === $login)
			{
				echo "ERROR\n";
				return;
			}
		}
	}
	$data []= $logs;
	file_put_contents("../private/passwd", serialize($data));
	echo "OK\n";
}
else
	echo "ERROR\n";
?>
