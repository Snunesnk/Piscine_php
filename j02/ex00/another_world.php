#!/usr/bin/php
<?php

if ($argv[1])
{
	$printed = 0;
	$exploded_param = explode(" ", $argv[1]);
	foreach($exploded_param as $elem)
	{
		$exploded_elem = explode("\t", $elem);
		foreach ($exploded_elem as $word)
		{
			if ($word[0])
			{
				if ($printed != 0)
					print(" ");
				print($word);
				$printed++;
			}
		}
	}
	print("\n");
}

?>
