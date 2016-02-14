<?php
if($_SESSION["Type"]!="Admin"){
	header("Location: 401.html");
	exit();
}
?>