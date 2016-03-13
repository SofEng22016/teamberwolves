<?php
$time=$_POST['time']; 
$day=$_POST['day']; 
$prof=$_POST['prof']; 
$room=$_POST['room']; 
$con = mysql_connect("localhost", "root", "");
$found = 0;
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `subject12016` WHERE `Time` = '$time' AND `Day` = '$day' AND `Room` = '$room'";
$result = mysql_query($query,$con);
$rows = mysql_num_rows($result);
$line = "";
if($rows!=0){
	$found = 1;
	while ($row = mysql_fetch_assoc($result)) {
		$line = $row['Day'].",".$row['Time'].",".$row['Room'].",".$row['ProfID'].",";
	}
}
$query2 = "SELECT * FROM `subject12016` JOIN `instructor` ON `subject12016`.`ProfID` = `instructor`.`ID` WHERE `subject12016`.`Time` = '$time' AND `subject12016`.`Day` = '$day' AND `instructor`.`ID` = '$prof'";
$result2 = mysql_query($query2,$con);
$rows2 = mysql_num_rows($result2);
if($rows2!=0){
	$found = 2;
	while ($row2 = mysql_fetch_assoc($result2)) {
		$line = $row2['Day'].",".$row2['Time'].",".$row2['Room'].",".$row2['ProfID'].",";
	}
}
if($found==0){
	echo "Proceed";
}
else if($found==1){
	echo $line."Room and Schedule";
}
else if($found==2){
	echo $line."Instructor";
}
mysql_close($con);
?>