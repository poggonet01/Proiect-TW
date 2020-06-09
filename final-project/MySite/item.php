<?php
session_start();
require 'include/connect.php';
include 'getdata.php';

if(isset($_POST["add_to_cart"])){
    require 'add-in-cart.php';
}
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset = "utf-8">
		<title>Item view page</title>
		<html lang = "en">
        <link href = "CSS/item.css" rel = "stylesheet" type = "text/css">
	<head>
    <body >
        <!---codul html pentru menu bar--->
        <div class = "navigation_container">
			<div class="logo">Fashion eShop
            </div>
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
        <!-------------------->
		<?php
		
		$index=$_GET['id'];
		$id_query="SELECT * FROM cart_product WHERE id='$index'";
		$item_query=mysqli_query($connect, $id_query);

		$data=mysqli_fetch_array($item_query);
		
		?>
		<div class="item-container">
			<form method="post" action="mycart.php?action=add&id=<?php echo $data["id"]; ?>">
			
			 <input type="submit" name="add_to_cart" class='btn-success' value="add+" />  

				<table width="100%" class="item-image">
					<thead>
						<th>Model</th>
					</thead>
					<tr>
						<td><img  src="<?php echo $data["prd_image"]; ?>" class="img-data" /></td>
					</tr>
				</table>
				<table width="100%" class="item-click">
					<tr>
						<th width="50%">Product name</th>
						<td><input type="text" name="hidden_name" value="<?php echo $data["prd_name"]; ?>" /></td>
					</tr>
					<tr>
						<th width="50%">Material</th>
						<td><?php echo $data["prd_material"]; ?></td>
					</tr>
					<tr>
						<th width="50%">Price</th>
						<td><input type="text" name="hidden_price" value="<?php echo $data["prd_price"]; ?>" /></td>
					</tr>
					<tr>
						<th width="50%">Quantity</th>
						<td>
						<input type="text" name="quantity" class="form-product" value="1" />  
						</td>
					</tr>
				</table>
			</form>
		</div>
        
        <!---codul html footer--->
        <footer>
			<nav>
				<a href = "index.php?owner=Men">MEN</a>
				<a href = "index.php?owner=Women">WOMEN</a>
				<a href = "index.php?owner=Children">CHILDREN</a>
			</nav>
			<div class="footer_logo">
				<a href = "index.php?owner=Men">Fashion eShop</a>
			</div>
			<div class="social">
				<a href=""><img src = "images/insta.png"></a>
				<a href=""><img src = "images/fb.png"></a>
			</div>
			<div class="footer_bottom">
				&copy; Fashion eShop | Designed by Mereuta Ion & Artiom Pogonet
			</div>
        </footer>
        <!-------------------->
    </body>
</hmtl>
    