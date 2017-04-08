<?php
function auth($login, $passwd)
{
	$passwd = hash('whirlpool', $passwd);
	if (file_exists("../private") && file_exists("../private/passwd"))
	{
		$data = unserialize(file_get_contents("../private/passwd"));
		foreach ($data as $d) {
			if ($d['login'] === $login && $d['passwd'] === $passwd)
				return (TRUE);
		}
	}
	return (FALSE);
}
?>
