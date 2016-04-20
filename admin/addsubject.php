<?php
$code=$_POST['code'];
$name=$_POST['name'];
$desc=$_POST['desc'];
$lab=$_POST['lab'];
$lec = $_POST['lec'];
$req = $_POST['req'];
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `subject_info` WHERE `SCode` = '$code'";
$result = mysql_query($query,$con);
$rows = mysql_num_rows($result);
if($rows!=0){
	echo "Exists";
}
else{
	$line = "";
	if(!empty($req)){
		for($x=0;$x<count($req);$x++){
			$query = "SELECT * FROM `subject_info`";
			$result = mysql_query($query,$con);
			while ($row = mysql_fetch_assoc($result)) {
				if($req[$x]==$row['SCode']){
					$line .= $row['ID']."-";
				}
			}
		}
	}
	if($line==''){
		$line = 0;
	}
	$query = "INSERT INTO `subject_info` (`ID`, `SCode`, `Subject Name`, `Description`, `Lab`, `Lec`, `Requisite`) 
			VALUES (NULL, '$code', '$name', '$desc', '$lab', '$lec', '$line');";
	$result = mysql_query($query,$con);
	echo $query;
}
mysql_close($con);
?>