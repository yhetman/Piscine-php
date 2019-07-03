<?php
	const ALL = 'all';
	const BATTERY = 'battery';
	const GASOLINE = 'gasoline';
	const ELECTRO = 'electro';

	function get_active($category, $category_picked) {
		if ($category == $category_picked) {
			echo 'class="active"';
		}
	}

	function is_valid_category($category) {
		return  $category == BATTERY ||
				$category == GASOLINE ||
				$category == ELECTRO ||
				$category == ALL;
	}

	function render_cart_counter($products_ordered) {
		if ($products_ordered > 0) {
			echo "<div id='cart_counter'><span>$products_ordered</span></div>";
		}
	}