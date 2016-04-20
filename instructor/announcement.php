
<div id="bbox" class="bb-alert alert alert-info" style="display:none; left: 80%; bottom: 10%;">
        <span>The examples populate this alert with dummy content</span>
</div>
<section class="content">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1">
			<div class="box">
				<ul class="nav nav-pills nav-justified">
  					<li role="presentation" class="active">
  						<a id="optAll" href="#all" aria-controls="all" role="tab" data-toggle="tab">All Students</a>
  					</li>
  					<li role="presentation">
  						<a id="optSec" href="#section" aria-controls="section" role="tab" data-toggle="tab">Section</a>
  					</li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="all">
						<div class="box-body">
							<b>All Students</b>
						</div>
						<div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
                					<input class="form-control" name="subAll" id="subAll" placeholder="Subject:" required>
                					<input type="hidden" name="profID" id="profID" value="<?php echo $_SESSION['ID'];?>">
								</div>
								<div class="col-md-4">
                					<select class="selectpicker" data-width="100%" name="colorAll" id="colorAll" title="Color" data-size="5" required>
                						<option value="blue" data-content="<span class='label label-primary'>Blue</span>">Blue</option>
                						<option value="red" data-content="<span class='label label-danger'>Red</span>">Red</option>
                						<option value="yellow" data-content="<span class='label label-warning'>Yellow</span>">Yellow</option>
                						<option value="green" data-content="<span class='label label-success'>Green</span>">Green</option>
                					</select>
								</div>
								<div class="col-md-4">
                					<select class="selectpicker" data-width="100%" name="iconAll" id="iconAll" title="Icon" data-size="5" required>
                						<option value="fa-exclamation" data-icon="fa fa-exclamation">Alert (Default)</option>
                						<option value="fa-exclamation-triangle" data-icon="fa fa-exclamation-triangle">Alert (Triangle)</option>
                						<option value="fa-exclamation-circle" data-icon="fa fa-exclamation-circle">Alert (Circle)</option>
                						<option value="fa-question" data-icon="fa fa-question">Question Mark</option>
                						<option value="fa-file" data-icon="fa fa-file">File</option>
                						<option value="fa-money" data-icon="fa fa-money">Money</option>
                					</select>
								</div>
							</div>
              			</div>
						<div class="form-group">
							<div class="row">	
								<div class="col-md-12">
              						<div class="box">
										<div class="box-body pad">
                							<textarea id="mesAll" name="mesAll" class="form-control textarea" style="height: 200px" placeholder="Your Message................" ></textarea>
              							</div>
              						</div>
								</div>
							</div>
						</div>
						<div class="row" style="float: right; padding: 0px 15px 0px 0px; ">
                			<button class="btn btn-primary" id="sendAnnouncementAll" type="submit"><i class="fa fa-envelope-o"></i> Send</button>
						</div>
              		</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="section">
						<div class="box-body">
							<select class="selectpicker" data-width="100%" name="toSec" id="toSec" title="To:" data-size="5" 
							data-live-search="true" data-max-options="10" required>
							<?php 
							$con = mysql_connect("localhost", "root", "");
							$id = $_SESSION['ID'];
							$db = mysql_select_db("enrollment", $con);
               	 			$query = "SELECT DISTINCT `Section`,`SID`,`SCode` FROM `subject12016` WHERE `ProfID` = '$id'";
               	 			$result = mysql_query($query,$con);
               	 			$sections = array();
               	 			$sids = array();
               	 			$counter = 0;
                while ($row = mysql_fetch_assoc($result)) {  
                	?>
								<option 
									data-tokens="<?php echo $row['Section'];?>" 
  									value="<?php echo $row['SID'];?>">
  									<?php echo $row['Section']." - ".$row['SCode'];?>
  								</option>
  							<?php } ?>
							</select>
						</div>
						<div class="box-body">
						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
                					<input class="form-control" name="subSec" id="subSec" placeholder="Subject:" required>
								</div>
								<div class="col-md-4">
                					<select class="selectpicker" data-width="100%" name="colorSec" id="colorSec" title="Color" data-size="5" required>
                						<option value="blue" data-content="<span class='label label-primary'>Blue</span>">Blue</option>
                						<option value="red" data-content="<span class='label label-danger'>Red</span>">Red</option>
                						<option value="yellow" data-content="<span class='label label-warning'>Yellow</span>">Yellow</option>
                						<option value="green" data-content="<span class='label label-success'>Green</span>">Green</option>
                					</select>
								</div>
								<div class="col-md-4">
                					<select class="selectpicker" data-width="100%" name="iconSec" id="iconSec" title="Icon" data-size="5" required>
                						<option value="fa-exclamation" data-icon="fa fa-exclamation">Alert (Default)</option>
                						<option value="fa-exclamation-triangle" data-icon="fa fa-exclamation-triangle">Alert (Triangle)</option>
                						<option value="fa-exclamation-circle" data-icon="fa fa-exclamation-circle">Alert (Circle)</option>
                						<option value="fa-question" data-icon="fa fa-question">Question Mark</option>
                						<option value="fa-file" data-icon="fa fa-file">File</option>
                						<option value="fa-money" data-icon="fa fa-money">Money</option>
                					</select>
								</div>
							</div>
              			</div>
						<div class="form-group">
							<div class="row">	
								<div class="col-md-12">
              						<div class="box">
										<div class="box-body pad">
                							<textarea id="mesSec" name="mesSec" class="form-control textarea" style="height: 200px" placeholder="Your Message................" ></textarea>
              							</div>
              						</div>
								</div>
							</div>
						</div>
						<div class="row" style="float: right; padding: 0px 15px 0px 0px; ">
                			<button class="btn btn-primary" id="sendAnnouncementSec" type="submit"><i class="fa fa-envelope-o"></i> Send</button>
						</div>
              		</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>