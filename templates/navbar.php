<section id="nav-bar">
	<div id="button">
	<?php
	if ($_SESSION['log'])
	{
		echo '<a href="php/delete.php"><input type="button" value="XXX"></a><a href="php/logout.php"><input type="button" value="logout"></a>';
	}
	else
	{
		echo'<a href="index.php"><input type="button" value="SignUp"></a>
		<a href="connection.php"><input type="button" value="SignIn"></a>';
	}
	?>
		<a href="page_produit.php"><input type="button" value="Nos Produits"></a>
		<a href="panier_p.php"><img src="images/pokebag.svg"></a>
	</div>
</section>