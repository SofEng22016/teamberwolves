<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../js/bootstrap-switch.js"></script>
<script src="../js/bootstrap-select.js"></script>
<script>
$(function(argument) {
    $('#switch').bootstrapSwitch();
  });
$(function(argument) {
    $('#switchGender').bootstrapSwitch();
  });
$(function(argument) {
    $('#switchGender2').bootstrapSwitch();
  });
</script>
<script src="../plugins/fastclick/fastclick.js"></script>
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../js/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<script type="text/javascript">
var idleTime = 0;
$(document).ready(function () {
    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 1000); // 1 minute

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
        $.post('resettime.php', 'val=' + $(this).val(), function (response) {
        });
    });
    $(this).keypress(function (e) {
        idleTime = 0;
        $.post('resettime.php', 'val=' + $(this).val(), function (response) {
        });
    });
});

function timerIncrement() {
    idleTime++;
    if (idleTime > 300) { 
		window.location = "lockscreen.php";
    }else{
    	<?php $_SESSION['expire'] = time() + 300; ?>
    }
}
</script>   
<?php if($opt=="Overview"){?>
<script>
  $(function () {
    "use strict";
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#f39c12", "#dd4b39", "#00c0ef"],
      data: [
        {label: "Computing", value: 7500},
        {label: "Business", value: 6800},
        {label: "Design", value: 11000}
      ],
      hideHover: 'auto'
    });
  });
