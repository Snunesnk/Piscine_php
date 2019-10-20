<?PHP
$file2 = "../private/users";
session_start();
require_once("../fonction/fonction.php");
?>

<html>
	<head>
		<meta charset="utf8">
		<link rel="stylesheet" href="../style.css">
	</head>

	<body>
<?php if (!is_admin_from_admin($_SESSION['loggued_on_user'])){
?>
<p>Et non, tu n'es pas admin!
<a href="../index.php">espace client </a>
</p>
<?PHP
exit();
}
if($_POST['submit'] != "" && $_POST['login'] != "" && $_POST['passwd'] != "")
{
	$new_tab = array();
	$tab = array();
	if (file_exists($file2))
		$tab = unserialize(file_get_contents($file2));
	$new_tab['login'] = $_POST['login'];
	$new_tab['passwd'] = hash('whirlpool',$_POST['passwd']);
	if (isset($_POST['su']))
		$new_tab['su'] = 1;
	else
		$new_tab['su'] = 0;
	$i=0;
	foreach($tab as $elem)
	{
		if ($elem['login'] == $_POST['login'])
		{	
			$i++;
			if ($i == 1)
			{
				echo "<p id='error'>User already registered</p>";
			}
		}
	}
	if ($i == 0)
	{
		$tab[] = $new_tab;
		$seria = serialize($tab);
		file_put_contents($file2,$seria);
	}
}

?>
		<form method="post" action="add_user.php">
			<p>
				<label for="name">login :</label>
				<input type="text" name="login" id="login" value=>
				<label for="passwd">passwd :</label>
				<input type="password" name="passwd" id="passwd" value=>
 				<label for="admin">"Admin"</label>
				<input type="checkbox" id="admin" name="su"checked>
				<div>
				<input type="submit" name="submit" value='ok'>
				</div>
			</p>
		</form>
	</body>
</br></br></br>
<a href="../espace_admin.php">espace admin</a>
</html>
