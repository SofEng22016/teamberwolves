<?php
$email=$_POST['email']; 
$fname=$_POST['fname']; 
$mname=$_POST['mname']; 
$lname=$_POST['lname']; 
$gender=$_POST['gender'];
date_default_timezone_set('UTC');
$ID = date('Y');
$ID *= "1000000";
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `accounts`";
$result = mysql_query($query,$con);
$rows = mysql_num_rows($result);
$ID += $rows;
$query2 = "INSERT INTO `instructor` (`ID`, `FName`, `MName`, `LName`, `Gender`, `Picture`)
		VALUES ('$ID', '$fname', '$mname', '$lname', '$gender','');";
$result2 = mysql_query($query2,$con);

$query3 = "INSERT INTO `accounts` (`ID`, `email`, `Type`, `Password`)
VALUES ('$ID', '$email', 'Prof', '$mname');";
$result3 = mysql_query($query3,$con);
mysql_close($con);
?>