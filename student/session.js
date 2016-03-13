$('#sessionForm').on('keyup keypress', function(e) {
	  var keyCode = e.keyCode || e.which;
	  if (keyCode === 13) { 
	    e.preventDefault();
	    $( "#submitSession" ).click();
	    return false;
	 }
});

$(document).ready(function(){
	$("#submitSession").click(function(){
		var pass = $("#pass").val();
		var id = $("#id").val();
		if (pass != ''){
			$.post("sessionsubmit.php", {
				id: id,
				pass: pass
			}, function(data) {
				if(data == 'Incorrect'){
					$('#bbox').addClass('alert-danger');
			    	$('#bbox').removeClass('alert-info');
					Example.show("<h4>Invalid Password</h4>");
				}
				else{
					window.location = "index.php";
				}
			});
		}
	});
});