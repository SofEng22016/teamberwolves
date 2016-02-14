<?php
session_start();
include 'connect.php';	
include 'checkadmin.php';
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
	if($_SESSION['expire'] < time()){
		header('Location: lockscreen.php');
	}
	else{
		$_SESSION['expire'] = time() + 30;
	}
}
?>
<!DOCTYPE html>
<html>

<?php include 'headcss.php'; ?>
<body class="skin-blue fixed sidebar-mini sidebar-collapse hold-transition">
	<div class="wrapper">
		<?php include 'nav.php'; 
			  include 'lside.php';
		 	  include 'rside.php'; ?>
		<div class="content-wrapper">
			<?php include 'header.php';
				  include 'content.php' ;?>
		</div>
		<?php include 'foot.php';
			  include 'js.php'; ?>
	</div>
<script type="text/javascript">
var idleTime = 0;
$(document).ready(function () {
    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 1000); // 1 minute

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
        $.post('resettime.php', 'val=' + $(this).val(), function (response) {
        });
    });
    $(this).keypress(function (e) {
        idleTime = 0;
        $.post('resettime.php', 'val=' + $(this).val(), function (response) {
        });
    });
});

function timerIncrement() {
    idleTime++;
    if (idleTime > 30) { 
		window.location = "lockscreen.php";
    }else{
    	<?php $_SESSION['expire'] = time() + 30; ?>
    }
}
</script>   
</body>
</html>