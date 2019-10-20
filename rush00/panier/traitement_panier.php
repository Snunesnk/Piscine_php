<?PHP
session_start();
require_once('../fonction/fonction_panier.php');
require_once('../fonction/fonction.php');
header("Location:..//index.php");

function add_panier_db()
{
	$file="../private/panier";
	$panier = $_SESSION['panier'];

	if (file_exists($file))
		$tab = unserialize(file_get_contents($file));
	print_r($panier);
	$panier['login']=$_SESSION['loggued_on_user'];
	$panier['id']=uniqid();
	$panier['total']=price_panier($panier);
	$tab[]=$panier;
	$seria=serialize($tab);
	file_put_contents($file,$seria);
	unset($_SESSION['panier']);
}

if ($_POST['submit']='valider panier')
	add_panier_db();

?>
<html>
<head>
</head>
<body>
</body>
<html>
