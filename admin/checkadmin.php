<?php
if($_SESSION["Type"]!="Admin"){
	header("Location: 401.html");
	exit();
}
if(!isset($_POST['opt'])){
	$opt="Overview";
}
else{
	$opt=$_POST['opt'];
}
if(!isset($_SESSION['expire'])){
	$_SESSION['expire'] = time() + 30;
}
else{
	if($_SESSION['expire'] <= time()){
		header('Location: lockscreen.php');
	}
	else{
		$_SESSION['expire'] = time() + 30;
	}
}
?>