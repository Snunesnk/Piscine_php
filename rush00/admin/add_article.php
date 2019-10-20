<?PHP
$file = "../private/article";
require_once("../fonction/fonction.php");
session_start();
function set_categ($nom_categ, &$newtab)
{
	if (isset($_POST[$nom_categ]))
		$newtab['categorie'][$nom_categ]="O";
	else
		$newtab['categorie'][$nom_categ]="N";
}
?>
<html>
	<head>
		<meta charset="utf8">
		<link rel="stylesheet" href="../style.css">
	</head>

	<body>
<?PHP if (!is_admin_from_admin($_SESSION['loggued_on_user'])){
?>
<p>Et non, tu n'es pas admin!
<a href="../index.php">espace client </a>
</p>
<?PHP
exit();
}
if($_POST['name'] != "" && $_POST['price'] != "" && $_POST['img'] != "")
{
	$new_tab = array();
	$tab = array();
	if (file_exists($file))
		$tab = unserialize(file_get_contents($file));
	$new_tab['type'] = $_POST['name'];
	$new_tab['price'] = $_POST['price'];
	$new_tab['image'] = $_POST['img'];
	set_categ("femme",$new_tab);
	set_categ("homme",$new_tab);
	set_categ("enfant",$new_tab);
	$i = 0;
	foreach($tab as $elem)
	{
		if ($elem['type'] == $_POST['name'])
		{
			$i++;
			if ($i == 1)
				echo "<p id='error'>Error: Cet article existe deja</p>";
		}
	}
	if ($i == 0)
	{
		$tab[] = $new_tab;
		print_r($_tab);
		$seria = serialize($tab);
		file_put_contents($file,$seria);
	}
}
?>
		<form method="post" action="add_article.php">
				<label for="name">nom article :</label>
				<input type="text" name="name" id="name" value=>
				<br/>
				<br/>
				<label for="price">prix :</label>
				<input type="number" min ="1"  name="price" id="price" value=>
				<br/>
				<br/>
				<label for="img">lien image :</label>
				<input type ="text" name="img" id="img" value=>
				<br/>
				<br/>
 				<label for="categorie"><b>categories: </b><br/></label>
				homme :<input type="checkbox" id="categorie" name="homme"checked>
				femme :<input type="checkbox"  name="femme"checked>
				enfant :<input type="checkbox" name="enfant"checked =>
				<div>
				<input type="submit" name="submit" value='ok'>
				</div>
		</form>
<br/><br/><br/>
		<div>
		<a href="../espace_admin.php">espace admin</a>
		</div>
	</body>
</html>
