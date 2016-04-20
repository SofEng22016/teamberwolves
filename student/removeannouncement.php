<?php
$id = $_POST['id'];
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "DELETE FROM `announcements` WHERE `ID` = '$id';";
$result = mysql_query($query,$con);
?>