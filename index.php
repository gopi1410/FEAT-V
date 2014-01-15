<?php
session_start();
session_destroy();
include('dbconnect.php');

$sql="SELECT votecount from votes";
$result=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_assoc($result);
$count=$row['votecount'];
?>
<html>
	<head>
		<style type="text/css">
		#votecount {
			position: absolute;
			bottom:40px;
			right:40px;
		}
		</style>
		<script type="text/javascript">
			function start() {
				document.getElementById('batch').focus();
			}
		</script>
	</head>
	<body align="center" onload="start()">
		<?php
		//echo $_SERVER['REMOTE_ADDR'];
		if($_SERVER['REMOTE_ADDR']!="::1") {
			die("Invalid Access");
		}
		?>
		<br/>
		<h1>FEAT-V</h1>
		<br/><br/><br/>
		<form action="chkpass.php" method="POST" />
		
		Select Batch:
		<select name="batch" id="batch">
			<option value="Senator, UG Y9">UG Y9</option>
			<option value="Senator, UG Y10">UG Y10</option>
			<option value="Senator, UG Y10 (Dual)">UG Y10 (Dual)</option>
			<option value="Senator, UG Y11">UG Y11</option>
			<option value="Senator, UG Y12">UG Y12</option>
			<option value="Senator, UG Y13">UG Y13</option>
			<option value="Senator, M.Tech. Y12">M.Tech Y12</option>
			<option value="Senator, M.Tech. Y13">M.Tech Y13</option>
			<option value="Senator, MBA + M.Des. Y12">MBA + M.Des. Y12</option>
			<option value="Senator, MBA + M.Des. Y13">MBA + M.Des. Y13</option>
			<option value="Senator, M.Sc. Y12">M.Sc. Y12</option>
			<option value="Senator, M.Sc. Y13">M.Sc. Y13</option>
			<option value="Senator, PhD">PhD</option>
		</select><br/><br/>
		Enter Key: <input type="password" name="key" /><br/><br/>
		<input type="submit" value="Proceed to vote" />
		</form>

		<div id="votecount">
		<i>Total No. of votes:</i> <b><?php echo $count; ?></b>
		</div>
	</body>
</html>