<?php
session_start();
include('dbconnect.php');

//echo $_SERVER['REMOTE_ADDR'];
if($_SERVER['REMOTE_ADDR']!="::1") {
	die("Invalid Access");
}

$apost=$_SESSION['post'];
$total=2;
$next="vote_presi";
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
		//150x200 for large data
		echo "</tr>";
		
		mysql_data_seek($result, 0 );
		echo '<tr align="center">';
		while($row=mysql_fetch_assoc($result)) {
			echo '<td><b>'.$row['Name'].'</b></td>';
		}
		echo '</tr>';
		$len=count($idarr);
		?>
		
		<tr align="center">
		<?php
		for ($i=0; $i < $len; $i++) { 
			echo "<td>";
			echo '<input type="radio" class="pref" name="pref1" value="'.$idarr[$i].'" />1<sup>st</sup> preference<br/>';
			echo '<input type="radio" class="pref" name="pref2" value="'.$idarr[$i].'" />2<sup>nd</sup> preference<br/>';
			echo '<input type="radio" class="pref" name="pref3" value="'.$idarr[$i].'" />3<sup>rd</sup> preference<br/>';
			echo "</td>";
		}
		?>
		</tr>
		</table>
		
		<div align="center">
			<?php
			if($len>5) {
				?>
				<style type="text/css">
				.candpic {
					width: 150px;
					height: 200px;
				}
				</style>
				<?
			}
			?>

			<br/>
			<input type="hidden" name="total" value="<?php echo $total; ?>" />
			<input type="hidden" name="next" value="<?php echo $next; ?>" />
			<input type="hidden" name="executive" value="no" /><br/>
			<input type="submit" value="Cast My Vote" onclick="return validate(3);" />
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