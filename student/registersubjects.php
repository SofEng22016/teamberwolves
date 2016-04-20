<?php
$res = $_POST['res'];
$data = explode("-", $res);
$data2 = array();
$subjects = "";
$id = $data[count($data)-1];
for($x=0;$x<count($data)-1;$x++){  // subjects
	$subjects .= $data[$x]."-";
	$data2[$x] = $data[$x];
}
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("curriculum", $con);
$query = "SELECT *  FROM `enrollment` WHERE `SID` ='$id'";
$result = mysql_query($query,$con);
$enrolledSubjects = array();
$counter = 0;
while ($row = mysql_fetch_assoc($result)) {
	$r = explode(",", $row['Subjects']);
	for($i=0;$i<count($r);$i++){
		$enrolledSubjects[$counter] = $r[$i];
		$counter++;
	}
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT *  FROM `tempsubjects` WHERE `ID` ='$id'";
$result = mysql_query($query,$con);
$tempSubjects = array();
$counter = 0;
while ($row = mysql_fetch_assoc($result)) {
	$r = explode("-", $row['Subjects']);
	for($i=0;$i<count($r);$i++){
		$tempSubjects[$counter] = $r[$i];
		$counter++;
	}
}

$tempSubjects2 = array();
$counter = 0;
for($x=0;$x<count($tempSubjects);$x++){
	$query = "SELECT * FROM `subject12016` WHERE `SID` ='$tempSubjects[$x]'";
	$result = mysql_query($query,$con);
	while ($row = mysql_fetch_assoc($result)) {
		$tempSubjects[$counter] = $row['SCode'];
		$counter++;
	}
}
$line = "";
$accepted = array();
for($x=0;$x<count($data2);$x++){
	$query = "SELECT *  FROM `subject12016` WHERE `SID` ='$data2[$x]'";
	$result = mysql_query($query,$con);
	while ($row = mysql_fetch_assoc($result)) {
		$found = 0;
		for($y=0;$y<count($enrolledSubjects);$y++){
			if($row['SCode']==$enrolledSubjects[$y]){
				$found = 1;
			}
		}
		for($y=0;$y<count($tempSubjects);$y++){
			if($row['SCode']==$tempSubjects[$y]){
				$found = 1;
			}
		}
		if($found == 0){
			$line .= $data2[$x]."-";
		}
	}
}
$query = "SELECT * FROM `tempsubjects` WHERE `ID` ='$id'";
$result = mysql_query($query,$con);
$current = "";
$foundTemp = 0;
while ($row = mysql_fetch_assoc($result)) {
	$current = $row['Subjects'];
	$foundTemp++;
}
$line = $current.$line;
echo $line;
if($foundTemp==0){
	$query = "INSERT INTO `tempsubjects` (`ID`, `Subjects`) VALUES ('$id', '$line');";
}
else{
	$query = "UPDATE `tempsubjects` SET `Subjects` = '$line' WHERE `tempsubjects`.`ID` = '$id';";
}
$result = mysql_query($query,$con);
$gradesID = explode("-",$line);
for($x=0;$x<count($gradesID);$x++){
	$grade = $gradesID[$x].$id;
	$query = "INSERT INTO `grades` (`ID`, `Midterm`, `Final`) VALUES ('$grade', '0', '0');";
	$result = mysql_query($query,$con);
}

mysql_close($con);
?>