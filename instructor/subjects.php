
<div id="bbox" class="bb-alert alert alert-info" style="display:none; left: 80%; bottom: 10%;">
        <span>The examples populate this alert with dummy content</span>
</div>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="list">
					<!-- TableStart -->
						<div class="box-header">
							<h3 class="box-title">Sections Found</h3>
						</div>
						<div class="box-body">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<?php 
                					$studentList = array();
                					$count = 0;
                					$total = 0;
                $ID = $_SESSION['ID'];
                $con = mysql_connect("localhost", "root", "");
                $db = mysql_select_db("enrollment", $con);
                $query = "SELECT *  FROM `subject12016` where `ProfID` = '$ID'";
                $result = mysql_query($query,$con);
                $blockResult = "";
                while ($row = mysql_fetch_assoc($result)) {
                	$sid = $row['SID'];
                ?>
                <!-- --------------------------------------------------------------------------------- -->
  					<div class="panel panel-default">
    					<div class="panel-heading" role="tab" id="<?php echo $row['Section'];?>heading">
      						<h4 class="panel-title">
        						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $row['SCode']."-".$row['Section'];?>" aria-expanded="true" aria-controls="collapseOne">
          							<?php echo $row['SCode']." - ".$row['Section'];?>
        						</a>
      						</h4>
   	 					</div>
    					<div id="<?php echo $row['SCode']."-".$row['Section'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo $row['Section'];?>heading">
      						<div class="panel-body">
      						<form>
								<table id="example1" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>Student Name</th>
											<th>Course</th>
											<th style="width: 20px;">Age</th>
											<form>
											<th style="width: 24px;">Midterm Grade</th>
											<th style="width: 24px;">Finals Grade</th>
											<th style="width: 24px;">Term Grade</th>
											<th>Remarks</th>
											</form>
										</tr>
									</thead>
									<tbody>
									<?php 
									$sec = $row['Section'];
                					$query2 = "SELECT * FROM `tempsubjects`";
                					$result2 = mysql_query($query2,$con);
                					while ($row2 = mysql_fetch_assoc($result2)) { 
                						$subs = explode("-", $row2['Subjects']);
                						for($x=0;$x<count($subs);$x++){
                							if($sid==$subs[$x]){
                								$student = $row2['ID'];
                								$query3 = "SELECT * FROM `students` WHERE `ID` = '$student'";
                								$result3 = mysql_query($query3,$con);
                								while ($row3 = mysql_fetch_assoc($result3)) {
                									$studentList[$total] = $student;
                									$total++;
                					?>
                						<tr>
                							<td><a href="#" data-toggle="modal" data-target="#prevModal<?php echo $student;?>"><?php echo $row3['FName']." ".$row3['MName']." ".$row3['LName']." ";?></a></td>
                							<td><?php echo $row3['Course'];?></td>
                							<td><?php echo $row3['Age'];?></td>
                							<?php 
                			$gradeID = $sid.$student;
			                $query4 = "SELECT * FROM `grades` WHERE `ID` = '$gradeID'";
			                $result4 = mysql_query($query4,$con);
			                while ($row4 = mysql_fetch_assoc($result4)) {?>
			                				<input type="hidden" id="gradeID<?php echo $count; ?>" value="<?php echo $gradeID; ?>" name="gradeID<?php echo $count; ?>" />
                							<td><input type="number" name="midterm<?php echo $count;?>" id='midterm<?php echo $count;?>' min='0' max='100' onchange="cmp<?php echo $count; ?>()" value="<?php echo $row4['Midterm'];?>"></td>
                							<td><input type="number" name="final<?php echo $count;?>" id='final<?php echo $count;?>' min='0' max='100' onchange="cmp<?php echo $count; ?>()" value="<?php echo $row4['Final'];?>"></td>
                							<td><input type="number" name="term<?php echo $count;?>" id="term<?php echo $count;?>" min='0' max='100' placeholder="<?php echo (($row4['Midterm']+$row4['Final'])/2);?>" ></td>
                							<td><input type="text" name="remark<?php echo $count;?>" id="remark<?php echo $count;?>"></td>
                						<?php }?>
                						</tr>
                						<?php $count++; ?>
                					<?php }}}} ?>
									</tbody>
								</table>
								<button type="reset" class="btn btn-danger">Reset</button>
								<a class="btn btn-primary btnSave" onclick="saveGrades()">Save Changes</a>
								</form>
      						</div>
    					</div>
  					</div>
                <?php } ?>
                
                <?php 
                
                					for($x=0;$x<$count;$x++){ ?>
                					<script>
												function cmp<?php echo $x; ?>() {
													var mgrade = $("#midterm<?php echo $x;?>").val();
													var fgrade = $("#final<?php echo $x;?>").val();
													var total = (parseInt(mgrade)+parseInt(fgrade));
													total = parseInt(total/2);
													$("#term<?php echo $x;?>").attr('placeholder',total);
													var rem = "";
													if(total>=60 && total<=63){
														rem = '3.0';
													}
													else if(total>=64 && total<=67){
														rem = '2.75';
													}
													else if(total>=68 && total<=72){
														rem = '2.5';
													}
													else if(total>=73 && total<=77){
														rem = '2.25';
													}
													else if(total>=78 && total<=83){
														rem = '2.0';
													}
													else if(total>=84 && total<=88){
														rem = '1.75';
													}
													else if(total>=89 && total<=92){
														rem = '1.5';
													}
													else if(total>=93 && total<=96){
														rem = '1.25';
													}
													else if(total>=97){
														rem = '1.0';
													}
													if(rem==''){
														rem += '5.0 - Failed';
													}
													else{
														rem += ' - Passed';
													}
													$("#remark<?php echo $x;?>").attr('placeholder',rem);
												}
											</script>
                						<script>
                						document.getElementById("remark<?php echo $x;?>").disabled = true;
                						document.getElementById("term<?php echo $x;?>").disabled = true;
                						</script>
                				<?php 	}?>
				</div>
						</div>
					</div>
				</div>	
				<!-- TableEnd -->
			</div>
		</div>
