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
					$_SESSION["Course"] = $row2['Course'];
					$_SESSION['expire'] = time() + 300;
					if($row2['Picture']!=""){
						$_SESSION["Picture"] = $row2['Picture'];
					}
					else{
						$_SESSION["Picture"] = strtolower($row2['Gender']).".jpg";
					}
					echo $_SESSION["Type"];
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
					$_SESSION['expire'] = time() + 30;
					echo $_SESSION["Type"];
				}
			}
			else if($row['Type']=="Prof"){
				$query2 = "SELECT * FROM `instructor` WHERE `ID` = '$ID'";
				$result2 = mysql_query($query2,$con);
				while ($row2 = mysql_fetch_assoc($result2)) {
					$_SESSION["ID"] = $row2['ID'];
					$_SESSION["Name"] = $row2['FName']." ".$row2['LName'];
					$_SESSION["Type"] = "Prof";
					if($row2['Picture']!=""){
						$_SESSION["Picture"] = $row2['Picture'];
					}
					else{
						$_SESSION["Picture"] = strtolower($row2['Gender']).".jpg";
					}
					$_SESSION['expire'] = time() + 30;
					echo $_SESSION["Type"];
				}
			}
		}
	}
}
mysql_close($con);
?>