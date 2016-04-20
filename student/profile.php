 <section class="content">

      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../accounts/<?php echo $_SESSION["Picture"];?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $_SESSION["Name"];?></h3>

              <p class="text-muted text-center">Student</p>
<?php 
$con = mysql_connect("localhost", "root", "");
$db = mysql_select_db("enrollment", $con);
$id = $_SESSION['ID'];
$query = "SELECT * FROM `students` JOIN `contact` ON `students`.`ID` = `contact`.`ID` WHERE `students`.`ID` = '$id'";
$result = mysql_query($query,$con);
while ($row = mysql_fetch_assoc($result)) {
?>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Year Level</b> <a class="pull-right"><?php echo $row['Year'];?> Year</a>
                </li>
                <li class="list-group-item">
                  <b>Status</b> <a class="pull-right"><?php echo $row['Status'];?></a>
                </li>
                <li class="list-group-item">
                  <b>Age</b> <a class="pull-right"><?php echo $row['Age'];?></a>
                </li>
              </ul>
			  <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#profileModal"><b>Edit</b></a>
            </div>
            <!-- /.box-body -->
          </div>  
</div>
<div class="col-md-8">
 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Course</strong>

              <p class="text-muted">
                <?php echo $_SESSION["Course"];?>
              </p>
              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $row['Province'].", ".$row['Country'];?></p>
              <p class="text-muted"><?php echo $row['Street'].", ".$row['City'];?> City</p>

              <hr>
              
              <strong><i class="fa fa-mobile margin-r-5"></i> Contact</strong>

              <p class="text-muted"><?php echo $row['mobile'];?></p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Subjects</strong>
              <p>
				<?php  $colors = array(
						"label-danger",
						"label-success",
						"label-info",
						"label-warning",
						"label-primary"
						);
						$subjects = array();
						
						$query2 = "SELECT * FROM `tempsubjects` WHERE `ID` = '$id'";
$result2 = mysql_query($query2,$con);
while ($row2 = mysql_fetch_assoc($result2)) { 
	$subjects = explode("-", $row2['Subjects']);
}
for($x=0;$x<count($subjects);$x++){
	$sub = $subjects[$x];
$query2 = "SELECT * FROM `subject12016` WHERE `SID` = '$sub'";
$result2 = mysql_query($query2,$con);
while ($row2 = mysql_fetch_assoc($result2)) { 
?>
              
                <span class="label <?php echo $colors[$x%5]?>"><?php echo $row2['SCode']."-".$row2['Section'];?></span>
                <?php  } }?>
</p>
</div>
</div>
</div>
</div>
</section>
    
    <?php } ?>
    <style>
