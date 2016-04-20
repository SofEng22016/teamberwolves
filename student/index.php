<?php session_start();
	  include 'connect.php';	
	  include 'checkadmin.php'; ?>
<!DOCTYPE html>
<html>
<?php include 'headcss.php'; ?>
	<body class="skin-blue sidebar-mini hold-transition bb-js">
		<div class="wrapper">
		<?php include 'nav.php'; 
			  include 'lside.php';
		 	  include 'rside.php'; ?>
		<div class="content-wrapper">
			<?php include 'header.php';
				  include 'content.php'; ?>
		</div>
		<?php include 'foot.php';
			  include 'js.php';
			  include 'announcementmodals.php'; ?>
		</div>
	</body>
</html>