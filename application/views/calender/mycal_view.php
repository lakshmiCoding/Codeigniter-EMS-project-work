<div style="padding-left:300px; padding-top:100px;">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<!-- <a class="btn btn-primary" href="<?php //echo base_url('Mycal/add_event'); ?>">Add New Event</a> -->
				<h2>CodeIgniter- Calendar!</h2>
				<?php echo $this->session->flashdata('succ_event'); ?>
				<div id="body calend">
					<!--?php echo $this->calendar->generate($year, $month); ?-->
					<?php echo $calender; ?>
				</div>
			</div>
		</div>
	</div>
</div>