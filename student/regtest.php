<?php 
//"30","31","32","33","34","35","36"
$id = "201501280";
$data = array("30","31","32","33","34","35","36");
//$data = array("15","16","17","18","19","20","41");
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

echo "<h2>add</h2>";
for($x=0;$x<count($data);$x++){
	$query = "SELECT *  FROM `subject12016` WHERE `SID` ='$data[$x]'";
	$result = mysql_query($query,$con);
	while ($row = mysql_fetch_assoc($result)) {
		echo $row['SCode']."<br>";
	}
}

$accepted = array();
echo "<h2>find match</h2>";
for($x=0;$x<count($data);$x++){
	$query = "SELECT *  FROM `subject12016` WHERE `SID` ='$data[$x]'";
	$result = mysql_query($query,$con);
	while ($row = mysql_fetch_assoc($result)) {
		echo $row['SCode'];
		for($y=0;$y<count($enrolledSubjects);$y++){
			if($row['SCode']==$enrolledSubjects[$y]){
				echo "-Match(Enrolled)";
			}
		}
		for($y=0;$y<count($tempSubjects);$y++){
			if($row['SCode']==$tempSubjects[$y]){
				echo "-Match(Temp)";
			}
		}
		echo"<br>";
	}
}
echo "<h2>temp</h2>";
for($x=0;$x<count($tempSubjects);$x++){
	echo $tempSubjects[$x]."<br>";
}
echo "<h2>enrolled</h2>";
for($x=0;$x<count($enrolledSubjects);$x++){
	echo $enrolledSubjects[$x]."<br>";
}

?>