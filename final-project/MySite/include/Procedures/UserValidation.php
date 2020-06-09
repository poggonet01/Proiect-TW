<?php 
	
	function validate_password( $password,$confirmPassword) {
		return ($password === $confirmPassword) ? true : false;
	}

	function check_user_data ($connect , $username , $email) {

		$check_user = mysqli_query($connect , "Select `UserName` from `user` where '$username'=`UserName`");
		$check_email = mysqli_query($connect , "Select `Email` from `user` where '$email'=`Email`");

		if (mysqli_num_rows($check_user) > 0) {
			$Mesaj = 'UserName Ocupat';
			return $Mesaj;
		}else if (mysqli_num_rows($check_email) > 0) {
			$Mesaj = 'Email Ocupat';
			return $Mesaj;
		}
		return false;
	}

	function strong_password ($password) {
		$containsNumber  = preg_match('/[0-9]/',$password );
		$containsBigLetter = preg_match('/[A-Z]/', $password);
		$containsLowerLetter = preg_match('/[a-z]/', $password);
		$containsAll = $containsNumber && $containsBigLetter && $containsLowerLetter;

		return $containsAll;
	}

	function insert_user ($connect ,$username,$email,$password) {
		mysqli_query($connect , "INSERT INTO `user`(`Id`, `UserName`, `Email`, `Password`) VALUES (NULL, '$username', '$email', '$password')");
		$Mesaj = 'Inregistrarea s-a terminat cu succes';
		return $Mesaj;
	}
	function search_log_pass ($connect , $email , $password) {
		$querry = mysqli_query($connect , "SELECT * FROM `user` where `Email` = '$email' and `Password` = '$password' ");
		return mysqli_num_rows($querry) > 0 ? true : false;
	}
?>