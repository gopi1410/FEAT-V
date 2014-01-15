<?php

session_start();
include('dbconnect.php');

$total=$_POST['total'];
$next=$_POST['next'];
$exec="cultural";

if(isset($_POST['pref0'])) {
	$pref0=$_POST['pref0'];
	$sql="UPDATE nopref SET votes = votes + 1 WHERE post='".$pref0."'";
}
else {
	
	if(isset($_POST['pref1'])) {
		$pref1=$_POST['pref1'];
	}
	if(isset($_POST['pref2'])) {
		$pref2=$_POST['pref2'];
	}

	if($pref1==21 && $pref2==22) {
		$sql="UPDATE ".$exec." SET votes = votes + 1 WHERE id='1'";
	}
	if($pref1==21 && $pref2==23) {
		$sql="UPDATE ".$exec." SET votes = votes + 1 WHERE id='2'";
	}
	if($pref1==22 && $pref2==21) {
		$sql="UPDATE ".$exec." SET votes = votes + 1 WHERE id='3'";
	}
	if($pref1==22 && $pref2==23) {
		$sql="UPDATE ".$exec." SET votes = votes + 1 WHERE id='4'";
	}
	if($pref1==23 && $pref2==21) {
		$sql="UPDATE ".$exec." SET votes = votes + 1 WHERE id='5'";
	}
	if($pref1==23 && $pref2==22) {
		$sql="UPDATE ".$exec." SET votes = votes + 1 WHERE id='6'";
	}
}

mysql_query($sql) or die(mysql_error());
header("Location:".$next.".php");
?>