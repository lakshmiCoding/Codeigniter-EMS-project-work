<div style="padding-left:300px; padding-top:100px;">
   <div class="container">
      <div class="row">
         <div class="col-md-4 col-md-offset-4">
            <h2>Add Events to calendar</h2><br>
            <form method="post" action="<?php echo base_url('Mycal/insert_event'); ?>" class="form-group">
            <label for="e_date">Date</label>
            <input placeholder="" id="mask1" name="e_date" class="form-control masked" type="date" min="<?php echo date('Y-m-d'); ?>" width="50%" required>
            <br><br>
            <label for="event">Event</label>
            <input placeholder="" id="mask1" name="event" class="form-control masked" type="text" required>
            <br><br>
            <input type='submit' name="submit">
			</form>
         </div>
      </div>
   </div>
</div>