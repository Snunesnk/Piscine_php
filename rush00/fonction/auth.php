<?PHP

function check_dir($file)
{
	if(!file_exists($file))
		mkdir($file);
}

function auth($login, $passwd)
{
	$tab = array();

	$file ="../private/users";
	if (file_exists($file))
		$tab = unserialize(file_get_contents($file));
	$hashpw=hash("whirlpool",$passwd);	
	foreach($tab as $elem)
	{
		if ($elem['login'] == $login && $elem['passwd'] == $hashpw)
			return(TRUE);
	}
	return(FALSE);
}

?>
