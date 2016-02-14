<?php include 'names.php'; ?>

<div class="col-md-9">
	<div class="box box-primary">
    	<div class="box-header with-border">
        	<h3 class="box-title">Inbox</h3>
			<div class="box-tools pull-right">
                <div class="has-feedback">
                	<input type="text" class="form-control input-sm" placeholder="Search Mail">
                	<span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
			</div>
		</div>
		<div class="box-body no-padding">
			<div class="mailbox-controls">
				<button type="button" class="btn btn-default btn-sm checkbox-toggle">
					<i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                	<button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                	<button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                	<button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <button type="button" class="btn btn-default btn-sm">
                	<i class="fa fa-refresh"></i>
                </button>
                <div class="pull-right">1-50/200
                	<div class="btn-group">
                    	<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    	<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                	</div>
                </div>
              </div>
              <div class="table-responsive mailbox-messages">
              	<table class="table table-hover table-striped">
                	<tbody>
                	<?php for($x=1;$x<=50;$x++){ 
                	$nme = "";
                	$gen = rand(0, 1);
                	$scnd = rand(0, 1);
                	for($y=0;$y<$scnd+1;$y++){
                		$nme .= $name[$gen][rand(0, count($name[$gen])-1)];
                		$nme .= " ";
                	}
                	$nme .= $name[2][rand(0, count($name[2])-1)];
                	$att = rand(0, 1);
                	$str = rand(0,1);
                		?>
                		<tr>
                    		<td><input type="checkbox"></td>
                    		<td class="mailbox-star"><a href="#"><i class="fa fa-star<?php if($str!=0){ echo "-o"; }?> text-yellow"></i></a></td>
                    		<td class="mailbox-name"><a href="read-mail.html"><?php echo $nme; ?></a></td>
                    		<td class="mailbox-subject"><b>Title</b> - Message Description...
                    		</td>
                    		<td class="mailbox-attachment">
                    			<?php if($att!=0){ ?>
                    			<i class="fa fa-paperclip"></i>
                    			<?php } ?>
                    		</td>
                    		<td class="mailbox-date">5 mins ago</td>
                  		</tr>
                	<?php } ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">1-50/200
                	<div class="btn-group">
                    	<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    	<button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  	</div>
            	</div>
        	</div>
    	</div>
	</div>
</div>