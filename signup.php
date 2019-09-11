<?php 
include('header.php');
?>
		<section class="index-form">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-4"></div>
					<div class="col-sm-4">
						<form action="inc/signup.inc.php" method="POST">
							<div class="form-group">
								<lable for="fname">نام:</lable>
								<input class="form-control" name="fname" type="text">	
							</div>
							<div class="form-group">
								<lable for="lnmae">نام خانوادگی:</lable>
								<input class="form-control" name="lname" type="text">	
							</div>
							<div class="form-group">
								<lable for="email">ایمیل:</lable>
								<input class="form-control" name="email" type="text">	
							</div>
							<div class="form-group">
								<lable for="username">شناسه کاربری:</lable>
								<input class="form-control" name="username" type="text">	  
							</div>
							<div class="form-group">
								<lable for="password">رمز عبور:</lable>
								<input class="form-control" name="pwd" type="password">	
							</div>
							<button type="submit" name="submit" class="btn btn-dark">ثبت نام</button>
						</form>
					</div>
					<div class="col-sm-4"></div>
				</div>
				
			</div>
		</section>
<?php 
include('footer.php');
?>