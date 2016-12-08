<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
	var $template='siswa/index';
	function __construct()
	{
		parent::__construct();					
	}
	public function index()
	{		
		if($this->session->userdata('siswa_logged_in'))
		{			
			$data['ses'] = $this->session->userdata('siswa_logged_in');
			$data['page']	= "siswa/view_home";
			$this->load->view($this->template, $data);
		}else
		{
			$this->load->view('depan');
		}
	}	
	public function profil()
	{
		if($this->session->userdata('siswa_logged_in'))
		{   
			$data['ses'] = $this->session->userdata('siswa_logged_in');
			$data['data'] = $this->report_model->get_data_single("peserta_didik",array('id_peserta'=>$data['ses']['id_peserta']));
			$data['page']	= "siswa/profil";
			$this->load->view($this->template, $data);
		}
	} 
	public function save_profil()
	{		
		$ses = $this->session->userdata('siswa_logged_in');
		if($ses)
		{
			$input = array(
				'nama_lengkap'  => $this->input->post('nama_lengkap'),
				'nama_panggil'   	=> $this->input->post('nama_panggil'),
				'jenis_kelamin'   => $this->input->post('kelamin'),
				'alamat'	 => $this->input->post('alamat'),
				'tempat_lahir'   => $this->input->post('tempat_lahir'),
				'tgl_lahir'   => $this->input->post('tgl_lahir'),
				'agama'   => $this->input->post('agama'),
				'nama_ayah'   => $this->input->post('nama_ayah'),
				'nama_ibu'   => $this->input->post('nama_ibu'),
				'pekerjaan_ayah'   => $this->input->post('pekerjaan_ayah'),
				'pekerjaan_ibu'   => $this->input->post('pekerjaan_ibu'),
				'alamat_ortu'   => $this->input->post('alamat_ortu'),
				'password'   => $this->input->post('password'),
				'telp_ortu'   => $this->input->post('telp_ortu')
			);				
			$kode= $ses['id_peserta'];
			if($kode)
				$this->report_model->edit('id_peserta',$kode,'peserta_didik',$input);
						
			$this->session->set_flashdata('message', 'Data media berhasil disimpan!');	
			redirect('siswa/profil');
		}
	}
	function login()
	{
		if($this->input->post('username')){			
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');		
			if($this->form_validation->run() == FALSE)
			{		
				//$this->load->view($this->template);
				redirect('siswa', 'refresh');
			}
			else
			{
				redirect('/', 'refresh');
			}
		}else
		$this->load->view('depan');
	}
	function check_database($password)
	{
		$username = $this->input->post('username');			
		$result = $this->report_model->login("peserta_didik",array('nisn'=>$username, 'password'=>$password));		
		if($result)
		{
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
				'id_peserta' => $row->id_peserta,
				'nama' => $row->nama_panggil,
				'nisn' => $row->nisn,
				'nama_lengkap' => $row->nama_lengkap
				);
				$this->session->set_userdata('siswa_logged_in', $sess_array);
			}
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}
	}
        
    function logout()
	{
	   $this->session->unset_userdata('siswa_logged_in');
		session_destroy();
		 redirect('/', 'refresh');
	}
}
