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
                <?php include 'names.php';
                for($x=1;$x<=rand(100, 200);$x++){
                	$nme = "";
                	$gen = rand(0, 1);
                	$scnd = rand(0, 1);
                	$stat = rand(0,5);
                	$id = 0;
                $id = 2016;
                	$id *= 1000000;
                	for($a=0;$a<6;$a++){
                		$mult = 1;
                		for($b=0;$b<$a;$b++){
                			$mult *= 10;
                		}
                		$id += ( rand(1, 9) * ($mult));
                	}
                	for($y=0;$y<$scnd+1;$y++){
                		$nme .= $name[$gen][rand(0, count($name[$gen])-1)];
                		$nme .= " ";
                	}
                	$nme .= $name[2][rand(0, count($name[2])-1)];
                	if($gen==0){
                		$gen = "Female";
                	}
                	else{
                		$gen = "Male";
                	}
                	if($stat==0){
                		$stat = "Pending";
                	}
                	else{
                		$stat = "Activated";
                	}
                	
                ?>
                <tr>
                  <td><?php echo $id; ?></td>
                  <td><?php echo $nme; ?></td>
                  <td><?php echo $gen; ?></td>
                  <td><?php echo $stat; ?></td>
                </tr>
                <?php  } ?>
                
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