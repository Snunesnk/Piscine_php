<?php
session_start();

$file2 = "../private/users";

if($_POST['submit'] != "" && $_POST['login'] != "" && $_POST['passwd'] != "")
{
	$new_tab = array();
	$tab = array();
	if (file_exists($file2))
		$tab = unserialize(file_get_contents($file2));
	$new_tab['login'] = $_POST['login'];
	$new_tab['passwd'] = hash('whirlpool',$_POST['passwd']);
	$new_tab['su'] = 0;
	$new_tab['id_panier'] = 0;
	foreach($tab as $elem)
	{
		if ($elem['login'] == $_POST['login'])
		{
			$_SESSION['loggued_on_user'] = "";
			$_SESSION['error'] = "<p id='error'>Error: Incorrect login/password</p>";
			header('Location:../index.php');
			exit();
		}
	}
	$tab[] = $new_tab;
	$seria = serialize($tab);
	file_put_contents($file2,$seria);
	header('Location:../index.php');
	echo "OK\n";
}
else
{
	$_SESSION['loggued_on_user'] = "";
	$_SESSION['error'] = "<p id='error'>Error: Incorrect login/password</p>";
	header('Location:../index.php');
}

?>
