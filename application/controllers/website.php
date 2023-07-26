<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Website extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->database();
		$this->load->model('webmodel');
	}

	// Index

	public function index() {
		$this->template->set('title', 'Welcome | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/beranda');
	}

	// Beranda

	function beranda() {
		$this->template->set('title', 'Beranda | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/beranda');
	}

	// Tentang Kami

	function tentang_kami() {
		$this->template->set('title', 'Tentang Kami | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/tentang_kami');
	}

	// Profil

	function profil() {
		$this->template->set('title', 'Profil | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/profil');
	}

	// Visi & Misi

	function visi_misi() {
		$this->template->set('title', 'Visi & Misi | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/visi_misi');
	}

	// Struktur Organisasi

	function struktur_organisasi() {
		$this->template->set('title', 'Struktur Organisasi | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/struktur_organisasi');
	}

	// Berita

	function berita() {
		$this->template->set('title', 'Berita | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/berita');
	}

	// Umroh

	function umroh() {
		$this->template->set('title', 'Umroh | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/umroh');
	}

	// Umroh Hemat

	function umroh_hemat() {
		$this->template->set('title', 'Umroh Hemat | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/umroh_hemat');
	}

	// Umroh Reguler

	function umroh_reguler() {
		$this->template->set('title', 'Umroh Reguler | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/umroh_reguler');
	}

	// Umroh VIP

	function umroh_vip() {
		$this->template->set('title', 'Umroh VIP | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/umroh_vip');
	}

	// Umroh Ramadhan

	function umroh_ramadhan() {
		$this->template->set('title', 'Umroh Ramadhan | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/umroh_ramadhan');
	}

	// Umroh Plus Turki

	function umroh_plus_turki() {
		$this->template->set('title', 'Umroh Plus Turki | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/umroh_plus_turki');
	}

	// Haji

	function haji() {
		$this->template->set('title', 'Haji | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/haji');
	}

	// Haji Reguler

	function haji_reguler() {
		$this->template->set('title', 'Haji Reguler | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/haji_reguler');
	}

	// Haji Khusus

	function haji_khusus() {
		$this->template->set('title', 'Haji Khusus | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/haji_khusus');
	}

	// Haji Plus

	function haji_plus() {
		$this->template->set('title', 'Haji Plus | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/haji_plus');
	}

	// Cek Porsi Haji

	function cek_porsi_haji() {
		$this->template->set('title', 'Perkiraan Keberangkatan | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/cek_porsi_haji');
	}

	// Bimbingan Manasik

	function bimbingan_manasik() {
		$this->template->set('title', 'Bimbingan Manasik | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/bimbingan_manasik');
	}

	// Badal Haji

	function badal_haji() {
		$this->template->set('title', 'Badal Haji | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/badal_haji');
	}

	// Galeri

	function galeri() {
		$this->template->set('title', 'Galeri | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/galeri');
	}

	// Foto

	function foto() {
		$this->template->set('title', 'Foto | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/foto');
	}

	// Video

	function video() {
		$this->template->set('title', 'Video | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/video');
	}

	// Pendaftaran

	function pendaftaran() {
		$this->template->set('title', 'Pendaftaran | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/pendaftaran');
	}

	// Pendaftaran Umroh

	function pendaftaran_umroh() {
	   	$data['kode_pendaftaran_umroh'] = $this->webmodel->kode_pendaftaran_umroh();
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
	      	$this->template->set('title','Pendaftaran Umroh | KBIH Al-Hidayah Kota Cirebon');
	      	$this->template->load('template_website', 'website/pendaftaran_umroh',$data);
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
	      	$this->webmodel->insert_data_pendaftaran_umroh($data_pendaftaran_umroh);
	      	// Kembalikan ke halaman tabel pendaftaran umroh
	      	redirect('website/tabel_pendaftaran_umroh');    
	   	}
	}

	// Data Pendaftaran Umroh

	function tabel_pendaftaran_umroh() {
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('webmodel');
        $data['data_pendaftaran_umroh']=$this->webmodel->get_pendaftaran_umroh();
	   	$this->template->set('title','Pendaftaran Umroh | KBIH Al-Hidayah Kota Cirebon');
	   	// Load view tabel_pendaftaran_umroh.php di folder application/views/website/
	   	$this->template->load('template_website', 'website/tabel_pendaftaran_umroh',$data);
	}

	function data_pendaftaran_umroh() {
		$id = $this->uri->segment(3);
	    $data['pendaftaran_umroh'] = $this->webmodel->get_pendaftaran_umroh_by_id($id);
	    $this->template->set('title','Pendaftaran Umroh | KBIH Al-Hidayah Kota Cirebon');
	    $this->template->load('template_laporan','website/data_pendaftaran_umroh',$data);
	}

	// Print Pendaftaran Umroh

	function print_pendaftaran_umroh() {
	    $data['print_pendaftaran_umroh'] = $this->webmodel->get_print_pendaftaran_umroh();
	    $this->template->set('title','Pendaftaran Umroh | KBIH Al-Hidayah Kota Cirebon');
	    $this->template->load('template_laporan','website/print_pendaftaran_umroh',$data);
	}

	// Pendaftaran Haji

	function pendaftaran_haji() {
	   	$data['kode_pendaftaran_haji'] = $this->webmodel->kode_pendaftaran_haji();
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
	      	$this->template->set('title','Pendaftaran Haji | KBIH Al-Hidayah Kota Cirebon');
	      	$this->template->load('template_website', 'website/pendaftaran_haji',$data);
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
	      	$this->webmodel->insert_data_pendaftaran_haji($data_pendaftaran_haji);
	      	// Kembalikan ke halaman tabel pendaftaran haji
	      	redirect('website/tabel_pendaftaran_haji');    
	   	}
	}

	// Data Pendaftaran Haji

	function tabel_pendaftaran_haji() {
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('webmodel');
        $data['data_pendaftaran_haji']=$this->webmodel->get_pendaftaran_haji();
	   	$this->template->set('title','Pendaftaran Haji | KBIH Al-Hidayah Kota Cirebon');
	   	// Load view tabel_pendaftaran_haji.php di folder application/views/website/
	   	$this->template->load('template_website', 'website/tabel_pendaftaran_haji',$data);
	}

	function data_pendaftaran_haji() {
		$id = $this->uri->segment(3);
	    $data['pendaftaran_haji'] = $this->webmodel->get_pendaftaran_haji_by_id($id);
	    $this->template->set('title','Pendaftaran Haji | KBIH Al-Hidayah Kota Cirebon');
	    $this->template->load('template_laporan','website/data_pendaftaran_haji',$data);
	}

	// Print Pendaftaran Haji

	function print_pendaftaran_haji() {
	    $data['print_pendaftaran_haji'] = $this->webmodel->get_print_pendaftaran_haji();
	    $this->template->set('title','Pendaftaran Haji | KBIH Al-Hidayah Kota Cirebon');
	    $this->template->load('template_laporan','website/print_pendaftaran_haji',$data);
	}

	// Pendaftaran Bimbingan Manasik

	function pendaftaran_bimsik() {
	   	$data['kode_pendaftaran_bimsik'] = $this->webmodel->kode_pendaftaran_bimsik();
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
	      	$this->template->set('title','Pendaftaran Bimbingan Manasik | KBIH Al-Hidayah Kota Cirebon');
	      	$this->template->load('template_website', 'website/pendaftaran_bimsik',$data);
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
	      	$this->webmodel->insert_data_pendaftaran_bimsik($data_pendaftaran_bimsik);
	      	// Kembalikan ke halaman tabel pendaftaran bimsik
	      	redirect('website/tabel_pendaftaran_bimsik');    
	   	}
	}

	// Data Pendaftaran Bimbingan Manasik

	function tabel_pendaftaran_bimsik() {
        // Konfigurasi model dan view untuk menampilkan data
        $this->load->model('webmodel');
        $data['data_pendaftaran_bimsik']=$this->webmodel->get_pendaftaran_bimsik();
	   	$this->template->set('title','Pendaftaran Bimbingan Manasik | KBIH Al-Hidayah Kota Cirebon');
	   	// Load view tabel_pendaftaran_bimsik.php di folder application/views/website/
	   	$this->template->load('template_website', 'website/tabel_pendaftaran_bimsik',$data);
	}

	function data_pendaftaran_bimsik() {
		$id = $this->uri->segment(3);
	    $data['pendaftaran_bimsik'] = $this->webmodel->get_pendaftaran_bimsik_by_id($id);
	    $this->template->set('title','Pendaftaran Bimbingan Manasik | KBIH Al-Hidayah Kota Cirebon');
	    $this->template->load('template_laporan','website/data_pendaftaran_bimsik',$data);
	}

	// Print Pendaftaran Bimbingan Manasik

	function print_pendaftaran_bimsik() {
	    $data['print_pendaftaran_bimsik'] = $this->webmodel->get_print_pendaftaran_bimsik();
	    $this->template->set('title','Pendaftaran Bimbingan Manasik | KBIH Al-Hidayah Kota Cirebon');
	    $this->template->load('template_laporan','website/print_pendaftaran_bimsik',$data);
	}

	// Kontak Kami

	function kontak_kami() {
		$this->template->set('title', 'Kontak Kami | KBIH Al-Hidayah Kota Cirebon');
		$this->template->load('template_website', 'website/kontak_kami');
	}
}