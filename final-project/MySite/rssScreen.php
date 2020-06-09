<?php
	
	$feed_url = "http://localhost/MySite/rss.php";
	$object = new DOMDocument(); 

	$object->load($feed_url);
	$content = $object->getElementsByTagName('item');

?>