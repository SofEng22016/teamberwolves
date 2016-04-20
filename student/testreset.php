<?php
$res = 201501280;
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}	
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `tempsubjects` WHERE ID = '$res';";
$result = mysql_query($query,$con);
$subjects = array();
while ($row = mysql_fetch_assoc($result)) {
	$subjects = explode("-", $row['Subjects']);
}
for($i=0;$i<count($subjects);$i++){
	$gradeID = $subjects[$i].$res;
	$query = "DELETE FROM `grades` WHERE `grades`.`ID` = '$gradeID';";
	echo $query."<br>";
	$result = mysql_query($query,$con);
}
mysql_close($con);
?>