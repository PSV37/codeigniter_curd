<!DOCTYPE html>
<html>
<head>
	<title>Edit State</title>
	<link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">

	  <div class="row justify-content-md-center">
	    <div class="col col-lg-6">
	    	<div>
	    	<h3>Edit Product:</h3> 
	    	<span><a href="<?php echo site_url('StateManagementController') ?>">Back To List</a></span>
	    </div>
	    	
	      	<form action="<?php echo site_url('StateManagementController/update_state');?>" method="post">

	      		<div class="form-group">
				    <label>State Name</label>
				    <input type="text" class="form-control" name="state_name" value="<?php echo $state['state_name'];?>" placeholder="State Name" required>
				</div>

				<input type="hidden" name="state_id" value="<?php echo $state['id'];?>" required>
				<button class="btn btn-success" type="submit">Update State</button>

			</form>
	    </div>
	  </div>

	</div>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
</body>
</html>