<?php

if(isset($_POST['submit'])){
	include("dbh.inc.php");
	
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	
	if(empty($fname) || empty($lname) || empty($email) || empty($uid) || empty($pwd)){
		header("Location: ../index.php?signup=empty field");
		exit();
	}else{
		if(!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)){
			header("Location: ../index.php?signup=invalid name");
			exit();
		}else{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location: ../index.php?signup=invalid email");
				exit();
			}else{
				$sql = "select * from users where user_uid='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultcheck = mysqli_num_rows($resul);
				if($resultcheck > 0){
					header("Location: ../index.php?signup=uid");
					exit();
				}else{
					$hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
					
					$sql = "insert into users(user_fname, user_lname, user_mail, user_uid, user_pwd) values('$fname', '$lname', '$email','$uid', '$hashedpwd');";
					mysqli_query($conn, $sql);
					header("Location: ../index.php?signup=successful");
					exit();
					
					
					
					
					
				}
			}
		}
	}
}else{
	header("Location: ../index.php");
	exit();
}