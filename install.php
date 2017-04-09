#!/usr/bin/php
<?php
	if (!file_exists("private"))
		mkdir("private");
	else if (file_exists("private/dataBase"))
	{
		$data = unserialize((file_get_contents("private/dataBase")));
	}
	$poke = json_decode(file_get_contents("json/PokeList.json"));
	$data['Users'][] = $logs;
	$data['Pokemon'] = $poke;
	file_put_contents("private/dataBase", serialize($data));
?>