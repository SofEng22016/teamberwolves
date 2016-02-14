<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../js/bootstrap-switch.js"></script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<?php if($opt=="Overview"){?>
<script>
  $(function () {
    "use strict";
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#f39c12", "#dd4b39", "#00c0ef"],
      data: [
        {label: "Computing", value: 12},
        {label: "Business", value: 30},
        {label: "Design", value: 20}
      ],
      hideHover: 'auto'
    });
  });
</script>
<?php }
else if($opt=="Mail"){?>
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
      buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
      },
      //Random default events
      events: [
               {
                   title: 'Midterm Exams',
                   start: new Date(y, m, 4,8),
                   end: new Date(y, m, 6,21),
                   backgroundColor: "#f56954",
                   borderColor: "#f56954"
                 }, {
                     title: 'Some Event',
                     start: new Date(y, m, 22),
                     end: new Date(y, m, 25),
                     backgroundColor: "#00a65a",
                     borderColor: "#00a65a"
                   },
        {
            title: 'Faculty Meeting 1',
            start: new Date(y, m, d - 5),
            backgroundColor: "#f39c12", 
            borderColor: "#f39c12"
          },
          {
              title: 'Faculty Meeting 2',
              start: new Date(y, m, 12),
              backgroundColor: "#f39c12", 
              borderColor: "#f39c12"
            },
            {
                title: 'Faculty Meeting 3',
                start: new Date(y, m, 16),
                backgroundColor: "#f39c12", 
                borderColor: "#f39c12"
              },
        {
          title: 'Chinese New Year',
          start: new Date(y, m, 8),
          allDay: false,
          backgroundColor: "#00c0ef",
          borderColor: "#00c0ef"
        },
        {
          title: 'Valentines Day',
          start: new Date(y, m, 14),
          allDay: false,
          backgroundColor: "#00c0ef",
          borderColor: "#00c0ef" 
        },
        {
          title: 'General Assembly',
          start: new Date(y, m, 18),
          backgroundColor: "#3c8dbc", 
          borderColor: "#3c8dbc" 
        }
      ],
      editable: true,
      droppable: true,
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
				$("#idres").attr('placeholder','ID Number');
				$("#fnameres").attr('placeholder','First Name');
				$("#mnameres").attr('placeholder','Middle Name');
				$("#lnameres").attr('placeholder','Last Name');
			}
		});
	}
}
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
<?php }?>
