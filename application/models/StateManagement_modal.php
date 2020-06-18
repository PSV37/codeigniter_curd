<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StateManagement_modal extends CI_Model{
		
	// Load all states from DB
	public function get_states(){
		$query = $this->db->get('tbl_state');
		return $query;	
	}

	// Get state by id
	public function get_state_by_id($state_id){
		$query = $this->db->get_where('tbl_state', array('id' =>  $state_id));
		return $query;
	}

	// Update state
	public function update_state($state_id,$state_name){

		$this->db->set('state_name', $state_name);
		$this->db->where('id', $state_id);
		$this->db->update('tbl_state');
	}

	//Delete state
	public function delete_state($state_id){
		$this->db->delete('tbl_state', array('id' => $state_id));
	}


	// Save city
   public function save_city($state_id, $city_name)
   {
		$data = array(
			'city_name' => $city_name,
			'state_id' => $state_id,
		);

		$this->db->insert('tbl_city',$data);
   }

   // Get all cities
   public function get_all_cities()
   {
   		$this->db->select('state_name,city_name, tbl_city.id');
		$this->db->from('tbl_city');
		$this->db->join('tbl_state','tbl_city.state_id = tbl_state.id');
		$query = $this->db->get();
		return $query;
   }
	

   // Get by id
	public function get_city_by_id($city_id)
	{
		$query = $this->db->get_where('tbl_city', array('id' =>  $city_id));
		return $query;
	}

	 // Update city
	public function update_city($city_id, $state_id, $city_name)
	{
		$this->db->set('state_id', $state_id);
		$this->db->set('city_name', $city_name);
		$this->db->where('id', $city_id);

		$this->db->update('tbl_city');
	}

	// Delete city from DB
	public function delete_city($city_id)
	{
	 	$this->db->delete('tbl_city', array('id' => $city_id));
	}
}
