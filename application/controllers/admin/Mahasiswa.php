<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	//Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mhs_model');
	}
	// Halaman Utama
	public function index()
	{
		$mahasiswa = $this->mhs_model->listing();
		$data = array('title' => 'Data Mahasiswa('.count($mahasiswa).' data)',
					  'mahasiswa' => $mahasiswa,
					  'isi' => 'admin/mahasiswa/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//Halaman Tambah
	public function tambah(){

	// Validasi
	$valid = $this->form_validation;

	$valid->set_rules('nama_mhs', 'Nama Mahasiswa', 'required',
		array ('required'=> 'Nama harus diisi'));

	$valid->set_rules('nim', 'Nim', 'required',
		array ('required'=>  'Nim harus diisi',
				'nim' => 'nim tidak benar'));

	$valid->set_rules('username', 'Username', 'required|is_unique[mahasiswa.username]', array('required' => 'Username harus diisi',
		'is_unique'	=>'Username <strong>'.$this->input->post('username').'</strong> sudah ada. Buat username baru'));

	$valid->set_rules('password', 'Password', 'required|min_length[6]', array('required' => 'Password harus diisi',
		'min-length'	=>'Password minimal minimal 6 karakter'));

	if($valid->run()=== FALSE) {
	//End Validasi


	$data = array('title' => 'Tambah Mahasiswa',	'isi'=> 'admin/mahasiswa/tambah');
	$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Error aman
	}else{
		$i = $this->input;
		$data= array(	'id_user'			=> $this->session->userdata('id_user'),
						'nama_mhs' 			=> $i->post('nama_mhs'),
						'nim' 				=> $i->post('nim'),
						'prodi'				=> $i->post('prodi'),
						'jurusan'			=> $i->post('jurusan'),
						'username'	 		=> $i->post('username'),
						'password' 			=> sha1($i->post('password'))
					);
	$this->mhs_model->tambah($data);
	$this->session->set_flashdata('sukses','Data telah ditambah dan Akan Segera di Verifikasi');
	redirect(base_url('admin/mahasiswa'), 'refresh');

	//End Masuk Database
	}
}
	//Halaman Edit
	public function edit($nim){
		$mahasiswa = $this->mhs_model->detail($nim);

	// Validasi
	$valid = $this->form_validation;

	$valid->set_rules('nama_mhs', 'Nama Mahasiswa', 'required',
		array ('required'=> 'Nama harus diisi'));

	$valid->set_rules('nim', 'nim', 'required',
		array ('required'=> 'Nim harus diisi'));

	$valid->set_rules('prodi', 'prodi', 'required',
		array ('required'=> 'Nim harus diisi'));

	$valid->set_rules('jurusan', 'jurusan', 'required',
		array ('required'=> 'Jurusan harus diisi'));

	// $valid->set_rules('username', 'Username', 'is_unique[mahasiswa.username]', array('required' => 'Username harus diisi',
	// 	'is_unique'	=>'Username <strong>'.$this->input->post('username').'</strong> sudah ada. Buat username baru'));

	$valid->set_rules('password', 'Password', 'required|min_length[6]', array('required' => 'Password harus diisi',
		'min-length'	=>'Password minimal minimal 6 karakter'));

	if($valid->run()=== FALSE) {
	//End Validasi


	$data = array('title' => 'Edit Mahasiswa: '.$mahasiswa->nama_mhs,
				  'mahasiswa' => $mahasiswa,
				  'isi'=> 'admin/mahasiswa/edit');
	$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Error aman
	}else{
		$i = $this->input;

		//Jika input password lebih dari 6 karakter
		if(strlen($i->post('password')) > 6){

		$data= array(	'id_user'		=> $this->session->userdata('id_user'),
						'nama_mhs' 		=> $i->post('nama_mhs'),
						'nim'			=> $i->post('nim'),
						'prodi' 		=> $i->post('prodi'),
						'jurusan'		=> $i->post('jurusan'),
						'username'		=> $i->post('username'),
						'password' 		=> sha1($i->post('password')),
						'jlh_sertifikat' 	=> $i->post('jlh_sertifikat'),
						'ktr_sertifikat' 	=> $i->post('ktr_sertifikat'));
	}else{
		$data= array(	'id_user'		=> $this->session->userdata('id_user'),
						'nama_mhs' 		=> $i->post('nama_mhs'),
						'nim'			=> $i->post('nim'),
						'prodi' 		=> $i->post('prodi'),
						'jurusan'		=> $i->post('jurusan'),
						'username' 		=> $i->post('username'),
						'jlh_sertifikat' 	=> $i->post('jlh_sertifikat'),
						'ktr_sertifikat' 	=> $i->post('ktr_sertifikat'));

	}
	//End if
	$this->mhs_model->edit($data);
	$this->session->set_flashdata('sukses','Data telah diedit');
	redirect(base_url('admin/mahasiswa'), 'refresh');
}
	//End Masuk Database
	}
	//Delete
	public function delete($nim){
	//Proteksi hapus disini
	if($this->session->userdata('username') == "" && $this->session->userdata('jlh_sertifikat')==""){
	$this->session->set_flashdata('sukses', 'Silahkan login dahulu');
	redirect(base_url('login'),'refresh');
}
	//End Proteksi
	$data = array('nim' => $nim);
	$this->mhs_model->delete($data);
	$this->session->set_flashdata('sukses', 'Data telah dihapus');
	redirect(base_url('admin/mahasiswa'),'refresh');
	}
}


/* End of file mahasiswa.php */
/* Location: ./application/controllers/mahasiswa.php */
