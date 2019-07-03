<?php
	include 'adminka_renderer.php';
	include 'logging_utils.php';

	$conn_link = mysqli_connect('localhost', 'root', 'root', 'minishop');
	if (!empty($_POST['user_name'])) {
		delete_user($conn_link, $_POST['user_name']);
	}

	if (!empty($_POST['order_id'])) {
		$order_id = $_POST['order_id'];
		mysqli_query($conn_link, "DELETE FROM orders WHERE id=$order_id");
	}

	if (!empty($_POST['product_id'])) {
		$product_id = $_POST['product_id'];
		mysqli_query($conn_link, "DELETE FROM products WHERE id=$product_id");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Minishop</title>
	<link href="stylesheets/adminka.css" rel="stylesheet">
    <script>
        function add_product() {
            alert("To add new product contact your web site maintainer, please.\n +380979940019")
        }
    </script>

</head>
<body>

<section id="users">
	<h1>Users</h1>
	<table>
		<tbody>
			<?php render_users($conn_link); ?>
		</tbody>
	</table>
</section>

<section id="orders">
	<h1>Orders</h1>
	<table>
		<tbody>
			<?php render_orders($conn_link); ?>
		</tbody>
	</table>
</section>

<section id="products">
	<h1>Products</h1>
	<table>
		<tbody>
			<?php render_products($conn_link); ?>
		</tbody>
	</table>

    <button class="btn_add" onclick="add_product()">ADD PRODUCT</button>

</section>
</body>
</html>
