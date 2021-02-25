<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat extends CI_Controller {

	//Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('sert_model');
	}
	// Halaman Utama
	public function index()
	{
		$sertifikat = $this->sert_model->listing();
		$data = array('title' => 'Data Sertifikat('.count($sertifikat).' data)',
					  'sertifikat' => $sertifikat,
					  'isi' => 'admin/sertifikat/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//Halaman Tambah
    public function tambah()
    {
        // Validasi
        $valid = $this->form_validation;

        $valid->set_rules('nama_sertifikat', 'Nama Sertifikat', 'required',
            array('required' => 'Nama Sertifikat harus diisi'));

        $valid->set_rules('bidang_sertifikat', 'Bidang Sertifikat', 'required',
            array('required' => 'Bidang Sertifikat harus diisi',
                'bidang_sertifikat' => 'Bidang Sertifikat tidak benar'));

        if ($valid->run() === FALSE) {
           // if($valid->run()=== FALSE) {
    //End Validasi

    
    $data = array('title' => 'Tambah Sertifikat',    'isi'=> 'admin/sertifikat/tambah');
    $this->load->view('admin/layout/wrapper', $data, FALSE);
    // Error aman
    }else{

            // Kalau Sertifikat tidak di upload
            if (!empty($_FILES['upload_sertifikat']['name'])) {
                $config['upload_path'] = './assets/upload/image/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg|pdf';
                $config['max_size'] = '2000'; // KB
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('upload_sertifikat')) {

                    //End Validasi
                    $data = array('title' => 'Tambah Sertifikat',
                        'error' => $this->upload->display_errors(),
                        'isi' => 'admin/sertifikat/tambah');
                    $this->load->view('admin/layout/wrapper', $data, FALSE);

                    // Error aman
                } else {
                    // Upload
                    $upload_data                = array('uploads' =>$this->upload->data());
                    // Image Editor
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/upload/image/'.$upload_data['uploads']['file_name']; 
                    $config['new_image']        = './assets/upload/image/thumbs/';
                    $config['create_thumb']     = TRUE;
                    $config['quality']          = "100%";
                    $config['maintain_ratio']   = TRUE;
                    $config['width']            = 360; // Pixel
                    $config['height']           = 360; // Pixel
                    $config['x_axis']           = 0;
                    $config['y_axis']           = 0;
                    $config['thumb_marker']     = '';
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $i = $this->input;
                    $data = array(                        'id_user' => $this->session->userdata('id_user'),
                        'nama_sertifikat' => $i->post('nama_sertifikat'),
                        'juara' => $i->post('juara'),
                        'bidang_sertifikat' => $i->post('bidang_sertifikat'),
                        'tingkat_penghargaan' => $i->post('tingkat_penghargaan'),
                        'tahun_sertifikat' => $i->post('tahun_sertifikat'),
                        'upload_sertifikat' => $upload_data['uploads']['file_name'],
                        'tanggal_entri' => date('Y-m-d H:i:s')
                    );
                    $this->sert_model->tambah($data);
                    $this->session->set_flashdata('sukses', 'Data telah ditambah dan Akan Segera di Verifikasi');
                    redirect(base_url('admin/sertifikat'), 'refresh');

                }}else {
                    //Script masukin sertifikat tanpa upload
                    $i = $this->input;
                    $data = array('id_sertifikat' => $id_sertifikat,
                        'id_user' => $this->session->userdata('id_user'),
                        'nama_sertifikat' => $i->post('nama_sertifikat'),
                        'juara' => $i->post('juara'),
                        'bidang_sertifikat' => $i->post('bidang_sertifikat'),
                        'tingkat_penghargaan' => $i->post('tingkat_penghargaan'),
                        'tahun_sertifikat' => $i->post('tahun_sertifikat'),
                        'upload_sertifikat' => $upload_data['uploads']['file_name'],
                        'tanggal_entri' => date('Y-m-d H:i:s')
                    );
                    $this->sert_model->tambah($data);
                    $this->session->set_flashdata('sukses', 'Data telah ditambah');
                    redirect(base_url('admin/sertifikat'), 'refresh');
                }}

                    //End Masuk Database
                    $data = array('title' => 'Tambah Sertifikat',
             		    'isi'	  => 'admin/sertifikat/tambah');
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                }
        
 	//Halaman Edit
    public function edit($id_sertifikat)
        {
            $sertifikat = $this->sert_model->detail($id_sertifikat);
            $valid = $this->form_validation;

    $valid->set_rules('nama_sertifikat', 'Nama sertifikat', 'required',
        array ('required'=> 'Nama harus diisi'));

    $valid->set_rules('bidang_sertifikat', 'bidang_sertifikat', 'required',
        array ('required'=> 'bidang_sertifikat harus diisi'));

    $valid->set_rules('tahun_sertifikat', 'bidang_sertifikat', 'required',
        array ('required'=> 'Jurusan harus diisi'));

if($valid->run()=== FALSE) {
            $data = array('title' => 'Edit sertifikat: '.$sertifikat->nama_sertifikat,
                  'sertifikat' => $sertifikat,
                  'isi'=> 'admin/sertifikat/edit');
        $this->load->view('admin/layout/wrapper', $data,false);
           
           }else{ // Upload
                   //  $upload_data                = array('uploads' =>$this->upload->data());
                   //  // Image Editor
                   //  $config['image_library']    = 'gd2';
                   //  $config['source_image']     = './assets/upload/image/'.$upload_data['uploads']['file_name']; 
                   //  $config['new_image']        = './assets/upload/image/thumbs/';
                   //  $config['create_thumb']     = TRUE;
                   //  $config['quality']          = "100%";
                   //  $config['maintain_ratio']   = TRUE;
                   //  $config['width']            = 360; // Pixel
                   //  $config['height']           = 360; // Pixel
                   //  $config['x_axis']           = 0;
                   //  $config['y_axis']           = 0;
                   //  $config['thumb_marker']     = '';
                   // // $this->load->library('image_lib', $config);
                   //  // $this->image_lib->resize();

            $i = $this->input;
             $data = array('id_sertifikat' => $id_sertifikat,
                        'nama_sertifikat' => $i->post('nama_sertifikat'),
                        'juara' => $i->post('juara'),
                        'bidang_sertifikat' => $i->post('bidang_sertifikat'),
                        'tingkat_penghargaan' => $i->post('tingkat_penghargaan'),
                        'tahun_sertifikat' => $i->post('tahun_sertifikat'),
                        //'upload_sertifikat' => $upload_data['uploads']['file_name'],
                        'tanggal_entri' => date('Y-m-d H:i:s')
                    );

                //End if
                $this->sert_model->edit($data);
                // unlink('./assets/upload/image/'.$data['upload_sertifikat']);
                $this->session->set_flashdata('sukses', 'Data telah diedit');
                redirect(base_url('admin/sertifikat'), 'refresh');
            }}
            //End Masuk Database
        

    //Delete
    public function delete($id_sertifikat)
        {
            //Proteksi hapus disini
            if ($this->session->userdata('nama_sertifikat') == "" && $this->session->userdata('nama_sertifikat') == "") {
                $this->session->set_flashdata('sukses', 'Silahkan login dahulu');
                // redirect(base_url('login'), 'refresh');
            }
            //End Proteksi
            $data = array('id_sertifikat' => $id_sertifikat);
            $this->sert_model->delete($data);
            $this->session->set_flashdata('sukses', 'Data telah dihapus');
            redirect(base_url('admin/sertifikat'), 'refresh');
        }
    }



/* End of file sertifikat.php */
/* Location:./application/controllers/sertifikat.php */
