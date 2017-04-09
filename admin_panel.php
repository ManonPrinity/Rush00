<?php
	include("templates/header.php");
?>
<aside id="left_aside">
	<a href="admin_panel.php"><img src="images/pokeball.svg"></a>
	<a href="admin_user.php"><img src="images/pokemon-trainer.svg"></a>
</aside>
<section id="main_container">
	<h2>Panel Admin</h2>
	<?php
	$sql = "SELECT * FROM `Pokemon`";
	$poke = mysqli_query($db, $sql);
	while ($obj = $poke->fetch_object())
	{
		echo '<div class="bloc_adm">
		<form action="php/edit_poke.php" method="post">
		<img src="img/front/'.$obj->id.'.png"/>
		<input type="hidden" name="id" value = "'.$obj->id.'">
		<input type="text" name="prix" value="'.$obj->prix.'">
		<input type="text" name="name" value="'.$obj->name.'">
		<input type="submit" value="OK">
		</form>
		</div>';
	}
	?>
		
</section>