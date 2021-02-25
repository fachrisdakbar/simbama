<?php 

class M_daftar extends CI_Model{
	
	function input_data($data){
		$this->db->insert('user', $data);
	}
}