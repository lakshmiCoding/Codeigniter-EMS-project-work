
<div style="padding-left:300px; padding-top:100px;">
<div class="container">
	
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<?php
		echo $this->session->flashdata("error_msg");
		echo $this->session->flashdata("err_form");
		echo $this->session->flashdata("success_msg");
		if(isset($error)){print $error;}
		?>
<h2>Update Profile</h2>
<br>
<form method="post" action="<?php echo base_url('Employee/upd_profile/').$key->e_id; ?>" enctype="multipart/form-data">
E-ID: <input type="text"  name="e_id" placeholder="User id" value="<?php echo $key->e_id; ?>" readonly>
<?php echo form_error('e_id'); ?><br><br>
Name: <input type="text"  name="e_name" placeholder="User name" value="<?php echo $key->e_name; ?>">
<?php echo form_error('e_name'); ?><br><br>
Designation <input type="text" name="e_dsgn" placeholder="Designation" value="<?php echo $key->e_dsgn; ?>">
<?php echo form_error('e_dsgn'); ?><br><br>
Password: <input type="password" name="e_pwd" placeholder="Password" value="<?php echo $key->e_pwd; ?>">
<?php echo form_error('e_pwd'); ?><br><br>
<?php
$g=$key->gender;
?>
Gender: <input type="radio" name="e_gender" value="male" <?php if($g=="male") echo "checked";?>>Male
<input type="radio" name="e_gender" value="female" <?php if($g=="female") echo "checked";?>>Female
<?php echo form_error('e_gender'); ?><br><br>
Address: <input type="text"  name="e_addr" placeholder="address" value="<?php echo $key->address; ?>">
<?php echo form_error('e_addr'); ?><br><br>
Email: <input type="email" name="e_mail" placeholder="email" value="<?php echo $key->email; ?>">
<?php echo form_error('e_mail'); ?><br><br>
Phone: <input type="text" name="e_phn" placeholder="phone" value="<?php echo $key->phone; ?>">
<?php echo form_error('e_phn'); ?><br><br>
Date of Join: <input type="date" name="e_date" placeholder="Date of Join" value="<?php echo $key->join_date; ?>">
<?php echo form_error('e_date'); ?><br><br>
Image:  <input type="text" name="e_img" value="<?php echo $key->image; ?>" readonly>
<?php echo form_error('e_img'); ?><br><br>
<input type="file" name="e_img"><br><br>
<input type="submit" name="update" value="Update">
</form>
<br>
<a href="<?php echo base_url('Employee/home'); ?>">Back to home</a>

</div>
</div>
</div>
</div>