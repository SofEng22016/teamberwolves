<?php
$title = $_POST['title'];
$start = $_POST['start'];
$color = $_POST['color'];
$col = substr($color, -6);  
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `events`  WHERE `Start` LIKE '$start%' AND `Title` = '$title' AND `Color` = '$col'";
$result = mysql_query($query,$con);
$id = "";
while ($row = mysql_fetch_assoc($result)) {
	$id = $row['ID'];
}
$query = "DELETE FROM `events` WHERE `events`.`ID` = '$id'";
$result = mysql_query($query,$con);
?>