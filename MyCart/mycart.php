<?php

session_start();
require_once 'connect-phpmyadmin.php';

$session_now=$_SESSION["user-now"];
$welcome=$_SESSION["username-now"];

if(isset($_SESSION["user-now"])){
    echo "Welcome {$welcome} to our website :)";

    if(isset($_POST["add_to_cart"])){
        require 'add-in-cart.php';
    }
    else if(isset($_GET["action"])){
        if($_GET["action"]=="delete"){
            require 'remove-from-cart.php';
        }
    }
}

?>
<!DOCTYPE html>
<html>  
    <head>  
        <title>My Shopping Cart</title>  
        <link href = "CSS/mycart.css" rel = "stylesheet" type = "text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    </head> 
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
        <div class="product_container">
            <h3 align="center">Shopping Cart</h3><br />
            <?php

            //---preluarea datelor din tabelul cu produse---
            require_once 'getdata.php';

            //---parcurgarerea fiecarei linii din tabel si crearea form-ului pentru fiecare---
            if(mysqli_num_rows($result) > 0){
                while($row=mysqli_fetch_array($result)){
            ?>
            <div class="col-product">
                <form method="post" action="mycart.php?action=add&id=<?php echo $row["ID"]; ?>">
                    <div class="item" style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                        <!-- !sa modific link-ul pentru trecere la pagina view a itemului -->
                        <a href="item.php?id=<?php echo $row["ID"]; ?>">
                            <img style="max-width=40px; max-height:80px;" src="<?php echo $row["prd_image"]; ?>" class="img-prd" /><br />
                        </a>  
                        <h4 class="text-info"><?php echo $row["prd_name"]; ?></h4>  
                        <h4 class="text-price">$ <?php echo $row["prd_price"]; ?></h4>  
                        <input type="text" name="quantity" class="form-product" value="1" />  
                        <input type="hidden" name="hidden_name" value="<?php echo $row["prd_name"]; ?>" />  
                        <input type="hidden" name="hidden_price" value="<?php echo $row["prd_price"]; ?>" />  
                        <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="add+" />  
                    </div>
                </form>
            </div>
            <?php
                }
            }
            ?>
            <div class="in-cart-table">
            <!--tbelul cosului-->
                <table class="in-cart">
                    <thead>
                        <th width="40%">Item name</th>
                        <th width="10%">Quantity</th>
                        <th width="20%">Price</th>
                        <th width="15%">Total</th>
                        <th width="5%">Action</th>
                    </thead>
                    <?php
                        //---verificam daca sesiunea cos nu e goala atunci afisam in tabelu cos datele stocate in ace
                        if(!empty($_SESSION[$session_now])){
                            $total_price=0;
                            foreach($_SESSION[$session_now] as $keys => $values){
                    ?>
                    <tr>  
                        <td data-label="Item Name"><?php echo $values["product-name"]; ?></td>  
                        <td data-label="Quanity"><?php echo $values["product-quantity"]; ?></td>  
                        <td data-label="Price"><?php echo $values["product-price"]; ?></td>  
                        <td data-label="Total"><?php echo number_format($values["product-quantity"] * $values["product-price"], 2); ?></td>  
                        <td data-label="Action"><a href="mycart.php?action=delete&id=<?php echo $values["product-id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                    </tr>
                    <?php
                                $total_price=$total_price+$values["product-quantity"]*$values["product-price"];
                            }
                    ?>
                    <tr>  
                        <td colspan="3" align="right">Total</td>  
                        <td align="right">$ <?php echo number_format($total_price, 2); ?></td>   
                    </tr>  
                    <?php
                        }
                    ?>
                </table>
            </div>
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
				<a href="#"><img src = "CSS/insta.png"></a>
				<a href="#"><img src = "CSS/fb.png"></a>
			</div>
			<div class="footer_bottom">
				&copy; Fashion eShop | Designed by Mereuta Ion & Artiom Pogonet
			</div>
        </footer>
        <!-------------------->
    </body>
</html>
