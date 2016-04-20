<section class="content">
	<div class="row">
		<div class="col-xs-12">
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="list">
						<div class="box-body">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<?php 
                					$count = 0;
                $ID = $_SESSION['ID'];
                $con = mysql_connect("localhost", "root", "");
                $db = mysql_select_db("enrollment", $con);
                $query = "SELECT * FROM `tempsubjects` where `ID` = '$ID'";
                $result = mysql_query($query,$con);
                $blockResult = "";
                $subjects = array();
                while ($row = mysql_fetch_assoc($result)) {
                	$subjects = explode("-",$row['Subjects']);
                }
                for($i=0;$i<count($subjects);$i++){
                	$s = $subjects[$i];
                	$query = "SELECT *  FROM `subject12016` where `SID` = '$s'";
                	$result = mysql_query($query,$con);
                	while ($row = mysql_fetch_assoc($result)) {
                ?>
                <!-- --------------------------------------------------------------------------------- -->
  					<div class="panel panel-default">
    					<div class="panel-heading" role="tab" id="<?php echo $row['Section'];?>heading">
      						<h4 class="panel-title">
        						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $row['SCode']."-".$row['Section'];?>" aria-expanded="true" aria-controls="collapseOne">
          							<?php echo $row['SCode'];?>
        						</a>
      						</h4>
   	 					</div>
    					<div id="<?php echo $row['SCode']."-".$row['Section'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo $row['Section'];?>heading">
      						<div class="panel-body">
      							<div class="row">
      								<?php 
                	$profName = "sssss";
      								$pid = $row['ProfID'];
      				$query2 = "SELECT * FROM `instructor` where `ID` = '$pid'";
                	$result2 = mysql_query($query2,$con);
                	while ($row2 = mysql_fetch_assoc($result2)) {
                		$profName = $row2['FName']." ".$row2['MName']." ".$row2['LName'];
                	}
                	?>
      								<div class="col-md-3">
      									Instructor : <a href="#"><?php echo $profName; ?></a>
      								</div>
      								<div class="col-md-2">
      									Section : <a href="#"><?php echo $row['Section']; ?></a>
      								</div>
      								<div class="col-md-2">
      									Room : <a href="#"><?php echo $row['Room']; ?></a>
      								</div>
      								<div class="col-md-2">
      									Day : <a href="#"><?php echo $row['Day']; ?></a>
      								</div>
      								<?php 
      								$cde = $row['SCode'];
      								$sec = $row['Section'];
      								$time = $row['Time'];
      								$suffix = "am";
      								if($time>=12){
      									$suffix = "pm";
      								}
      								$t = "";
      								if(strlen($time)==3){
      									$time = substr($row['Time'], 0, 1);
      									$t = ($time%12).":".substr($row['Time'], 2, 2).$suffix;	
      								}
      								else{
      									$time = substr($row['Time'], 0, 2);
      									$t = ($time%12).":".substr($row['Time'], 2, 2).$suffix;
      								}
      								?>
      								<div class="col-md-3">
      									Time : <a href="#"><?php echo $t; ?></a>
      								</div>
      							</div>
      							<div class="row">
      								<div class="panel-body">
										<h3>Uploaded Files</h3>
      								</div>
      								<?php
 $query3 = "SELECT * FROM `resources` WHERE `Section` ='$sec' AND `Code` ='$cde'";
 $result3 = mysql_query($query3,$con);
 while ($row3 = mysql_fetch_assoc($result3)) {
 ?>
									<?php 
									if($row3['Files']!=NULL){
									$extensions = explode(",", $row3['Files']);
									?>
            <div class="box-footer">
            	<ul class="mailbox-attachments clearfix"> 
            	<!--  -->
            	<?php for($x=0;$x<$row3['FileCount'];$x++){?>
                	<li>
                  			<?php 
                  			if($extensions[$x]=="pdf"){ 
                  				echo "<span class='mailbox-attachment-icon'>";
                  				echo "<i class='fa fa-file-pdf-o'></i></span>";
                  			}
                  			else if($extensions[$x]=="docx"){ 
                  				echo "<span class='mailbox-attachment-icon'>";
                  				echo "<i class='fa fa-file-word-o'></i></span>";
                  			}
                  			else if($extensions[$x]=="pptx"){ 
                  				echo "<span class='mailbox-attachment-icon'>";
                  				echo "<i class='fa fa-file-powerpoint-o'></i>";
                  			}
                  			else if($extensions[$x]=="xlsx"||$extensions[$x]=="csv"){ 
                  				echo "<span class='mailbox-attachment-icon'>";
                  				echo "<i class='fa fa-file-excel-o'></i></span>";
                  			}
                  			else if($extensions[$x]=="mp3"||$extensions[$x]=="wav"||$extensions[$x]=="obb"){ 
                  				echo "<span class='mailbox-attachment-icon'>";
                  				echo "<i class='fa fa-file-audio-o'></i></span>";
                  			}
                  			else if($extensions[$x]=="jpg"||$extensions[$x]=="png"||$extensions[$x]=="jpeg"||$extensions[$x]=="gif"){ 
                  				//../resources/<?php echo $row2['ProfID']."/".$row2['Code']."-".$row2['Section'];
                  				echo "<span class='mailbox-attachment-icon has-img'><img src='../resources/$pid/$cde-$sec/$x.$extensions[$x]' alt='Attachment'></span>";	
                  			}
                  			else if($extensions[$x]=="php"||$extensions[$x]=="class"||$extensions[$x]=="java"||$extensions[$x]=="html"||$extensions[$x]=="css"||$extensions[$x]=="js"){ 
                  				echo "<span class='mailbox-attachment-icon'>";
                  				echo "<i class='fa fa-file-code-o'></i></span>";
                  			}
                  			else if($extensions[$x]=="mp4"||$extensions[$x]=="avi"||$extensions[$x]=="vid"){ 
                  				echo "<span class='mailbox-attachment-icon'>";
                  				echo "<i class='fa fa-file-video-o'></i></span>";
                  			}
                  			else{ 
                  				echo "<span class='mailbox-attachment-icon'>";
                  				echo "<i class='fa fa-file-o'></i></span>";
                  			}
                  			?>
                  		
                  		<div class="mailbox-attachment-info">
                    		<a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> <?php echo $x; ?></a>
                        	<span class="mailbox-attachment-size">
                          		<a href="../resources/<?php echo $pid."/".$cde."-".$sec."/".$x.".".$extensions[$x]; ?>" download=""; class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                        	</span>
                  		</div>
                	</li>
                	
            	<?php } ?>
                	<!--  -->
              	</ul>
            </div>
            <?php } } }?>
      							</div>
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
