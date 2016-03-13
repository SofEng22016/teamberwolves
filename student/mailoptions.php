
<?php 

$con = mysql_connect("localhost", "root", "");
if(! $con )
{
	die('Could not connect: ' . mysql_error());
}
$db = mysql_select_db("enrollment", $con);
$id = $_SESSION['ID'];
$query = "SELECT * FROM `messages` WHERE `Recipient` = '$id' AND `isRead` ='0'";
$result = mysql_query($query,$con);
$new = mysql_num_rows($result);
mysql_close($con);
?>
<div class="col-md-2">

      <form id="composeNav" action="index.php" method="post" role="form">
      	<input type="hidden" name="mailopt" value="Compose" />
      	<input type="hidden" name="opt" value="Mail" />
      </form>
	<a  href="javascript:{}" onclick="document.getElementById('composeNav').submit();" style="margin-bottom: 20px;" class="btn btn-primary btn-block margin-bottom">Compose</a>
	<div class="box box-solid">
		<div class="box-header with-border">
        	<h3 class="box-title">Mailbox</h3>
        </div>
        <div class="box-body no-padding">
        
      <form id="inboxNav" action="index.php" method="post" role="form">
      	<input type="hidden" name="mailopt" value="Inbox" />
      	<input type="hidden" name="opt" value="Mail" />
      </form>
      
      <form id="sentNav" action="index.php" method="post" role="form">
      	<input type="hidden" name="mailopt" value="Sent" />
      	<input type="hidden" name="opt" value="Mail" />
      </form>
      
        	<ul class="nav nav-stacked">
            	<li <?php if($mailOpt=='Inbox'){ echo "class='active'";}?> >
            		<a href="javascript:{}" onclick="document.getElementById('inboxNav').submit();"><i class="fa fa-inbox"></i> Inbox
            		<?php if($new!=0){?>
            		<span class="label label-primary pull-right"><?php echo $new;?></span></a>
            		<?php }?>
                </li>
                <li <?php if($mailOpt=='Sent'){ echo "class='active'";}?>>
                	<a href="javascript:{}" onclick="document.getElementById('sentNav').submit();"><i class="fa fa-envelope-o"></i> Sent</a>
                </li>
        	 </ul>
    	</div>
	</div>
</div>