<section id="prod_page">
<?php include('php/sessions_func.php'); ?>
	<h2>Nos Produits</h2>
	<?php
		$sql = "SELECT * FROM `Pokemon`";
		$poke = mysqli_query($db, $sql);
		while ($obj = $poke->fetch_object())
		{
			echo '<div class="bloc_prod">
			<h3>'.$obj->name.'</h3>
			<div><img src="img/front/'.$obj->id.'.png" style="width:100%"></div>
			<a href="poke_page.php?id='.$obj->id.'"><input type="button" name="VOIR" value="Voir"/></a>
			</div>"';
		}
	?>
</section>