<?php
$id = $_POST['id'];
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `accounts` WHERE `ID` = '$id'";
$result = mysql_query($query,$con);
while ($row = mysql_fetch_assoc($result)) {
	mail($row['email'], "Account Password", "Password : " + $row['Password']);
}
?>