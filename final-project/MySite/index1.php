<?php
	
	$feed_url = "http://localhost/MySite/rss.php";
	$object = new DOMDocument(); 

	$object->load($feed_url);
	$content = $object->getElementsByTagName('item');

?>

<?php
	// A doua pagina (pulovere,pantaloni....)
	session_start();
	$owner = $_SESSION['Filter']['owner'];
	require_once 'include/connect.php';

	$get_data_by_params = array();
	if (isset($_GET['occasion'])) {
		$get_data_by_params['owner'] = $_SESSION['Filter']['owner'];
		$get_data_by_params['occasion'] = $_GET['occasion'];
		$_SESSION['Filter'] = $get_data_by_params;
	}
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
            		if (isset($_GET['occasion'])) {
            			$occasion=$_GET['occasion'];
            			$result = mysqli_query($connect,"SELECT * FROM `category` where `occasion`='$occasion' and `owner`='$owner'");
              			foreach($result as $value) {
        						$id = $value['Id'];
            					$result1 = mysqli_query($connect,"SELECT * FROM `occasion_table` where `category_id`='$id'" );
            					$row = mysqli_fetch_array($result1);
            						
            	?>
            	<form method="get" action="items.php?action=add&type=<?php echo($value['occasion']); ?>">
                <div style="background-image: url(<?php  echo $row[1]; ?>)" class = "item"><a href="items.php?type=<?php echo $value['type']?>"><div class="Text"><?php echo $value['type'] ?></div></a></div>
            </form>

                <?php
                	}}
                ?>
            </div>
        </div>
         <footer>
				<nav>
					<a href = "index.php?owner=Men">MEN</a>
					<a href = "index.php?owner=Women">WOMEN</a>
					<a href = "index.php?owner=Children">CHILDREN</a>
				</nav>
				<div class="footer_logo">
					<a href = "">Fashion eShop</a>
				</div>
				<div class="social">
					<a href=""><img src = "images/insta.png"></a>
					<a href=""><img src = "images/fb.png"></a>
				</div>
				<div class="footer_bottom">
					&copy; Fashion eShop | Designed by Mereuta Ion & Artiom Pogonet
				</div>
			</footer>
    </body>
   