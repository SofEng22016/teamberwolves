<?php 
session_start();
$now = time();
if($_SESSION["Type"]!="Admin"){
	header("Location: 401.html");
	exit();
}
?>
<!DOCTYPE html>
<html>
<?php include 'headcss.php'; ?>
<body class="hold-transition lockscreen">
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="../logout.php"><b>my</b>PAGE</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><?php echo $_SESSION["Name"];?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="../accounts/<?php echo $_SESSION["Picture"];?>" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" id="sessionForm">
      <div class="input-group">
      	<input type="text" class="form-control" id="id" name="id" value="<?php echo $_SESSION["ID"];?>" style="display:none;">
        <input type="password" class="form-control" id="pass" name="pass" placeholder="password">
        <div class="input-group-btn">
          <button type="button" id="submitSession" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a href="../logout.php">Or sign in as a different user</a>
  </div>
  <div class="lockscreen-footer text-center">
    <strong>Copyright &copy; 2016 <a href="#">Team-Berwolves</a>.</strong> All rights reserved.
  </div>
</div>
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="session.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
