<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8" />
      <title>login page</title>
</head>
<body>
<?php

echo $this->session->flashdata("err");
echo $this->session->flashdata('err_login');
echo $this->session->flashdata("success_msg");
echo $this->session->flashdata("error_msg");
?>
<h2>Login for Employee</h2>
<br>
<form method="post" action="<?php echo base_url('Employee/login_validate'); ?>">
User name: <input type="text"  name="e_name" placeholder="User name" value="<?php echo set_value('e_name'); ?>"><br><br>
Password: <input type="password" name="e_pwd" placeholder="Password"><br><br>
<input type="submit" name="e_login">

</form>

</body>
</html>