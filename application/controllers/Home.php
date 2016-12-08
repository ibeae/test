<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	var $template='default';
	function __construct()
	{
		parent::__construct();	
		$this->load->model('report_model');	
		$this->load->helper('form');
        $this->load->library(array('form_validation','pagination'));
		if (!$this->session->userdata('logged_in'))
		{ 			
			$allowed = array('admin');
			if (!in_array($this->router->fetch_method(), $allowed))
			{				
				$this->load->view('depan');
			}
		}	
	}
	public function index()
	{		
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$this->load->view('home_view', $data);
		}else
		{
			$this->load->view('depan');
		}
	}	
        
	public function login()
	{
		if($this->input->post('username')){			
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');		
			if($this->form_validation->run() == FALSE)
			{		
				$this->load->view('depan');
			}
			else
			{
				//$session_data = $this->session->userdata('logged_in');
				//$data['username'] = $session_data['username'];			
				//$this->load->view('home_view', $data);
				redirect('report', 'refresh');
			}
		}else
		$this->load->view('depan');
	}
	function check_database($password)
	{
		$username = $this->input->post('username');			
		$result = $this->report_model->login($username, $password);		
		if($result)
		{
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
				'nip' => $row->nip,
				'nama' => $row->nama_guru
				);
				$this->session->set_userdata('logged_in', $sess_array);
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
	   $this->session->unset_userdata('logged_in');
		session_destroy();
		 redirect('masuk', 'refresh');
	}
}
