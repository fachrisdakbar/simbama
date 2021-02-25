<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_daftar');
		$this->load->helper('url');

	}

// Halaman Regitrasi
	public function index()
	{
// Validasi
	$valid = $this->form_validation;

	$valid->set_rules('nama', 'Nama', 'required',
		array ('required'=> 'Nama harus diisi'));

	$valid->set_rules('email', 'Email', 'required|valid_email',
		array ('required'=> '%s harus diisi',
			'valid_email' => '%s tidak valid'));

	$valid->set_rules('username', 'Username', 'required|is_unique[user.username]', array('required' => 'Username harus diisi',
		'is_unique'	=>'Username <strong>'.$this->input->post('username').'</strong> sudah ada. Buat username baru'));

	$valid->set_rules('password', 'Password', 'required|min_length[6]', array('required' => 'Password harus diisi',
		'min-length'	=>'Password minimal minimal 6 karakter'));

	if($valid->run()=== FALSE) {

//End Validasi
		$data = array('title'=>'Registrasi',
			'isi' =>'v_regis');
		$this->load->view('v_regis', $data, FALSE);
	// Masuk Database
	}else{
		$i = $this->input;
		$data= array(	'nama' 			=> $i->post('nama'),
						'email' 		=> $i->post('email'),
						'jurusan'		=> $i->post('jurusan'),
						'username' 		=> $i->post('username'),
						'password' 		=> sha1($i->post('password')),
						'akses_level' 	=> $i->post('akses_level'),
						'keterangan' 	=> $i->post('keterangan'),
						'tanggal'	=> date('Y-m-d H:i:s'));
	$this->m_daftar->input_data($data);
	$this->session->set_flashdata('sukses','Registrasi berhasil');
	redirect(base_url('login'), 'refresh');

	//End Masuk Database
	}
	}
	//Sukses
	public function sukses()
	{
		$data = array('title'=>'Registrasi berhasil',
			'isi' =>'admin/v_regis');
		$this->load->view('layout/wrapper', $data, FALSE);
	}
}


/* End of file Login.php */
/* Location: ./application/controllers/Registrasi.php */