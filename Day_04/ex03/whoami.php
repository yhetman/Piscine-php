<?php
    session_start();
	if ($_SESSION['signed'])
		echo $_SESSION['signed'] . "\n";
	else
        echo "ERROR\n";
?>