<?php
$id=$_POST['id']; 
$email=$_POST['email']; 
$fname=$_POST['fname']; 
$lname=$_POST['lname']; 
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `accounts` JOIN `students` ON `accounts`.`ID` = `students`.`ID` 
WHERE `accounts`.`email` = '$email' OR `students`.`FName` = '$fname' OR `students`.`LName` = '$lname'";
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