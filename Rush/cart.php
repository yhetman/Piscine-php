<?php
	include 'cart_renderer.php';

	session_start();

	$conn_link = mysqli_connect('localhost', 'root', 'root', 'minishop');
	$_SESSION['from_cart'] = true;

	if (isset($_POST['reset'])) {
	    $_SESSION['cart'] = array();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Minishop</title>
	<link href="stylesheets/cart.css" rel="stylesheet">
</head>
<body>
<header>
	<span>CART</span>
</header>

<?php
    if (count($_SESSION['cart'])) {
        echo '<section id="ordered_items">
            <table>
                <tbody>';
                    render_cart($conn_link);
        echo    '</tbody>
            </table>';
            if (isset($_SESSION['user'])) {
	            echo '<form method="post" action="submit_order.php">';
            } else {
	            echo '<form method="post" action="login.php">';
            }
        echo '<button class="btn_buy" type="submit">BUY NOW</button>
            </form>
            
            <form method="post" action="cart.php">
                <button class="btn_reset" type="submit" name="reset" value="true">RESET CART</button>
            </form>
        </section>';
    } else {
        echo '<h1 class="empty">Empty</h1>';
    }
?>
</body>
</html>
