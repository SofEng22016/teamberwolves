<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../js/bootstrap-switch.js"></script>
<?php if($opt!="Curriculum"){?>
<script src="../js/bootstrap-select.js"></script>
<?php }?>
<script src="../js/fileinput.js"></script>
<script src="../js/theme.js"></script>
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
$('#switch').on('switchChange.bootstrapSwitch', function(event, state) {
	  toggleEnrollment();
	});
function toggleEnrollment() {
	var enroll;
	if ($('#switch').is(":checked"))
	{
	  enroll = "True";
	}
	else{
	  enroll = "False";
	}
		$.post("toggleenrollment.php", {
			enroll: enroll
		}, function(data) {
		});
}
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
    if (idleTime > 30) { 
		window.location = "lockscreen.php";
    }else{
    	<?php $_SESSION['expire'] = time() + 30; ?>
    }
}
</script>   
<?php if($opt=="Overview"){?>
<script src="../plugins/chartjs/Chart.min.js"></script>
<?php 
$con = mysql_connect("localhost", "root", "");
$found = 0;
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$query = "SELECT * FROM `students`";
$result = mysql_query($query,$con);
$cs = 0;
$ba = 0;
$bs = 0;
while ($row = mysql_fetch_assoc($result)) {
	if($row['Course']=='CS-SE' || $row['Course']=='CS-WD' || $row['Course']=='CS-GD'){
		$cs++;	
	}
	else if($row['Course']=='BA-MMA' || $row['Course']=='BA-Anim' || $row['Course']=='BA-FD'){
		$ba++;	
	}
	else if($row['Course']=='BS-MM' || $row['Course']=='BS-FM'){
		$bs++;	
	}
}
?>
<script>
  $(function () {
    "use strict";
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#f39c12", "#dd4b39", "#00c0ef"],
      data: [
        {label: "Computing", value: <?php echo $cs;?>},
        {label: "Business", value: <?php echo $bs;?>},
        {label: "Design", value: <?php echo $ba;?>}
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
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
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
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        });
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
      eventClick: function(calEvent, jsEvent, view) {

	        //alert('Event: ' + calEvent.title);
            //alert(JSON.stringify(calEvent.start)); 
            var str = JSON.stringify(calEvent.start);
            var date = str.split("T");
            var date2 = date[0].split("\"");
            var date3 = date2[1].split("-");
            date3[2]++;
            var dte = "";
            if(date3[2]<9){
				dte = '0' + date3[2].toString();
            }
            else{
            	dte = date3[2];
            }
            var finalDate = date3[0] + "," +  (date3[1]-1) + "," + dte;
            /*alert(finalDate);
            alert(calEvent.backgroundColor);
    	    */
			$.post("deleteevent.php", {
			title: calEvent.title,
			start: finalDate,
			color: calEvent.backgroundColor
			}, function(data) {
			});
    	    $('#calendar').fullCalendar('removeEvents', function (event) {
    	        return event == calEvent;
    	    });
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
      },
      //Random default events
      events: [ 
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
                   start: new Date(y, 1, 8),
                   allDay: false,
                   backgroundColor: "#00c0ef",
                   borderColor: "#00c0ef"
               }
      ],
      editable: true,
      droppable: true,
      allDaySlot: false,
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
        var line = '';
        var acc = false;
        	for (i = 0; i < copiedEventObject.backgroundColor.length; i++) { 
        	    if(copiedEventObject.backgroundColor.charAt(i)==')'){
					acc = false;
            	}
            	if(acc){
					line += copiedEventObject.backgroundColor.charAt(i);
            	}
        	    if(copiedEventObject.backgroundColor.charAt(i)=='('){
					acc = true;
            	}
        	}
            line = line.replace(' ','');
            line = line.replace(' ','');
            line = line.replace(' ','');
            var colors = line.split(",");var title = JSON.stringify(originalEventObject).split(":");
    		var cnter = 0;
    		var titleString = '';
    		for (i = 0; i < title[1].length-2; i++) { 
               	if(cnter==1){
               		titleString += title[1].charAt(i);
               	}
                if(title[1].charAt(i)=='"'){
    				cnter++;
               	}
           	}
            var dates = JSON.stringify(date);
            var dte = '';
            for (i = 1; i < dates.length-15; i++) { 
            	dte += dates.charAt(i);
        	}
            var dteSplit = dte.split("-");
        	var dateString = dteSplit[0].toString() + "," + (dteSplit[1]-1).toString() + "," + dteSplit[2].toString()
            var colors2 = ["", "", ""];
		for (i = 0; i < colors.length; i++) { 
			if(parseInt(colors[i])==0){
				colors2[i] = '00';
			}
			else{
				colors2[i] = parseInt(colors[i]).toString(16);
			}
		}
    	var hexString = colors2[0] + colors2[1] + colors2[2];
    	
        $.post("addevent.php", {
			date: dateString,
			title: titleString,
			color: hexString
		}, function(data) {
		});
		
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
      var val = $("#new-event").val();
      if (val.length == 0) {
        return;
      }
      var event = $("<div />");
      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);
      ini_events(event);
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
$(document).ready(function(){
	$("#editins").click(function(){
		var id = $("#idres").attr('placeholder');
		var fName = $("#fnameres").val();
		var mName = $("#mnameres").val();
		var lName = $("#lnameres").val();
		var email = $("#emailres").val();
		var gender;
		if ($('#switchGender2').is(":checked"))
		{
		  gender = "Male";
		}
		else{
			gender = "Female";
		}
		if (email == ''){
			email =  $("#emailres").attr('placeholder');
		}
		if (fName == ''){
			fName =  $("#fnameres").attr('placeholder');
		}
		if (mName == ''){
			mName =  $("#mnameres").attr('placeholder');
		}
		if (lName == ''){
			lName =  $("#lnameres").attr('placeholder');
		}
		$.post("editfaculty.php", {
			email: email,
			fName: fName,
			mName: mName,
			lName: lName,
			gender: gender,
			id: id
		}, function(data) {
			Example.show("Successfully Edited Instructor");
		});
	});
});
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
				$("#emailres").attr('placeholder',res[5]);
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
				$("#emailres").attr('placeholder','Email Address');
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
<?php }else if($opt=="Subjects"){?>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../js/bootstrap-select.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
document.getElementById("prof2").disabled = true;
document.getElementById("day2").disabled = true;
document.getElementById("time2").disabled = true;
document.getElementById("room2").disabled = true;
$(document).ready(function() {
    $('#example1').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
} );
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable();
  });
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
<?php }else if($opt=="Grades"){?>
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
<?php }
else if ($opt=="Curriculum"){?>
<script src="../js/example.js"></script>
<script src="../js/bootbox.js"></script>
<?php }?>

