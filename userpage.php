<?php 
require_once("inc/jdf.php");
require_once("header.php");
require_once("verticalnav.php");
require_once("inc/dbh.inc.php");
$uid = $_SESSION['u_id'];
$result_num;
if(isset($_GET['submit'])){
  $_SESSION['no_rows'] =  $_GET['num'];
  $result_per_page = $_SESSION['no_rows'];
}else{
  if(!isset($_SESSION['no_rows'])){
    $_SESSION['no_rows'] = 5;
  }
  $result_per_page = $_SESSION['no_rows'];
}
$sql = "select * from expenses where user_id = '$uid'";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);
if($resultcheck < 1){
	header("Location: userpage.php?no data");
	exit();
}
$num_of_page = ceil($resultcheck / $result_per_page);
if(!isset($_GET['page'])){
	$page = 1;
}else{
	$page = $_GET['page'];
}
$page_first_result = ($page - 1)*$result_per_page;

$sql = "select * from expenses where user_id = '$uid' limit ".$page_first_result.','.$result_per_page;
$result = mysqli_query($conn, $sql);
?>

			<div class="col-sm-10">
				<form action="userpage.php" class="mt-5">
					<label for="num">تعداد رکورد</label>
					<input type="number" name="num" min="0">
					<button type="submit" name="submit">جستجو</button>
				</form>
				<table class="table table-striped table-bordered mt-5">
				<thead class="thead-dark">
					<tr>
						<th>مبلغ</th>
						<th>نوع</th>
						<th>تاریخ ثبت</th>
						<th>توضیحات</th>
					</tr>
				</thead>
				<?php
				
					while($row = mysqli_fetch_assoc($result)){
						
						$type = ($row['type'] == 1) ? "دخل" : "خرج";
						list($year, $month, $day) = explode('-',$row['add_date']);
						if(fnmatch("1*",$year)){
							$realdate = $row['add_date'];
						}else{
							$realdate = gregorian_to_jalali($year,$month,$day,"/");
						}
							echo "<tr>
								<td>".$row['amount']."</td>
								<td>".$type."</td>
								<td>".$realdate." ".$row['add_time']."</td>
								<td>".$row['description']."</td>
							</tr>";
						
					}
				?>
					
						
						
				</table>
				<div>
					<?php
						for($page=1;$page<=$num_of_page;$page++){
							echo "<a href='userpage.php?page=".$page."' class='btn btn-secondary mr-2' role='button'>".$page."</a>";
						}
					?>
				</div>
			</div>
		</div>
	</div>	
</section>	
<?php require_once("footer.php"); ?>
