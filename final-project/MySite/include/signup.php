<?php 
	session_start();
	require_once 'connect.php';
	require_once 'Procedures/UserValidation.php';

	$username = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];

	if (validate_password($password,$confirmPassword)){

		$password = md5($password);

		$ValidateUserEmail = check_user_data($connect , $username , $email);
		
		if ($ValidateUserEmail) {
			$_SESSION['msg'] = $ValidateUserEmail;
			header('Location: ../Register.php');
		}
		else if ( (strong_password($password)) && (strlen($password) >= 8)) {
			$_SESSION['msg'] = 'Parola Nesigura';
			header('Location: ../Register.php');
		} else {
			$insert_res = insert_user($connect ,$username,$email,$password);
			$_SESSION['msg'] = $insert_res;
			header('Location: ../log.php');
		}		
		
	}else {
		$_SESSION['msg'] = 'Parolele nu coincid';
		header('Location: ../Register.php');
	}
?>