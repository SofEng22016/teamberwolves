$(document).ready(function(){
	$("#submitLogin").click(function(){
		var user = $("#user").val();
		var pass = $("#pass").val();
		if (user != '' || pass != ''){
			$('#loginForm').validator()
			// Returns successful data submission message when the entered information is stored in database.
			document.getElementById("Incorrect").style.display = "none";
			document.getElementById("NotFound").style.display = "none";
			document.getElementById("errorControl").style.display = "none";
			$.post("processLogin.php", {
				user1: user,
				pass1: pass
			}, function(data) {
				if(data == 'NotFound'){
					document.getElementById("errorControl").style.display = "block";
					document.getElementById("NotFound").style.display = "block";
				}
				else if(data == 'Incorrect'){
					document.getElementById("errorControl").style.display = "block";
					document.getElementById("Incorrect").style.display = "block";
				}
				else if(data == 'Admin'){
					window.location = "http://localhost:81/softeng/admin/index.php";
				}
				else if(data == 'Student'){
					window.location = "http://localhost:81/softeng/student/index.php";
				}
				else if(data == 'Prof'){
					window.location = "http://localhost:81/softeng/instructor/index.php";
				}
				else{
					location.reload();
				}
			});
		}
	});
});
$(document).ready(function(){
	$("#submitAccount").click(function(){
		var fName = $("#inputFName").val();
		var mName = $("#inputMName").val();
		var lName = $("#inputLName").val();
		var email = $("#inputEmailConfirm").val();
		var password = $("#inputPasswordConfirm").val();
		if (email != ''){
			// Returns successful data submission message when the entered information is stored in database.
			document.getElementById("emailErrorMessage").style.display = "none";
			document.getElementById("emailError").style.color = "black";
			$.post("checkGuest.php", {
				email1: email
			}, function(data) {
				if(data == 'Exists'){
					document.getElementById("emailErrorMessage").style.display = "inline";
					document.getElementById("emailError").style.color = "red";
				}
				else{
					$.post("createAccount.php", {
						email1: email,
						fname1: fName,
						mname1: mName,
						lname1: lName,
						password1: password
					}, function(data) {
						if(data == 'Exists'){
							document.getElementById("emailErrorMessage").style.display = "inline";
							document.getElementById("emailError").style.color = "red";
						}
						else{
							document.getElementById("firstFooter").style.display = "none";
							document.getElementById("accountForm").style.display = "none";
							document.getElementById("verifyEmail").style.display = "block";
							$("#newEmail").attr('placeholder',data);
							$("#oldEmail").attr('placeholder',data);
							$("#oldEmail").val = email;
						}
						
					});
				}
			});
		}
	});
});
$(document).ready(function(){
	$("#changeEmail").click(function(){
		var newEmail = $("#newEmail").val();
		var oldEmail = $("#oldEmail").attr('placeholder');
		alert(newEmail);
		alert(oldEmail)
		document.getElementById("alreadyExistsVerification").style.display = "none";
		document.getElementById("verificationLabel").style.color = "#818181";
		if (newEmail != ''){
			$.post("checkGuest.php", {
				email1: newEmail
			}, function(data) {
				if(data == 'Exists'){
					document.getElementById("alreadyExistsVerification").style.display = "inline";
				}
				////////////
				else{
					$.post("changeEmailGuest.php", {
						newEmail1: newEmail,
						oldEmail1: oldEmail
					}, function(data) {
						alert(data);
						$("#emailValue").attr('placeholder',data);
						document.getElementById("alreadyExistsVerification").style.display = "none";
						document.getElementById("verificationLabel").style.color = "#818181";
					});
				}
			});
		}
	});
});
$(document).ready(function(){
	$("#resendVerification").click(function(){
		var newEmail = $("#newEmail").val();
		var oldEmail = $("#oldEmail").attr('placeholder');
		alert(oldEmail);
		document.getElementById("alreadyExistsVerification").style.display = "none";
		document.getElementById("verificationLabel").style.color = "#818181";
		$.post("resendEmailActivation.php", {
			email1: oldEmail
		}, function(data) {
			alert(data)
			document.getElementById("ResendLabel").style.display = "inline";
		});
	});
});
$(document).ready(function(){
	$("#logout").click(function(){
		$.ajax({
		    url: 'logout.php'
		});
		location.reload();
	});
});
$(document).ready(function(){
    $('#user').keypress(function(e){
      if(e.keyCode==13){
    	  $('#loginForm').validator()
          $('#submitLogin').click();
      }
    });
});
$(document).ready(function(){
    $('#pass').keypress(function(e){
    	if(e.keyCode==13){
      	  $('#loginForm').validator()
            $('#submitLogin').click();
        }
    });
});
$('#the-thing-that-opens-your-alert').click(function () {
    $('#le-alert').addClass('in'); // shows alert with Bootstrap CSS3 implem
  });
$('.close').click(function () {
	$(this).parent().removeClass('in'); // hides alert with Bootstrap CSS3 implem
});
