<section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-6">
          <!-- The time line -->
          <ul class="timeline">
          <?php 
                $con = mysql_connect("localhost", "root", "");
                if(! $con )
                {
                	die('Could not connect: ' . mysql_error());
                }
                $db = mysql_select_db("enrollment", $con);
                $id = $_SESSION["ID"];
                $query = "SELECT * FROM `balance` WHERE `ID` = '$id'";
                $result = mysql_query($query,$con);
                $total = 0;
                $paid = 0;
                while ($row = mysql_fetch_assoc($result)) {
                	$total = $row['Total'];
                 }
                $query = "SELECT * FROM `transactions` WHERE `ID` = '$id'";
                $result = mysql_query($query,$con);
                while ($row = mysql_fetch_assoc($result)) {
                	$paid += $row['Amount'];
                }
                $query = "SELECT * FROM `transactions` WHERE `ID` = '$id' ORDER BY `transactions`.`Date` DESC";
                $result = mysql_query($query,$con);
                while ($row = mysql_fetch_assoc($result)) { ?>
                <li>
              <i class="fa <?php if($row['Type']=='Cash'){?>fa-money <?php }else{?>fa-credit-card <?php }?>bg-green"></i>

              <div class="timeline-item">
           
                <span class="time"><i class="fa fa-clock-o"></i> <?php echo tme(strtotime($row['Date']));?> ago</span>

                <h3 class="timeline-header"><a href="#">Tuition Payment</a></h3>
                <div class="timeline-body">
                	Amount Paid : PHP <?php echo $english_format_number = number_format($row['Amount']);?>
                	<br>
                	Payment Method : <?php echo $row['Type']?>
                </div>
              </div>
            </li>
                <?php }
                mysql_close($con);?>
            <!-- timeline time label -->
            <!-- /.timeline-label -->
            <!-- timeline item -->
            
            <!-- /.timeline-label -->
          </ul>
        </div>
        <!-- /.col -->
        <div class="col-md-5 col-md-offset-1">
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header" style="background-color: #3c8dbc;">
              <div class="widget-user-image">
                <img class="img-circle" src="../accounts/<?php echo $_SESSION["Picture"];?>" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php  echo $_SESSION["Name"];?></h3>
              <h4 class="widget-user-desc"><?php echo $_SESSION["ID"];?></h4>
              <h5 class="widget-user-desc"><?php echo $_SESSION["Course"];?></h5>
              <br>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Total Tuiton Fee : <span class="pull-right badge">PHP <?php echo $english_format_number = number_format($total);?></span></a></li>
                <li><a href="#">Balance From Last Term : <span class="pull-right badge">PHP 0.00</span></a></li>
                <li><a href="#">Total Amount Paid : <span class="pull-right badge">PHP <?php echo $english_format_number = number_format($paid);?></span></a></li>
                <li><a href="#">Remaining Balance : <span class="pull-right badge">PHP <?php echo $english_format_number = number_format($total - $paid);?></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

      

    </section>