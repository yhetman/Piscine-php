<?php
    include 'logging_utils.php';

	session_start();
	$conn_link = mysqli_connect('localhost', 'root', 'root', 'minishop');

    if (!(empty($_POST['password']) && empty($_POST['password-repeat']))) {
        if ($_POST['password'] == $_POST['password-repeat']) {
            add_user($conn_link, $_POST['login'], hash('sha256', $_POST['password']));
            header("Location: login.php");
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <title>Register</title>
<link rel='stylesheet' href='stylesheets/register.css'>
</head>
	</head>
	<body>
		<form name='register.php' method='post'>
			<div class = 'container'>
			<h1>Register a new account</h1>
			<label for='nm'><b>Username:</b></label> 
			<input type='text' name='login' placeholder='Enter name' required>  			
  			<br>
  			<label for='psw'><b>Password:</b></label> 
  			<input type='password' name='password' placeholder='Enter password' required>
  			<br>
  			<label for='psw-repeat'><b>Repeat password:</b></label> 
  			<input type='password' name='password-repeat' placeholder='Repeat password' required>
  			<br>
  			<div onclick='toogle()'><button type='submit'  name='submit' value="OK">OK</div></div>
		</form> 
	<div id ='already' class='signin'>
    <p>Already have an account? <a href='login.php'>Sign in</a></p>
  </div>
  <script>
  function toogle(){
  	var element = document.getElementById('already');
  	var el2 = document.getElementById('ok');
  	element.style.display = 'none';
  	el2.style.display = 'block';
  }
  </script>
	</body>
</html>