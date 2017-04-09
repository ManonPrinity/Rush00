
<section id="panier">
	<h2>Votre panier</h2>
	<?php
		$data = unserialize((file_get_contents("private/dataBase")));
		if ($_SESSION['panier'])
		{
			foreach ($_SESSION['panier'] as $p) {
				$sql = "SELECT * FROM `Pokemon` WHERE id = ".$p;
				$poke = mysqli_query($db, $sql);
				$poke = $poke->fetch_object();
				echo '<div class="bloc_prod">
				<h3>'.$poke->name.'</h3>
				<div><img src="img/front/'.$poke->id.'.png" style="width:100%"></div>
				<a href="poke_page.php?id='.$poke->id.'"><input type="button" name="VOIR" value="'.$poke->prix.'"></a>
				</div>"';
			}
		}
	?>
	<a href="troll.php"><input type="button" value="Payer"/></a>
</section>