<?php
$oldEmail=$_POST['oldEmail1'];
$newEmail=$_POST['newEmail1'];
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `guest` WHERE `Email` = '$oldEmail'";
$result = mysql_query($query,$con);
$ID = "";
while ($row = mysql_fetch_assoc($result)) {
	$ID = $row['ID'];
}

$query2 = "SELECT * FROM `activation` WHERE `ID` = '$ID'";
$result2 = mysql_query($query2,$con);
$act = "";
while ($row2 = mysql_fetch_assoc($result2)) {
	$act = $row2['actCode'];
}

$query3 = "UPDATE `guest` SET `Email` = '$newEmail' WHERE `guest`.`ID` = '$ID';";
$result3 = mysql_query($query3,$con);

mysql_close($con);
mail($newEmail, "Account Activation myPage", "OldEmail='".$oldEmail."'NewEmail='".$newEmail."'"."http://localhost:81/softeng/activate.php?user=".$ID."&&act=".$act);
?>