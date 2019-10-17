#!/usr/bin/php
<?php

print("Entrez un nombre: ");
$input_nbr = rtrim(fgets(STDIN));
if (!is_numeric($input_nbr))
	print("'$input_nbr' n'est pas un chiffre\n");
else
{
	print("Le chiffre $input_nbr est ");
	if ($input_nbr % 2 == 0)
		print("Pair\n");
	else
		print("Impair\n");
}

?>
