<?php
	include("templates/header.php");
	include("templates/navbar.php");
	$id = $_GET['id'];
?>

<section id="pokepage">
	<?php
		$sql = "SELECT * FROM `Pokemon` WHERE id = ".$id;
		$poke = mysqli_query($db, $sql);
		$poke = $poke->fetch_object();
		echo '<img src="img/front/'.$id.'.png"><p id="name">'.$poke->name.'</p><p id="desc">height = '.$poke->height.'</br>weidth = '.$poke->weidth.'</br>hp = '.$poke->hp.'</br>attack = '.$poke->attack.'</br>defense = '.$poke->defense.'</br>specialAttack = '.$poke->specialAttack.'</br>specialDefense = '.$poke->specialDefense.'</br>speed = '.$poke->speed.'</br>total = '.$poke->total.'</br>prix = '.$poke->prix.'</br></p>';
	?>
</section>

<?php
	include("templates/footer.php");
?>