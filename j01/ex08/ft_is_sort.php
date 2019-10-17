<?php

function ft_is_sort($array)
{
	$i = 1;
	$is_sorted = 1;

	foreach ($array as $elem)
	{
		if (strcmp($elem, $array[$i]) > 0 && $array[$i])
			$is_sorted = 0;
		$i++;
	}
	return ($is_sorted);
}

?>
