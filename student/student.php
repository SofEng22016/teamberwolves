<div id="bbox" class="bb-alert alert alert-info" style="display:none; left: 80%; bottom: 10%;">
        <span>The examples populate this alert with dummy content</span>
</div>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<ul class="nav nav-pills nav-justified">
  					<li role="presentation" class="active">
  						<a href="#list" aria-controls="list" role="tab" data-toggle="tab">List</a>
  					</li>
  					<li role="presentation">
  						<a href="#addEdit" aria-controls="addEdit" role="tab" data-toggle="tab">Add Student</a>
  					</li>
  					<li role="presentation" class="disabled">
  						<a href="#info" aria-controls="info" role="tab" data-toggle="tab">Search / Edit / Delete</a>
  					</li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="list">
					<!-- TableStart -->
						<div class="box-header">
							<h3 class="box-title">List of Students</h3>
						</div>
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Full Name</th>
										<th>Birthdate</th>
										<th>Age</th>
										<th>Gender</th>
										<th>Year</th>
										<th>Type</th>
										<th>Course</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>2010479131</td>
										<td>Bryce Francis Quintano Deyto</td>
										<td>1994-02-07</td>
										<td>22</td>
										<td>Male</td>
										<td>Second Year</td>
    		        	      			<td>Regular</td>
            			      			<td>BS-CS-SE</td>
            	    		  			<td><span class='label label-info'>BRYCE</span></td>
            	   					</tr>
 		           	    <?php include 'names.php';
            	    for($x=1;$x<=rand(100, 200);$x++){
               	 	$nme = "";
               	 	$gen = rand(0, 1);
               	 	$scnd = rand(0, 1);
              	  	$stat = rand(0, 10);
               	 	$type = rand(0, 10);
               	 	$yr =  rand(1990, 1998);
               	 	$mnth =  rand(1, 12);
                	$dy =  rand(1, 28);
               	 	$birthDate = $yr."-".$mnth."-".$dy;
               	 	$birthDate2 = $yr."-".$mnth."-".$dy;
               	 	$years = array("First","Second","Third","Fourth");
               	 	$year = $years[rand(0, 3)]." Year";
               	 	$courses = array("CS-SE","GD","IT-WD","Anim","MMA","FD","BA-FM","BA-MA");
               	 	$course = $courses[rand(0, 7)];
               	 	$birthDate = explode("-", $birthDate);
               	 	$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
               	 			? ((date("Y") - $birthDate[0]) - 1)
               	 			: (date("Y") - $birthDate[0]));
               	 	$id = 2012 + rand(0, 3);
               	 	$id *= 1000000;
               	 	for($a=0;$a<6;$a++){
               	 		$mult = 1;
               	 		for($b=0;$b<$a;$b++){
              	 	 			$mult *= 10;
               	 		}
                			$id += ( rand(1, 9) * ($mult));
                		}
               	 	for($y=0;$y<$scnd+1;$y++){
               	 		$nme .= $name[$gen][rand(0, count($name[$gen])-1)];
               	 		$nme .= " ";
               	 	}
               	 	$nme .= $name[2][rand(0, count($name[2])-1)];
               	 	if($gen==0){
                		$gen = "Female";
               	 	}
               	 	else{
               	 		$gen = "Male";
              	  	}
               	 	if($type==0){
               	 		$type = "Transferee";
                	}
               	 	else if($type>1 && $type<4){
               	 		$type = "Irregular";
              	  	}
               	 	else{
               	 		$type = "Regular";
                	}
               	 	
               	 ?>
        		   	    	 		<tr>
               				   			<td><a href="#"><?php echo $id; ?></a></td>
              	   			 			<td><?php echo $nme; ?></td>
               	   						<td><?php echo $birthDate2; ?></td>
               		  					<td><?php echo $age; ?></td>
               	   						<td><?php echo $gen; ?></td>
               				  			<td><?php echo $year;?></td>
               	  						<td><?php echo $type;?></td>
               			  				<td><?php echo $course;?></td>
               		  <?php 
               		  echo "<th>";
              	 	  if($stat==0){
              	 	  	echo "<span class='label label-danger'>Disabled</span>";
               		  }
               		  else if($stat>1 && $stat<4){
               		  	echo "<span class='label label-warning'>Pending</span>";
               		  }
               		  else{
               		  	echo "<span class='label label-success'>Activated</span>";
              	 	  }
               		  "</th>";
               	  ?>
      		        	  			</tr>
        	        		<?php  } ?>
        	        				</tbody>
        	        				<tfoot>
        	        					<tr>
        	          						<th>ID</th>
        	          						<th>Full Name</th>
        	         		 				<th>Birthdate</th>
        	       	  						<th>Age</th>
        	          						<th>Gender</th>
        	       	  						<th>Year</th>
        	       	  						<th>Type</th>
        	       	  						<th>Course</th>
        	       	  						<th>Status</th>
										</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="addEdit">
						<!--  -->
						<hr class="divider">
            			<div class="row">
            				<div class="col-md-10 col-md-offset-1">
              					<div class="box box-info">
            						<div class="box-header with-border">
              							<h3 class="box-title" style=" display: block; text-align: center;">Add New Student</h3>
            						</div>
            						<form id="addStudent" name="form" role="form">
            							<div class="box-body">
            								<div class="form-group">
            									<?php include 'countaccounts.php'; ?>
            									<label class="control-label">ID Number :</label>
            									<div class="row">
            										<div class="col-xs-4">
                  										<input type="text" id="idval" name="idval" class="form-control disabled" placeholder="<?php echo $IDval; ?>">
                									</div>
            									</div>
            								</div>				
              								<div class="row">
                								<div class="col-xs-4">
                  									<input type="text" name="fnameval" id="fnameval" class="form-control" placeholder="First Name">
                								</div>
                								<div class="col-xs-4">
                  									<input type="text" name="mnameval" id="mnameval" class="form-control" placeholder="Middle Name">
                								</div>
                								<div class="col-xs-4">
                  									<input type="text" name="lnameval" id="lnameval" class="form-control" placeholder="Last Name">
                								</div>
              								</div>
              								<br>
              								<div class="row">
              									<div class="col-xs-8">
                  									<input type="text" name="emailval" id="emailval" class="form-control" placeholder="Email Address">
                								</div>
                								<div class="col-xs-4">
                									<span style="margin-top: -12px;">
														<input id="switchGender" name="switchGender" type="checkbox" checked="true" class="BSswitch" data-on-color="info" data-off-color="danger" data-on-text="Male" data-off-text="Female">
													</span>
                								</div>
              								</div>
              								<br>
              								<!--  -->
              								<div class="row">
              									<div class="col-xs-4">
                  									<input type="text" name="courseval" id="courseval" class="form-control" placeholder="Course">
                								</div>
                								<div class="col-xs-4">
                  									<input type="text" name="yearval" id="yearval" class="form-control" placeholder="Year Level">
                								</div>
                								<div class="col-xs-4">
                  									<input type="date" name="birthval" id="birthval" class="form-control">
                								</div>
              								</div>
              								<br>
              								<!--  -->
              								<div class="row">
              									<div class="col-xs-12">
                    								<a href="#" data-bb="prompt_default_value" class="btn btn-primary btn-block">Add Instructor</a>
              									</div>
              								</div>
            							</div>
            						</form>
								</div>
							</div>
						</div>
					<!--  -->
					</div>
				</div>	
				<!-- TableEnd -->
			</div>
		</div>
	</div>
</section>