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

	$db = new mysqli('localhost', 'root', 'root');
	if($db->connect_errno > 0){
   		die('Unable to connect to database [' . $db->connect_error . ']');
	}
	$sql = "DROP DATABASE PokeShop";
	mysqli_query($db, $sql);	
	$sql = "CREATE DATABASE PokeShop CHARACTER  SET utf8";
	mysqli_query($db, $sql);
	$db->close();
	$db = new mysqli('localhost', 'root', 'root', 'PokeShop');

	$r1 = "DROP TABLE Pokemon";
	mysqli_query($db, $r1);
	$r2 = "DROP TABLE Abilities";
	mysqli_query($db, $r2);
	$r3 = "DROP TABLE User";
	mysqli_query($db, $r3);
	$r4 = "DROP TABLE Type";
	mysqli_query($db, $r4);
	$request1 = "CREATE TABLE Pokemon (id INT PRIMARY KEY NOT NULL, name VARCHAR(100), species VARCHAR(100), height VARCHAR(100), weight VARCHAR(100), hp VARCHAR(100), attack VARCHAR(100), defense VARCHAR(100), specialAttack VARCHAR(100), specialDefense VARCHAR(100), speed VARCHAR(100), total VARCHAR(100), prix VARCHAR(100))";
	if(mysqli_query($db, $request1)) {
		echo "Table Pokemon created successfully\n";
	} else {
		echo "Error creating Table: " . mysqli_error($db). "\n";
	}
	$request2 = "CREATE TABLE User (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, name VARCHAR(100), pass VARCHAR(255), admin TINYINT)";
	if(mysqli_query($db, $request2)) {
		echo "Table User created successfully\n";
	} else {
		echo "Error creating Table: " . mysqli_error($db). "\n";
	}
	$request3 = "CREATE TABLE Abilities (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, name VARCHAR(100), pokemon INT, FOREIGN KEY (pokemon) REFERENCES Pokemon(id))";
	if(mysqli_query($db, $request3)) {
		echo "Table Abilities created successfully\n";
	} else {
		echo "Error creating Table: " . mysqli_error($db). "\n";
	}
	$request4 = "CREATE TABLE Type (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, name VARCHAR(100), pokemon INT, FOREIGN KEY (pokemon) REFERENCES Pokemon(id))";
	if(mysqli_query($db, $request4)) {
		echo "Table Type created successfully\n";
	} else {
		echo "Error creating Table: " . mysqli_error($db). "\n";
	}
	$poke = json_decode(file_get_contents("json/PokeList.json"));
	foreach ($poke as $p) {
		$newPoke = "INSERT INTO Pokemon VALUES ('".$p->id."', '".$p->name."', '".$p->species."', '".$p->height."', '".$p->weight."', '".$p->stats->hp."', '".$p->stats->attack."', '".$p->stats->defense."', '".$p->stats->spatk."', '".$p->stats->spdef."', '".$p->stats->speed."', '".$p->stats->total."', '".$p->prix."')";
		if(mysqli_query($db, $newPoke))
		{
			foreach ($p->type as $type) {
				$newType = "INSERT INTO Type (`name`, `pokemon`) VALUES ('".$type."', '".$p->id."')";
				mysqli_query($db, $newType);
			}
			foreach ($p->abilities as $abi) {
				$newAbi = "INSERT INTO Abilities (`name`, `pokemon`) VALUES ('".$abi."', '".$p->id."')";
				if (!mysqli_query($db, $newAbi))
					echo "Error creating: " . mysqli_error($db). "\n";
			}
			echo $p->name ." created successfully\n";
		}
		else
			echo "Error creating ".$p->name.": " . mysqli_error($db). "\n";
	}
	$super = "INSERT INTO User (`name`, `pass`, `admin`) VALUES ('admin', '".hash('whirlpool', 'admin')."', 1)";
	mysqli_query($db, $super);
	$user = "INSERT INTO User (`name`, `pass`, `admin`) VALUES ('user', '".hash('whirlpool', 'user')."', 0)";
	mysqli_query($db, $user);
	// $test = "SELECT species FROM Pokemon WHERE id = 1";
	// $a = mysqli_query($db, $test);
	// echo $a->fetch_object()->species;
?>