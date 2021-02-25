<?php

class User extends CI_Controller {

	//Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	// Halaman Utama
	public function index()
	{
		$user = $this->user_model->listing();
		$data = array('title' => 'Data User('.count($user).' data)',
					  'user' => $user,
					  'isi' => 'admin/user/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//Halaman Tambah
	public function tambah(){

	// Validasi
	$valid = $this->form_validation;

	$valid->set_rules('nama', 'Nama', 'required',
		array ('required'=> 'Nama harus diisi'));

	$valid->set_rules('email', 'Email', 'required|valid_email',
		array ('required'=> 'Email harus diisi',
			'valid_email' => 'Format email tidak benar'));


	$valid->set_rules('username', 'Username', 'required|is_unique[user.username]', array('required' => 'Username harus diisi', 
		'is_unique'	=>'Username <strong>'.$this->input->post('username').'</strong> sudah ada. Buat username baru'));

	$valid->set_rules('password', 'Password', 'required|min_length[6]', array('required' => 'Password harus diisi', 
		'min-length'	=>'Password minimal minimal 6 karakter'));

	if($valid->run()=== FALSE) {
	//End Validasi

	
	$data = array('title' => 'Tambah User',	'isi'=> 'admin/user/tambah');
	$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Masuk Database
	}else{
		$i = $this->input;
		$data= array(	'nama' 			=> $i->post('nama'),
						'email' 		=> $i->post('email'),
						'jurusan'		=> $i->post('jurusan'),
						'username' 		=> $i->post('username'),
						'password' 		=> sha1($i->post('password')),
						'akses_level' 	=> $i->post('akses_level'),
						'keterangan' 	=> $i->post('keterangan'));
	$this->user_model->tambah($data);
	$this->session->set_flashdata('sukses','Data telah ditambah dan segera di verifikasi');
	redirect(base_url('admin/user'), 'refresh');
  
	//End Masuk Database
	}
}
//Halaman Edit
	public function edit($id_user){
		$user = $this->user_model->detail($id_user);

	// Validasi
	$valid = $this->form_validation;

	$valid->set_rules('nama', 'Nama', 'required',
		array ('required'=> 'Nama harus diisi'));

	$valid->set_rules('email', 'Email', 'required|valid_email',
		array ('required'=> 'Email harus diisi',
			'valid_email' => 'Format email tidak benar'));

	$valid->set_rules('jurusan', 'jurusan', 'required',
		array ('required'=> 'Jurusan harus diisi'));

	$valid->set_rules('username', 'Username', 'required|is_unique[user.username]', array('required' => 'Username harus diisi', 
		'is_unique'	=>'Username <strong>'.$this->input->post('username').'</strong> sudah ada. Buat username baru'));

	$valid->set_rules('password', 'Password', 'required|min_length[6]', array('required' => 'Password harus diisi', 
		'min-length'	=>'Password minimal minimal 6 karakter'));

	if($valid->run()=== FALSE) {
	//End Validasi

	
	$data = array('title' => 'Edit User: '.$user->nama,
				  'user' => $user, 	
				  'isi'=> 'admin/user/edit');
	$this->load->view('admin/layout/wrapper', $data, FALSE);
	// Error aman
	}else{ 
		$i = $this->input;
		
		//Jika input password lebih dari 6 karakter
		if(strlen($i->post('password')) > 6){

		$data= array(	'id_user'		=> $id_user,
						'nama' 			=> $i->post('nama'),
						'email' 		=> $i->post('email'),
						'jurusan'		=> $i->post('jurusan'),
						'password' 		=> sha1($i->post('password')),
						'akses_level' 	=> $i->post('akses_level'),
						'keterangan' 	=> $i->post('keterangan'));
	}else{
		$data= array(	'id_user'		=> $id_user,
						'nama' 			=> $i->post('nama'),
						'email' 		=> $i->post('email'),
						'jurusan'		=> $i->post('jurusan'),
						'akses_level' 	=> $i->post('akses_level'),
						'keterangan' 	=> $i->post('keterangan')
					);

	}
	//End if
	$this->user_model->edit($data);
	$this->session->set_flashdata('sukses','Data telah diedit');
	redirect(base_url('admin/user'), 'refresh');
}
	//End Masuk Database
	}
	//Delete
	public function delete($id_user){
	//Proteksi hapus disini
	if($this->session->userdata('username') == "" && $this->session->userdata('akses_level')==""){
	$this->session->set_flashdata('sukses', 'Silahkan login dahulu');
	redirect(base_url('login'),'refresh');
}
	//End Proteksi
	$data = array('id_user' => $id_user);
	$this->user_model->delete($data);
	$this->session->set_flashdata('sukses', 'Data telah dihapus');
	redirect(base_url('admin/user'),'refresh');
	}
}





/* End of file user.php */
/* Location: ./application/controllers/user.php */ 