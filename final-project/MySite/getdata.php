<?php 
require_once 'include/connect.php';

//---preluarea datelor din tabelul cu produse---
$query="SELECT * FROM cart_product";
$result=mysqli_query($connect, $query);
?>