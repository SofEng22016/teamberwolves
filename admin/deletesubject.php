<?php
$term = $_POST['term'];
$subject = $_POST['subject'];
$curriculum = $_POST['curriculum'];
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("curriculum", $con);
$query = "SELECT * FROM `$curriculum` WHERE `Term` = '$term'";
$result = mysql_query($query,$con);
$subjects = array();
while ($row = mysql_fetch_assoc($result)) {
	$subjects = explode(",", $row['Subjects']);
}
$line = "";
for($x=0;$x<count($subjects);$x++){
	if($subjects[$x]!=$subject && $subjects[$x]!=''){
		$line .= $subjects[$x].",";
	}
}
$query = "UPDATE `$curriculum` SET `Subjects` = '$line' WHERE `$curriculum`.`Term` = '$term';";
$result = mysql_query($query,$con);
?>