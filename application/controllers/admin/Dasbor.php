<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	//Homepage
    public function index()
    {
        $data = array('title'=>'Halaman Dashboard',
                      'isi'=>'admin/dasbor/list');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Profile
   	public function profile(){
   		$id_user = $this->session->userdata('id_user');
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

	
	$data = array('title' => 'Update Profile: '.$user->nama,
				  'user' => $user, 	
				  'isi'=> 'admin/dasbor/profile');
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
	$this->session->set_flashdata('sukses','Profile telah diupdate');
	redirect(base_url('admin/dasbor/profile'), 'refresh');
}
	//End Masuk Database
   	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */