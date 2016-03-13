<?php $con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$id = $_SESSION['ID'];
$query = "SELECT * FROM `messages` WHERE `Recipient` = '$id' LIMIT 0,50";
$result = mysql_query($query,$con);
$messages = mysql_num_rows($result);
mysql_close($con); ?>
     
<div class="col-md-9">
	<div class="box box-primary">
    	<div class="box-header with-border">
        	<h3 class="box-title">Inbox</h3>
		</div>
		<div class="box-body no-padding">
			<div class="mailbox-controls">
				<button type="button" class="btn btn-default btn-sm checkbox-toggle">
					<i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                	<button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                	<button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                	<button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <button type="button" class="btn btn-default btn-sm">
                	<i class="fa fa-refresh"></i>
                </button>
                <div class="pull-right">1-<?php echo $messages;?>/<?php echo $messages;?>
                	<div class="btn-group">
                    	<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    	<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                	</div>
                </div>
              </div>
              <div class="table-responsive mailbox-messages">
              	<table class="table table-hover">
                	<tbody>
                	<?php $con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$id = $_SESSION['ID'];
$query = "SELECT * FROM `messages` WHERE `Recipient` = '$id' ORDER BY `messages`.`Date` DESC";
$result = mysql_query($query,$con);
while ($row = mysql_fetch_assoc($result)) {

	$sender = $row['Sender'];
$name = "";$query2 = "SELECT * FROM `accounts` WHERE `ID` = '$sender'";
$result2 = mysql_query($query2,$con);
while ($row2 = mysql_fetch_assoc($result2)) {
	$type = $row2['Type'];
}
if($type=="Student"){
	$query3 = "SELECT * FROM `students` WHERE `ID` = '$sender'";
	$result3 = mysql_query($query3,$con);
	while ($row3 = mysql_fetch_assoc($result3)) {
		$name = $row3['FName']." ".$row3['LName'];
		$pic = $row3['Picture'];
		if($row3['Picture']!=""){
			$pic = $row3['Picture'];
		}
		else{
			$pic = strtolower($row3['Gender']).".jpg";
		}
	}
}
else if($type=="Prof"){
	$query3 = "SELECT * FROM `instructor` WHERE `ID` = '$sender'";
	$result3 = mysql_query($query3,$con);
	while ($row3 = mysql_fetch_assoc($result3)) {
		$name = $row3['FName']." ".$row3['LName'];
		$pic = strtolower($row3['Gender']).".jpg";
	}
}
else if($type=="Admin"){
	$query3 = "SELECT * FROM `admin` WHERE `ID` = '$sender'";
	$result3 = mysql_query($query3,$con);
	while ($row3 = mysql_fetch_assoc($result3)) {
		$name = $row3['Name'];
		$pic = $row3['Picture'];
	}
}
                		?>
                		<form id="readNav<?php echo $row['ID'];?>" action="index.php" method="post" role="form">
      						<input type="hidden" name="mailopt" value="Read" />
      						<input type="hidden" name="opt" value="Mail" />
      						<input type="hidden" name="mailid" value="<?php echo $row['ID'];?>" />	
      					</form>
                		<tr<?php if($row['isRead']=='1'){ ?> style="background-color: #f5f5f5;"  <?php }?>>
                    		<td><input type="checkbox"></td>
                    		<td class="mailbox-name"><a href="javascript:{}" onclick="document.getElementById('readNav<?php echo $row['ID'];?>').submit();"><?php echo $name; ?></a></td>
                    		<td class="mailbox-subject"><b><?php echo $row['Subject'];?></b>
                    		</td>
                    		<td class="mailbox-attachment">
                    			<?php if($row['Attachment']!=NULL){ ?>
                    			<i class="fa fa-paperclip"></i>
                    			<?php } ?>
                    		</td>
                    		<td class="mailbox-date"><?php echo tme(strtotime($row['Date']));?> ago</td>
                  		</tr>
                	<?php } ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <div class="pull-right">1-<?php echo $messages;?>/<?php echo $messages;?>
                	<div class="btn-group">
                    	<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    	<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  	</div>
            	</div>
        	</div>
    	</div>
	</div>
</div>