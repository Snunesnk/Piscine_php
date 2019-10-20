<html>
<head>
</head>
<body>
<div>
<?PHP
require_once "fonction/fonction_panier.php";
require_once "fonction/fonction.php";
$articles = unserialize(file_get_contents("private/article"));
print_image_form("femme", $articles);
?>
</div>
</body>
</html>
