<?php
session_start();
include('dbconnect.php');

//echo $_SERVER['REMOTE_ADDR'];
if($_SERVER['REMOTE_ADDR']!="::1") {
	die("Invalid Access");
}

$apost=$_SESSION['post'];
$total=2;
$next="final";
//No of checked radio buttons to be modified in validate

$no_polling=array("Senator, UG Y9", "Senator, UG Y10", "Senator, UG Y10 (Dual)", "Senator, UG Y11", "Senator, M.Tech. Y12", "Senator, M.Tech. Y13", "Senator, MBA + M.Des. Y12", "Senator, MBA + M.Des. Y13", "Senator, M.Sc. Y12", "Senator, M.Sc. Y13");
if(in_array($apost, $no_polling)) {
	header("Location: final.php");
}

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
		$namearr=array();
		$sql="SELECT * FROM candidates WHERE post = '".$apost."' ORDER BY Name";
		$result=mysql_query($sql) or die(mysql_error());
		echo "<tr>";
		while($row=mysql_fetch_assoc($result)) {
			array_push($idarr, $row['id']);
			array_push($namearr, $row['Name']);
			echo '<td><img class="candpic" src="pics/senators/'.$row['pic'].'" /></td>';
		}
		//150x200 for large data
		echo "</tr>";
		
		echo '<tr align="center">';
		foreach($namearr as $val) {
			echo '<td><b>'.$val.'</b></td>';
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
		
		<script type="text/javascript">
			$(document).ready(function() {
				$('input[type="submit"]').on('click', function() {
					sub = validate(3);
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
			<?php
			if($len==9) {
				?>
				<style type="text/css">
				.candpic {
					width: 135px;
					height: 180px;
				}
				</style>
				<?php
			}
			else if($len==10) {
				?>
				<style type="text/css">
				.candpic {
					width: 120px;
					height: 175px;
				}
				</style>
				<?php
			}
			else if($len>5) {
				?>
				<style type="text/css">
				.candpic {
					width: 150px;
					height: 200px;
				}
				</style>
				<?php
			}
			?>

			<br/><br/>
			<input type="hidden" name="total" value="<?php echo $total; ?>" />
			<input type="hidden" name="next" value="<?php echo $next; ?>" />
			<input type="submit" value="Cast My Vote" />
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