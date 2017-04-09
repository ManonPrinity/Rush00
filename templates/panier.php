
<section id="panier">
	<h2>Votre panier</h2>
	<?php
		$data = unserialize((file_get_contents("private/dataBase")));
		$_SESSION['panier'] []= 1;
		$_SESSION['panier'] []= 2;
		$_SESSION['panier'] []= 4;
		$_SESSION['panier'] []= 125;
		if ($_SESSION['panier'])
		{
			foreach ($_SESSION['panier'] as $p) {
				foreach ($data["Pokemon"] as $poke) {
					if ($poke->id == $p)
						echo '<div class="bloc_prod">
						<h3>'.$poke->name.'</h3>
						<div><img src="img/front/'.$poke->id.'.png" style="width:100%"></div>
						<input type="button" name="VOIR" value="50$">
						</div>"';
				}
			}
		}
	?>
	<a href="troll.php"><input type="button" value="Payer"/></a>
</section>