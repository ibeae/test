<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	var $template='default';	
	var $data = array();
	function __construct()
	{
		parent::__construct();	
		$this->load->model('report_model');	
		//$this->load->helper('form');
       // $this->load->library(array('form_validation','pagination'));
		if (!$this->session->userdata('logged_in'))
		{ 
			// Allow some methods?
			$allowed = array('login');
			if (!in_array($this->router->fetch_method(), $allowed))
			{
				$this->load->view('masuk');
				//$this->load->view('depan');
			}
		}		
	}		
	
	public function index()
	{		
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$this->data['nama'] = $session_data['nama'];
			$this->data['page']	= "view_home";	
			//$this->load->view('home_view', $this->data);
			$this->load->view($this->template,$this->data);
		}
	}
	
	function create_paging($url, $tabel, $ordercol, $orderby="DESC", $select='*', $where=null, $join=null )
	{			
		$hal = number_format($this->uri->segment(3));		
        $per_page = 10;        
        $pcfg = array(
            'base_url' => base_URL().'report/'.$url.'/',
            'per_page' => $per_page,
            'total_rows' => $this->report_model->get_count_record($tabel,$where),
            'attributes' => array('class' => 'btn btn-default'),
            'full_tag_open' => '<div class="btn-group">',
            'full_tag_close' => '</div>',
            'cur_tag_open' => '<button type="button" class="btn btn-danger paging">',
            'cur_tag_close' => '</button>',
            'first_link' => 'Awal',
            'last_link' => 'Akhir',
			);	
					
			$this->pagination->initialize($pcfg);			
			$this->data['page_links'] = $this->pagination->create_links();			
			$this->data['no'] = $hal;		
			
			$this->data[$url] = $this->report_model->data_by_id($tabel, $per_page, $hal, $ordercol, $orderby, $select, $where, $join);
            $this->data['jmldata'] = $pcfg['total_rows'];
			return $this->data;
	}
	
	public function guru()
	{		
		if($this->session->userdata('logged_in'))
		{
			$arragama = array('IS'=>'Islam','KP'=>'Kristen Protestan','KT'=>'Katolik','HD'=>'Hindu','BD'=>'Budha','KH'=>'Konghucu','L'=>'Lainnya');
			$arrgol = array('I/a','I/b','I/c','I/d','II/a','II/b','II/c','II/d','III/a','III/b','III/c','III/d','IV/a','IV/b','IV/c','IV/d','IV/e');
			$mode = $this->uri->segment(3);
			switch($mode){
				case 'tambah':			
					$this->data['agama'] = $arragama;
					$this->data['golongan'] = $arrgol;
					$this->data['tamatan'] = $this->report_model->get_data('pendidikan',null);
					$this->data['nip'] = $this->report_model->get_last_nip();
					$this->data['page'] = 'view_guru_add';
					
				break;
				case 'hapus':
					$id = $this->security->xss_clean($this->uri->segment(4));
					$this->report_model->hapus('guru',array('nip' => $id));
					$this->session->set_flashdata('message', 'Data berhasil dihapus!');
					redirect('report/guru');
				break;
				case 'edit':
					$id = $this->security->xss_clean($this->uri->segment(4));
					$this->data['agama'] = $arragama;
					$this->data['golongan'] = $arrgol;
					$this->data['tamatan'] = $this->report_model->get_data('pendidikan',null);
					$this->data['data'] = $this->report_model->get_data_single("guru",array('nip' => $id));
					$this->data['page'] = "view_guru_add";
					break;
				case 'simpan':					
					$input = array(
					'nama_guru'  => $this->input->post('nama'),
					'nik'  => $this->input->post('nik'),
					'agama'  => $this->input->post('agama'),
					'pendidikan'  => $this->input->post('pendidikan'),
					'tahun_lulus'  => $this->input->post('tahun_lulus'),
					'hp'   => $this->input->post('hp'),
					'npwp'   => $this->input->post('npwp'),
					'status_guru'   => $this->input->post('status_guru'),
					'golongan'   => $this->input->post('golongan'),
					'bidang'   => $this->input->post('bidang'),
					'alamat'   	=> $this->input->post('alamat'),
					'jabatan'   => $this->input->post('jabatan'),
					'jenis_kelamin'	 => $this->input->post('kelamin'),
					'tempat_lahir'   => $this->input->post('tempat_lahir'),
					'tgl_lahir'   => $this->input->post('tgl_lahir'),					
					'telp'   => $this->input->post('telp'),
					'tgl_mulai_ajar'   => $this->input->post('mulai'),
					'nip'  => $this->input->post('nip'),
					);				
					$pass = $this->input->post('password');	
					$kode= $this->input->post('kode');					
					if($kode){
						if($pass)
							$input['password'] = $pass;
						$this->report_model->edit('nip',$kode,'guru',$input);
					}else{	
						$input['password'] = $pass;				
						$this->report_model->insert('guru',$input);
					}
					
					$this->session->set_flashdata('message', 'Data media berhasil disimpan!');
					//$this->data['page']	= "view_guru";
					redirect('report/guru/');
				break;
				default :									
				$this->data = $this->create_paging('guru','guru','nama_guru');
				$this->data['page']	= "view_guru";
			}
			//$this->data['page']	= "view_guru";	
			//$this->data = $this->create_paging('guru','guru',1,'nama_guru');	
			$this->load->view($this->template, $this->data);
		}
	} 
	
	public function mapel()
	{	
		if($this->session->userdata('logged_in'))
		{	
			$mode = $this->uri->segment(3);
			switch($mode){				
				case 'hapus_kat':	
					$id = $this->security->xss_clean($this->uri->segment(4));
					$this->report_model->hapus('kategori_mapel',array('id' => $id));
					$this->session->set_flashdata('message', 'Data berhasil dihapus!');
					redirect('report/mapel');
				break;
				case 'hapus':	
					$id = $this->security->xss_clean($this->uri->segment(4));
					$this->report_model->hapus('mapel',array('id_mapel' => $id));
					$this->session->set_flashdata('message', 'Data berhasil dihapus!');
					redirect('report/mapel');
				break;
				case 'simpan_kat':
					$input = array(
					'keterangan'  => $this->input->post('keterangan')
					);				
					$kode= $this->input->post('kode');					
					if($kode){
						$this->report_model->edit('id',$kode,'kategori_mapel',$input);
						}else{					
						$this->report_model->insert('kategori_mapel',$input);
					}
					$this->session->set_flashdata('message', 'Data media berhasil disimpan!');					
					redirect('report/mapel');
				break;
				case 'simpan':
					$input = array(
					'nama_mapel'  => $this->input->post('mapel'),
					'kategori'  => $this->input->post('kategori')
					);				
					$kode= $this->input->post('kode_mapel');					
					if($kode){
						$this->report_model->edit('id_mapel',$kode,'mapel',$input);
						}else{					
						$this->report_model->insert('mapel',$input);
					}					
					$this->session->set_flashdata('message', 'Data media berhasil disimpan!');					
					redirect('report/mapel');
				break;
				default :
						
						$sel = array('mapel.*', 'kategori_mapel.keterangan');
						$join = array(
								array('table'=>'kategori_mapel','tableJoin'=>'mapel.kategori=kategori_mapel.id','joinType'=>'left')
						);						
						$this->data= array();
						$this->data['page']	= "view_mapel";	
						$this->create_paging('mapel','mapel','nama_mapel','DESC',$sel, null, $join);
						$this->data['kategori'] = $this->report_model->get_data('kategori_mapel',null);
						//$this->create_paging('kategori_mapel','kategori_mapel','keterangan');
						
			}			
			$this->load->view($this->template, $this->data);
		}
	}
	
	public function peserta_didik()
	{		
		if($this->session->userdata('logged_in'))
		{
			$arragama = array('IS'=>'Islam','KP'=>'Kristen Protestan','KT'=>'Katolik','HD'=>'Hindu','BD'=>'Budha','KH'=>'Konghucu','L'=>'Lainnya');
			$mode = $this->uri->segment(3);
			switch($mode){
				case 'tambah':
					$this->data['agama'] = $arragama;
					$this->data['page'] = 'view_peserta_add';
				break;
				case 'hapus':
					$id = $this->security->xss_clean($this->uri->segment(4));
					$this->report_model->hapus('peserta_didik',array('id_peserta' => $id));
					$this->session->set_flashdata('message', 'Data berhasil dihapus!');
					redirect('report/peserta_didik');
				break;
				case 'edit':
					//$this->data= array();
					$id = $this->security->xss_clean($this->uri->segment(4));
					$this->data['agama'] = $arragama;
					$this->data['data'] = $this->report_model->get_data_single("peserta_didik",array('id_peserta' => $id));
					$this->data['page'] = "view_peserta_add";
				break;
				case 'simpan':
					$input = array(
						'nisn'  => $this->input->post('nisn'),
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
						'telp_ortu'   => $this->input->post('telp_ortu')
					);	
					$pass = $this->input->post('password');			
					$kode= $this->input->post('kode');					
					if($kode){						
						if($pass)
							$input['password'] = $pass;
						$this->report_model->edit('id_peserta',$kode,'peserta_didik',$input);
					}else{	
						$input['password'] = $pass;				
						$this->report_model->insert('peserta_didik',$input);
					}
					
					$this->session->set_flashdata('message', 'Data media berhasil disimpan!');
					//$this->data['page']	= "view_guru";
					redirect('report/peserta_didik');
				break;
				default :					
					$this->data['page']	= "view_peserta";	
					$this->create_paging('peserta_didik','peserta_didik',1,'nama_lengkap');										
			}			
			$this->load->view($this->template, $this->data);
		}
	} 	
	
	public function kelas()
	{		
		if($this->session->userdata('logged_in'))
		{
			$mode = $this->uri->segment(3);
			switch($mode){				
				case 'hapus':
					$id = $this->security->xss_clean($this->uri->segment(4));
					$this->report_model->hapus('kelas',array('id_kelas' => $id));
					$this->session->set_flashdata('message', 'Data berhasil dihapus!');
					redirect('report/kelas');
				break;
				case 'simpan':
					$input = array(
					'nama_kelas'  => $this->input->post('nama_kelas')
					);				
					$kode= $this->input->post('kode');					
					if($kode){
						$this->report_model->edit('id_kelas',$kode,'kelas',$input);
						}else{					
						$this->report_model->insert('kelas',$input);
					}
					
					$this->session->set_flashdata('message', 'Data media berhasil disimpan!');					
					redirect('report/kelas');
				break;
				default :					
				$this->data = $this->create_paging('kelas','kelas',1,'nama_kelas');	
				$this->data['page']	= "view_kelas";	
			}			
			$this->load->view($this->template, $this->data);
		}
	} 
	public function guru_mengajar()
	{		
		if($this->session->userdata('logged_in'))
		{
			$semester = array('Gasal', 'Genap');
			$mode = $this->uri->segment(3);
			switch($mode){				
				case 'hapus':
					$id = $this->security->xss_clean($this->uri->segment(4));
					$this->report_model->hapus('guru_pelajaran',array('id_mengajar' => $id));
					$this->session->set_flashdata('message', 'Data berhasil dihapus!');
					redirect('report/guru_mengajar');
				break;
				case 'simpan':
					$input = array(
					'id_mapel'  => $this->input->post('mapel'),
					'id_guru'  => $this->input->post('guru'),
					'id_kelas'  => $this->input->post('kelas'),
					'semester'  => $this->input->post('semester'),
					'tahun_ajaran'  => $this->input->post('tahun_ajaran')
					);				
					$kode= $this->input->post('kode');					
					if($kode){
						$this->report_model->edit('id_mengajar',$kode,'guru_pelajaran',$input);
						}else{					
						$this->report_model->insert('guru_pelajaran',$input);
					}
					
					$this->session->set_flashdata('message', 'Data Guru Mengajar berhasil disimpan!');					
					redirect('report/guru_mengajar');
				break;
				default :					
					//$sel = array('guru_pelajaran.id_mengajar,guru_pelajaran.tahun,kategori_mapel.keterangan');
					$join = array(
								array('table'=>'guru','tableJoin'=>'guru_pelajaran.id_guru=guru.nip','joinType'=>'left'),
								array('table'=>'mapel','tableJoin'=>'guru_pelajaran.id_mapel=mapel.id_mapel','joinType'=>'left'),
								array('table'=>'kelas','tableJoin'=>'guru_pelajaran.id_kelas=kelas.id_kelas','joinType'=>'left')
					);
					
					$this->create_paging('guru_pelajaran','guru_pelajaran','id_mengajar','DESC','*', null, $join);
					
					$this->data['mapel'] = $this->report_model->get_data('mapel',null);
					$this->data['kelas'] = $this->report_model->get_data('kelas',null);
					$this->data['guru'] = $this->report_model->get_data('guru',null);
					$this->data['semester'] = $semester;
					//print_r($tes);
					$this->data['page']	= "view_guru_mengajar";	
					
			}			
			$this->load->view($this->template, $this->data);
		}
	} 

	public function wali_kelas()
	{		
		if($this->session->userdata('logged_in'))
		{
			$mode = $this->uri->segment(3);
			switch($mode){				
				case 'hapus':
					$id = $this->security->xss_clean($this->uri->segment(4));
					$this->report_model->hapus('wali_kelas',array('id_wali_kelas' => $id));
					$this->session->set_flashdata('message', 'Data berhasil dihapus!');
					redirect('report/wali_kelas');
				break;
				case 'simpan':
					$input = array(
					'nip'  => $this->input->post('guru'),
					'id_kelas'  => $this->input->post('kelas'),
					'tahun_ajaran'  => $this->input->post('tahun_ajaran')
					);				
					$kode= $this->input->post('kode');					
					if($kode){
						$this->report_model->edit('id_wali_kelas',$kode,'wali_kelas',$input);
						}else{					
						$this->report_model->insert('wali_kelas',$input);
					}
					
					$this->session->set_flashdata('message', 'Data Wali kelas berhasil disimpan!');					
					redirect('report/wali_kelas');
				break;
				default :
					$sel = array('wali_kelas.*','g.nama_guru','k.nama_kelas');
					$join = array(
								array('table'=>'guru g','tableJoin'=>'wali_kelas.nip=g.nip','joinType'=>'left'),
								array('table'=>'kelas k','tableJoin'=>'wali_kelas.id_kelas=k.id_kelas','joinType'=>'left')
					);											
					$this->create_paging('wali_kelas','wali_kelas','id_wali_kelas','DESC',$sel, null, $join);

					$this->data['kelas'] = $this->report_model->get_data('kelas',null);
					$this->data['guru'] = $this->report_model->get_data('guru',null);					
					$this->data['page']	= "view_wali_kelas";	
					
			}			
			$this->load->view($this->template, $this->data);
		}
	} 
	public function kelas_siswa()
	{		
		if($this->session->userdata('logged_in'))
		{			
			$mode = $this->uri->segment(3);
			switch($mode){				
				case 'hapus':
					$id = $this->security->xss_clean($this->uri->segment(4));
					$this->report_model->hapus('kelas_siswa',array('id_kelas_siswa' => $id));
					$this->session->set_flashdata('message', 'Data berhasil dihapus!');
					redirect('report/kelas_siswa');
				break;
				case 'simpan':
					$input = array(
					'id_kelas'  => $this->input->post('kelas'),
					'id_siswa'  => $this->input->post('siswa'),
					'tahun_ajaran'  => $this->input->post('tahun_ajaran')
					);				
					$kode= $this->input->post('kode');					
					if($kode){
						$this->report_model->edit('id_kelas_siswa',$kode,'kelas_siswa',$input);
						}else{					
						$this->report_model->insert('kelas_siswa',$input);
					}
					
					$this->session->set_flashdata('message', 'Data kelas siswa berhasil disimpan!');					
					redirect('report/kelas_siswa');
				break;
				default :					
					$sel = array('kelas_siswa.*','peserta_didik.nama_lengkap','kelas.nama_kelas');
					$join = array(
								array('table'=>'peserta_didik','tableJoin'=>'kelas_siswa.id_siswa=peserta_didik.id_peserta','joinType'=>'left'),
								array('table'=>'kelas','tableJoin'=>'kelas_siswa.id_kelas=kelas.id_kelas','joinType'=>'left')
					);
					
					$this->create_paging('kelas_siswa','kelas_siswa','id_kelas_siswa','DESC',$sel, null, $join);
						
					$this->data['kelas'] = $this->report_model->get_data('kelas',null);
					$this->data['siswa'] = $this->report_model->get_data('peserta_didik',null);					
					$this->data['page']	= "view_kelas_siswa";	
					
			}			
			$this->load->view($this->template, $this->data);
		}
	} 
	public function nilai()
	{		
		if($this->session->userdata('logged_in'))
		{
			$semester = array('Gasal', 'Genap');
			$mode = $this->uri->segment(3);
			switch($mode){				
				case 'hapus':
					$id = $this->security->xss_clean($this->uri->segment(4));
					$this->report_model->hapus('nilai',array('id_nilai' => $id));
					$this->session->set_flashdata('message', 'Data berhasil dihapus!');
					redirect('report/nilai');
				break;
				case 'simpan':
					$input = array(
					'id_siswa'  => $this->input->post('siswa'),
					'id_mapel'  => $this->input->post('mapel'),
					'tahun_ajaran'  => $this->input->post('tahun_ajaran'),
					'semester'  => $this->input->post('semester'),
					'keterangan'  => $this->input->post('keterangan'),
					'nilai_uharian1'  => $this->input->post('nilai_uharian1'),
					'nilai_uharian2'  => $this->input->post('nilai_uharian2'),
					'nilai_uharian3'  => $this->input->post('nilai_uharian3'),
					'nilai_tugas1'  => $this->input->post('nilai_tugas1'),
					'nilai_tugas2'  => $this->input->post('nilai_tugas2'),
					'nilai_tugas3'  => $this->input->post('nilai_tugas3'),
					'nilai_uts'  => $this->input->post('nilai_uts'),
					'nilai_uas'  => $this->input->post('nilai_uas')					
					);				
					$kode= $this->input->post('kode');					
					if($kode){
						$this->report_model->edit('id_nilai',$kode,'nilai',$input);
						}else{					
						$this->report_model->insert('nilai',$input);
					}
					
					$this->session->set_flashdata('message', 'Data Guru kelas berhasil disimpan!');					
					redirect('report/nilai');
				break;
				default :					
					$sel = array('nilai.*','peserta_didik.nama_lengkap','mapel.nama_mapel');
					$join = array(
								array('table'=>'peserta_didik','tableJoin'=>'nilai.id_siswa=peserta_didik.id_peserta','joinType'=>'left'),
								array('table'=>'mapel','tableJoin'=>'nilai.id_mapel=mapel.id_mapel','joinType'=>'left')
					);
					
					$this->create_paging('nilai','nilai','id_nilai','DESC',$sel, null, $join);
					$this->data['semester'] = $semester;
					$this->data['kelas'] = $this->report_model->get_data('kelas',null);
					$this->data['mapel'] = $this->report_model->get_data('mapel',null);				
					
					//print_r($tes);
					$this->data['page']	= "view_nilai";
			}			
			$this->load->view($this->template, $this->data);
		}
	} 
	function get_siswa($kelas){        
        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($this->report_model->get_data('peserta_didik',null)));
    }
	public function profil()
	{
		if($this->session->userdata('logged_in'))
		{   
			$session_data = $this->session->userdata('logged_in');
			$agenid = $session_data['agenid'];		
			$this->data['nama'] = $session_data['nama'];
			$this->load->view('profil_view', $this->data);
		}
	}  
	public function login()
	{
		if($this->input->post('username')){
			$this->load->library('form_validation');		
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');		
			if($this->form_validation->run() == FALSE)
			{		
				$this->load->view('masuk');
			}
			else
			{
				//$session_data = $this->session->userdata('logged_in');
				//$this->data['username'] = $session_data['username'];			
				//$this->load->view('home_view', $this->data);
				redirect('report', 'refresh');
			}
		}else
			$this->load->view('masuk');
	}
	function check_database($password)
	{
		$username = $this->input->post('username');			
		$result = $this->report_model->login("guru",array('nip'=>$username, 'password'=>$password));
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
		//$this->load->view('masuk');
		redirect('report', 'refresh');
	}
}
