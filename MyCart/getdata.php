<?php 
require_once 'connect-phpmyadmin.php';

//---preluarea datelor din tabelul cu produse---
$query="SELECT * FROM cart_product";
$result=mysqli_query($connect, $query);
?>