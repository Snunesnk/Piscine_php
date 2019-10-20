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
$file ="../private/users";
$users = unserialize(file_get_contents($file));
if (!is_admin_from_admin($_SESSION['loggued_on_user'])){
?>
<p>Et non, tu n'es pas admin!
<a href="../index.php">espace client </a>
</p>
<?PHP
exit();
}

$nom = array_keys($_POST);
$action = substr($nom[0],0,5);
$login = substr($nom[0],5);

if ($action == "modif")
{
	foreach($users as $k=>$v)
	{
		if ($users[$k]['login'] == $login)
			$users[$k]['su']= 1 - $users[$k]['su'];
	}
}

if ($action == "delet")
{
	$new = array();
	foreach($users as $k=>$v)
	{
		if ($users[$k]['login'] != $login)
			array_push($new,$users[$k]);
	}
	$users=$new;
}

	echo "<div class='admin'>";
foreach($users as $user)
{
	print_user($user);
}
	echo "</div>";

$seria = serialize($users);
file_put_contents($file,$seria);


function print_user($user)
{
	echo $user['login']."  : admin : ".$user['su'];
	echo"<form class='formadmin' method ='post' action='modif_user.php'>";
	echo "<input type='submit' name='modif".$user['login']."' value='modif'>";
	echo "<input type='submit' name='delet".$user['login']."' value='delete'>";
	echo "</form><br/>";
}
?>
<a href="../espace_admin.php">espace admin</a>

</body>
</html>
