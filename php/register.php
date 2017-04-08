<?php
if ($_POST['name'] && $_POST['password'])
{
	$login = $_POST['name'];
	$password = hash('whirlpool', $_POST['password']);
	$logs = array(
      "login" => $login,
      "password" => $password,
      ); 
	if (!file_exists("../private"))
		mkdir("../private");
	else if (file_exists("../private/BDDJSONXD"))
	{
		$data = json_decode((file_get_contents("../private/BDDJSONXD")));
		foreach ($data['Users'] as $d) {
			if ($d['login'] === $login)
			{
				header('Location: index.php');
				return;
			}
		}
	}
	$data['Users'][] = $logs;
	file_put_contents("../private/BDDJSONXD", json_encode($data));
}
header('Location: ../index.php');
?>