<section class="content">
	<div class="row">
    	<?php  
    	$mailOpt = "";
if(!isset($_POST['mailopt'])){
	$mailOpt="";
}
else{
	$mailOpt=$_POST['mailopt'];
}
    	include 'mailoptions.php'; 
    	switch ($mailOpt) {
    		case "Sent":
    			echo "Sent";
    			//include 'mail.php';
    			break;
    		case "Compose":
    			include 'mailcompose.php';
    			break;
    		case "Read":
    			include 'mailread.php';
    			break;
    		default:
    			include 'mailinbox.php';
    	}
    	?>
	</div>
</section>