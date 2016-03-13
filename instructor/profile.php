 <section class="content">

      <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../accounts/<?php echo $_SESSION["Picture"];?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $_SESSION["Name"];?></h3>

              <p class="text-muted text-center">Student</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Year Level</b> <a class="pull-right">2nd Year</a>
                </li>
                <li class="list-group-item">
                  <b>Type</b> <a class="pull-right">Regular</a>
                </li>
                <li class="list-group-item">
                  <b>Age</b> <a class="pull-right">22</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Edit</b></a>
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