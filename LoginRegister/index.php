<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>TW Fashion Shop</title>
		<html lang = "en">
		<link href = "CSS/fashion.css" rel = "stylesheet" type = "text/css">
	<head>
	<body>
        <header>
		<div class = "navigation_container">
			<div class="logo">Fashion eShop</div>
			<div class = "navigation_bar">
				<ul class = "nav">
					<li><a href = "#">MEN</a></li>
					<li><a href = "fashion_1.html">WOMEN</a></li>
					<li><a href = "fashion_2.html">CHILDREN</a></li>
					<?php 
						if (isset($_SESSION['LogOut']))
						{
							echo '<li class = "child"><a href = "include/logout.php">'.$_SESSION['LogOut'].'</a></li>';
						} else 
						{
							echo '<li class = "child"><a href = "log.php">'.'Sign Up | Login'.'</a></li>';
						}
					?>

				</ul>
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn"></button>
                    <div id="myDropdown" class="dropdown-content"> 
                             <a href="fashion_0.html">Men</a>
                             <a href="fashion_1.html">Women</a>
                             <a href="fashion_2.html">Children</a>
                             <a href="log.php">Sign Up | Login</a>
                    </div>
                <script>
                    function myFunction() {
                      document.getElementById("myDropdown").classList.toggle("show");
                    }
                    </script>
                    
               <!--

                    window.onclick = function(event) {
                      if (!event.target.matches('.dropbtn')) {
                        var dropdowns = document.getElementsByClassName("second-nav-bar");
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                          var openDropdown = dropdowns[i];
                          if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                          }
                        }
                      }
                    }
                </script>-->
                </div>
			</div>
		</div>
        <div class="main">
            <div class="grid" >
                <div style="background-image: url(CSS/download.jpg)" class = "item"><a href="fashion_3.html"><div class="Text">Sport</div></a></div>
                <div style="background-image: url(CSS/download1.jpg)" class = "item"><a href="fashion_4.html"><div class="Text">Casual</div></a></div>
                <div style="background-image: url(CSS/download2.jpg)" class = "item"><a href="fashion_5.html"><div class="Text">Anniversary</div></a></div>
                <div style="background-image: url(CSS/download3.jpg)" class = "item"><a href="fashion_6.html"><div class="Text">Masqurade</div></a></div>        
            </div>
        </div>
        </header>
         <footer>
				<nav>
					<a href = "fashion_0.html">MEN</a>
					<a href = "fashion_1.html">WOMEN</a>
					<a href = "fashion_2.html">CHILDREN</a>
					<a href = "log.php">Sign up | Login</a>
				</nav>
				<div class="footer_logo">
					<a href = "#">Fashion eShop</a>
				</div>
				<div class="social">
					<a href="#"><img src = "CSS/dowload11.jpg"></a>
					<a href="#"><img src = "CSS/dowload11.jpg"></a>
				</div>
				<div class="footer_bottom">
					&copy; Fashion eShop | Designed by Mereuta Ion & Artiom Pogonet
				</div>
			</footer>
    </body>

