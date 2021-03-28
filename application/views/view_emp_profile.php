
<div style="padding-left:300px; padding-top:100px;">
<div class="container">
	
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<?php
		echo $this->session->flashdata("error_msg");
		echo $this->session->flashdata("err_form");
		echo $this->session->flashdata("success_msg");
		?>
<h2>View Profile</h2>
<br>
<form method="post" enctype="multipart/form-data" class="form-group">
<div class="pro_pic">
<img src="<?php echo base_url('assets/uploads/'.$key->image); ?>">
</div>

E-ID: <input type="text" class="form-control" name="e_id" placeholder="User id" value="<?php echo $key->e_id; ?>" readonly>
<?php echo form_error('e_id'); ?><br><br>
Name: <input type="text" class="form-control"  name="e_name" placeholder="User name" value="<?php echo $key->e_name; ?>" readonly>
<?php echo form_error('e_name'); ?><br><br>
Designation <input type="text" class="form-control" name="e_dsgn" placeholder="Designation" value="<?php echo $key->e_dsgn; ?>" readonly>
<?php echo form_error('e_dsgn'); ?><br><br>
Password: <input type="password" class="form-control" name="e_pwd" placeholder="Password" value="<?php echo $key->e_pwd; ?>" readonly>
<?php echo form_error('e_pwd'); ?><br><br>
<?php
$g=$key->gender;
?>
Gender: <input type="radio" name="e_gender" value="male" <?php if($g=="male") echo "checked";?> readonly>Male
<input type="radio" name="e_gender" value="female" <?php if($g=="female") echo "checked";?> readonly>Female
<?php echo form_error('e_gender'); ?><br><br>
Address: <input type="text" class="form-control"  name="e_addr" placeholder="address" value="<?php echo $key->address; ?>" readonly>
<?php echo form_error('e_addr'); ?><br><br>
Phone: <input type="text" class="form-control" name="e_phn" placeholder="phone" value="<?php echo $key->phone; ?>" readonly>
<?php echo form_error('e_phn'); ?><br><br>
Email: <input type="email" class="form-control" name="e_mail" placeholder="email" value="<?php echo $key->email; ?>" readonly>
<?php echo form_error('e_mail'); ?><br><br>
Date of Join: <input type="date" class="form-control" name="e_date" placeholder="Date of Join" value="<?php echo $key->join_date; ?>" readonly>
<?php echo form_error('e_date'); ?><br><br>

</form>
<br>
<a href="<?php echo base_url('Employee/home'); ?>">Back to home</a>

</div>
</div>
</div>
</div>