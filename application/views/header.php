<!DOCTYPE html>
<html>
<title>EMS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="assets/js/script.js"></script>

<style>


</style>
<body class="w3-light-grey" style="    background-color: #f2fbff!important;">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4;background-color: #0c7fda!important;">
  <h3 style="color:#fff;" class="w3-bar-item w3-left">EMPLOYEE MANAGEMENT SYSTEM, ADMIN MODULE</h3>
  <span class="w3-bar-item w3-right"><a href="<?php echo base_url('Admin/logout'); ?>" class="btn btn-danger">Logout</a></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    
  </div>
  <hr>
  <div class="w3-container w3-blue">
    <h5>Admin Panel</h5>
  </div>
  <div class="w3-bar-block">
    <a href="<?php echo base_url('Admin/home'); ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home"></i>  Dashboard</a>
    <a href="<?php echo base_url('Admin/reg'); ?> " class="w3-bar-item w3-button w3-padding"><i class="fa fa-address-book-o"></i>  Add new Employee</a>
    <a href="<?php echo base_url('Admin/load_emp_details'); ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-address-card-o"></i>  Show Employee Details</a>
    
    <button class="w3-bar-item w3-button w3-padding"><i class="fa fa-clipboard"></i></i> Projects
    <i class="fa fa-caret-down" style="float: right; padding: 3px;" onclick="myFunction('Demo0')"></i></button>   
    <div id="Demo0" class="w3-hide w3-bar-block" style="padding-left:25px;">
    <a href="<?php echo site_url('Admin/view_assign'); ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-right"></i>  Assign Projects</a>
	  <a href="<?php echo base_url('Admin/view_proj_status'); ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-right"></i>  Project Status</a>
	  </div>
    
    <button class="w3-bar-item w3-button w3-padding"><i class="fa fa-calendar"></i> Calendar
    <i class="fa fa-caret-down" style="float: right; padding: 3px;" onclick="myFunction('Demo1')"></i></button>   
    <div id="Demo1" class="w3-hide w3-bar-block" style="padding-left:25px;">
    <a href="<?php echo site_url('Mycal/load_calendar'); ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-right"></i>  Show Calendar</a>
	  <a href="<?php echo base_url('Mycal/add_event'); ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-right"></i>  Add Events to Calendar</a>
	  </div>
      
    <button class="w3-bar-item w3-button w3-padding"><i class="fa fa-calendar-times-o"></i> Leave Management
    <i class="fa fa-caret-down" style="float: right; padding: 3px;" onclick="myFunction('Demo2')"></i></button>   
    <div id="Demo2" class="w3-hide w3-bar-block" style="padding-left:25px;">
    <a href="<?php $stat=0; echo base_url('Admin/load_leaves/'.$stat); ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-right"></i>  Leave Applications</a>  
    <a href="<?php echo base_url('Admin/load_leaves'); ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-arrow-right"></i>  Leave History</a>  
    </div>

    <a href="<?php echo base_url('Admin/change_pwd'); ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-key"></i>  Change Admin Password</a>
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

// function addclass(){
//   var v = document.getElementById("p"); 
//   v.className += "w3-blue"; 
// }
</script>

</nav>
