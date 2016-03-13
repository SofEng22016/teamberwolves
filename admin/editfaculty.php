<?php
$id=$_POST['id']; 
$fName=$_POST['fName']; 
$mName=$_POST['mName']; 
$lName=$_POST['lName']; 
$email=$_POST['email']; 
$gender=$_POST['gender']; 
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "UPDATE `instructor` SET `FName` = '$fName', `MName` = '$mName', `LName` = '$lName', `Gender` = '$gender' WHERE `instructor`.`ID` = '$id';";
$result = mysql_query($query,$con);

$query2 = "UPDATE `accounts` SET `email` = '$email' WHERE `accounts`.`ID` = '$id';";
$result2 = mysql_query($query2,$con);
mysql_close($con);
?>