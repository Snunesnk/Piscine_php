<?php
require_once 'fonction/fonction_panier.php';
require_once 'fonction/fonction.php';
session_start();
$_SESSION['in_page']="index.php";
?>

<html>
	<head>
		<meta charset="utf8">
		<link rel="stylesheet" href="style.css"/>
	</head>
	<body>	
		<div class=header>
			<h2> Espace Admin</h2>
			
			<?php if(is_admin($_SESSION['loggued_on_user'])):?>
					
				<p><a href="index.php">espace client :</a></p>
				<p><a href="user/logout.php">logout : </a></p>

			<?php else :?>
		 		<p>Et non, tu n'es pas admin</p>
			<p> <a href="index.php">espace client</a></p>
			<?php endif?>
		</div>
		
			<?php if(is_admin($_SESSION['loggued_on_user'])):?>
			
			<p> <a href="admin/add_user.php">ajouter un user</a></p>
			<p> <a href="admin/add_article.php">ajouter un article</a></p>
			<p> <a href="admin/modif_user.php">modifier un user</a></p>
			<p> <a href="admin/show_panier.php">afficher les paniers</a></p>
			<?php endif ?>
	</body>
</html>
