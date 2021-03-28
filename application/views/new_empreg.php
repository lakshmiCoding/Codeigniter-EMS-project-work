<div style="padding-left:400px; padding-top:100px;">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<?php echo $this->session->flashdata("error_msg"); echo $this->session->flashdata("err_form"); echo $this->session->flashdata("success_msg"); ?>
				<a class="btn" href="<?php echo base_url('Admin/home') ?>">Back to home</a>
				<h2>Add new Employee</h2>
				<br>
				<form method="post" action="<?php echo base_url('Admin/reg_validate') ?>" class="form-group">
				<label for="e_name">Name:</label>
					<input type="text" name="e_name" placeholder="User name" value="<?php echo set_value('e_name'); ?>">
					<?php echo form_error( 'e_name'); ?><br><br>
				<label for="e_dsgn">Designation:</label>	
					<input type="text" name="e_dsgn" placeholder="Designation" value="<?php echo set_value('e_dsgn'); ?>">
					<?php echo form_error( 'e_dsgn'); ?><br><br>
				<label for="e_pwd">Password:</label>
					<input type="password" name="e_pwd" placeholder="Password" value="<?php echo set_value('e_pwd'); ?>">
					<?php echo form_error( 'e_pwd'); ?><br><br>
					<input type="submit" name="reg" style="float:left;">
					</form>
				<br>
				
			</div>
		</div>
	</div>
</div>