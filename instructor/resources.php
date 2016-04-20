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
							
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../js/fileinput.js"></script>
							<?php 
                					$count = 0;
                $ID = $_SESSION['ID'];
                $con = mysql_connect("localhost", "root", "");
                $db = mysql_select_db("enrollment", $con);
                $query = "SELECT *  FROM `subject12016` where `ProfID` = '$ID'";
                $result = mysql_query($query,$con);
                $blockResult = "";
                $counter = 1;
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
								<!-- ------------------------------------------------------- -->
								
									<h3>
										Uploaded Files
									</h3>
									<?php 
 $id = $_SESSION['ID'];
 $cde = $row['SCode'];
 $sec =$row['Section'];
 $query2 = "SELECT * FROM `resources` WHERE `ProfID` = '$id' AND `Section` ='$sec' AND `Code` ='$cde'";
 $result2 = mysql_query($query2,$con);
$new = mysql_num_rows($result2);
if($new!=0){
 while ($row2 = mysql_fetch_assoc($result2)) {
 ?>
									<?php 
									if($row2['Files']!=NULL){
									
									$extensions = explode(",", $row2['Files']);
									?>
            <div class="box-footer">
            	<ul class="mailbox-attachments clearfix"> 
            	<!--  -->
            	<?php for($x=0;$x<$row2['FileCount'];$x++){?>
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
                  				echo "<span class='mailbox-attachment-icon has-img'><img src='../resources/$id/$cde-$sec/$x.$extensions[$x]' alt='Attachment'></span>";	
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
                          		<a href="../resources/<?php echo $id."/".$cde."-".$sec."/".$x.".".$extensions[$x]; ?>" download=""; class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                        	</span>
                  		</div>
                	</li>
                	
            	<?php } ?>
                	<!--  -->
              	</ul>
            </div>
            <?php } } }?>
									
            <!-- /.box-header -->
              <div class="form-group">
              <h3>Attachment</h3>
                <div class="btn btn-default btn-file">
                	<input id="files<?php echo $counter;?>" name="files<?php echo $counter;?>[]" type="file" multiple class="file-loading">
					<input id="section<?php echo $counter;?>" name="section<?php echo $counter;?>" value="<?php echo $row['Section'];?>" type="hidden">
					<input id="nme<?php echo $counter;?>" name="nme<?php echo $counter;?>" value="<?php echo $counter;?>" type="hidden">
					<input id="code<?php echo $counter;?>" name="code<?php echo $counter;?>" value="<?php echo $row['SCode'];?>" type="hidden">
                </div>
                
              </div>
        
            
								
								
								<!-- ------------------------------------------------------ -->
								
      						</div>
    					</div>
  					</div>
                <?php $counter++; } ?>
                	
				</div>
						</div>
					</div>
				</div>	
				<!-- TableEnd -->
			</div>
		</div>
</section>
<?php for($x=1;$x<$counter;$x++){ ?>
<script>
$(document).on("ready", function() {
    $("#files<?php echo $x;?>").fileinput({
        uploadAsync: false,
        uploadUrl: "upload.php", // your upload server url
        uploadExtraData: function() {
            return {
                code: $("#code<?php echo $x;?>").val(),
                ID: '<?php echo $_SESSION['ID'];?>',
                nme: $("#nme<?php echo $x;?>").val(),
                section: $("#section<?php echo $x;?>").val()
            };
        }
    });
});
</script>
 <?php }?>
