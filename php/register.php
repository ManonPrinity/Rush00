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
	else if (file_exists("../private/dataBase"))
	{
		$data = unserialize((file_get_contents("../private/dataBase")));
		foreach ($data['Users'] as $d) {
			if ($d['login'] === $login)
			{
				echo "login already taken<br/>";
				// header('Location: ../index.php');
				return;
			}
		}
	}
	$data['Users'][] = $logs;
	file_put_contents("../private/dataBase", serialize($data));
}
// header('Location: ../index.php');
?>