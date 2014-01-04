<?php
session_start();
session_destroy();
include('dbconnect.php');

$sql="UPDATE votes SET votecount = votecount + 1";
mysql_query($sql) or die(mysql_error());
?>
<!doctype html>
<html>
<head>
	<title>Thank you for voting! :)</title>
	<style type="text/css">
	#proceed {
		position: absolute;
		bottom: 10px;
		right: 10px;
	}
	a {color: rgb(218, 218, 218);}
	a:visited {color: rgb(218, 218, 218);}
	a:hover {color: black;}
	</style>

	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript">
		$(document).keypress(function(e) {
		    if(e.which == 13) {
		        window.location.href="index.php";
		    }
		});
	</script>
</head>
<body>
	<audio id="sound" src="audio/beep-2.mp3"></audio>
	<div align="center">
		<br/><br/><br/>
		<h1>Your vote is precious.<br/>Thank you for voting! :)</h1>
	</div>
	<div id="proceed">
		<a href="index.php">Proceed</a>
	</div>
	<script>
	document.getElementById("sound").play();
	</script>
</body>
</html>
