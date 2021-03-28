<script>
$(document).ready(function(){
    $(".take-action").hide();
  $(".view-detail").click(function(){
    $(".take-action").show();
  });
//   $("#show").click(function(){
//     $("p").show();
//   });
});
</script>

<div style="padding-left:300px; padding-top:100px;">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
			<?php
			echo $this->session->flashdata("err_form");
			echo $this->session->flashdata("err_pwd");
			echo $this->session->flashdata("succ_upd");
			echo $this->session->flashdata("err_upd");
			//$userdetails=$this->session->userdata('empdetails');
			//extract($userdetails);
			?>
			<h3 style="text-decoration: underline;">Project Details	</h3><br>
            <div class="leave-table">
				<table style="border:none;">
                <tr>
                <td><h4>Project Name:</h4></td>
                <td style="text-align:left;"><?php echo $key['proj_name']; ?></td>

                <td><h4>Project ID:</h4></td>
                <td style="text-align:left;"><?php echo $key['pid']; ?></td>
                </tr>

                <tr>
                <td><h4>Employee Name:</h4></td>
                <td style="text-align:left;"><?php echo $key['e_name']; ?></td>

                <td><h4>Employee ID:</h4></td>
                <td style="text-align:left;"><?php echo $key['e_id']; ?></td>
                </tr>

                <tr>
                <td><h4>Due-Date:</h4></td>
                <td style="text-align:left;"><?php echo $key['due_date']; ?></td>
                
                <td><h4>Subission Date:</h4></td>
                <td style="text-align:left;"><?php echo $key['submission']; ?></td>
                </tr>

                <tr>
                <td><h4>Status:</h4></td>
                <?php 
                if($key['status']==0){
                    $stat="Pending";
                } 
                else{
                    $stat="Completed";
                }?>
                <td style="text-align:left;"><?php echo $stat; ?></td>
                </tr>
                
                </table>
                <?php if($key['status']==0){ ?>
                <button class="view-detail">Take Action</button>
                <?php } ?>

                <a class="view-detail" style="float:right;    margin-right: 60px;" href="<?php echo base_url('Admin/view_proj_status'); ?>">Back</a>
            </div>
            <!-- <div class="take-action">
                <form method="post" action="<?php //echo base_url('Admin/updateaction/'.$key['l_id']);  ?>">
            <label>Choose Action</label>
            <select name="action">
                <option value="">--</option>
                <option value="1">Completed</option>
            </select>
            <br>
            <label>Remarks</label>
            <input type="text" name="remarks" placeholder="Remarks">
            <br>

            <input type="submit" value="submit">
        </form>
                </div> -->
            </div>
       
		</div>
	</div>
</div>
 <!-- 
      -->
