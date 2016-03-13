<header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>my</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>my</b>PAGE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <?php 
function tme ($time)
{
	$time = (mktime() - $time) + (3600*7); // to get the time since that moment
	$time = ($time<1)? 1 : $time;
	$tokens = array (
			31536000 => 'year',
			2592000 => 'month',
			604800 => 'week',
			86400 => 'day',
			3600 => 'hour',
			60 => 'minute',
			1 => 'second'
	);

	foreach ($tokens as $unit => $text) {
		if ($time < $unit) continue;
		$numberOfUnits = floor($time / $unit);
		return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
	}

}
$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$id = $_SESSION['ID'];
$query = "SELECT * FROM `messages` WHERE `Recipient` = '$id' AND `isRead` ='0'";
$result = mysql_query($query,$con);
$new = mysql_num_rows($result);
mysql_close($con);
?>
              <span class="label label-success"><?php echo $new;?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $new;?> new messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                 
                  <?php 
					$con = mysql_connect("localhost", "root", "");
					if(! $con ){
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$id = $_SESSION['ID'];
$query = "SELECT * FROM `messages` WHERE `Recipient` = '$id' AND `isRead` = '0' ORDER BY `messages`.`Date` DESC";
$result = mysql_query($query,$con);
while ($row = mysql_fetch_assoc($result)) {
$sender = $row['Sender'];
$name = "";
$pic = "";
$type = "";
$query2 = "SELECT * FROM `accounts` WHERE `ID` = '$sender'";
$result2 = mysql_query($query2,$con);
while ($row2 = mysql_fetch_assoc($result2)) {
	$type = $row2['Type'];
}
if($type=="Student"){
	$query3 = "SELECT * FROM `students` WHERE `ID` = '$sender'";
	$result3 = mysql_query($query3,$con);
	while ($row3 = mysql_fetch_assoc($result3)) {
		$name = $row3['FName']." ".$row3['LName'];
		$pic = $row3['Picture'];
		if($row3['Picture']!=""){
			$pic = $row3['Picture'];
		}
		else{
			$pic = strtolower($row3['Gender']).".jpg";
		}
	}
}
else if($type=="Prof"){
	$query3 = "SELECT * FROM `instructor` WHERE `ID` = '$sender'";
	$result3 = mysql_query($query3,$con);
	while ($row3 = mysql_fetch_assoc($result3)) {
		$name = $row3['FName']." ".$row3['LName'];
		$pic = strtolower($row3['Gender']).".jpg";
	}
}
else if($type=="Admin"){
	$query3 = "SELECT * FROM `admin` WHERE `ID` = '$sender'";
	$result3 = mysql_query($query3,$con);
	while ($row3 = mysql_fetch_assoc($result3)) {
		$name = $row3['Name'];
		$pic = $row3['Picture'];
	}
}
?>
<li><!-- start message -->
<form id="readNav<?php echo $row['ID'];?>" action="index.php" method="post" role="form">
      						<input type="hidden" name="mailopt" value="Read" />
      						<input type="hidden" name="opt" value="Mail" />
      						<input type="hidden" name="mailid" value="<?php echo $row['ID'];?>" />	
      					</form>
                    <a href="javascript:{}" onclick="document.getElementById('readNav<?php echo $row['ID'];?>').submit();">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="../accounts/<?php echo $pic;?>" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        <?php echo $name;?>
                        <small><i class="fa fa-clock-o"></i> <?php echo tme(strtotime($row['Date']));?></small>
                      </h4>
                      <!-- The message -->
                      <p><?php echo $row['Subject'];?></p>
                    </a>
                  </li>
<?php }mysql_close($con);?>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../accounts/<?php echo $_SESSION["Picture"];?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php  echo $_SESSION["Name"];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../accounts/<?php echo $_SESSION["Picture"];?>" class="img-circle" alt="User Image">

                <p>
                  <?php  echo $_SESSION["Name"];?>
                  <small><?php echo $_SESSION["Course"];?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Subjects</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Clubs</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <li class="user-footer">
                <div class="col-md-12">
                  <a href="../logout.php" class="btn btn-default btn-flat btn-block">Sign out</a>
                </div>
              </li>
              </ul>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>