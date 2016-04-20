/**
 * Bootbox Demos; crude, but effective...
 */
$(function() {
    var demos = {};

    $(document).on("click", "a[data-bb]", function(e) {
        e.preventDefault();
        var type = $(this).data("bb");

        if (typeof demos[type] === 'function') {
            demos[type]();
        }
    });

    // let's namespace the demo methods; it makes them easier
    // to invoke
    demos.alert = function() {
        bootbox.alert("Hello world!");
    };

    demos.alert_callback = function() {
       Example.show("Hello world callback");
    };

    demos.confirm = function() {
        bootbox.confirm("Are you sure?", function(result) {
            Example.show("Confirm result: "+result);
        });
    };

    demos.alert_button = function() {
        bootbox.alert("This alert has custom button text", "So it does!");
    };
    
    demos.subjectnew = function() {
    	var code = $("#code").val();
    	var name = $("#name").val();
    	var desc = $("#desc").val();
    	var lab = $("#lab").val();
    	var lec = $("#lec").val();
    	var req = $("#req").val();
    	if(code==''||name==''||desc==''||lab==''||lec==''){
    		$('#bbox').removeClass('alert-info');
        	$('#bbox').addClass('alert-danger');
        	Example.show("<h4>Subject Creation Failed</h4>");
    	}
    	$.post("addsubject.php", {
			code: code,
			name: name,
			desc: desc,
			lab: lab,
			lec: lec,
			req: req
		}, function(data) {
			if(data=='Exists'){
				$('#bbox').removeClass('alert-info');
	        	$('#bbox').addClass('alert-danger');
	        	Example.show("<h4>Subject Already Exists</h4>");
			}
			else{
				Example.show(data);
			}
		});
    };

    demos.confirm_buttons = function() {
        bootbox.confirm("This confirm has custom buttons - see?", "No", "Yes!", function(result) {
            if (result) {
                Example.show("Well done!");
            } else {
                Example.show("Oh no - try again!");
            }
        });
    };

    demos.prompt_default_value2 = function(){
    	var id = $("#idval").attr('placeholder');
    	var fname = $("#fnameval").val();
    	var mname = $("#mnameval").val();
    	var lname = $("#lnameval").val();
    	var email = $("#emailval").val();
    	var course = $("#courseval").val();
    	var year = $("#yearval").val();
    	var birthdate = $("#birthval").val();
    	var gender;
    	if($('#switchGender').is(':checked')){
    		gender = 'Male';
    	}
    	else{
    		gender = 'Female';
    	}
    	if(fname==''||mname==''||lname==''||email==''||course==''||year==''||birthdate==''){
    		$('#bbox').removeClass('alert-info');
        	$('#bbox').addClass('alert-danger');
        	Example.show("<h4>Student Creation Failed</h4>");
    	}
    	else{
    		$.post("checkinstructor.php", {
    			id: id,
				fname: fname,
				lname: lname,
				email: email
			}, function(data) {
				if(data == 'Exists'){
					$('#bbox').removeClass('alert-info');
		        	$('#bbox').addClass('alert-danger');
		        	Example.show("<h4>Account Already Exists</h4>");
				}
				else{
					$.post("createinstructor.php", {
						id: id,
						fname: fname,
						lname: lname,
						mname: mname,
						email: email,
						gender: gender
					}, function(data) {
						$('#bbox').removeClass('alert-danger');
			        	$('#bbox').addClass('alert-info');
			        	Example.show("<h3>Account Created</h3><br>Professor ID: <b>"+id+"</b><br>Name : <b>"+fname+" "+mname+" "+fname +"</b><br>Email : <b>"+email+"</b><br>Gender: "+gender);
					});
				}
			});
    	}
    };
    
    demos.prompt_default_value = function(){
    	var id = $("#idval").attr('placeholder');
    	var fname = $("#fnameval").val();
    	var mname = $("#mnameval").val();
    	var lname = $("#lnameval").val();
    	var email = $("#emailval").val();
    	var gender;
    	if($('#switchGender').is(':checked')){
    		gender = 'Male';
    	}
    	else{
    		gender = 'Female';
    	}
    	if(fname==''||mname==''||lname==''||email==''){
    		$('#bbox').removeClass('alert-info');
        	$('#bbox').addClass('alert-danger');
        	Example.show("<h4>Account Creation Failed</h4>");
    	}
    	else{
    		$.post("checkinstructor.php", {
    			id: id,
				fname: fname,
				lname: lname,
				email: email
			}, function(data) {
				if(data == 'Exists'){
					$('#bbox').removeClass('alert-info');
		        	$('#bbox').addClass('alert-danger');
		        	Example.show("<h4>Account Already Exists</h4>");
				}
				else{
					$.post("createinstructor.php", {
						id: id,
						fname: fname,
						lname: lname,
						mname: mname,
						email: email,
						gender: gender
					}, function(data) {
						$('#bbox').removeClass('alert-danger');
			        	$('#bbox').addClass('alert-info');
			        	Example.show("<h3>Account Created</h3><br>Professor ID: <b>"+id+"</b><br>Name : <b>"+fname+" "+mname+" "+fname +"</b><br>Email : <b>"+email+"</b><br>Gender: "+gender);
					});
				}
			});
    	}
    };
    
    demos.student = function(){
    	var id = $("#idval").attr('placeholder');
    	var fname = $("#fnameval").val();
    	var mname = $("#mnameval").val();
    	var lname = $("#lnameval").val();
    	var email = $("#emailval").val();
    	var course = $("#courseval").val();
    	var year = $("#yearval").val();
    	var birthdate = $("#birthval").val();
    	var gender;
    	if($('#switchGender').is(':checked')){
    		gender = 'Male';
    	}
    	else{
    		gender = 'Female';
    	}
    	if(fname==''||mname==''||lname==''||email==''||course==''||year==''||birthdate==''){
    		$('#bbox').removeClass('alert-info');
        	$('#bbox').addClass('alert-danger');
        	alert(email + course + year+ birthdate);
        	Example.show("<h4>Student Creation Failed - Please Check All Input</h4>");
    	}
    	else{
    		$.post("checkstudent.php", {
    			id: id,
				fname: fname,
				lname: lname,
				email: email
			}, function(data) {
				if(data == 'Exists'){
					$('#bbox').removeClass('alert-info');
		        	$('#bbox').addClass('alert-danger');
		        	Example.show("<h4>Account Already Exists</h4>");
				}
				else{
					$.post("createstudent.php", {
						id: id,
						fname: fname,
						lname: lname,
						mname: mname,
						email: email,
						course: course,
						year: year,
						gender: gender,
						birthdate: birthdate
					}, function(data) {
						$('#bbox').removeClass('alert-danger');
			        	$('#bbox').addClass('alert-info');
			        	Example.show("<h3>Account Created</h3><br>Student ID: <b>"+id+"</b><br>Name : <b>"+fname+" "+mname+" "+fname +"</b><br>Email : <b>"+email+"</b><br>Gender: "+gender+"</b><br>Birthdate: "+gender);
					});
				}
			});
    	}
    };
    demos.subject2 = function(){
    	var time = $("#time").val();
    	time = time.split(":");
    	alert(time[0]+time[1]);
    }
    demos.subject = function(){
    	document.getElementById("insFound").style.display = "none";
		document.getElementById("rasFound").style.display = "none";
    	var code = $("#scode").val();
    	var section = $("#sec").val();
    	var room = $("#room").val();
    	var time1 = $("#time").val();
    	var day = $("#day").val();
    	var prof = $("#prof").val();
    	time1 = time1.split(":");
    	var time = time1[0]+time1[1];
    	if(prof==''){
    		prof = '0';
    	}
    	if(code==''||section==''||room==''||time==''||day==''){
    		$('#bbox').removeClass('alert-info');
        	$('#bbox').addClass('alert-danger');
        	Example.show("<h4>Subject Creation Failed - Please Check All Input</h4>");
    	}
    	else{
    		$.post("checksubject.php", {
    			time: time,
				day: day,
				prof: prof,
				room: room
			}, function(data) {
				var res = data;
				res = data.split(",");
				if(data == 'Proceed'){
					$.post("createsubject.php", {
						code: code,
						section: section,
						time: time,
						day: day,
						prof: prof,
						room: room
					}, function(data) {
						$('#bbox').removeClass('alert-danger');
			        	$('#bbox').addClass('alert-info');
			        	Example.show("<h3>Subject Successfully Created</h3><br>Subject Code: <b>"+code+"</b><br>Section : <b>"+section+"</b><br>Day : <b>"+day+" - "+ time +"</b><br>Room: "+room+"</b><br>Instructor: "+prof);
					});
				}
				else{
					$('#conflictModal').modal('show'); 
					$('#bbox').removeClass('alert-info');
		        	$('#bbox').addClass('alert-danger');
					$("#time2").attr('placeholder',res[1]);
					$("#day2").attr('placeholder',res[0]);
					$("#prof2").attr('placeholder',res[3]);
					$("#room2").attr('placeholder',res[2]);
					if(res[4]=="Instructor"){
						document.getElementById("insFound").style.display = "block";
					}
					else{
						document.getElementById("rasFound").style.display = "block";
					}
		        	Example.show("<h4>Subject Creation Failed - Conflict Found " + res[4] + "</h4>");
				}
			});
    	}
    };
    demos.lock = function(){
		$('#bbox').addClass('alert-danger');
    	$('#bbox').removeClass('alert-info');
		Example.show("<h4>Invalid Password</h4>");
    };
    
    demos.dialog = function() {
      bootbox.dialog({
        message: "I am a custom dialog",
        title: "Custom title",
        buttons: {
          success: {
            label: "Success!",
            className: "btn-success",
            callback: function() {
              Example.show("great success");
            }
          },
          danger: {
            label: "Danger!",
            className: "btn-danger",
            callback: function() {
              Example.show("uh oh, look out!");
            }
          },
          main: {
            label: "Click ME!",
            className: "btn-primary",
            callback: function() {
              Example.show("Primary button");
            }
          }
        }
      });
    };

  demos.custom_html = function () {
    bootbox.dialog({
      title: "That html",
      message: '<img src="images/bootstrap_logo.png" width="100px"/><br/> You can also use <b>html</b>'
    });
  };

  demos.custom_form = function () {
    bootbox.dialog({
        title: "This is a form in a modal.",
        message: '<div class="row">  ' +
          '<div class="col-md-12"> ' +
          '<form class="form-horizontal"> ' +
          '<div class="form-group"> ' +
          '<label class="col-md-4 control-label" for="name">Name</label> ' +
          '<div class="col-md-4"> ' +
          '<input id="name" name="name" type="text" placeholder="Your name" class="form-control input-md"> ' +
          '<span class="help-block">Here goes your name</span> </div> ' +
          '</div> ' +
          '<div class="form-group"> ' +
          '<label class="col-md-4 control-label" for="awesomeness">How awesome is this?</label> ' +
          '<div class="col-md-4"> <div class="radio"> <label for="awesomeness-0"> ' +
          '<input type="radio" name="awesomeness" id="awesomeness-0" value="Really awesome" checked="checked"> ' +
          'Really awesome </label> ' +
          '</div><div class="radio"> <label for="awesomeness-1"> ' +
          '<input type="radio" name="awesomeness" id="awesomeness-1" value="Super awesome"> Super awesome </label> ' +
          '</div> ' +
          '</div> </div>' +
          '</form> </div>  </div>',
        buttons: {
          success: {
            label: "Save",
            className: "btn-success",
            callback: function () {
              var name = $('#name').val();
              var answer = $("input[name='awesomeness']:checked").val()
              Example.show("Hello " + name + ". You've chosen <b>" + answer + "</b>");
            }
          }
        }
      }
    );
  };

});