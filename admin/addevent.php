<?php
$date=$_POST['date'];
$title=$_POST['title']; 
$color=$_POST['color'];
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query2 = "INSERT INTO `events` 
(`ID`, `Title`, `Start`, `End`, `Color`)
 VALUES (NULL, '$title', '$date', NULL, '$color');";
$result2 = mysql_query($query2,$con);
mysql_close($con);
?>