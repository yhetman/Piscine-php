<?php
	session_start();

	$conn_link = mysqli_connect('localhost', 'root', 'root', 'minishop');

	$user_name = $_SESSION['user'];
	$orders = serialize($_SESSION['cart']);
	mysqli_query($conn_link, "INSERT INTO orders (user, the_order) VALUES ('$user_name', '$orders')");

	$_SESSION['cart'] = array();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Minishop</title>
	<link href="stylesheets/cart.css" rel="stylesheet">
    <style>
        h1 {
            text-align: center;
            color: dimgray;
        }
    </style>
</head>
<body>
	<h1>Wait till our manager will contact you.</h1>
</body>
</html>
