<?php
$email=$_POST['email1']; 
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `guest` WHERE `Email` = '$email'";
$result = mysql_query($query,$con);
$ID = "";
while ($row = mysql_fetch_assoc($result)) {
	$ID = $row['ID'];
}
echo $ID;
$query2 = "SELECT * FROM `activation` WHERE `ID` = '$ID'";
$result2 = mysql_query($query2,$con);
$act = "";
while ($row2 = mysql_fetch_assoc($result2)) {
	$act = $row2['actCode'];
}
echo $act;
mysql_close($con);
mail($email, "Account Activation myPage", "http://localhost:81/softeng/activate.php?user=".$ID."&&act=".$act);
?>