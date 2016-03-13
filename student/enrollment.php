<?php
$con = mysql_connect("localhost", "root", "");
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `school`";
$result = mysql_query($query,$con);
$enrollment = false;
while ($row = mysql_fetch_assoc($result)) {
	$enrollment = strtolower($row['Enrollment']);
}
if($enrollment=='true'){
	include 'enroll.php';
}
else{ ?>
<section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Online Enrollment Not Available.</h3>

          <p>
            Online Enrollment is currently disabled
            Meanwhile, you may <a href="index.php">go back</a> or try to <a href="index.php">contact the site administrator.</a>
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
<?php } ?>