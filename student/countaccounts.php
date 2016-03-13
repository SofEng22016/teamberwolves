<?php 
$IDval = date('Y');
$IDval *= "1000000";
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `accounts`";
$result = mysql_query($query,$con);
$rows = mysql_num_rows($result);
$IDval += $rows;
mysql_close($con);
?>