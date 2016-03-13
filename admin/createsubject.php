<?php
$time=$_POST['time']; 
$day=$_POST['day']; 
$prof=$_POST['prof']; 
$room=$_POST['room']; 
$code=$_POST['code']; 
$section=$_POST['section']; 
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query2 = "INSERT INTO `subject12016` 
(`SID`, `SCode`, `Section`, `Room`, `Time`, `Day`, `ProfID`, `Count`)
 VALUES (NULL, '$code', '$section', '$room','$time', '$day', '$prof','0');";
$result2 = mysql_query($query2,$con);
mysql_close($con);
?>