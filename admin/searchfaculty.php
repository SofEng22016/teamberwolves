<?php
$search=$_POST['search']; 
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `instructor` JOIN `accounts` ON `instructor`.`ID`=`accounts`.`ID` WHERE `instructor`.`ID` = '$search' OR `accounts`.`ID` = '$search' OR `FName` = '$search' OR `MName` = '$search' OR `LName` = '$search'";
$result = mysql_query($query,$con);
$rows = mysql_num_rows($result);
$ret = "";
while ($row = mysql_fetch_assoc($result)) {
	echo $row['ID']."-".$row['FName']."-".$row['MName']."-".$row['LName']."-".$row['Gender']."-".$row['email'];
}
mysql_close($con);
?>