.kv-avatar .file-preview-frame,.kv-avatar .file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar .file-input {
    display: table-cell;
    max-width: 220px;
}
.file-thumbnail-footer {
    position: relative;
}
.kv-avatar .file-preview-frame, .kv-avatar .file-preview-frame:hover {
    
    margin-bottom: 30px;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.file-preview {
    border-radius: 5px;
    border: 1px solid #ddd;
    padding: 5px;
    width: 100%;
    margin-bottom: 5px;
}
.file-preview-image {
    width: 100%;
}
.file-preview-frame, .file-preview-image, .file-preview-other {
    height: 160px;
    width: 100%;
    vertical-align: middle;
}
.file-footer-caption {
    display: block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    width: 160px;
    text-align: center;
    padding-top: 4px;
    font-size: 11px;
    color: #777;
    margin: 5px auto 10px;
}
</style>
<?php $query = "SELECT * FROM `students` JOIN `contact` ON `students`.`ID` = `contact`.`ID` JOIN `accounts` ON `students`.`ID` = `accounts`.`ID` WHERE `students`.`ID` = '$id'";
$result = mysql_query($query,$con);
while ($row = mysql_fetch_assoc($result)) {?>
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" style="width:500px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h2 class="modal-title" id="myModalLabel"><b>Edit</b></h2>
			</div>
			<div class="modal-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form class="text-center" action="avatar_upload.php" method="post" enctype="multipart/form-data">
	        			<input id="id" name="id" value="<?php echo $_SESSION['ID'];?>" type="hidden" required/>
	    				<div class="kv-avatar center-block"  style="width:200px">
	        				<input id="avatar" name="avatar" type="file" class="file-loading">
	    				</div><!-- include other inputs if needed and include a form submit (save) button -->
	    			<input type="submit" class="btn btn-primary btn-block" value="Save" style="width: 174px;">
					</form>
				</div>
			</div>
				
					
				<div class="form-group">
					<form>
					<hr>
					<label class="control-label">Name</label>
          			<div class="row">
            			<div class="form-group col-sm-4">
              				<input type="text" data-toggle="validator" data-minlength="6" class="form-control" id="fName" placeholder="First Name" value="<?php echo $row['FName'];?>" required>
            			</div>
            			<div class="form-group col-sm-4">
              				<input type="text" data-toggle="validator" data-minlength="6" class="form-control" id="mName" placeholder="Middle Name" value="<?php echo $row['MName'];?>" required>
            			</div>
            			<div class="form-group col-sm-4">
              				<input type="text" data-toggle="validator" data-minlength="6" class="form-control" id="lName" placeholder="Last Name" value="<?php echo $row['LName'];?>" required>
            			</div>
          			</div>
          			<label class="control-label">Address</label>
          			<div class="row">
            			<div class="form-group col-sm-4">
              				<input type="text" data-toggle="validator" data-minlength="6" class="form-control" placeholder="Country" id="country" value="<?php echo $row['Country'];?>" required>
            			</div>
            			<div class="form-group col-sm-4">
              				<input type="text" data-toggle="validator" data-minlength="6" class="form-control" placeholder="Province/State" id="province" value="<?php echo $row['Province'];?>" required>
            			</div>
            			<div class="form-group col-sm-4">
              				<input type="text" data-toggle="validator" data-minlength="6" class="form-control" placeholder="City" id="city" value="<?php echo $row['City'];?>" required>
            			</div>
          			</div>
          			<div class="row">
            			<div class="form-group col-sm-12">
              				<input type="text" data-toggle="validator" data-minlength="6" class="form-control" placeholder="Building/Street Address/Unit" id="street" value="<?php echo $row['Street'];?>" required>
            			</div>
          			</div>
          			<div class="row">
            			<div class="form-group col-sm-6">
              				<input type="number" data-toggle="validator" data-minlength="6" class="form-control" id="mobile" placeholder="Mobile" value="<?php echo $row['mobile'];?>" required>
            			</div>
            			<div class="form-group col-sm-6">
              				<input type="email" data-toggle="validator" class="form-control" id="email" placeholder="E-Mail" value="<?php echo $row['email'];?>" required>
            			</div>
          			</div>
          			<hr>
          			<div class="row">
          				<div class="col-sm-6">
							<input type="reset" class="btn btn-danger btn-block"/>
          				</div>
          				<div class="col-sm-6">
							<input id="confirmEdit" type="button" class="btn btn-primary btn-block" value="Confirm"/>
          				</div>
          			</div>
          			</form>
        		</div>
			</div>
		</div>
	</div>
</div>

<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script>

$(document).ready(function () {
$("#avatar").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    showUpload: false,
    maxImageWidth: 500,
    maxImageHeight: 700,
    resizePreference: 'height',
    maxFileCount: 1,
    minImageWidth: 500,
    minImageHeight: 700,
    resizeImage: true,
    browseLabel: '',
    removeLabel: '',
    browseIcon: 'Browse',
    removeIcon: 'Reset',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="../accounts/<?php echo $_SESSION["Picture"];?>" alt="Your Avatar" style="width:160px">',
    allowedFileExtensions: ["jpg", "png", "gif"],
    
});
});
</script>
<?php } ?>