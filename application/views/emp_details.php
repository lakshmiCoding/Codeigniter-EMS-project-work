
<div style="padding-left:300px; padding-top:100px;">
<div class="container">
	
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<?php
		echo $this->session->flashdata('err_del');
		echo $this->session->flashdata('err_form');
		echo $this->session->flashdata('succ_upd');
		echo $this->session->flashdata('err_upd');
		?>
<h2>Employee Details</h2>
<br>
<table cellspacing="5" cellpadding="5">
<tr>
<th></th>
<th>E_ID</th>
<th>Name</th>
<th>Designation</th>
<th>Gender</th>
<th>Address</th>
<th>Email</th>
<th>Phone</th>
<th>Join Date</th>
<th></th>
<th>
</tr>
<?php
foreach ($key as $i)
{
    ?>

    <tr>
	<td style="font-size:14px !important;"><img src="<?php echo base_url('assets/uploads/'.$i->image); ?>" style="height: 60px; width: 60px;"></td>
    <td style="font-size:14px !important;"><?php echo $i->e_id; ?></td>
    <td style="font-size:14px !important;"><?php echo $i->e_name; ?></td>
	<td style="font-size:14px !important;"><?php echo $i->e_dsgn; ?></td>
    <td style="font-size:14px !important;"><?php echo $i->gender; ?></td>
	<td style="font-size:14px !important;"><?php echo $i->address; ?></td>
	<td style="font-size:14px !important;"><?php echo $i->email; ?></td>
    <td style="font-size:14px !important;"><?php echo $i->phone; ?></td>
    <td style="font-size:14px !important;"><?php echo $i->join_date; ?></td>
	<td style="font-size:14px !important;"><a href="<?php echo base_url('Admin/update_row/').$i->e_id;?>"><i class="fa fa-pencil"></i></a></td>
	<td style="font-size:14px !important;"><a href="<?php echo base_url('Admin/delete_row/').$i->e_id;?>"<i class="fa fa-trash"></i></a></td>
    
    </tr>

    <?php
} 
?>
</table>
<br>
<a class="btn btn-primary" href="<?php echo base_url('Admin/home') ?>">Back to home</a>

</div>
</div>
</div>
</div>

