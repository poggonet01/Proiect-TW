<?php
  session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
        <title>JoinPage</title>
		<html lang = "en">
        <link href = "CSS/register.css" rel = "stylesheet" type = "text/css">
    </head>

    <body>
       <div class="log_logo"><a href="fashion_0.html">Fashion eShop</a></div>
        <div class="join_page">
            <img src="images/icon.png" class="icon">
            <h1>Create an acount</h1>
            <form action = "include/signup.php" method = "post">
                <input class = "input" type="text" id = "name" name = "name" placeholder = "Enter your username" required>
                <input class = "input" type="email" id = "email" name = "email" placeholder = "Enter your email adress"  required>
                <p id = "validmail">invalid mail</p>
                <input  class = "input" type="password" id = "password" name = "password" placeholder = "Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                <input  class = "input" type="password" id = "password" name = "confirmPassword" placeholder = "Enter again password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                <?php

                  if (isset($_SESSION['msg'])) {
                      print_r($_SESSION['msg']);
                      unset($_SESSION['msg']);
                   }
                ?>
                <hr>
                <button type = "submit" class = "join_button">Join account</button>
                </form>

        </div>
        
        <div id="validmessage">
            <h3>Password must contain the following:</h3>
             <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
             <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
             <p id="number" class="invalid">A <b>number</b></p>
             <p id="length" class="invalid">Minimum <b>8 characters</b></p>
        </div>
        <script>
            psw = document.getElementById("password");
            message = document.getElementById("validmessage");
            mailmessae = document.getElementById("validmail");

            psw.onfocus = function(){
              message.style.display = "block";
            }
            psw.onblur = function(){
              message.style.display = "none";
            }
        </script>
    </body>
</html>

