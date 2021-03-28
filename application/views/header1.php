<!DOCTYPE html>
<html>
<title>EMS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">

<body class="w3-light-grey" style="    background-color: #f2fbff!important;">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4;background-color: #0c7fda!important;">
  <h3 style="color:#fff;" class="w3-bar-item w3-left">EMPLOYEE MANAGEMENT SYSTEM, USER MODULE</h3>
  <span class="w3-bar-item w3-right"><a href="<?php echo base_url('Employee/logout'); ?>" class="btn btn-danger">Logout</a></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <?php
  $userdetails = $this->session->userdata('empdetails');
  extract($userdetails);
  ?>
  <div class="w3-bar-block">
    <a href="<?php echo base_url('Employee/home'); ?>" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>Dashboard</a>

    <button class="w3-bar-item w3-button w3-padding"><i class="fa fa-user-circle-o"></i></i> My Profile
    <i class="fa fa-caret-down" style="float: right; padding: 3px;" onclick="myFunction('Demo0')"></i></button>   
    <div id="Demo0" class="w3-hide w3-bar-block" style="padding-left:25px;">
    <a href="<?php echo base_url('Employee/view/').$e_id; ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-right"></i>  View My Profile</a>
	  <a href="<?php echo base_url('Employee/update/').$e_id; ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-right"></i>  Update my profile</a>
	  </div>
<!-- 

    <a href="<?php echo base_url('Employee/view/').$e_id; ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  View My Profile</a>
    <a href="<?php echo base_url('Employee/update/').$e_id; ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i> Update my profile</a>  -->
    <a href="<?php echo base_url('Mycal/load_calendar'); ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-calendar"></i>  Calendar</a>
	  <a href="<?php echo base_url('Employee/pwd/').$e_id; ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-key"></i> Change Password</a>  
	  <a href="<?php echo base_url('Employee/load_leave');?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-calendar-times-o"></i>  Leave</a>  
  </div>

  <script>
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</nav>
