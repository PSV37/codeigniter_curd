<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	<link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">

	  <div class="row justify-content-md-center add_city" style="    margin-top: 39px;">
	    <div class="col col-lg-6">
	    	<div>
	    	<h3>Update City:</h3> 
	    	<span class="back_to_list"><a >Back To List</a></span>
	    </div>
	    	
	      	<form action="<?php echo site_url('CityManagementController/update_city');?>" method="post">

				<div class="form-group">
				    <label>States</label>
				    <select class="form-control" name="state_option" id="state_option" required>
				    	<option value="">No Selected</option>
				    	<?php foreach($states as $row):?>
				    	<option  value="<?php echo $row->id;?>" <?php if ($row->id && $row->id==$id)  echo 'selected = "selected"'; ?> ><?php echo $row->state_name;?></option>
				    	<?php endforeach;?>

				    </select>
				</div>

	      		<div class="form-group">
				    <label>city Name</label>
				    <input type="text" class="form-control" name="city_name" value=<?php echo $city_name ?> id="city_name" placeholder="City Name" required>
				    <input type="hidden" class="form-control" name="city_id" value=<?php echo $city_id ?>  id="city_id">
				</div>

				<button class="btn btn-success" type="submit">Save</button>
				<button class="btn btn-success" ><a href="<?php echo site_url('CityManagementController/');?>" style="color:white">cancel</button>

			</form>
			<button class="btn btn-sm btn-info btn-block" style="margin-top: 19px;"><a href="<?php echo site_url('CityManagementController/');?>" style="color:white;margin-top: 19px;">Back To City List</a></button>
	    </div>
	  </div>

	</div>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			get_states();
			$('#mytable').DataTable();



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


                        // $('#state_option').html(html);
                    }

            	});
            }
		});
	</script>
</body>
</html>