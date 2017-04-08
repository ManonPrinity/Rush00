<?php
if ($_POST['submit']=='OK' && $_POST['login'] && $_POST['oldpw'] && $_POST['newpw'])
{
	$login = $_POST['login'];
	$oldpw = hash('whirlpool', $_POST['oldpw']);
	$newpw = hash('whirlpool', $_POST['newpw']);
	$logs = array(
      "login" => "$login",
      "oldpw" => "$oldpw",
      ); 
	if (!file_exists("../private") || !file_exists("../private/passwd"))
	{
		echo "ERROR\n";
		return;
	}
	$data = unserialize(file_get_contents("../private/passwd"));
	$i = 0;
	foreach ($data as $d) {
		if ($d['login'] === $login && $d['passwd'] === $oldpw)
		{
			$data[$i]['passwd'] = $newpw;
			file_put_contents("../private/passwd", serialize($data));
			echo "OK\n";
			return;
		}
		$i++;
	}
	echo "ERROR\n";
}
else
	echo "ERROR\n";
?>
