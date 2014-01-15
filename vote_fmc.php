<?php
session_start();
include('dbconnect.php');

//echo $_SERVER['REMOTE_ADDR'];
if($_SERVER['REMOTE_ADDR']!="::1") {
	die("Invalid Access");
}

$apost="fmc";
$total=2;
$next="vote";
$form="castvote_fmc";
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
		<form method="POST" action="<?php echo $form; ?>.php">
		<h1>General Secretary, Films and Media Council</h1>
		<table cellspacing="10" align="center">
		<?php
		$idarr=array();
		$namearr=array();
		$sql="SELECT * FROM candidates WHERE post = '".$apost."' ORDER BY Name";
		$result=mysql_query($sql) or die(mysql_error());
		echo "<tr>";
		while($row=mysql_fetch_assoc($result)) {
			array_push($idarr, $row['id']);
			array_push($namearr, $row['Name']);
			echo '<td><img class="candpic" src="pics/'.$row['pic'].'" /></td>';
		}
		echo "</tr>";
		
		echo '<tr align="center">';
		foreach($namearr as $val) {
			echo '<td><b>'.$val.'</b></td>';
		}
		echo '</tr>';
		?>
		
		<tr align="center">
			<td>
				<input type="radio" class="pref" name="pref1" value="<?php echo $idarr[0]; ?>" />Vote<br/>
			</td>
			<td>
				<input type="radio" class="pref" name="pref1" value="<?php echo $idarr[1]; ?>" />Vote<br/>
			</td>
		</tr>
		</table>
		
		<script type="text/javascript">
			$(document).ready(function() {
				$('input[type="submit"]').on('click', function() {
					sub = validate(<?php echo $total-1; ?>);
					if(sub) {
						$(this).prop('disabled', true);
						this.form.submit();
					}
					else {
						return false;
					}
				});
			});
		</script>
		<div align="center">
			<br/>
			<input type="hidden" name="total" value="<?php echo $total; ?>" />
			<input type="hidden" name="next" value="<?php echo $next; ?>" />
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