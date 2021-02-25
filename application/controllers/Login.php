<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
  
  	//Load Model
  	public function __construct()
  	{
  		parent::__construct();
  		$this->load->model('user_model');
  	}

  	//Halaman Login 
	public function index()
	{
		//Validasi
		$valid = $this->form_validation;

		$valid->set_rules('username','Username','required', array('required' =>'Username harus diisi'));
		$valid->set_rules('password','Password','required|min_length[6]', array('required' => 'Password harus diisi',
			'min_length' => 'Password minimal 6 karakter'));

	if($valid->run()=== FALSE) {
		//End Validasi
	
	$data = array('title'=>'Login Administrator');
	$this->load->view('admin/login_view', $data, FALSE);
	//Check Username dan password compare dengan database
	}else{
		$i  		= $this->input;
		$username 	= $i->post('username');
		$password   = $i->post('password');
		// Check di database
		$check_login  = $this->user_model->login($username,$password);
		//kalau ada record, maka create session redirect ke halaman dasbor
		if($check_login == true) {
			$this->session->set_userdata('username', $username);
			$this->session->set_userdata('akses_level', $check_login->akses_level);
			$this->session->set_userdata('id_user', $check_login->id_user);
			$this->session->set_userdata('nama', $check_login->nama);
			redirect(base_url('admin/dasbor'),'refresh');
		}else{
			//Kalau username atau password tidak cocok/error
			$this->session->set_flashdata('sukses', 'Username atau password tidak cocok');
		 	redirect(base_url('login'),'refresh');
		}
	}
	 // End Checking
	}

	//Logout 
	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('akses_level');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('sukses', 'Anda Berhasil Logout');
		redirect(base_url('login'),'refresh');
	}
	}
/* End of file Login.php */
/* Location: ./application/controllers/Login.php */