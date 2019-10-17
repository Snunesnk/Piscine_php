<?php

function ft_split($str)
{
	$array = ft_fill_array($str);
	$array = ft_sort_array($array);

	return ($array);
}

function ft_fill_array($str)
{
	$i = 0;
	$j = 0;

	$exploded_str = explode(" ", $str);
	foreach($exploded_str as $elem)
	{
		if ($elem[0])
		{
			$array[$j] = $elem;
			$j++;
		}
		$i++;
	}
	return ($array);
}

function ft_sort_array($array)
{
	$i = 0;
	while ($array[$i + 1])
	{
		if (strcmp($array[$i], $array[$i + 1]) > 0)
		{
			$ret = $array[$i];
			$array[$i] = $array[$i + 1];
			$array[$i + 1] = $ret;
			$i = 0;
		}
		else
			$i++;
	}
	return ($array);
}
?>
