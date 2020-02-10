<div class="box box-default">
<div class="box-header with-border">
  <h3 class="box-title">Login DKRTH</h3>
</div>
<div class="box-body">
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>/login_proses.php">
  <div class="form-group">
	<label class="control-label col-sm-2" for="username">Username:</label>
	<div class="col-sm-10">
	  <input type="username" name="username" class="form-control" id="username" placeholder="Enter Username">
	</div>
  </div>
  <div class="form-group">
	<label class="control-label col-sm-2" for="pwd">Password:</label>
	<div class="col-sm-10">
	  <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
	</div>
  </div>
  <div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
	  <button type="submit" class="btn btn-default">Submit</button>
	</div>
  </div>
</form> 
</div>
<!-- /.box-body -->
</div>