<aside class="main-sidebar">
	<?php include 'checkenrollment.php';?>
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../accounts/<?php echo $_SESSION["Picture"];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php  echo $_SESSION["Name"];?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <form id="mailnav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Mail" />
      </form>
      <form id="calnav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Calendar" />
      </form>
      <form id="facnav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Faculty" />
      </form>
      <form id="stunav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Student" />
      </form>
      <form id="guestnav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Guest" />
      </form>
      <form id="appnav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Applications" />
      </form>
      <form id="subnav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Subjects" />
      </form>
      <form id="curnav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Curriculum" />
      </form>
      <form id="finnav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Finance" />
      </form>
      <form id="finnav" action="index.php" method="post" role="form">
      <ul class="sidebar-menu">
        <li>
        <a href="#">
        	<i class="fa fa-plus"></i>
        	<span>Enrollment</span>
        	<span class="pull-right" style="margin-top: -12px;">
        		<input id="switch" type="checkbox"
				<?php if($enrollment=='True'){?>
				 checked="true" 
				<?php }?>
				class="BSswitch" onSwitchChange="toggleEnrollment()" data-on-color="success" data-off-color="danger" data-on-text="I" data-off-text="O" data-size="mini">
			</span>
        </a>
        </li>
        <li><a href="javascript:{}" onclick="document.getElementById('mailnav').submit();"><i class="fa fa-envelope"></i><span>Mail</span></a></li>
        <li><a href="javascript:{}" onclick="document.getElementById('calnav').submit();"><i class="fa fa-calendar"></i><span>Calendar</span></a></li>
        <li class="header">Options 
		<?php echo "$opt";?></li>
		<li><a href="javascript:{}" onclick="document.getElementById('facnav').submit();"><i class="fa fa-university"></i><span>Faculty</span></a></li>
		<li><a href="javascript:{}" onclick="document.getElementById('stunav').submit();"><i class="fa fa-user"></i><span>Students</span></a></li>
		<li><a href="javascript:{}" onclick="document.getElementById('guestnav').submit();"><i class="fa fa-users"></i><span>Guests</span></a></li>
		<li><a href="javascript:{}" onclick="document.getElementById('subnav').submit();"><i class="fa fa-book"></i><span>Subjects</span></a></li>
		<li><a href="javascript:{}" onclick="document.getElementById('curnav').submit();"><i class="fa fa-file-text-o"></i><span>Curriculum</span></a></li>
		<li><a href="javascript:{}" onclick="document.getElementById('finnav').submit();"><i class="fa fa-money"></i><span>Finance</span></a></li>
      </ul>
      </form>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>