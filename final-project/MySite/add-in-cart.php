<?php 
    if(isset($_SESSION[$session_now])){
        //---creem un array ce contine id-urile produselor---
        $items_id=array_column($_SESSION[$session_now], "product-id");
        //---in caz de produdul nu e adaugat in cos inseram datele din tabel despr acesta---
        if(!in_array($_GET["id"], $items_id))  
        {  
             $count = count($_SESSION[$session_now]);  
             $items = array(  
                'product-id'       =>     $_GET["id"],  
                'product-name'     =>     $_POST["hidden_name"],  
                'product-price'    =>     $_POST["hidden_price"],  
                'product-quantity' =>     $_POST["quantity"]  
           );
             $_SESSION[$session_now][$count] = $items;  
        }  
        else 
        //---cazul in care produsul e deja adaugat---
        {  
             echo '<script>window.location="mycart.php"</script>';  
        } 
        
        //---cazul in care in cos nu este nici-un produs---
    } else {
        $items = array(  
            'product-id'       =>     $_GET["id"],  
            'product-name'     =>     $_POST["hidden_name"],  
            'product-price'    =>     $_POST["hidden_price"],  
            'product-quantity' =>     $_POST["quantity"]  
       );
       $_SESSION[$session_now][0]=$items;
    }
?>