<?PHP
session_start();
function create_panier()
{
	if (!isset($_SESSION['panier']))
	{
		$_SESSION['panier']= array();
		$_SESSION['panier']['name']= array();
		$_SESSION['panier']['quantity']= array();
		$_SESSION['panier']['price']= array();
	}
	return (TRUE);
}
function ajouterArticle($article,$quantity)
{
	$name = $article['type'];
	$price = $article['price'];
	if (create_panier())
	{
		$posprod= array_search($name, $_SESSION['panier']['name']);
		print_r($posprod);
		echo"\n";
		if($posprod !== FALSE)
		{
			$_SESSION['panier']['quantity'][$posprod]+= intval($quantity);
		}
		else
		{
			array_push($_SESSION['panier']['name'],$name);
			array_push($_SESSION['panier']['quantity'],$quantity);
			array_push($_SESSION['panier']['price'],$price);
		}
	}
}

function quantity_panier($panier)
{
	$sum = 0;
	if (!$panier)
		return(0);
	foreach($panier['quantity'] as $k=>$v)
	{
		if (is_numeric($v) && $v > 0)
			$sum += $v;
	}
	return($sum);
}

function price_panier($panier)
{
	$sum = 0;
	if (!$panier)
		return (0);
	foreach($panier['quantity'] as $k=>$v)
	{
		if ($v> 0)
			$sum += $v * $panier['price'][$k];
	}
	return($sum);
}

function print_panier()
{
	echo "<div class='center'><h2>Panier:</h2>";
	$panier = $_SESSION['panier'];
	if ($_SESSION['panier'])
	{
		foreach($panier['quantity'] as $k=>$v)
		{
			if ($v > 1)
			{
				echo $panier['name'][$k].":\n";
				echo "$v unit&eacute;s *  ".$panier['price'][$k]."&euro;<br />";
			}
			else if ($v == 1)
			{
				echo $panier['name'][$k].":\n";
				echo "$v unit&eacute; *  ".$panier['price'][$k]."&euro;<br />";
			}
			else 
				$_SESSION['panier']['quantity'][$k] = 0;
		}
	}
//	if(quantity_panier($panier) >=1)
		echo "<br /><b>prix total : ".price_panier($panier)."&euro;</b><br /></div><br />" ;
	if (!quantity_panier($panier))
		echo "<p><center>Votre panier est vide.</center></p>";
	if (quantity_panier($panier)>0 &&isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user']!= "")
		print_submit_panier();
}

function print_submit_panier()
{
		echo "<form class='form' method='post' action='../panier/traitement_panier.php'>\n";
		echo "<p class='center'>";
		echo "<input id='confirm' type='submit' name='submit' value='valider panier'>\n";
		echo"</p>";
		echo"</form>";
}
