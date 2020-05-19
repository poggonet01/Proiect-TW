<?php
	
	require_once 'Procedures/UserValidation.php';
	require_once 'connect.php';
	session_start();

	if (!empty($_POST)) {

		$email = $_POST['email'];
		$password = md5($_POST['password']);

		//$check_user = search_log_pass($connect, $email,$password);

		if (empty($email) || empty($password)) {
			$_SESSION['msg'] = "Introduceti Email / Parola";
			header('Location: ../log.php');
		} else if (search_log_pass($connect, $email,$password)) {
			$_SESSION['LogOut'] = "Log Out";
			header('Location: ../index.php');
		} else {
			$_SESSION['msg'] = "Parola / Email Gresit";
			header('Location: ../log.php');
		}
	}
	else {
		$_SESSION['msg'] = "Introduceti Email / Parola";
		header('Location: ../log.php');
	}
?>