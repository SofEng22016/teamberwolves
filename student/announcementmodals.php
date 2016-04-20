
<?php for($x=0;$x<$announcements;$x++){?>
<?php
$color = "";
if($opt!='Profile'){
	if($colors[$x]=="blue"){
		$color = "primary";
	}
	else if($colors[$x]=="red"){
		$color = "danger";
	}
	else if($colors[$x]=="yellow"){
		$color = "warning";
	}
	else if($colors[$x]=="green"){
		$color = "success";
	}
}
?>
<div class="modal fade modal-<?php echo $color;?>" id="announcementModal<?php echo $x;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h2 class="modal-title"><b><?php echo $titles[$x];?></b></h2>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
					<?php echo $messages[$x];?>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<a class="btn btn-block btn-default" id="del<?php echo $ids[$x];?>">Delete</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$("#del<?php echo $ids[$x];?>").click(function(){
	var id = '<?php echo $ids[$x];?>';
	$.post("removeannouncement.php", {
		id:id
	}, function(data) {
		location.reload();
	});
});
</script>
<?php }?>