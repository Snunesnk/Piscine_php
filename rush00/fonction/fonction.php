<?PHP

function is_admin($login)
{
	$file = "private/users";
	$users=unserialize(file_get_contents($file));
	foreach ($users as $user)
	{
		if ($user['login'] == $login && $user['su'] == 1)
			return(1);
	}
	return(0);
}

function is_admin_from_admin($login)
{
	$file = "../private/users";
	$users=unserialize(file_get_contents($file));
	foreach ($users as $user)
	{
		if ($user['login'] == $login && $user['su'] == 1)
			return(1);
	}
	return(0);
}
function find_article($var)
{
	$file = "../private/article";
	$flip=array_flip($var);
	$id_article = $flip['ok'];
	$articles = unserialize(file_get_contents($file));
	foreach($articles as $k=>$v)
	{
		if ($articles[$k]['id'] == $id_article)
			return($articles[$k]);
	}
}

function print_image($categ, $articles)
{
	foreach($articles as $article)
	{
		if ($article['categorie'][$categ] === "O")
		{
			echo "<figure class='fig'>";
			echo "<img class='image' src='".$article['image']."' alt=img>";
			echo "<figcaption>".$article['type'].": ".$article['price']."&euro;</figcaption>";
			print_form($article);
			echo "</figure><br />";
		}
	}
}

function print_form($article)
{
	echo "<br /><form class='form' method='post' action='../panier/traitement.php'>";
	echo "Quantit&eacute;:<br />";
	echo "<input type='number' name='quantity'>";
	echo "<input type='submit' name='".$article['id']."' value='ok'>";
	echo "</form>";
}

function print_categorie()
{
	$file = "private/categorie";
	$categories = unserialize(file_get_contents($file));
	foreach($categories as $categorie)
	{
		echo "<figure>";
		echo "<figcaption align='center'>Cat&eacute;gorie ".$categorie['nom'].":</figcaption><br />";
		echo "<a href=\"index.php?categorie=".$categorie['nom']."\">";
		echo "<img class='categorie' src='".$categorie['image']."' alt=img> </a>\n";
		echo "</figure>";
	}
}

?>
