<!DOCTYPE html>
<html>
<head>
	<title>State Management</title>
	<link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url().'assets/css/datatables.css'?>" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
	  <div class="row justify-content-md-center ">
	    <div class="col col-lg-8" style="margin-top: 26px;">

	    	<h3 style="    margin-bottom: 28px;">City Management</h3>
	    	<?php echo $this->session->flashdata('msg_city');?>
	    	<!-- <a  class="btn btn-success btn-sm add_city_button">Add City</a><hr/> -->
	      	<table class="table table-striped city_list" id="city_table" style="font-size: 14px;">
	      		<thead>
	      			<tr>
	      				<th>No</th>
	      				<th>State Name</th>
	      				<th>City Name</th>
	      				<th>Action</th>
	      			</tr>
	      		</thead>
	      		<tbody>
	      			<?php
	      				$no = 0;
	      				foreach ($cities->result() as $row):
	      					$no++;
	      			?>
	      			<tr>
	      				<td><?php echo $no;?></td>
	      				<td><?php echo $row->state_name;?></td>
	      				<td><?php echo $row->city_name;?></td>
	      				<td>
	      					<a href="<?php echo site_url('CityManagementController/get_edit/'.$row->id);?>" class="btn btn-sm btn-info">Edit</a>
	      					<a href="<?php echo site_url('CityManagementController/delete/'.$row->id);?>" class="btn btn-sm btn-danger">Delete</a>  
	      					<!-- onclick="myFunction('<?php echo $row->id ?>')" -->
	      				</td>
	      			</tr>
	      			<?php endforeach;?>
	      		</tbody>
	      	</table>
	      		<button class="btn btn-sm btn-info btn-block" style="margin-top: 36px;"><a href="<?php echo site_url('StateManagementController/');?>" style="color:white;margin-top: 10px">State Management</a></button>
	    </div>
	  </div>


	  <!-- Add city form -->
	  <div class="row justify-content-md-center add_city" style="    margin-top: 39px;">
	    <div class="col col-lg-6">
	    	<div>
	    	<h3>Add City:</h3> 
	    	<span class="back_to_list"><a >Back To List</a></span>
	    </div>
	      	<form action="<?php echo site_url('CityManagementController/save_city');?>" method="post">
				<div class="form-group">
				    <label>States</label>
				    <select class="form-control" name="state_option" id="state_option" required>
				    	<option value="">No Selected</option>
				    </select>
				</div>

	      		<div class="form-group">
				    <label>city Name</label>
				    <input type="text" class="form-control" name="city_name"  id="city_name" placeholder="City Name" required>
				</div>

				<button class="btn btn-success" type="submit">Save</button>
				<button class="btn btn-success" ><a href="<?php echo site_url('CityManagementController/');?>" style="color:white">cancel</button>

			</form>
	    </div>
	  </div>
	</div>





	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/datatables.js'?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			get_states();
			$('#city_table').DataTable();



			//load data for edit
            function get_states(){
            	$.ajax({
            		url : "<?php echo site_url('CityManagementController/get_all_states');?>",
                    method : "GET",
                    async : true,
                    dataType : 'json',
                    success : function(data){
                    	console.log('response')
                    	console.log(data)
                    	console.log(data.states.length)
                    	var html = '';
                        var i;
                        for(i=0; i<data.states.length; i++){
                        	console.log(data.states)
                        	console.log(i)
                            html += '<option value='+data.states[i].id+'>'+data.states[i].state_name+'</option>';
                        }


                        $('#state_option').html(html);
                    }

            	});
            }
		});
	</script>

</body>
</html>