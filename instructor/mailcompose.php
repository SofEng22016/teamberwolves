<div id="bbox" class="bb-alert alert alert-info" style="display:none; left: 50%; right:36%; height: 50px; bottom: 40%; padding-top: 0px; padding-bottom: 60px;">
        <span>The examples populate this alert with dummy content</span>
</div>
            <form method="post" action="sendmessage.php" enctype="multipart/form-data">
<div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Compose New Message</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
              <input type="hidden" name="sen" id="sen" value="<?php echo $_SESSION['ID']; ?>" />
                <select class="selectpicker" data-width="100%" name="to" id="to" title="To:" data-size="5" data-live-search="true" data-max-options="4" required>
<?php $con = mysql_connect("localhost", "root", "");
$id = $_SESSION['ID'];
$db = mysql_select_db("enrollment", $con);
                $query = "SELECT * FROM `accounts` WHERE `Type` <> 'Guest' AND `ID` <> '$id'";
                $result = mysql_query($query,$con);
                $name = "";
                while ($row = mysql_fetch_assoc($result)) { 
                	$type = $row['Type'];
                	$id = $row['ID'];
                	if($type=="Student"){
                		$query3 = "SELECT * FROM `students` WHERE `ID` = '$id'";
                		$result3 = mysql_query($query3,$con);
                		while ($row3 = mysql_fetch_assoc($result3)) {
                			$name = $row3['FName']." ".$row3['LName'];
                		}
                	}
                	else if($type=="Prof"){
                		$query3 = "SELECT * FROM `instructor` WHERE `ID` = '$id'";
                		$result3 = mysql_query($query3,$con);
                		while ($row3 = mysql_fetch_assoc($result3)) {
                			$name = $row3['FName']." ".$row3['LName'];
                		}
                	}
                	else if($type=="Admin"){
                		$query3 = "SELECT * FROM `admin` WHERE `ID` = '$id'";
                		$result3 = mysql_query($query3,$con);
                		while ($row3 = mysql_fetch_assoc($result3)) {
                			$name = $row3['Name'];
                		}
                	}
                	?>
  														<option data-tokens="<?php echo $name." ".$id." ".$row['Type']." ".$row['email']; ?>" 
  														value="<?php echo $id ?>">
  														<?php echo $name."-".$row['Type']; ?></option>
  														<?php }?>
													</select>
              </div>
              <div class="form-group">
                <input class="form-control" name="sub" id="sub" placeholder="Subject:" required>
              </div>
              <div class="form-group">
              	<div class="box">
              		<div class="box-body pad">
                		<textarea id="mes" name="mes" class="form-control textarea" style="height: 200px" placeholder="Your Message................" ></textarea>
              		</div>
              	</div>
              </div>
              <div class="form-group">
              <h3>Attachment</h3>
                <div class="btn btn-default btn-file">
					<input id="file" name="file" type="file" class="file" data-show-upload="false" data-show-caption="true">
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
              <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                <button class="btn btn-primary" type="submit"><i class="fa fa-envelope-o"></i> Send</button>
              </div>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        
            </form>
            