<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "googleme";
$db = "vote";

//connect to the database
$con = mysql_connect("$dbHost", "$dbUser", "$dbPass") or die ("Error connecting to database.");
mysql_select_db($db, $con) or die ("Couldn't select the database.");
?>