<div id="bbox" class="bb-alert alert alert-info" style="display:none; left: 80%; bottom: 10%;">
        <span>The examples populate this alert with dummy content</span>
</div>
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<ul class="nav nav-pills nav-justified">
  					<li role="presentation" class="active">
  						<a href="#list" aria-controls="list" role="tab" data-toggle="tab">Block Enrollment</a>
  					</li>
  					<li role="presentation">
  						<a href="#addEdit" aria-controls="addEdit" role="tab" data-toggle="tab">Free Enrollment</a>
  					</li>
  					<li role="presentation">
  						<a href="#mySubjects" aria-controls="mySubjects" role="tab" data-toggle="tab">mySubjects</a>
  					</li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="list">
					<!-- TableStart -->
						<div class="box-header">
							<h3 class="box-title">Sections Found</h3>
						</div>
						<div class="box-body">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<?php 
                					$tlab = 0;
                					$tlec = 0;
                $con = mysql_connect("localhost", "root", "");
                $db = mysql_select_db("enrollment", $con);
                $query = "SELECT DISTINCT `Section`,`Count` FROM `subject12016` where `Count` < '40' AND `Section` LIKE '%SE%'";
                $result = mysql_query($query,$con);
                $ID = "";
                $blockResult = "";
                while ($row = mysql_fetch_assoc($result)) { ?>
                <!-- --------------------------------------------------------------------------------- -->
  					<div class="panel panel-default">
    					<div class="panel-heading" role="tab" id="<?php echo $row['Section'];?>heading">
      						<h4 class="panel-title">
        						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $row['Section'];?>" aria-expanded="true" aria-controls="collapseOne">
          							<?php echo $row['Section'];?>
        						</a>
      						</h4>
   	 					</div>
    					<div id="<?php echo $row['Section'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo $row['Section'];?>heading">
      						<div class="panel-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Subject Code</th>
											<th>Subject Name</th>
											<th>Units</th>
											<th>Room</th>
											<th>Time</th>
											<th>Day</th>
											<th>Slots</th>
											<th>Instructor</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$sec = $row['Section'];
                					$query2 = "SELECT * FROM `subject12016` JOIN `instructor` ON `subject12016`.`ProfID` = `instructor`.`ID` JOIN `subject_info` ON `subject12016`.`SCode` = `subject_info`.`SCode` WHERE `Section` = '$sec'";
                					$result2 = mysql_query($query2,$con);
                					while ($row2 = mysql_fetch_assoc($result2)) { 
                					$blockResult .= $row2['SID']."-"?>
                						<tr>
                							<td><?php echo $row2['SCode'];?></td>
                							<td><?php echo $row2['Subject Name'];?></td>
                							<td><?php echo $row2['Lab']+$row2['Lec'];?></td>
                							<td><?php echo $row2['Room'];?></td>
                							<td><?php echo $row2['Time'];?></td>
                							<td><?php echo $row2['Day'];?></td>
                							<td><?php echo 40-$row2['Count'];?></td>
                							<td><?php echo $row2['FName']." ".$row2['MName']." ".$row2['LName']." ";?></td>
                						</tr>
                					<?php }$idres = $_SESSION["ID"];?>
									</tbody>
									
      								<input type="hidden" id="<?php echo $row['Section'];?>result" name="blockEnroll" value="<?php echo $blockResult.$idres;?>" />
								</table>
								<a href="javascript:{}" onclick="registerSubjects<?php echo $row['Section'];?>()" class="btn btn-primary btn-block"><span>Enroll In <?php echo $row['Section'];?></span></a>
								<script>
									function registerSubjects<?php echo $row['Section'];?>() {
										var res = $("#<?php echo $row['Section'];?>result").val();
										var sec = "<?php echo $row['Section'];?>";
										$.post("registersubjects.php", {
											res: res
										}, function(data) {
											Example.show("<h3>Enrolled in " + sec + "</h3><br>Conflicting subjects will be automatically removed");

											setTimeout(function(){ window.location.reload();}, 2000);
											});
									}
								</script>
								<?php  $blockResult = "";?>
      						</div>
    					</div>
  					</div>
                <!-- --------------------------------------------------------------------------------- -->
                <?php } ?>
                	
				</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="addEdit">
					<!-- -- -->
					<div class="box-header">
							<h3 class="box-title">Subjects Found</h3>
						</div>
						<div class="box-body">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<form>
							<?php 
                $con = mysql_connect("localhost", "root", "");
                $db = mysql_select_db("enrollment", $con);
                $query4 = "SELECT DISTINCT `subject_info`.`SCode`,`Count`,`Subject Name` FROM `subject12016` JOIN `subject_info` ON `subject12016`.`SCode` = `subject_info`.`SCode` where `Count` < '40'";
                $result4 = mysql_query($query4,$con);
                while ($row4 = mysql_fetch_assoc($result4)) { $a=0; ?>
                <!-- --------------------------------------------------------------------------------- -->
  					<div class="panel panel-default">
    					<div class="panel-heading" role="tab" id="<?php echo $row4['SCode'];?>heading">
      						<h4 class="panel-title">
        						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $row4['SCode'];?>" aria-expanded="true" aria-controls="collapseOne">
          							<?php echo $row4['Subject Name'];?>
        						</a>
      						</h4>
   	 					</div>
    					<div id="<?php echo $row4['SCode'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo $row4['SCode'];?>heading">
      						<div class="panel-body">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>&nbsp;</th>
											<th>Subject Code</th>
											<th>Section</th>
											<th>Units</th>
											<th>Room</th>
											<th>Time</th>
											<th>Day</th>
											<th>Instructor</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$sec = $row4['SCode'];
                					$query2 = "SELECT * FROM `subject12016` JOIN `instructor` ON `subject12016`.`ProfID` = `instructor`.`ID` JOIN `subject_info` ON `subject12016`.`SCode` = `subject_info`.`SCode` WHERE `subject_info`.`SCode` = '$sec'";
                					$result2 = mysql_query($query2,$con);
                					$subj = "";
                					$counter = 0;
                					while ($row2 = mysql_fetch_assoc($result2)) {	 
                					$subj = $row2['SID'].$row2['SCode'];
                					$blockResult .= $row2['SID']."-"?>
                						<tr>
                							<td>
                								<div class="radio radio-success">
                                					<input type="radio" name="<?php echo $row2['Subject Name'];?>" id="<?php echo $row2['SCode'].$counter;?>" value="<?php echo $row2['SID'];?>" <?php if($a==0){?> checked <?php } ?>>
                              	  					<label for="radio3"></label>
                            					</div>
                            				</td>
                							<td><?php echo $row2['SCode'];?></td>
                							<td><?php echo $row2['Section'];?></td>
                							<td><?php echo $row2['Lab']+$row2['Lec'];?></td>
                							<td><?php echo $row2['Room'];?></td>
                							<td><?php echo $row2['Time'];?></td>
                							<td><?php echo $row2['Day'];?></td>
                							<td><?php echo $row2['FName']." ".$row2['MName']." ".$row2['LName']." ";?></td>
                						</tr>
                					<?php $counter++;}?>
									</tbody>
								</table>
								<input type="button" id="btn<?php echo $subj;?>" class="btn btn-block btn-primary" value="Add">
								<script>
								$("#btn<?php echo $subj;?>").click(function(){
									var selected = '';
									var id = '<?php echo $_SESSION['ID'];?>';
									for (var i = 0; i < <?php echo $counter?>; i++ ) { 
										if ($("#<?php echo $row4['SCode'];?>"+i).prop("checked")) {
											selected =  $("#<?php echo $row4['SCode'];?>"+i).val();
										}
									}
									$.post("addfreesubject.php", {
										id: id,
										selected: selected
									}, function(data) {
										$('#bbox').removeClass('alert-danger');
							        	$('#bbox').addClass('alert-info');
										if(data == 'Exceed'){
											$('#bbox').removeClass('alert-info');
								        	$('#bbox').addClass('alert-danger');
											Example.show('Student has already exceeded the max number of units available');
										}
										else if(data == 'Success'){
											Example.show('Subject Added = ' + selected);
										}
										else{
											$('#bbox').removeClass('alert-info');
								        	$('#bbox').addClass('alert-danger');
											Example.show('Conflict Found : ' + data);
										}
										
									});
								});
								</script>
      						</div>
    					</div>
  					</div>
                <!-- --------------------------------------------------------------------------------- -->
                <?php $a++;} ?>
                		<br>
						<div class="row">
              				<div class="col-xs-6">
              					<button type="reset" id="resSubjects" class="btn btn-danger btn-block">Reset</button>
              				</div>
              				<div class="col-xs-6">
              					<button type="button" id="regSubjects" class="btn btn-success btn-block">Register Subjects</button>
              				</div>
              			</div>
                	</form>
				</div>
						</div>
					<!--  -->
					</div>
					<!-- ---------------------------------------------------------------------------------- -->
					<div role="tabpanel" class="tab-pane fade" id="mySubjects">
						<!--  -->
						<hr class="divider">
            				<div class="row">
            					<div class="col-md-10 col-md-offset-1">
              						<div class="box box-info">
            							<div class="box-header with-border">
              								<h3 class="box-title" style=" display: block; text-align: center;">My Subjects</h3>
            							</div>
            							<div class="box-body">
            								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th></th>
											<th>Subject Code</th>
											<th>Subject Name</th>
											<th>Section</th>
											<th>Room</th>
											<th>Time</th>
											<th>Day</th>
											<th>Units</th>
											<th>Instructor</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$con = mysql_connect("localhost", "root", "");
               		 				$db = mysql_select_db("enrollment", $con);
									$sec = $row['Section'];

									$query3 = "SELECT * FROM `tempsubjects` WHERE `ID` = '$idres'";
									$result3 = mysql_query($query3,$con);
									$subjects = "";
									while ($row3 = mysql_fetch_assoc($result3)) {
										$subjects = $row3['Subjects'];
									}
									$subs = explode("-", $subjects);
                					$total = 0;
									for($x=0;$x<count($subs);$x++){
                					$query2 = "SELECT * FROM `subject12016` JOIN `instructor` ON `subject12016`.`ProfID` = `instructor`.`ID` JOIN `subject_info` ON `subject12016`.`SCode` = `subject_info`.`SCode` WHERE `SID` = '$subs[$x]'";
                					$result2 = mysql_query($query2,$con);
                					while ($row2 = mysql_fetch_assoc($result2)) { 
                						$tlab += $row2['Lab'];
                						$tlec += $row2['Lec'];
                						?>
                						<tr>
                							<td>
                								<div class="squaredOne" style=" margin-left:0px;margin-right:0px;margin-bottom:0px;margin-top:0px;">
													<input type="checkbox" name="subjectsCheckbox" value="<?php echo $subs[$x];?>" id="<?php echo $subs[$x];?>" style="visibility: hidden" />
													<label for="<?php echo $subs[$x];?>"></label>
												</div>
											</td>
                							<td><?php echo $row2['SCode'];?></td>
                							<td><?php echo $row2['Subject Name'];?></td>
                							<td><?php echo $row2['Section'];?></td>
                							<td><?php echo $row2['Room'];?></td>
                							<td><?php echo $row2['Time'];?></td>
                							<td><?php echo $row2['Day'];?></td>
                							<?php $total += $row2['Lab']+$row2['Lec'];?>
                							<td><?php echo $row2['Lab']+$row2['Lec'];?></td>
                							<td><?php echo $row2['FName']." ".$row2['MName']." ".$row2['LName']." ";?></td>
                						</tr>
                					<?php }}?>
									</tbody>
									<tfoot>
        	        				<tr>
										<th colspan="6" style="text-align: right;">Total Units : </th>
										<th><?php echo $total;?>/21</th>
										<?php  $totalAmount = ($tlec * 1950) + 15600 + ($tlab * 3500); ?>
										<th colspan="1" style="text-align: right;">Total :</th>
										<th>PHP <?php echo number_format($totalAmount);?></th>
									</tr>
								</tfoot>
								</table>
								<br>
								<div class="row">
									<div class="col-md-2">
										<a href="#" id="remSubjects" class="btn btn-danger"><span>Remove Selected</span></a>
									</div>
									<div class="col-md-3">
										<a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#assessmentModal"><span>View Assessment</span></a>
									</div>
								</div>
            							</div>
									</div>
								</div>
								<div class="col-md-2 col-md-offset-6">
									<a href="javascript:{}" onclick="resetSubjects()" class="btn btn-danger btn-block"><span>Reset</span></a>
								<script>
									function resetSubjects() {
										setTimeout(function(){ window.location.reload();}, 1000);
										var res = <?php echo $_SESSION['ID'];?>;
										$.post("resetSubjects.php", {
											res: res
										}, function(data) {
											
										});
									}
								</script>
								</div>
								<div class="col-md-3">
									<a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#paymentModal"><span>Proceed to Payment</span></a>
								</div>
							</div>
						<div class="row">
						
								<br>
						</div>
					<!--  -->
					</div>
					<!-- ---------------------------------------------------------------------------------- -->
				</div>	
				<!-- TableEnd -->
			</div>
		</div>
	</div>
