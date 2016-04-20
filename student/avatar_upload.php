<?php
session_start();

$id = $_POST['id'];
if(isset($_FILES['avatar'])){
	$file_name = $id."-".$_FILES['avatar']['name'];
	$file_tmp =$_FILES['avatar']['tmp_name'];
	$file_type=$_FILES['avatar']['type'];
	$file_size =$_FILES['avatar']['size'];
	$file_ext=strtolower(end(explode('.',$_FILES['avatar']['name'])));
	$nme = $id.".".$file_ext;
	unlink("//".gethostname()."/accounts/".$id.".".$file_ext);
	move_uploaded_file($file_tmp,"//".gethostname()."/accounts/".$id.".".$file_ext);
	$_SESSION["Picture"] = $nme;
	$con = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("enrollment", $con);
	$query = "UPDATE `students` SET `Picture` = '$nme' WHERE `ID` = '$id';";
	$result = mysql_query($query,$con);
	header('Location: index.php');
}
?>