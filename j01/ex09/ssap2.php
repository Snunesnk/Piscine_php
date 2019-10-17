#!/usr/bin/php
<?php

if ($argv[1])
{
	$array = ft_fill_array($argv);
	$array = ft_sort_array($array);
	ft_print_array($array);
}

function ft_fill_array($argv)
{
	$i = 0;
	$nb = 0;
	foreach ($argv as $param)
	{
		if ($nb != 0)
		{
			$exploded_argv = explode(" ", $param);
			foreach ($exploded_argv as $words)
			{
				if ($words[0])
				{
					$array[$i] = $words;
					$i++;
				}
			}
		}
		$nb++;
	}
	return ($array);
}

function ft_sort_array($array)
{
	$i = 0;
	while ($array[$i + 1])
	{
		if (ft_strcmp($array[$i], $array[$i + 1]) > 0)
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

function ft_strcmp($str1, $str2);
{
	if (is_int())
}

function ft_print_array($array)
{
	foreach($array as $word)
	{
		print($word."\n");
	}
}
?>
