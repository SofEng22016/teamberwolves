<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../accounts/<?php echo $_SESSION["Picture"];?>" class="img-circle" alt="User Image" style="height: 60px;">
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
      <form id="optnav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Options" />
      </form>
      <form id="mailnav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Mail" />
      </form>
      <form id="calnav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Calendar" />
      </form>
      <form id="setnav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Settings" />
      </form>
      <form id="reqnav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Request" />
      </form>
      <form id="guestnav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Guest" />
      </form>
      <form id="ennav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Enrollment" />
      </form>
      <form id="gradenav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Grades" />
      </form>
      <form id="schednav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Schedule" />
      </form>
      <form id="subnav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Subjects" />
      </form>
      <form id="finnav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Finance" />
      </form>
      <form id="profnav" action="index.php" method="post" role="form">
      	<input type="hidden" name="opt" value="Profile" />
      </form>
      <ul class="sidebar-menu">
        <li><a href="javascript:{}" onclick="document.getElementById('optnav').submit();"><i class="fa fa-link"></i><span>Options</span></a></li>
        <li><a href="javascript:{}" onclick="document.getElementById('mailnav').submit();"><i class="fa fa-envelope"></i><span>Mail</span></a></li>
        <li><a href="javascript:{}" onclick="document.getElementById('calnav').submit();"><i class="fa fa-calendar"></i><span>Calendar</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>