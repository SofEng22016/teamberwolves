<?php
$id=$_POST['id']; 
$amount=$_POST['amount']; 
$total=$_POST['total'];
$dte = date("Y-m-d")." ".date("H:i:s");
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query2 = "INSERT INTO `transactions`
		(`T_ID`, `ID`, `Amount`, `Type`, `Card Number`, `Date`) VALUES 
		(NULL, '$id', '$amount', 'Cash', '0', '$dte');";
$result2 = mysql_query($query2,$con);
$query2 = "INSERT INTO `balance` (`ID`, `Total`) VALUES ('$id', '$total');";
$result2 = mysql_query($query2,$con);
mysql_close($con);
?>