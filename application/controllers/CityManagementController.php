<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CityManagementController extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('StateManagement_modal','state_model');
		$this->load->library('session');
	}

	public function index(){
		$data['cities'] = $this->state_model->get_all_cities();
		$this->load->view('city_management/city_list', $data);
	}

	// Load all states
	public function get_all_states()
	{
		$data['states'] = $this->state_model->get_states()->result();
		echo json_encode($data);
	}

	// update product to database
	public function update_city(){

		$state_id 	= $this->input->post('state_option',TRUE);
		$city_name 	= $this->input->post('city_name',TRUE);
		$city_id 	= $this->input->post('city_id',TRUE);

		$this->state_model->update_city($city_id, $state_id, $city_name);
		$this->session->set_flashdata('msg_city','<div class="alert alert-success">City Saved</div>');
		redirect('CityManagementController');
	}

	// Load edit view
	public function get_edit()
	{
		$city_id = $this->uri->segment(3);
		$data['city_id'] = $city_id;
		$data['states'] = $this->state_model->get_states()->result();
		$get_data = $this->state_model->get_city_by_id($city_id);
		if($get_data->num_rows() > 0){
			$row = $get_data->row_array();
			$data['id'] = $row['state_id'];
			$data['city_name'] = $row['city_name'];
		}

		$this->load->view('city_management/edit_city_view',$data);
	}

	// save city
	public function save_city()
	{
		$state_id 	= $this->input->post('state_option',TRUE);
		$city_name 	= $this->input->post('city_name',TRUE);
	
		$this->state_model->save_city($state_id, $city_name);
		$this->session->set_flashdata('msg_city','<div class="alert alert-success">City Saved</div>');
		redirect('CityManagementController');
	}

	// Delete city from Database
	public function delete(){
		$city_id = $this->uri->segment(3);
		$this->state_model->delete_city($city_id);
		$this->session->set_flashdata('msg','<div class="alert alert-success">City Deleted</div>');
		redirect('CityManagementController');
	}

}