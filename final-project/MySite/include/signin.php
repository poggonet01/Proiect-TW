<?php
	
	require_once 'Procedures/UserValidation.php';
	require_once 'connect.php';
	session_start();

	if (!empty($_POST)) {

		$email = $_POST['email'];
		$password = md5($_POST['password']);
		
		$rawQuery =  "SELECT * FROM user where email = '%s' and password = '%s'; ";
		$query = sprintf($rawQuery , mysqli_real_escape_string($connect , $email) , mysqli_real_escape_string($connect , $password));
		$check_user = mysqli_query($connect,$query);

		if (empty($email) || empty($password)) {
			$_SESSION['msg'] = "Introduceti Email / Parola";
			header('Location: ../log.php');
		} else if (search_log_pass($connect, $email,$password)) {
			$user_array=mysqli_fetch_array($check_user);
			$_SESSION['LogOut'] = "Log Out";
			$_SESSION['username-now']=$user_array['UserName'];
			$_SESSION['user-now']=$email;
			header('Location: ../mycart.php');
		} else {
			$_SESSION['msg'] = "Parola / Email Gresit";
			header('Location: ../index.php');
		}
	}
	else {
		$_SESSION['msg'] = "Introduceti Email / Parola";
		header('Location: ../log.php');
	}
?>

