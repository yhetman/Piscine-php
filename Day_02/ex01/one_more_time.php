#!/usr/bin/php
<?
    function write_error()
    {
        echo "Wrong Format\n";
        exit(-42);
    }
    if ($argc != 2)
    {
        exit(-42);
    }
    if ($argv[1])
    {
        $filtered = array_slice(array_filter(explode(" ", $argv[1])), 0);
        if (count($filtered) != 5)
            write_error();
        $imploded = implode(" ", $filtered);
        if (preg_match("/[0-9][0-9]:[0-9][0-9]:[0-9][0-9]/", $imploded) != 1)
            write_error();
        $before = $imploded;
        $imploded = preg_replace("/[Jj]anvier/", '01', $imploded);
        $imploded = preg_replace('/[Ff]evrier/', '02', $imploded);
        $imploded = preg_replace('/[Mm]ars/', '02', $imploded);
        $imploded = preg_replace('/[Aa]vril/', '03', $imploded);
        $imploded = preg_replace('/[Mm]ai/', '05', $imploded);
        $imploded = preg_replace('/[Jj]uin/', '06', $imploded);
        $imploded = preg_replace('/[Jj]uillet/', '07', $imploded);
        $imploded = preg_replace('/[Aa]out/', '08', $imploded);
        $imploded = preg_replace('/[Ss]eptembre/', '09', $imploded);
        $imploded = preg_replace('/[Oo]ctobre/', '10', $imploded);
        $imploded = preg_replace('/[Nn]ovembre/', '11', $imploded);
        $imploded = preg_replace('/[Dd]ecembre/', '12', $imploded);
        if ($before === $imploded)
            write_error();
        $before = $imploded;
        $imploded = preg_replace('/[Dd]imanche/', '0', $imploded);
        $imploded = preg_replace('/[Ll]undi/', '1', $imploded);
        $imploded = preg_replace('/[Mm]ardi/', '2', $imploded);
        $imploded = preg_replace('/[Mm]ercredi/', '3', $imploded);
        $imploded = preg_replace('/[Jj]eudi/', '4', $imploded);
        $imploded = preg_replace('/[Vv]endredi/', '5', $imploded);
        $imploded = preg_replace('/[Ss]amedi/', '6', $imploded);
        if ($before === $imploded)
            write_error();
        $trying_to_parse = strptime($imploded, "%w %d %m %Y %H:%M:%S");
        if ($trying_to_parse === FALSE)
            write_error();
        if (strlen($trying_to_parse["unparsed"]) > 0)
            write_error();
        unset($filtered[0]);
        $original = implode(" ", $filtered);
        $original = preg_replace("/[Jj]anvier/", 'January', $original);
        $original = preg_replace('/[Ff]evrier/', 'February', $original);
        $original = preg_replace('/[Mm]ars/', 'March', $original);
        $original = preg_replace('/[Aa]vril/', 'April', $original);
        $original = preg_replace('/[Mm]ai/', 'May', $original);
        $original = preg_replace('/[Jj]uin/', 'June', $original);
        $original = preg_replace('/[Jj]uillet/', 'July', $original);
        $original = preg_replace('/[Aa]out/', 'August', $original);
        $original = preg_replace('/[Ss]eptembre/', 'September', $original);
        $original = preg_replace('/[Oo]ctobre/', 'October', $original);
        $original = preg_replace('/[Nn]ovembre/', 'November', $original);
        $original = preg_replace('/[Dd]ecembre/', 'December', $original);
        date_default_timezone_set("Europe/Paris");
        if (strlen(strtotime($original)) > 0)
           echo strtotime($original) . PHP_EOL;
        else
            write_error();
    }
?>