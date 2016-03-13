<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="list">
					<!-- TableStart -->
						<div class="box-header">
							<h3 class="box-title">Grades - Curriculum</h3>
						</div>
						<div class="box-body">
							
<?php
$ID = $_SESSION["ID"];
$sem = array("1st Year - 1st Semester","1st Year - 2nd Semester","1st Year - 3rd Semester",
		     "2nd Year - 1st Semester","2nd Year - 2nd Semester","2nd Year - 3rd Semester",
		     "3rd Year - 1st Semester","3rd Year - 2nd Semester","3rd Year - 3rd Semester",
		     "4th Year - 1st Semester","4th Year - 2nd Semester","4th Year - 3rd Semester",
);
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `students` WHERE `ID` = '$ID'";
$result = mysql_query($query,$con);
$curriculum = "";
while ($row = mysql_fetch_assoc($result)) {
	$curriculum = strtolower($row['Curriculum']);
}
$db = mysql_select_db("curriculum", $con);
$query = "SELECT * FROM `$curriculum`";
$result = mysql_query($query,$con);
$allSubjects = array();
$counter = 0;
while ($row = mysql_fetch_assoc($result)) {
	$allSubjects[$counter] = explode(",", $row['Subjects']);
	$counter++;
}
$takenSubjects = array();
$desc = array();
$grades = array();
$counter = 0;
$query = "SELECT * FROM `enrollment` WHERE `SID` = '$ID'";
$result = mysql_query($query,$con);
while ($row = mysql_fetch_assoc($result)) {
	$takenSubjects[$counter] = explode(",", $row['Subjects']);
	$grades[$counter] = explode(",", $row['Grade']);
	$counter++;
}
$info = array();
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `subject_info`";
$result = mysql_query($query,$con);
$c1 = 0;
while ($row = mysql_fetch_assoc($result)) {
	$info[$c1][0] = $row['ID'];
	$info[$c1][1] = $row['SCode'];
	$info[$c1][2] = $row['Subject Name'];
	$info[$c1][3] = $row['Description'];
	$info[$c1][4] = $row['Lab'];
	$info[$c1][5] = $row['Lec'];
	$info[$c1][6] = explode("-", $row['Requisite']);
	$c1++;
}
for($x=0;$x<count($allSubjects);$x++){ ?>
<h3><?php echo $sem[$x];?></h3>
<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Subject Code</th>
										<th>Subject Name</th>
										<th>Description</th>
										<th>Units</th>
										<th>Pre-Requisites</th>
										<th>Grade</th>
									</tr>
								</thead>
								<tbody>
<?php 
	$total = 0;
	$gwa = 0;
	for($y=0;$y<count($allSubjects[$x]);$y++){
	echo "<tr";
	
	echo ">";
	$desc[$x][0] = $allSubjects[$x][$y];
	echo "<td>".$allSubjects[$x][$y]."</td>";
	$db = mysql_select_db("enrollment", $con);
	$s = $allSubjects[$x][$y];
	$units = 0;
	for($a=0;$a<count($info);$a++){
		if($s==$info[$a][1]){
			$desc[$x][1] = $info[$a][2];
			$desc[$x][2] = $info[$a][3];
			echo "<td>".$info[$a][2]."</td>";
			echo "<td>".$info[$a][3]."</td>";
			echo "<td>".($info[$a][4]+$info[$a][5])."</td>";
			echo "<td>";
			$desc[$x][3] = $info[$a][4]+$info[$a][5];
			$total += $desc[$x][3];
			$desc[$x][4] = "";
			for($b=0;$b<count($info[$a][6]);$b++){
				for($c=0;$c<count($info);$c++){
					if($info[$a][6][$b]==$info[$c][0]){
						$desc[$x][4] .= $info[$c][1];
						echo $info[$c][1];
						if($b<count($info[$a][6])-1){
							echo ", ";
							$desc[$x][4] .= ", ";
						}
					}
				}
			}
			echo "</td>";
		}
	}
	$found = 0;
	for($a=0;$a<count($takenSubjects);$a++){
		for($b=0;$b<count($takenSubjects[$a]);$b++){
			if($allSubjects[$x][$y]==$takenSubjects[$a][$b]){
				$found++;
			}
		}
	}
	if($found==0){
		$desc[$x][5] = "&nbsp;";
	}
	else{
		$desc[$x][5] = $grades[$x][$y];
	}
	echo "<td>".$desc[$x][5]."</td>";
	if($desc[$x][5]!='P'){
		$gwa += $desc[$x][5] * $desc[$x][3];
	}
	else{
		$total--;
	}
	if($y==count($allSubjects[$x])-1){
		$gwa /= $total;
	}
	echo "</tr>";
	} ?>
        	        			</tbody>
        	        			<tfoot>
        	        				<tr>
										<th></th>
										<th></th>
										<th style="text-align: right">Total</th>
										<th><?php echo $total;?></th>
										<th style="text-align: right">GWA</th>
										<th><?php echo number_format($gwa, 2, '.', '');?></th>
									</tr>
								</tfoot>
							</table>
							<br>
							<?php }?>
						</div>
					</div>
					
					<div role="tabpanel" class="tab-pane" id="addEdit">
					</div>
				</div>	
				<!-- TableEnd -->
			</div>
		</div>
	</div>
</section>
<?php 
//////////////
mysql_close($con);
?>