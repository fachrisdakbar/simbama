<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing
	public function listing(){
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->order_by('nim','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail
	public function detail($id_user){
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('nim',$id_user);
		$this->db->order_by('nim','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//Login
	public function login($username, $password){
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where(array('username' => $username,
							   'password' => sha1($password)));
		$this->db->order_by('nim','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah
	public function tambah($data){
		$this->db->insert('mahasiswa' ,$data);
	}
	//Edit
	public function edit($data){
		$this->db->where('nim',$data['nim']);
		$this->db->update('mahasiswa',$data);
	}

	//Delete
	public function delete($data){
		$this->db->where('nim',$data['nim']);
		$this->db->delete('mahasiswa',$data);
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */