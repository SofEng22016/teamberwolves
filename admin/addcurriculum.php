<?php
$code=$_POST['code']; 
$code2 =$code.",";
$curriculum=$_POST['curriculum']; 
$term=$_POST['term'];
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
if(empty($req)){
	$req = array(0);
}
$requisite = "";
$db = mysql_select_db("curriculum", $con);
$query = "SELECT * FROM `$curriculum` WHERE `Term` = '$term';";
$result = mysql_query($query,$con);
$line = "";
while ($row = mysql_fetch_assoc($result)) {
	$line = $row['Subjects'];
}
$line .= $code2;
$query = "UPDATE `$curriculum` SET `Subjects` = '$line' WHERE `Term` = '$term';";
$result = mysql_query($query,$con);

$reqs = array();
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `subject_info` WHERE `SCode` = '$code';";
$result = mysql_query($query,$con);
while ($row = mysql_fetch_assoc($result)) {
	echo $row['Subject Name']."-".$row['Description']."-".($row['Lab']+$row['Lec']);
}
mysql_close($con);
?>