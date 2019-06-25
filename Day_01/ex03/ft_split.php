#! /usr/bin/php
<?php
    function ft_split($input)
    {
        $line = trim($input);
        $line = preg_replace("( +)", " ", $line);
        $arr = array();
	    if ($line)
	    	$arr =  explode(' ', $line);
	    sort($arr);
	    return ($arr);
    }
?>