</section>


<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h2 class="modal-title" id="myModalLabel"><b>Payment Method</b></h2>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<ul class="nav nav-tabs" role="tablist">
    						<li role="presentation" class="active"><a href="#Cash" aria-controls="home" role="tab" data-toggle="tab">Cash</a></li>
    						<li role="presentation"><a href="#Card" aria-controls="profile" role="tab" data-toggle="tab">Card</a></li>
  						</ul>
  						<div class="tab-content">
  						<br>
  							<div class="row">
    							<div class="col-md-12">
    							<!--  -->
    							<!--  -->
<input type="hidden" name="total" id="total" value="<?php echo $totalAmount;?>"/>
    							</div>
    						</div>
    						<div role="tabpanel" class="tab-pane active" id="Cash">
    							<form>		
    								<div class="row">
    									<div class="col-md-12">
    										<input type="number" id="amount" name="amount" class="form-control" placeholder="Amount" min="10000" required/>
    									</div>
    								</div>
    								<br>
    								<div class="row">
    									<div class="col-md-12">
    										<a href="#" id="cashSubmit" class="btn btn-primary btn-block"><span>Confirm Payment</span></a>
    									</div>
    								</div>
    							</form>
    						</div>
    						<div role="tabpanel" class="tab-pane" id="Card">
    							<form>		
    								<div class="row">
    									<div class="col-md-12">
    										<div class="input-group">
 								 				<input type="text" class="form-control" name="cnumber" id="cnumber" placeholder="Card Number">
  												<span class="input-group-addon">
  												<i id="cc-default" class="fa fa-credit-card"></i>
  												<i id="cc-visa" class="fa fa-cc-visa" style="display:none"></i>
  												<i id="cc-master" class="fa fa-cc-mastercard" style="display:none"></i>
  												<i id="cc-amex" class="fa fa-cc-amex" style="display:none"></i>
  												<i id="cc-diners" class="fa fa-cc-diners-club" style="display:none"></i>
  												<i id="cc-jcb" class="fa fa-cc-jcb" style="display:none"></i>
  												<i id="cc-discover" class="fa fa-cc-discover" style="display:none"></i>
  												</span>
											</div>
    									</div>
    								</div>
    								<br>
    								<div class="row">
    									<div class="col-md-12">
    										<input type="number" id="camount" name="camount" class="form-control" placeholder="Amount" min="10000" required/>
    									</div>
    								</div>
    								<br>
    								<div class="row">
    									<div class="col-md-12">
    										<a href="#" id="cardSubmit" class="btn btn-primary btn-block"><span>Confirm Payment</span></a>
    									</div>
    								</div>
    							</form>
    						</div>
  						</div>
  					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="assessmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header" style="text-align: center;">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h2 class="modal-title" id="myModalLabel"><b>Assessment Summary</b></h2>
			</div>
			<div class="modal-body">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="SE11heading">
        					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#SE11" aria-expanded="true" aria-controls="collapseOne">
          						Tuition Fee
          					</a>
          					<a style="text-align: right; float:right;">
          						PHP <?php echo number_format($tlec * 1950); ?>
          					</a>
   	 					</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="SE11heading">
        					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#SE11" aria-expanded="true" aria-controls="collapseOne">
          						Laboratory Fee
          					</a>
          					<a style="text-align: right; float:right;">
          						PHP <?php echo number_format($tlab * 3500); ?>
          					</a>
   	 					</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="mischeading">
        					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#misc" aria-expanded="true" aria-controls="collapseOne">
          						Miscalleneous Fee
          					</a>
          					<a style="text-align: right; float:right;">
          						PHP 15,600
          					</a>
   	 					</div>
    					<div id="misc" class="panel-collapse collapse" role="tabpanel" aria-labelledby="mischeading">
    						<table class="table table-hover">
								<tbody>
        				<tr>
        					<td>  Athletic Fee</td>
        					<td>PHP 500</td>
        				</tr>
        				<tr>
        					<td>  Auidio Visual</td>
        					<td>PHP 1,500</td>
        				</tr>
        				<tr>
        					<td>  Energy Fee</td>
        					<td>PHP 3,500</td>
        				</tr>
        				<tr>
        					<td>  Guidance Fee</td>
        					<td>PHP 1,000</td>
        				</tr>
        				<tr>
        					<td>  Health Services</td>
        					<td>PHP 600</td>
        				</tr>
        				<tr>
        					<td>  ID Validation</td>
        					<td>PHP 100</td>
        				</tr>
        				<tr>
        					<td>  Insurance</td>
        					<td>PHP 100</td>
        				</tr>
        				<tr>
        					<td>  Internet</td>
        					<td>PHP 1,500</td>
        				</tr>
        				<tr>
        					<td>  Library Fee</td>
        					<td>PHP 1,200</td>
        				</tr>
        				<tr>
        					<td>  Learning Materials</td>
        					<td>PHP 1,500</td>
        				</tr>
        				<tr>
        					<td>  Registration</td>
        					<td>PHP 500</td>
        				</tr>
        				<tr>
        					<td>  Student Activity</td>
        					<td>PHP 1,500</td>
        				</tr>
        				<tr>
        					<td>  Student Development</td>
        					<td>PHP 1,500</td>
        				</tr>
        				<tr>
        					<td>  Student Organization</td>
        					<td>PHP 400</td>
        				</tr>
        				<tr>
        					<td>  Student Publication</td>
        					<td>PHP 200</td>
        				</tr>
        				<tr>
        					<th>  Total Miscalleneous</th>
        					<th>PHP 15,600</th>
        				</tr>
								</tbody>
							</table>
    					</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="SE11heading">
							<b>
	        					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#SE11" aria-expanded="true" aria-controls="collapseOne">
	          						Total Fee
	          					</a>
	          					<a style="text-align: right; float: right;">
	          						PHP <?php echo number_format($totalAmount);?>
	          					</a>
	          				</b>
	   	 				</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>