<?php
	include "logging_utils.php";

    session_start();

    $conn_link = mysqli_connect('localhost', 'root', 'root', 'minishop');
    if (is_valid_credentials($conn_link, $_POST['login'], hash('sha256', $_POST['password']))) {
        $_SESSION['user'] = $_POST['login'];
        header('Location: index.php');
    }
    else {
        $_SESSION['user'] = null;
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <title>Sign in</title>
<link rel='stylesheet' href='stylesheets/register.css'>
</head>
    </head>
    <body>
        <form name='login.php' method='post'>
            <div class = 'container'>
            <label for='nm'><b>Username:</b></label>
            <input type='text' name='login' placeholder='Enter name' required>
            <br>
            <label for='psw'><b>Password:</b></label>
            <input type='password' name='password' placeholder='Enter password' required>
            <br>
            <button type='submit' name='submit' value="Sign_in">Sign in</div>
        </form>
    </body>
    <a href="register.php"><div class="btn_register">Register</div></a>

</html>