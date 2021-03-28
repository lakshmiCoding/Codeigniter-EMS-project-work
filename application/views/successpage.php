<script>
/* Update item quantity 
function updateIsRead(obj, rowid){
	$.get("<?php //echo base_url('Admin/updateRead/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
		if(resp == 'ok'){                                   //!rowid(1st) and qty are the reserved words in cart()
			location.reload();
		}else{
			alert('Update failed, please try again.');
		}
	});
}*/
</script>
<div style="padding-left:300px; padding-top:100px;">
<div class="container">
	
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<?php
				$userdetails = $this->session->userdata('userdetails');
				extract($userdetails);
				$tot=$key[0]->total;
			?>

			<a class="notify" href="<?php echo base_url('Admin/load_leaves/0'); ?>" data-toggle="tooltip" title="<?php if($tot > 0){echo $tot." new notification";}else{echo "No new notifications";} ?>">
            <i class="fa fa-bell fa-lg" aria-hidden="true" style="color: #6b8294;"></i>
            <span class="badge"><?php echo $tot ?></span>
            </a>

			<h2>Welcome to Dashboard </h2>
			<h4>Admin Info: 
			<?php 
			//echo $this->session->userdata('admin_name'); 	//for login code 1
			echo "<span style='text-transform:capitalize;'>".$name."</span>";										//for login code 2
			
			?></h4>
		</div>
	</div>
</div>
</div>
