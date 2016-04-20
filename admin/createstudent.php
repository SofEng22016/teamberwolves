<?php
$ID=$_POST['id'];
$email=$_POST['email']; 
$fname=$_POST['fname']; 
$mname=$_POST['mname']; 
$lname=$_POST['lname']; 
$gender=$_POST['gender'];
$course=$_POST['course'];
$year=$_POST['year'];
$birthdate=$_POST['birthdate'];
$birthDate = explode("-", $birthdate);
$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
		? ((date("Y") - $birthDate[0]) - 1)
		: (date("Y") - $birthDate[0]));
date_default_timezone_set('UTC');
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$dte = date('Y');
$rest = substr($course, 3, 6);
$curriculum = $rest."-".$dte[2].$dte[3].($dte[2]-1).$dte[3];
$query2 = "INSERT INTO `students` 
(`ID`, `FName`, `MName`, `LName`, `Birthdate`, `Gender`, `Age`, `Year`, `Course`, `Curriculum`, `Picture`, `Subjects`, `Status`)
 VALUES ('$ID', '$fname', '$mname', '$lname','$birthdate', '$gender', '$age','$year','$course','$curriculum','','','Pending');";
$result2 = mysql_query($query2,$con);
$query3 = "INSERT INTO `accounts` (`ID`, `email`, `Type`, `Password`)
VALUES ('$ID', '$email', 'Student', '$mname');";
$result3 = mysql_query($query3,$con);

$query4 = "INSERT INTO `contact` (`ID`, `Country`, `Province`, `City`, `Street`, `mobile`) 
		VALUES ('$ID', 'Country', 'Province', 'City`, 'Street', '123456');";
$result4 = mysql_query($query4,$con);

//INSERT INTO `tempsubjects` (`ID`, `Subjects`) VALUES ('123', ' ');

$query4 = "INSERT INTO `tempsubjects` (`ID`, `Subjects`) VALUES ('$ID', ' ');";
$result4 = mysql_query($query4,$con);
mysql_close($con);
?>