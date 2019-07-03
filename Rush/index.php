<?php
    include 'market_rendered.php';
    include 'toolbar.php';

    session_start();

	$conn_link = mysqli_connect('localhost', 'root', 'root', 'minishop');
	$category = isset($_GET['category']) ? $_GET['category'] : ALL;

	if (!isset($_SESSION['cart'])) {
	    $_SESSION['cart'] = array();
	}
	if (!isset($_SESSION['from_cart'])) {
		$_SESSION['from_cart'] = false;
    }

	if ($_SESSION['from_cart']) {
		$_SESSION['from_cart'] = false;
    } else {

		if (isset($_GET['add'])) {
			$cursor = mysqli_query($conn_link, 'SELECT * FROM products ORDER BY id DESC LIMIT 1;');
			$row = mysqli_fetch_assoc($cursor);
			$max_id = $row[KEY_ID];

			$product_id = $_GET['add'];
			if (is_numeric($product_id) && $product_id <= $max_id) {
				if (!isset($_SESSION['cart'][$product_id])) {
					$_SESSION['cart'][$product_id] = 1;
				} else {
					$_SESSION['cart'][$product_id]++;
				}
			}
		}

	}

	$products_ordered = 0;
	foreach ($_SESSION['cart'] as $product_id => $quantity) {
	    $products_ordered += $quantity;
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Minishop</title>
    <link href="stylesheets/main.css" rel="stylesheet">
</head>
<body>
<header>
    <ul>
        <li><a <?php get_active(ALL, $category)?> href="index.php">All</a></li>
        <li><a <?php get_active(BATTERY, $category)?> href="index.php?category=battery">Battery</a></li>
        <li><a <?php get_active(GASOLINE, $category)?> href="index.php?category=gasoline">Gasoline</a></li>
        <li><a <?php get_active(ELECTRO, $category)?> href="index.php?category=electro">Electro</a></li>
    </ul>
    <?php
        if (!isset($_SESSION['user'])) {
            echo '<a href="login.php"><img class="login_logout" src="images/login.png"></a>';
        } else {
	        echo '<a href="logout.php"><img class="login_logout" src="images/logout.png"></a>';
        }
    ?>
    <a href="cart.php"><img id="cart" src="images/cart_black_64px.png"></a>
    <?php render_cart_counter($products_ordered) ?>
</header>

<section id="market">
	<table>
		<tbody>
			<?php render_market($conn_link, $category)?>
		</tbody>
	</table>
</section>
</body>
</html>