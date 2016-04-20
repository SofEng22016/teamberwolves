<?php

$id = $_POST['to'];
$title = $_POST['sub'];
$mes = $_POST['mes'];
$col = $_POST['col'];
$ico = $_POST['ico'];
if($id=="All"){
	$prof = $_POST['ProfID'];
	$con = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("enrollment", $con);
	
	$query = "SELECT * FROM `students`;";
	$result = mysql_query($query,$con);
	$subjects = array();
	while ($row = mysql_fetch_assoc($result)) {
		$user = $row['ID'];
		$query2 = "INSERT INTO `announcements` 
				(`ID`, `UserID`, `Title`, `Message`, `Icon`, `Color`, `isRead`) VALUES 
				(NULL, '$user', '$title', '$mes', '$ico', '$col', '0');";
		$result2 = mysql_query($query2,$con);
	}
}
else {
	$con = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("enrollment", $con);
	$query = "SELECT * FROM `tempsubjects`;";
	$result = mysql_query($query,$con);
	$subjects = array();
	$users = array();
	$counter = 0;
	while ($row = mysql_fetch_assoc($result)) {
		$subjects = explode("-", $row['Subjects']);
		$users[$counter] = $row['ID'];
		$counter++;
	}
	echo "Subjects=".count($subjects);
	for($x=0;$x<count($users);$x++){
		echo $users[$x]."<br>";
		$query = "SELECT * FROM `subject12016`;";
		$result = mysql_query($query,$con);
		while ($row = mysql_fetch_assoc($result)) {
			if($row['SID']==$id){
				$user = $users[$x];
				$query2 = "INSERT INTO `announcements`
				(`ID`, `UserID`, `Title`, `Message`, `Icon`, `Color`, `isRead`) VALUES
				(NULL, '$user', '$title', '$mes', '$ico', '$col', '0');";
				$result2 = mysql_query($query2,$con);
			}
		}
	}
}
?>