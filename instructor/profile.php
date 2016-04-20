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
$query = "SELECT * FROM `students` WHERE `ID` = '$id'";
$result = mysql_query($query,$con);
while ($row = mysql_fetch_assoc($result)) {
 
?>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Year Level</b> <a class="pull-right"><?php echo $row['Year'];?> Year</a>
                </li>
                <li class="list-group-item">
                  <b>Status</b> <a class="pull-right"><?php echo $row['Year'];?></a>
                </li>
                <li class="list-group-item">
                  <b>Age</b> <a class="pull-right"><?php echo $row['Age'];?></a>
                </li>
              </ul>
			  <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#profileModal"><b>Edit</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
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

              <p class="text-muted">Makati, Philippines</p>

              <hr>
              
              <strong><i class="fa fa-map-marker margin-r-5"></i> Contact</strong>

              <p class="text-muted">+63 926-726-4532</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Subjects</strong>

              <p>
                <span class="label label-danger">HIST1-SE21</span>
                <span class="label label-success">PSYCH-SE21</span>
                <span class="label label-info">ECON-SE21</span>
                <span class="label label-warning">MATH4-SE21</span>
                <span class="label label-primary">JAVA1-SE21</span>
                <span class="label label-danger">DATABASE-SE21</span>
                <span class="label label-success">PE4-SE21</span>
              </p>


              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col    -----------------------------------------------------------------------------------     asdsad-->
        <div class="col-md-9">
          
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <?php } ?>
    
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
							</button>
							<h2 class="modal-title" id="myModalLabel"><b>Login</b></h2>
						</div>
					<form id="loginForm" class="form-horizontal" data-toggle="validator" name="form" role="form">
						<div class="modal-body">
							<div id="errorControl" class='form-group' style="display: none;">
								<div class="col-sm-10">
									<label class='control-label' id="NotFound" style="text-align: left; color: red; display: none;">
										<b>User Not Found</b>
									</label>
									<label class='control-label' id="Incorrect" style="text-align: left; color: red; display: none;">
										<b>Incorrect Password</b>
									</label>
								</div>
							</div>
							<div class='form-group has-feedback'>
								<div class="col-sm-12">
										<input type="text" data-toggle="validator" class="form-control" id="user" placeholder="Username/ID Number" required>
       								 <span class="fa fa-user fa-2x form-control-feedback"></span>
								</div>
							</div>
							<div class='form-group has-feedback'>
								<div class="col-sm-12">
									<input type="password" data-toggle="validator" class="form-control" id="pass" placeholder="Password" required>
       								 <span class="fa fa-lock fa-2x form-control-feedback"></span>
								</div>
							</div>
							<input id="submitLogin" type="button" class="btn btn-primary btn-block" value="Login"/>
						</div>
						<div class="modal-footer" style="text-align: left; padding: 0px 15px 0px 15px;">
							<div class='form-group' style="font-size: 13px;">
								<div class="col-sm-6">
									<input type="checkbox" id="remember">
									<label class='control-label'>Remember Me</label>
								</div>
								<div class="col-sm-6" style="text-align: right;">
									<label class='control-label'><a href='#'>Forgot Password?</a></label>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>