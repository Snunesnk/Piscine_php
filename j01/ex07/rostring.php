#!/usr/bin/php
<?php

$first_param = explode(" ", $argv[1]);
$printed = 0;

foreach ($first_param as $word)
{
	if ($printed == 0)
		$ret = $word;
	else if ($word[0])
	{
		if ($printed > 1)
			print(" ");
		print($word);
	}
	$printed++;
}
if ($argv[1])
{
	if ($printed > 1)
		print(" ");
	print("$ret\n");
}
?>
