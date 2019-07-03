<?php
	function add_user($conn_link, $name, $hashed_password) {
		$cursor = mysqli_query($conn_link, "SELECT * FROM users WHERE name='$name'");
		if (mysqli_num_rows($cursor) != 0) {
			// such user exists
			return false;
		}
		mysqli_query($conn_link, "INSERT INTO users VALUES ('$name','$hashed_password')");
	}

	function delete_user($conn_link, $name) {
		mysqli_query($conn_link, "DELETE FROM users WHERE name='$name'");
	}

	function is_valid_credentials($conn_link, $name, $hashed_password) {
		$cursor = mysqli_query($conn_link, "SELECT * FROM users WHERE name='$name' AND password='$hashed_password'");
		if (mysqli_num_rows($cursor) == 0) {
			return false;
		} else {
			return true;
		}
	}