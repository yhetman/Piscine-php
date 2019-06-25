#! /usr/bin/php
<?php
    $arg = 1;
    foreach ($argv as $word)
    {
        if ($arg++ > 1)
            echo "$word", PHP_EOL;
    }
?>