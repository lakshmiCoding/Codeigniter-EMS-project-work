<div style="padding-left:300px; padding-top:100px;">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
			<?php
			echo $this->session->flashdata("err_form");
			echo $this->session->flashdata("err_pwd");
			echo $this->session->flashdata("succ_upd");
			echo $this->session->flashdata("err_upd");
			$userdetails=$this->session->userdata('userdetails');
			extract($userdetails);
			?>
			<h3>Create New Password	</h3>
				<form action="<?php echo base_url('Admin/pwd_change/').$aid;?>" method="post">
				Current password:
				<input type="password" name="old_pwd" value="<?php echo set_value('old_pwd'); ?>">
				<?php echo form_error('old_pwd'); ?><br><br>
				New password:
				<input type="password" name="new_pwd" value="<?php echo set_value('new_pwd'); ?>">
				<?php echo form_error('new_pwd'); ?><br><br>
				Confirm password:
				<input type="password" name="confirm_pwd" value="<?php echo set_value('confirm_pwd'); ?>">
				<?php echo form_error('confirm_pwd'); ?><br><br>
				<input type="submit" name="change">
				</form>
			</div>
		</div>
	</div>
</div>