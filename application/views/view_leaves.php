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
				<table>
                <tr>
                <th>#</th>
                <th>Employee name</th>
                <th>leave type</th>
                <th>posting date</th>
                <th>status</th>
                <th></th>
                </tr>
                <?php foreach($key as $i) {
                    ?>
                <tr>
                <td><?php echo $i->l_id; ?></td>
                <td><?php echo $i->e_name; ?></td>
                <td><?php echo $i->leavetype; ?></td>
                <td><?php echo $i->posted_on; ?></td>
                <?php 
                if($i->status==0){
                    $stat="Waiting for Approval";
                } 
                elseif ($i->status==2) {
                    $stat="Rejected";
                }
                else{
                    $stat="Approved";
                }?>
                <td><?php echo $stat; ?></td>
                <td><a class="btn btn-primary" href="<?php echo base_url('Admin/view_leave_details/'.$i->l_id); ?>">View details</a></td>
                </tr>
                <?php
                }
                ?>
                </table>
				</form>
			</div>
		</div>
	</div>
</div>