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
				}
				else{
					window.location = "index.php";
				}
			});
		}
	});
});