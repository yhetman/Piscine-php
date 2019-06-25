#! /usr/bin/php
<?php
    $trimed = preg_replace("( +)", " ", trim($argv[1]));
	if ($trimed)
		echo "$trimed\n";
?>