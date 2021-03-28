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
			<h3 style="text-decoration: underline;">Employee Leave Records	</h3><br>
            <div class="leave-table">
				<table style="border:none;">
                <tr>
                <td><h4>Employee Name:</h4></td>
                <td style="text-align:left;"><?php echo $key['e_name']; ?></td>

                <td><h4>Employee ID:</h4></td>
                <td style="text-align:left;"><?php echo $key['e_id']; ?></td>

                <td><h4>Emp email id:</h4></td>
                <td style="text-align:left;"><?php echo $key['email']; ?></td>
                </tr>

                <tr>
                <td><h4>Designation:</h4></td>
                <td style="text-align:left;"><?php echo $key['e_dsgn']; ?></td>
                
                <td><h4>Phone:</h4></td>
                <td style="text-align:left;"><?php echo $key['phone']; ?></td>
                </tr>

                <tr>
                <td><h4>Leave type:</h4></td>
                <td style="text-align:left;"><?php echo $key['leavetype']; ?></td>
                
                <td><h4>Leave duration:</h4></td>
                <td style="text-align:left;"><?php echo $key['fromdate'].' to '.$key['todate']; ?></td>
                
                <td><h4>Posted on:</h4></td>
                <td style="text-align:left;"><?php echo $key['posted_on']; ?></td>
                </tr>

                <tr>
                <td><h4>Leave Description:</h4></td>
                <td style="text-align:left;"><?php echo $key['description']; ?></td>
                
                <td><h4>Leave status:</h4></td>
                <?php 
                if($key['status']==0){
                    $stat="Waiting for Approval";
                } 
                elseif ($key['status']==2) {
                    $stat="Rejected";
                }
                else{
                    $stat="Approved";
                }?>
                <td style="text-align:left;"><?php echo $stat; ?></td>
                </tr>
                
                </table>
                <?php if($key['status']==0){ ?>
                <button class="view-detail">Take Action</button>
                <?php } ?>

                <a class="view-detail" style="float:right;    margin-right: 60px;" href="<?php echo base_url('Admin/load_leaves'); ?>">Back</a>
            </div>
            <div class="take-action">
                <form method="post" action="<?php echo base_url('Admin/updateaction/'.$key['l_id']);  ?>">
            <label>Choose Action</label>
            <select name="action">
                <option value="">--</option>
                <option value="1">Approve</option>
                <option value="2">Reject</option>
            </select>
            <br>
            <label>Remarks</label>
            <input type="text" name="remarks" placeholder="Remarks">
            <br>

            <input type="submit" value="submit">
        </form>
                </div>
            </div>
       
		</div>
	</div>
</div>
 <!-- 
      -->
