<?php
header('Location:../index.php');
require_once('../fonction/fonction_panier.php');
require_once('../fonction/fonction.php');
session_start();
?>

<html>
<head>
</head>
<body>

<?PHP
$article = find_article($_POST);
ajouterArticle($article, $_POST['quantity']);
print_r($_SESSION['panier']);
?>

</body>
</html>
