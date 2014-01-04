<?php
session_start();
$_SESSION['user']==0;
if(!isset($_POST['key'])) {
	header('Location:index.php');	
}
else if ($_POST['key']=='gopi') {
	$_SESSION['user']=1;
	$_SESSION['post']=$_POST['batch'];
	//$_SESSION['votetable']="candidates".$_POST['batch'];
	//$_SESSION['nopreftable']="nopref".$_POST['batch'];
	//header("Location:vote_".$_POST['batch'].".php");
	header("Location: vote.php");
}
else {
	header('Location:index.php');
}
?>
