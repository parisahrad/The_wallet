<?php

session_start();

if ( !isset($_POST['submit']) ) {
	header("Location: ../addnew.php");
	exit();
}

if ( empty($_POST['amount']) || empty($_POST['comment']) || empty($_POST['type'])) {
	header("Location: ../addnew.php?empty");
	exit();
}
$check = true;
if($_POST['type'] == "out"){
	$check = false;
}

require_once("dbh.inc.php");

date_default_timezone_set("Asia/Tehran");


$newExpense = [
	'amount' => mysqli_real_escape_string($conn, $_POST['amount']),
	'description' => mysqli_real_escape_string($conn, $_POST['comment']),
	'user_id' => $_SESSION['u_id'],
	'type' => $check,
	'rec_status' => true,
	'add_date' => ($_POST['userdate'] != null)? $_POST['userdate'] : date("Y-m-d"),
	'add_time' => date("H:i:s"),
	'inout_type' => $_POST['selectOption'],
];

$fieldsString = implode(', ', array_keys($newExpense));

$quotedValues = array_map(
	function($value) {
		return "'$value'";
	},
	array_values($newExpense)
);

$valuesString = implode(', ', $quotedValues);

$sql = "insert into expenses($fieldsString) values($valuesString)";
mysqli_query($conn, $sql);
header("Location: ../addnew.php?added successfully");
var_dump($sql);
exit();