#!/usr/bin/php
<?php
    function ft_split($input)
    {
        $str = preg_replace("( +)", " ", trim($input));
        $arr = array();
        if ($str)
            $arr = explode(' ', $str);
        return ($arr);
    }
    $rostr = ft_split($argv[1]);
    if ($argc == 1 || !($rostr))
        return ;
    for ($i = 1; $i < count($rostr); $i++)
        echo "$rostr[$i] ";
    echo $rostr[0], PHP_EOL;
?>