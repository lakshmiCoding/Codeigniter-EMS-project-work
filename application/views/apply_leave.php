<div style="padding-left:300px; padding-top:100px;">
   <div class="container">
      <div class="row">
         <div class="col-md-4 col-md-offset-4">
            <?php
                $userdetails = $this->session->userdata('empdetails');
                extract($userdetails);

            ?>
            <h2>Apply for Leave </h2>
            <form method="post" action="<?php echo base_url('Employee/applyleave/'.$e_id); ?>" class="form-group">
            <label for="leavetype">Leave Type</label>
            <select  name="leavetype" autocomplete="off">
                <!-- <option value="">Select leave type...</option> -->
                <option value="Casual leave">Casual leave</option>
                <option value="Sick leave">Sick leave</option>
                <option value="Duty leave">Duty leave</option>
            </select><br><br>
            <label for="fromdate">From  Date</label>
            <input placeholder="" id="mask1" name="fromdate" class="form-control masked" type="date" data-inputmask="'alias': 'date'" min="<?php echo date('Y-m-d'); ?>" required>
            <br><br>
            <label for="todate">To Date</label>
            <input placeholder="" id="mask1" name="todate" class="form-control masked" type="date" data-inputmask="'alias': 'date'" min="<?php echo date('Y-m-d'); ?>" required>
            <br><br>
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="4" required></textarea><br><br>
            <input type='submit' name="submit">
			</form>
         </div>
      </div>
   </div>
</div>