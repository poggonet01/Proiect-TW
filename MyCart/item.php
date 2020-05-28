<?php
session_start();
include_once 'connect-phpmyadmin.php';
include_once 'getdata.php';

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
    <body>
        <!---codul html pentru menu bar--->
        <div class = "navigation_container">
			<div class="logo">Fashion eShop
            </div>
			<div class = "navigation_bar">
				<ul class = "nav">
					<li><a href = "fashion_0.html">MEN</a></li>
					<li><a href = "fashion_1.html">WOMEN</a></li>
					<li><a href = "fashion_2.html">CHILDREN</a></li>
					<li class = "child"><a href = "log.html">Sign up | Login</a></li>
				</ul>
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn"></button>
                    <div id="myDropdown" class="dropdown-content"> 
                        <a href="fashion_0.html">Men</a>
                        <a href="fashion_1.html">Women</a>
                        <a href="fashion_2.html">Children</a>
                        <a href="log.html">Sign Up | Login</a>
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
		$id_query="SELECT * FROM cart_product WHERE ID='$index'";
		$item_query=mysqli_query($connect, $id_query);

		$data=mysqli_fetch_array($item_query);
		
		?>
		<div class="item-container">
			<form method="post" action="mycart.php?action=add&id=<?php echo $data["ID"]; ?>">
			
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
				<a href = "fashion_0.html">MEN</a>
				<a href = "fashion_1.html">WOMEN</a>
				<a href = "#">CHILDREN</a>
				<a href = "log.html">Sign up | Login</a>
			</nav>
			<div class="footer_logo">
				<a href = "#">Fashion eShop</a>
			</div>
			<div class="social">
				<a href="#"><img src = "image/insta.png"></a>
				<a href="#"><img src = "image/fb.png"></a>
			</div>
			<div class="footer_bottom">
				&copy; Fashion eShop | Designed by Mereuta Ion & Artiom Pogonet
			</div>
        </footer>
        <!-------------------->
    </body>
</hmtl>
    
