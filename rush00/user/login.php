<?PHP
include '../fonction/auth.php';
session_start();

if (isset($_POST))
{
	if (auth($_POST['login'],$_POST['passwd']))
	{
		$_SESSION['loggued_on_user'] = $_POST['login'];
		setcookie('login', $_POST['login'],time()+365*24*3600);
		header('Location:../index.php');
	}
	else
	{
		$_SESSION['loggued_on_user'] = "";
		$_SESSION['error'] = "<p id='error'>Error: Incorrect login/password</p>";
		header('Location:../index.php');
	}
}

?>
