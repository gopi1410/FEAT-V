<?php

session_start();
include('dbconnect.php');

$total=$_POST['total'];
$next=$_POST['next'];

if(isset($_POST['pref0'])) {
	$pref0=$_POST['pref0'];

	$sql="UPDATE nopref SET votes = votes + 1 WHERE post='".$pref0."'";
	mysql_query($sql) or die(mysql_error());
}
else {
	if(isset($_POST['pref1'])) {
		$pref1=$_POST['pref1'];
		$sql="UPDATE candidates SET votes1 = votes1 + 1 WHERE id='".$pref1."'";
		mysql_query($sql) or die(mysql_error());
	}
	if(isset($_POST['pref2'])) {
		$pref2=$_POST['pref2'];
		$sql="UPDATE candidates SET votes2 = votes2 + 1 WHERE id='".$pref2."'";
		mysql_query($sql) or die(mysql_error());
	}
	if(isset($_POST['pref3'])) {
		$pref3=$_POST['pref3'];
		$sql="UPDATE candidates SET votes3 = votes3 + 1 WHERE id='".$pref3."'";
		mysql_query($sql) or die(mysql_error());
	}
}

header("Location:".$next.".php");
?>