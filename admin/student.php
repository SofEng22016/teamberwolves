<div id="bbox" class="bb-alert alert alert-info" style="display:none; left: 40%; right: 40%; bottom: 60%;">
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
									</tr>
								</thead>
								<tbody>
 		           	    <?php $con = mysql_connect("localhost", "root", "");
                if(! $con )
                {
                	die('Could not connect: ' . mysql_error());
                }
                $db = mysql_select_db("enrollment", $con);
                $query = "SELECT * FROM `students`";
                $result = mysql_query($query,$con);
                while ($row = mysql_fetch_assoc($result)) {
               	 ?>
        		   	    	 		<tr>
               				   			<td><a href="#"><?php echo $row['ID']; ?></a></td>
              	   			 			<td><?php echo $row['FName']." ".$row['MName']." ".$row['LName']; ?></td>
               	   						<td><?php echo $row['Birthdate']; ?></td>
               		  					<td><?php echo $row['Age']; ?></td>
               	   						<td><?php echo $row['Gender']; ?></td>
               				  			<td><?php echo $row['Year'];?> Year</td>
               	  						<td><?php echo $row['Course'];?></td>
               			  				<td><?php echo $row['Status'];?></td>
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
              										<select class="selectpicker" name="courseval" id="courseval" data-width="100%" title="Course" data-size="5" data-live-search="true">
              											<optgroup label="Computing" data-max-options="1">
                  											<option data-tokens="CS SE CS-SE Soft Eng Software Engineering" value="CS-SE">Software Engineering</option>
                  											<option data-tokens="CS WD CS-WD Web Dev Website Development" value="CS-WD">Website Development</option>
                  											<option data-tokens="CS GD CS-GD Game Dev Game Engineering" value="CS-GD">Game Development</option>
                  											</optgroup>
              											<optgroup label="Design" data-max-options="1">
                  											<option data-tokens="BA MMA Multimedia Arts" value="BA-MMA">Multimedia Arts</option>
                  											<option data-tokens="BA Animation" value="BA-Anim">Animation</option>
                  											<option data-tokens="BA Fas Des Design Fashion" value="BA-FD">Fashion Design</option>
                  											</optgroup>
              											<optgroup label="Business" data-max-options="1">
                  											<option data-tokens="BS-MM Marketing Management" value="BS-MM">Marketing Management</option>
                  											<option data-tokens="BS-FM Financial Management" value="BS-FM">Financial Management</option>
                  											</optgroup>
                  										<!-- Courses -->
                  									</select>
                								</div>
                								<div class="col-xs-4">
                  									<select class="selectpicker" name="yearval" id="yearval" data-width="100%" title="Year Level" data-size="5" data-live-search="true">
                  										<option data-tokens="1 First" value="First">First</option>
                  										<option data-tokens="2 Second" value="Second">Second</option>
                  										<option data-tokens="3 Third" value="Third">Third</option>
                  										<option data-tokens="4 Fourth" value="Fourth">Fourth</option>
                  									</select>
                								</div>
                								<div class="col-xs-4">
                  									<input type="date" name="birthval" id="birthval" class="form-control">
                								</div>
              								</div>
              								<br>
              								<!--  -->
              								<div class="row">
              									<div class="col-xs-6">
                    								<input type="reset" class="btn btn-danger btn-block" value="Reset">
              									</div>
              									<div class="col-xs-6">
                    								<a id="createStudent" href="#" data-bb="student" class="btn btn-primary btn-block">Add Student</a>
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