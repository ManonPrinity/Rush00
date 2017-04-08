<?php
	session_start();
	if ($_GET['submit']=='OK')
	{
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}
?>
<!DOCTYPE html><meta charset="utf-8" /><body>
<form method="get" action="index.php">
Identifiant: <input type="text" name="login" placeholder="login" <?php echo 'value="'.$_SESSION['login'].'"';?>/>
<br />
Mot de passe: <input type="password" name="passwd" placeholder="passwd"<?php echo 'value="'.$_SESSION['passwd'].'"';?>/>
<input type="submit" name="submit" value="OK"/>
</form>
</body></html>
