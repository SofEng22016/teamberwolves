<?php
$email=$_POST['email1']; 
$fname=$_POST['fname1']; 
$mname=$_POST['mname1']; 
$lname=$_POST['lname1']; 
$password=$_POST['password1'];
date_default_timezone_set('UTC');
$ID = date('Y');
$ID *= "1000000";
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `accounts`";
$result = mysql_query($query,$con);
$rows = mysql_num_rows($result);
$ID += $rows;
$query2 = "INSERT INTO `guest` (`ID`, `FName`, `MName`, `LName`, `Email`, `Status`)
		VALUES ('$ID', '$fname', '$mname', '$lname', '$email', 'Pending');";
$result2 = mysql_query($query2,$con);

$query3 = "INSERT INTO `accounts` (`ID`, `email`, `Type`, `Password`)
VALUES ('$ID', '$email', 'Guest', '$password');";
$result3 = mysql_query($query3,$con);
$c = "";
$a = "qoepwiasdkjlxcurhjvb";
for($x=0;$x<15;$x++){
	if(rand (0,100)%2==0){
		$c .= $a[rand (0,strlen($a)-1)];
	}
	else{
		$c .= rand(0,9);
	}
}
echo $email;
$query4 = "INSERT INTO `activation` (`ID`, `actCode`)
VALUES ('$ID', '$c');";
$result4 = mysql_query($query4,$con);
mysql_close($con);
mail($email, "Account Activation myPage", $lname.", ".$fname." ".$mname."<br>"."http://localhost:81/softeng/activate.php?user=".$ID."&&act=".$c);
?>