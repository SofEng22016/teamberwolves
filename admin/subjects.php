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
  						<a href="#addEdit" aria-controls="addEdit" role="tab" data-toggle="tab">Add Subject</a>
  					</li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="list">
					<!-- TableStart -->
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th style="display: none;">ID</th>
										<th>Subject Code</th>
										<th>Subject Name</th>
										<th>Section</th>
										<th>Room</th>
										<th>Day</th>
										<th>Time</th>
										<th>Students</th>
										<th>Instructor</th>
									</tr>
								</thead>
								<tbody>
								<?php 
                $con = mysql_connect("localhost", "root", "");
                $db = mysql_select_db("enrollment", $con);
                $term = 1;
                $year = 2016;
                $table = "subject".$term.$year;
                $query = "SELECT * FROM `$table` JOIN `subject_info` ON `$table`.`SCode` = `subject_info`.`SCode` JOIN `instructor`
                 ON `$table`.`ProfID` = `instructor`.`ID` ORDER BY `$table`.`SID` DESC";
                $result = mysql_query($query,$con);
                while ($row = mysql_fetch_assoc($result)) { ?>
                					<tr 
                					<?php 
                					$count = 0;
                					if($row['Count']!=NULL){
                						$count = $row['Count'];
                					}
                					if($count<=20){
                						echo "class='success'";
                					}
                					else if($count<=30){
                						echo "class='warning'";
                					}
                					else{
                						echo "class='danger'";
                					}
                					?>
                					>
										<td style="display: none;"><?php echo $row['SID']; ?></td>
										<td><?php echo $row['SCode']; ?></td>
										<td><?php echo $row['Subject Name']; ?></td>
										<td><?php echo $row['Section']; ?></td>
										<td><?php echo $row['Room']; ?></td>
										<td><?php echo $row['Day']; ?></td>
										<td><?php echo $row['Time']; ?></td>
										<td><?php if($row['Count']==NULL){echo "0";}else{echo $row['Count'];}?></td>
										<td><?php echo $row['FName']." ". $row['MName']." ". $row['LName']; ?></td>
									</tr>   
                <?php }?>
        	        			</tbody>
        	        			<tfoot>
        	        				<tr>
        	          					<th style="display: none;">ID</th>
										<th>Subject Code</th>
										<th>Subject Name</th>
										<th>Section</th>
										<th>Room</th>
										<th>Day</th>
										<th>Time</th>
										<th>Students</th>
										<th>Instructor</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="addEdit">
						<!--  -->
						<hr class="divider">
            			<div class="row">
            				<div class="col-md-8 col-md-offset-2">
              					<div class="box box-info">
            						<div class="box-header with-border">
              							<h3 class="box-title" style=" display: block; text-align: center;">Add New Subject</h3>
            						</div>
            						<form id="addStudent" name="form" role="form">
            							<div class="box-body">		
              								<div class="row">
                								<div class="col-md-6">
                								<label class="control-label">&nbsp;</label>
                								<br>
                  									<select class="selectpicker" name="scode" id="scode" data-width="100%" title="Subject Name" data-size="5" data-live-search="true">
                  									<?php 
                $query = "SELECT * FROM `subject_info`";
                $result = mysql_query($query,$con);
                while ($row = mysql_fetch_assoc($result)) { ?>
  														<option data-tokens="<?php echo $row['Subject Name']; ?><?php echo $row['SCode']; ?>" value="<?php echo $row['SCode']; ?>"><?php echo $row['Subject Name']; ?></option>
  														<?php }?>
													</select>
                								</div>
              									<div class="col-md-6">
                									<label class="control-label">&nbsp;</label>
                  									<select class="selectpicker" data-width="100%" name="prof" id="prof" title="Instructor Name" data-size="5" data-live-search="true">
                  									<?php 
                $query = "SELECT * FROM `instructor`";
                $result = mysql_query($query,$con);
                while ($row = mysql_fetch_assoc($result)) { ?>
  														<option data-tokens="<?php echo $row['FName']." ".['MName']." ".$row['LName']; ?>" 
  														value="<?php echo $row['ID']; ?>">
  														<?php echo $row['FName']." ".$row['MName']." ".$row['LName']; ?></option>
  														<?php }?>
													</select>
                								</div>
              								</div>
              								<div class="row">
                					
                								<div class="col-md-3">
                								<label class="control-label">&nbsp;</label>
                  									<select class="selectpicker" data-width="100%" name="sec" id="sec" title="Section" data-size="8" data-live-search="true">
  														<?php 
  														$sections = array("SE","WD","GD","MMA","FD","A","FA","FM");
  														for($x=0;$x<count($sections);$x++){
  															for($y=1;$y<5;$y++){
  																for($z=1;$z<3;$z++){
  														$room = $sections[$x].$y.$z;
  														?>
  																<option value="<?php echo $room;?>"><?php echo $room;?></option>
  														<?php }} echo "
  																<option data-divider='true'></option>";
  														}?>
													</select>
                								</div>
                								<div class="col-md-3">
                								<label class="control-label">&nbsp;</label>
                  									<select class="selectpicker" data-width="100%" name="room" id="room" title="Room" data-size="8" data-live-search="true">
  														<?php for($x=1;$x<11;$x++){for($y=1;$y<8;$y++){
  														$room = ($x*100)+$y;
  														if($x==10){
  															$room = "Lab".$y;
  														}
  														?>
  																<option value="<?php echo $room;?>"><?php echo $room;?></option>
  														<?php } echo "
  																<option data-divider='true'></option>";}?>
													</select>
                								</div>
                								<div class="col-md-3">
                								<label class="control-label">&nbsp;</label>
                  									<select class="selectpicker" data-width="100%" name="day" id="day" title="Day" data-live-search="true">
  														<option data-tokens="M Monday" value="M">Monday</option>
  														<option data-tokens="T Tuesday" value="T">Tuesday</option>
  														<option data-tokens="W Wednesday" value="W">Wednesday</option>
  														<option data-tokens="TH Thursday" value="TH">Thursday</option>
  														<option data-tokens="F Friday" value="F">Friday</option>
  														<option data-tokens="S Saturday" value="S">Saturday</option>
													</select>
                								</div>
                								<div class="col-md-3">
                								<label class="control-label">&nbsp;</label>
                  									<input type="time" name="time" id="time" class="form-control" placeholder="Time">
                								</div>
              								</div>
              								<br>
              						
              								<!--  -->
              								<br>
              								<div class="row">
              									<div class="col-xs-6">
                    								<input type="reset" class="btn btn-danger btn-block" value="Reset">
              									</div>
              									<div class="col-xs-6">
                    								<a id="createStudent" href="#" data-bb="subject" class="btn btn-primary btn-block">Add Subject</a>
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
<div class="modal fade" id="conflictModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h2 class="modal-title" id="myModalLabel" style="text-align: center;"><b><font color="red">Conflicts Found</font></b></h2>
			</div>
			<form id="loginForm" class="form-horizontal" data-toggle="validator" name="form" role="form">
				<div class="modal-body">
					<div class="row">
					<div class="col-md-12">
							<div class="box box-danger">
            					<div class="box-header">
              						<h3 class="box-title" id="insFound" style="display: none; ">Instructor</h3>
              						<h3 class="box-title" id="rasFound" style="display: none; ">Room and Schedule</h3>
            					</div>
            					<div class="box-body">
            						<label>Room:</label>
                  					<input type="text" name="room2" id="room2" class="form-control" placeholder="Room">
            						<label>Day:</label>
                  					<input type="text" name="day2" id="day2" class="form-control" placeholder="Day">
            						<label>Time:</label>
                  					<input type="text" name="time2" id="time2" class="form-control" placeholder="Time">
            						<label>Instructor:</label>
                  					<input type="text" name="prof2" id="prof2" class="form-control" placeholder="Instructor">
            					</div>
            				</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>