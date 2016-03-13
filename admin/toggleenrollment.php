<?php
$enroll=$_POST['enroll']; 
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "UPDATE `school` SET `Enrollment` = '$enroll' WHERE `school`.`ID` = '1';";
$result = mysql_query($query,$con);
echo $enroll;
mysql_close($con);
?>