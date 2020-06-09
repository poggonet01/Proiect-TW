<?php
	
	$feed_url = "http://localhost/MySite/rss.php";
	$object = new DOMDocument(); 

	$object->load($feed_url);
	$content = $object->getElementsByTagName('item');

?>

<?php
 	// Prima pagina (principala) cu categoriile (Sport,Casual.....)
	session_start();
	require_once 'include/connect.php';
	$get_data_by_params = array();


	if (isset($_GET['owner'])) {
		$get_data_by_params['owner'] = $_GET['owner'];
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
        <header>
		<div class = "navigation_container">
			<div class="logo">Fashion eShop</div>
			<div class = "navigation_bar">
				<form method="get" action="">
					<ul class = "nav">
							<li><a href = "index.php?owner=Men" >MEN</a></li>
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
				</form>
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn"></button>
                    <form>
	                    <div id="myDropdown" class="dropdown-content"> 
	                             <a href="index.php?owner=Men">Men</a>
	                             <a href="index1.php?owner=Women">Women</a>
	                             <a href="index2.php?owner=Children">Children</a>
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
                	</form>
                <script>
                    function myFunction() {
                      document.getElementById("myDropdown").classList.toggle("show");
                    }
                 </script>
                 </div>

			</div>
		</div>
		<?php
			if (!isset($_GET['owner'])) {
			echo '<h4 class="rssTitle"> Top 10 most expensive clothes </h4>';
			foreach ($content as $row) {
				echo '<h3 class="text-info">'. 'Product Name: ' .$row->
					getElementsByTagName("title")->item(0)->nodeValue . ' Price: '. $row->
					getElementsByTagName("description")->item(0)->nodeValue . 
					'<a class="viewTop" href="item.php?id='. $row->getElementsByTagName("prodId")->item(0)->nodeValue.
					'"> View </a>'.
					 '</h3>';

				echo '<hr />';
			}
		}
		?> 
        <div class="main">
            <div class="grid" >
            	<?php
            		if (isset($_GET['owner'])) {

            			$owner=$_GET['owner'];
            			$result = mysqli_query($connect,"SELECT * FROM `category` where `owner`= '$owner'");
            			foreach($result as $value) {
            					$id = $value['Id'];
            					$result1 = mysqli_query($connect,"SELECT * FROM `recipient_image` where `category_id`='$id'" );
            					foreach ($result1 as $value1) {
            						
            						
            	?>
            	<form method="get" action="index1.php?action=add&occasion=<?php echo($value['occasion']); ?>">
                <div style="background-image: url(<?php echo $value1["path"]; ?>)" class = "item"><a href="index1.php?occasion=<?php echo $value["occasion"]?>"><div class="Text"><?php echo $value["occasion"]; ?></div></a></div>
           		</form>      
                	<?php
                			}}}
                	?>
            </div>
        </div>
        </header>
         <footer>
         		<form method="get" action="">
				<nav>
					<a href = "index.php?owner=Men">MEN</a>
					<a href = "index.php?owner=Women">WOMEN</a>
					<a href = "index.php?owner=Children">CHILDREN</a>
				</nav>
			</form>
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
    </body>

