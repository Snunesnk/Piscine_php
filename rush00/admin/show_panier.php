<?PHP
session_start();
require_once("../fonction/fonction.php");
?>

<html>
<head>
<link rel="stylesheet" href="../style.css">
</head>
<body>
<?PHP
$file ="../private/panier";
if (file_exists("../private/panier"))
{
	$paniers = unserialize(file_get_contents($file));
	if (!is_admin_from_admin($_SESSION['loggued_on_user']))
	{
		?>
		<p>Et non, tu n'es pas admin!
		<a href="../index.php">espace client </a>
		</p>
		<?PHP
	}
	foreach($paniers as $k=>$v)
	{
		echo "<b> user : ".$paniers[$k]['login']." Prix Panier : ".$paniers[$k]['total']."  Reference : ".$paniers[$k]['id']."</b><br/>";
		foreach($paniers[$k]['name'] as $key2=>$v2)
		{
			if (intval($paniers[$k]['quantity'][$key2]) > 0)
			{
				echo $paniers[$k]['name'][$key2]." : ".$paniers[$k]['quantity'][$key2];
				echo "<br/>";
			}
		}
		echo "<br/>";
	}
}
?>
<a href="../espace_admin.php">espace admin</a>

</body>
</html>
