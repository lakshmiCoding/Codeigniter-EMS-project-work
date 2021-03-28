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
			<h3>Employee Leave Records	</h3>

            <?php if(!empty($key)){ ?>
				<table>
                <tr>
                <th>#</th>
                <th>Project name</th>
                <th>Due Date</th>
                <th>Submission Date</th>
                <th>Status</th>
                <th>Assigned to</th>
                <th></th>
                </tr>
                <?php foreach($key as $i) {
                    ?>
                <tr>
                <td><?php echo $i->pid; ?></td>
                <td><?php echo $i->proj_name; ?></td>
                <td><?php echo $i->due_date; ?></td>
                <td><?php echo $i->submission; ?></td>
                <?php 
                if($i->status==0){
                    $stat="Pending";
                } 
                else{
                    $stat="Completed";
                }?>
                <td><?php echo $stat; ?></td>
                <td><?php echo $i->e_id; ?></td>
                <td><a style="color:red;" href="<?php echo base_url('Admin/view_proj_details/'.$i->pid); ?>">View details</a></td>
                </tr>
                <?php
                }
                ?>
                </table>
            <?php }
            else{
                echo "<span style='color:red; margin-left:100px;'>No Leave Applications Yet..!</span>";
            } ?>
				</form>
			</div>
		</div>
	</div>
</div>