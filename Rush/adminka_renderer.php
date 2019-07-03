<?php
	const MONEY_FORMAT = '%.2f$';
	const KEY_PRODUCT_IMG = 'img_path';
	const KEY_PRODUCT_NAME = 'name';
	const KEY_PRODUCT_COST = 'cost';
	const KEY_PRODUCT_ID = 'id';
	const KEY_PRODUCT_CATEGORY = 'category';

	function render_users($conn_link) {
		$cursor = mysqli_query($conn_link, 'SELECT * FROM users');
		while ($user = mysqli_fetch_assoc($cursor)) {
			$user_name = $user['name'];
			echo "<tr>
				<td>
					$user_name
				</td>
				<td>
					<form method='post' action='adminka.php'>
						<button type='submit' name='user_name' value='$user_name'>DELETE</button>
					</form>
				</td>
			</tr>";
		}
	}

	function render_orders($conn_link) {
		$cursor = mysqli_query($conn_link, 'SELECT * FROM orders');
		while ($order = mysqli_fetch_assoc($cursor)) {
			$order_id = $order['id'];
			$deserialized_order = unserialize($order['the_order']);
			$user_name = $order['user'];
			echo "<tr>
				<td>
					$user_name -> 
				</td>
				<td>";

			foreach ($deserialized_order as $product_id => $quantity) {
				echo "<span>Id: $product_id quantity: $quantity ~ </span>";
			}
			echo "</td>
				<td>
					<form method='post' action='adminka.php'>
						<button type='submit' name='order_id' value='$order_id'>SHIPPED!</button>
					</form>
				</td>
			</tr>";
		}
	}

	function render_products($conn_link) {
		$query = 'SELECT * FROM products';
		$cursor = mysqli_query($conn_link, $query);

		while ($product = mysqli_fetch_assoc($cursor)) {
			$product_id = $product[KEY_PRODUCT_ID];
			$img_path = 'product_images/' . $product[KEY_PRODUCT_IMG];
			$cost = sprintf(MONEY_FORMAT, $product[KEY_PRODUCT_COST]);
			$title = $product[KEY_PRODUCT_NAME];
			$category = $product[KEY_PRODUCT_CATEGORY];
			echo "<tr>
                <td>
                    <img src='$img_path'>
                </td>
                <td class='product_description'>
                    <p class='product_title'>$title</p>
                    <p class='product_cost'>$cost</p>
                    <p class='product_category'>$category</p>
                </td>
                <td>
					<form method='post' action='adminka.php'>
						<button type='submit' name='product_id' value='$product_id'>DELETE</button>
					</form>
				</td>
            </tr>";
		}
	}