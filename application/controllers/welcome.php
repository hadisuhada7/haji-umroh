<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('pagination');
        $this->load->database();
		$this->load->model('usermodel');
	}

	// Index

	public function index() {
		if ($this->auth->is_logged_in() == false) {
			$this->login();
		} else {
			$this ->load->model('usermodel');
			$level = $this->session->userdata('level');
			$data['menu'] = $this->usermodel->get_menu_for_level($level);
			$this->template->set('title', 'Welcome | Sistem Informasi Pelayanan Haji & Umroh');
			$this->template->load('template_admin', 'admin/beranda', $data);
		}
	}

	// Beranda

	function beranda() {
		// Mencegah user yang belum login untuk mengakses halaman ini
		$this->auth->restrict();
		// Mencegah user mengakses menu yang tidak boleh ia buka
		$this->auth->cek_menu(1);
		// Tampilkan isi beranda
		$this->template->set('title', 'Beranda | Sistem Informasi Pelayanan Haji & Umroh');
		$this->template->load('template_admin', 'admin/beranda');
	}

	// Menu Pendaftaran

	function menu_pendaftaran() {
		// Mencegah user yang belum login untuk mengakses halaman ini
		$this->auth->restrict();
		// Mencegah user mengakses menu yang tidak boleh ia buka
		$this->auth->cek_menu(1);
		// Tampilkan isi pendaftaran
		$this->template->set('title', 'Pendaftaran | Sistem Informasi Pelayanan Haji & Umroh');
		$this->template->load('template_admin', 'admin/pendaftaran');
	}

	// Pendaftaran Haji

	function pendaftaran_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/pendaftaran_haji";
        $config['total_rows']= $this->db->query("SELECT * FROM pendaftaran_haji;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_pendaftaran_haji']=$this->usermodel->get_pendaftaran_haji($config);
        $data['jumlah_pendaftaran_haji'] = $this->usermodel->jumlah_pendaftaran_haji();
	   	$this->template->set('title','Pendaftaran Haji | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_pendaftaran_haji.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_pendaftaran_haji',$data);
	}

	function search_pendaftaran_haji() {
  		$keyword = $this->input->get('search_pendaftaran_haji', TRUE); // Mengambil nilai dari form input cari
  		$data['pendaftaran_haji'] = $this->usermodel->search_pendaftaran_haji($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Pendaftaran Haji | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_pendaftaran_haji',$data); // Menampilkan data yang sudah dicari
	}

	function insert_pendaftaran_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_pendaftaran_haji'] = $this->usermodel->kode_pendaftaran_haji();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_pendaftaran_haji', 'Id_Pendaftaran_Haji', 'trim|required');
	   	$this->form_validation->set_rules('tgl_daftar', 'Tgl_Daftar', 'trim|required');
	   	$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
	   	$this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'trim|required');
	   	$this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	   	$this->form_validation->set_rules('kel_desa', 'Kel_Desa', 'trim|required');
	   	$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
	   	$this->form_validation->set_rules('kab_kota', 'Kab_Kota', 'trim|required');
	   	$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('no_handphone', 'No_Handphone', 'trim|required');
	   	$this->form_validation->set_rules('email', 'Email', 'trim|required');
	   	$this->form_validation->set_rules('paket_haji', 'Paket_Haji', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$this->template->set('title','Input Pendaftaran Haji | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_pendaftaran_haji',$data);
	   	} else {
	      	$data_pendaftaran_haji = array(
	      		'id_pendaftaran_haji' 	=>$this->input->post('id_pendaftaran_haji'),
	      		'tgl_daftar' 			=>$this->input->post('tgl_daftar'),
	         	'nik' 					=>$this->input->post('nik'),
	         	'nama_lengkap' 			=>$this->input->post('nama_lengkap'),
	         	'tempat_lahir' 			=>$this->input->post('tempat_lahir'),
	         	'tgl_lahir' 			=>$this->input->post('tgl_lahir'),
	         	'jenis_kelamin' 		=>$this->input->post('jenis_kelamin'),
	         	'alamat' 				=>$this->input->post('alamat'),
	         	'kel_desa' 				=>$this->input->post('kel_desa'),
	         	'kecamatan' 			=>$this->input->post('kecamatan'),
	         	'kab_kota' 				=>$this->input->post('kab_kota'),
	         	'provinsi' 				=>$this->input->post('provinsi'),
	         	'no_telepon' 			=>$this->input->post('no_telepon'),
	         	'no_handphone' 			=>$this->input->post('no_handphone'),
	         	'email' 				=>$this->input->post('email'),
	         	'paket_haji' 			=>$this->input->post('paket_haji'),
	         	'keterangan' 			=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_pendaftaran_haji($data_pendaftaran_haji);
	      	// Kembalikan ke halaman pendaftaran_haji
	      	redirect('welcome/pendaftaran_haji');    
	   	}
	}

	function detail_pendaftaran_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data pendaftaran_haji yg akan diedit dari database
	    $data['pendaftaran_haji'] = $this->usermodel->get_pendaftaran_haji_by_id($id);
	    $this->template->set('title','Detail Pendaftaran Haji | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_pendaftaran_haji',$data);
	}

	function edit_pendaftaran_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('id_pendaftaran_haji', 'Id_Pendaftaran_Haji', 'trim|required');
	   	$this->form_validation->set_rules('tgl_daftar', 'Tgl_Daftar', 'trim|required');
	   	$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
	   	$this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'trim|required');
	   	$this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	   	$this->form_validation->set_rules('kel_desa', 'Kel_Desa', 'trim|required');
	   	$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
	   	$this->form_validation->set_rules('kab_kota', 'Kab_Kota', 'trim|required');
	   	$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('no_handphone', 'No_Handphone', 'trim|required');
	   	$this->form_validation->set_rules('email', 'Email', 'trim|required');
	   	$this->form_validation->set_rules('paket_haji', 'Paket_Haji', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	// Dapatkan data pendaftaran haji yg akan diedit dari database
	      	$data['pendaftaran_haji'] = $this->usermodel->get_pendaftaran_haji_by_id($id);
	      	$this->template->set('title','Edit Pendaftaran Haji | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_pendaftaran_haji',$data);
	   	} else {
	      	$data_pendaftaran_haji = array(
	      		'id_pendaftaran_haji' 	=>$this->input->post('id_pendaftaran_haji'),
	      		'tgl_daftar' 			=>$this->input->post('tgl_daftar'),
	         	'nik' 					=>$this->input->post('nik'),
	         	'nama_lengkap' 			=>$this->input->post('nama_lengkap'),
	         	'tempat_lahir' 			=>$this->input->post('tempat_lahir'),
	         	'tgl_lahir' 			=>$this->input->post('tgl_lahir'),
	         	'jenis_kelamin' 		=>$this->input->post('jenis_kelamin'),
	         	'alamat' 				=>$this->input->post('alamat'),
	         	'kel_desa' 				=>$this->input->post('kel_desa'),
	         	'kecamatan' 			=>$this->input->post('kecamatan'),
	         	'kab_kota' 				=>$this->input->post('kab_kota'),
	         	'provinsi' 				=>$this->input->post('provinsi'),
	         	'no_telepon' 			=>$this->input->post('no_telepon'),
	         	'no_handphone' 			=>$this->input->post('no_handphone'),
	         	'email' 				=>$this->input->post('email'),
	         	'paket_haji' 			=>$this->input->post('paket_haji'),
	         	'keterangan' 			=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_pendaftaran_haji($data_pendaftaran_haji,$id);
	      	// Kembalikan ke halaman pendaftaran haji
	      	redirect('welcome/pendaftaran_haji');
	   	}
	}

	function delete_pendaftaran_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id pendaftaran haji dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_pendaftaran_haji($id);
	   	// Kembalikan ke halaman pendaftaran haji
	   	redirect('welcome/pendaftaran_haji'); 
	}

	// Pendaftaran Umroh

	function pendaftaran_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/pendaftaran_umroh";
        $config['total_rows']= $this->db->query("SELECT * FROM pendaftaran_umroh;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_pendaftaran_umroh']=$this->usermodel->get_pendaftaran_umroh($config);
        $data['jumlah_pendaftaran_umroh'] = $this->usermodel->jumlah_pendaftaran_umroh();
	   	$this->template->set('title','Pendaftaran Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_pendaftaran_umroh.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_pendaftaran_umroh',$data);
	}

	function search_pendaftaran_umroh() {
  		$keyword = $this->input->get('search_pendaftaran_umroh', TRUE); // Mengambil nilai dari form input cari
  		$data['pendaftaran_umroh'] = $this->usermodel->search_pendaftaran_umroh($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Pendaftaran Umroh | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_pendaftaran_umroh',$data); // Menampilkan data yang sudah dicari
	}

	function insert_pendaftaran_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_pendaftaran_umroh'] = $this->usermodel->kode_pendaftaran_umroh();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_pendaftaran_umroh', 'Id_Pendaftaran_Umroh', 'trim|required');
	   	$this->form_validation->set_rules('tgl_daftar', 'Tgl_Daftar', 'trim|required');
	   	$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
	   	$this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'trim|required');
	   	$this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	   	$this->form_validation->set_rules('kel_desa', 'Kel_Desa', 'trim|required');
	   	$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
	   	$this->form_validation->set_rules('kab_kota', 'Kab_Kota', 'trim|required');
	   	$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('no_handphone', 'No_Handphone', 'trim|required');
	   	$this->form_validation->set_rules('email', 'Email', 'trim|required');
	   	$this->form_validation->set_rules('paket_umroh', 'Paket_Umroh', 'trim|required');
	   	$this->form_validation->set_rules('tgl_keberangkatan', 'Tgl_Keberangkatan', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$this->template->set('title','Input Pendaftaran Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_pendaftaran_umroh',$data);
	   	} else {
	      	$data_pendaftaran_umroh = array(
	      		'id_pendaftaran_umroh' 	=>$this->input->post('id_pendaftaran_umroh'),
	      		'tgl_daftar' 			=>$this->input->post('tgl_daftar'),
	         	'nik' 					=>$this->input->post('nik'),
	         	'nama_lengkap' 			=>$this->input->post('nama_lengkap'),
	         	'tempat_lahir' 			=>$this->input->post('tempat_lahir'),
	         	'tgl_lahir' 			=>$this->input->post('tgl_lahir'),
	         	'jenis_kelamin' 		=>$this->input->post('jenis_kelamin'),
	         	'alamat' 				=>$this->input->post('alamat'),
	         	'kel_desa' 				=>$this->input->post('kel_desa'),
	         	'kecamatan' 			=>$this->input->post('kecamatan'),
	         	'kab_kota' 				=>$this->input->post('kab_kota'),
	         	'provinsi' 				=>$this->input->post('provinsi'),
	         	'no_telepon' 			=>$this->input->post('no_telepon'),
	         	'no_handphone' 			=>$this->input->post('no_handphone'),
	         	'email' 				=>$this->input->post('email'),
	         	'paket_umroh' 			=>$this->input->post('paket_umroh'),
	         	'tgl_keberangkatan' 	=>$this->input->post('tgl_keberangkatan'),
	         	'keterangan' 			=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_pendaftaran_umroh($data_pendaftaran_umroh);
	      	// Kembalikan ke halaman pendaftaran_umroh
	      	redirect('welcome/pendaftaran_umroh');    
	   	}
	}

	function detail_pendaftaran_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data pendaftaran_umroh yg akan diedit dari database
	    $data['pendaftaran_umroh'] = $this->usermodel->get_pendaftaran_umroh_by_id($id);
	    $this->template->set('title','Detail Pendaftaran Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_pendaftaran_umroh',$data);
	}

	function edit_pendaftaran_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('id_pendaftaran_umroh', 'Id_Pendaftaran_Umroh', 'trim|required');
	   	$this->form_validation->set_rules('tgl_daftar', 'Tgl_Daftar', 'trim|required');
	   	$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
	   	$this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'trim|required');
	   	$this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	   	$this->form_validation->set_rules('kel_desa', 'Kel_Desa', 'trim|required');
	   	$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
	   	$this->form_validation->set_rules('kab_kota', 'Kab_Kota', 'trim|required');
	   	$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('no_handphone', 'No_Handphone', 'trim|required');
	   	$this->form_validation->set_rules('email', 'Email', 'trim|required');
	   	$this->form_validation->set_rules('paket_umroh', 'Paket_Umroh', 'trim|required');
	   	$this->form_validation->set_rules('tgl_keberangkatan', 'Tgl_Keberangkatan', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	// Dapatkan data pendaftaran umroh yg akan diedit dari database
	      	$data['pendaftaran_umroh'] = $this->usermodel->get_pendaftaran_umroh_by_id($id);
	      	$this->template->set('title','Edit Pendaftaran Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_pendaftaran_umroh',$data);
	   	} else {
	      	$data_pendaftaran_umroh = array(
	      		'id_pendaftaran_umroh' 	=>$this->input->post('id_pendaftaran_umroh'),
	      		'tgl_daftar' 			=>$this->input->post('tgl_daftar'),
	         	'nik' 					=>$this->input->post('nik'),
	         	'nama_lengkap' 			=>$this->input->post('nama_lengkap'),
	         	'tempat_lahir' 			=>$this->input->post('tempat_lahir'),
	         	'tgl_lahir' 			=>$this->input->post('tgl_lahir'),
	         	'jenis_kelamin' 		=>$this->input->post('jenis_kelamin'),
	         	'alamat' 				=>$this->input->post('alamat'),
	         	'kel_desa' 				=>$this->input->post('kel_desa'),
	         	'kecamatan' 			=>$this->input->post('kecamatan'),
	         	'kab_kota' 				=>$this->input->post('kab_kota'),
	         	'provinsi' 				=>$this->input->post('provinsi'),
	         	'no_telepon' 			=>$this->input->post('no_telepon'),
	         	'no_handphone' 			=>$this->input->post('no_handphone'),
	         	'email' 				=>$this->input->post('email'),
	         	'paket_umroh' 			=>$this->input->post('paket_umroh'),
	         	'tgl_keberangkatan' 	=>$this->input->post('tgl_keberangkatan'),
	         	'keterangan' 			=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_pendaftaran_umroh($data_pendaftaran_umroh,$id);
	      	// Kembalikan ke halaman pendaftaran umroh
	      	redirect('welcome/pendaftaran_umroh');
	   	}
	}

	function delete_pendaftaran_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id pendaftaran umroh dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_pendaftaran_umroh($id);
	   	// Kembalikan ke halaman pendaftaran umroh
	   	redirect('welcome/pendaftaran_umroh'); 
	}

	// Pendaftaran Bimbingan Manasik

	function pendaftaran_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/pendaftaran_bimsik";
        $config['total_rows']= $this->db->query("SELECT * FROM pendaftaran_bimsik;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_pendaftaran_bimsik']=$this->usermodel->get_pendaftaran_bimsik($config);
        $data['jumlah_pendaftaran_bimsik'] = $this->usermodel->jumlah_pendaftaran_bimsik();
	   	$this->template->set('title','Pendaftaran Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_pendaftaran_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_pendaftaran_bimsik',$data);
	}

	function search_pendaftaran_bimsik() {
  		$keyword = $this->input->get('search_pendaftaran_bimsik', TRUE); // Mengambil nilai dari form input cari
  		$data['pendaftaran_bimsik'] = $this->usermodel->search_pendaftaran_bimsik($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Pendaftaran Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_pendaftaran_bimsik',$data); // Menampilkan data yang sudah dicari
	}

	function insert_pendaftaran_bimsik() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_pendaftaran_bimsik'] = $this->usermodel->kode_pendaftaran_bimsik();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_pendaftaran_bimsik', 'Id_Pendaftaran_Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('tgl_daftar', 'Tgl_Daftar', 'trim|required');
	   	$this->form_validation->set_rules('no_porsi', 'No_Porsi', 'trim|required');
	   	$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
	   	$this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'trim|required');
	   	$this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	   	$this->form_validation->set_rules('kel_desa', 'Kel_Desa', 'trim|required');
	   	$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
	   	$this->form_validation->set_rules('kab_kota', 'Kab_Kota', 'trim|required');
	   	$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('no_handphone', 'No_Handphone', 'trim|required');
	   	$this->form_validation->set_rules('email', 'Email', 'trim|required');
	   	$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$this->template->set('title','Input Pendaftaran Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_pendaftaran_bimsik',$data);
	   	} else {
	      	$data_pendaftaran_bimsik = array(
	      		'id_pendaftaran_bimsik' =>$this->input->post('id_pendaftaran_bimsik'),
	      		'tgl_daftar' 			=>$this->input->post('tgl_daftar'),
	         	'no_porsi' 				=>$this->input->post('no_porsi'),
	         	'nik' 					=>$this->input->post('nik'),
	         	'nama_lengkap' 			=>$this->input->post('nama_lengkap'),
	         	'tempat_lahir' 			=>$this->input->post('tempat_lahir'),
	         	'tgl_lahir' 			=>$this->input->post('tgl_lahir'),
	         	'jenis_kelamin' 		=>$this->input->post('jenis_kelamin'),
	         	'alamat' 				=>$this->input->post('alamat'),
	         	'kel_desa' 				=>$this->input->post('kel_desa'),
	         	'kecamatan' 			=>$this->input->post('kecamatan'),
	         	'kab_kota' 				=>$this->input->post('kab_kota'),
	         	'provinsi' 				=>$this->input->post('provinsi'),
	         	'no_telepon' 			=>$this->input->post('no_telepon'),
	         	'no_handphone' 			=>$this->input->post('no_handphone'),
	         	'email' 				=>$this->input->post('email'),
	         	'tahun' 				=>$this->input->post('tahun'),
	         	'keterangan' 			=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_pendaftaran_bimsik($data_pendaftaran_bimsik);
	      	// Kembalikan ke halaman pendaftaran_bimsik
	      	redirect('welcome/pendaftaran_bimsik');    
	   	}
	}

	function detail_pendaftaran_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data pendaftaran_bimsik yg akan diedit dari database
	    $data['pendaftaran_bimsik'] = $this->usermodel->get_pendaftaran_bimsik_by_id($id);
	    $this->template->set('title','Detail Pendaftaran Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_pendaftaran_bimsik',$data);
	}

	function edit_pendaftaran_bimsik() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('id_pendaftaran_bimsik', 'Id_Pendaftaran_Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('tgl_daftar', 'Tgl_Daftar', 'trim|required');
	   	$this->form_validation->set_rules('no_porsi', 'No_Porsi', 'trim|required');
	   	$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
	   	$this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'trim|required');
	   	$this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	   	$this->form_validation->set_rules('kel_desa', 'Kel_Desa', 'trim|required');
	   	$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
	   	$this->form_validation->set_rules('kab_kota', 'Kab_Kota', 'trim|required');
	   	$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('no_handphone', 'No_Handphone', 'trim|required');
	   	$this->form_validation->set_rules('email', 'Email', 'trim|required');
	   	$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	// Dapatkan data pendaftaran bimsik yg akan diedit dari database
	      	$data['pendaftaran_bimsik'] = $this->usermodel->get_pendaftaran_bimsik_by_id($id);
	      	$this->template->set('title','Edit Pendaftaran Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_pendaftaran_bimsik',$data);
	   	} else {
	      	$data_pendaftaran_bimsik = array(
	      		'id_pendaftaran_bimsik' =>$this->input->post('id_pendaftaran_bimsik'),
	      		'tgl_daftar' 			=>$this->input->post('tgl_daftar'),
	         	'no_porsi' 				=>$this->input->post('no_porsi'),
	         	'nik' 					=>$this->input->post('nik'),
	         	'nama_lengkap' 			=>$this->input->post('nama_lengkap'),
	         	'tempat_lahir' 			=>$this->input->post('tempat_lahir'),
	         	'tgl_lahir' 			=>$this->input->post('tgl_lahir'),
	         	'jenis_kelamin' 		=>$this->input->post('jenis_kelamin'),
	         	'alamat' 				=>$this->input->post('alamat'),
	         	'kel_desa' 				=>$this->input->post('kel_desa'),
	         	'kecamatan' 			=>$this->input->post('kecamatan'),
	         	'kab_kota' 				=>$this->input->post('kab_kota'),
	         	'provinsi' 				=>$this->input->post('provinsi'),
	         	'no_telepon' 			=>$this->input->post('no_telepon'),
	         	'no_handphone' 			=>$this->input->post('no_handphone'),
	         	'email' 				=>$this->input->post('email'),
	         	'tahun' 				=>$this->input->post('tahun'),
	         	'keterangan' 			=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_pendaftaran_bimsik($data_pendaftaran_bimsik,$id);
	      	// Kembalikan ke halaman pendaftaran bimsik
	      	redirect('welcome/pendaftaran_bimsik');
	   	}
	}

	function delete_pendaftaran_bimsik() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id pendaftaran bimsik dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_pendaftaran_bimsik($id);
	   	// Kembalikan ke halaman pendaftaran bimsik
	   	redirect('welcome/pendaftaran_bimsik'); 
	}

	// Menu Haji Plus

	function menu_haji_plus() {
		// Mencegah user yang belum login untuk mengakses halaman ini
		$this->auth->restrict();
		// Mencegah user mengakses menu yang tidak boleh ia buka
		$this->auth->cek_menu(1);
		// Tampilkan isi haji plus
		$this->template->set('title', 'Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
		$this->template->load('template_admin', 'admin/haji_plus');
	}

	// Paket Haji Plus

	function paket_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/paket_haji_plus";
        $config['total_rows']= $this->db->query("SELECT * FROM paket_haji_plus;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_paket_haji_plus']=$this->usermodel->get_paket_haji_plus($config);
        $data['jumlah_paket_haji_plus'] = $this->usermodel->jumlah_paket_haji_plus();
	   	$this->template->set('title','Paket Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_paket_haji.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_paket_haji',$data);
	}

	function search_paket_haji_plus() {
  		$keyword = $this->input->get('search_paket_haji_plus', TRUE); // Mengambil nilai dari form input cari
  		$data['paket_haji_plus'] = $this->usermodel->search_paket_haji_plus($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Paket Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_paket_haji',$data); // Menampilkan data yang sudah dicari
	}

	function insert_paket_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_paket_haji_plus'] = $this->usermodel->kode_paket_haji_plus();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_paket_haji_plus', 'Id_Paket_Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('nama_program', 'Nama_Program', 'trim|required');
	   	$this->form_validation->set_rules('durasi', 'Durasi', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('tgl_keberangkatan', 'Tgl_Keberangkatan', 'trim|required');
	   	$this->form_validation->set_rules('pesawat', 'Pesawat', 'trim|required');
	   	$this->form_validation->set_rules('hotel_makkah', 'Hotel_Makkah', 'trim|required');
	   	$this->form_validation->set_rules('hotel_madinah', 'Hotel_Madinah', 'trim|required');
	   	$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'trim|required');
	   	$this->form_validation->set_rules('seat', 'Seat', 'trim|required');
	   	$this->form_validation->set_rules('sisa_seat', 'Sisa_Seat', 'trim|required');
	   	$this->form_validation->set_rules('nama_travel', 'Nama_Travel', 'trim|required');
	   	$this->form_validation->set_rules('no_izin', 'No_Izin', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$this->template->set('title','Input Paket Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_paket_haji',$data);
	   	} else {
	      	$data_paket_haji_plus = array(
	      		'id_paket_haji_plus'	=>$this->input->post('id_paket_haji_plus'),
	         	'nama_program' 			=>$this->input->post('nama_program'),
	         	'durasi' 				=>$this->input->post('durasi'),
	         	'biaya' 				=>$this->input->post('biaya'),
	         	'tgl_keberangkatan' 	=>$this->input->post('tgl_keberangkatan'),
	         	'pesawat' 				=>$this->input->post('pesawat'),
	         	'hotel_makkah' 			=>$this->input->post('hotel_makkah'),
	         	'hotel_madinah' 		=>$this->input->post('hotel_madinah'),
	         	'fasilitas' 			=>$this->input->post('fasilitas'),
	         	'seat' 					=>$this->input->post('seat'),
	         	'sisa_seat' 			=>$this->input->post('sisa_seat'),
	         	'nama_travel' 			=>$this->input->post('nama_travel'),
	         	'no_izin' 				=>$this->input->post('no_izin')
	      	);
	      	$this->usermodel->insert_data_paket_haji_plus($data_paket_haji_plus);
	      	// Kembalikan ke halaman paket haji plus
	      	redirect('welcome/paket_haji_plus');    
	   	}
	}

	function detail_paket_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data paket haji plus yg akan diedit dari database
	    $data['paket_haji_plus'] = $this->usermodel->get_paket_haji_plus_by_id($id);
	    $this->template->set('title','Detail Paket Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_paket_haji',$data);
	}

	function edit_paket_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('id_paket_haji_plus', 'Id_Paket_Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('nama_program', 'Nama_Program', 'trim|required');
	   	$this->form_validation->set_rules('durasi', 'Durasi', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('tgl_keberangkatan', 'Tgl_Keberangkatan', 'trim|required');
	   	$this->form_validation->set_rules('pesawat', 'Pesawat', 'trim|required');
	   	$this->form_validation->set_rules('hotel_makkah', 'Hotel_Makkah', 'trim|required');
	   	$this->form_validation->set_rules('hotel_madinah', 'Hotel_Madinah', 'trim|required');
	   	$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'trim|required');
	   	$this->form_validation->set_rules('seat', 'Seat', 'trim|required');
	   	$this->form_validation->set_rules('sisa_seat', 'Sisa_Seat', 'trim|required');
	   	$this->form_validation->set_rules('nama_travel', 'Nama_Travel', 'trim|required');
	   	$this->form_validation->set_rules('no_izin', 'No_Izin', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	// Dapatkan data bimbingan manasik yg akan diedit dari database
	      	$data['paket_haji_plus'] = $this->usermodel->get_paket_haji_plus_by_id($id);
	      	$this->template->set('title','Edit Paket Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_paket_haji',$data);
	   	} else {
	      	$data_paket_haji_plus = array(
	      		'id_paket_haji_plus'	=>$this->input->post('id_paket_haji_plus'),
	         	'nama_program' 			=>$this->input->post('nama_program'),
	         	'durasi' 				=>$this->input->post('durasi'),
	         	'biaya' 				=>$this->input->post('biaya'),
	         	'tgl_keberangkatan' 	=>$this->input->post('tgl_keberangkatan'),
	         	'pesawat' 				=>$this->input->post('pesawat'),
	         	'hotel_makkah' 			=>$this->input->post('hotel_makkah'),
	         	'hotel_madinah' 		=>$this->input->post('hotel_madinah'),
	         	'fasilitas' 			=>$this->input->post('fasilitas'),
	         	'seat' 					=>$this->input->post('seat'),
	         	'sisa_seat' 			=>$this->input->post('sisa_seat'),
	         	'nama_travel' 			=>$this->input->post('nama_travel'),
	         	'no_izin' 				=>$this->input->post('no_izin')
	      	);
	      	$this->usermodel->update_data_paket_haji_plus($data_paket_haji_plus,$id);
	      	// Kembalikan ke halaman paket haji plus
	      	redirect('welcome/paket_haji_plus');
	   	}
	}

	function delete_paket_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id peserta dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_paket_haji_plus($id);
	   	// Kembalikan ke halaman paket haji plus
	   	redirect('welcome/paket_haji_plus'); 
	}

	// Haji Plus

	function haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/haji_plus";
        $config['total_rows']= $this->db->query("SELECT * FROM haji_plus;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_haji_plus']=$this->usermodel->get_haji_plus($config);
        $data['jumlah_haji_plus'] = $this->usermodel->jumlah_haji_plus();
	   	$this->template->set('title','Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_haji_plus',$data);
	}

	function search_haji_plus() {
  		$keyword = $this->input->get('search_haji_plus', TRUE); // Mengambil nilai dari form input cari
  		$data['haji_plus'] = $this->usermodel->search_haji_plus($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_haji_plus',$data); // Menampilkan data yang sudah dicari
	}

	function insert_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_haji_plus'] = $this->usermodel->kode_haji_plus();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_haji_plus', 'Id_Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('tgl_daftar', 'Tgl_Daftar', 'trim|required');
	   	$this->form_validation->set_rules('paket_haji_plus', 'Paket_Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
	   	$this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'trim|required');
	   	$this->form_validation->set_rules('bin_binti', 'Bin_Binti', 'trim|required');
	   	$this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('gol_darah', 'Gol_Darah', 'trim|required');
	   	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	   	$this->form_validation->set_rules('kode_pos', 'Kode_Pos', 'trim|required');
	   	$this->form_validation->set_rules('kel_desa', 'Kel_Desa', 'trim|required');
	   	$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
	   	$this->form_validation->set_rules('kab_kota', 'Kab_Kota', 'trim|required');
	   	$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
	   	$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
	   	$this->form_validation->set_rules('status_perkawinan', 'Status_Perkawinan', 'trim|required');
	   	$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');
	   	$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('email', 'Email', 'trim|required');
	   	$this->form_validation->set_rules('riwayat_penyakit', 'Riwayat_Penyakit', 'trim|required');
	   	$this->form_validation->set_rules('status_haji', 'Status_Haji', 'trim|required');
	   	$this->form_validation->set_rules('mahrom_muhrim', 'Mahrom_Muhrim', 'trim|required');
	   	$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
	   	$this->form_validation->set_rules('foto', 'Foto', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['paket_haji_plus'] = $this->usermodel->paket_haji_plus();
	      	$this->template->set('title','Input Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_haji_plus',$data);
	   	} else {
	      	$data_haji_plus = array(
	      		'id_haji_plus' 		=>$this->input->post('id_haji_plus'),
	      		'tgl_daftar' 		=>$this->input->post('tgl_daftar'),
	      		'id_paket_haji_plus'=>$this->input->post('paket_haji_plus'),
	         	'nik' 				=>$this->input->post('nik'),
	         	'nama_lengkap' 		=>$this->input->post('nama_lengkap'),
	         	'bin_binti' 		=>$this->input->post('bin_binti'),
	         	'tempat_lahir' 		=>$this->input->post('tempat_lahir'),
	         	'tgl_lahir' 		=>$this->input->post('tgl_lahir'),
	         	'jenis_kelamin' 	=>$this->input->post('jenis_kelamin'),
	         	'gol_darah' 		=>$this->input->post('gol_darah'),
	         	'alamat' 			=>$this->input->post('alamat'),
	         	'kode_pos' 			=>$this->input->post('kode_pos'),
	         	'kel_desa' 			=>$this->input->post('kel_desa'),
	         	'kecamatan' 		=>$this->input->post('kecamatan'),
	         	'kab_kota' 			=>$this->input->post('kab_kota'),
	         	'provinsi' 			=>$this->input->post('provinsi'),
	         	'agama' 			=>$this->input->post('agama'),
	         	'status_perkawinan' =>$this->input->post('status_perkawinan'),
	         	'pendidikan' 		=>$this->input->post('pendidikan'),
	         	'pekerjaan' 		=>$this->input->post('pekerjaan'),
	         	'no_telepon' 		=>$this->input->post('no_telepon'),
	         	'email' 			=>$this->input->post('email'),
	         	'riwayat_penyakit' 	=>$this->input->post('riwayat_penyakit'),
	         	'status_haji' 		=>$this->input->post('status_haji'),
	         	'mahrom_muhrim' 	=>$this->input->post('mahrom_muhrim'),
	         	'tahun' 			=>$this->input->post('tahun'),
	         	'foto' 				=>$this->input->post('foto')
	      	);
	      	$this->usermodel->insert_data_haji_plus($data_haji_plus);
	      	// Kembalikan ke halaman haji plus
	      	redirect('welcome/haji_plus');    
	   	}
	}

	function detail_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data haji plus yg akan diedit dari database
	    $data['haji_plus'] = $this->usermodel->get_haji_plus_by_id($id);
	    $this->template->set('title','Detail Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_haji_plus',$data);
	}

	function edit_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('id_haji_plus', 'Id_Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('tgl_daftar', 'Tgl_Daftar', 'trim|required');
	   	$this->form_validation->set_rules('paket_haji_plus', 'Paket_Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
	   	$this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'trim|required');
	   	$this->form_validation->set_rules('bin_binti', 'Bin_Binti', 'trim|required');
	   	$this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('gol_darah', 'Gol_Darah', 'trim|required');
	   	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	   	$this->form_validation->set_rules('kode_pos', 'Kode_Pos', 'trim|required');
	   	$this->form_validation->set_rules('kel_desa', 'Kel_Desa', 'trim|required');
	   	$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
	   	$this->form_validation->set_rules('kab_kota', 'Kab_Kota', 'trim|required');
	   	$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
	   	$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
	   	$this->form_validation->set_rules('status_perkawinan', 'Status_Perkawinan', 'trim|required');
	   	$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');
	   	$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('email', 'Email', 'trim|required');
	   	$this->form_validation->set_rules('riwayat_penyakit', 'Riwayat_Penyakit', 'trim|required');
	   	$this->form_validation->set_rules('status_haji', 'Status_Haji', 'trim|required');
	   	$this->form_validation->set_rules('mahrom_muhrim', 'Mahrom_Muhrim', 'trim|required');
	   	$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
	   	$this->form_validation->set_rules('foto', 'Foto', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['paket_haji_plus'] = $this->usermodel->paket_haji_plus();
	      	// Dapatkan data haji plus yg akan diedit dari database
	      	$data['haji_plus'] = $this->usermodel->get_haji_plus_by_id($id);
	      	$this->template->set('title','Edit Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_haji_plus',$data);
	   	} else {
	      	$data_haji_plus = array(
	      		'id_haji_plus' 		=>$this->input->post('id_haji_plus'),
	      		'tgl_daftar' 		=>$this->input->post('tgl_daftar'),
	      		'id_paket_haji_plus'=>$this->input->post('paket_haji_plus'),
	         	'nik' 				=>$this->input->post('nik'),
	         	'nama_lengkap' 		=>$this->input->post('nama_lengkap'),
	         	'bin_binti' 		=>$this->input->post('bin_binti'),
	         	'tempat_lahir' 		=>$this->input->post('tempat_lahir'),
	         	'tgl_lahir' 		=>$this->input->post('tgl_lahir'),
	         	'jenis_kelamin' 	=>$this->input->post('jenis_kelamin'),
	         	'gol_darah' 		=>$this->input->post('gol_darah'),
	         	'alamat' 			=>$this->input->post('alamat'),
	         	'kode_pos' 			=>$this->input->post('kode_pos'),
	         	'kel_desa' 			=>$this->input->post('kel_desa'),
	         	'kecamatan' 		=>$this->input->post('kecamatan'),
	         	'kab_kota' 			=>$this->input->post('kab_kota'),
	         	'provinsi' 			=>$this->input->post('provinsi'),
	         	'agama' 			=>$this->input->post('agama'),
	         	'status_perkawinan' =>$this->input->post('status_perkawinan'),
	         	'pendidikan' 		=>$this->input->post('pendidikan'),
	         	'pekerjaan' 		=>$this->input->post('pekerjaan'),
	         	'no_telepon' 		=>$this->input->post('no_telepon'),
	         	'email' 			=>$this->input->post('email'),
	         	'riwayat_penyakit' 	=>$this->input->post('riwayat_penyakit'),
	         	'status_haji' 		=>$this->input->post('status_haji'),
	         	'mahrom_muhrim' 	=>$this->input->post('mahrom_muhrim'),
	         	'tahun' 			=>$this->input->post('tahun'),
	         	'foto' 				=>$this->input->post('foto')
	      	);
	      	$this->usermodel->update_data_haji_plus($data_haji_plus,$id);
	      	// Kembalikan ke halaman haji plus
	      	redirect('welcome/haji_plus');
	   	}
	}

	function delete_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id haji_plus dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_haji_plus($id);
	   	// Kembalikan ke halaman haji plus
	   	redirect('welcome/haji_plus'); 
	}

	// Paspor Haji Plus

	function paspor_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/paspor_haji_plus";
        $config['total_rows']= $this->db->query("SELECT * FROM paspor_haji_plus;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_paspor_haji_plus']=$this->usermodel->get_paspor_haji_plus($config);
        $data['jumlah_paspor_haji_plus'] = $this->usermodel->jumlah_paspor_haji_plus();
	   	$this->template->set('title','Paspor Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_paspor_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_paspor_haji_plus',$data);
	}

	function search_paspor_haji_plus() {
  		$keyword = $this->input->get('search_paspor_haji_plus', TRUE); // Mengambil nilai dari form input cari
  		$data['paspor_haji_plus'] = $this->usermodel->search_paspor_haji_plus($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Paspor Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_paspor_haji_plus',$data); // Menampilkan data yang sudah dicari
	}

	function insert_paspor_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_paspor_haji_plus'] = $this->usermodel->kode_paspor_haji_plus();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_paspor', 'Id_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('haji_plus', 'Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('no_paspor', 'No_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('tempat_dikeluarkan', 'Tempat_Dikeluarkan', 'trim|required');
	   	$this->form_validation->set_rules('tgl_dikeluarkan', 'Tgl_Dikeluarkan', 'trim|required');
	   	$this->form_validation->set_rules('tgl_habis_berlaku', 'Tgl_Habis_Berlaku', 'trim|required');
	   	$this->form_validation->set_rules('penambahan_nama', 'Penambahan_Nama', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['haji_plus'] = $this->usermodel->haji_plus();
	      	$this->template->set('title','Input Paspor Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_paspor_haji_plus',$data);
	   	} else {
	      	$data_paspor_haji_plus = array(
	      		'id_paspor' 		=>$this->input->post('id_paspor'),
	      		'id_haji_plus'		=>$this->input->post('haji_plus'),
	         	'no_paspor' 		=>$this->input->post('no_paspor'),
	         	'tempat_dikeluarkan'=>$this->input->post('tempat_dikeluarkan'),
	         	'tgl_dikeluarkan' 	=>$this->input->post('tgl_dikeluarkan'),
	         	'tgl_habis_berlaku'	=>$this->input->post('tgl_habis_berlaku'),
	         	'penambahan_nama' 	=>$this->input->post('penambahan_nama'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_paspor_haji_plus($data_paspor_haji_plus);
	      	// Kembalikan ke halaman paspor haji plus
	      	redirect('welcome/paspor_haji_plus');    
	   	}
	}

	function detail_paspor_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data paspor haji yg akan diedit dari database
	    $data['paspor_haji_plus'] = $this->usermodel->get_paspor_haji_plus_by_id($id);
	    $this->template->set('title','Detail Paspor Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_paspor_haji_plus',$data);
	}

	function edit_paspor_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_paspor', 'Id_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('haji_plus', 'Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('no_paspor', 'No_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('tempat_dikeluarkan', 'Tempat_Dikeluarkan', 'trim|required');
	   	$this->form_validation->set_rules('tgl_dikeluarkan', 'Tgl_Dikeluarkan', 'trim|required');
	   	$this->form_validation->set_rules('tgl_habis_berlaku', 'Tgl_Habis_Berlaku', 'trim|required');
	   	$this->form_validation->set_rules('penambahan_nama', 'Penambahan_Nama', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['haji_plus'] = $this->usermodel->haji_plus();
	      	// Dapatkan data haji plus yg akan diedit dari database
	      	$data['paspor_haji_plus'] = $this->usermodel->get_paspor_haji_plus_by_id($id);
	      	$this->template->set('title','Edit Paspor Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_paspor_haji_plus',$data);
	   	} else {
	      	$data_paspor_haji_plus = array(
	      		'id_paspor' 		=>$this->input->post('id_paspor'),
	      		'id_haji_plus'		=>$this->input->post('haji_plus'),
	         	'no_paspor' 		=>$this->input->post('no_paspor'),
	         	'tempat_dikeluarkan'=>$this->input->post('tempat_dikeluarkan'),
	         	'tgl_dikeluarkan' 	=>$this->input->post('tgl_dikeluarkan'),
	         	'tgl_habis_berlaku'	=>$this->input->post('tgl_habis_berlaku'),
	         	'penambahan_nama' 	=>$this->input->post('penambahan_nama'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_paspor_haji_plus($data_paspor_haji_plus,$id);
	      	// Kembalikan ke halaman paspor haji plus
	      	redirect('welcome/paspor_haji_plus');
	   	}
	}

	function delete_paspor_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id paspor dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_paspor_haji_plus($id);
	   	// Kembalikan ke halaman paspor haji plus
	   	redirect('welcome/paspor_haji_plus'); 
	}

	// Pembayaran Haji Plus

	function pembayaran_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/pembayaran_haji_plus";
        $config['total_rows']= $this->db->query("SELECT * FROM pembayaran_haji_plus;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_pembayaran_haji_plus']=$this->usermodel->get_pembayaran_haji_plus($config);
        $data['jumlah_pembayaran_haji_plus'] = $this->usermodel->jumlah_pembayaran_haji_plus();
	   	$this->template->set('title','Pembayaran Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_pembayaran_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_pembayaran_haji_plus',$data);
	}

	function search_pembayaran_haji_plus() {
  		$keyword = $this->input->get('search_pembayaran_haji_plus', TRUE); // Mengambil nilai dari form input cari
  		$data['pembayaran_haji_plus'] = $this->usermodel->search_pembayaran_haji_plus($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Pembayaran Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_pembayaran_haji_plus',$data); // Menampilkan data yang sudah dicari
	}

	function insert_pembayaran_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_pembayaran_haji_plus'] = $this->usermodel->kode_pembayaran_haji_plus();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_biaya_haji_plus', 'Id_Biaya_Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('haji_plus', 'Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('tgl_dp', 'Tgl_DP', 'trim|required');
	   	$this->form_validation->set_rules('biaya_dp', 'Biaya_DP', 'trim|required');
	   	$this->form_validation->set_rules('tgl_pelunasan', 'Tgl_Pelunasan', 'trim|required');
	   	$this->form_validation->set_rules('biaya_pelunasan', 'Biaya_Pelunasan', 'trim|required');
	   	$this->form_validation->set_rules('total_jumlah', 'Total_Jumlah', 'trim|required');
	   	$this->form_validation->set_rules('tgl_upgrade_kamar', 'Tgl_Upgrade_Kamar', 'trim|required');
	   	$this->form_validation->set_rules('biaya_upgrade_kamar', 'Biaya_Upgrade_Kamar', 'trim|required');
	   	$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['haji_plus'] = $this->usermodel->haji_plus();
	      	$this->template->set('title','Input Pembayaran Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_pembayaran_haji_plus',$data);
	   	} else {
	      	$data_pembayaran_haji_plus = array(
	      		'id_biaya_haji_plus'	=>$this->input->post('id_biaya_haji_plus'),
	      		'id_haji_plus'			=>$this->input->post('haji_plus'),
	         	'tgl_dp' 				=>$this->input->post('tgl_dp'),
	         	'biaya_dp'				=>$this->input->post('biaya_dp'),
	         	'tgl_pelunasan' 		=>$this->input->post('tgl_pelunasan'),
	         	'biaya_pelunasan'		=>$this->input->post('biaya_pelunasan'),
	         	'total_jumlah'			=>$this->input->post('total_jumlah'),
	         	'tgl_upgrade_kamar' 	=>$this->input->post('tgl_upgrade_kamar'),
	         	'biaya_upgrade_kamar'	=>$this->input->post('biaya_upgrade_kamar'),
	         	'fasilitas'				=>$this->input->post('fasilitas'),
	         	'keterangan' 			=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_pembayaran_haji_plus($data_pembayaran_haji_plus);
	      	// Kembalikan ke halaman pembayaran haji plus
	      	redirect('welcome/pembayaran_haji_plus');    
	   	}
	}

	function detail_pembayaran_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data pembayaran haji plus yg akan diedit dari database
	    $data['pembayaran_haji_plus'] = $this->usermodel->get_pembayaran_haji_plus_by_id($id);
	    $this->template->set('title','Detail Pembayaran Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_pembayaran_haji_plus',$data);
	}

	function edit_pembayaran_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_biaya_haji_plus', 'Id_Biaya_Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('haji_plus', 'Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('tgl_dp', 'Tgl_DP', 'trim|required');
	   	$this->form_validation->set_rules('biaya_dp', 'Biaya_DP', 'trim|required');
	   	$this->form_validation->set_rules('tgl_pelunasan', 'Tgl_Pelunasan', 'trim|required');
	   	$this->form_validation->set_rules('biaya_pelunasan', 'Biaya_Pelunasan', 'trim|required');
	   	$this->form_validation->set_rules('total_jumlah', 'Total_Jumlah', 'trim|required');
	   	$this->form_validation->set_rules('tgl_upgrade_kamar', 'Tgl_Upgrade_Kamar', 'trim|required');
	   	$this->form_validation->set_rules('biaya_upgrade_kamar', 'Biaya_Upgrade_Kamar', 'trim|required');
	   	$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['haji_plus'] = $this->usermodel->haji_plus();
	      	// Dapatkan data haji plus yg akan diedit dari database
	      	$data['pembayaran_haji_plus'] = $this->usermodel->get_pembayaran_haji_plus_by_id($id);
	      	$this->template->set('title','Edit Pembayaran Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_pembayaran_haji_plus',$data);
	   	} else {
	      	$data_pembayaran_haji_plus = array(
	      		'id_biaya_haji_plus'	=>$this->input->post('id_biaya_haji_plus'),
	      		'id_haji_plus'			=>$this->input->post('haji_plus'),
	         	'tgl_dp' 				=>$this->input->post('tgl_dp'),
	         	'biaya_dp'				=>$this->input->post('biaya_dp'),
	         	'tgl_pelunasan' 		=>$this->input->post('tgl_pelunasan'),
	         	'biaya_pelunasan'		=>$this->input->post('biaya_pelunasan'),
	         	'total_jumlah'			=>$this->input->post('total_jumlah'),
	         	'tgl_upgrade_kamar' 	=>$this->input->post('tgl_upgrade_kamar'),
	         	'biaya_upgrade_kamar'	=>$this->input->post('biaya_upgrade_kamar'),
	         	'fasilitas'				=>$this->input->post('fasilitas'),
	         	'keterangan' 			=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_pembayaran_haji_plus($data_pembayaran_haji_plus,$id);
	      	// Kembalikan ke halaman pembayaran haji plus
	      	redirect('welcome/pembayaran_haji_plus');
	   	}
	}

	function delete_pembayaran_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id biaya haji plus dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_pembayaran_haji_plus($id);
	   	// Kembalikan ke halaman pembayaran haji plus
	   	redirect('welcome/pembayaran_haji_plus'); 
	}

	// Biaya Paspor Haji Plus

	function biaya_paspor_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/biaya_paspor_haji_plus";
        $config['total_rows']= $this->db->query("SELECT * FROM biaya_paspor_haji_plus;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_biaya_paspor_haji_plus']=$this->usermodel->get_biaya_paspor_haji_plus($config);
        $data['jumlah_biaya_paspor_haji_plus'] = $this->usermodel->jumlah_biaya_paspor_haji_plus();
	   	$this->template->set('title','Biaya Paspor Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_biaya_paspor_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_biaya_paspor_haji_plus',$data);
	}

	function search_biaya_paspor_haji_plus() {
  		$keyword = $this->input->get('search_biaya_paspor_haji_plus', TRUE); // Mengambil nilai dari form input cari
  		$data['biaya_paspor_haji_plus'] = $this->usermodel->search_biaya_paspor_haji_plus($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Biaya Paspor Haji Plus| Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_biaya_paspor_haji_plus',$data); // Menampilkan data yang sudah dicari
	}

	function insert_biaya_paspor_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_biaya_paspor_haji_plus'] = $this->usermodel->kode_biaya_paspor_haji_plus();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_biaya_paspor', 'Id_Biaya_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('haji_plus', 'Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar', 'Tgl_Bayar', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['haji_plus'] = $this->usermodel->haji_plus();
	      	$this->template->set('title','Input Biaya Paspor Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_biaya_paspor_haji_plus',$data);
	   	} else {
	      	$data_biaya_paspor_haji_plus = array(
	      		'id_biaya_paspor' 	=>$this->input->post('id_biaya_paspor'),
	      		'id_haji_plus'		=>$this->input->post('haji_plus'),
	         	'tgl_bayar' 		=>$this->input->post('tgl_bayar'),
	         	'biaya'				=>$this->input->post('biaya'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_biaya_paspor_haji_plus($data_biaya_paspor_haji_plus);
	      	// Kembalikan ke halaman biaya paspor haji plus
	      	redirect('welcome/biaya_paspor_haji_plus');    
	   	}
	}

	function detail_biaya_paspor_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data paspor haji yg akan diedit dari database
	    $data['biaya_paspor_haji_plus'] = $this->usermodel->get_biaya_paspor_haji_plus_by_id($id);
	    $this->template->set('title','Detail Biaya Paspor Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_biaya_paspor_haji_plus',$data);
	}

	function edit_biaya_paspor_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_biaya_paspor', 'Id_Biaya_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('haji_plus', 'Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar', 'Tgl_Bayar', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['haji_plus'] = $this->usermodel->haji_plus();
	      	// Dapatkan data haji plus yg akan diedit dari database
	      	$data['biaya_paspor_haji_plus'] = $this->usermodel->get_biaya_paspor_haji_plus_by_id($id);
	      	$this->template->set('title','Edit Biaya Paspor Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_biaya_paspor_haji_plus',$data);
	   	} else {
	      	$data_biaya_paspor_haji_plus = array(
	      		'id_biaya_paspor' 	=>$this->input->post('id_biaya_paspor'),
	      		'id_haji_plus'		=>$this->input->post('haji_plus'),
	         	'tgl_bayar' 		=>$this->input->post('tgl_bayar'),
	         	'biaya'				=>$this->input->post('biaya'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_biaya_paspor_haji_plus($data_biaya_paspor_haji_plus,$id);
	      	// Kembalikan ke halaman biaya paspor haji plus
	      	redirect('welcome/biaya_paspor_haji_plus');
	   	}
	}

	function delete_biaya_paspor_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id paspor dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_biaya_paspor_haji_plus($id);
	   	// Kembalikan ke halaman biaya paspor haji plus
	   	redirect('welcome/biaya_paspor_haji_plus'); 
	}

	// Hadyu & Tawiyah Haji Plus

	function biaya_hadyu_tarwiyah_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/biaya_hadyu_tarwiyah_haji_plus";
        $config['total_rows']= $this->db->query("SELECT * FROM biaya_hadyu_tarwiyah_haji_plus;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_hadyu_tarwiyah_haji_plus']=$this->usermodel->get_hadyu_tarwiyah_haji_plus($config);
        $data['jumlah_hadyu_tarwiyah_haji_plus'] = $this->usermodel->jumlah_hadyu_tarwiyah_haji_plus();
	   	$this->template->set('title','Pembayaran Hadyu & Tarwiyah Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_hadyu_tarwiyah_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_hadyu_tarwiyah_haji_plus',$data);
	}

	function search_hadyu_tarwiyah_haji_plus() {
  		$keyword = $this->input->get('search_hadyu_tarwiyah_haji_plus', TRUE); // Mengambil nilai dari form input cari
  		$data['hadyu_tarwiyah_haji_plus'] = $this->usermodel->search_hadyu_tarwiyah_haji_plus($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Pembayaran Hadyu & Tarwiyah Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_hadyu_tarwiyah_haji_plus',$data); // Menampilkan data yang sudah dicari
	}

	function insert_hadyu_tarwiyah_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_hadyu_tarwiyah_haji_plus'] = $this->usermodel->kode_hadyu_tarwiyah_haji_plus();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_hadyu_tarwiyah', 'Id_Hadyu_Tarwiyah', 'trim|required');
	   	$this->form_validation->set_rules('haji_plus', 'Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar_hadyu', 'Tgl_Bayar_Hadyu', 'trim|required');
	   	$this->form_validation->set_rules('biaya_hadyu', 'Biaya_Hadyu', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar_tarwiyah', 'Tgl_Bayar_Tarwiyah', 'trim|required');
	   	$this->form_validation->set_rules('biaya_tarwiyah', 'Biaya_Tarwiyah', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['haji_plus'] = $this->usermodel->haji_plus();
	      	$this->template->set('title','Input Pembayaran Hadyu & Tarwiyah Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_hadyu_tarwiyah_haji_plus',$data);
	   	} else {
	      	$data_hadyu_tarwiyah_haji_plus = array(
	      		'id_hadyu_tarwiyah'		=>$this->input->post('id_hadyu_tarwiyah'),
	      		'id_haji_plus'			=>$this->input->post('haji_plus'),
	         	'tgl_bayar_hadyu' 		=>$this->input->post('tgl_bayar_hadyu'),
	         	'biaya_hadyu'			=>$this->input->post('biaya_hadyu'),
	         	'tgl_bayar_tarwiyah' 	=>$this->input->post('tgl_bayar_tarwiyah'),
	         	'biaya_tarwiyah'		=>$this->input->post('biaya_tarwiyah'),
	         	'keterangan' 			=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_hadyu_tarwiyah_haji_plus($data_hadyu_tarwiyah_haji_plus);
	      	// Kembalikan ke halaman biaya hadyu tarwiyah haji plus
	      	redirect('welcome/biaya_hadyu_tarwiyah_haji_plus');    
	   	}
	}

	function detail_hadyu_tarwiyah_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data hadyu tarwiyah haji plus yg akan diedit dari database
	    $data['hadyu_tarwiyah_haji_plus'] = $this->usermodel->get_hadyu_tarwiyah_haji_plus_by_id($id);
	    $this->template->set('title','Detail Pembayaran Hadyu Tarwiyah Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_hadyu_tarwiyah_haji_plus',$data);
	}

	function edit_hadyu_tarwiyah_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_hadyu_tarwiyah', 'Id_Hadyu_Tarwiyah', 'trim|required');
	   	$this->form_validation->set_rules('haji_plus', 'Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar_hadyu', 'Tgl_Bayar_Hadyu', 'trim|required');
	   	$this->form_validation->set_rules('biaya_hadyu', 'Biaya_Hadyu', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar_tarwiyah', 'Tgl_Bayar_Tarwiyah', 'trim|required');
	   	$this->form_validation->set_rules('biaya_tarwiyah', 'Biaya_Tarwiyah', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['haji_plus'] = $this->usermodel->haji_plus();
	      	// Dapatkan data haji plus yg akan diedit dari database
	      	$data['hadyu_tarwiyah_haji_plus'] = $this->usermodel->get_hadyu_tarwiyah_haji_plus_by_id($id);
	      	$this->template->set('title','Edit Pembayaran Hadyu & Tarwiyah Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_hadyu_tarwiyah_haji_plus',$data);
	   	} else {
	      	$data_hadyu_tarwiyah_haji_plus = array(
	      		'id_hadyu_tarwiyah'		=>$this->input->post('id_hadyu_tarwiyah'),
	      		'id_haji_plus'			=>$this->input->post('haji_plus'),
	         	'tgl_bayar_hadyu' 		=>$this->input->post('tgl_bayar_hadyu'),
	         	'biaya_hadyu'			=>$this->input->post('biaya_hadyu'),
	         	'tgl_bayar_tarwiyah' 	=>$this->input->post('tgl_bayar_tarwiyah'),
	         	'biaya_tarwiyah'		=>$this->input->post('biaya_tarwiyah'),
	         	'keterangan' 			=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_hadyu_tarwiyah_haji_plus($data_hadyu_tarwiyah_haji_plus,$id);
	      	// Kembalikan ke halaman biaya hadyu tarwiyah haji plus
	      	redirect('welcome/biaya_hadyu_tarwiyah_haji_plus');
	   	}
	}

	function delete_hadyu_tarwiyah_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id hadyu_tarwiyah dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_hadyu_tarwiyah_haji_plus($id);
	   	// Kembalikan ke halaman biaya hadyu tarwiyah haji plus
	   	redirect('welcome/biaya_hadyu_tarwiyah_haji_plus'); 
	}

	// Pembatalan Haji Plus

	function pembatalan_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/pembatalan_haji_plus";
        $config['total_rows']= $this->db->query("SELECT * FROM pembatalan_haji_plus;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_pembatalan_haji_plus']=$this->usermodel->get_pembatalan_haji_plus($config);
        $data['jumlah_pembatalan_haji_plus'] = $this->usermodel->jumlah_pembatalan_haji_plus();
	   	$this->template->set('title','Pembatalan Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_pembatalan_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_pembatalan_haji_plus',$data);
	}

	function search_pembatalan_haji_plus() {
  		$keyword = $this->input->get('search_pembatalan_haji_plus', TRUE); // Mengambil nilai dari form input cari
  		$data['pembatalan_haji_plus'] = $this->usermodel->search_pembatalan_haji_plus($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Pembatalan Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_pembatalan_haji_plus',$data); // Menampilkan data yang sudah dicari
	}

	function insert_pembatalan_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_pembatalan_haji_plus'] = $this->usermodel->kode_pembatalan_haji_plus();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_pembatalan_haji_plus', 'Id_Pembatalan_Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('haji_plus', 'Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('tgl_pembatalan', 'Tgl_Pembatalan', 'trim|required');
	   	$this->form_validation->set_rules('alasan', 'Alasan', 'trim|required');
	   	$this->form_validation->set_rules('biaya_paket', 'Biaya_Paket', 'trim|required');
	   	$this->form_validation->set_rules('biaya_paspor', 'Biaya_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('biaya_hadyu', 'Biaya_Hadyu', 'trim|required');
	   	$this->form_validation->set_rules('biaya_tarwiyah', 'Biaya_Tarwiyah', 'trim|required');
	   	$this->form_validation->set_rules('biaya_admin', 'Biaya_Admin', 'trim|required');
	   	$this->form_validation->set_rules('biaya_kembali', 'Biaya_Kembali', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['haji_plus'] = $this->usermodel->haji_plus();
	      	$this->template->set('title','Input Pembatalan Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_pembatalan_haji_plus',$data);
	   	} else {
	      	$data_pembatalan_haji_plus = array(
	      		'id_pembatalan_haji_plus'	=>$this->input->post('id_pembatalan_haji_plus'),
	      		'id_haji_plus'				=>$this->input->post('haji_plus'),
	         	'tgl_pembatalan' 			=>$this->input->post('tgl_pembatalan'),
	         	'alasan' 					=>$this->input->post('alasan'),
	         	'biaya_paket'				=>$this->input->post('biaya_paket'),
	         	'biaya_paspor'				=>$this->input->post('biaya_paspor'),
	         	'biaya_hadyu'				=>$this->input->post('biaya_hadyu'),
	         	'biaya_tarwiyah'			=>$this->input->post('biaya_tarwiyah'),
	         	'biaya_admin' 				=>$this->input->post('biaya_admin'),
	         	'biaya_kembali'				=>$this->input->post('biaya_kembali'),
	         	'keterangan' 				=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_pembatalan_haji_plus($data_pembatalan_haji_plus);
	      	// Kembalikan ke halaman pembatalan haji plus
	      	redirect('welcome/pembatalan_haji_plus');    
	   	}
	}

	function detail_pembatalan_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data pembatalan haji plus yg akan diedit dari database
	    $data['pembatalan_haji_plus'] = $this->usermodel->get_pembatalan_haji_plus_by_id($id);
	    $this->template->set('title','Detail Pembatalan Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_pembatalan_haji_plus',$data);
	}

	function edit_pembatalan_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_pembatalan_haji_plus', 'Id_Pembatalan_Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('haji_plus', 'Haji_Plus', 'trim|required');
	   	$this->form_validation->set_rules('tgl_pembatalan', 'Tgl_Pembatalan', 'trim|required');
	   	$this->form_validation->set_rules('alasan', 'Alasan', 'trim|required');
	   	$this->form_validation->set_rules('biaya_paket', 'Biaya_Paket', 'trim|required');
	   	$this->form_validation->set_rules('biaya_paspor', 'Biaya_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('biaya_hadyu', 'Biaya_Hadyu', 'trim|required');
	   	$this->form_validation->set_rules('biaya_tarwiyah', 'Biaya_Tarwiyah', 'trim|required');
	   	$this->form_validation->set_rules('biaya_admin', 'Biaya_Admin', 'trim|required');
	   	$this->form_validation->set_rules('biaya_kembali', 'Biaya_Kembali', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['haji_plus'] = $this->usermodel->haji_plus();
	      	// Dapatkan data haji plus yg akan diedit dari database
	      	$data['pembatalan_haji_plus'] = $this->usermodel->get_pembatalan_haji_plus_by_id($id);
	      	$this->template->set('title','Edit Pembatalan Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_pembatalan_haji_plus',$data);
	   	} else {
	      	$data_pembatalan_haji_plus = array(
	      		'id_pembatalan_haji_plus'	=>$this->input->post('id_pembatalan_haji_plus'),
	      		'id_haji_plus'				=>$this->input->post('haji_plus'),
	         	'tgl_pembatalan' 			=>$this->input->post('tgl_pembatalan'),
	         	'alasan' 					=>$this->input->post('alasan'),
	         	'biaya_paket'				=>$this->input->post('biaya_paket'),
	         	'biaya_paspor'				=>$this->input->post('biaya_paspor'),
	         	'biaya_hadyu'				=>$this->input->post('biaya_hadyu'),
	         	'biaya_tarwiyah'			=>$this->input->post('biaya_tarwiyah'),
	         	'biaya_admin' 				=>$this->input->post('biaya_admin'),
	         	'biaya_kembali'				=>$this->input->post('biaya_kembali'),
	         	'keterangan' 				=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_pembatalan_haji_plus($data_pembatalan_haji_plus,$id);
	      	// Kembalikan ke halaman pembatalan haji plus
	      	redirect('welcome/pembatalan_haji_plus');
	   	}
	}

	function delete_pembatalan_haji_plus() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id pembatalan haji plus dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_pembatalan_haji_plus($id);
	   	// Kembalikan ke halaman pembatalan haji plus
	   	redirect('welcome/pembatalan_haji_plus'); 
	}

	// Menu Umroh

	function menu_umroh() {
		// Mencegah user yang belum login untuk mengakses halaman ini
		$this->auth->restrict();
		// Mencegah user mengakses menu yang tidak boleh ia buka
		$this->auth->cek_menu(1);
		// Tampilkan isi umroh
		$this->template->set('title', 'Umroh | Sistem Informasi Pelayanan Haji & Umroh');
		$this->template->load('template_admin', 'admin/umroh');
	}

	// Paket Umroh

	function paket_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/paket_umroh";
        $config['total_rows']= $this->db->query("SELECT * FROM paket_umroh;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_paket_umroh']=$this->usermodel->get_paket_umroh($config);
        $data['jumlah_paket_umroh'] = $this->usermodel->jumlah_paket_umroh();
	   	$this->template->set('title','Paket Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_paket_umroh.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_paket_umroh',$data);
	}

	function search_paket_umroh() {
  		$keyword = $this->input->get('search_paket_umroh', TRUE); // Mengambil nilai dari form input cari
  		$data['paket_umroh'] = $this->usermodel->search_paket_umroh($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Paket Umroh | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_paket_umroh',$data); // Menampilkan data yang sudah dicari
	}

	function insert_paket_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_paket_umroh'] = $this->usermodel->kode_paket_umroh();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_paket_umroh', 'Id_Paket_Umroh', 'trim|required');
	   	$this->form_validation->set_rules('nama_program', 'Nama_Program', 'trim|required');
	   	$this->form_validation->set_rules('durasi', 'Durasi', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('tgl_keberangkatan', 'Tgl_Keberangkatan', 'trim|required');
	   	$this->form_validation->set_rules('pesawat', 'Pesawat', 'trim|required');
	   	$this->form_validation->set_rules('hotel_makkah', 'Hotel_Makkah', 'trim|required');
	   	$this->form_validation->set_rules('hotel_madinah', 'Hotel_Madinah', 'trim|required');
	   	$this->form_validation->set_rules('hotel_turki', 'Hotel_Turki', 'trim|required');
	   	$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'trim|required');
	   	$this->form_validation->set_rules('seat', 'Seat', 'trim|required');
	   	$this->form_validation->set_rules('sisa_seat', 'Sisa_Seat', 'trim|required');
	   	$this->form_validation->set_rules('nama_travel', 'Nama_Travel', 'trim|required');
	   	$this->form_validation->set_rules('no_izin', 'No_Izin', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$this->template->set('title','Input Paket Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_paket_umroh',$data);
	   	} else {
	      	$data_paket_umroh = array(
	      		'id_paket_umroh' 	=>$this->input->post('id_paket_umroh'),
	         	'nama_program' 		=>$this->input->post('nama_program'),
	         	'durasi' 			=>$this->input->post('durasi'),
	         	'biaya' 			=>$this->input->post('biaya'),
	         	'tgl_keberangkatan' =>$this->input->post('tgl_keberangkatan'),
	         	'pesawat' 			=>$this->input->post('pesawat'),
	         	'hotel_makkah' 		=>$this->input->post('hotel_makkah'),
	         	'hotel_madinah' 	=>$this->input->post('hotel_madinah'),
	         	'hotel_turki' 		=>$this->input->post('hotel_turki'),
	         	'fasilitas' 		=>$this->input->post('fasilitas'),
	         	'seat' 				=>$this->input->post('seat'),
	         	'sisa_seat' 		=>$this->input->post('sisa_seat'),
	         	'nama_travel' 		=>$this->input->post('nama_travel'),
	         	'no_izin' 			=>$this->input->post('no_izin')
	      	);
	      	$this->usermodel->insert_data_paket_umroh($data_paket_umroh);
	      	// Kembalikan ke halaman paket umroh
	      	redirect('welcome/paket_umroh');    
	   	}
	}

	function detail_paket_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data paket umroh yg akan diedit dari database
	    $data['paket_umroh'] = $this->usermodel->get_paket_umroh_by_id($id);
	    $this->template->set('title','Detail Paket Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_paket_umroh',$data);
	}

	function edit_paket_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('id_paket_umroh', 'Id_Paket_Umroh', 'trim|required');
	   	$this->form_validation->set_rules('nama_program', 'Nama_Program', 'trim|required');
	   	$this->form_validation->set_rules('durasi', 'Durasi', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('tgl_keberangkatan', 'Tgl_Keberangkatan', 'trim|required');
	   	$this->form_validation->set_rules('pesawat', 'Pesawat', 'trim|required');
	   	$this->form_validation->set_rules('hotel_makkah', 'Hotel_Makkah', 'trim|required');
	   	$this->form_validation->set_rules('hotel_madinah', 'Hotel_Madinah', 'trim|required');
	   	$this->form_validation->set_rules('hotel_turki', 'Hotel_Turki', 'trim|required');
	   	$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'trim|required');
	   	$this->form_validation->set_rules('seat', 'Seat', 'trim|required');
	   	$this->form_validation->set_rules('sisa_seat', 'Sisa_Seat', 'trim|required');
	   	$this->form_validation->set_rules('nama_travel', 'Nama_Travel', 'trim|required');
	   	$this->form_validation->set_rules('no_izin', 'No_Izin', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	// Dapatkan data paket umroh yg akan diedit dari database
	      	$data['paket_umroh'] = $this->usermodel->get_paket_umroh_by_id($id);
	      	$this->template->set('title','Edit Paket Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_paket_umroh',$data);
	   	} else {
	      	$data_paket_umroh = array(
	      		'id_paket_umroh' 	=>$this->input->post('id_paket_umroh'),
	         	'nama_program' 		=>$this->input->post('nama_program'),
	         	'durasi' 			=>$this->input->post('durasi'),
	         	'biaya' 			=>$this->input->post('biaya'),
	         	'tgl_keberangkatan' =>$this->input->post('tgl_keberangkatan'),
	         	'pesawat' 			=>$this->input->post('pesawat'),
	         	'hotel_makkah' 		=>$this->input->post('hotel_makkah'),
	         	'hotel_madinah' 	=>$this->input->post('hotel_madinah'),
	         	'hotel_turki' 		=>$this->input->post('hotel_turki'),
	         	'fasilitas' 		=>$this->input->post('fasilitas'),
	         	'seat' 				=>$this->input->post('seat'),
	         	'sisa_seat' 		=>$this->input->post('sisa_seat'),
	         	'nama_travel' 		=>$this->input->post('nama_travel'),
	         	'no_izin' 			=>$this->input->post('no_izin')
	      	);
	      	$this->usermodel->update_data_paket_umroh($data_paket_umroh,$id);
	      	// Kembalikan ke halaman paket umroh
	      	redirect('welcome/paket_umroh');
	   	}
	}

	function delete_paket_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id peserta dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_paket_umroh($id);
	   	// Kembalikan ke halaman paket umroh
	   	redirect('welcome/paket_umroh'); 
	}

	// Umroh

	function umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/umroh";
        $config['total_rows']= $this->db->query("SELECT * FROM umroh;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_umroh']=$this->usermodel->get_umroh($config);
        $data['jumlah_umroh'] = $this->usermodel->jumlah_umroh();
	   	$this->template->set('title','Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_umroh.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_umroh',$data);
	}

	function search_umroh() {
  		$keyword = $this->input->get('search_umroh', TRUE); // Mengambil nilai dari form input cari
  		$data['umroh'] = $this->usermodel->search_umroh($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Umroh | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_umroh',$data); // Menampilkan data yang sudah dicari
	}

	function insert_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_umroh'] = $this->usermodel->kode_umroh();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_umroh', 'Id_Umroh', 'trim|required');
	   	$this->form_validation->set_rules('tgl_daftar', 'Tgl_Daftar', 'trim|required');
	   	$this->form_validation->set_rules('paket_umroh', 'Paket_Umroh', 'trim|required');
	   	$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
	   	$this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'trim|required');
	   	$this->form_validation->set_rules('nama_ayah', 'Nama_Ayah', 'trim|required');
	   	$this->form_validation->set_rules('nama_ibu', 'Nama_Ibu', 'trim|required');
	   	$this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('gol_darah', 'Gol_Darah', 'trim|required');
	   	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	   	$this->form_validation->set_rules('kode_pos', 'Kode_Pos', 'trim|required');
	   	$this->form_validation->set_rules('kel_desa', 'Kel_Desa', 'trim|required');
	   	$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
	   	$this->form_validation->set_rules('kab_kota', 'Kab_Kota', 'trim|required');
	   	$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
	   	$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
	   	$this->form_validation->set_rules('status_perkawinan', 'Status_Perkawinan', 'trim|required');
	   	$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');
	   	$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('email', 'Email', 'trim|required');
	   	$this->form_validation->set_rules('terakhir_umroh', 'Terakhir_Umroh', 'trim|required');
	   	$this->form_validation->set_rules('riwayat_penyakit', 'Riwayat_Penyakit', 'trim|required');
	   	$this->form_validation->set_rules('mahrom_muhrim', 'Mahrom_Muhrim', 'trim|required');
	   	$this->form_validation->set_rules('foto', 'Foto', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['paket_umroh'] = $this->usermodel->paket_umroh();
	      	$this->template->set('title','Input Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_umroh',$data);
	   	} else {
	      	$data_umroh = array(
	      		'id_umroh' 			=>$this->input->post('id_umroh'),
	      		'tgl_daftar' 		=>$this->input->post('tgl_daftar'),
	      		'id_paket_umroh'	=>$this->input->post('paket_umroh'),
	         	'nik' 				=>$this->input->post('nik'),
	         	'nama_lengkap' 		=>$this->input->post('nama_lengkap'),
	         	'nama_ayah' 		=>$this->input->post('nama_ayah'),
	         	'nama_ibu' 			=>$this->input->post('nama_ibu'),
	         	'tempat_lahir' 		=>$this->input->post('tempat_lahir'),
	         	'tgl_lahir' 		=>$this->input->post('tgl_lahir'),
	         	'jenis_kelamin' 	=>$this->input->post('jenis_kelamin'),
	         	'gol_darah' 		=>$this->input->post('gol_darah'),
	         	'alamat' 			=>$this->input->post('alamat'),
	         	'kode_pos' 			=>$this->input->post('kode_pos'),
	         	'kel_desa' 			=>$this->input->post('kel_desa'),
	         	'kecamatan' 		=>$this->input->post('kecamatan'),
	         	'kab_kota' 			=>$this->input->post('kab_kota'),
	         	'provinsi' 			=>$this->input->post('provinsi'),
	         	'agama' 			=>$this->input->post('agama'),
	         	'status_perkawinan' =>$this->input->post('status_perkawinan'),
	         	'pendidikan' 		=>$this->input->post('pendidikan'),
	         	'pekerjaan' 		=>$this->input->post('pekerjaan'),
	         	'no_telepon' 		=>$this->input->post('no_telepon'),
	         	'email' 			=>$this->input->post('email'),
	         	'terakhir_umroh' 	=>$this->input->post('terakhir_umroh'),
	         	'riwayat_penyakit' 	=>$this->input->post('riwayat_penyakit'),
	         	'mahrom_muhrim' 	=>$this->input->post('mahrom_muhrim'),
	         	'foto' 				=>$this->input->post('foto')
	      	);
	      	$this->usermodel->insert_data_umroh($data_umroh);
	      	// Kembalikan ke halaman umroh
	      	redirect('welcome/umroh');    
	   	}
	}

	function detail_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data umroh yg akan diedit dari database
	    $data['umroh'] = $this->usermodel->get_umroh_by_id($id);
	    $this->template->set('title','Detail Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_umroh',$data);
	}

	function edit_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('id_umroh', 'Id_Umroh', 'trim|required');
	   	$this->form_validation->set_rules('tgl_daftar', 'Tgl_Daftar', 'trim|required');
	   	$this->form_validation->set_rules('paket_umroh', 'Paket_Umroh', 'trim|required');
	   	$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
	   	$this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'trim|required');
	   	$this->form_validation->set_rules('nama_ayah', 'Nama_Ayah', 'trim|required');
	   	$this->form_validation->set_rules('nama_ibu', 'Nama_Ibu', 'trim|required');
	   	$this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('gol_darah', 'Gol_Darah', 'trim|required');
	   	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	   	$this->form_validation->set_rules('kode_pos', 'Kode_Pos', 'trim|required');
	   	$this->form_validation->set_rules('kel_desa', 'Kel_Desa', 'trim|required');
	   	$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
	   	$this->form_validation->set_rules('kab_kota', 'Kab_Kota', 'trim|required');
	   	$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
	   	$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
	   	$this->form_validation->set_rules('status_perkawinan', 'Status_Perkawinan', 'trim|required');
	   	$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');
	   	$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('email', 'Email', 'trim|required');
	   	$this->form_validation->set_rules('terakhir_umroh', 'Terakhir_Umroh', 'trim|required');
	   	$this->form_validation->set_rules('riwayat_penyakit', 'Riwayat_Penyakit', 'trim|required');
	   	$this->form_validation->set_rules('mahrom_muhrim', 'Mahrom_Muhrim', 'trim|required');
	   	$this->form_validation->set_rules('foto', 'Foto', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['paket_umroh'] = $this->usermodel->paket_umroh();
	      	// Dapatkan data haji plus yg akan diedit dari database
	      	$data['umroh'] = $this->usermodel->get_umroh_by_id($id);
	      	$this->template->set('title','Edit Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_umroh',$data);
	   	} else {
	      	$data_umroh = array(
	      		'id_umroh' 			=>$this->input->post('id_umroh'),
	      		'tgl_daftar' 		=>$this->input->post('tgl_daftar'),
	      		'id_paket_umroh'	=>$this->input->post('paket_umroh'),
	         	'nik' 				=>$this->input->post('nik'),
	         	'nama_lengkap' 		=>$this->input->post('nama_lengkap'),
	         	'nama_ayah' 		=>$this->input->post('nama_ayah'),
	         	'nama_ibu' 			=>$this->input->post('nama_ibu'),
	         	'tempat_lahir' 		=>$this->input->post('tempat_lahir'),
	         	'tgl_lahir' 		=>$this->input->post('tgl_lahir'),
	         	'jenis_kelamin' 	=>$this->input->post('jenis_kelamin'),
	         	'gol_darah' 		=>$this->input->post('gol_darah'),
	         	'alamat' 			=>$this->input->post('alamat'),
	         	'kode_pos' 			=>$this->input->post('kode_pos'),
	         	'kel_desa' 			=>$this->input->post('kel_desa'),
	         	'kecamatan' 		=>$this->input->post('kecamatan'),
	         	'kab_kota' 			=>$this->input->post('kab_kota'),
	         	'provinsi' 			=>$this->input->post('provinsi'),
	         	'agama' 			=>$this->input->post('agama'),
	         	'status_perkawinan' =>$this->input->post('status_perkawinan'),
	         	'pendidikan' 		=>$this->input->post('pendidikan'),
	         	'pekerjaan' 		=>$this->input->post('pekerjaan'),
	         	'no_telepon' 		=>$this->input->post('no_telepon'),
	         	'email' 			=>$this->input->post('email'),
	         	'terakhir_umroh' 	=>$this->input->post('terakhir_umroh'),
	         	'riwayat_penyakit' 	=>$this->input->post('riwayat_penyakit'),
	         	'mahrom_muhrim' 	=>$this->input->post('mahrom_muhrim'),
	         	'foto' 				=>$this->input->post('foto')
	      	);
	      	$this->usermodel->update_data_umroh($data_umroh,$id);
	      	// Kembalikan ke halaman umroh
	      	redirect('welcome/umroh');
	   	}
	}

	function delete_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id umroh dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_umroh($id);
	   	// Kembalikan ke halaman haji plus
	   	redirect('welcome/umroh'); 
	}

	// Paspor Umroh

	function paspor_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/paspor_umroh";
        $config['total_rows']= $this->db->query("SELECT * FROM paspor_umroh;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_paspor_umroh']=$this->usermodel->get_paspor_umroh($config);
        $data['jumlah_paspor_umroh'] = $this->usermodel->jumlah_paspor_umroh();
	   	$this->template->set('title','Paspor Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_paspor_umroh.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_paspor_umroh',$data);
	}

	function search_paspor_umroh() {
  		$keyword = $this->input->get('search_paspor_umroh', TRUE); // Mengambil nilai dari form input cari
  		$data['paspor_umroh'] = $this->usermodel->search_paspor_umroh($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Paspor Umroh | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_paspor_umroh',$data); // Menampilkan data yang sudah dicari
	}

	function insert_paspor_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_paspor_umroh'] = $this->usermodel->kode_paspor_umroh();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_paspor', 'Id_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('umroh', 'Umroh', 'trim|required');
	   	$this->form_validation->set_rules('no_paspor', 'No_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('tempat_dikeluarkan', 'Tempat_Dikeluarkan', 'trim|required');
	   	$this->form_validation->set_rules('tgl_dikeluarkan', 'Tgl_Dikeluarkan', 'trim|required');
	   	$this->form_validation->set_rules('tgl_habis_berlaku', 'Tgl_Habis_Berlaku', 'trim|required');
	   	$this->form_validation->set_rules('penambahan_nama', 'Penambahan_Nama', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['umroh'] = $this->usermodel->umroh();
	      	$this->template->set('title','Input Paspor Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_paspor_umroh',$data);
	   	} else {
	      	$data_paspor_umroh = array(
	      		'id_paspor' 		=>$this->input->post('id_paspor'),
	      		'id_umroh'			=>$this->input->post('umroh'),
	         	'no_paspor' 		=>$this->input->post('no_paspor'),
	         	'tempat_dikeluarkan'=>$this->input->post('tempat_dikeluarkan'),
	         	'tgl_dikeluarkan' 	=>$this->input->post('tgl_dikeluarkan'),
	         	'tgl_habis_berlaku'	=>$this->input->post('tgl_habis_berlaku'),
	         	'penambahan_nama' 	=>$this->input->post('penambahan_nama'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_paspor_umroh($data_paspor_umroh);
	      	// Kembalikan ke halaman paspor umroh
	      	redirect('welcome/paspor_umroh');    
	   	}
	}

	function detail_paspor_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data paspor haji yg akan diedit dari database
	    $data['paspor_umroh'] = $this->usermodel->get_paspor_umroh_by_id($id);
	    $this->template->set('title','Detail Paspor Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_paspor_umroh',$data);
	}

	function edit_paspor_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_paspor', 'Id_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('umroh', 'Umroh', 'trim|required');
	   	$this->form_validation->set_rules('no_paspor', 'No_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('tempat_dikeluarkan', 'Tempat_Dikeluarkan', 'trim|required');
	   	$this->form_validation->set_rules('tgl_dikeluarkan', 'Tgl_Dikeluarkan', 'trim|required');
	   	$this->form_validation->set_rules('tgl_habis_berlaku', 'Tgl_Habis_Berlaku', 'trim|required');
	   	$this->form_validation->set_rules('penambahan_nama', 'Penambahan_Nama', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['umroh'] = $this->usermodel->umroh();
	      	// Dapatkan data haji plus yg akan diedit dari database
	      	$data['paspor_umroh'] = $this->usermodel->get_paspor_umroh_by_id($id);
	      	$this->template->set('title','Edit Paspor Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_paspor_umroh',$data);
	   	} else {
	      	$data_paspor_umroh = array(
	      		'id_paspor' 		=>$this->input->post('id_paspor'),
	      		'id_umroh'			=>$this->input->post('umroh'),
	         	'no_paspor' 		=>$this->input->post('no_paspor'),
	         	'tempat_dikeluarkan'=>$this->input->post('tempat_dikeluarkan'),
	         	'tgl_dikeluarkan' 	=>$this->input->post('tgl_dikeluarkan'),
	         	'tgl_habis_berlaku'	=>$this->input->post('tgl_habis_berlaku'),
	         	'penambahan_nama' 	=>$this->input->post('penambahan_nama'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_paspor_umroh($data_paspor_umroh,$id);
	      	// Kembalikan ke halaman paspor umroh
	      	redirect('welcome/paspor_umroh');
	   	}
	}

	function delete_paspor_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id paspor dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_paspor_umroh($id);
	   	// Kembalikan ke halaman paspor umroh
	   	redirect('welcome/paspor_umroh'); 
	}

	// Pembayaran Umroh

	function pembayaran_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/pembayaran_umroh";
        $config['total_rows']= $this->db->query("SELECT * FROM pembayaran_umroh;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_pembayaran_umroh']=$this->usermodel->get_pembayaran_umroh($config);
        $data['jumlah_pembayaran_umroh'] = $this->usermodel->jumlah_pembayaran_umroh();
	   	$this->template->set('title','Pembayaran Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_pembayaran_umroh.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_pembayaran_umroh',$data);
	}

	function search_pembayaran_umroh() {
  		$keyword = $this->input->get('search_pembayaran_umroh', TRUE); // Mengambil nilai dari form input cari
  		$data['pembayaran_umroh'] = $this->usermodel->search_pembayaran_umroh($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Pembayaran Umroh| Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_pembayaran_umroh',$data); // Menampilkan data yang sudah dicari
	}

	function insert_pembayaran_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_pembayaran_umroh'] = $this->usermodel->kode_pembayaran_umroh();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_biaya_umroh', 'Id_Biaya_Umroh', 'trim|required');
	   	$this->form_validation->set_rules('umroh', 'Umroh', 'trim|required');
	   	$this->form_validation->set_rules('tgl_dp', 'Tgl_DP', 'trim|required');
	   	$this->form_validation->set_rules('biaya_dp', 'Biaya_DP', 'trim|required');
	   	$this->form_validation->set_rules('tgl_pelunasan', 'Tgl_Pelunasan', 'trim|required');
	   	$this->form_validation->set_rules('biaya_pelunasan', 'Biaya_Pelunasan', 'trim|required');
	   	$this->form_validation->set_rules('total_jumlah', 'Total_Jumlah', 'trim|required');
	   	$this->form_validation->set_rules('tgl_upgrade_kamar', 'Tgl_Upgrade_Kamar', 'trim|required');
	   	$this->form_validation->set_rules('biaya_upgrade_kamar', 'Biaya_Upgrade_Kamar', 'trim|required');
	   	$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'trim|required');
	   	$this->form_validation->set_rules('tgl_surat_mahrom', 'Tgl_Surat_Mahrom', 'trim|required');
	   	$this->form_validation->set_rules('biaya_surat_mahrom', 'Biaya_Surat_Mahrom', 'trim|required');
	   	$this->form_validation->set_rules('tgl_visa_second_entry', 'Tgl_Visa_Second_Entry', 'trim|required');
	   	$this->form_validation->set_rules('biaya_visa_second_entry', 'Biaya_Visa_Second_Entry', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['umroh'] = $this->usermodel->umroh();
	      	$this->template->set('title','Input Pembayaran Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_pembayaran_umroh',$data);
	   	} else {
	      	$data_pembayaran_umroh = array(
	      		'id_biaya_umroh'			=>$this->input->post('id_biaya_umroh'),
	      		'id_umroh'					=>$this->input->post('umroh'),
	         	'tgl_dp' 					=>$this->input->post('tgl_dp'),
	         	'biaya_dp'					=>$this->input->post('biaya_dp'),
	         	'tgl_pelunasan' 			=>$this->input->post('tgl_pelunasan'),
	         	'biaya_pelunasan'			=>$this->input->post('biaya_pelunasan'),
	         	'total_jumlah'				=>$this->input->post('total_jumlah'),
	         	'tgl_upgrade_kamar' 		=>$this->input->post('tgl_upgrade_kamar'),
	         	'biaya_upgrade_kamar'		=>$this->input->post('biaya_upgrade_kamar'),
	         	'fasilitas'					=>$this->input->post('fasilitas'),
	         	'tgl_surat_mahrom' 			=>$this->input->post('tgl_surat_mahrom'),
	         	'biaya_surat_mahrom'		=>$this->input->post('biaya_surat_mahrom'),
	         	'tgl_visa_second_entry' 	=>$this->input->post('tgl_visa_second_entry'),
	         	'biaya_visa_second_entry'	=>$this->input->post('biaya_visa_second_entry'),
	         	'keterangan' 				=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_pembayaran_umroh($data_pembayaran_umroh);
	      	// Kembalikan ke halaman pembayaran umroh
	      	redirect('welcome/pembayaran_umroh');    
	   	}
	}

	function detail_pembayaran_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data pembayaran umroh yg akan diedit dari database
	    $data['pembayaran_umroh'] = $this->usermodel->get_pembayaran_umroh_by_id($id);
	    $this->template->set('title','Detail Pembayaran Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_pembayaran_umroh',$data);
	}

	function edit_pembayaran_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_biaya_umroh', 'Id_Biaya_Umroh', 'trim|required');
	   	$this->form_validation->set_rules('umroh', 'Umroh', 'trim|required');
	   	$this->form_validation->set_rules('tgl_dp', 'Tgl_DP', 'trim|required');
	   	$this->form_validation->set_rules('biaya_dp', 'Biaya_DP', 'trim|required');
	   	$this->form_validation->set_rules('tgl_pelunasan', 'Tgl_Pelunasan', 'trim|required');
	   	$this->form_validation->set_rules('biaya_pelunasan', 'Biaya_Pelunasan', 'trim|required');
	   	$this->form_validation->set_rules('total_jumlah', 'Total_Jumlah', 'trim|required');
	   	$this->form_validation->set_rules('tgl_upgrade_kamar', 'Tgl_Upgrade_Kamar', 'trim|required');
	   	$this->form_validation->set_rules('biaya_upgrade_kamar', 'Biaya_Upgrade_Kamar', 'trim|required');
	   	$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'trim|required');
	   	$this->form_validation->set_rules('tgl_surat_mahrom', 'Tgl_Surat_Mahrom', 'trim|required');
	   	$this->form_validation->set_rules('biaya_surat_mahrom', 'Biaya_Surat_Mahrom', 'trim|required');
	   	$this->form_validation->set_rules('tgl_visa_second_entry', 'Tgl_Visa_Second_Entry', 'trim|required');
	   	$this->form_validation->set_rules('biaya_visa_second_entry', 'Biaya_Visa_Second_Entry', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['umroh'] = $this->usermodel->umroh();
	      	// Dapatkan data umroh yg akan diedit dari database
	      	$data['pembayaran_umroh'] = $this->usermodel->get_pembayaran_umroh_by_id($id);
	      	$this->template->set('title','Edit Pembayaran Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_pembayaran_umroh',$data);
	   	} else {
	      	$data_pembayaran_umroh = array(
	      		'id_biaya_umroh'			=>$this->input->post('id_biaya_umroh'),
	      		'id_umroh'					=>$this->input->post('umroh'),
	         	'tgl_dp' 					=>$this->input->post('tgl_dp'),
	         	'biaya_dp'					=>$this->input->post('biaya_dp'),
	         	'tgl_pelunasan' 			=>$this->input->post('tgl_pelunasan'),
	         	'biaya_pelunasan'			=>$this->input->post('biaya_pelunasan'),
	         	'total_jumlah'				=>$this->input->post('total_jumlah'),
	         	'tgl_upgrade_kamar' 		=>$this->input->post('tgl_upgrade_kamar'),
	         	'biaya_upgrade_kamar'		=>$this->input->post('biaya_upgrade_kamar'),
	         	'fasilitas'					=>$this->input->post('fasilitas'),
	         	'tgl_surat_mahrom' 			=>$this->input->post('tgl_surat_mahrom'),
	         	'biaya_surat_mahrom'		=>$this->input->post('biaya_surat_mahrom'),
	         	'tgl_visa_second_entry' 	=>$this->input->post('tgl_visa_second_entry'),
	         	'biaya_visa_second_entry'	=>$this->input->post('biaya_visa_second_entry'),
	         	'keterangan' 				=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_pembayaran_umroh($data_pembayaran_umroh,$id);
	      	// Kembalikan ke halaman pembayaran umroh
	      	redirect('welcome/pembayaran_umroh');
	   	}
	}

	function delete_pembayaran_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id biaya umroh dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_pembayaran_umroh($id);
	   	// Kembalikan ke halaman pembayaran umroh
	   	redirect('welcome/pembayaran_umroh'); 
	}

	// Biaya Paspor Umroh

	function biaya_paspor_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/biaya_paspor_umroh";
        $config['total_rows']= $this->db->query("SELECT * FROM biaya_paspor_umroh;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_biaya_paspor_umroh']=$this->usermodel->get_biaya_paspor_umroh($config);
        $data['jumlah_biaya_paspor_umroh'] = $this->usermodel->jumlah_biaya_paspor_umroh();
	   	$this->template->set('title','Biaya Paspor Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_biaya_paspor_umroh.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_biaya_paspor_umroh',$data);
	}

	function search_biaya_paspor_umroh() {
  		$keyword = $this->input->get('search_biaya_paspor_umroh', TRUE); // Mengambil nilai dari form input cari
  		$data['biaya_paspor_umroh'] = $this->usermodel->search_biaya_paspor_umroh($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Biaya Paspor Umroh | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_biaya_paspor_umroh',$data); // Menampilkan data yang sudah dicari
	}

	function insert_biaya_paspor_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_biaya_paspor_umroh'] = $this->usermodel->kode_biaya_paspor_umroh();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_biaya_paspor', 'Id_Biaya_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('umroh', 'umroh', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar', 'Tgl_Bayar', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['umroh'] = $this->usermodel->umroh();
	      	$this->template->set('title','Input Biaya Paspor Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_biaya_paspor_umroh',$data);
	   	} else {
	      	$data_biaya_paspor_umroh = array(
	      		'id_biaya_paspor' 	=>$this->input->post('id_biaya_paspor'),
	      		'id_umroh'			=>$this->input->post('umroh'),
	         	'tgl_bayar' 		=>$this->input->post('tgl_bayar'),
	         	'biaya'				=>$this->input->post('biaya'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_biaya_paspor_umroh($data_biaya_paspor_umroh);
	      	// Kembalikan ke halaman biaya paspor umroh
	      	redirect('welcome/biaya_paspor_umroh');
	   	}
	}

	function detail_biaya_paspor_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data paspor umroh yg akan diedit dari database
	    $data['biaya_paspor_umroh'] = $this->usermodel->get_biaya_paspor_umroh_by_id($id);
	    $this->template->set('title','Detail Biaya Paspor Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_biaya_paspor_umroh',$data);
	}

	function edit_biaya_paspor_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_biaya_paspor', 'Id_Biaya_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('umroh', 'umroh', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar', 'Tgl_Bayar', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['umroh'] = $this->usermodel->umroh();
	      	// Dapatkan data umroh yg akan diedit dari database
	      	$data['biaya_paspor_umroh'] = $this->usermodel->get_biaya_paspor_umroh_by_id($id);
	      	$this->template->set('title','Edit Biaya Paspor Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_biaya_paspor_umroh',$data);
	   	} else {
	      	$data_biaya_paspor_umroh = array(
	      		'id_biaya_paspor' 	=>$this->input->post('id_biaya_paspor'),
	      		'id_umroh'			=>$this->input->post('umroh'),
	         	'tgl_bayar' 		=>$this->input->post('tgl_bayar'),
	         	'biaya'				=>$this->input->post('biaya'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_biaya_paspor_umroh($data_biaya_paspor_umroh,$id);
	      	// Kembalikan ke halaman biaya paspor umroh
	      	redirect('welcome/biaya_paspor_umroh');
	   	}
	}

	function delete_biaya_paspor_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id paspor dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_biaya_paspor_umroh($id);
	   	// Kembalikan ke halaman biaya paspor umroh
	   	redirect('welcome/biaya_paspor_umroh'); 
	}

	// Pembatalan Umroh

	function pembatalan_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/pembatalan_umroh";
        $config['total_rows']= $this->db->query("SELECT * FROM pembatalan_umroh;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_pembatalan_umroh']=$this->usermodel->get_pembatalan_umroh($config);
        $data['jumlah_pembatalan_umroh'] = $this->usermodel->jumlah_pembatalan_umroh();
	   	$this->template->set('title','Pembatalan Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_pembatalan_umroh.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_pembatalan_umroh',$data);
	}

	function search_pembatalan_umroh() {
  		$keyword = $this->input->get('search_pembatalan_umroh', TRUE); // Mengambil nilai dari form input cari
  		$data['pembatalan_umroh'] = $this->usermodel->search_pembatalan_umroh($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Pembatalan Umroh | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_pembatalan_umroh',$data); // Menampilkan data yang sudah dicari
	}

	function insert_pembatalan_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_pembatalan_umroh'] = $this->usermodel->kode_pembatalan_umroh();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_pembatalan_umroh', 'Id_Pembatalan_Umroh', 'trim|required');
	   	$this->form_validation->set_rules('umroh', 'Umroh', 'trim|required');
	   	$this->form_validation->set_rules('tgl_pembatalan', 'Tgl_Pembatalan', 'trim|required');
	   	$this->form_validation->set_rules('alasan', 'Alasan', 'trim|required');
	   	$this->form_validation->set_rules('biaya_paket', 'Biaya_Paket', 'trim|required');
	   	$this->form_validation->set_rules('biaya_paspor', 'Biaya_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('biaya_upgrade_kamar', 'Biaya_Upgrade_Kamar', 'trim|required');
	   	$this->form_validation->set_rules('biaya_surat_mahrom', 'Biaya_Surat_Mahrom', 'trim|required');
	   	$this->form_validation->set_rules('biaya_visa_second_entry', 'Biaya_Visa_Second_Entry', 'trim|required');
	   	$this->form_validation->set_rules('biaya_admin', 'Biaya_Admin', 'trim|required');
	   	$this->form_validation->set_rules('biaya_kembali', 'Biaya_Kembali', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['umroh'] = $this->usermodel->umroh();
	      	$this->template->set('title','Input Pembatalan Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_pembatalan_umroh',$data);
	   	} else {
	      	$data_pembatalan_umroh = array(
	      		'id_pembatalan_umroh'		=>$this->input->post('id_pembatalan_umroh'),
	      		'id_umroh'					=>$this->input->post('umroh'),
	         	'tgl_pembatalan' 			=>$this->input->post('tgl_pembatalan'),
	         	'alasan' 					=>$this->input->post('alasan'),
	         	'biaya_paket'				=>$this->input->post('biaya_paket'),
	         	'biaya_paspor'				=>$this->input->post('biaya_paspor'),
	         	'biaya_upgrade_kamar'		=>$this->input->post('biaya_upgrade_kamar'),
	         	'biaya_surat_mahrom'		=>$this->input->post('biaya_surat_mahrom'),
	         	'biaya_visa_second_entry'	=>$this->input->post('biaya_visa_second_entry'),
	         	'biaya_admin' 				=>$this->input->post('biaya_admin'),
	         	'biaya_kembali'				=>$this->input->post('biaya_kembali'),
	         	'keterangan' 				=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_pembatalan_umroh($data_pembatalan_umroh);
	      	// Kembalikan ke halaman pembatalan umroh
	      	redirect('welcome/pembatalan_umroh');    
	   	}
	}

	function detail_pembatalan_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data pembatalan umroh yg akan diedit dari database
	    $data['pembatalan_umroh'] = $this->usermodel->get_pembatalan_umroh_by_id($id);
	    $this->template->set('title','Detail Pembatalan Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_pembatalan_umroh',$data);
	}

	function edit_pembatalan_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_pembatalan_umroh', 'Id_Pembatalan_Umroh', 'trim|required');
	   	$this->form_validation->set_rules('umroh', 'Umroh', 'trim|required');
	   	$this->form_validation->set_rules('tgl_pembatalan', 'Tgl_Pembatalan', 'trim|required');
	   	$this->form_validation->set_rules('alasan', 'Alasan', 'trim|required');
	   	$this->form_validation->set_rules('biaya_paket', 'Biaya_Paket', 'trim|required');
	   	$this->form_validation->set_rules('biaya_paspor', 'Biaya_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('biaya_upgrade_kamar', 'Biaya_Upgrade_Kamar', 'trim|required');
	   	$this->form_validation->set_rules('biaya_surat_mahrom', 'Biaya_Surat_Mahrom', 'trim|required');
	   	$this->form_validation->set_rules('biaya_visa_second_entry', 'Biaya_Visa_Second_Entry', 'trim|required');
	   	$this->form_validation->set_rules('biaya_admin', 'Biaya_Admin', 'trim|required');
	   	$this->form_validation->set_rules('biaya_kembali', 'Biaya_Kembali', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['umroh'] = $this->usermodel->umroh();
	      	// Dapatkan data umroh yg akan diedit dari database
	      	$data['pembatalan_umroh'] = $this->usermodel->get_pembatalan_umroh_by_id($id);
	      	$this->template->set('title','Edit Pembatalan Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_pembatalan_umroh',$data);
	   	} else {
	      	$data_pembatalan_umroh = array(
	      		'id_pembatalan_umroh'		=>$this->input->post('id_pembatalan_umroh'),
	      		'id_umroh'					=>$this->input->post('umroh'),
	         	'tgl_pembatalan' 			=>$this->input->post('tgl_pembatalan'),
	         	'alasan' 					=>$this->input->post('alasan'),
	         	'biaya_paket'				=>$this->input->post('biaya_paket'),
	         	'biaya_paspor'				=>$this->input->post('biaya_paspor'),
	         	'biaya_upgrade_kamar'		=>$this->input->post('biaya_upgrade_kamar'),
	         	'biaya_surat_mahrom'		=>$this->input->post('biaya_surat_mahrom'),
	         	'biaya_visa_second_entry'	=>$this->input->post('biaya_visa_second_entry'),
	         	'biaya_admin' 				=>$this->input->post('biaya_admin'),
	         	'biaya_kembali'				=>$this->input->post('biaya_kembali'),
	         	'keterangan' 				=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_pembatalan_umroh($data_pembatalan_umroh,$id);
	      	// Kembalikan ke halaman pembatalan umroh
	      	redirect('welcome/pembatalan_umroh');
	   	}
	}

	function delete_pembatalan_umroh() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id pembatalan umroh dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_pembatalan_umroh($id);
	   	// Kembalikan ke halaman pembatalan umroh
	   	redirect('welcome/pembatalan_umroh'); 
	}

	// Menu Bimbingan Manasik

	function menu_bimbingan_manasik() {
		// Mencegah user yang belum login untuk mengakses halaman ini
		$this->auth->restrict();
		// Mencegah user mengakses menu yang tidak boleh ia buka
		$this->auth->cek_menu(1);
		// Tampilkan isi bimbingan manasik
		$this->template->set('title', 'Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
		$this->template->load('template_admin', 'admin/bimbingan_manasik');
	}

	// Bimbingan Manasik

	function bimbingan_manasik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/bimbingan_manasik";
        $config['total_rows']= $this->db->query("SELECT * FROM bimbingan_manasik;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_bimsik']=$this->usermodel->get_bimsik($config);
        $data['jumlah_bimsik'] = $this->usermodel->jumlah_bimsik();
	   	$this->template->set('title','Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_bimsik',$data);
	}

	function search_bimsik() {
  		$keyword = $this->input->get('search_bimsik', TRUE); // Mengambil nilai dari form input cari
  		$data['bimbingan_manasik'] = $this->usermodel->search_bimsik($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_bimsik',$data); // Menampilkan data yang sudah dicari
	}

	function insert_bimsik() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_bimsik'] = $this->usermodel->kode_bimsik();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_peserta', 'Id_Peserta', 'trim|required');
	   	$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
	   	$this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'trim|required');
	   	$this->form_validation->set_rules('bin_binti', 'Bin_Binti', 'trim|required');
	   	$this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('gol_darah', 'Gol_Darah', 'trim|required');
	   	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	   	$this->form_validation->set_rules('kode_pos', 'Kode_Pos', 'trim|required');
	   	$this->form_validation->set_rules('kel_desa', 'Kel_Desa', 'trim|required');
	   	$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
	   	$this->form_validation->set_rules('kab_kota', 'Kab_Kota', 'trim|required');
	   	$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
	   	$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
	   	$this->form_validation->set_rules('status_perkawinan', 'Status_Perkawinan', 'trim|required');
	   	$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');
	   	$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('tgl_daftar', 'Tgl_Daftar', 'trim|required');
	   	$this->form_validation->set_rules('no_porsi', 'No_Porsi', 'trim|required');
	   	$this->form_validation->set_rules('no_spph', 'No_SPPH', 'trim|required');
	   	$this->form_validation->set_rules('status_haji', 'Status_Haji', 'trim|required');
	   	$this->form_validation->set_rules('mahrom_muhrim', 'Mahrom_Muhrim', 'trim|required');
	   	$this->form_validation->set_rules('bank_setoran', 'Bank_Setoran', 'trim|required');
	   	$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
	   	$this->form_validation->set_rules('foto', 'Foto', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$this->template->set('title','Input Peserta | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_bimsik',$data);
	   	} else {
	      	$data_bimsik = array(
	      		'id_peserta' 		=>$this->input->post('id_peserta'),
	         	'nik' 				=>$this->input->post('nik'),
	         	'nama_lengkap' 		=>$this->input->post('nama_lengkap'),
	         	'bin_binti' 		=>$this->input->post('bin_binti'),
	         	'tempat_lahir' 		=>$this->input->post('tempat_lahir'),
	         	'tgl_lahir' 		=>$this->input->post('tgl_lahir'),
	         	'jenis_kelamin' 	=>$this->input->post('jenis_kelamin'),
	         	'gol_darah' 		=>$this->input->post('gol_darah'),
	         	'alamat' 			=>$this->input->post('alamat'),
	         	'kode_pos' 			=>$this->input->post('kode_pos'),
	         	'kel_desa' 			=>$this->input->post('kel_desa'),
	         	'kecamatan' 		=>$this->input->post('kecamatan'),
	         	'kab_kota' 			=>$this->input->post('kab_kota'),
	         	'provinsi' 			=>$this->input->post('provinsi'),
	         	'agama' 			=>$this->input->post('agama'),
	         	'status_perkawinan' =>$this->input->post('status_perkawinan'),
	         	'pendidikan' 		=>$this->input->post('pendidikan'),
	         	'pekerjaan' 		=>$this->input->post('pekerjaan'),
	         	'no_telepon' 		=>$this->input->post('no_telepon'),
	         	'tgl_daftar' 		=>$this->input->post('tgl_daftar'),
	         	'no_porsi' 			=>$this->input->post('no_porsi'),
	         	'no_spph' 			=>$this->input->post('no_spph'),
	         	'status_haji' 		=>$this->input->post('status_haji'),
	         	'mahrom_muhrim' 	=>$this->input->post('mahrom_muhrim'),
	         	'bank_setoran' 		=>$this->input->post('bank_setoran'),
	         	'tahun' 			=>$this->input->post('tahun'),
	         	'foto' 				=>$this->input->post('foto')
	      	);
	      	$this->usermodel->insert_data_bimsik($data_bimsik);
	      	// Kembalikan ke halaman bimbingan manasik
	      	redirect('welcome/bimbingan_manasik');    
	   	}
	}

	function detail_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data bimbingan manasik yg akan diedit dari database
	    $data['bimbingan_manasik'] = $this->usermodel->get_bimsik_by_id($id);
	    $this->template->set('title','Detail Peserta | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_bimsik',$data);
	}

	function edit_bimsik() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('id_peserta', 'Id_Peserta', 'trim|required');
	   	$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
	   	$this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'trim|required');
	   	$this->form_validation->set_rules('bin_binti', 'Bin_Binti', 'trim|required');
	   	$this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('gol_darah', 'Gol_Darah', 'trim|required');
	   	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	   	$this->form_validation->set_rules('kode_pos', 'Kode_Pos', 'trim|required');
	   	$this->form_validation->set_rules('kel_desa', 'Kel_Desa', 'trim|required');
	   	$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
	   	$this->form_validation->set_rules('kab_kota', 'Kab_Kota', 'trim|required');
	   	$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
	   	$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
	   	$this->form_validation->set_rules('status_perkawinan', 'Status_Perkawinan', 'trim|required');
	   	$this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');
	   	$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('tgl_daftar', 'Tgl_Daftar', 'trim|required');
	   	$this->form_validation->set_rules('no_porsi', 'No_Porsi', 'trim|required');
	   	$this->form_validation->set_rules('no_spph', 'No_SPPH', 'trim|required');
	   	$this->form_validation->set_rules('status_haji', 'Status_Haji', 'trim|required');
	   	$this->form_validation->set_rules('mahrom_muhrim', 'Mahrom_Muhrim', 'trim|required');
	   	$this->form_validation->set_rules('bank_setoran', 'Bank_Setoran', 'trim|required');
	   	$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
	   	$this->form_validation->set_rules('foto', 'Foto', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	// Dapatkan data bimbingan manasik yg akan diedit dari database
	      	$data['bimbingan_manasik'] = $this->usermodel->get_bimsik_by_id($id);
	      	$this->template->set('title','Edit Peserta | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_bimsik',$data);
	   	} else {
	      	$data_bimsik = array(
	      		'id_peserta' 		=>$this->input->post('id_peserta'),
	         	'nik' 				=>$this->input->post('nik'),
	         	'nama_lengkap' 		=>$this->input->post('nama_lengkap'),
	         	'bin_binti' 		=>$this->input->post('bin_binti'),
	         	'tempat_lahir' 		=>$this->input->post('tempat_lahir'),
	         	'tgl_lahir' 		=>$this->input->post('tgl_lahir'),
	         	'jenis_kelamin' 	=>$this->input->post('jenis_kelamin'),
	         	'gol_darah' 		=>$this->input->post('gol_darah'),
	         	'alamat' 			=>$this->input->post('alamat'),
	         	'kode_pos' 			=>$this->input->post('kode_pos'),
	         	'kel_desa' 			=>$this->input->post('kel_desa'),
	         	'kecamatan' 		=>$this->input->post('kecamatan'),
	         	'kab_kota' 			=>$this->input->post('kab_kota'),
	         	'provinsi' 			=>$this->input->post('provinsi'),
	         	'agama' 			=>$this->input->post('agama'),
	         	'status_perkawinan' =>$this->input->post('status_perkawinan'),
	         	'pendidikan' 		=>$this->input->post('pendidikan'),
	         	'pekerjaan' 		=>$this->input->post('pekerjaan'),
	         	'no_telepon' 		=>$this->input->post('no_telepon'),
	         	'tgl_daftar' 		=>$this->input->post('tgl_daftar'),
	         	'no_porsi' 			=>$this->input->post('no_porsi'),
	         	'no_spph' 			=>$this->input->post('no_spph'),
	         	'status_haji' 		=>$this->input->post('status_haji'),
	         	'mahrom_muhrim' 	=>$this->input->post('mahrom_muhrim'),
	         	'bank_setoran' 		=>$this->input->post('bank_setoran'),
	         	'tahun' 			=>$this->input->post('tahun'),
	         	'foto' 				=>$this->input->post('foto')
	      	);
	      	$this->usermodel->update_data_bimsik($data_bimsik,$id);
	      	// Kembalikan ke halaman bimbingan manasik
	      	redirect('welcome/bimbingan_manasik');
	   	}
	}

	function delete_bimsik() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id peserta dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_bimsik($id);
	   	// Kembalikan ke halaman bimbingan manasik
	   	redirect('welcome/bimbingan_manasik'); 
	}

	// Paspor Haji

	function paspor_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/paspor_haji";
        $config['total_rows']= $this->db->query("SELECT * FROM paspor_haji;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_paspor_haji']=$this->usermodel->get_paspor_haji($config);
        $data['jumlah_paspor_haji'] = $this->usermodel->jumlah_paspor_haji();
	   	$this->template->set('title','Paspor Haji | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_paspor_haji.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_paspor_haji',$data);
	}

	function search_paspor_haji() {
  		$keyword = $this->input->get('search_paspor_haji', TRUE); // Mengambil nilai dari form input cari
  		$data['paspor_haji'] = $this->usermodel->search_paspor_haji($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Paspor haji | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_paspor_haji',$data); // Menampilkan data yang sudah dicari
	}

	function insert_paspor_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_paspor_haji'] = $this->usermodel->kode_paspor_haji();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_paspor', 'Id_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('bimsik', 'Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('no_paspor', 'No_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('tempat_dikeluarkan', 'Tempat_Dikeluarkan', 'trim|required');
	   	$this->form_validation->set_rules('tgl_dikeluarkan', 'Tgl_Dikeluarkan', 'trim|required');
	   	$this->form_validation->set_rules('tgl_habis_berlaku', 'Tgl_Habis_Berlaku', 'trim|required');
	   	$this->form_validation->set_rules('penambahan_nama', 'Penambahan_Nama', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['bimsik'] = $this->usermodel->bimsik();
	      	$this->template->set('title','Input Paspor Haji | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_paspor_haji',$data);
	   	} else {
	      	$data_paspor_haji = array(
	      		'id_paspor' 		=>$this->input->post('id_paspor'),
	      		'id_peserta'		=>$this->input->post('bimsik'),
	         	'no_paspor' 		=>$this->input->post('no_paspor'),
	         	'tempat_dikeluarkan'=>$this->input->post('tempat_dikeluarkan'),
	         	'tgl_dikeluarkan' 	=>$this->input->post('tgl_dikeluarkan'),
	         	'tgl_habis_berlaku'	=>$this->input->post('tgl_habis_berlaku'),
	         	'penambahan_nama' 	=>$this->input->post('penambahan_nama'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_paspor_haji($data_paspor_haji);
	      	// Kembalikan ke halaman paspor haji
	      	redirect('welcome/paspor_haji');    
	   	}
	}

	function detail_paspor_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data paspor haji yg akan diedit dari database
	    $data['paspor_haji'] = $this->usermodel->get_paspor_haji_by_id($id);
	    $this->template->set('title','Detail Paspor Haji | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_paspor_haji',$data);
	}

	function edit_paspor_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_paspor', 'Id_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('bimsik', 'Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('no_paspor', 'No_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('tempat_dikeluarkan', 'Tempat_Dikeluarkan', 'trim|required');
	   	$this->form_validation->set_rules('tgl_dikeluarkan', 'Tgl_Dikeluarkan', 'trim|required');
	   	$this->form_validation->set_rules('tgl_habis_berlaku', 'Tgl_Habis_Berlaku', 'trim|required');
	   	$this->form_validation->set_rules('penambahan_nama', 'Penambahan_Nama', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['bimsik'] = $this->usermodel->bimsik();
	      	// Dapatkan data haji plus yg akan diedit dari database
	      	$data['paspor_haji'] = $this->usermodel->get_paspor_haji_by_id($id);
	      	$this->template->set('title','Edit Paspor Haji | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_paspor_haji',$data);
	   	} else {
	      	$data_paspor_haji = array(
	      		'id_paspor' 		=>$this->input->post('id_paspor'),
	      		'id_peserta'		=>$this->input->post('bimsik'),
	         	'no_paspor' 		=>$this->input->post('no_paspor'),
	         	'tempat_dikeluarkan'=>$this->input->post('tempat_dikeluarkan'),
	         	'tgl_dikeluarkan' 	=>$this->input->post('tgl_dikeluarkan'),
	         	'tgl_habis_berlaku'	=>$this->input->post('tgl_habis_berlaku'),
	         	'penambahan_nama' 	=>$this->input->post('penambahan_nama'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_paspor_haji($data_paspor_haji,$id);
	      	// Kembalikan ke halaman paspor haji
	      	redirect('welcome/paspor_haji');
	   	}
	}

	function delete_paspor_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id paspor dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_paspor_haji($id);
	   	// Kembalikan ke halaman haji plus
	   	redirect('welcome/paspor_haji'); 
	}

	// Pembayaran Bimbingan Manasik

	function pembayaran_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/pembayaran_bimsik";
        $config['total_rows']= $this->db->query("SELECT * FROM pembayaran_bimsik;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_pembayaran_bimsik']=$this->usermodel->get_pembayaran_bimsik($config);
        $data['jumlah_pembayaran_bimsik'] = $this->usermodel->jumlah_pembayaran_bimsik();
	   	$this->template->set('title','Pembayaran Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_pembayaran_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_pembayaran_bimsik',$data);
	}

	function search_pembayaran_bimsik() {
  		$keyword = $this->input->get('search_pembayaran_bimsik', TRUE); // Mengambil nilai dari form input cari
  		$data['pembayaran_bimsik'] = $this->usermodel->search_pembayaran_bimsik($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Pembayaran Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_pembayaran_bimsik',$data); // Menampilkan data yang sudah dicari
	}

	function insert_pembayaran_bimsik() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_pembayaran_bimsik'] = $this->usermodel->kode_pembayaran_bimsik();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_biaya_bimsik', 'Id_Biaya_Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('bimsik', 'Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_1', 'Tgl_Angsuran_1', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_1', 'Angsuran_1', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_2', 'Tgl_Angsuran_2', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_2', 'Angsuran_2', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_3', 'Tgl_Angsuran_3', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_3', 'Angsuran_3', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_4', 'Tgl_Angsuran_4', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_4', 'Angsuran_4', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_5', 'Tgl_Angsuran_5', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_5', 'Angsuran_5', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_6', 'Tgl_Angsuran_6', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_6', 'Angsuran_6', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_7', 'Tgl_Angsuran_7', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_7', 'Angsuran_7', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_8', 'Tgl_Angsuran_8', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_8', 'Angsuran_8', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_9', 'Tgl_Angsuran_9', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_9', 'Angsuran_9', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_10', 'Tgl_Angsuran_10', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_10', 'Angsuran_10', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_11', 'Tgl_Angsuran_11', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_11', 'Angsuran_11', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_12', 'Tgl_Angsuran_12', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_12', 'Angsuran_12', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_13', 'Tgl_Angsuran_13', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_13', 'Angsuran_13', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_14', 'Tgl_Angsuran_14', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_14', 'Angsuran_14', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_15', 'Tgl_Angsuran_15', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_15', 'Angsuran_15', 'trim|required');
	   	$this->form_validation->set_rules('total_jumlah', 'Total_Jumlah', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['bimsik'] = $this->usermodel->bimsik();
	      	$this->template->set('title','Input Pembayaran Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_pembayaran_bimsik',$data);
	   	} else {
	      	$data_pembayaran_bimsik = array(
	      		'id_biaya_bimsik'		=>$this->input->post('id_biaya_bimsik'),
	      		'id_peserta'			=>$this->input->post('bimsik'),
	         	'tgl_angsuran_1' 		=>$this->input->post('tgl_angsuran_1'),
	         	'angsuran_1'			=>$this->input->post('angsuran_1'),
	         	'tgl_angsuran_2' 		=>$this->input->post('tgl_angsuran_2'),
	         	'angsuran_2'			=>$this->input->post('angsuran_2'),
	         	'tgl_angsuran_3' 		=>$this->input->post('tgl_angsuran_3'),
	         	'angsuran_3'			=>$this->input->post('angsuran_3'),
	         	'tgl_angsuran_4' 		=>$this->input->post('tgl_angsuran_4'),
	         	'angsuran_4'			=>$this->input->post('angsuran_4'),
	         	'tgl_angsuran_5' 		=>$this->input->post('tgl_angsuran_5'),
	         	'angsuran_5'			=>$this->input->post('angsuran_5'),
	         	'tgl_angsuran_6' 		=>$this->input->post('tgl_angsuran_6'),
	         	'angsuran_6'			=>$this->input->post('angsuran_6'),
	         	'tgl_angsuran_7' 		=>$this->input->post('tgl_angsuran_7'),
	         	'angsuran_7'			=>$this->input->post('angsuran_7'),
	         	'tgl_angsuran_8' 		=>$this->input->post('tgl_angsuran_8'),
	         	'angsuran_8'			=>$this->input->post('angsuran_8'),
	         	'tgl_angsuran_9' 		=>$this->input->post('tgl_angsuran_9'),
	         	'angsuran_9'			=>$this->input->post('angsuran_9'),
	         	'tgl_angsuran_10' 		=>$this->input->post('tgl_angsuran_10'),
	         	'angsuran_10'			=>$this->input->post('angsuran_10'),
	         	'tgl_angsuran_11' 		=>$this->input->post('tgl_angsuran_11'),
	         	'angsuran_11'			=>$this->input->post('angsuran_11'),
	         	'tgl_angsuran_12' 		=>$this->input->post('tgl_angsuran_12'),
	         	'angsuran_12'			=>$this->input->post('angsuran_12'),
	         	'tgl_angsuran_13' 		=>$this->input->post('tgl_angsuran_13'),
	         	'angsuran_13'			=>$this->input->post('angsuran_13'),
	         	'tgl_angsuran_14' 		=>$this->input->post('tgl_angsuran_14'),
	         	'angsuran_14'			=>$this->input->post('angsuran_14'),
	         	'tgl_angsuran_15' 		=>$this->input->post('tgl_angsuran_15'),
	         	'angsuran_15'			=>$this->input->post('angsuran_15'),
	         	'total_jumlah'			=>$this->input->post('total_jumlah'),
	         	'keterangan' 			=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_pembayaran_bimsik($data_pembayaran_bimsik);
	      	// Kembalikan ke halaman pembayaran bimsik
	      	redirect('welcome/pembayaran_bimsik');    
	   	}
	}

	function detail_pembayaran_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data pembayaran bimsik yg akan diedit dari database
	    $data['pembayaran_bimsik'] = $this->usermodel->get_pembayaran_bimsik_by_id($id);
	    $this->template->set('title','Detail Pembayaran Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_pembayaran_bimsik',$data);
	}

	function edit_pembayaran_bimsik() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_biaya_bimsik', 'Id_Biaya_Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('bimsik', 'Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_1', 'Tgl_Angsuran_1', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_1', 'Angsuran_1', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_2', 'Tgl_Angsuran_2', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_2', 'Angsuran_2', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_3', 'Tgl_Angsuran_3', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_3', 'Angsuran_3', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_4', 'Tgl_Angsuran_4', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_4', 'Angsuran_4', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_5', 'Tgl_Angsuran_5', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_5', 'Angsuran_5', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_6', 'Tgl_Angsuran_6', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_6', 'Angsuran_6', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_7', 'Tgl_Angsuran_7', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_7', 'Angsuran_7', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_8', 'Tgl_Angsuran_8', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_8', 'Angsuran_8', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_9', 'Tgl_Angsuran_9', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_9', 'Angsuran_9', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_10', 'Tgl_Angsuran_10', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_10', 'Angsuran_10', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_11', 'Tgl_Angsuran_11', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_11', 'Angsuran_11', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_12', 'Tgl_Angsuran_12', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_12', 'Angsuran_12', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_13', 'Tgl_Angsuran_13', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_13', 'Angsuran_13', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_14', 'Tgl_Angsuran_14', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_14', 'Angsuran_14', 'trim|required');
	   	$this->form_validation->set_rules('tgl_angsuran_15', 'Tgl_Angsuran_15', 'trim|required');
	   	$this->form_validation->set_rules('angsuran_15', 'Angsuran_15', 'trim|required');
	   	$this->form_validation->set_rules('total_jumlah', 'Total_Jumlah', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['bimsik'] = $this->usermodel->bimsik();
	      	// Dapatkan data bimsik yg akan diedit dari database
	      	$data['pembayaran_bimsik'] = $this->usermodel->get_pembayaran_bimsik_by_id($id);
	      	$this->template->set('title','Edit Pembayaran Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_pembayaran_bimsik',$data);
	   	} else {
	      	$data_pembayaran_bimsik = array(
	      		'id_biaya_bimsik'		=>$this->input->post('id_biaya_bimsik'),
	      		'id_peserta'			=>$this->input->post('bimsik'),
	         	'tgl_angsuran_1' 		=>$this->input->post('tgl_angsuran_1'),
	         	'angsuran_1'			=>$this->input->post('angsuran_1'),
	         	'tgl_angsuran_2' 		=>$this->input->post('tgl_angsuran_2'),
	         	'angsuran_2'			=>$this->input->post('angsuran_2'),
	         	'tgl_angsuran_3' 		=>$this->input->post('tgl_angsuran_3'),
	         	'angsuran_3'			=>$this->input->post('angsuran_3'),
	         	'tgl_angsuran_4' 		=>$this->input->post('tgl_angsuran_4'),
	         	'angsuran_4'			=>$this->input->post('angsuran_4'),
	         	'tgl_angsuran_5' 		=>$this->input->post('tgl_angsuran_5'),
	         	'angsuran_5'			=>$this->input->post('angsuran_5'),
	         	'tgl_angsuran_6' 		=>$this->input->post('tgl_angsuran_6'),
	         	'angsuran_6'			=>$this->input->post('angsuran_6'),
	         	'tgl_angsuran_7' 		=>$this->input->post('tgl_angsuran_7'),
	         	'angsuran_7'			=>$this->input->post('angsuran_7'),
	         	'tgl_angsuran_8' 		=>$this->input->post('tgl_angsuran_8'),
	         	'angsuran_8'			=>$this->input->post('angsuran_8'),
	         	'tgl_angsuran_9' 		=>$this->input->post('tgl_angsuran_9'),
	         	'angsuran_9'			=>$this->input->post('angsuran_9'),
	         	'tgl_angsuran_10' 		=>$this->input->post('tgl_angsuran_10'),
	         	'angsuran_10'			=>$this->input->post('angsuran_10'),
	         	'tgl_angsuran_11' 		=>$this->input->post('tgl_angsuran_11'),
	         	'angsuran_11'			=>$this->input->post('angsuran_11'),
	         	'tgl_angsuran_12' 		=>$this->input->post('tgl_angsuran_12'),
	         	'angsuran_12'			=>$this->input->post('angsuran_12'),
	         	'tgl_angsuran_13' 		=>$this->input->post('tgl_angsuran_13'),
	         	'angsuran_13'			=>$this->input->post('angsuran_13'),
	         	'tgl_angsuran_14' 		=>$this->input->post('tgl_angsuran_14'),
	         	'angsuran_14'			=>$this->input->post('angsuran_14'),
	         	'tgl_angsuran_15' 		=>$this->input->post('tgl_angsuran_15'),
	         	'angsuran_15'			=>$this->input->post('angsuran_15'),
	         	'total_jumlah'			=>$this->input->post('total_jumlah'),
	         	'keterangan' 			=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_pembayaran_bimsik($data_pembayaran_bimsik,$id);
	      	// Kembalikan ke halaman pembayaran bimsik
	      	redirect('welcome/pembayaran_bimsik');
	   	}
	}

	function delete_pembayaran_bimsik() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id biaya bimsik dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_pembayaran_bimsik($id);
	   	// Kembalikan ke halaman pembayaran bimsik
	   	redirect('welcome/pembayaran_bimsik'); 
	}

	// Biaya Paspor Haji

	function biaya_paspor_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/biaya_paspor_haji";
        $config['total_rows']= $this->db->query("SELECT * FROM biaya_paspor_haji;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_biaya_paspor_haji']=$this->usermodel->get_biaya_paspor_haji($config);
        $data['jumlah_biaya_paspor_haji'] = $this->usermodel->jumlah_biaya_paspor_haji();
	   	$this->template->set('title','Biaya Paspor Haji | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_biaya_paspor_haji.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_biaya_paspor_haji',$data);
	}

	function search_biaya_paspor_haji() {
  		$keyword = $this->input->get('search_biaya_paspor_haji', TRUE); // Mengambil nilai dari form input cari
  		$data['biaya_paspor_haji'] = $this->usermodel->search_biaya_paspor_haji($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Biaya Paspor Haji | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_biaya_paspor_haji',$data); // Menampilkan data yang sudah dicari
	}

	function insert_biaya_paspor_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_biaya_paspor_haji'] = $this->usermodel->kode_biaya_paspor_haji();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_biaya_paspor', 'Id_Biaya_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('bimsik', 'Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar', 'Tgl_Bayar', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['bimsik'] = $this->usermodel->bimsik();
	      	$this->template->set('title','Input Biaya Paspor Haji | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_biaya_paspor_haji',$data);
	   	} else {
	      	$data_biaya_paspor_haji = array(
	      		'id_biaya_paspor' 	=>$this->input->post('id_biaya_paspor'),
	      		'id_peserta'		=>$this->input->post('bimsik'),
	         	'tgl_bayar' 		=>$this->input->post('tgl_bayar'),
	         	'biaya'				=>$this->input->post('biaya'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_biaya_paspor_haji($data_biaya_paspor_haji);
	      	// Kembalikan ke halaman biaya paspor haji
	      	redirect('welcome/biaya_paspor_haji');    
	   	}
	}

	function detail_biaya_paspor_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data paspor haji yg akan diedit dari database
	    $data['biaya_paspor_haji'] = $this->usermodel->get_biaya_paspor_haji_by_id($id);
	    $this->template->set('title','Detail Biaya Paspor Haji | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_biaya_paspor_haji',$data);
	}

	function edit_biaya_paspor_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_biaya_paspor', 'Id_Biaya_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('bimsik', 'Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar', 'Tgl_Bayar', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['bimsik'] = $this->usermodel->bimsik();
	      	// Dapatkan data haji plus yg akan diedit dari database
	      	$data['biaya_paspor_haji'] = $this->usermodel->get_biaya_paspor_haji_by_id($id);
	      	$this->template->set('title','Edit Biaya Paspor Haji | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_biaya_paspor_haji',$data);
	   	} else {
	      	$data_biaya_paspor_haji = array(
	      		'id_biaya_paspor' 	=>$this->input->post('id_biaya_paspor'),
	      		'id_peserta'		=>$this->input->post('bimsik'),
	         	'tgl_bayar' 		=>$this->input->post('tgl_bayar'),
	         	'biaya'				=>$this->input->post('biaya'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_biaya_paspor_haji($data_biaya_paspor_haji,$id);
	      	// Kembalikan ke halaman biaya paspor haji
	      	redirect('welcome/biaya_paspor_haji');
	   	}
	}

	function delete_biaya_paspor_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id paspor dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_biaya_paspor_haji($id);
	   	// Kembalikan ke halaman biaya paspor haji
	   	redirect('welcome/biaya_paspor_haji'); 
	}

	// Hadyu & Tawiyah Haji

	function biaya_hadyu_tarwiyah_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/biaya_hadyu_tarwiyah_haji";
        $config['total_rows']= $this->db->query("SELECT * FROM biaya_hadyu_tarwiyah_haji;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_hadyu_tarwiyah_haji']=$this->usermodel->get_hadyu_tarwiyah_haji($config);
        $data['jumlah_hadyu_tarwiyah_haji'] = $this->usermodel->jumlah_hadyu_tarwiyah_haji();
	   	$this->template->set('title','Pembayaran Hadyu & Tarwiyah Haji | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_hadyu_tarwiyah_haji.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_hadyu_tarwiyah_haji',$data);
	}

	function search_hadyu_tarwiyah_haji() {
  		$keyword = $this->input->get('search_hadyu_tarwiyah_haji', TRUE); // Mengambil nilai dari form input cari
  		$data['hadyu_tarwiyah_haji'] = $this->usermodel->search_hadyu_tarwiyah_haji($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Pembayaran Hadyu & Tarwiyah Haji | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_hadyu_tarwiyah_haji',$data); // Menampilkan data yang sudah dicari
	}

	function insert_hadyu_tarwiyah_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_hadyu_tarwiyah_haji'] = $this->usermodel->kode_hadyu_tarwiyah_haji();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_hadyu_tarwiyah', 'Id_Hadyu_Tarwiyah', 'trim|required');
	   	$this->form_validation->set_rules('bimsik', 'Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar_hadyu', 'Tgl_Bayar_Hadyu', 'trim|required');
	   	$this->form_validation->set_rules('biaya_hadyu', 'Biaya_Hadyu', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar_tarwiyah', 'Tgl_Bayar_Tarwiyah', 'trim|required');
	   	$this->form_validation->set_rules('biaya_tarwiyah', 'Biaya_Tarwiyah', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['bimsik'] = $this->usermodel->bimsik();
	      	$this->template->set('title','Input Pembayaran Hadyu & Tarwiyah Haji | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_hadyu_tarwiyah_haji',$data);
	   	} else {
	      	$data_hadyu_tarwiyah_haji = array(
	      		'id_hadyu_tarwiyah'		=>$this->input->post('id_hadyu_tarwiyah'),
	      		'id_peserta'			=>$this->input->post('bimsik'),
	         	'tgl_bayar_hadyu' 		=>$this->input->post('tgl_bayar_hadyu'),
	         	'biaya_hadyu'			=>$this->input->post('biaya_hadyu'),
	         	'tgl_bayar_tarwiyah' 	=>$this->input->post('tgl_bayar_tarwiyah'),
	         	'biaya_tarwiyah'		=>$this->input->post('biaya_tarwiyah'),
	         	'keterangan' 			=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_hadyu_tarwiyah_haji($data_hadyu_tarwiyah_haji);
	      	// Kembalikan ke halaman biaya hadyu tarwiyah haji
	      	redirect('welcome/biaya_hadyu_tarwiyah_haji');    
	   	}
	}

	function detail_hadyu_tarwiyah_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data hadyu tarwiyah haji yg akan diedit dari database
	    $data['hadyu_tarwiyah_haji'] = $this->usermodel->get_hadyu_tarwiyah_haji_by_id($id);
	    $this->template->set('title','Detail Pembayaran Hadyu Tarwiyah Haji | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_hadyu_tarwiyah_haji',$data);
	}

	function edit_hadyu_tarwiyah_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_hadyu_tarwiyah', 'Id_Hadyu_Tarwiyah', 'trim|required');
	   	$this->form_validation->set_rules('bimsik', 'Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar_hadyu', 'Tgl_Bayar_Hadyu', 'trim|required');
	   	$this->form_validation->set_rules('biaya_hadyu', 'Biaya_Hadyu', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar_tarwiyah', 'Tgl_Bayar_Tarwiyah', 'trim|required');
	   	$this->form_validation->set_rules('biaya_tarwiyah', 'Biaya_Tarwiyah', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['bimsik'] = $this->usermodel->bimsik();
	      	// Dapatkan data bimsik yg akan diedit dari database
	      	$data['hadyu_tarwiyah_haji'] = $this->usermodel->get_hadyu_tarwiyah_haji_by_id($id);
	      	$this->template->set('title','Edit Pembayaran Hadyu & Tarwiyah Haji | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_hadyu_tarwiyah_haji',$data);
	   	} else {
	      	$data_hadyu_tarwiyah_haji = array(
	      		'id_hadyu_tarwiyah'		=>$this->input->post('id_hadyu_tarwiyah'),
	      		'id_peserta'			=>$this->input->post('bimsik'),
	         	'tgl_bayar_hadyu' 		=>$this->input->post('tgl_bayar_hadyu'),
	         	'biaya_hadyu'			=>$this->input->post('biaya_hadyu'),
	         	'tgl_bayar_tarwiyah' 	=>$this->input->post('tgl_bayar_tarwiyah'),
	         	'biaya_tarwiyah'		=>$this->input->post('biaya_tarwiyah'),
	         	'keterangan' 			=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_hadyu_tarwiyah_haji($data_hadyu_tarwiyah_haji,$id);
	      	// Kembalikan ke halaman biaya hadyu tarwiyah haji
	      	redirect('welcome/biaya_hadyu_tarwiyah_haji');
	   	}
	}

	function delete_hadyu_tarwiyah_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id hadyu_tarwiyah dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_hadyu_tarwiyah_haji($id);
	   	// Kembalikan ke halaman biaya hadyu tarwiyah haji
	   	redirect('welcome/biaya_hadyu_tarwiyah_haji'); 
	}

	// Pembatalan Bimbingan Manasik

	function pembatalan_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/pembatalan_bimsik";
        $config['total_rows']= $this->db->query("SELECT * FROM pembatalan_bimsik;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_pembatalan_bimsik']=$this->usermodel->get_pembatalan_bimsik($config);
        $data['jumlah_pembatalan_bimsik'] = $this->usermodel->jumlah_pembatalan_bimsik();
	   	$this->template->set('title','Pembatalan Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_pembatalan_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_pembatalan_bimsik',$data);
	}

	function search_pembatalan_bimsik() {
  		$keyword = $this->input->get('search_pembatalan_bimsik', TRUE); // Mengambil nilai dari form input cari
  		$data['pembatalan_bimsik'] = $this->usermodel->search_pembatalan_bimsik($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Pembatalan Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_pembatalan_bimsik',$data); // Menampilkan data yang sudah dicari
	}

	function insert_pembatalan_bimsik() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_pembatalan_bimsik'] = $this->usermodel->kode_pembatalan_bimsik();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_pembatalan_bimsik', 'Id_Pembatalan_Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('bimsik', 'Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('tgl_pembatalan', 'Tgl_Pembatalan', 'trim|required');
	   	$this->form_validation->set_rules('alasan', 'Alasan', 'trim|required');
	   	$this->form_validation->set_rules('biaya_bimsik', 'Biaya_Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('biaya_paspor', 'Biaya_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('biaya_hadyu', 'Biaya_Hadyu', 'trim|required');
	   	$this->form_validation->set_rules('biaya_tarwiyah', 'Biaya_Tarwiyah', 'trim|required');
	   	$this->form_validation->set_rules('biaya_admin', 'Biaya_Admin', 'trim|required');
	   	$this->form_validation->set_rules('biaya_kembali', 'Biaya_Kembali', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['bimsik'] = $this->usermodel->bimsik();
	      	$this->template->set('title','Input Pembatalan Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_pembatalan_bimsik',$data);
	   	} else {
	      	$data_pembatalan_bimsik = array(
	      		'id_pembatalan_bimsik'		=>$this->input->post('id_pembatalan_bimsik'),
	      		'id_peserta'				=>$this->input->post('bimsik'),
	         	'tgl_pembatalan' 			=>$this->input->post('tgl_pembatalan'),
	         	'alasan' 					=>$this->input->post('alasan'),
	         	'biaya_bimsik'				=>$this->input->post('biaya_bimsik'),
	         	'biaya_paspor'				=>$this->input->post('biaya_paspor'),
	         	'biaya_hadyu'				=>$this->input->post('biaya_hadyu'),
	         	'biaya_tarwiyah'			=>$this->input->post('biaya_tarwiyah'),
	         	'biaya_admin' 				=>$this->input->post('biaya_admin'),
	         	'biaya_kembali'				=>$this->input->post('biaya_kembali'),
	         	'keterangan' 				=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_pembatalan_bimsik($data_pembatalan_bimsik);
	      	// Kembalikan ke halaman pembatalan bimsik
	      	redirect('welcome/pembatalan_bimsik');    
	   	}
	}

	function detail_pembatalan_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data pembatalan bimsik yg akan diedit dari database
	    $data['pembatalan_bimsik'] = $this->usermodel->get_pembatalan_bimsik_by_id($id);
	    $this->template->set('title','Detail Pembatalan Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_pembatalan_bimsik',$data);
	}

	function edit_pembatalan_bimsik() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_pembatalan_bimsik', 'Id_Pembatalan_Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('bimsik', 'Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('tgl_pembatalan', 'Tgl_Pembatalan', 'trim|required');
	   	$this->form_validation->set_rules('alasan', 'Alasan', 'trim|required');
	   	$this->form_validation->set_rules('biaya_bimsik', 'Biaya_Bimsik', 'trim|required');
	   	$this->form_validation->set_rules('biaya_paspor', 'Biaya_Paspor', 'trim|required');
	   	$this->form_validation->set_rules('biaya_hadyu', 'Biaya_Hadyu', 'trim|required');
	   	$this->form_validation->set_rules('biaya_tarwiyah', 'Biaya_Tarwiyah', 'trim|required');
	   	$this->form_validation->set_rules('biaya_admin', 'Biaya_Admin', 'trim|required');
	   	$this->form_validation->set_rules('biaya_kembali', 'Biaya_Kembali', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['bimsik'] = $this->usermodel->bimsik();
	      	// Dapatkan data bimbingan manasik yg akan diedit dari database
	      	$data['pembatalan_bimsik'] = $this->usermodel->get_pembatalan_bimsik_by_id($id);
	      	$this->template->set('title','Edit Pembatalan Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_pembatalan_bimsik',$data);
	   	} else {
	      	$data_pembatalan_bimsik = array(
	      		'id_pembatalan_bimsik'		=>$this->input->post('id_pembatalan_bimsik'),
	      		'id_peserta'				=>$this->input->post('bimsik'),
	         	'tgl_pembatalan' 			=>$this->input->post('tgl_pembatalan'),
	         	'alasan' 					=>$this->input->post('alasan'),
	         	'biaya_bimsik'				=>$this->input->post('biaya_bimsik'),
	         	'biaya_paspor'				=>$this->input->post('biaya_paspor'),
	         	'biaya_hadyu'				=>$this->input->post('biaya_hadyu'),
	         	'biaya_tarwiyah'			=>$this->input->post('biaya_tarwiyah'),
	         	'biaya_admin' 				=>$this->input->post('biaya_admin'),
	         	'biaya_kembali'				=>$this->input->post('biaya_kembali'),
	         	'keterangan' 				=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_pembatalan_bimsik($data_pembatalan_bimsik,$id);
	      	// Kembalikan ke halaman pembatalan bimsik
	      	redirect('welcome/pembatalan_bimsik');
	   	}
	}

	function delete_pembatalan_bimsik() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id pembatalan bimsik dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_pembatalan_bimsik($id);
	   	// Kembalikan ke halaman pembatalan bimsik
	   	redirect('welcome/pembatalan_bimsik'); 
	}

	// Menu Badal Haji

	function menu_badal_haji() {
		// Mencegah user yang belum login untuk mengakses halaman ini
		$this->auth->restrict();
		// Mencegah user mengakses menu yang tidak boleh ia buka
		$this->auth->cek_menu(1);
		// Tampilkan isi badal haji
		$this->template->set('title', 'Badal Haji | Sistem Informasi Pelayanan Haji & Umroh');
		$this->template->load('template_admin', 'admin/badal_haji');
	}

	// Badal Haji

	function badal_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/badal_haji";
        $config['total_rows']= $this->db->query("SELECT * FROM badal_haji;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_badal_haji']=$this->usermodel->get_badal_haji($config);
        $data['jumlah_badal_haji'] = $this->usermodel->jumlah_badal_haji();
	   	$this->template->set('title','Badal Haji | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_badal_haji.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_badal_haji',$data);
	}

	function search_badal_haji() {
  		$keyword = $this->input->get('search_badal_haji', TRUE); // Mengambil nilai dari form input cari
  		$data['badal_haji'] = $this->usermodel->search_badal_haji($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Badal Haji | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_badal_haji',$data); // Menampilkan data yang sudah dicari
	}

	function insert_badal_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_badal_haji'] = $this->usermodel->kode_badal_haji();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_badal_haji', 'Id_Badal_Haji', 'trim|required');
	   	$this->form_validation->set_rules('tgl_daftar', 'Tgl_Daftar', 'trim|required');
	   	$this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'trim|required');
	   	$this->form_validation->set_rules('bin_binti', 'Bin_Binti', 'trim|required');
	   	$this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('dibadalkan_oleh', 'Dibadalkan_Oleh', 'trim|required');
	   	$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
	   	$this->form_validation->set_rules('foto', 'Foto', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$this->template->set('title','Input Badal Haji | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_badal_haji',$data);
	   	} else {
	      	$data_badal_haji = array(
	      		'id_badal_haji' 	=>$this->input->post('id_badal_haji'),
	      		'tgl_daftar' 		=>$this->input->post('tgl_daftar'),
	         	'nama_lengkap' 		=>$this->input->post('nama_lengkap'),
	         	'bin_binti' 		=>$this->input->post('bin_binti'),
	         	'tempat_lahir' 		=>$this->input->post('tempat_lahir'),
	         	'tgl_lahir' 		=>$this->input->post('tgl_lahir'),
	         	'jenis_kelamin' 	=>$this->input->post('jenis_kelamin'),
	         	'dibadalkan_oleh' 	=>$this->input->post('dibadalkan_oleh'),
	         	'tahun' 			=>$this->input->post('tahun'),
	         	'foto' 				=>$this->input->post('foto'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_badal_haji($data_badal_haji);
	      	// Kembalikan ke halaman badal haji
	      	redirect('welcome/badal_haji');    
	   	}
	}

	function detail_badal_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data badal haji yg akan diedit dari database
	    $data['badal_haji'] = $this->usermodel->get_badal_haji_by_id($id);
	    $this->template->set('title','Detail Badal Haji | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_badal_haji',$data);
	}

	function edit_badal_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('id_badal_haji', 'Id_Badal_Haji', 'trim|required');
	   	$this->form_validation->set_rules('tgl_daftar', 'Tgl_Daftar', 'trim|required');
	   	$this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'trim|required');
	   	$this->form_validation->set_rules('bin_binti', 'Bin_Binti', 'trim|required');
	   	$this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('dibadalkan_oleh', 'Dibadalkan_Oleh', 'trim|required');
	   	$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
	   	$this->form_validation->set_rules('foto', 'Foto', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	// Dapatkan data badal_haji yg akan diedit dari database
	      	$data['badal_haji'] = $this->usermodel->get_badal_haji_by_id($id);
	      	$this->template->set('title','Edit Badal Haji | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_badal_haji',$data);
	   	} else {
	      	$data_badal_haji = array(
	      		'id_badal_haji' 	=>$this->input->post('id_badal_haji'),
	      		'tgl_daftar' 		=>$this->input->post('tgl_daftar'),
	         	'nama_lengkap' 		=>$this->input->post('nama_lengkap'),
	         	'bin_binti' 		=>$this->input->post('bin_binti'),
	         	'tempat_lahir' 		=>$this->input->post('tempat_lahir'),
	         	'tgl_lahir' 		=>$this->input->post('tgl_lahir'),
	         	'jenis_kelamin' 	=>$this->input->post('jenis_kelamin'),
	         	'dibadalkan_oleh' 	=>$this->input->post('dibadalkan_oleh'),
	         	'tahun' 			=>$this->input->post('tahun'),
	         	'foto' 				=>$this->input->post('foto'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_badal_haji($data_badal_haji,$id);
	      	// Kembalikan ke halaman badal haji
	      	redirect('welcome/badal_haji');
	   	}
	}

	function delete_badal_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id badal_haji dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_badal_haji($id);
	   	// Kembalikan ke halaman badal haji
	   	redirect('welcome/badal_haji'); 
	}

	// Pembayaran Badal Haji

	function pembayaran_badal_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/pembayaran_badal_haji";
        $config['total_rows']= $this->db->query("SELECT * FROM pembayaran_badal_haji;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_pembayaran_badal_haji']=$this->usermodel->get_pembayaran_badal_haji($config);
        $data['jumlah_pembayaran_badal_haji'] = $this->usermodel->jumlah_pembayaran_badal_haji();
	   	$this->template->set('title','Pembayaran Badal Haji | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_pembayaran_badal_haji.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_pembayaran_badal_haji',$data);
	}

	function search_pembayaran_badal_haji() {
  		$keyword = $this->input->get('search_pembayaran_badal_haji', TRUE); // Mengambil nilai dari form input cari
  		$data['pembayaran_badal_haji'] = $this->usermodel->search_pembayaran_badal_haji($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Pembayaran Badal Haji | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_pembayaran_badal_haji',$data); // Menampilkan data yang sudah dicari
	}

	function insert_pembayaran_badal_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_pembayaran_badal_haji'] = $this->usermodel->kode_pembayaran_badal_haji();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_biaya_badal_haji', 'Id_Biaya_Badal_Haji', 'trim|required');
	   	$this->form_validation->set_rules('badal_haji', 'Badal_Haji', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar', 'Tgl_Bayar', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('dibayar_oleh', 'Dibayar_Oleh', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	   	$this->form_validation->set_rules('ket', 'Ket', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['badal_haji'] = $this->usermodel->badal_haji();
	      	$this->template->set('title','Input Pembayaran Badal Haji | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_pembayaran_badal_haji',$data);
	   	} else {
	      	$data_pembayaran_badal_haji = array(
	      		'id_biaya_badal_haji' 	=>$this->input->post('id_biaya_badal_haji'),
	      		'id_badal_haji'			=>$this->input->post('badal_haji'),
	         	'tgl_bayar' 			=>$this->input->post('tgl_bayar'),
	         	'biaya'					=>$this->input->post('biaya'),
	         	'dibayar_oleh'			=>$this->input->post('dibayar_oleh'),
	         	'no_telepon'			=>$this->input->post('no_telepon'),
	         	'alamat'				=>$this->input->post('alamat'),
	         	'ket' 					=>$this->input->post('ket')
	      	);	
	      	$this->usermodel->insert_data_pembayaran_badal_haji($data_pembayaran_badal_haji);
	      	// Kembalikan ke halaman pembayaran badal haji
	      	redirect('welcome/pembayaran_badal_haji');
	   	}
	}

	function detail_pembayaran_badal_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data pembayaran badal haji yg akan diedit dari database
	    $data['pembayaran_badal_haji'] = $this->usermodel->get_pembayaran_badal_haji_by_id($id);
	    $this->template->set('title','Detail Pembayaran Badal Haji | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_pembayaran_badal_haji',$data);
	}

	function edit_pembayaran_badal_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_biaya_badal_haji', 'Id_Biaya_Badal_Haji', 'trim|required');
	   	$this->form_validation->set_rules('badal_haji', 'Badal_Haji', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar', 'Tgl_Bayar', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('dibayar_oleh', 'Dibayar_Oleh', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	   	$this->form_validation->set_rules('ket', 'Ket', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['badal_haji'] = $this->usermodel->badal_haji();
	      	// Dapatkan data badal haji yg akan diedit dari database
	      	$data['pembayaran_badal_haji'] = $this->usermodel->get_pembayaran_badal_haji_by_id($id);
	      	$this->template->set('title','Edit Pembayaran Badal Haji | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_pembayaran_badal_haji',$data);
	   	} else {
	      	$data_pembayaran_badal_haji = array(
	      		'id_biaya_badal_haji' 	=>$this->input->post('id_biaya_badal_haji'),
	      		'id_badal_haji'			=>$this->input->post('badal_haji'),
	         	'tgl_bayar' 			=>$this->input->post('tgl_bayar'),
	         	'biaya'					=>$this->input->post('biaya'),
	         	'dibayar_oleh'			=>$this->input->post('dibayar_oleh'),
	         	'no_telepon'			=>$this->input->post('no_telepon'),
	         	'alamat'				=>$this->input->post('alamat'),
	         	'ket' 					=>$this->input->post('ket')
	      	);
	      	$this->usermodel->update_data_pembayaran_badal_haji($data_pembayaran_badal_haji,$id);
	      	// Kembalikan ke halaman pembayaran badal haji
	      	redirect('welcome/pembayaran_badal_haji');
	   	}
	}

	function delete_pembayaran_badal_haji() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id badal haji dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_pembayaran_badal_haji($id);
	   	// Kembalikan ke halaman biaya pembayaran badal haji
	   	redirect('welcome/pembayaran_badal_haji'); 
	}

	// Menu Kurban

	function menu_kurban() {
		// Mencegah user yang belum login untuk mengakses halaman ini
		$this->auth->restrict();
		// Mencegah user mengakses menu yang tidak boleh ia buka
		$this->auth->cek_menu(1);
		// Tampilkan isi kurban
		$this->template->set('title', 'Kurban | Sistem Informasi Pelayanan Haji & Umroh');
		$this->template->load('template_admin', 'admin/kurban');
	}

	// Kurban

	function kurban() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/kurban";
        $config['total_rows']= $this->db->query("SELECT * FROM kurban;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_kurban']=$this->usermodel->get_kurban($config);
        $data['jumlah_kurban'] = $this->usermodel->jumlah_kurban();
	   	$this->template->set('title','Kurban | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_kurban.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_kurban',$data);
	}

	function search_kurban() {
  		$keyword = $this->input->get('search_kurban', TRUE); // Mengambil nilai dari form input cari
  		$data['kurban'] = $this->usermodel->search_kurban($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Kurban | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_kurban',$data); // Menampilkan data yang sudah dicari
	}

	function insert_kurban() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_kurban'] = $this->usermodel->kode_kurban();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_kurban', 'Id_Kurban', 'trim|required');
	   	$this->form_validation->set_rules('tgl_daftar', 'Tgl_Daftar', 'trim|required');
	   	$this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'trim|required');
	   	$this->form_validation->set_rules('bin_binti', 'Bin_Binti', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$this->template->set('title','Input Kurban | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_kurban',$data);
	   	} else {
	      	$data_kurban = array(
	      		'id_kurban' 		=>$this->input->post('id_kurban'),
	      		'tgl_daftar' 		=>$this->input->post('tgl_daftar'),
	         	'nama_lengkap' 		=>$this->input->post('nama_lengkap'),
	         	'bin_binti' 		=>$this->input->post('bin_binti'),
	         	'jenis_kelamin' 	=>$this->input->post('jenis_kelamin'),
	         	'tahun' 			=>$this->input->post('tahun')
	      	);
	      	$this->usermodel->insert_data_kurban($data_kurban);
	      	// Kembalikan ke halaman kurban
	      	redirect('welcome/kurban');    
	   	}
	}

	function detail_kurban() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data kurban yg akan diedit dari database
	    $data['kurban'] = $this->usermodel->get_kurban_by_id($id);
	    $this->template->set('title','Detail Kurban | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_kurban',$data);
	}

	function edit_kurban() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('id_kurban', 'Id_Kurban', 'trim|required');
	   	$this->form_validation->set_rules('tgl_daftar', 'Tgl_Daftar', 'trim|required');
	   	$this->form_validation->set_rules('nama_lengkap', 'Nama_Lengkap', 'trim|required');
	   	$this->form_validation->set_rules('bin_binti', 'Bin_Binti', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	// Dapatkan data kurban yg akan diedit dari database
	      	$data['kurban'] = $this->usermodel->get_kurban_by_id($id);
	      	$this->template->set('title','Edit Kurban | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_kurban',$data);
	   	} else {
	      	$data_kurban = array(
	      		'id_kurban' 		=>$this->input->post('id_kurban'),
	      		'tgl_daftar' 		=>$this->input->post('tgl_daftar'),
	         	'nama_lengkap' 		=>$this->input->post('nama_lengkap'),
	         	'bin_binti' 		=>$this->input->post('bin_binti'),
	         	'jenis_kelamin' 	=>$this->input->post('jenis_kelamin'),
	         	'tahun' 			=>$this->input->post('tahun')
	      	);
	      	$this->usermodel->update_data_kurban($data_kurban,$id);
	      	// Kembalikan ke halaman kurban
	      	redirect('welcome/kurban');
	   	}
	}

	function delete_kurban() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id kurban dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_kurban($id);
	   	// Kembalikan ke halaman kurban
	   	redirect('welcome/kurban'); 
	}

	// Pembayaran Kurban

	function pembayaran_kurban() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/pembayaran_kurban";
        $config['total_rows']= $this->db->query("SELECT * FROM pembayaran_kurban;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_pembayaran_kurban']=$this->usermodel->get_pembayaran_kurban($config);
        $data['jumlah_pembayaran_kurban'] = $this->usermodel->jumlah_pembayaran_kurban();
	   	$this->template->set('title','Pembayaran Kurban | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_pembayaran_kurban.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_pembayaran_kurban',$data);
	}

	function search_pembayaran_kurban() {
  		$keyword = $this->input->get('search_pembayaran_kurban', TRUE); // Mengambil nilai dari form input cari
  		$data['pembayaran_kurban'] = $this->usermodel->search_pembayaran_kurban($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Pembayaran Kurban | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_pembayaran_kurban',$data); // Menampilkan data yang sudah dicari
	}

	function insert_pembayaran_kurban() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_pembayaran_kurban'] = $this->usermodel->kode_pembayaran_kurban();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_biaya_kurban', 'Id_Biaya_Kurban', 'trim|required');
	   	$this->form_validation->set_rules('kurban', 'Kurban', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar', 'Tgl_Bayar', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('dibayar_oleh', 'Dibayar_Oleh', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	   	$this->form_validation->set_rules('ket', 'Ket', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['kurban'] = $this->usermodel->kurban();
	      	$this->template->set('title','Input Pembayaran Kurban | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_pembayaran_kurban',$data);
	   	} else {
	      	$data_pembayaran_kurban = array(
	      		'id_biaya_kurban' 		=>$this->input->post('id_biaya_kurban'),
	      		'id_kurban'				=>$this->input->post('kurban'),
	         	'tgl_bayar' 			=>$this->input->post('tgl_bayar'),
	         	'biaya'					=>$this->input->post('biaya'),
	         	'dibayar_oleh'			=>$this->input->post('dibayar_oleh'),
	         	'no_telepon'			=>$this->input->post('no_telepon'),
	         	'alamat'				=>$this->input->post('alamat'),
	         	'ket' 					=>$this->input->post('ket')
	      	);	
	      	$this->usermodel->insert_data_pembayaran_kurban($data_pembayaran_kurban);
	      	// Kembalikan ke halaman pembayaran kurban
	      	redirect('welcome/pembayaran_kurban');
	   	}
	}

	function detail_pembayaran_kurban() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data pembayaran kurban yg akan diedit dari database
	    $data['pembayaran_kurban'] = $this->usermodel->get_pembayaran_kurban_by_id($id);
	    $this->template->set('title','Detail Pembayaran Kurban | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_pembayaran_kurban',$data);
	}

	function edit_pembayaran_kurban() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_biaya_kurban', 'Id_Biaya_Kurban', 'trim|required');
	   	$this->form_validation->set_rules('kurban', 'Kurban', 'trim|required');
	   	$this->form_validation->set_rules('tgl_bayar', 'Tgl_Bayar', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('dibayar_oleh', 'Dibayar_Oleh', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
	   	$this->form_validation->set_rules('ket', 'Ket', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['kurban'] = $this->usermodel->kurban();
	      	// Dapatkan data kurban yg akan diedit dari database
	      	$data['pembayaran_kurban'] = $this->usermodel->get_pembayaran_kurban_by_id($id);
	      	$this->template->set('title','Edit Pembayaran Kurban | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_pembayaran_kurban',$data);
	   	} else {
	      	$data_pembayaran_kurban = array(
	      		'id_biaya_kurban' 		=>$this->input->post('id_biaya_kurban'),
	      		'id_kurban'				=>$this->input->post('kurban'),
	         	'tgl_bayar' 			=>$this->input->post('tgl_bayar'),
	         	'biaya'					=>$this->input->post('biaya'),
	         	'dibayar_oleh'			=>$this->input->post('dibayar_oleh'),
	         	'no_telepon'			=>$this->input->post('no_telepon'),
	         	'alamat'				=>$this->input->post('alamat'),
	         	'ket' 					=>$this->input->post('ket')
	      	);
	      	$this->usermodel->update_data_pembayaran_kurban($data_pembayaran_kurban,$id);
	      	// Kembalikan ke halaman pembayaran kurban
	      	redirect('welcome/pembayaran_kurban');
	   	}
	}

	function delete_pembayaran_kurban() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id kurban dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_pembayaran_kurban($id);
	   	// Kembalikan ke halaman biaya pembayaran kurban
	   	redirect('welcome/pembayaran_kurban'); 
	}

	// Laporan

	function laporan() {
		// Mencegah user yang belum login untuk mengakses halaman ini
		$this->auth->restrict();
		// Mencegah user mengakses menu yang tidak boleh ia buka
		$this->auth->cek_menu(1);
		// Tampilkan isi laporan
		$this->template->set('title', 'Laporan | Sistem Informasi Pelayanan Haji & Umroh');
		$this->template->load('template_admin', 'admin/laporan');
	}

	// Pengeluaran Kantor

	function pengeluaran_kantor() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/pengeluaran_kantor";
        $config['total_rows']= $this->db->query("SELECT * FROM pengeluaran_kantor;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_pengeluaran_kantor']=$this->usermodel->get_pengeluaran_kantor($config);
        $data['jumlah_pengeluaran_kantor'] = $this->usermodel->jumlah_pengeluaran_kantor();
	   	$this->template->set('title','Pengeluaran Kantor | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_pengeluaran_kantor.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_pengeluaran_kantor',$data);
	}

	function search_pengeluaran_kantor() {
  		$keyword = $this->input->get('search_pengeluaran_kantor', TRUE); // Mengambil nilai dari form input cari
  		$data['pengeluaran_kantor'] = $this->usermodel->search_pengeluaran_kantor($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Pengeluaran Kantor | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_pengeluaran_kantor',$data); // Menampilkan data yang sudah dicari
	}

	function insert_pengeluaran_kantor() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_pengeluaran_kantor'] = $this->usermodel->kode_pengeluaran_kantor();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_pengeluaran', 'Id_Pengeluaran', 'trim|required');
	   	$this->form_validation->set_rules('nama_barang', 'Nama_Barang', 'trim|required');
	   	$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('tgl_pengeluaran', 'Tgl_Pengeluaran', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$this->template->set('title','Input Pengeluaran Kantor | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_pengeluaran_kantor',$data);
	   	} else {
	      	$data_pengeluaran_kantor = array(
	      		'id_pengeluaran' 	=>$this->input->post('id_pengeluaran'),
	         	'nama_barang' 		=>$this->input->post('nama_barang'),
	         	'jumlah' 			=>$this->input->post('jumlah'),
	         	'biaya' 			=>$this->input->post('biaya'),
	         	'tgl_pengeluaran' 	=>$this->input->post('tgl_pengeluaran'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_pengeluaran_kantor($data_pengeluaran_kantor);
	      	// Kembalikan ke halaman pengeluaran kantor
	      	redirect('welcome/pengeluaran_kantor');    
	   	}
	}

	function detail_pengeluaran_kantor() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data pengeluaran kantor yg akan diedit dari database
	    $data['pengeluaran_kantor'] = $this->usermodel->get_pengeluaran_kantor_by_id($id);
	    $this->template->set('title','Detail Pengeluaran Kantor | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_pengeluaran_kantor',$data);
	}

	function edit_pengeluaran_kantor() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('id_pengeluaran', 'Id_Pengeluaran', 'trim|required');
	   	$this->form_validation->set_rules('nama_barang', 'Nama_Barang', 'trim|required');
	   	$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('tgl_pengeluaran', 'Tgl_Pengeluaran', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	// Dapatkan data pengeluaran kantor yg akan diedit dari database
	      	$data['pengeluaran_kantor'] = $this->usermodel->get_pengeluaran_kantor_by_id($id);
	      	$this->template->set('title','Edit Pengeluaran Kantor | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_pengeluaran_kantor',$data);
	   	} else {
	      	$data_pengeluaran_kantor = array(
	      		'id_pengeluaran' 	=>$this->input->post('id_pengeluaran'),
	         	'nama_barang' 		=>$this->input->post('nama_barang'),
	         	'jumlah' 			=>$this->input->post('jumlah'),
	         	'biaya' 			=>$this->input->post('biaya'),
	         	'tgl_pengeluaran' 	=>$this->input->post('tgl_pengeluaran'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_pengeluaran_kantor($data_pengeluaran_kantor,$id);
	      	// Kembalikan ke halaman pengeluaran kantor
	      	redirect('welcome/pengeluaran_kantor');
	   	}
	}

	function delete_pengeluaran_kantor() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id peserta dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_pengeluaran_kantor($id);
	   	// Kembalikan ke halaman pengeluaran kantor
	   	redirect('welcome/pengeluaran_kantor'); 
	}

	// Pengeluaran Operasional

	function pengeluaran_operasional() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/pengeluaran_operasional";
        $config['total_rows']= $this->db->query("SELECT * FROM pengeluaran_operasional;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_pengeluaran_operasional']=$this->usermodel->get_pengeluaran_operasional($config);
        $data['jumlah_pengeluaran_operasional'] = $this->usermodel->jumlah_pengeluaran_operasional();
	   	$this->template->set('title','Pengeluaran Operasional | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_pengeluaran_operasional.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_pengeluaran_operasional',$data);
	}

	function search_pengeluaran_operasional() {
  		$keyword = $this->input->get('search_pengeluaran_operasional', TRUE); // Mengambil nilai dari form input cari
  		$data['pengeluaran_operasional'] = $this->usermodel->search_pengeluaran_operasional($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Pengeluaran Operasional | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_pengeluaran_operasional',$data); // Menampilkan data yang sudah dicari
	}

	function insert_pengeluaran_operasional() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_pengeluaran_operasional'] = $this->usermodel->kode_pengeluaran_operasional();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('id_pengeluaran', 'Id_Pengeluaran', 'trim|required');
	   	$this->form_validation->set_rules('nama_operasional', 'Nama_Operasional', 'trim|required');
	   	$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('tgl_pengeluaran', 'Tgl_Pengeluaran', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$this->template->set('title','Input Pengeluaran Operasional | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_pengeluaran_operasional',$data);
	   	} else {
	      	$data_pengeluaran_operasional = array(
	      		'id_pengeluaran' 	=>$this->input->post('id_pengeluaran'),
	         	'nama_operasional' 	=>$this->input->post('nama_operasional'),
	         	'jumlah' 			=>$this->input->post('jumlah'),
	         	'biaya' 			=>$this->input->post('biaya'),
	         	'tgl_pengeluaran' 	=>$this->input->post('tgl_pengeluaran'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->insert_data_pengeluaran_operasional($data_pengeluaran_operasional);
	      	// Kembalikan ke halaman pengeluaran operasional
	      	redirect('welcome/pengeluaran_operasional');    
	   	}
	}

	function detail_pengeluaran_operasional() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data pengeluaran operasional yg akan diedit dari database
	    $data['pengeluaran_operasional'] = $this->usermodel->get_pengeluaran_operasional_by_id($id);
	    $this->template->set('title','Detail Pengeluaran Operasional | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_pengeluaran_operasional',$data);
	}

	function edit_pengeluaran_operasional() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('id_pengeluaran', 'Id_Pengeluaran', 'trim|required');
	   	$this->form_validation->set_rules('nama_operasional', 'Nama_Operasional', 'trim|required');
	   	$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
	   	$this->form_validation->set_rules('biaya', 'Biaya', 'trim|required');
	   	$this->form_validation->set_rules('tgl_pengeluaran', 'Tgl_Pengeluaran', 'trim|required');
	   	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	// Dapatkan data pengeluaran operasional yg akan diedit dari database
	      	$data['pengeluaran_operasional'] = $this->usermodel->get_pengeluaran_operasional_by_id($id);
	      	$this->template->set('title','Edit Pengeluaran Operasional | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_pengeluaran_operasional',$data);
	   	} else {
	      	$data_pengeluaran_operasional = array(
	      		'id_pengeluaran' 	=>$this->input->post('id_pengeluaran'),
	         	'nama_operasional' 	=>$this->input->post('nama_operasional'),
	         	'jumlah' 			=>$this->input->post('jumlah'),
	         	'biaya' 			=>$this->input->post('biaya'),
	         	'tgl_pengeluaran' 	=>$this->input->post('tgl_pengeluaran'),
	         	'keterangan' 		=>$this->input->post('keterangan')
	      	);
	      	$this->usermodel->update_data_pengeluaran_operasional($data_pengeluaran_operasional,$id);
	      	// Kembalikan ke halaman pengeluaran operasional
	      	redirect('welcome/pengeluaran_operasional');
	   	}
	}

	function delete_pengeluaran_operasional() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id peserta dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_pengeluaran_operasional($id);
	   	// Kembalikan ke halaman pengeluaran operasional
	   	redirect('welcome/pengeluaran_operasional'); 
	}

	// Laporan Pendaftaran Haji

	function laporan_pendaftaran_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_pendaftaran_haji']=$this->usermodel->get_laporan_pendaftaran_haji();
	   	$this->template->set('title','Laporan Pendaftaran Haji | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pendaftaran_haji.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_pendaftaran_haji',$data);
	}

	// Print Pendaftaran Haji

	function print_pendaftaran_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_pendaftaran_haji']=$this->usermodel->get_print_pendaftaran_haji();
	   	$this->template->set('title','Laporan Pendaftaran Haji | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pendaftaran_haji.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_pendaftaran_haji',$data);
	}

	// Export Excel Pendaftaran Haji

	function export_excel_pendaftaran_haji(){
 		$data = array(	'title' => 'Export To Excel',
 						'pendaftaran_haji' => $this->usermodel->listing_pendaftaran_haji());
 		$this->load->view('admin/export_pendaftaran_haji',$data);
 	}

	// Laporan Pendaftaran Umroh

	function laporan_pendaftaran_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_pendaftaran_umroh']=$this->usermodel->get_laporan_pendaftaran_umroh();
	   	$this->template->set('title','Laporan Pendaftaran Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pendaftaran_umroh.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_pendaftaran_umroh',$data);
	}

	// Print Pendaftaran Umroh

	function print_pendaftaran_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_pendaftaran_umroh']=$this->usermodel->get_print_pendaftaran_umroh();
	   	$this->template->set('title','Laporan Pendaftaran Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pendaftaran_umroh.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_pendaftaran_umroh',$data);
	}

	// Export Excel Pendaftaran Umroh

	function export_excel_pendaftaran_umroh(){
 		$data = array(	'title' => 'Export To Excel',
 						'pendaftaran_umroh' => $this->usermodel->listing_pendaftaran_umroh());
 		$this->load->view('admin/export_pendaftaran_umroh',$data);
 	}

 	// Laporan Pendaftaran Bimbingan Manasik

	function laporan_pendaftaran_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_pendaftaran_bimsik']=$this->usermodel->get_laporan_pendaftaran_bimsik();
	   	$this->template->set('title','Laporan Pendaftaran Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pendaftaran_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_pendaftaran_bimsik',$data);
	}

	// Print Pendaftaran Bimbingan Manasik

	function print_pendaftaran_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_pendaftaran_bimsik']=$this->usermodel->get_print_pendaftaran_bimsik();
	   	$this->template->set('title','Laporan Pendaftaran Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pendaftaran_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_pendaftaran_bimsik',$data);
	}

	// Export Excel Pendaftaran Bimbingan Manasik

	function export_excel_pendaftaran_bimsik(){
 		$data = array(	'title' => 'Export To Excel',
 						'pendaftaran_bimsik' => $this->usermodel->listing_pendaftaran_bimsik());
 		$this->load->view('admin/export_pendaftaran_bimsik',$data);
 	}

 	// Laporan Paket Haji Plus

	function laporan_paket_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_paket_haji_plus']=$this->usermodel->get_laporan_paket_haji_plus();
	   	$this->template->set('title','Laporan Paket Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_paket_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_paket_haji_plus',$data);
	}

	// Print Paket Haji Plus

	function print_paket_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_paket_haji_plus']=$this->usermodel->get_print_paket_haji_plus();
	   	$this->template->set('title','Laporan Paket Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_paket_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_paket_haji_plus',$data);
	}

	// Export Excel Paket Haji Plus

	function export_excel_paket_haji_plus(){
 		$data = array(	'title' => 'Export To Excel',
 						'paket_haji_plus' => $this->usermodel->listing_paket_haji_plus());
 		$this->load->view('admin/export_paket_haji_plus',$data);
 	}

 	// Laporan Haji Plus

	function laporan_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_haji_plus']=$this->usermodel->get_laporan_haji_plus();
	   	$this->template->set('title','Laporan Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_haji_plus',$data);
	}

	// Print Haji Plus

	function print_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_haji_plus']=$this->usermodel->get_print_haji_plus();
	   	$this->template->set('title','Laporan Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_haji_plus',$data);
	}

	// Export Excel Haji Plus

	function export_excel_haji_plus(){
 		$data = array(	'title' => 'Export To Excel',
 						'haji_plus' => $this->usermodel->listing_haji_plus());
 		$this->load->view('admin/export_haji_plus',$data);
 	}

 	// Laporan Paspor Haji Plus

	function laporan_paspor_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_paspor_haji_plus']=$this->usermodel->get_laporan_paspor_haji_plus();
	   	$this->template->set('title','Laporan Paspor Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_paspor_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_paspor_haji_plus',$data);
	}

	// Print Paspor Haji Plus

	function print_paspor_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_paspor_haji_plus']=$this->usermodel->get_print_paspor_haji_plus();
	   	$this->template->set('title','Laporan Paspor Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_paspor_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_paspor_haji_plus',$data);
	}

	// Export Excel Paspor Haji Plus

	function export_excel_paspor_haji_plus(){
 		$data = array(	'title' => 'Export To Excel',
 						'paspor_haji_plus' => $this->usermodel->listing_paspor_haji_plus());
 		$this->load->view('admin/export_paspor_haji_plus',$data);
 	}

 	// Laporan Pembayaran Haji Plus

	function laporan_pembayaran_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_pembayaran_haji_plus']=$this->usermodel->get_laporan_pembayaran_haji_plus();
	   	$this->template->set('title','Laporan Pembayaran Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pembayaran_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_pembayaran_haji_plus',$data);
	}

	// Print Pembayaran Haji Plus

	function print_pembayaran_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_pembayaran_haji_plus']=$this->usermodel->get_print_pembayaran_haji_plus();
	   	$this->template->set('title','Laporan Pembayaran Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pembayaran_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_pembayaran_haji_plus',$data);
	}

	// Export Excel Pembayaran Haji Plus

	function export_excel_pembayaran_haji_plus(){
 		$data = array(	'title' => 'Export To Excel',
 						'pembayaran_haji_plus' => $this->usermodel->listing_pembayaran_haji_plus());
 		$this->load->view('admin/export_pembayaran_haji_plus',$data);
 	}

 	// Laporan Pembayaran Paspor Haji Plus

	function laporan_pembayaran_paspor_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_pembayaran_paspor_haji_plus']=$this->usermodel->get_laporan_pembayaran_paspor_haji_plus();
	   	$this->template->set('title','Laporan Pembayaran Paspor Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pembayaran_paspor_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_pembayaran_paspor_haji_plus',$data);
	}

	// Print Pembayaran Paspor Haji Plus

	function print_pembayaran_paspor_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_pembayaran_paspor_haji_plus']=$this->usermodel->get_print_pembayaran_paspor_haji_plus();
	   	$this->template->set('title','Laporan Pembayaran Paspor Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pembayaran_paspor_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_pembayaran_paspor_haji_plus',$data);
	}

	// Export Excel Pembayaran Paspor Haji Plus

	function export_excel_pembayaran_paspor_haji_plus(){
 		$data = array(	'title' => 'Export To Excel',
 						'pembayaran_paspor_haji_plus' => $this->usermodel->listing_pembayaran_paspor_haji_plus());
 		$this->load->view('admin/export_pembayaran_paspor_haji_plus',$data);
 	}

 	// Laporan Pembayaran Hadyu & Tarwiyah Haji Plus

	function laporan_hadyu_tarwiyah_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_hadyu_tarwiyah_haji_plus']=$this->usermodel->get_laporan_hadyu_tarwiyah_haji_plus();
	   	$this->template->set('title','Laporan Pembayaran Hadyu & Tarwiyah Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pembayaran_hadyu_tarwiyah_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_hadyu_tarwiyah_haji_plus',$data);
	}

	// Print Pembayaran Hadyu & Tarwiyah Haji Plus

	function print_hadyu_tarwiyah_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_hadyu_tarwiyah_haji_plus']=$this->usermodel->get_print_hadyu_tarwiyah_haji_plus();
	   	$this->template->set('title','Laporan Pembayaran Hadyu & Tarwiyah Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pembayaran_hadyu_tarwiyah_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_hadyu_tarwiyah_haji_plus',$data);
	}

	// Export Excel Pembayaran Hadyu & Tarwiyah Haji Plus

	function export_excel_hadyu_tarwiyah_haji_plus(){
 		$data = array(	'title' => 'Export To Excel',
 						'hadyu_tarwiyah_haji_plus' => $this->usermodel->listing_hadyu_tarwiyah_haji_plus());
 		$this->load->view('admin/export_hadyu_tarwiyah_haji_plus',$data);
 	}

 	// Laporan Pembatalan Haji Plus

	function laporan_pembatalan_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_pembatalan_haji_plus']=$this->usermodel->get_laporan_pembatalan_haji_plus();
	   	$this->template->set('title','Laporan Pembatalan Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pembatalan_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_pembatalan_haji_plus',$data);
	}

	// Print Pembatalan Haji Plus

	function print_pembatalan_haji_plus() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_pembatalan_haji_plus']=$this->usermodel->get_print_pembatalan_haji_plus();
	   	$this->template->set('title','Laporan Pembatalan Haji Plus | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pembatalan_haji_plus.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_pembatalan_haji_plus',$data);
	}

	// Export Excel Pembatalan Haji Plus

	function export_excel_pembatalan_haji_plus(){
 		$data = array(	'title' => 'Export To Excel',
 						'pembatalan_haji_plus' => $this->usermodel->listing_pembatalan_haji_plus());
 		$this->load->view('admin/export_pembatalan_haji_plus',$data);
 	}

 	// Laporan Paket Umroh

	function laporan_paket_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_paket_umroh']=$this->usermodel->get_laporan_paket_umroh();
	   	$this->template->set('title','Laporan Paket Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_paket_umroh.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_paket_umroh',$data);
	}

	// Print Paket Umroh

	function print_paket_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_paket_umroh']=$this->usermodel->get_print_paket_umroh();
	   	$this->template->set('title','Laporan Paket Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_paket_umroh.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_paket_umroh',$data);
	}

	// Export Excel Paket Umroh

	function export_excel_paket_umroh(){
 		$data = array(	'title' => 'Export To Excel',
 						'paket_umroh' => $this->usermodel->listing_paket_umroh());
 		$this->load->view('admin/export_paket_umroh',$data);
 	}

 	// Laporan Umroh

	function laporan_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_umroh']=$this->usermodel->get_laporan_umroh();
	   	$this->template->set('title','Laporan Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_umroh.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_umroh',$data);
	}

	// Print Umroh

	function print_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_umroh']=$this->usermodel->get_print_umroh();
	   	$this->template->set('title','Laporan Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_umroh.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_umroh',$data);
	}

	// Export Excel Umroh

	function export_excel_umroh(){
 		$data = array(	'title' => 'Export To Excel',
 						'umroh' => $this->usermodel->listing_umroh());
 		$this->load->view('admin/export_umroh',$data);
 	}

 	// Laporan Paspor Umroh

	function laporan_paspor_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_paspor_umroh']=$this->usermodel->get_laporan_paspor_umroh();
	   	$this->template->set('title','Laporan Paspor Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_paspor_umroh.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_paspor_umroh',$data);
	}

	// Print Paspor Umroh

	function print_paspor_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_paspor_umroh']=$this->usermodel->get_print_paspor_umroh();
	   	$this->template->set('title','Laporan Paspor Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_paspor_umroh.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_paspor_umroh',$data);
	}

	// Export Excel Paspor Umroh

	function export_excel_paspor_umroh(){
 		$data = array(	'title' => 'Export To Excel',
 						'paspor_umroh' => $this->usermodel->listing_paspor_umroh());
 		$this->load->view('admin/export_paspor_umroh',$data);
 	}

 	// Laporan Pembayaran Umroh

	function laporan_pembayaran_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_pembayaran_umroh']=$this->usermodel->get_laporan_pembayaran_umroh();
	   	$this->template->set('title','Laporan Pembayaran Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pembayaran_umroh.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_pembayaran_umroh',$data);
	}

	// Print Pembayaran Umroh

	function print_pembayaran_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_pembayaran_umroh']=$this->usermodel->get_print_pembayaran_umroh();
	   	$this->template->set('title','Laporan Pembayaran Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pembayaran_umroh.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_pembayaran_umroh',$data);
	}

	// Export Excel Pembayaran Umroh

	function export_excel_pembayaran_umroh(){
 		$data = array(	'title' => 'Export To Excel',
 						'pembayaran_umroh' => $this->usermodel->listing_pembayaran_umroh());
 		$this->load->view('admin/export_pembayaran_umroh',$data);
 	}

 	// Laporan Pembayaran Paspor Umroh

	function laporan_pembayaran_paspor_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_pembayaran_paspor_umroh']=$this->usermodel->get_laporan_pembayaran_paspor_umroh();
	   	$this->template->set('title','Laporan Pembayaran Paspor Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pembayaran_paspor_umroh.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_pembayaran_paspor_umroh',$data);
	}

	// Print Pembayaran Paspor Umroh

	function print_pembayaran_paspor_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_pembayaran_paspor_umroh']=$this->usermodel->get_print_pembayaran_paspor_umroh();
	   	$this->template->set('title','Laporan Pembayaran Paspor Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pembayaran_paspor_umroh.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_pembayaran_paspor_umroh',$data);
	}

	// Export Excel Pembayaran Paspor Umroh

	function export_excel_pembayaran_paspor_umroh(){
 		$data = array(	'title' => 'Export To Excel',
 						'pembayaran_paspor_umroh' => $this->usermodel->listing_pembayaran_paspor_umroh());
 		$this->load->view('admin/export_pembayaran_paspor_umroh',$data);
 	}

 	// Laporan Pembatalan Umroh

	function laporan_pembatalan_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_pembatalan_umroh']=$this->usermodel->get_laporan_pembatalan_umroh();
	   	$this->template->set('title','Laporan Pembatalan Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pembatalan_umroh.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_pembatalan_umroh',$data);
	}

	// Print Pembatalan Umroh

	function print_pembatalan_umroh() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_pembatalan_umroh']=$this->usermodel->get_print_pembatalan_umroh();
	   	$this->template->set('title','Laporan Pembatalan Umroh | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pembatalan_umroh.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_pembatalan_umroh',$data);
	}

	// Export Excel Pembatalan Umroh

	function export_excel_pembatalan_umroh(){
 		$data = array(	'title' => 'Export To Excel',
 						'pembatalan_umroh' => $this->usermodel->listing_pembatalan_umroh());
 		$this->load->view('admin/export_pembatalan_umroh',$data);
 	}

 	// Laporan Bimbingan Manasik

	function laporan_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_bimsik']=$this->usermodel->get_laporan_bimsik();
	   	$this->template->set('title','Laporan Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_bimsik',$data);
	}

	// Print Bimbingan Manasik

	function print_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_bimsik']=$this->usermodel->get_print_bimsik();
	   	$this->template->set('title','Laporan Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_bimsik',$data);
	}

	// Export Excel Bimbingan Manasik

	function export_excel_bimsik(){
 		$data = array(	'title' => 'Export To Excel',
 						'bimsik' => $this->usermodel->listing_bimsik());
 		$this->load->view('admin/export_bimsik',$data);
 	}

 	// Laporan Paspor Bimbingan Manasik

	function laporan_paspor_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_paspor_bimsik']=$this->usermodel->get_laporan_paspor_bimsik();
	   	$this->template->set('title','Laporan Paspor Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_paspor_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_paspor_bimsik',$data);
	}

	// Print Paspor Bimbingan Manasik

	function print_paspor_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_paspor_bimsik']=$this->usermodel->get_print_paspor_bimsik();
	   	$this->template->set('title','Laporan Paspor Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_paspor_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_paspor_bimsik',$data);
	}

	// Export Excel Paspor Bimbingan Manasik

	function export_excel_paspor_bimsik(){
 		$data = array(	'title' => 'Export To Excel',
 						'paspor_bimsik' => $this->usermodel->listing_paspor_bimsik());
 		$this->load->view('admin/export_paspor_bimsik',$data);
 	}

 	// Laporan Pembayaran Bimbingan Manasik

	function laporan_pembayaran_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_pembayaran_bimsik']=$this->usermodel->get_laporan_pembayaran_bimsik();
	   	$this->template->set('title','Laporan Pembayaran Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pembayaran_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_pembayaran_bimsik',$data);
	}

	// Print Pembayaran Bimbingan Manasik

	function print_pembayaran_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_pembayaran_bimsik']=$this->usermodel->get_print_pembayaran_bimsik();
	   	$this->template->set('title','Laporan Pembayaran Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pembayaran_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_pembayaran_bimsik',$data);
	}

	// Export Excel Pembayaran Bimbingan Manasik

	function export_excel_pembayaran_bimsik(){
 		$data = array(	'title' => 'Export To Excel',
 						'pembayaran_bimsik' => $this->usermodel->listing_pembayaran_bimsik());
 		$this->load->view('admin/export_pembayaran_bimsik',$data);
 	}

 	// Laporan Pembayaran Paspor Bimbingan Manasik

	function laporan_pembayaran_paspor_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_pembayaran_paspor_bimsik']=$this->usermodel->get_laporan_pembayaran_paspor_bimsik();
	   	$this->template->set('title','Laporan Pembayaran Paspor Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pembayaran_paspor_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_pembayaran_paspor_bimsik',$data);
	}

	// Print Pembayaran Paspor Bimbingan Manasik

	function print_pembayaran_paspor_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_pembayaran_paspor_bimsik']=$this->usermodel->get_print_pembayaran_paspor_bimsik();
	   	$this->template->set('title','Laporan Pembayaran Paspor Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pembayaran_paspor_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_pembayaran_paspor_bimsik',$data);
	}

	// Export Excel Pembayaran Paspor Bimbingan Manasik

	function export_excel_pembayaran_paspor_bimsik(){
 		$data = array(	'title' => 'Export To Excel',
 						'pembayaran_paspor_bimsik' => $this->usermodel->listing_pembayaran_paspor_bimsik());
 		$this->load->view('admin/export_pembayaran_paspor_bimsik',$data);
 	}

 	// Laporan Pembayaran Hadyu & Tarwiyah Bimbingan Manasik

	function laporan_hadyu_tarwiyah_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_hadyu_tarwiyah_bimsik']=$this->usermodel->get_laporan_hadyu_tarwiyah_bimsik();
	   	$this->template->set('title','Laporan Pembayaran Hadyu & Tarwiyah Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pembayaran_hadyu_tarwiyah_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_hadyu_tarwiyah_bimsik',$data);
	}

	// Print Pembayaran Hadyu & Tarwiyah Bimbingan Manasik

	function print_hadyu_tarwiyah_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_hadyu_tarwiyah_bimsik']=$this->usermodel->get_print_hadyu_tarwiyah_bimsik();
	   	$this->template->set('title','Laporan Pembayaran Hadyu & Tarwiyah Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pembayaran_hadyu_tarwiyah_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_hadyu_tarwiyah_bimsik',$data);
	}

	// Export Excel Pembayaran Hadyu & Tarwiyah Bimbingan Manasik

	function export_excel_hadyu_tarwiyah_bimsik(){
 		$data = array(	'title' => 'Export To Excel',
 						'hadyu_tarwiyah_bimsik' => $this->usermodel->listing_hadyu_tarwiyah_bimsik());
 		$this->load->view('admin/export_hadyu_tarwiyah_bimsik',$data);
 	}

 	// Laporan Pembatalan Bimbingan Manasik

	function laporan_pembatalan_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_pembatalan_bimsik']=$this->usermodel->get_laporan_pembatalan_bimsik();
	   	$this->template->set('title','Laporan Pembatalan Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pembatalan_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_pembatalan_bimsik',$data);
	}

	// Print Pembatalan Bimbingan Manasik

	function print_pembatalan_bimsik() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_pembatalan_bimsik']=$this->usermodel->get_print_pembatalan_bimsik();
	   	$this->template->set('title','Laporan Pembatalan Bimbingan Manasik | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pembatalan_bimsik.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_pembatalan_bimsik',$data);
	}

	// Export Excel Pembatalan Bimbingan Manasik

	function export_excel_pembatalan_bimsik(){
 		$data = array(	'title' => 'Export To Excel',
 						'pembatalan_bimsik' => $this->usermodel->listing_pembatalan_bimsik());
 		$this->load->view('admin/export_pembatalan_bimsik',$data);
 	}

 	// Laporan Badal Haji

	function laporan_badal_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_badal_haji']=$this->usermodel->get_laporan_badal_haji();
	   	$this->template->set('title','Laporan Badal Haji | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_badal_haji.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_badal_haji',$data);
	}

	// Print Badal Haji

	function print_badal_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_badal_haji']=$this->usermodel->get_print_badal_haji();
	   	$this->template->set('title','Laporan Badal Haji | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_badal_haji.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_badal_haji',$data);
	}

	// Export Excel Badal Haji

	function export_excel_badal_haji(){
 		$data = array(	'title' => 'Export To Excel',
 						'badal_haji' => $this->usermodel->listing_badal_haji());
 		$this->load->view('admin/export_badal_haji',$data);
 	}

 	// Laporan Pembayaran Badal Haji

	function laporan_pembayaran_badal_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_pembayaran_badal_haji']=$this->usermodel->get_laporan_pembayaran_badal_haji();
	   	$this->template->set('title','Laporan Pembayaran Badal Haji | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pembayaran_badal_haji.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_pembayaran_badal_haji',$data);
	}

	// Print Pembayaran Badal Haji

	function print_pembayaran_badal_haji() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_pembayaran_badal_haji']=$this->usermodel->get_print_pembayaran_badal_haji();
	   	$this->template->set('title','Laporan Pembayaran Badal Haji | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pembayaran_badal_haji.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_pembayaran_badal_haji',$data);
	}

	// Export Excel Pembayaran Badal Haji

	function export_excel_pembayaran_badal_haji(){
 		$data = array(	'title' => 'Export To Excel',
 						'pembayaran_badal_haji' => $this->usermodel->listing_pembayaran_badal_haji());
 		$this->load->view('admin/export_pembayaran_badal_haji',$data);
 	}

 	// Laporan Kurban

	function laporan_kurban() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_kurban']=$this->usermodel->get_laporan_kurban();
	   	$this->template->set('title','Laporan Kurban | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_kurban.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_kurban',$data);
	}

	// Print Kurban

	function print_kurban() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_kurban']=$this->usermodel->get_print_kurban();
	   	$this->template->set('title','Laporan Kurban | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_kurban.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_kurban',$data);
	}

	// Export Excel Kurban

	function export_excel_kurban(){
 		$data = array(	'title' => 'Export To Excel',
 						'kurban' => $this->usermodel->listing_kurban());
 		$this->load->view('admin/export_kurban',$data);
 	}

 	// Laporan Pembayaran Kurban

	function laporan_pembayaran_kurban() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_pembayaran_kurban']=$this->usermodel->get_laporan_pembayaran_kurban();
	   	$this->template->set('title','Laporan Pembayaran Kurban | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pembayaran_kurban.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_pembayaran_kurban',$data);
	}

	// Print Pembayaran Kurban

	function print_pembayaran_kurban() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_pembayaran_kurban']=$this->usermodel->get_print_pembayaran_kurban();
	   	$this->template->set('title','Laporan Pembayaran Kurban | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pembayaran_kurban.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_pembayaran_kurban',$data);
	}

	// Export Excel Pembayaran Kurban

	function export_excel_pembayaran_kurban(){
 		$data = array(	'title' => 'Export To Excel',
 						'pembayaran_kurban' => $this->usermodel->listing_pembayaran_kurban());
 		$this->load->view('admin/export_pembayaran_kurban',$data);
 	}

 	// Laporan Pengeluaran Kantor

	function laporan_pengeluaran_kantor() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_pengeluaran_kantor']=$this->usermodel->get_laporan_pengeluaran_kantor();
	   	$this->template->set('title','Laporan Pengeluaran Kantor | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pengeluaran_kantor.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_pengeluaran_kantor',$data);
	}

	// Print Pengeluaran Kantor

	function print_pengeluaran_kantor() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_pengeluaran_kantor']=$this->usermodel->get_print_pengeluaran_kantor();
	   	$this->template->set('title','Laporan Pengeluaran Kantor | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pengeluaran_kantor.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_pengeluaran_kantor',$data);
	}

	// Export Excel Pengeluaran Kantor

	function export_excel_pengeluaran_kantor(){
 		$data = array(	'title' => 'Export To Excel',
 						'pengeluaran_kantor' => $this->usermodel->listing_pengeluaran_kantor());
 		$this->load->view('admin/export_pengeluaran_kantor',$data);
 	}

 	// Laporan Pengeluaran Operasional

	function laporan_pengeluaran_operasional() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['laporan_pengeluaran_operasional']=$this->usermodel->get_laporan_pengeluaran_operasional();
	   	$this->template->set('title','Laporan Pengeluaran Operasional | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view laporan_pengeluaran_operasional.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/laporan_pengeluaran_operasional',$data);
	}

	// Print Pengeluaran Operasional

	function print_pengeluaran_operasional() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['print_pengeluaran_operasional']=$this->usermodel->get_print_pengeluaran_operasional();
	   	$this->template->set('title','Laporan Pengeluaran Operasional | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view print_pengeluaran_operasional.php di folder application/views/admin/
	   	$this->template->load('template_laporan', 'admin/print_pengeluaran_operasional',$data);
	}

	// Export Excel Pengeluaran Operasional

	function export_excel_pengeluaran_operasional(){
 		$data = array(	'title' => 'Export To Excel',
 						'pengeluaran_operasional' => $this->usermodel->listing_pengeluaran_operasional());
 		$this->load->view('admin/export_pengeluaran_operasional',$data);
 	}

	// Manajemen User

	function manajemen_user() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	// Konfigurasi class pagination
        $config['base_url']=base_url()."index.php/welcome/manajemen_user";
        $config['total_rows']= $this->db->query("SELECT * FROM user;")->num_rows();
        $config['per_page']=10;
        $config['num_links']=2;
        $config['uri_segment']=3;

        // Tambahan untuk styling
       	$config['query_string_segment'] = 'start';
 
		$config['full_tag_open'] = '<nav><ul class="pagination" style="margin-top:0px">';
		$config['full_tag_close'] = '</ul></nav>';
		 
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		 
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		 
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		 
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		 
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		 
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
 
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('usermodel');
        $data['data_user']=$this->usermodel->get_user($config);
        $data['jumlah_user'] = $this->usermodel->jumlah_user();
	   	$this->template->set('title','Manajemen User | Sistem Informasi Pelayanan Haji & Umroh');
	   	// Load view tabel_user.php di folder application/views/admin/
	   	$this->template->load('template_admin', 'admin/tabel_user',$data);
	}

	function search_user() {
  		$keyword = $this->input->get('search_user', TRUE); // Mengambil nilai dari form input cari
  		$data['user'] = $this->usermodel->search_user($keyword); // Mencari data berdasarkan inputan
  		$this->template->set('title','Manajemen User | Sistem Informasi Pelayanan Haji & Umroh');
  		$this->template->load('template_admin', 'admin/search_user',$data); // Menampilkan data yang sudah dicari
	}

	function insert_user() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);

	   	$data['kode_user'] = $this->usermodel->kode_user();
	    
	   	$this->load->library('form_validation');
	    
	   	$this->form_validation->set_rules('user_id', 'User_Id', 'trim|required');
	   	$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	   	$this->form_validation->set_rules('username', 'Username', 'trim|required');
	   	$this->form_validation->set_rules('password', 'Password', 'trim|required');
	   	$this->form_validation->set_rules('password_conf', 'Password Confirmation', 'trim|required|matches[password]');
	   	$this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('level', 'Level', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	 
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['level'] = $this->usermodel->get_all_level();
	      	$this->template->set('title','Input User | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin', 'admin/form_input_user',$data);
	   	} else {
	      	$data_user = array(
	      		'user_id' 				=>$this->input->post('user_id'),
	         	'user_nama' 			=>$this->input->post('nama'),
	         	'user_username' 		=>$this->input->post('username'),
	         	'user_password' 		=>md5($this->input->post('password')),
	         	'user_tempat_lahir' 	=>$this->input->post('tempat_lahir'),
	         	'user_tgl_lahir' 		=>$this->input->post('tgl_lahir'),
	         	'user_jenis_kelamin'	=>$this->input->post('jenis_kelamin'),
	         	'user_no_telepon' 		=>$this->input->post('no_telepon'),
	         	'user_level' 			=>$this->input->post('level')
	      	);
	      	$this->usermodel->insert_data_user($data_user);
	      	// Kembalikan ke halaman manajemen user
	      	redirect('welcome/manajemen_user');    
	   	}
	}

	function detail_user() {
	    // Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$data['level'] = $this->usermodel->get_all_level();
	    // Dapatkan data user yg akan diedit dari database
	    $data['user'] = $this->usermodel->get_user_by_id($id);
	    $this->template->set('title','Detail User | Sistem Informasi Pelayanan Haji & Umroh');
	    $this->template->load('template_admin','admin/detail_user',$data);
	}

	function edit_user() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	    
	   	$this->load->library('form_validation');
	    
	    $this->form_validation->set_rules('user_id', 'User_Id', 'trim|required');
	   	$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	   	$this->form_validation->set_rules('username', 'Username', 'trim|required');
	   	$this->form_validation->set_rules('password', 'Password', 'trim|required');
	   	$this->form_validation->set_rules('password_conf', 'Password Confirmation', 'trim|required|matches[password]');
	   	$this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'trim|required');
	   	$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'trim|required');
	   	$this->form_validation->set_rules('no_telepon', 'No_Telepon', 'trim|required');
	   	$this->form_validation->set_rules('level', 'Level', 'trim|required');
	    
	   	$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
	    
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	    
	   	if ($this->form_validation->run() == FALSE) {
	      	$data['level'] = $this->usermodel->get_all_level();
	      	// Dapatkan data user yg akan diedit dari database
	      	$data['user'] = $this->usermodel->get_user_by_id($id);
	      	$this->template->set('title','Edit User | Sistem Informasi Pelayanan Haji & Umroh');
	      	$this->template->load('template_admin','admin/form_edit_user',$data);
	   	} else {
	      	$data_user = array(
	      		'user_id' 				=>$this->input->post('user_id'),
	         	'user_nama' 			=>$this->input->post('nama'),
	         	'user_username' 		=>$this->input->post('username'),
	         	'user_password' 		=>md5($this->input->post('password')),
	         	'user_tempat_lahir' 	=>$this->input->post('tempat_lahir'),
	         	'user_tgl_lahir' 		=>$this->input->post('tgl_lahir'),
	         	'user_jenis_kelamin'	=>$this->input->post('jenis_kelamin'),
	         	'user_no_telepon' 		=>$this->input->post('no_telepon'),
	         	'user_level' 			=>$this->input->post('level')
	      	);
	      	$this->usermodel->update_data_user($data_user,$id);
	      	// Kembalikan ke halaman manajemen user
	      	redirect('welcome/manajemen_user');    
	   	}
	}

	function delete_user() {
	   	// Mencegah user yang belum login untuk mengakses halaman ini
	   	$this->auth->restrict();
	   	// Mencegah user mengakses menu yang tidak boleh ia buka
	   	$this->auth->cek_menu(2);
	   	// Dapatkan id user dari segment ke-3 dari URI
	   	$id = $this->uri->segment(3);
	   	$this->usermodel->delete_user($id);
	   	// Kembalikan ke halaman manajemen user
	   	redirect('welcome/manajemen_user'); 
	}

	// Help

	function help() {
		// Mencegah user yang belum login untuk mengakses halaman ini
		$this->auth->restrict();
		// Mencegah user mengakses menu yang tidak boleh ia buka
		$this->auth->cek_menu(1);
		// Tampilkan isi help
		$this->template->set('title', 'Help | Sistem Informasi Pelayanan Haji & Umroh');
		$this->template->load('template_admin', 'admin/help');
	}

	// Login

	public function login() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');
		if ($this->form_validation->run() == FALSE) {
			$this->template->set('title', 'Login Form | Sistem Informasi Pelayanan Haji & Umroh');
			$this->template->load('template_login', 'admin/login_form');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$success = $this->auth->do_login($username, $password);
				if ($success) {
					// Lemparkan ke halaman index user
					redirect('welcome/index');
				} else {
					$this->template->set('title', 'Login Form | Sistem Informasi Pelayanan Haji & Umroh');
					$data['login_info'] = "Maaf, Username atau Password salah !!!";
					$this->template->load('template_login', 'admin/login_form', $data);
				}
		}
	}

	// Logout

	function logout() {
		if ($this->auth->is_logged_in() == true) {
			// Jika dia memang sudah login, destroy session
			$this->auth->do_logout();
		}
		// Larikan ke halaman utama
		redirect('welcome');
	}
}