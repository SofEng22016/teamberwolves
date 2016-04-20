<?php
$gradeID=$_POST['gradeID']; 
$mgrade=$_POST['mgrade']; 
$fgrade=$_POST['fgrade'];
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "UPDATE `grades` SET `Midterm` = '$mgrade', `Final` = '$fgrade' WHERE `grades`.`ID` = '$gradeID';";
$result = mysql_query($query,$con);
mysql_close($con);
?>