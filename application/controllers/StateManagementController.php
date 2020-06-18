<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StateManagementController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('StateManagement_modal','state_model');
		$this->load->library('session');
	}

	//Loadview with data
	public function index(){
		$data['states'] = $this->state_model->get_states();
		$this->load->view('state_management/state_list',$data);
	}

	// Load edit page
	public function get_edit(){
		$product_id = $this->uri->segment(3);

		$get_data = $this->state_model->get_state_by_id($product_id);
		$data['state'] = $get_data->row_array();

		$this->load->view('state_management/edit_state_view',$data);
	}

	// update state to database
	public function update_state(){

		$state_id 	= $this->input->post('state_id',TRUE);
		$state_name 	= $this->input->post('state_name',TRUE);

		$this->state_model->update_state($state_id, $state_name);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Product Updated</div>');
		redirect('StateManagementController');
	}

	// Delete state from Database
	public function delete(){
		$state_id = $this->uri->segment(3);
		
		$this->state_model->delete_state($state_id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">Product Deleted</div>');

		redirect('StateManagementController');
	}


	
}