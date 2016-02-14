$(document).ready(function(){
	$("#searchInstructorBtn").click(function(){
		var search = $("#srch").val();
		if (search != ''){
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