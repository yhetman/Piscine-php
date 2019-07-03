#!/usr/bin/php
<?php
    function ft_split($input)
    {
		$str = preg_replace("( +)", " ", trim($input));
		$arr = array();
		if ($str)
			$arr =  explode(' ', $str);
		sort($arr);
		return ($arr);
	}
	$arr = array();
    for ($i = 1; $i < $argc; $i++)
    {
		$split = ft_split($argv[$i]);
        foreach ($split as $elem)
        {
			array_push($arr, $elem);
		}
	}
	sort($arr, SORT_STRING);
    foreach ($arr as $str)
    {
		echo "$str" . PHP_EOL;
	}
?>