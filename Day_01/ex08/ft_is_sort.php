#!/usr/bin/php
<?php
    function ft_is_sort($tab)
    {
        $temp = $tab;
        $r_temp = $tab;
        sort($temp);
        rsort($r_temp);
	    if ($temp == $tab || $r_temp == $tab)
	    	return (TRUE);
	    else
	    	return(FALSE);
    }
?>