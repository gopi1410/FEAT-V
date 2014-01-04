<?php

session_start();
include('dbconnect.php');

$total=$_POST['total'];
$next=$_POST['next'];
$exec=$_POST['executive'];

if($exec!="no") {

	if(isset($_POST['pref0'])) {
		$pref0=$_POST['pref0'];
	}
	
	if(isset($_POST['pref1'])) {
		$pref1=$_POST['pref1'];
	}
	if(isset($_POST['pref2'])) {
		$pref2=$_POST['pref2'];
	}
	if(isset($_POST['pref3'])) {
		$pref3=$_POST['pref3'];
	}

	//Voting system for president
	if($exec=="president") {

		if(isset($pref0)) {
			$sql="UPDATE nopref SET votes = votes + 1 WHERE post='".$pref0."'";
		}
		else {
			if($pref1==2 && $pref2==3) {
				$sql="UPDATE president SET votes = votes + 1 WHERE id='1'";
			}
			if($pref1==2 && $pref2==18) {
				$sql="UPDATE president SET votes = votes + 1 WHERE id='2'";
			}
			if($pref1==3 && $pref2==2) {
				$sql="UPDATE president SET votes = votes + 1 WHERE id='3'";
			}
			if($pref1==3 && $pref2==18) {
				$sql="UPDATE president SET votes = votes + 1 WHERE id='4'";
			}
			if($pref1==18 && $pref2==2) {
				$sql="UPDATE president SET votes = votes + 1 WHERE id='5'";
			}
			if($pref1==18 && $pref2==3) {
				$sql="UPDATE president SET votes = votes + 1 WHERE id='6'";
			}
		}

		mysql_query($sql) or die(mysql_error());
	}

	//Voting system for Sports Secretary
	if($exec=="sports") {

		if(isset($pref0)) {
			$sql="UPDATE nopref SET votes = votes + 1 WHERE post='".$pref0."'";
		}
		else {
			if($pref1==20) {
				$sql="UPDATE sports SET votes = votes + 1 WHERE id='1'";
			}
			if($pref1==19) {
				$sql="UPDATE sports SET votes = votes + 1 WHERE id='2'";
			}
		}

		mysql_query($sql) or die(mysql_error());
	}

}
else {

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

}

header("Location:".$next.".php");
?>