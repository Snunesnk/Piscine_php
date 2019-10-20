<?php
require_once "fonction/fonction_panier.php";
require_once "fonction/fonction.php";
session_start();
?>

<html>
	<head>
		<meta charset="utf8">
		<link rel="stylesheet" href="style.css"/>
		<title>CHAPOFY</title>
	</head>
	<body>	
	<div id="chapofy"><h1 class="title">CHAPOFY</h1>
	</div>
		<div id="top">
		<div>
		<div class="header">
<?php
	if ($_GET['new_user']):
?>
			<h2 class="center">Nouveau compte:</h2>
		<?php if($_SESSION['loggued_on_user'] ==""):?>
		<form method="post" action="user/create.php">
		<div id="connexion">
				<td><label for="name">login :</label></td>
				<td><input type="text" name="login" id="login" value=><br /></td>
				<td><label for="passwd">password :</label></td>
				<td><input type="password" name="passwd" id="passwd" value=><br /></td>
				<td><input type="submit" name="submit" value='ok'></td>
		</form>
		</div>
		<?php endif;?>
<?PHP
	else:
?>
			<h2 class="center">Espace connexion</h2>
		<?php if($_SESSION['loggued_on_user'] ==""):?>
		<form method="post" action="user/login.php">
		<div id="connexion">
				<td><label for="name">login :</label></td>
				<td><input type="text" name="login" id="login" value=><br /></td>
				<td><label for="passwd">password :</label></td>
				<td><input type="password" name="passwd" id="passwd" value=><br /></td>
				<td><input type="submit" name="submit" value='ok'></td>
		</form>
		</div>
		<p id='new_user'>Nouveau : Cr&eacute;&eacute; toi un compte <a href="index.php?new_user=1">ici</a></p>
		<?php endif;?>
<?PHP
endif;
?>
<?PHP
	if ($_SESSION['error'])
	{
		?><h3 class="center"><?php
		echo ($_SESSION['error']);
		?></h3><?php
		$_SESSION['error'] = "";
	}
?>
		<?PHP if ($_SESSION['loggued_on_user'] && !$_GET['modif']):?>
			<p><a href="user/logout.php">logout : </a></p>
			<a href ="index.php?modif=1">changer de mdp?</a>
			<?php if (is_admin($_SESSION['loggued_on_user'])):?>
			<p><a href="espace_admin.php">espace_admin</a></p>
			<?php endif?>
		<?php elseif ($_GET['modif']):?>
			<form method="post" action="user/modif.php">
			<div id="connexion">
				<td><label for="name">login :</label></td>
				<td><input type="text" name="login" id="login" value=><br /></td>
				<td><label for="passwd">password :</label></td>
				<td><input type="password" name="oldpw" id="passwd" value=><br /></td>
				<td><label for="passwd">new password :</label></td>
				<td><input type="password" name="newpw" id="passwd" value=><br /></td>
				<td><input type="submit" name="submit" value='ok'></td>
		</form>
		</div>
		
		<?php endif?>
		</div>
		</div>
		<div>
		<div class='basket'>
			<?PHP print_panier()?>
		</div>
		</div>
		</div>

		<div class="container">
	
		<?php
		if ($_GET['categorie'])
		{
			$articles = unserialize(file_get_contents("private/article"));
			print_image($_GET['categorie'], $articles);
		}
		else
		{
			print_categorie();
		}?>
		</div>
	</body>
</html>
