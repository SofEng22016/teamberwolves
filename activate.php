<?php
session_start();
$ID = $_GET['user'];
$code = $_GET['act'];
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `guest` JOIN `activation` ON `guest`.`ID` = `activation`.`ID` WHERE `guest`.`ID`='$ID'";
$result = mysql_query($query,$con);
$db = mysql_select_db("enrollment", $con);
if (! $result){
	echo "Database error: " . mysql_error();
}
while ($row = mysql_fetch_assoc($result)) {
	$name = "";
	$name .= $row['FName']." ".$row['LName'];
	if($code==$row['actCode']){
		echo "found";
		$query2 = "UPDATE `guest` SET `Status` = 'Activated' WHERE `guest`.`ID` = '$ID'";
		$result2 = mysql_query($query2,$con);
		$query3 = "DELETE FROM `activation` WHERE `activation`.`ID` ='$ID' ";
		$result3 = mysql_query($query3,$con);
		$_SESSION["ID"] = $ID;
		$_SESSION["Name"] = $name;
		$_SESSION["Type"] = "Guest";
	}
}
mysql_close($con);
header('Location: http://localhost:81/softeng/mypage.php');
exit();
?>