<?php

//---pentru stergerea produselor din cos---

foreach($_SESSION["mycart"] as $keys => $values){  
    if($values["product-id"] == $_GET["id"]){  
        unset($_SESSION["mycart"][$keys]);  
        echo '<script>alert("Item Removed")</script>';  
        echo '<script>window.location="mycart.php"</script>';  
    }  
}  
    

?>