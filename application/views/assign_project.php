<div style="padding-left:300px; padding-top:100px;">
   <div class="container">
      <div class="row">
         <div class="col-md-4 col-md-offset-4">
            <h2>Assign Project</h2><br>
            <form method="post" action="<?php echo base_url('Admin/assign_project'); ?>" class="form-group">
            <label for="e_id">Employee(Id)</label>
            <input placeholder="" id="mask1" name="e_id" class="form-control masked" type="text" required>
            <br><br>
            <label for="pr_id">Project(Id)</label>
            <input placeholder="" id="mask1" name="pr_id" class="form-control masked" type="text" required>
            <br><br>
            <input class="w3-left" type="submit" name="submit">
			</form>
         </div>
      </div>
   </div>
</div>