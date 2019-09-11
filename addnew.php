<?php
include("header.php");
require_once("inc/dbh.inc.php");

$sql = "select name,id from refrence where type=1";
$resultForIn = mysqli_query($conn, $sql);

$sql1 = "select name,id from refrence where type=0";
$resultForOut = mysqli_query($conn, $sql1);
?>
    <!--Mh1PersianDatePicker-->
    <link href="../src/Mh1PersianDatePicker.css" rel="stylesheet" />
    <!--Mh1PersianDatePicker-->
	<script src="../src/converter.js"></script>
<style>
		#box1, #box2{
			display: none;
		}
	</style>


	<script>
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth() + 1;
		var yyyy = today.getFullYear();
		var temp = gregorian_to_jalali(yyyy,mm,dd)
		today = temp.join("/");
	</script>
	<script src="js/jscommonfn.js" defer></script>
<section class="index-form vh-100">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<div class="form-group">
					<p class="text-center font-weight-bold">ثبت رکورد جدید</p>
					<form action="inc/addnew.inc.php" method="POST" id="addNewForm">
						<div class="form-row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="amount">مبلغ:</label>
									<input class="form-control" type="number" name="amount" min="0">
								</div>
							</div>
							<div class="col-md-4">
								<label>نوع مبلغ:</label>
								<div class="form-check form-check-inline">
									<label class="form-check-label" for="in">دخل</label>
									<input class="form-check-input" type="radio" name="type" id="inRadioInput" value="in">
								</div>
								<div class="form-check form-check-inline">
									<label class="form-check-label" for="out">خرج</label>
									<input class="float-right" type="radio" name="type" id="outRadioInput" value="out">
								</div>
							</div>
							<div class="col-md-4">
								<div id="box1">
									<label>انتخاب کنید</label>
									<select id="selectIn" name="selectOption">
										<option>---</option>
										<?php
											while($row = mysqli_fetch_assoc($resultForIn)){
												echo "<option value={$row['id']}>".$row['name']."</option>";
											}
										?>
									</select>
								</div>
								<div id="box2">
									<label>انتخاب کنید</label>
									<select id="selectOut" name="selectOption">
										<option>---</option>
										<?php
											while($row = mysqli_fetch_assoc($resultForOut)){
											echo "<option value={$row['id']}>".$row['name']."</option>";
											}
										?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label calss="col-form-label" for="comment">توضیحات:</label>
							<div>
								<textarea class="form-control" name="comment" rows="3"></textarea>
							</div>
							<div class="form-group">
								<label class="col-md-2 col-form-label" for="userdate">تاریخ</label>
								<input type="text" name="userdate" onclick="Mh1PersianDatePicker.Show(this,today,window.holidays)"/>
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


<!--Mh1PersianDatePicker-->
<script src="../src/Mh1PersianDatePicker.js"></script>
<script>
    window.holidays = ["1398/01/01", "1398/01/02", "1398/01/03", "1398/01/04", "1398/01/12", "1398/01/13", "1398/01/14"];
</script>
    <script>
        //script1
        var inputs = document.querySelectorAll("input[mh1pdp]");
        for (i = 0; i < inputs.length; i++) {
            (function (i) {
                inputs[i].addEventListener('click', function () {
                    Mh1PersianDatePicker.Show(this, '1398/01/21', window.holidays);
                });
            })(i);
        }
        //script1
    </script>
    <script>
        //script2
        var inputs = document.querySelectorAll("input[anyattr]");
        for (i = 0; i < inputs.length; i++) {
            (function (i) {
                inputs[i].addEventListener('focus', function () {
                    Mh1PersianDatePicker.Show(this, '1398/01/21');
                });
            })(i);
        }
        //script2
    </script>


<?php include("footer.php"); ?>
