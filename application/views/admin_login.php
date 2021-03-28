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
<h2>Login for Admin</h2>
<br>
<form method="post" action="<?php echo base_url('Admin/login_validate'); ?>">
User name: <input type="text"  name="a_name" placeholder="User name" value="<?php echo set_value('a_name'); ?>"><br><br>
Password: <input type="password" name="a_pwd" placeholder="Password"><br><br>
<input type="submit" name="a_login">


</form>

</body>
</html>