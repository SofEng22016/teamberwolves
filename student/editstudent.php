<?php
$id = $_POST['id'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$country = $_POST['country'];
$province = $_POST['province'];
$city = $_POST['city'];
$street = $_POST['street'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];

$con = mysql_connect("localhost", "root", "");
$db = mysql_select_db("enrollment", $con);
$query = "UPDATE `accounts` SET `email` = '$email' WHERE `accounts`.`ID` = '$id';";
$result = mysql_query($query,$con);
$query = "UPDATE `students` SET `FName` = '$fname', `MName` = '$mname', `LName` = '$lname' WHERE `ID` = '$id';";
$result = mysql_query($query,$con);
$query = "UPDATE `contact` SET `Country` = '$country', `Province` = '$province', `City` = '$city' , `Street` = '$street', `mobile` = '$mobile' WHERE `ID` = '$id';";
$result = mysql_query($query,$con);
?>