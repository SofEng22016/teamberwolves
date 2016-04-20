<?php
$code=$_POST['code']; 
$name=$_POST['name']; 
$desc=$_POST['desc']; 
$req=$_POST['req']; 
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
if(empty($req)){
	$req = array(0);
}
$requisite = "";
$db = mysql_select_db("enrollment", $con);
for($x=0;$x<count($req);$x++){
	$cde = $req[$x];
	$query = "SELECT * FROM `subject_info` WHERE `SCode` = '$cde';";
	$result = mysql_query($query,$con);
	while ($row = mysql_fetch_assoc($result)) {
		$requisite .= $row['ID'];
	}
	if($x<count($req)-1){
		$requisite .= "-";
	}
}
if($requisite==""){
	$requisite = "0";
}
$query = "UPDATE `subject_info` SET `SCode` = '$code', `Subject Name` = '$name', `Description` = '$desc', `Requisite` = '$requisite' WHERE `subject_info`.`SCode` = '$code';";
$result = mysql_query($query,$con);
//echo $query;
mysql_close($con);
?>