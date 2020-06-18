<!DOCTYPE html>
<html>
<head>
	<title>Add City</title>
	<link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">

	  <div class="row justify-content-md-center">
	    <div class="col col-lg-6">
	    	<div>
	    	<h3>Add City:</h3> 
	    	<span><a href="<?php echo site_url('StateManagementController') ?>">Back To List</a></span>
	    </div>
	    	
	      	<form action="<?php echo site_url('StateManagementController/update_state');?>" method="post">

				<div class="form-group">
				    <label>Category</label>
				    <select class="form-control" name="category" id="category" required>
				    	<option value="">No Selected</option>
				    	<?php foreach($states as $row):?>
				    	<option value="<?php echo $row->id;?>"><?php echo $row->state_name;?></option>
				    	<?php endforeach;?>
				    </select>
				</div>

	      		<div class="form-group">
				    <label>city Name</label>
				    <input type="text" class="form-control" name="city_name" placeholder="State Name" required>
				</div>

				<input type="hidden" name="state_id" value="<?php echo $state['id'];?>" required>
				<button class="btn btn-success" type="submit">Save</button>
				<button class="btn btn-success" ><a href="<?php echo site_url('StateManagementController/');?>">cancel</button>

			</form>
	    </div>
	  </div>

	</div>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
</body>
</html>