<?php
// Establishing connection with server by passing "server_name", "user_id", "password".
$connection = mysql_connect("localhost", "root", "");
// Selecting Database by passing "database_name" and above connection variable.
$db = mysql_select_db("testform", $connection);
$name2=$_POST['name1']; // Fetching Values from URL
$email2=$_POST['email1'];
$contact2=$_POST['contact1'];
$gender2=$_POST['gender1'];
$msg2=$_POST['msg1'];
$query = mysql_query("insert into form_element(name, email, contact, gender, message) values ('$name2','$email2','$contact2','$gender2','$msg2')"); //Insert query
if($query){
	echo "Incorrect";
}
mysql_close($connection); // Connection Closed.
?>