#!/usr/bin/php
<?php

$array = explode(" ", $argv[1]);
$printed = 0;

foreach($array as $word)
{
	if ($word[0])
	{
		if ($printed > 0)
			print(" ");
		else
			$printed++;
		print($word);
	}
}
if ($argv[1])
	print("\n");

?>
