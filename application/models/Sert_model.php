<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sert_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing
	public function listing(){
		$this->db->select('*');
		$this->db->from('sertifikat');
		$this->db->order_by('id_sertifikat','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail
	public function detail($id_sertifikat){
		$this->db->select('*');
		$this->db->from('sertifikat');
		$this->db->where('id_sertifikat',$id_sertifikat);
		$this->db->order_by('id_sertifikat','DESC');
		$query = $this->db->get();
		return $query->row();
	}

	// //Login
	// public function login($username, $password){
	// 	$this->db->select('*');
	// 	$this->db->from('user');
	// 	$this->db->where(array('username' => $username,
	// 						   'password' => sha1($password)));
	// 	$this->db->order_by('id_user','DESC');
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }

	//Tambah
	public function tambah($data){
		$this->db->insert('sertifikat' ,$data);
	}
	//Edit
	public function edit($data){
		$this->db->where('id_sertifikat',$data['id_sertifikat']);
		$this->db->update('sertifikat',$data);
	}

	//Delete
	public function delete($data){
		$this->db->where('id_sertifikat',$data['id_sertifikat']);
		$this->db->delete('sertifikat',$data);
	}

}

/* End of file Sert_model.php */
/* Location: ./application/models/Sert_model.php */