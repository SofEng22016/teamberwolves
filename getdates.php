<?php
$months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
$days = array(31,29,31,30,31,30,31,31,30,31,30,31);
$dayName = array("Sunday","Monday","Tuesday","Wednesday","Thurdsay","Friday","Saturday");
$totalDays = 0;
$totalWeeks = 0;
for($x=0;$x<count($months);$x++){
	$totalDays += $days[$x];
}
for($x=0;$x<$totalDays;$x++){
	if($x%7==0&&$x!=0){
		$totalWeeks++;
	}
}
$startDay = 5;

for($x=0;$x<count($months);$x++){
	echo "<h3>".$months[$x]."</h3>";
	echo "<table border='1'>";
	echo "<tr>";
	for($y=0;$y<count($dayName);$y++){
		echo "<th>".$dayName[$y]."</th>";
	}
	echo "</tr>";
	////
	echo "<tr>";
	$d = array("","M","T","W","TH","F","S");
	$chosenDate = 4;
	for($y=0,$dayCounter=1;$y<$days[$x]+$startDay;$y++){
		if($y<$startDay){
			echo "<td>&nbsp;</td>";
		}
		else{
			if($dayCounter<=$days[$x]){
				echo "<td>";
				if($y%7==$chosenDate&&$y!=0){
					echo "<b>";
				}
				echo $dayCounter;
				if($y%7==$chosenDate&&$y!=0){
					echo "</b>";
				}
				echo "</td>";
			}
			$dayCounter++;
		}
		if(($y+1)%7==0&&$y!=0){
			echo "</tr>";
		}
		if($dayCounter==$days[$x]+1){
			$startDay = ($y+1)%7;
		}
	}
	echo "</tr>";
	////
	echo "</table>";
}
?>
<?php
		$con = mysql_connect("localhost", "root", "");
		if(! $con )
		{
			die('Could not connect: ' . mysql_error());
		}
		$db = mysql_select_db("enrollment", $con);
		$query = "SELECT * FROM `tempsubjects` WHERE `ID` = '201501280' ";
		$result = mysql_query($query,$con);
		$subjects = array();
		while ($row = mysql_fetch_assoc($result)) {
			$subjects = explode("-", $row['Subjects']);
		}
		$subjectInfo = array(array());
		$dys = array("","M","T","W","TH","F","S");
		for($x=0;$x<count($subjects);$x++){
			$query = "SELECT * FROM `subject12016` WHERE `SID` = '$subjects[$x]' ";
			$result = mysql_query($query,$con);
			$id = "";
			while ($row = mysql_fetch_assoc($result)) {
				$subjectInfo[$x][0] = $row['SCode'];   //Title------0
				for($y=0;$y<count($dys);$y++){			
					if($row['Day']==$dys[$y]){
						$subjectInfo[$x][1] = $y;		//day/week----1
					}
				}
				if(strlen($row['Time'])==4){
					$subjectInfo[$x][2] = substr($row['Time'], 0, 2);      //time/hour----2
				}
				else{
					$subjectInfo[$x][2] = substr($row['Time'], 0, 1);
				}
				$subjectInfo[$x][3] = substr($row['Time'], -2); 
				$id = $row['SCode'];           //time/min----2
				$subjectInfo[$x][6] = $row['SID'];       
			}
			$query = "SELECT * FROM `subject_info` WHERE `SCode` = '$id' ";
			$result = mysql_query($query,$con);
			while ($row = mysql_fetch_assoc($result)) {
				$subjectInfo[$x][4] = ($subjectInfo[$x][2]+($row['Lab']+$row['Lec']));  //lab
				$subjectInfo[$x][5] = $row['Lec'];	//lec
			}
		}
		mysql_close($con);
		for($x=0;$x<count($subjectInfo);$x++){
			echo $subjectInfo[$x][0]."-".$subjectInfo[$x][1]."-".$subjectInfo[$x][2].":".$subjectInfo[$x][3]."---".$subjectInfo[$x][4].":".$subjectInfo[$x][3]."<br>";
		}	
		?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>myPage | <?php echo $_SESSION["Name"];?></title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/ionicons.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
<link href="css/bootstrap-switch.css" rel="stylesheet">
<link rel="stylesheet" href="plugins/morris/morris.css">
<link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
<link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bb.css" />
<link rel="stylesheet" type="text/css" href="css/radiocheck.css" />
</head>
	<body class="skin-blue sidebar-mini hold-transition bb-js">
		<div class="wrapper">
<section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</section>
</div>
</body>
  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="js/bootstrap-switch.js"></script>
    <script src="js/jquery-ui.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="plugins/fullcalendar/fullcalendar.min.js"></script>
<script>

  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        

      });
    }

    ini_events($('#external-events div.external-event'));

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
      
      //Random default events
      events: [ {
		   	title: 'test',
		   	start: new Date(y,m,20),
		   	backgroundColor: "green",
		    borderColor: "green",
		   },
               <?php
for($i=0;$i<count($subjectInfo);$i++){
	$startDay = 5;
	for($x=0;$x<count($months);$x++){
		$chosenDate = $subjectInfo[$i][1];
		for($y=0,$dayCounter=1;$y<$days[$x]+$startDay;$y++){
			if($y<$startDay){
			}
			else{
				if($dayCounter<=$days[$x]){
					if($y%7==$chosenDate&&$y!=0){ ?>
					{
            		   	title: '<?php echo $subjectInfo[$i][0];?>',
            		   	start: new Date(y,<?php echo $x.",".$dayCounter.",".$subjectInfo[$i][2].",".$subjectInfo[$i][3]?>),
            		   	<?php if($row['End']!=''){?>
						end: new Date(y,<?php echo $x.",".$dayCounter.",".$subjectInfo[$i][4].",".$subjectInfo[$i][3]?>),
            		   	<?php }?>
            		   	backgroundColor: "#00c0ef",
            		    borderColor: "#00c0ef",
            		   },
						<?php 
					}
				}
				$dayCounter++;
			}
			if($dayCounter==$days[$x]+1){
				$startDay = ($y+1)%7;
			}
		}
	}
?>
            		   
            		   <?php 
}  ?>
               {
                   title: 'Chinese New Year',
                   start: new Date(y, m-1, 8),
                   allDay: false,
                   backgroundColor: "#00c0ef",
                   borderColor: "#00c0ef"
               }
      ],
      editable: false,
      droppable: false,
      allDaySlot: false,
      allDaySlot: false,
      defaultView: "agendaWeek",
      minTime: "08:00:00",
      maxTime: "21:01:00",
      slotDuration: "00:15:01",
      hiddenDays: [0],
      drop: function (date, allDay) { 

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);

        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css("background-color");
        copiedEventObject.borderColor = $(this).css("border-color");

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }

      }
    });

    /* ADDING EVENTS */
    var currColor = "#3c8dbc"; //Red by default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
      e.preventDefault();
      //Save color
      currColor = $(this).css("color");
      //Add color effect to button
      $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
    });
    $("#add-new-event").click(function (e) {
      e.preventDefault();
      //Get value and make sure it is not null
      var val = $("#new-event").val();
      if (val.length == 0) {
        return;
      }

      //Create events
      var event = $("<div />");
      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);

      //Add draggable funtionality
      ini_events(event);

      //Remove event from text input
      $("#new-event").val("");
    });
  });
</script>
</html>