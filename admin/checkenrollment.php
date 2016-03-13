<?php
$con = mysql_connect("localhost", "root", "");
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `school`";
$result = mysql_query($query,$con);
$rows = mysql_num_rows($result);
while ($row = mysql_fetch_assoc($result)) {
$enrollment = $row['Enrollment'];
}
mysql_close($con);
?>