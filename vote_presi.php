<?php
session_start();
include('dbconnect.php');

//echo $_SERVER['REMOTE_ADDR'];
if($_SERVER['REMOTE_ADDR']!="::1") {
	die("Invalid Access");
}

$apost="President";
$total=3;
$next="vote_sports";
//No of checked radio buttons to be modified in validate

if($_SESSION['user']==1) {
?>
	<html>
	<head>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<script type="text/javascript" src="jquery.min.js"></script>
		<script type="text/javascript" src="myvote.js"></script>
	</head>
	<body>
		<form method="POST" action="castvote.php">
		<h1><?php echo $apost; ?></h1>
		<table cellspacing="10" align="center">
		<?php
		$idarr=array();
		$sql="SELECT * FROM candidates WHERE post = '".$apost."'";
		$result=mysql_query($sql) or die(mysql_error());
		echo "<tr>";
		while($row=mysql_fetch_assoc($result)) {
			array_push($idarr, $row['id']);
			echo '<td><img class="candpic" src="pics/'.$row['pic'].'" /></td>';
		}
		echo "</tr>";
		
		mysql_data_seek($result, 0 );
		echo '<tr align="center">';
		while($row=mysql_fetch_assoc($result)) {
			echo '<td><b>'.$row['Name'].'</b></td>';
		}
		echo '</tr>';
		?>
		
		<tr align="center">
			<td>
				<input type="radio" class="pref" name="pref1" value="<?php echo $idarr[0]; ?>" />1<sup>st</sup> preference<br/>
				<input type="radio" class="pref" name="pref2" value="<?php echo $idarr[0]; ?>" />2<sup>nd</sup> preference<br/>
			</td>
			<td>
				<input type="radio" class="pref" name="pref1" value="<?php echo $idarr[1]; ?>" />1<sup>st</sup> preference<br/>
				<input type="radio" class="pref" name="pref2" value="<?php echo $idarr[1]; ?>" />2<sup>nd</sup> preference<br/>
			</td>
			<td>
				<input type="radio" class="pref" name="pref1" value="<?php echo $idarr[2]; ?>" />1<sup>st</sup> preference<br/>
				<input type="radio" class="pref" name="pref2" value="<?php echo $idarr[2]; ?>" />2<sup>nd</sup> preference<br/>
			</td>
		</tr>
		</table>
		
		<div align="center">
			<br/>
			<input type="hidden" name="total" value="<?php echo $total; ?>" />
			<input type="hidden" name="next" value="<?php echo $next; ?>" />
			<input type="hidden" name="executive" value="president" />
			<input type="radio" id="pref0" name="pref0" value="<?php echo $apost; ?>" checked="true" onclick="nopref()" />
			No Preference<br/><br/>
			<input type="submit" value="Cast My Vote" onclick="return validate(<?php echo $total-1; ?>)" />
		</div>
		</form>
		<audio id="sound" src="audio/beep-1.mp3"></audio>
	</body>
	</html>
<?php
}
else {
	header('Location:index.php');
}
?>