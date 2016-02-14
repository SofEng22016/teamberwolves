<section class="content">
      <div class="row">
        <div class="col-xs-12">
      
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of Students</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Full Name</th>
                  <th>Birthdate</th>
               	  <th>Age</th>
                  <th>Gender</th>
               	  <th>Year</th>
               	  <th>Type</th>
               	  <th>Course</th>
               	  <th>Status</th>
                </tr>
                </thead>
                
                <tbody>
                <tr>
                  <td>2010479131</td>
                  <td>Bryce Francis Quintano Deyto</td>
                  <td>1994-02-07</td>
                  <td>22</td>
                  <td>Male</td>
                  <td>Second Year</td>
                  <td>Regular</td>
                  <td>BS-CS-SE</td>
                  <td><span class='label label-info'>BRYCE</span></td>
               	</tr>
                <?php include 'names.php';
                for($x=1;$x<=rand(100, 200);$x++){
                	$nme = "";
                	$gen = rand(0, 1);
                	$scnd = rand(0, 1);
                	$stat = rand(0, 10);
                	$type = rand(0, 10);
                	$yr =  rand(1990, 1998);
                	$mnth =  rand(1, 12);
                	$dy =  rand(1, 28);
                	$birthDate = $yr."-".$mnth."-".$dy;
                	$birthDate2 = $yr."-".$mnth."-".$dy;
                	$years = array("First","Second","Third","Fourth");
                	$year = $years[rand(0, 3)]." Year";
                	$courses = array("CS-SE","GD","IT-WD","Anim","MMA","FD","BA-FM","BA-MA");
                	$course = $courses[rand(0, 7)];
                	$birthDate = explode("-", $birthDate);
                	$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                			? ((date("Y") - $birthDate[0]) - 1)
                			: (date("Y") - $birthDate[0]));
                	$id = 2012 + rand(0, 3);
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
                	if($type==0){
                		$type = "Transferee";
                	}
                	else if($type>1 && $type<4){
                		$type = "Irregular";
                	}
                	else{
                		$type = "Regular";
                	}
                	
                ?>
                <tr>
                  <td><a href="#"><?php echo $id; ?></a></td>
                  <td><?php echo $nme; ?></td>
                  <th><?php echo $birthDate2; ?></th>
               	  <th><?php echo $age; ?></th>
                  <th><?php echo $gen; ?></th>
               	  <th><?php echo $year;?></th>
               	  <th><?php echo $type;?></th>
               	  <th><?php echo $course;?></th>
               	  <?php 
               	  echo "<th>";
               	  if($stat==0){
               	  	echo "<span class='label label-danger'>Disabled</span>";
               	  }
               	  else if($stat>1 && $stat<4){
               	  	echo "<span class='label label-warning'>Pending</span>";
               	  }
               	  else{
               	  	echo "<span class='label label-success'>Activated</span>";
               	  }
               	  "</th>";
               	  ?>
                </tr>
                <?php  } ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Full Name</th>
                  <th>Birthdate</th>
               	  <th>Age</th>
                  <th>Gender</th>
               	  <th>Year</th>
               	  <th>Type</th>
               	  <th>Course</th>
               	  <th>Status</th>
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