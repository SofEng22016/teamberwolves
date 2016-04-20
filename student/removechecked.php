<?php
$checked = $_POST['chked'];
$id = $_POST['id'];
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT *  FROM `tempsubjects` WHERE `ID` ='$id'";
$result = mysql_query($query,$con);
$tempSubjects = array();
$checkedSubjects = explode("-", $checked);
$counter = 0;
while ($row = mysql_fetch_assoc($result)) {
	$r = explode("-", $row['Subjects']);
	for($i=0;$i<count($r);$i++){
		$tempSubjects[$counter] = $r[$i];
		$counter++;
	}
}
$line = "";
for($x=0;$x<count($tempSubjects);$x++){
	$found = 0;
	for($y=0;$y<count($checkedSubjects);$y++){
		if($tempSubjects[$x]==$checkedSubjects[$y]){
			$found++;
		}
	}
	if($found==0){
		$line .= $tempSubjects[$x]."-";
	}
}
echo $checked;
$query = "UPDATE `tempsubjects` SET `Subjects` = '$line' WHERE `tempsubjects`.`ID` = '$id';";
$result = mysql_query($query,$con);

for($i=0;$i<count($checkedSubjects);$i++){
	$gradeID = $checkedSubjects[$i].$id;
	$query = "DELETE FROM `grades` WHERE `grades`.`ID` = '$gradeID';";
	$result = mysql_query($query,$con);
}
?>