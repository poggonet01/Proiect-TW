<?php
	
	header("Content-Type: application/xml");
	$connect = mysqli_connect('localhost','root','','test');
	$query = mysqli_query($connect, "SELECT `prd_name`, `prd_price`,`id` AS cnt
        FROM `cart_product`
        GROUP BY `prd_price`
        ORDER BY prd_price DESC
        LIMIT 10");
	$result = mysqli_fetch_all($query);
	echo '<?xml version="1.0" encoding="utf-8" ?>
            <rss version="2.0">
                <channel>
                    <title>Top 10 most expensive clothes</title>
                    <description>RSS Feed</description>
                    <language>en-us</language>';
                     foreach($result as $row)
                        echo '
                        <item>
                            <title>' . $row[0] . '</title>
                            <description>' . $row[1] . '</description>
                            <prodId>'.  $row[2]. '</prodId>
                        </item>';
echo '
                </channel>
             </rss>';

