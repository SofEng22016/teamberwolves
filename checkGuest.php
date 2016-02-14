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
$rows = mysql_num_rows($result);
if($rows!=0){
	echo "Exists";
}
else{
	echo "Proceed";
}
mysql_close($con);
?>