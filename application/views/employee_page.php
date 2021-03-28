<div style="padding-left:300px; padding-top:100px;">
   <div class="container">
      <div class="row">
         <div class="col-md-4 col-md-offset-4">
            <?php
				echo $this->session->flashdata("err_form");
				echo $this->session->flashdata("err_pwd");
               echo $this->session->flashdata("success_msg");
               echo $this->session->flashdata("err");
               echo $this->session->flashdata("err_ins");
               echo $this->session->flashdata("succ_ins");
               echo $this->session->flashdata("succ_upd");
               echo $this->session->flashdata("err_upd");
               echo $this->session->flashdata("err_login");
               $userdetails = $this->session->userdata('empdetails');
               extract($userdetails);
            ?>
            
            <h2>Welcome to Dashboard </h2>
            <h4>User Info: <?php echo $e_name;	?></h4>
			<div style="float: right;margin: -90px 60px 0 0px;">
			<img src="<?php echo base_url('assets/uploads/'.$image); ?>">
			</div>
         </div>
      </div>
   </div>
</div>