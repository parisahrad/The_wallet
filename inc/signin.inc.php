<?php
session_start();

if(isset($_POST['submit'])){
	include("dbh.inc.php");
	
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	
	if(empty($uid) || empty($pwd)){
		header("Location: ../index.php?login=empty field");
		exit();
	}else{
		$sql = "select * from users where user_uid = '$uid' or user_mail = '$uid'";
		$result = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($result);
		if($resultcheck < 1){
			header("Location: ../index.php?login=not found");
			exit();
		}else{
			if($row = mysqli_fetch_assoc($result)){
				$hashedpwdcheck = password_verify($pwd,$row['user_pwd']);
			}
			if($hashedpwdcheck == false){
				header("Location: ../index.php?login=wrong password");
			exit();
			}
			if($hashedpwdcheck == true){
				$_SESSION['u_id'] = $row['user_id'];
				$_SESSION['u_uid'] = $row['user_uid'];
				$_SESSION['u_first'] = $row['user_fname'];
				$_SESSION['u_last'] = $row['user_lname'];
				$_SESSION['u_mail'] = $row['user_mail'];
				header("Location: ../userpage.php?login=success");
				exit();
			}
		}
	}
	
} else{
	header("Location: ../index.php");
	exit();
}