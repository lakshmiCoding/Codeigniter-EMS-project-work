<div style="padding-left:300px; padding-top:100px;">
<div class="container">
	
	<div class="row">
	<div class="col-md-4 col-md-offset-4">

    <h1>Welcome to CodeIgniter- calendar!</h1>
    <br>
   <div id="option">
    </div>
<div id="calendar">
    <?php 
    // Generate calendar
    echo $this->calendar->generate($year, $month);
    ?>
</div>

</div>
</div>
</div>
</div>