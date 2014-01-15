<?php
	//echo $_SERVER['REMOTE_ADDR'];
	if($_SERVER['REMOTE_ADDR']!="::1") {
		die("Invalid Access");
	}
?>

<!doctype html>

<?php
$exec_arr=array("president", "sports", "cultural", "scitech", "fmc");
$disp_arr=array("President, Students' Gymkhana", "General Secretary, Games and Sports Council", "General Secretary, Cultural Council", "General Secretary, Science and Technology Council", "General Secretary, Films and Media Council");
function display_result($post) {
	
	global $exec_arr;
	if(in_array($post, $exec_arr)) {
		$sql="SELECT * FROM ".$post;
		$result=mysql_query($sql) or die(mysql_error());
		echo "<table cellspacing='9'>";
		while($row=mysql_fetch_assoc($result)) {
			echo '<tr>';
			echo '<td style="color:brown"><b>'.$row['candidates'].'</b></td>';
			echo '<td>'.$row['votes'].'</td>';
			echo '</tr>';
		}
		echo "</table>";
		$sql="SELECT * FROM nopref WHERE post='".$post."'";
		$result=mysql_query($sql) or die(mysql_error());
		$row=mysql_fetch_assoc($result);
		echo "<b>No preference votes: </b>".$row['votes'];
		echo "<br/><br/><hr/>";
		

		//Sports Sec
		/*if($post=="Sports Secretary") {
			$sql="SELECT * FROM sports";
			$result=mysql_query($sql) or die(mysql_error());
			echo "<table cellspacing='9'>";
			while($row=mysql_fetch_assoc($result)) {
				echo '<tr>';
				echo '<td style="color:brown"><b>'.$row['candidates'].'</b></td>';
				echo '<td>'.$row['votes'].'</td>';
				echo '</tr>';
			}
			echo "</table>";
			$sql="SELECT * FROM nopref WHERE post='".$post."'";
			$result=mysql_query($sql) or die(mysql_error());
			$row=mysql_fetch_assoc($result);
			echo "<b>No preference votes: </b>".$row['votes'];
			echo "<br/><br/><hr/>";
		}*/
	}
	else {
		$sql="SELECT * FROM candidates WHERE post='".$post."' ORDER BY Name";
		$result=mysql_query($sql) or die(mysql_error());
		echo "<table cellspacing='9'>";
		echo "<tr>";
		echo "<th><i>Name</i></th>";
		echo "<th><i>1<sup>st</sup>preference votes</i></th>";
		echo "<th><i>2<sup>nd</sup>preference votes</i></th>";
		echo "<th><i>3<sup>rd</sup>preference votes</i></th>";
		echo "</tr>";
		while($row=mysql_fetch_assoc($result)) {
			echo '<tr>';
			echo '<td style="color:brown"><b>'.$row['Name'].'</b></td>';
			echo '<td>'.$row['votes1'].'</td>';
			echo '<td>'.$row['votes2'].'</td>';
			echo '<td>'.$row['votes3'].'</td>';
			echo '</tr>';
		}
		echo "</table>";
		// $sql="SELECT * FROM nopref WHERE post='".$post."'";
		// $result=mysql_query($sql) or die(mysql_error());
		// $row=mysql_fetch_assoc($result);
		// echo "<b>No preference votes: </b>".$row['votes'];
		echo "<br/><hr/>";
	}
}
?>

<html>
<head>
	<title>Election Results</title>
	<style type="text/css">
	h1,h2,h3,h4 {
		padding: 0;
		margin: 0;
	}
	td {text-align: center;}
	</style>
</head>
<body>

<?php
$form='<br/>
	<form action="" method="POST">
		Enter password: <input name="passwd" type="password" /><br/><br/>
		<input type="submit" name="submit" value="Enter" />
	</form>';
?>

<?php
if(isset($_POST['submit'])) {
	include('config.php');
	if(isset($_POST['passwd']) && $_POST['passwd']==$resultsPass) {
		//valid password; proceed with showing results
		include('dbconnect.php');

		echo "<h1>Results:</h1><br/>";

		$sql="SELECT votecount from votes";
		$result=mysql_query($sql) or die(mysql_error());
		$row=mysql_fetch_assoc($result);
		$count=$row['votecount'];
		echo "Total number of votes: <b>".$count."</b><br/><br/>";

		$sql="SELECT post FROM nopref ORDER BY id";
		$result=mysql_query($sql) or die(mysql_error());
		while($row=mysql_fetch_assoc($result)) {
			if(array_search($row['post'], $exec_arr)!==FALSE) {
				echo "<h3><u>".$disp_arr[array_search($row['post'], $exec_arr)].":</u></h3>";
			}
			else {
				echo "<h3><u>".$row['post'].":</u></h3>";
			}
			display_result($row['post']);
		}
	}
	else {
		echo "<b>Invalid Password!!</b><br/>".$form;
	}
}
else {
	echo $form;
}
?>

</body>
</html>