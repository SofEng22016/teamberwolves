<section class="content">
      <div class="row">
        <div class="col-xs-12">
      
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of Guest Accounts</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Status</th>
                </tr>
                </thead>
                
                <tbody>
                
                <?php 
                $con = mysql_connect("localhost", "root", "");
                if(! $con )
                {
                	die('Could not connect: ' . mysql_error());
                }
                $db = mysql_select_db("enrollment", $con);
                $query = "SELECT * FROM `guest`";
                $result = mysql_query($query,$con);
                $ID = "";
                while ($row = mysql_fetch_assoc($result)) { ?>
                <tr>
                  <td><?php echo $row['ID']; ?></td>
                  <td><?php echo $row['FName']." ".$row['MName']." ".$row['LName']; ?></td>
                  <td><?php echo $row['Email']; ?></td>
                  <td><?php echo $row['Status']; ?></td>
                </tr>
               <?php  }
                ?>
    
                
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Full Name</th>
                  <th>Gender</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>