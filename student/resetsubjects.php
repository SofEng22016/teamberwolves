<?php
$res = $_POST['res'];

$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}	
$db = mysql_select_db("enrollment", $con);

$query = "DELETE FROM `tempsubjects` WHERE `tempsubjects`.`ID` ='$res'";
$result = mysql_query($query,$con);

mysql_close($con);
?>