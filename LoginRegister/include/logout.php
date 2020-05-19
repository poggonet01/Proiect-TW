<?php
	
	session_start();
	unset($_SESSION['LogOut']);
	header('Location: ../log.php');
?>