<?php
	const KEY_PRODUCT_IMG = 'img_path';
	const KEY_PRODUCT_NAME = 'name';
	const KEY_PRODUCT_COST = 'cost';
	const KEY_PRODUCT_ID = 'id';
	const KEY_PRODUCT_CATEGORY = 'category';

	const MONEY_FORMAT = '%.2f$';

	function render_cart($conn_link) {
		$query = form_query();
		$cursor = mysqli_query($conn_link, $query);
		$total_cost = 0;

		while ($product = mysqli_fetch_assoc($cursor)) {
			$img_path = 'product_images/' . $product[KEY_PRODUCT_IMG];
			$quantity = $_SESSION['cart'][$product[KEY_PRODUCT_ID]];
			$cost = sprintf(MONEY_FORMAT, $product[KEY_PRODUCT_COST]);
			$title = $product[KEY_PRODUCT_NAME];
			$category = $product[KEY_PRODUCT_CATEGORY];
			$total_cost += $quantity * $cost;
			echo "<tr>
                <td>
                    <img src='$img_path'>
                    <p class='quantity'>x$quantity</p>
                </td>
                <td class='product_description'>
                    <p class='product_title'>$title</p>
                    <p class='product_cost'>$cost</p>
                    <p class='product_category'>$category</p>
                </td>
            </tr>
            <tr>";
		}
		$total_cost = sprintf(MONEY_FORMAT, $total_cost);
		echo "<tr>
                <td class='total_title'>
                    Total:
                </td>
                <td class='total_cost'>
                    $total_cost
                </td>
            </tr>";
	}
	
	function form_query() {
		$query = 'SELECT * FROM products WHERE ';

		$first_param = true;
		foreach ($_SESSION['cart'] as $product_id => $quantity) {
			if (!$first_param) {
				$query .= ' OR ';
			}
			$first_param = false;
			$query .= "id=$product_id";
		}
		$query .= ' ORDER BY name;';
		return $query;
	}
