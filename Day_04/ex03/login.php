<?php
    session_start();
	include ('auth.php');
    if (auth($_GET['login'], hash("whirlpool", $_GET['passwd'])))
    {
		$_SESSION['signed'] = $_GET['login'];
		echo "OK\n";
	}
    else
    {
		$_SESSION['signed'] = "";
		echo "ERROR\n";
	}
?>