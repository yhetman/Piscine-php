#!/usr/bin/php
<?php
    if ($argc != 4)
    	echo "Incorrect Parameters\n";
    else
    {
    	$first = trim($argv[1]);
    	$second = trim($argv[3]);
    	$sign = trim($argv[2]);
    	if ($second == 0 && ($sign == "/" || $sign == "%"))
    		echo "You can't divide by 0!\n";
    	else if ($sign == "+")
    		echo $first + $second."\n";
    	else if ($sign == "-")
    		echo $first - $second."\n";
    	else if ($sign == "/")
    		echo $first / $second."\n";
    	else if ($sign == "*")
    		echo $first * $second."\n";
    	else if ($sign == "%")
    		echo $first % $second."\n";
    }
?>