</script>
<?php }
else if($opt=="Mail"){?>
            
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
<script src="../js/bb2.js"></script>
<script src="../js/fileinput.js"></script>
<script src="../js/bootbox.js"></script>
    <!-- put all demo code in one place -->
    <script src="../js/bb.js"></script>
    <script>
		function sendMessage() {
			var rec = $("#to").val();
			var mes = $("#mes").val();
			alert(mes);
			Example.show("<h3>Message Sent</h3>");
		}
	</script>
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
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>
<?php }
else if($opt=="Calendar"){?>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/moment.min.js"></script>
<script src="../plugins/fullcalendar/fullcalendar.min.js"></script>
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
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
      },
      //Random default events
      events: [ {
		   	title: 'test',
		   	start: new Date(y,m,20),
		   	backgroundColor: "green",
		    borderColor: "green",
		   },
               <?php
            		   $con = mysql_connect("localhost", "root", "");
            		   $db = mysql_select_db("enrollment", $con);
            		   $query = "SELECT * FROM `events`;";
            		   $result = mysql_query($query,$con);
            		   while ($row = mysql_fetch_assoc($result)) { ?>
            		   {
            		   	title: '<?php echo $row['Title'];?>',
            		   	start: new Date(<?php echo $row['Start'];?>),
            		   	<?php if($row['End']!=''){?>
						end: new Date(<?php echo $row['End'];?>),
            		   	<?php }?>
            		   	backgroundColor: "#<?php echo $row['Color']; ?>",
            		    borderColor: "#<?php echo $row['Color']; ?>",
            		   },
            		   <?php } mysql_close($con); ?>
               {
                   title: 'Chinese New Year',
                   start: new Date(y, m, 8),
                   allDay: false,
                   backgroundColor: "#00c0ef",
                   borderColor: "#00c0ef"
               }
      ],
      editable: false,
      droppable: false,
      allDaySlot: false,
      allDaySlot: false,
      //defaultView: "basicWeek",
      minTime: "08:00:00",
      maxTime: "22:00:00",
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
<?php } else if($opt=="Faculty"){?>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
document.getElementById("idres").disabled = true;
document.getElementById("idval").disabled = true;
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script>
$('#searchInstructor').on('keyup keypress', function(e) {
	  var keyCode = e.keyCode || e.which;
	  if (keyCode === 13) { 
	    e.preventDefault();
	    $( "#searchInstructorBtn" ).click();
	    return false;
	  }
	});
function searchIns() {
	var search = $("#srch").val();
	if (search != ''){
		$.post("searchfaculty.php", {
			search: search
		}, function(data) {
			var res = data;
			res = data.split("-");
			if (res != ''){
				$('#delins').removeClass('disabled');
	        	$('#editins').removeClass('disabled');
				$("#idres").attr('placeholder',res[0]);
				$("#fnameres").attr('placeholder',res[1]);
				$("#mnameres").attr('placeholder',res[2]);
				$("#lnameres").attr('placeholder',res[3]);
				if(res[4]=='Male'){
					$('#switchGender2').bootstrapSwitch('state', true);
				}
				else{
					$('#switchGender2').bootstrapSwitch('state', false);
				}
			}
			else{
				$('#delins').addClass('disabled');
	        	$('#editins').addClass('disabled');
				$("#idres").attr('placeholder','ID Number');
				$("#fnameres").attr('placeholder','First Name');
				$("#mnameres").attr('placeholder','Middle Name');
				$("#lnameres").attr('placeholder','Last Name');
			}
		});
	}
}
</script>
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
<?php }else if($opt=="Student"){?>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<?php }else if($opt=="Guest"){?>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<?php }else if($opt=="Schedule"){?>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/moment.min.js"></script>
<script src="../plugins/fullcalendar/fullcalendar.min.js"></script>

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
    		$con = mysql_connect("localhost", "root", "");
    		if(! $con )
    		{
    			die('Could not connect: ' . mysql_error());
    		}
    		$db = mysql_select_db("enrollment", $con);
    		$query = "SELECT * FROM `tempsubjects` WHERE `ID` = '$id' ";
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
    		mysql_close($con); ?>
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
<?php }elseif ($opt=="Enrollment"){?>

<script src="../js/bb2.js"></script>
<script src="../js/bootbox.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../card/jquery.creditCardValidator.js"></script>
    <!-- put all demo code in one place -->
    <script src="../js/bb.js"></script>
    <script>
    $("#cashSubmit").click(function(){
    	var id = "<?php echo $_SESSION["ID"];?>";
    	var amount = $("#amount").val();
    	var total = $("#total").val();
    	$.post("cashsubmit.php", {
    		amount: amount,
    		id: id,
    		total:total
		}, function(data) {
			if(data!=''){
				Example.show("<h3>Successfully Enrolled</h3>");
			}
		});
    	setTimeout(function(){
    		   window.location.reload(1);
    		}, 5000);
    });
    $("#cardSubmit").click(function(){
    	var id = "<?php echo $_SESSION["ID"];?>";
    	var cnum = $("#cnumber").val();
    	var amount = $("#camount").val();
    	var total = $("#total").val();
    	$.post("cardsubmit.php", {
    		amount: amount,
    		id: id,
    		cnum: cnum,
    		total:total
		}, function(data) {
			if(data!=''){
				Example.show("<h3>Successfully Enrolled</h3>");
			}
		});
    	setTimeout(function(){
    		   window.location.reload(1);
    		}, 5000);
    });
    $( "#cnumber" ).keyup(function() {
    	$('#cnumber').validateCreditCard(function(result) {
			document.getElementById("cc-default").style.display = "inline-block";
			document.getElementById("cc-visa").style.display = "none";
			document.getElementById("cc-master").style.display = "none";
			document.getElementById("cc-amex").style.display = "none";
			document.getElementById("cc-diners").style.display = "none";
			document.getElementById("cc-jcb").style.display = "none";
			document.getElementById("cc-discover").style.display = "none";
        	if(result.card_type != null && result.valid){
            	if(result.card_type.name=='visa'){
        			document.getElementById("cc-default").style.display = "none";
        			document.getElementById("cc-visa").style.display = "inline-block";
                }
            	if(result.card_type.name=='mastercard'){
        			document.getElementById("cc-default").style.display = "none";
        			document.getElementById("cc-master").style.display = "inline-block";
                }
            	if(result.card_type.name=='amex'){
        			document.getElementById("cc-default").style.display = "none";
        			document.getElementById("cc-amex").style.display = "inline-block";
                }
            	if(result.card_type.name=='diners_club_carte_blanche'){
        			document.getElementById("cc-default").style.display = "none";
        			document.getElementById("cc-diners").style.display = "inline-block";
                }
            	if(result.card_type.name=='jcb'){
        			document.getElementById("cc-default").style.display = "none";
        			document.getElementById("cc-jcb").style.display = "inline-block";
                }
            	if(result.card_type.name=='discover'){
        			document.getElementById("cc-default").style.display = "none";
        			document.getElementById("cc-discover").style.display = "inline-block";
                }
        	}
        });

    });
    $("#remSubjects").click(function(){
    	var chked = $("input[name=subjectsCheckbox]:checked").map(function () {return this.value;}).get().join("-");
    	var id = "<?php echo $_SESSION["ID"];?>";
    	$.post("removechecked.php", {
    		chked: chked,
    		id: id
		}, function(data) {
			if(data!=''){
				Example.show("<h3>Subject/s Removed</h3>");
			}
		});
    	setTimeout(function(){
    		   window.location.reload(1);
    		}, 5000);
    });
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
    <?php }?>
