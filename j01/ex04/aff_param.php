#!/usr/bin/php
<?php

$i = 0;

foreach($argv as $elem)
{
	if ($i != 0)
		print($argv[$i]."\n");
	$i++;
}

?>
