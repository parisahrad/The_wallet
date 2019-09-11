<?php 
require_once("header.php");
?>
<section class="index-form vh-100">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<div class="form-group">
					<p class="text-center font-weight-bold">تعریف نوع دخل و خرج</p>
					<form action="inc/addtype.inc.php">
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group row">
									<label class="col-md-2 col-form-label" for="name">نام</label>
									<div class="col-md-10">
									<input class="form-control" type="text" name="name">
									</div>
								</div>
							</div>
							<div class="form-group col-md-6">
								<label>نوع</label>
								<div class="form-check form-check-inline">
									<label class="form-check-label" for="in">دخل</label>
									<input class="form-check-input" type="radio" name="type" id="in" value="in">
								</div>
								<div class="form-check form-check-inline">
									<label class="form-check-label" for="out">خرج</label>
									<input class="float-right" type="radio" name="type" id="out" value="out">
								</div>
							</div>
						</div>
						<button type="submit" name="submit" class="btn btn-dark m-auto">ثبت</button>
						<a href="userpage.php" class="btn btn-dark" role="button" aria-pressed="true">برگشت</a>
					</form>
				</div>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
</section>
<?php 
require_once("footer.php");
?>