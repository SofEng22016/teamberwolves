<?php
session_start();
$pass=$_POST['pass']; 
$id=$_POST['id'];
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `accounts` WHERE `Type` = 'Student' AND `ID` = '$id' AND `Password` = '$pass'";
$result = mysql_query($query,$con);
$rows = mysql_num_rows($result);
if($rows==0){
	echo "Incorrect";
}
else{
	$_SESSION['expire'] = time() + 300;
}
mysql_close($con);
?>