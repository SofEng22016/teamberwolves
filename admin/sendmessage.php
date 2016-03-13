<?php

$sen = $_POST['sen'];
$mes = $_POST['mes'];
$rec = $_POST['to'];
$sub = $_POST['sub'];

date_default_timezone_set('Asia/Singapore');
$con = mysql_connect("localhost", "root", "");
$db = mysql_select_db("enrollment", $con);
$date = date("Y-m-d")." ".date("H:i:s");

$query = "INSERT INTO `messages` (`ID`, `Sender`, `Recipient`, `Subject`, `Message`, `Attachment`, `Date`, `isRead`)
		VALUES (NULL, '$sen', '$rec', '$sub', '$mes', NULL, '$date', '0');";
$result = mysql_query($query,$con);

$query = "SELECT * FROM `messages` WHERE `Date` = '$date'";
$result = mysql_query($query,$con);
$id = "";
while ($row = mysql_fetch_assoc($result)) {
	$id = $row['ID'];
}

if(isset($_FILES['file'])){
	$file_name = $id."-".$_FILES['file']['name'];
	$file_tmp =$_FILES['file']['tmp_name'];
	$file_type=$_FILES['file']['type'];
	$file_size =$_FILES['file']['size'];
	$file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
	move_uploaded_file($file_tmp,"../upload/".$id."-".$_FILES['file']['name']);
	$query = "UPDATE `messages` SET `Attachment` = '$file_ext', `fileName` = '$file_name', `fileSize` = '$file_size KB' WHERE `messages`.`ID` = '$id';";
	$result = mysql_query($query,$con);
}
mysql_close($con);
header('Location: index.php');
?>