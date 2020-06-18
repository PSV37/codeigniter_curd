<!DOCTYPE html>
<html>
<head>
	<title>State Management</title>
	<link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'assets/css/datatables.css'?>" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">

	  <div class="row justify-content-md-center">
	    <div class="col col-lg-8" style="margin-top: 26px;">
	    	<h3 style="    margin-bottom: 28px;">State Management</h3>
	    	<?php echo $this->session->flashdata('msg');?>
	    	<!-- <a href="<?php echo site_url('product/add_new');?>" class="btn btn-success btn-sm">Add New Product</a><hr/> -->
	      	<table class="table table-striped" id="stateTable" style="font-size: 14px;">
	      		<thead>
	      			<tr>
	      				<th>No</th>
	      				<th>State Name</th>
	      				<th>Action</th>
	      			</tr>
	      		</thead>
	      		<tbody>
	      			<?php
	      				$no = 0;
	      				foreach ($states->result() as $row):
	      					$no++;
	      			?>
	      			<tr>
	      				<td><?php echo $no;?></td>
	      				<td><?php echo $row->state_name;?></td>
	      				<td>
	      					<a href="<?php echo site_url('StateManagementController/get_edit/'.$row->id);?>" class="btn btn-sm btn-info">Edit</a>
	      					<a href="<?php echo site_url('StateManagementController/delete/'.$row->id);?>" class="btn btn-sm btn-danger">Delete</a>  
	      					<!-- onclick="myFunction('<?php echo $row->id ?>')" -->
	      				</td>
	      			</tr>
	      			<?php endforeach;?>
	      		</tbody>
	      	</table>
	      	<button class="btn btn-sm btn-info btn-block"><a href="<?php echo site_url('CityManagementController/');?>" style="color:white">City Management</a></button>
	    </div>
	  </div>

	</div>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/datatables.js'?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#stateTable').DataTable();
		});
	</script>
</body>
</html>