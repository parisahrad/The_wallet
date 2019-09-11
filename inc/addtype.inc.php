<?php 
require_once("common.inc.php");
session_start();

if(!isset($_GET['submit'])){
	header("Location: ../addtype.php");
	exit();
}

if(empty($_GET['name']) || empty($_GET['type'])){
	header("Location: ../addtype.php?empty");
}

require_once("dbh.inc.php");
$newType = [
	'name' => mysqli_real_escape_string($conn, $_GET['name']),
	'type' => ($_GET['type'] == "in")? 1 : 0
];

$key = implode(', ',array_keys($newType));
$quotedValues = array_map("quotValues",array_values($newType));
$values = implode(', ',$quotedValues);
$sql="insert into refrence($key) values($values);";
mysqli_query($conn, $sql);
header("Location: ../addtype.php");
exit();