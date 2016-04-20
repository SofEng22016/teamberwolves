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
                $query = "SELECT * FROM `transactions`";
                $result = mysql_query($query,$con);
                $cash = 0;
                $card = 0;
                while ($row = mysql_fetch_assoc($result)) {
                	if($row['Type']=='Cash'){
                		$cash += $row['Amount'];
                	}
                	else{
                		$card += $row['Amount'];
                	}
                }
                $query = "SELECT * FROM `transactions` JOIN `students` ON `transactions`.`ID` = `students`.`ID` ORDER BY `transactions`.`Date` DESC";
                $result = mysql_query($query,$con);
                while ($row = mysql_fetch_assoc($result)) { ?>
                <li>
              <i class="fa <?php if($row['Type']=='Cash'){?>fa-money <?php }else{?>fa-credit-card <?php }?>bg-green"></i>

              <div class="timeline-item">
           
                <span class="time"><i class="fa fa-clock-o"></i> <?php echo tme(strtotime($row['Date']));?> ago</span>

                <h3 class="timeline-header"><a href="#"><?php echo $row['FName']." ".$row['LName'];?></a></h3>
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
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Total Payment (Card) : <span class="pull-right badge">PHP <?php echo $english_format_number = number_format($card);?></span></a></li>
                <li><a href="#">Total Payment (Cash) : <span class="pull-right badge">PHP <?php echo $english_format_number = number_format($cash);?></span></a></li>
                <li><a href="#">Total : <span class="pull-right badge">PHP <?php echo $english_format_number = number_format($cash+$card);?></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

      

    </section>