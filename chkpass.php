<?php
session_start();
include('config.php');
$_SESSION['user']==0;
if(!isset($_POST['key'])) {
	header('Location:index.php');	
}
else if ($_POST['key']==$startPass) {
	$_SESSION['user']=1;
	$_SESSION['post']=$_POST['batch'];
	header("Location: vote_presi.php");
}
else {
	header('Location:index.php');
}
?>
