<?php
session_start();
$nav_set1 = <<<html1
			<div>
				<form  class="form-inline" action="inc/logout.inc.php" method="POST">
					<p class="text-light m-auto pl-3"><a class="text-light" href="userpage.php">
html1;

$nav_set2 = <<<html1
	</a></p>
	<button type="submit" name="submit" class="btn btn-secondary btn-sm ">خروج</button>
				</form>
			</div>"
html1;

$nav_unset = <<<html2
	<div>
		<form  class="form-inline" action="inc/signin.inc.php" method="POST">
			<a class="navbar-brand nav-link home" href="signup.php">ثبت نام</a>
			<input type="text" name="uid" placeholder="نام کاربری/ایمیل" >
			<input type="password" name="pwd" placeholder="گذرواژه" >
			<button type="submit" name="submit" class="btn btn-secondary btn-sm ">ورود</button>
		</form>
	</div>
html2;


?>

<!DOCTYPE html>
<html lang="fa" xmlns="http://www.w3.org/1999/xhtml">>
	<head>
		<title>کیف پول</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="css/bootstrap-rtl.css" type="text/css">
		<link rel="stylesheet" href="css/bootstrap-rtl.min.css" type="text/css">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link href="cal/Mh1PersianDatePicker.css" rel="stylesheet" />

		<script src="cal/converter.js"></script>
		<script src="cal/Mh1PersianDatePicker.js"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
		</script>
	</head>
		<body>
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top ">

			<?php
				if(isset($_SESSION['u_id'])){
					echo $nav_set1;
					echo $_SESSION['u_first']." ".$_SESSION['u_last'];
					echo $nav_set2;
				}else{
					echo $nav_unset;
				}
			?>
			<a class="navbar-brand nav-link" href="index.php">کیف پول</a>


		</nav>
