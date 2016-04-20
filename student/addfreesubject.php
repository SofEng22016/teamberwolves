<?php
$id = $_POST['id'];
$sub = $_POST['selected'];
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `tempsubjects` WHERE `ID` = '$id'";
$result = mysql_query($query,$con);
$subjects = array();
$a = "";
while ($row = mysql_fetch_assoc($result)) {
	$subjects = explode("-", $row['Subjects']);
		$a = $row['Subjects'];
}
$subjects2 = $subjects;
for($x=0;$x<count($subjects);$x++){
	$subject = $subjects[$x];
	$query = "SELECT * FROM `subject12016` WHERE `SID` = '$subject'";
	$result = mysql_query($query,$con);
	while ($row = mysql_fetch_assoc($result)) {
		$subjects[$x] = $row['SCode'];
	}
}
$unitsTotal = 0;
$alreadyEnrolled = 0;
$query = "SELECT * FROM `subject12016` WHERE `SID` = '$sub'";
$result = mysql_query($query,$con);
$sub2 = "";
while ($row = mysql_fetch_assoc($result)) {
	$sub2 = $row['SCode'];
}
$query = "SELECT * FROM `subject_info` WHERE `SCode` = '$sub2'";
$result = mysql_query($query,$con);
while ($row = mysql_fetch_assoc($result)) {
	$unitsTotal += $row['Lab'];
	$unitsTotal += $row['Lec'];
}
$conflict = 0;
for($x=0;$x<count($subjects);$x++){
	$subject = $subjects[$x];
	if($subjects[$x]==$sub2){
		$alreadyEnrolled++;
	}
	$query = "SELECT * FROM `subject_info` WHERE `SCode` = '$subject'";
	$result = mysql_query($query,$con);
	$unit = 0;
	while ($row = mysql_fetch_assoc($result)) {
		$unitsTotal += $row['Lab'] + $row['Lec'];
		$unit = $row['Lab'] + $row['Lec'];
	}
	$subject2 = $subjects2[$x];
	$query = "SELECT * FROM `subject12016` WHERE `SID` = '$subject2'";
	$result = mysql_query($query,$con);
	$start1 = 0;
	$start2 = 0;
	$end1 = 0;
	$end2 = 0;
	$day1 = "";
	$day2 = "";
	while ($row = mysql_fetch_assoc($result)) {
		$start1 = $row['Time'];
		$end1 = $start1 + ($unit * 100);
		$day1 = $row['Day'];
	}
	$query = "SELECT * FROM `subject12016` WHERE `SID` = '$sub'";
	$result = mysql_query($query,$con);
	while ($row = mysql_fetch_assoc($result)) {
		$start2 = $row['Time'];
		$day2 = $row['Day'];
		$end2 = $start2 + ($unit * 100);
	}
	$foundConflict = 0;
	if($day1==$day2){
		if($start1>=$start2 && $end1<=$start2){
			$conflict++;
			echo $subject.$start1."-".$end1."|||".$start2."-".$end2;
		}
		if($start2>=$start1 && $end2>=$start1){
			$conflict++;
			$foundConflict++;
		}
	}
	
	if($foundConflict>0){
		echo $subject;
	}
}
if($alreadyEnrolled>0){
	echo "AlreadyEnrolled";
}
else if($conflict>0){
	echo " ";
}
else if($unitsTotal>=21){
	echo "Exceed";
}
else{
	echo "Success";
	$query = "SELECT * FROM `tempsubjects` WHERE `ID` = '$id'";
	$result = mysql_query($query,$con);
	$currentSubjects = "";
	while ($row = mysql_fetch_assoc($result)) {
		$currentSubjects = $row['Subjects'];
	}
	$newSubjects = $currentSubjects."-".$sub;
	$query = "UPDATE `tempsubjects` SET `Subjects` = '$newSubjects' WHERE `tempsubjects`.`ID` = '$id';";
	$result = mysql_query($query,$con);
	$gradeID = $sub.$id;
	$query = "INSERT INTO `grades` (`ID`, `Midterm`, `Final`) VALUES ('$gradeID', '0', '0');";
	$result = mysql_query($query,$con);
	
}
?>