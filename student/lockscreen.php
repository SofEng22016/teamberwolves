<?php 
session_start();
$now = time();
if($_SESSION["Type"]!="Student"){
	header("Location: 401.html");
	exit();
}
?>
<!DOCTYPE html>
<html>
<?php include 'headcss.php'; ?>
<body class="hold-transition lockscreen">
<div id="bbox" class="bb-alert alert alert-info" style="display:none; left: 64%; right: 15%; bottom: 54%;">
        <span>The examples populate this alert with dummy content</span>
</div>
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
    <form class="lockscreen-credentials" data-toggle="validator" name="form" role="form" id="sessionForm">
      <div class="input-group">
      	<input type="text" class="form-control" id="id" name="id" value="<?php echo $_SESSION["ID"];?>" style="display:none;">
        <input type="password" class="form-control" id="pass" name="pass" placeholder="password">
        <div class="input-group-btn">
          <a href="" type="button" id="submitSession" data-bb="lock" class="btn"><i class="fa fa-arrow-right text-muted"></i></a>
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
<script src="../js/bb2.js"></script>
<script src="../js/bootbox.js"></script>
    <!-- put all demo code in one place -->
    <script src="../js/bb.js"></script>
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
        	demos.prompt = function() {
                  Example.show("Professor ID: <b>123456</b><br>Name : <b>Bryce Francis</b><br>Created");
        	};
        });
    </script>
</body>
</html>
