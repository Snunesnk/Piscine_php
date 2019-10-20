<?PHP
session_start();

function change_tab(&$tab)
{
	$pw_hash = hash("whirlpool",$_POST['oldpw']);
	foreach($tab as $key=>$value)
	{
		if ($tab[$key]['login'] == $_POST['login'] && $tab[$key]['passwd'] == $pw_hash)
		{
			$tab[$key]['passwd'] = hash("whirlpool",$_POST['newpw']);
			return(1);
		}
	}
	$_SESSION['error'] = "<p id='error'>Error: Incorrect login/password</p>";
	header('Location:../index.php');
	exit();
}

$file2 = "../private/users";

if (!file_exists($file2))
{
	$_SESSION['error'] = "<p id='error'>Error: Incorrect login/password</p>";
	header('Location:../index.php');
	exit();
}

if($_POST['submit'] != "" && $_POST['login'] != "" && $_POST['oldpw'] != "" && $_POST['newpw'] != "")
{
	$new_tab = array();
	$tab = unserialize(file_get_contents($file2));
	change_tab($tab);
	$seria = serialize($tab);
	file_put_contents($file2,$seria);
	header('Location:../index.php');
	echo "OK\n";
}
else
{
	$_SESSION['error'] = "<br /><p id='error'>Error: Incorrect login/password</p>";
	header('Location:../index.php');
}

?>
