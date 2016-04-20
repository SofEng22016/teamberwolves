<?php $courses = array(
		array("Software Engineering","se-1516"),
		array("Game Development","gd-1516"),
		array("Website Development","wd-1516"),
		array("Multimedia Arts","mma-1516"),
		array("Animation","anim-1516"),
		array("Fashion Design","fd-1516"),
		array("Financial Management","fm-1516"),
		array("Marketing Management","mm-1516"),
		
);?>
<div id="bbox" class="bb-alert alert alert-info" style="display:none; left: 80%; bottom: 10%;">
	<span>The examples populate this alert with dummy content</span>
</div>
<script src="../js/bootbox.js"></script>
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../js/bootstrap-select.js"></script>
<script>
        $(function () {
            Example.init({
                "selector": ".bb-alert"
            });
        });
        $(function() {
            var demos = {};

            $(document).on("click", "a[data-bb]", function(e) {
                e.preventDefault();
                var type = $(this).data("bb");
                if (typeof demos[type] === 'function') {
                    demos[type]();
                }
            });
        });
    </script>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="list">
					<!-- TableStart -->
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<?php 

					echo "<!-- ".count($courses)."Courses -->";
					for($x=0;$x<count($courses);$x++){ ?>
					
					<?php echo "<!-- ".$x."X -->"; ?>
						<div class="panel panel-default">
	    					<div class="panel-heading" role="tab" id="<?php echo $courses[$x][1];?>heading">
	      						<h4 class="panel-title">
	        						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $courses[$x][1];?>" aria-expanded="true" aria-controls="collapseOne">
	          							<?php echo $courses[$x][0];?>
	        						</a>
	      						</h4>
	   	 					</div>
	   	 					<div id="<?php echo $courses[$x][1];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo $courses[$x][1];?>heading">
      							<div class="panel-body">
      								<?php echo $courses[$x][0];?>
      								<?php
$ID = $_SESSION["ID"];
$sem = array("1st Year - 1st Semester","1st Year - 2nd Semester","1st Year - 3rd Semester",
		     "2nd Year - 1st Semester","2nd Year - 2nd Semester","2nd Year - 3rd Semester",
		     "3rd Year - 1st Semester","3rd Year - 2nd Semester","3rd Year - 3rd Semester",
		     "4th Year - 1st Semester","4th Year - 2nd Semester","4th Year - 3rd Semester",
);
for($y=0;$y<count($sem);$y++){ ?>
<div class="box">
<h3><?php echo $sem[$y];?></h3>
<form>
<table id="example1" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th style="width: 45px;">&nbsp;</th>
			<th>Subject Code</th>
			<th>Subject Name</th>
			<th>Description</th>
			<th style="width: 75px; text-align: center;">Units</th>
			<th>Pre-Requisites</th>
		</tr>
	</thead>
	<?php $con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$curriculum = $courses[$x][1];
$db = mysql_select_db("curriculum", $con);
$num = $y+1;
$query = "SELECT * FROM `$curriculum` WHERE `Term` = '$num'";
$result = mysql_query($query,$con);
$allSubjects = array();
while ($row = mysql_fetch_assoc($result)) {
	$allSubjects = explode(",", $row['Subjects']);
}
?>
	<tbody id="table<?php echo $curriculum.$y;?>">
	<?php for($z=0;$z<count($allSubjects);$z++){
		$subj = $allSubjects[$z];

		$db = mysql_select_db("enrollment", $con);
$query2 = "SELECT * FROM `subject_info` WHERE `SCode` = '$subj'";
$result2 = mysql_query($query2,$con);
while ($row2 = mysql_fetch_assoc($result2)) {
?>
		<tr>
			<td><a id="remove<?php echo $row2['SCode'];?>" class="btn btn-danger">X</a></td>
			<script>

	$("#remove<?php echo $row2['SCode'];?>").click(function(){
		$.post("deletesubject.php", {
			curriculum: '<?php echo $curriculum;?>',
			term: '<?php echo ($y+1);?>',
			subject: '<?php echo $row2['SCode'];?>'
		}, function(data) {
			Example.show('<?php echo $row2['SCode'];?> Removed');
			location.reload();
		});
	});
	</script>	
			<td><?php echo $allSubjects[$z];?></td>
			<td>
				<input type="text" id="name<?php echo $curriculum.$row2['SCode'];?>" class="form-control" placeholder="<?php echo $row2['Subject Name'];?>" value="<?php echo $row2['Subject Name'];?>">
			</td>
			<td>
				<input type="text" id=desc<?php echo $curriculum.$row2['SCode'];?> class="form-control" placeholder="<?php echo $row2['Description'];?>" value="<?php echo $row2['Description'];?>">
			</td>
			<?php $units = 0;
			$requisites = explode("-", $row2['Requisite']);
			$units += $row2['Lec'];
			$units += $row2['Lab'];?>
			<td style="width: 60px; text-align: center;"><?php echo $units;?></td>
			
			<td>
				<select class="selectpicker <?php echo $row2['SCode'];?>" name="<?php echo $row2['SCode'];?>" id="select<?php echo $curriculum.$row2['SCode'];?>" data-width="100%" title="" data-size="5" data-live-search="true" multiple>
					<?php 
					$query4 = "SELECT * FROM `subject_info`";
					$result4 = mysql_query($query4,$con);
					while ($row4 = mysql_fetch_assoc($result4)) {
						if($row4['SCode']!=$row2['SCode']){
					?>
						<option><?php echo $row4['SCode'];?></option>
					<?php }}?>
				</select>
				<script>
					
					<?php
					$reqs = "";
					for($a=0;$a<count($requisites);$a++){ 
						if($a>0){
							$reqs .= ",";	
						}
						$subID = $requisites[$a];
						$query5 = "SELECT * FROM `subject_info` WHERE `ID` = '$subID';";
						$result5 = mysql_query($query5,$con);
						while ($row5 = mysql_fetch_assoc($result5)) {
							$reqs .= "'".$row5['SCode']."'";
						}
					}
					?>
					$('.<?php echo $row2['SCode'];?>').val([<?php echo $reqs;?>]);
				</script>
			</td>
		</tr>
	<?php }
}?>
	</tbody>
	<tfoot>
		<tr>
			<td style="width: 45px;"><a id="add<?php echo $curriculum.$y;?>" class="btn btn-success">+</a></td>
			<td>
			<select class="selectpicker" id="code<?php echo $curriculum.$y;?>" data-width="100%" title="Subject Code" data-size="5" data-live-search="true">
					<?php 
					$db = mysql_select_db("enrollment", $con);
					$query4 = "SELECT * FROM `subject_info`";
					$result4 = mysql_query($query4,$con);
					while ($row4 = mysql_fetch_assoc($result4)) {
					?>
						<option><?php echo $row4['SCode'];?></option>
					<?php }?>
				</select>
			</td>
			<td colspan="4">&nbsp;</td>
		</tr>
	</tfoot>
	<script>

	$("#add<?php echo $curriculum.$y;?>").click(function(){
		var curriculum = '<?php echo $curriculum;?>';
		var term = '<?php echo ($y+1);?>';
		var req = $("#select<?php echo $curriculum.$y;?>").val();
		var code = $("#code<?php echo $curriculum.$y;?>").val();
		if(req==null){
			req = 0;
		}
		if(code==''){
			Example.show('Cannot Insert Subject');
		}
		else{
			$.post("addcurriculum.php", {
				code: code,
				term: term,
				curriculum: curriculum
			}, function(data) {
				alert(data);
				var data2 = data.split("-");
				var tr = document.createElement("tr");
				tr.setAttribute("id", "list<?php echo $curriculum.$y;?>");

				var td1 = document.createElement("td");
				var btn = document.createElement("a");
				btn.setAttribute("class", "btn btn-danger");
				btn.appendChild(document.createTextNode("X"));
				td1.appendChild(btn);
				tr.appendChild(td1);

				var td2 = document.createElement("td");
				td2.appendChild(document.createTextNode(code));
				tr.appendChild(td2);
				
				var td3 = document.createElement("td");
				var inputname = document.createElement("input");
				inputname.setAttribute("type", "text");
				inputname.setAttribute("placeholder", "Subject Name");
				inputname.setAttribute("value", data2[0]);
				inputname.setAttribute("class", "form-control");
				td3.appendChild(inputname);
				tr.appendChild(td3);

				var td4 = document.createElement("td");
				var inputdesc = document.createElement("input");
				inputdesc.setAttribute("type", "text");
				inputdesc.setAttribute("placeholder", "Subject Description");
				inputdesc.setAttribute("value", data2[1]);
				inputdesc.setAttribute("class", "form-control");
				td4.appendChild(inputdesc);
				tr.appendChild(td4);

				var td5 = document.createElement("td");
				td5.setAttribute("style","width: 60px; text-align: center;");
				td5.appendChild(document.createTextNode(data2[2]));
				tr.appendChild(td5);

				var td6 = document.createElement("td");
				td6.appendChild(document.createTextNode(req));
				tr.appendChild(td6);
				
				var element = document.getElementById("table<?php echo $curriculum.$y;?>");
				element.appendChild(tr);
			});
			
			
		}
	});
	</script>		
</table>
<div class="row">
<div class="col-md-2" style="float: right;">
<a id="btn<?php echo $x.$y;?>" class="btn btn-primary btn-block">Save Changes</a>
</div>
<div class="col-md-1" style="float: right;">
<button type="reset" class="btn btn-danger btn-block">Reset</button>
</div>
</div>
<br>
</form>
</div>

<script>

$("#btn<?php echo $x.$y;?>").click(function(){
	<?php for($i=0;$i<count($allSubjects);$i++){ 
	$sub = $allSubjects[$i];?>
	var code = '<?php echo $sub;?>';
	var req = $("#select<?php echo $curriculum.$sub;?>").val();
	var name = $("#name<?php echo $curriculum.$sub;?>").val();
	var desc = $("#desc<?php echo $curriculum.$sub;?>").val();
	$.post("editcurriculum.php", {
		code: code,
		name: name,
		desc: desc,
		req: req
	}, function(data) {
	});
	//alert('\nSCode : <?php echo $sub;?>\nName : ' + name + '\nDescription : ' + desc + '\nRequisites : ' + select);
	<?php } ?>
	Example.show("<h3>Curriculum Successfully Updated</h3>");
});
</script>
<?php }?>
      							</div>
      						</div>
   	 					</div>
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