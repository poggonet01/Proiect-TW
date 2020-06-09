<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>TW Fashion Shop</title>
		<html lang = "en">
		<link href = "CSS/log.css" rel = "stylesheet" type = "text/css">
	</head>
		<body>
		<div class="log_logo"><a href="index.php?owner=Men">
		    Fashion eShop
		    </a>
		</div>
			<div class = "signup">
		 		<img src="images/icon.png" class = "icon">
				<h1>Sign up</h1>
				<form action="include/signin.php" method="post">
					<input type="email" name = "email" class = "input" placeholder="Your Email" >
					<input type="password" name = "password" class = "input" placeholder="Your Password">
					<input type="submit" name = "submit" class = "sign_button" value="Sign Up">
				<?php

                  if (isset($_SESSION['msg'])) {
                      print_r($_SESSION['msg']);
                      unset($_SESSION['msg']);
                   }
                ?>
					<hr>
				</form>
				<p class = "login">Don't have an account?
					<a href = "register.php"> <input type="submit" name='join_button' class = "join_button" value="Join"> </a>
				</p>
					
		 	</div>
		</body>
</html>

