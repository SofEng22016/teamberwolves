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
        	<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Income</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="areaChart" style="height:250px"></canvas>
              </div>
              <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-light-blue"></i> Tuition Payments</li>
                    <li><i class="fa fa-circle-o text-gray"></i> Miscellaneous Payments</li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
    	</div>
	</div>
  	</section>
