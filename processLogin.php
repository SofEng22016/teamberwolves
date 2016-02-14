<?php
session_start();
$_SESSION["ID"] = "";
$_SESSION["Name"] = "";
$_SESSION["Type"] = "";
$username=$_POST['user1']; // Fetching Values from URL
$password=$_POST['pass1'];
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `accounts` WHERE `ID` = '$username' OR `email` = '$username'";
$result = mysql_query($query,$con);
$rows = mysql_num_rows($result);
if($rows==0){
	echo "NotFound";
}
else{
	while ($row = mysql_fetch_assoc($result)) {
		if($password!=$row['Password']){
			echo "Incorrect";
		}
		else{
			$ID = $row['ID'];
			if($row['Type']=="Guest"){
				$query2 = "SELECT * FROM `guest` WHERE `ID` = '$ID'";
				$result2 = mysql_query($query2,$con);
				while ($row2 = mysql_fetch_assoc($result2)) {
					$_SESSION["ID"] = $row2['ID'];
					$_SESSION["Name"] = $row2['FName']." ".$row2['LName'];
					$_SESSION["Type"] = "Guest";
				}
			}
			else if($row['Type']=="Student"){
				$query2 = "SELECT * FROM `students` WHERE `ID` = '$ID'";
				$result2 = mysql_query($query2,$con);
				while ($row2 = mysql_fetch_assoc($result2)) {
					$_SESSION["ID"] = $row2['ID'];
					$_SESSION["Name"] = $row2['FName']." ".$row2['LName'];
					$_SESSION["Type"] = "Student";
				}
			}
		else if($row['Type']=="Admin"){
				$query2 = "SELECT * FROM `admin` WHERE `ID` = '$ID'";
				$result2 = mysql_query($query2,$con);
				while ($row2 = mysql_fetch_assoc($result2)) {
					$_SESSION["ID"] = $row2['ID'];
					$_SESSION["Name"] = $row2['Name'];
					$_SESSION["Type"] = "Admin";
					$_SESSION["Picture"] = $row2['Picture'];
					echo $_SESSION["Type"];
				}
			}
		}
	}
}
mysql_close($con);
?>