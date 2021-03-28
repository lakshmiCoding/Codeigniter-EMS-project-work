
<div style="padding-left:400px; padding-top:100px;">
<div class="container">
	
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<?php
		echo $this->session->flashdata("error_msg");
		echo $this->session->flashdata("err_form");
		echo $this->session->flashdata("success_msg");
		?>
<h2>Update Employee Details</h2>
<br>
<form method="post" action="<?php echo base_url('Admin/upd_validate/').$key->e_id; ?>">
E-ID: <input type="text"  name="e_name" placeholder="User name" value="<?php echo $key->e_id; ?>" readonly>
<?php echo form_error('e_name'); ?><br><br>
Name: <input type="text"  name="e_name" placeholder="User name" value="<?php echo $key->e_name; ?>">
<?php echo form_error('e_name'); ?><br><br>
Designation <input type="text" name="e_dsgn" placeholder="Designation" value="<?php echo $key->e_dsgn; ?>">
<?php echo form_error('e_dsgn'); ?><br><br>
Password: <input type="password" name="e_pwd" placeholder="Password" value="<?php echo $key->e_pwd; ?>">
<?php echo form_error('e_pwd'); ?><br><br>
<input type="submit" name="update">
</form>
<br>
<a href="<?php echo base_url('Admin/home'); ?>">Back to home</a>

</div>
</div>
</div>
</div>