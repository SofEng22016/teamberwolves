 <?php 
 $mid = $_POST['mailid'];
 $con = mysql_connect("localhost", "root", "");
 if(! $con )
 {
 	die('Could not connect: ' . mysql_error());
 }
 $db = mysql_select_db("enrollment", $con);
 $id = $_SESSION['ID'];
$query = "UPDATE `messages` SET `isRead` = '1' WHERE `messages`.`ID` = '$mid';";
$result = mysql_query($query,$con);
 $query = "SELECT * FROM `messages` WHERE `ID` = '$mid'";
 $result = mysql_query($query,$con);
 while ($row = mysql_fetch_assoc($result)) {
 ?>
 
 <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Read Mail</h3>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><?php echo $row['Subject'];?></h3>
                <h5>From: support@almsaeedstudio.com
                  <span class="mailbox-read-time pull-right"><?php echo $row['Date'];?></span></h5>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                    <i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                    <i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                    <i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p><?php echo $row['Message'];?></p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <?php if($row['Attachment']!=NULL){?>
            <div class="box-footer">
            	<ul class="mailbox-attachments clearfix"> 
                	<li>
                  			<?php 
                  			if($row['Attachment']=="pdf"){ 
                  				echo "<span class='mailbox-attachment-icon'>";
                  				echo "<i class='fa fa-file-pdf-o'></i></span>";
                  			}
                  			else if($row['Attachment']=="docx"){ 
                  				echo "<span class='mailbox-attachment-icon'>";
                  				echo "<i class='fa fa-file-word-o'></i></span>";
                  			}
                  			else if($row['Attachment']=="pptx"){ 
                  				echo "<span class='mailbox-attachment-icon'>";
                  				echo "<i class='fa fa-file-powerpoint-o'></i>";
                  			}
                  			else if($row['Attachment']=="xlsx"||$row['Attachment']=="csv"){ 
                  				echo "<span class='mailbox-attachment-icon'>";
                  				echo "<i class='fa fa-file-excel-o'></i>";
                  			}
                  			else if($row['Attachment']=="mp3"||$row['Attachment']=="wav"||$row['Attachment']=="obb"){ 
                  				echo "<span class='mailbox-attachment-icon'>";
                  				echo "<i class='fa fa-file-audio-o'></i></span>";
                  			}
                  			else if($row['Attachment']=="jpg"||$row['Attachment']=="png"||$row['Attachment']=="jpeg"||$row['Attachment']=="gif"){ 
                  				echo "<span class='mailbox-attachment-icon has-img'><img src='../upload/".$row['fileName']."' alt='Attachment'></span>";
                  				
                  			}
                  			else if($row['Attachment']=="php"||$row['Attachment']=="class"||$row['Attachment']=="java"||$row['Attachment']=="html"||$row['Attachment']=="css"||$row['Attachment']=="js"){ 
                  				echo "<span class='mailbox-attachment-icon'>";
                  				echo "<i class='fa fa-file-code-o'></i></span>";
                  			}
                  			else if($row['Attachment']=="mp4"||$row['Attachment']=="avi"||$row['Attachment']=="vid"){ 
                  				echo "<span class='mailbox-attachment-icon'>";
                  				echo "<i class='fa fa-file-video-o'></i></span>";
                  			}
                  			?>
                  		
                  		<div class="mailbox-attachment-info">
                    		<a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> <?php echo $row['fileName']; ?></a>
                        	<span class="mailbox-attachment-size">
                          		<?php echo $row['fileSize']; ?>
                          		<a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-download"></i></a>
                        	</span>
                  		</div>
                	</li>
              	</ul>
            </div>
            <?php } ?>
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="button" class="btn btn-success"><i class="fa fa-reply"></i> Reply</button>
                <button type="button" class="btn btn-primary"><i class="fa fa-share"></i> Forward</button>
              </div>
              <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <?php }?>