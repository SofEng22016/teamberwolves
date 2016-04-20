<?php 
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `accounts`";
$result = mysql_query($query,$con);
$students = 0;
$guests = 0;
$professors = 0;
while ($row = mysql_fetch_assoc($result)) { 
	if($row['Type']=='Student'){
		$students++;
	}
	else if($row['Type']=='Guest'){
		$guests++;
	}
	else if($row['Type']=='Prof'){
		$professors++;
	}
}
$messages = 0;
$attachments = 0;
$query = "SELECT * FROM `messages`";
$result = mysql_query($query,$con);
while ($row = mysql_fetch_assoc($result)) {
	$messages++;
}
$query = "SELECT * FROM `messages` WHERE `fileSize` > '0'";
$result = mysql_query($query,$con);
while ($row = mysql_fetch_assoc($result)) {
	$attachments++;
}
$amount = 0;
$query = "SELECT * FROM `transactions`";
$result = mysql_query($query,$con);
while ($row = mysql_fetch_assoc($result)) {
	$amount+= $row['Amount'];
}
$events = 0;
$query = "SELECT * FROM `events`";
$result = mysql_query($query,$con);
while ($row = mysql_fetch_assoc($result)) {
	$events++;
}
$resources = 0;
$query = "SELECT * FROM `resources`";
$result = mysql_query($query,$con);
while ($row = mysql_fetch_assoc($result)) {
	$resources+=$row['FileCount'];
}
$subjects = 0;
$query = "SELECT * FROM `subject_info`";
$result = mysql_query($query,$con);
while ($row = mysql_fetch_assoc($result)) {
	$subjects++;
}
?>
	<section class="content">
		<div class="row">
        	<div class="col-md-3 col-sm-6 col-xs-12">
            	<div class="info-box">
            		<span class="info-box-icon bg-aqua"><i class="ion ion-ios-people"></i></span>
            		<div class="info-box-content">
              			<span class="info-box-text">Students</span>
              			<span class="info-box-number"><?php echo $students;?></span>
            		</div>
          		</div>
        	</div>
        	
        	<div class="col-md-3 col-sm-6 col-xs-12">
          		<div class="info-box">
            		<span class="info-box-icon bg-red"><i class="ion ion-android-people"></i></span>
            		<div class="info-box-content">
              			<span class="info-box-text">Professors</span>
              			<span class="info-box-number"><?php echo $professors;?></span>
            		</div>
          		</div>
        	</div>
        	
        	<div class="clearfix visible-sm-block"></div>

        	<div class="col-md-3 col-sm-6 col-xs-12">
          		<div class="info-box">
            		<span class="info-box-icon bg-green"><i class="ion ion-android-person"></i></span>
            		<div class="info-box-content">
              			<span class="info-box-text">Guests</span>
              			<span class="info-box-number"><?php echo $guests;?></span>
            		</div>
          		</div>
       		</div>
       		
        	<div class="col-md-3 col-sm-6 col-xs-12">
          		<div class="info-box">
            		<span class="info-box-icon bg-yellow"><i class="ion ion-folder"></i></span>
            		<div class="info-box-content">
              			<span class="info-box-text">Applications</span>
              			<span class="info-box-number">345</span>
            		</div>
          		</div>
        	</div>
        	
      </div>
      <div class="row">
    	<div class="col-md-4">
        	<div class="box box-danger">
            	<div class="box-header with-border">
              		<h3 class="box-title">Institutes</h3>
              		<div class="box-tools pull-right">
                		<button type="button" class="btn btn-box-tool" data-widget="collapse">
                			<i class="fa fa-minus"></i>
                		</button>
                		<button type="button" class="btn btn-box-tool" data-widget="remove">
                			<i class="fa fa-times"></i>
                		</button>
              		</div>
            	</div>
            	<div class="box-body chart-responsive">
              		<div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
            	</div>
        	</div>
    	</div>
    	<div class="col-md-8">
        	<div class="row">
        		<div class="col-md-6">
		        	<div class="info-box">
		            	<span class="info-box-icon bg-blue"><i class="fa fa-envelope"></i></span>
		            	<div class="info-box-content">
		            		<span class="info-box-text">Total Messages</span>
		            		<span class="info-box-number"><?php echo $messages;?></span>
		           		</div>
		          	</div>
    			</div>
		    	<div class="col-md-6">
		        	<div class="info-box">
		            	<span class="info-box-icon bg-red"><i class="fa fa-file"></i></span>
		            	<div class="info-box-content">
		            		<span class="info-box-text">Total Files Uploaded</span>
		            		<span class="info-box-number"><?php echo $attachments;?></span>
		           		</div>
		          	</div>
		    	</div>
        	</div>
        	<div class="row">
        		<div class="col-md-6">
		        	<div class="info-box">
		            	<span class="info-box-icon bg-yellow"><i class="fa fa-money"></i></span>
		            	<div class="info-box-content">
		            		<span class="info-box-text">Total Payments Recieved</span>
		            		<span class="info-box-number">PHP <?php echo $english_format_number = number_format($amount);?></span>
		           		</div>
		          	</div>
    			</div>
		    	<div class="col-md-6">
		        	<div class="info-box">
		            	<span class="info-box-icon bg-purple"><i class="fa fa-calendar-o"></i></span>
		            	<div class="info-box-content">
		            		<span class="info-box-text">Events</span>
		            		<span class="info-box-number"><?php echo $events;?></span>
		           		</div>
		          	</div>
		    	</div>
        	</div>
        	<div class="row">
        		<div class="col-md-6">
		        	<div class="info-box">
		            	<span class="info-box-icon bg-gray"><i class="fa fa-paperclip"></i></span>
		            	<div class="info-box-content">
		            		<span class="info-box-text">Total Resources Uploaded</span>
		            		<span class="info-box-number"><?php echo $resources;?></span>
		           		</div>
		          	</div>
    			</div>
		    	<div class="col-md-6">
		        	<div class="info-box">
		            	<span class="info-box-icon bg-orange"><i class="fa fa-book"></i></span>
		            	<div class="info-box-content">
		            		<span class="info-box-text">Total Number of Subjects</span>
		            		<span class="info-box-number"><?php echo $subjects;?></span>
		           		</div>
		          	</div>
		    	</div>
        	</div>
    	</div>
	</div>
  	</section>
