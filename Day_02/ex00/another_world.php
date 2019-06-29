#!/usr/bin/php
<?php
if ($argv[1])
{
	$str = preg_replace('/\s+/', ' ', trim($argv[1]));
		if ($str)
			echo "$str"."\n";
}
?>