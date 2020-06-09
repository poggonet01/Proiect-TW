<?php
	session_start();
	require_once 'include/connect.php';
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
					<li><a href = "index.php?owner=Men">MEN</a></li>
					<li><a href = "index.php?owner=Women">WOMEN</a></li>
					<li><a href = "index.php?owner=Children">CHILDREN</a></li>
					<li><a href = "index.php">Top 10</a></li>
					<?php 
						if (isset($_SESSION['LogOut']))
						{
							echo '<li class = "child"><a href = "mycart.php">'.'MyCart'.'</a></li>';
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
                             <a href="index.php?owner=Men">Men</a>
                             <a href="index.php?owner=Women">Women</a>
                             <a href="index.php?owner=Children">Children</a>
                             <a href = "index.php">Top 10</a>
                             <?php
									if (isset($_SESSION['LogOut']))
									{
										echo '<a href="mycart.php">'.'MyCart'.'</a>';
										echo '<a href="include/logout.php">'.$_SESSION['LogOut'].'</a>';
									} else
									{
										echo '<a href="log.php">'.'Sign Up | Login'.'</a>';
									}
								?>
                    </div>
                <script>
                    function myFunction() {
                      document.getElementById("myDropdown").classList.toggle("show");
                    }
                    </script>
                    
               
                </div>
			</div>
		</div>
        <div class="main">
            <div class="grid" >
            	<?php 

            		$owner=$_SESSION['Filter']['owner'];
            		$occasion = $_SESSION['Filter']['occasion'];
            		$type = $_GET['type'];
            		$category = mysqli_query($connect , "SELECT `Id` from `category` where '$owner'=`owner` and '$occasion' = `occasion` and '$type'=`type`");
            		$categoryId = mysqli_fetch_all($category);
            		$id = $categoryId[0][0];
            		$result = mysqli_query($connect,"SELECT * FROM `cart_product` inner join `category` on cart_product.category_id=category.id where cart_product.category_id='$id'");
            		if(mysqli_num_rows($result) > 0) {
            			foreach($result as $value) {
           		 ?>
				<a href="item.php?id=<?php echo $value["id"]; ?>">
					<div style="background-image: url(<?php echo $value["prd_image"]; ?>)" class = "item"><div class="Text"> Pret : <?php echo $value['prd_price']; ?><?php echo ' '.$value['prd_name']; ?></div></div>
				</a>
	           		
           		<?php
           			} 
           		}
           		?>
                      
            </div>
        </div>
        </header>
         <footer>
				<nav>
					<a href = "index.php?owner=Men">MEN</a>
					<a href = "index.php?owner=Women">WOMEN</a>
					<a href = "index.php?owner=Children">CHILDREN</a>
					<a href = "log.php">Sign up | Login</a>
				</nav>
				<div class="footer_logo">
					<a href = "#">Fashion eShop</a>
				</div>
				<div class="social">
					<a href="#"><img src = "images/insta.png"></a>
					<a href="#"><img src = "images/fb.png"></a>
				</div>
				<div class="footer_bottom">
					&copy; Fashion eShop | Designed by Mereuta Ion & Artiom Pogonet
				</div>
			</footer>
    </body>

