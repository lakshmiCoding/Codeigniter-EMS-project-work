<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8" />
      <title>login page</title>
	  
	  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	  
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/first.css'); ?>">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
   $("#admin").show();
   $("#emp").hide();
   $("#ad").click(function(){
      $("#admin").show();
      $("#emp").hide(); 
   });
   $("#em").click(function(){
      $("#emp").show();
      $("#admin").hide();
   });
});
</script>

</head>
<body class="cover">

<div class="container">
<div class="heading">
<h1 class="style1">EMPLOYEE MANAGEMENT SYSTEM</h1>
</div>

<div class="row">

<div  class="menu">
<a id="ad" class="btn btn-primary">Login as Admin</a>
<a id="em" class="btn btn-primary">Login as Employee</a>
</div>

<div class="col-md-12 box">
<?php

echo $this->session->flashdata("err-form");
echo $this->session->flashdata('err_login');
echo $this->session->flashdata("success_msg");
echo $this->session->flashdata("error_msg");
?>
<div id="admin">
<h2>Admin Login</h2>
<br>
<form method="post" action="<?php echo base_url('Admin/login_validate'); ?>">
<div class="form-group">
<label for="a_name">Name
<input type="text"  class="form-control" name="a_name" placeholder="User name" value="<?php echo set_value('a_name'); ?>">
</label>
</div>
<div class="form-group">
<label for="a_pwd">Password
<input type="password" class="form-control" name="a_pwd" placeholder="Password">
</label>
</div>
<input type="submit" name="a_login" class="btn btn-default">
</form>
</div>

<!-----------For employee login section ---------------------------->

<div id="emp">
<h2>Employee Login</h2>
<br>
<form method="post" action="<?php echo base_url('Employee/login_validate'); ?>">
<div class="form-group">
<label for="e_name">User name
<input type="text"  class="form-control" name="e_name" placeholder="User name" value="<?php echo set_value('e_name'); ?>">
</label>
</div>
<div class="form-group">
<label for="e_pwd">Password
<input type="password" class="form-control" name="e_pwd" placeholder="Password">
</label>
</div>
<input type="submit" name="e_login" class="btn btn-default">
</form>
</div>

</div>

</div>
</div>
</body>
</html>