</section>

            		<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<?php
$list = array_unique($studentList);
for($x=0;$x<count($list);$x++){
	$con = mysql_connect("localhost", "root", "");
	$db = mysql_select_db("enrollment", $con);
	$query = "SELECT *  FROM `students` where `ID` = '$studentList[$x]'";
	$result = mysql_query($query,$con);
	$blockResult = "";
	while ($row = mysql_fetch_assoc($result)) {

		$query2 = "SELECT *  FROM `accounts` where `ID` = '$studentList[$x]'";
		$result2 = mysql_query($query2,$con);
		$email = "";
		while ($row2 = mysql_fetch_assoc($result2)) {
			$email = $row2['email'];
		}
?>

<div class="modal fade" id="prevModal<?php echo $studentList[$x];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<b><span aria-hidden="true">&times;</span></b>
					<b><span class="sr-only">Close</span></b>
				</button>
			<br>
			</div>
			<div class="modal-body">
				<!-- ---------------------------------------------------------------------------------------------- -->
				<div class="box box-widget widget-user-2">
            		<div class="widget-user-header bg-aqua">
              			<div class="widget-user-image">
              			<?php 
		if($row['Picture']!=""){
			$pic = $row['Picture'];
		}
		else{
			$pic = strtolower($row['Gender']).".jpg";
		}
              			?>
                			<img class="img-circle" src="../accounts/<?php echo $pic;?>" alt="User Avatar">
              			</div>
              			<h3 class="widget-user-username"><?php echo $row['FName']." ".$row['MName']." ".$row['LName'];?></h3>
              			<h5 class="widget-user-desc"><?php echo $row['Course'];?></h5>
              			<br>
            		</div>
            		<div class="box-body no-padding">
              			<ul class="nav nav-stacked">
                			<li><a href="#">Year Level <span class="pull-right "><?php echo $row['Year'];?> Year</span></a></li>
                			<li><a href="#">Age <span class="pull-right "><?php echo $row['Age'];?></span></a></li>
                			<li><a href="#">Gender <span class="pull-right "><?php echo $row['Gender'];?></span></a></li>
                			<li><a href="#">Email-Address <span class="pull-right"><?php echo $email;?></span></a></li>
                			<li><input id="show<?php echo $studentList[$x];?>" type="button" class="btn btn-primary btn-block" value="Quick Message"/></li>
              			</ul>
            		</div>
            		<div class="alert alert-info alert-dismissible" id="success<?php echo $studentList[$x];?>" style="display: none;">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                			<b><span aria-hidden="true">&times;</span></b>
							<b><span class="sr-only">Close</span></b>
						</button>
                		<h4><i class="icon fa fa-info"></i> Success!</h4>
                		Message Sent to <?php echo $row['FName']." ".$row['MName']." ".$row['LName'];?>
              		</div>
            		<div class="box-footer no-padding" id="quickmessage<?php echo $studentList[$x];?>" style="display: none;">
            			<form>
            				<textarea id="mes<?php echo $studentList[$x];?>" name="mes<?php echo $studentList[$x];?>" class="form-control textarea" style="height: 200px" placeholder="Your Message................" ></textarea>
            				<div class="row">
            					<div class="col-md-6">
            						<input type="reset" class="btn btn-danger btn-block" />
            					</div>
            					<div class="col-md-6">
            						<input id="send<?php echo $studentList[$x];?>" class="btn btn-primary btn-block" value="Send">
            					</div>
            				</div>
            			</form>
            		</div>
            		<script>
            		$(document).ready(function(){
            			$("#show<?php echo $studentList[$x];?>").click(function(){
            				document.getElementById("show<?php echo $studentList[$x];?>").style.display = "none";
    						document.getElementById("quickmessage<?php echo $studentList[$x];?>").style.display = "block";
            			});
            			$("#send<?php echo $studentList[$x];?>").click(function(){
    						document.getElementById("quickmessage<?php echo $studentList[$x];?>").style.display = "none";
    						document.getElementById("success<?php echo $studentList[$x];?>").style.display = "block";
                			var sen = '<?php echo $_SESSION['ID'];?>';
                			var mes = $("#mes<?php echo $studentList[$x];?>").val();
							var to = '<?php echo $studentList[$x];?>';
							var sub = 'Message';
            				$.post("sendmessage.php", {
        						sen: sen,
        						mes: mes,
        						to: to,
        						sub: sub
        					}, function(data) {
        						
        					});
            			});
            		});
            		</script>
          		</div>
				<!------------------------------------------------------------------------------------------------  -->
			</div>
		</div>
	</div>
</div>
<?php }} ?>