<section class="content">
	<div class="box">
		<ul class="nav nav-pills nav-justified">
  			<li role="presentation" class="active">
  				<a href="#list" aria-controls="list" role="tab" data-toggle="tab">List</a>
  			</li>
  			<li role="presentation">
  				<a href="#addEdit" aria-controls="addEdit" role="tab" data-toggle="tab">Add / Edit / Delete</a>
  			</li>
  			<li role="presentation">
  				<a href="#info" aria-controls="info" role="tab" data-toggle="tab">Information</a>
  			</li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="list">
				<div class="box-header">
					<h3 class="box-title">List of Faculty Members</h3>
				</div>
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Full Name</th>
								<th>Gender</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>0000000001</td>
								<td>Bryce Francis Quintano Deyto</td>
								<td>Male</td>
							</tr>
							
							<?php 
                $con = mysql_connect("localhost", "root", "");
                if(! $con )
                {
                	die('Could not connect: ' . mysql_error());
                }
                $db = mysql_select_db("enrollment", $con);
                $query = "SELECT * FROM `instructor`";
                $result = mysql_query($query,$con);
                $ID = "";
                while ($row = mysql_fetch_assoc($result)) { ?>
                			<tr>
								<td><?php echo $row['ID']; ?></td>
                  				<td><?php echo $row['FName']." ".$row['MName']." ".$row['LName']; ?></td>
                  				<td><?php echo $row['Gender']; ?></td>
							</tr>
                
                <?php }?>
<?php include 'names.php';
for($x=1;$x<=rand(100, 200);$x++){
	$nme = "";
    $gen = rand(0, 1);
    $scnd = rand(0, 1);
    $id = 0;
    for($a=0;$a<10;$a++){
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
        $gen = "Male"; } ?>
							<tr>
      		            		<td><?php echo $id; ?></td>
          		        		<td><?php echo $nme; ?></td>
       			           		<td><?php echo $gen; ?></td>
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
			</div>
			<div role="tabpanel" class="tab-pane" id="addEdit">
				<!--  -->
					<hr class="divider">
            		<div class="row">
            			<div class="col-md-6">
              				<div class="box box-danger">
            					<div class="box-header with-border">
              						<h3 class="box-title" style=" display: block; text-align: center;">Add New Instructor</h3>
            					</div>
            					
            					<form id="addInstructor" name="form" role="form">
            						<div class="box-body">
              							<div class="row">
                							<div class="col-xs-4">
                  								<input type="text" name="fnameval" id="fnameval" class="form-control" placeholder="First Name">
                							</div>
                							<div class="col-xs-4">
                  								<input type="text" name="mnameval" id="mnameval" class="form-control" placeholder="Middle Name">
                							</div>
                							<div class="col-xs-4">
                  								<input type="text" name="lnameval" id="lnameval" class="form-control" placeholder="Last Name">
                							</div>
              							</div>
              							<br>
              							<div class="row">
              								<div class="col-xs-8">
                  								<input type="text" name="emailval" id="emailval" class="form-control" placeholder="Email Address">
                							</div>
                							<div class="col-xs-4">
                								<span style="margin-top: -12px;">
													<input id="switchGender" name="switchGender" type="checkbox" checked="true" class="BSswitch" data-on-color="info" data-off-color="danger" data-on-text="Male" data-off-text="Female">
												</span>
                							</div>
              							</div>
              							<br>
              							<div class="row">
              								<div class="col-xs-12">
              									<button type="button" class="btn btn-primary btn-block">Add Instructor</button>
              								</div>
              							</div>
            						</div>
            					</form>
							</div>
						</div>
						
						<div class="col-md-6">
              				<div class="box box-danger">
            					<div class="box-header with-border">
              						<h3 class="box-title" style=" display: block; text-align: center;">Edit Instructor</h3>
            					</div>
            					<div class="box-body">
            						<div class="row">
            							<div class="col-xs-5">
            								<form id="searchInstructor" name="form" role="form">
            									<div class="input-group">
      												<input type="text" name="srch" id="srch" class="form-control" placeholder="Search for...">
      												<span class="input-group-btn">
        												<button class="btn btn-default" id="searchInstructorBtn" onclick="searchIns()" type="button">
        													<i class="fa fa-search"></i>
        												</button>
      												</span>
    											</div>
    										</form>
            							</div>
            						</div>
            						<hr class="divider">
            						<div class="row">
            							<div class="col-xs-4">
                  							<input type="text" id="idres" name="idres" class="form-control disabled" placeholder="ID Number">
                						</div>
            						</div>
            						<br>
              						<div class="row">
                						<div class="col-xs-4">
                  							<input type="text" id="fnameres" name="fnameres" class="form-control" placeholder="First Name">
                						</div>
                						<div class="col-xs-4">
                  							<input type="text" id="mnameres" name="mnameres" class="form-control" placeholder="Middle Name">
                						</div>
                						<div class="col-xs-4">
                  							<input type="text" id="lnameres" name="lnameres" class="form-control" placeholder="Last Name">
                						</div>
              						</div>
              						<br>
              						<div class="row">
              							<div class="col-xs-8">
                  							<input type="text" class="form-control" placeholder="Email Address">
                						</div>
                						<div class="col-xs-4">
                							<span style="margin-top: -12px;">
												<input id="switchGender2" name="switchGender2" type="checkbox" checked="true" class="BSswitch" data-on-color="info" data-off-color="danger" data-on-text="Male" data-off-text="Female">
											</span>
                						</div>
              						</div>
              						<br>
              						<div class="row">
              							<div class="col-xs-6">
              								<button type="button" class="btn btn-danger btn-block disabled">Delete Instructor</button>
              							</div>
              							<div class="col-xs-6">
              								<button type="button" class="btn btn-success btn-block disabled">Edit Instructor</button>
              							</div>
              						</div>
            					</div>
							</div>
						</div>
					</div>
				<!--  -->
			</div>
		</div>
	</div>
</section>