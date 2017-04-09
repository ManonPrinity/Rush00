
<section id="prod_page">
<?php include('php/sessions_func.php'); ?>
	<h2>Nos Produits</h2>
	<?php
		$data = unserialize((file_get_contents("private/dataBase")));
		foreach ($data["Pokemon"] as $poke) {
			echo '<div class="bloc_prod">
			<h3>'.$poke->name.'</h3>
			<div><img src="img/front/'.$poke->id.'.png" style="width:100%"></div>
			<input type="button" name="VOIR" value="Voir"/>
			</div>"';
		}
	?>
</section>