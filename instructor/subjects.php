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
                					$count = 0;
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
                					?>
                						<tr>
                							<td><?php echo $row3['FName']." ".$row3['MName']." ".$row3['LName']." ";?></td>
                							<td><?php echo $row3['Course'];?></td>
                							<td><?php echo $row3['Age'];?></td>
                							<td><input type="number" name="midterm<?php echo $count;?>" id='midterm<?php echo $count;?>' min='0' max='100' onchange="cmp<?php echo $count; ?>()" placeholder="0"></td>
                							<td><input type="number" name="final<?php echo $count;?>" id='final<?php echo $count;?>' min='0' max='100' onchange="cmp<?php echo $count; ?>()" placeholder="0"></td>
                							<td><input type="number" name="term<?php echo $count;?>" id="term<?php echo $count;?>" min='0' max='100' placeholder="0"></td>
                							<td><input type="text" name="remark<?php echo $count;?>" id="remark<?php echo $count;?>"></td>
                						</tr>
                						<?php $count++; ?>
                					<?php }}}}
                					for($x=0;$x<$count;$x++){ ?>
                					<script>
												function cmp<?php echo $x; ?>() {
													var mgrade = $("#midterm<?php echo $x;?>").val();
													var fgrade = $("#final<?php echo $x;?>").val();
													var total = (parseInt(mgrade)+parseInt(fgrade));
													total = parseInt(total/2);
													$("#term<?php echo $x;?>").attr('placeholder',total);
													var rem = "";
													if(total>=0 && total<=59){
														rem = 'Failed';
													}
													else if(total>=60 && total<=63){
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
													$("#remark<?php echo $x;?>").attr('placeholder',rem);
												}
											</script>
                						<script>
                						document.getElementById("remark<?php echo $x;?>").disabled = true;
                						document.getElementById("term<?php echo $x;?>").disabled = true;
                						</script>
                				<?php 	}?>
									</tbody>
								</table>
								
      						</div>
    					</div>
  					</div>
                <?php } ?>
                	
				</div>
						</div>
					</div>
				</div>	
				<!-- TableEnd -->
			</div>
		</div>
</section>
