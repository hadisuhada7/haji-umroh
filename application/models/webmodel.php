<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Webmodel extends CI_Model {

	public function __construct() {
        parent::__construct();
         $this->load->database();
  	}

  	// Pendaftaran Umroh

	function kode_pendaftaran_umroh() {
		$this->db->select('RIGHT(pendaftaran_umroh.id_pendaftaran_umroh,4) as kode', FALSE);
		$this->db->order_by('id_pendaftaran_umroh','DESC');
		$this->db->limit(1);
		$query = $this->db->get('pendaftaran_umroh'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PDU".$kodemax; // Hasilnya PDU0001 dst
		return $kodejadi;  
	}

	function insert_data_pendaftaran_umroh($data) {
		$this->db->insert('pendaftaran_umroh',$data);
	}

	// Data Pendaftaran Umroh

	function get_pendaftaran_umroh() {
        return $this->db->query('SELECT * FROM pendaftaran_umroh ORDER BY id_pendaftaran_umroh DESC LIMIT 1')->result();  
    }

	function get_pendaftaran_umroh_by_id($id) {
	   	$this->db->where('id_pendaftaran_umroh',$id);
	   	return $this->db->get('pendaftaran_umroh');
	}

	// Print Pendaftaran Umroh

	function get_print_pendaftaran_umroh() { 
		return $this->db->query('SELECT * FROM pendaftaran_umroh ORDER BY id_pendaftaran_umroh DESC LIMIT 1')->result();
    }

  	// Pendaftaran Haji

	function kode_pendaftaran_haji() {
		$this->db->select('RIGHT(pendaftaran_haji.id_pendaftaran_haji,4) as kode', FALSE);
		$this->db->order_by('id_pendaftaran_haji','DESC');
		$this->db->limit(1);
		$query = $this->db->get('pendaftaran_haji'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PDH".$kodemax; // Hasilnya PDH0001 dst
		return $kodejadi;  
	}

	function insert_data_pendaftaran_haji($data) {
		$this->db->insert('pendaftaran_haji',$data);
	}

	// Data Pendaftaran Haji

	function get_pendaftaran_haji() {
        return $this->db->query('SELECT * FROM pendaftaran_haji ORDER BY id_pendaftaran_haji DESC LIMIT 1')->result();  
    }

	function get_pendaftaran_haji_by_id($id) {
	   	$this->db->where('id_pendaftaran_haji',$id);
	   	return $this->db->get('pendaftaran_haji');
	}

	// Print Pendaftaran Haji

	function get_print_pendaftaran_haji() { 
		return $this->db->query('SELECT * FROM pendaftaran_haji ORDER BY id_pendaftaran_haji DESC LIMIT 1')->result();
    }

	// Pendaftaran Bimbingan Manasik

	function kode_pendaftaran_bimsik() {
		$this->db->select('RIGHT(pendaftaran_bimsik.id_pendaftaran_bimsik,4) as kode', FALSE);
		$this->db->order_by('id_pendaftaran_bimsik','DESC');
		$this->db->limit(1);
		$query = $this->db->get('pendaftaran_bimsik'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PDB".$kodemax; // Hasilnya PDB0001 dst
		return $kodejadi;  
	}

	function insert_data_pendaftaran_bimsik($data) {
		$this->db->insert('pendaftaran_bimsik',$data);
	}

	// Data Pendaftaran Bimbingan Manasik

	function get_pendaftaran_bimsik() {
        return $this->db->query('SELECT * FROM pendaftaran_bimsik ORDER BY id_pendaftaran_bimsik DESC LIMIT 1')->result();  
    }

	function get_pendaftaran_bimsik_by_id($id) {
	   	$this->db->where('id_pendaftaran_bimsik',$id);
	   	return $this->db->get('pendaftaran_bimsik');
	}

	// Print Pendaftaran Bimbingan Manasik

	function get_print_pendaftaran_bimsik() { 
		return $this->db->query('SELECT * FROM pendaftaran_bimsik ORDER BY id_pendaftaran_bimsik DESC LIMIT 1')->result();
    }
}