#!/usr/bin/php
<?php

if ($argc > 1)
{
	if (!check_str($argv[1]))
	{
		print("Wrong Format\n");
	}
	else
	{
		$field = 0;
		$exploded_date = explode(" ", $argv[1]);
		foreach ($exploded_date as $elem)
		{
			if ($field == 1)
			{
				$day = $elem;
			}
			else if($field == 2)
			{
				$month = check_month($elem) + 1;
			}
			else if ($field == 3)
			{
				$year = $elem;;
			}
			else if ($field == 4)
			{
				$exploded_time = explode(":", $elem);
				$field = 0;
				foreach ($exploded_time as $time)
				{
					if ($field == 0)
						$hour = $time;
					else if ($field == 1)
						$minute = $time;
					else if ($field == 2)
						$second = $time;
					$field++;
				}
			}
			$field++;
		}
		print("hour: $hour, minute: $minute, second: $second, month: $month, day: $day, year: $year\n");
		$total_time = mktime($hour, $minute, $second, $month, $day, $year);
		print($total_time."\n");
	}
}

function check_str($str)
{
	$valid = 1;
	$field = 0;
	$time_field = 0;

	$exploded_date = explode(" ", $str);
	foreach ($exploded_date as $elem)
	{
		if ($field == 0)
			$valid = check_days($elem);
		else if ($valid && $field == 1)
			$valid = is_numeric($elem);
		else if ($valid && $field == 2)
			$valid = check_month($elem);
		else if ($valid && $field == 3)
			$valid = is_numeric($elem);
		else if ($valid && $field == 4)
		{
			$exploded_time = explode(":", $elem);
			foreach ($exploded_time as $time)
			{
				if ($valid)
					$valid = is_numeric($time);
				$time_field++;
			}
		}
		$field++;
	}
	if ($field != 5 || $time_field != 3)
		$valid = 0;
	return ($valid);
}

function check_days($day)
{
	$valid = 0;

	if ($day == "Lundi" || $day == "lundi")
		$valid = 1;
	else if ($day == "Mardi" || $day == "mardi")
		$valid = 2;
	else if ($day == "Mercredi" || $day == "mercredi")
		$valid = 3;
	else if ($day == "Jeudi" || $day == "jeudi")
		$valid = 4;
	else if ($day == "Vendredi" || $day == "vendredi")
		$valid = 5;
	else if ($day == "Samedi" || $day == "samedi")
		$valid = 6;
	else if ($day == "Dimanche" || $day == "dimanche")
		$valid = 7;
	return ($valid);
}

function check_month($month)
{
	$valid = 0;
	$nb_month = 1;

	$maj_month = array("Janvier", "Fevrier", "Mars", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre");
	$min_month = array("janvier", "fevrier", "mars", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre");

	foreach ($maj_month as $cmp)
	{
		if ($month == $cmp)
			$valid = $nb_month;
		$nb_month++;
	}
	if (!$valid)
	{

		foreach ($min_month as $cmp)
		{
			if ($month == $cmp)
				$valid = $nb_month;
			$nb_month++;
		}
	}
	return ($valid);
}
?>
