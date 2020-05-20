<?php 
    if(isset($_SESSION["mycart"])){
        //---creem un array ce contine id-urile produselor---
        $items_id=array_column($_SESSION["mycart"], "product-id");
        //---in caz de produdul nu e adaugat in cos inseram datele din tabel despr acesta---
        if(!in_array($_GET["id"], $items_id))  
        {  
             $count = count($_SESSION["mycart"]);  
             $items = array(  
                'product-id'       =>     $_GET["id"],  
                'product-name'     =>     $_POST["hidden_name"],  
                'product-price'    =>     $_POST["hidden_price"],  
                'product-quantity' =>     $_POST["quantity"]  
           );
             $_SESSION["mycart"][$count] = $items;  
        }  
        else 
        //---cazul in care produsul e deja adaugat---
        {  
             echo '<script>alert("Produsul a fost deja adaugat")</script>';  
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
       $_SESSION["mycart"][0]=$items;
    }
?>