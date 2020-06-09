<?php
	
	session_start();
	unset($_SESSION['LogOut']);
	unset($_SESSION['username-now']);
	unset($_SESSION['user-now']);
	header('Location: ../log.php');
?>