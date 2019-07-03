<?php

	const KEY_PRODUCT_IMG = 'img_path';
	const KEY_PRODUCT_NAME = 'name';
	const KEY_PRODUCT_COST = 'cost';
	const KEY_ID = 'id';

	function render_market($conn_link, $category = ALL) {
		if ($category == ALL) {
			$cursor = mysqli_query($conn_link, 'SELECT * FROM products;');
		} else {
			if (is_valid_category($category)) {
				$cursor = mysqli_query($conn_link, "SELECT * FROM products WHERE category='$category'");
			}
		}
		$rows_number = mysqli_num_rows($cursor);
		for ($i = 0; $i < $rows_number; $i++) {
			if ($i % 3 == 0) {
				echo '<tr>';
			}
			$product_data = mysqli_fetch_assoc($cursor);
			$img = "product_images/" . $product_data[KEY_PRODUCT_IMG];
			$product_name = $product_data[KEY_PRODUCT_NAME];
			$product_cost = $product_data[KEY_PRODUCT_COST];
			$product_id = $product_data[KEY_ID];
			echo "<td>
					<img src='$img'>";
			echo    "<p class='product_name'>$product_name</p>";
			printf("<p class='cost'>%.2f$</p>", $product_cost);
			$add_url = "index.php?" . ($category != ALL ? "category=" . $category . "&" : "") . "add=" . $product_id;
			printf("<a href='%s'><div class='add_to_cart_button'>ADD TO CART</div></a>", $add_url);
			echo "</td>";
			if (($i + 1) % 3 == 0) {
				echo '</tr>';
			}
		}
		if ($rows_number % 3 != 0) {
			echo '</tr>';
		}
	}