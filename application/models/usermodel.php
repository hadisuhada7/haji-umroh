<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usermodel extends CI_Model {

	public function __construct() {
        parent::__construct();
         $this->load->database();
  	}

	public function get_menu_for_level($user_level) {
		$this->db->from('menu');
		$this->db->like('menu_allowed','+'.$user_level.'+');
		$result = $this->db->get();
		return $result;
	}
	
	function get_array_menu($id) {
		$this->db->select('menu_allowed');
		$this->db->from('menu');
		$this->db->where('menu_id',$id);
		$data = $this->db->get();
		if($data->num_rows() > 0) {
			$row = $data->row();
			$level = $row->menu_allowed;
			$arr = explode('+',$level);
			return $arr;
		} else {
			die();
		}
	}

	function get_all_level() {
   		return $this->db->get('level');
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

	function pendaftaran_haji() {
 		return $this->db->get('pendaftaran_haji')->result();
	}

	function get_pendaftaran_haji($config) {
        $hasilquery=$this->db->get('pendaftaran_haji', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_pendaftaran_haji($keyword) {
  		$this->db->like('id_pendaftaran_haji', $keyword)->or_like('nama_lengkap', $keyword)->or_like('jenis_kelamin', $keyword)->or_like('no_handphone', $keyword)->or_like('keterangan', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('pendaftaran_haji')->result();
	}

	function jumlah_pendaftaran_haji() {
  		$query = $this->db->query("SELECT * FROM pendaftaran_haji");
  		return $query->num_rows();
	}

	function insert_data_pendaftaran_haji($data) {
		$this->db->insert('pendaftaran_haji',$data);
	}

	function get_pendaftaran_haji_by_id($id) {
	   	$this->db->where('id_pendaftaran_haji',$id);
	   	return $this->db->get('pendaftaran_haji');
	}

	function update_data_pendaftaran_haji($data,$id) {
	  	$this->db->where('id_pendaftaran_haji',$id);
	   	$this->db->update('pendaftaran_haji',$data);
	}

	function delete_pendaftaran_haji($id) {
	   	$this->db->where('id_pendaftaran_haji',$id);
	   	$this->db->delete('pendaftaran_haji');
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

	function pendaftaran_umroh() {
 		return $this->db->get('pendaftaran_umroh')->result();
	}

	function get_pendaftaran_umroh($config) {
        $hasilquery=$this->db->get('pendaftaran_umroh', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_pendaftaran_umroh($keyword) {
  		$this->db->like('id_pendaftaran_umroh', $keyword)->or_like('nama_lengkap', $keyword)->or_like('jenis_kelamin', $keyword)->or_like('no_handphone', $keyword)->or_like('keterangan', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('pendaftaran_umroh')->result();
	}

	function jumlah_pendaftaran_umroh() {
  		$query = $this->db->query("SELECT * FROM pendaftaran_umroh");
  		return $query->num_rows();
	}

	function insert_data_pendaftaran_umroh($data) {
		$this->db->insert('pendaftaran_umroh',$data);
	}

	function get_pendaftaran_umroh_by_id($id) {
	   	$this->db->where('id_pendaftaran_umroh',$id);
	   	return $this->db->get('pendaftaran_umroh');
	}

	function update_data_pendaftaran_umroh($data,$id) {
	  	$this->db->where('id_pendaftaran_umroh',$id);
	   	$this->db->update('pendaftaran_umroh',$data);
	}

	function delete_pendaftaran_umroh($id) {
	   	$this->db->where('id_pendaftaran_umroh',$id);
	   	$this->db->delete('pendaftaran_umroh');
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

	function pendaftaran_bimsik() {
 		return $this->db->get('pendaftaran_bimsik')->result();
	}

	function get_pendaftaran_bimsik($config) {
        $hasilquery=$this->db->get('pendaftaran_bimsik', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_pendaftaran_bimsik($keyword) {
  		$this->db->like('id_pendaftaran_bimsik', $keyword)->or_like('no_porsi', $keyword)->or_like('nama_lengkap', $keyword)->or_like('jenis_kelamin', $keyword)->or_like('keterangan', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('pendaftaran_bimsik')->result();
	}

	function jumlah_pendaftaran_bimsik() {
  		$query = $this->db->query("SELECT * FROM pendaftaran_bimsik");
  		return $query->num_rows();
	}

	function insert_data_pendaftaran_bimsik($data) {
		$this->db->insert('pendaftaran_bimsik',$data);
	}

	function get_pendaftaran_bimsik_by_id($id) {
	   	$this->db->where('id_pendaftaran_bimsik',$id);
	   	return $this->db->get('pendaftaran_bimsik');
	}

	function update_data_pendaftaran_bimsik($data,$id) {
	  	$this->db->where('id_pendaftaran_bimsik',$id);
	   	$this->db->update('pendaftaran_bimsik',$data);
	}

	function delete_pendaftaran_bimsik($id) {
	   	$this->db->where('id_pendaftaran_bimsik',$id);
	   	$this->db->delete('pendaftaran_bimsik');
	}

	// Paket Haji Plus

	function kode_paket_haji_plus() {
		$this->db->select('RIGHT(paket_haji_plus.id_paket_haji_plus,4) as kode', FALSE);
		$this->db->order_by('id_paket_haji_plus','DESC');
		$this->db->limit(1);
		$query = $this->db->get('paket_haji_plus'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PKH".$kodemax; // Hasilnya PKH0001 dst
		return $kodejadi;
	}

	function paket_haji_plus() {
 		return $this->db->get('paket_haji_plus');
	}

	function get_paket_haji_plus($config) {  
        $hasilquery=$this->db->get('paket_haji_plus', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_paket_haji_plus($keyword) {
  		$this->db->like('id_paket_haji_plus', $keyword)->or_like('nama_program', $keyword)->or_like('biaya', $keyword)->or_like('tgl_keberangkatan', $keyword)->or_like('pesawat', $keyword)->or_like('sisa_seat', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('paket_haji_plus')->result();
	}

	function jumlah_paket_haji_plus() {
  		$query = $this->db->query("SELECT * FROM paket_haji_plus");
  		return $query->num_rows();
	}

	function insert_data_paket_haji_plus($data) {
		$this->db->insert('paket_haji_plus',$data);
	}

	function get_paket_haji_plus_by_id($id) {
	   	$this->db->where('id_paket_haji_plus',$id);
	   	return $this->db->get('paket_haji_plus');
	}

	function update_data_paket_haji_plus($data,$id) {
	  	$this->db->where('id_paket_haji_plus',$id);
	   	$this->db->update('paket_haji_plus',$data);
	}

	function delete_paket_haji_plus($id) {
	   	$this->db->where('id_paket_haji_plus',$id);
	   	$this->db->delete('paket_haji_plus');
	}

	// Haji Plus

	function kode_haji_plus() {
		$this->db->select('RIGHT(haji_plus.id_haji_plus,4) as kode', FALSE);
		$this->db->order_by('id_haji_plus','DESC');
		$this->db->limit(1);
		$query = $this->db->get('haji_plus'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "HJP".$kodemax; // Hasilnya HJP0001 dst
		return $kodejadi;  
	}

	function haji_plus() {
 		return $this->db->get('haji_plus');
	}

	function get_haji_plus($config) {
		$this->db->get('haji_plus');
		$this->db->join('paket_haji_plus','paket_haji_plus.id_paket_haji_plus=haji_plus.id_paket_haji_plus','left');
        $hasilquery=$this->db->get('haji_plus', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_haji_plus($keyword) {
		$this->db->where('id_haji_plus');
	   	$this->db->join('paket_haji_plus','paket_haji_plus.id_paket_haji_plus=haji_plus.id_paket_haji_plus','left');
  		$this->db->like('id_haji_plus', $keyword)->or_like('nama_program', $keyword)->or_like('nama_lengkap', $keyword)->or_like('jenis_kelamin', $keyword)->or_like('tahun', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('haji_plus')->result();
	}

	function jumlah_haji_plus() {
  		$query = $this->db->query("SELECT * FROM haji_plus");
  		return $query->num_rows();
	}

	function insert_data_haji_plus($data) {
		$this->db->insert('haji_plus',$data);
	}

	function get_haji_plus_by_id($id) {
	   	$this->db->where('id_haji_plus',$id);
	   	$this->db->join('paket_haji_plus','paket_haji_plus.id_paket_haji_plus=haji_plus.id_paket_haji_plus','left');
	   	return $this->db->get('haji_plus');
	}

	function update_data_haji_plus($data,$id) {
	  	$this->db->where('id_haji_plus',$id);
	   	$this->db->update('haji_plus',$data);
	}

	function delete_haji_plus($id) {
	   	$this->db->where('id_haji_plus',$id);
	   	$this->db->delete('haji_plus');
	}

	// Paspor Haji Plus

	function kode_paspor_haji_plus() {
		$this->db->select('RIGHT(paspor_haji_plus.id_paspor,4) as kode', FALSE);
		$this->db->order_by('id_paspor','DESC');
		$this->db->limit(1);
		$query = $this->db->get('paspor_haji_plus'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PHS".$kodemax; // Hasilnya PHS0001 dst
		return $kodejadi;  
	}

	function paspor_haji_plus() {
 		return $this->db->get('paspor_haji_plus')->result();
	}

	function get_paspor_haji_plus($config) {
		$this->db->get('paspor_haji_plus');
		$this->db->join('haji_plus','haji_plus.id_haji_plus=paspor_haji_plus.id_haji_plus','left');
        $hasilquery=$this->db->get('paspor_haji_plus', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_paspor_haji_plus($keyword) {
  		$this->db->where('id_paspor');
	   	$this->db->join('haji_plus','haji_plus.id_haji_plus=paspor_haji_plus.id_haji_plus','left');
  		$this->db->like('id_paspor', $keyword)->or_like('nama_lengkap', $keyword)->or_like('no_paspor', $keyword)->or_like('tempat_dikeluarkan', $keyword)->or_like('tgl_habis_berlaku', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('paspor_haji_plus')->result();
	}

	function jumlah_paspor_haji_plus() {
  		$query = $this->db->query("SELECT * FROM paspor_haji_plus");
  		return $query->num_rows();
	}

	function insert_data_paspor_haji_plus($data) {
		$this->db->insert('paspor_haji_plus',$data);
	}

	function get_paspor_haji_plus_by_id($id) {
	   	$this->db->where('id_paspor',$id);
	   	$this->db->join('haji_plus','haji_plus.id_haji_plus=paspor_haji_plus.id_haji_plus','left');
	   	return $this->db->get('paspor_haji_plus');
	}

	function update_data_paspor_haji_plus($data,$id) {
	  	$this->db->where('id_paspor',$id);
	   	$this->db->update('paspor_haji_plus',$data);
	}

	function delete_paspor_haji_plus($id) {
	   	$this->db->where('id_paspor',$id);
	   	$this->db->delete('paspor_haji_plus');
	}

	// Pembayaran Haji Plus

	function kode_pembayaran_haji_plus() {
		$this->db->select('RIGHT(pembayaran_haji_plus.id_biaya_haji_plus,4) as kode', FALSE);
		$this->db->order_by('id_biaya_haji_plus','DESC');
		$this->db->limit(1);
		$query = $this->db->get('pembayaran_haji_plus'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "BHP".$kodemax; // Hasilnya BHP0001 dst
		return $kodejadi;  
	}

	function pembayaran_haji_plus() {
 		return $this->db->get('pembayaran_haji_plus')->result();
	}

	function get_pembayaran_haji_plus($config) {
		$this->db->get('pembayaran_haji_plus');
		$this->db->join('haji_plus','haji_plus.id_haji_plus=pembayaran_haji_plus.id_haji_plus','left');
        $hasilquery=$this->db->get('pembayaran_haji_plus', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_pembayaran_haji_plus($keyword) {
		$this->db->where('id_biaya_haji_plus');
	   	$this->db->join('haji_plus','haji_plus.id_haji_plus=pembayaran_haji_plus.id_haji_plus','left');
  		$this->db->like('id_biaya_haji_plus', $keyword)->or_like('nama_lengkap', $keyword)->or_like('biaya_dp', $keyword)->or_like('biaya_pelunasan', $keyword)->or_like('keterangan', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('pembayaran_haji_plus')->result();
	}

	function jumlah_pembayaran_haji_plus() {
  		$query = $this->db->query("SELECT * FROM pembayaran_haji_plus");
  		return $query->num_rows();
	}

	function insert_data_pembayaran_haji_plus($data) {
		$this->db->insert('pembayaran_haji_plus',$data);
	}

	function get_pembayaran_haji_plus_by_id($id) {
	   	$this->db->where('id_biaya_haji_plus',$id);
	   	$this->db->join('haji_plus','haji_plus.id_haji_plus=pembayaran_haji_plus.id_haji_plus','left');
	   	return $this->db->get('pembayaran_haji_plus');
	}

	function update_data_pembayaran_haji_plus($data,$id) {
	  	$this->db->where('id_biaya_haji_plus',$id);
	   	$this->db->update('pembayaran_haji_plus',$data);
	}

	function delete_pembayaran_haji_plus($id) {
	   	$this->db->where('id_biaya_haji_plus',$id);
	   	$this->db->delete('pembayaran_haji_plus');
	}

	// Biaya Paspor Haji Plus

	function kode_biaya_paspor_haji_plus() {
		$this->db->select('RIGHT(biaya_paspor_haji_plus.id_biaya_paspor,4) as kode', FALSE);
		$this->db->order_by('id_biaya_paspor','DESC');
		$this->db->limit(1);
		$query = $this->db->get('biaya_paspor_haji_plus'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "BPP".$kodemax; // Hasilnya BPP0001 dst
		return $kodejadi;  
	}

	function biaya_paspor_haji_plus() {
 		return $this->db->get('biaya_paspor_haji_plus')->result();
	}

	function get_biaya_paspor_haji_plus($config) {
		$this->db->get('biaya_paspor_haji_plus');
		$this->db->join('haji_plus','haji_plus.id_haji_plus=biaya_paspor_haji_plus.id_haji_plus','left');
        $hasilquery=$this->db->get('biaya_paspor_haji_plus', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_biaya_paspor_haji_plus($keyword) {
		$this->db->where('id_biaya_paspor');
	   	$this->db->join('haji_plus','haji_plus.id_haji_plus=biaya_paspor_haji_plus.id_haji_plus','left');
  		$this->db->like('id_biaya_paspor', $keyword)->or_like('nama_lengkap', $keyword)->or_like('tgl_bayar', $keyword)->or_like('biaya', $keyword)->or_like('keterangan', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('biaya_paspor_haji_plus')->result();
	}

	function jumlah_biaya_paspor_haji_plus() {
  		$query = $this->db->query("SELECT * FROM biaya_paspor_haji_plus");
  		return $query->num_rows();
	}

	function insert_data_biaya_paspor_haji_plus($data) {
		$this->db->insert('biaya_paspor_haji_plus',$data);
	}

	function get_biaya_paspor_haji_plus_by_id($id) {
	   	$this->db->where('id_biaya_paspor',$id);
	   	$this->db->join('haji_plus','haji_plus.id_haji_plus=biaya_paspor_haji_plus.id_haji_plus','left');
	   	return $this->db->get('biaya_paspor_haji_plus');
	}

	function update_data_biaya_paspor_haji_plus($data,$id) {
	  	$this->db->where('id_biaya_paspor',$id);
	   	$this->db->update('biaya_paspor_haji_plus',$data);
	}

	function delete_biaya_paspor_haji_plus($id) {
	   	$this->db->where('id_biaya_paspor',$id);
	   	$this->db->delete('biaya_paspor_haji_plus');
	}

	// Hadyu & Tarwiyah Haji Plus

	function kode_hadyu_tarwiyah_haji_plus() {
		$this->db->select('RIGHT(biaya_hadyu_tarwiyah_haji_plus.id_hadyu_tarwiyah,4) as kode', FALSE);
		$this->db->order_by('id_hadyu_tarwiyah','DESC');
		$this->db->limit(1);
		$query = $this->db->get('biaya_hadyu_tarwiyah_haji_plus'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "HTP".$kodemax; // Hasilnya HTP0001 dst
		return $kodejadi;  
	}

	function hadyu_tarwiyah_haji_plus() {
 		return $this->db->get('biaya_hadyu_tarwiyah_haji_plus')->result();
	}

	function get_hadyu_tarwiyah_haji_plus($config) {
		$this->db->get('biaya_hadyu_tarwiyah_haji_plus');
		$this->db->join('haji_plus','haji_plus.id_haji_plus=biaya_hadyu_tarwiyah_haji_plus.id_haji_plus','left');
        $hasilquery=$this->db->get('biaya_hadyu_tarwiyah_haji_plus', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_hadyu_tarwiyah_haji_plus($keyword) {
		$this->db->where('id_hadyu_tarwiyah');
	   	$this->db->join('haji_plus','haji_plus.id_haji_plus=biaya_hadyu_tarwiyah_haji_plus.id_haji_plus','left');
  		$this->db->like('id_hadyu_tarwiyah', $keyword)->or_like('nama_lengkap', $keyword)->or_like('biaya_hadyu', $keyword)->or_like('biaya_tarwiyah', $keyword)->or_like('keterangan', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('biaya_hadyu_tarwiyah_haji_plus')->result();
	}

	function jumlah_hadyu_tarwiyah_haji_plus() {
  		$query = $this->db->query("SELECT * FROM biaya_hadyu_tarwiyah_haji_plus");
  		return $query->num_rows();
	}

	function insert_data_hadyu_tarwiyah_haji_plus($data) {
		$this->db->insert('biaya_hadyu_tarwiyah_haji_plus',$data);
	}

	function get_hadyu_tarwiyah_haji_plus_by_id($id) {
	   	$this->db->where('id_hadyu_tarwiyah',$id);
	   	$this->db->join('haji_plus','haji_plus.id_haji_plus=biaya_hadyu_tarwiyah_haji_plus.id_haji_plus','left');
	   	return $this->db->get('biaya_hadyu_tarwiyah_haji_plus');
	}

	function update_data_hadyu_tarwiyah_haji_plus($data,$id) {
	  	$this->db->where('id_hadyu_tarwiyah',$id);
	   	$this->db->update('biaya_hadyu_tarwiyah_haji_plus',$data);
	}

	function delete_hadyu_tarwiyah_haji_plus($id) {
	   	$this->db->where('id_hadyu_tarwiyah',$id);
	   	$this->db->delete('biaya_hadyu_tarwiyah_haji_plus');
	}

	// Pembatalan Haji Plus

	function kode_pembatalan_haji_plus() {
		$this->db->select('RIGHT(pembatalan_haji_plus.id_pembatalan_haji_plus,4) as kode', FALSE);
		$this->db->order_by('id_pembatalan_haji_plus','DESC');
		$this->db->limit(1);
		$query = $this->db->get('pembatalan_haji_plus'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PHS".$kodemax; // Hasilnya PHS0001 dst
		return $kodejadi;  
	}

	function pembatalan_haji_plus() {
 		return $this->db->get('pembatalan_haji_plus')->result();
	}

	function get_pembatalan_haji_plus($config) {
		$this->db->get('pembatalan_haji_plus');
		$this->db->join('haji_plus','haji_plus.id_haji_plus=pembatalan_haji_plus.id_haji_plus','left');
        $hasilquery=$this->db->get('pembatalan_haji_plus', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_pembatalan_haji_plus($keyword) {
		$this->db->where('id_pembatalan_haji_plus');
	   	$this->db->join('haji_plus','haji_plus.id_haji_plus=pembatalan_haji_plus.id_haji_plus','left');
  		$this->db->like('id_pembatalan_haji_plus', $keyword)->or_like('nama_lengkap', $keyword)->or_like('tgl_pembatalan', $keyword)->or_like('biaya_kembali', $keyword)->or_like('keterangan', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('pembatalan_haji_plus')->result();
	}

	function jumlah_pembatalan_haji_plus() {
  		$query = $this->db->query("SELECT * FROM pembatalan_haji_plus");
  		return $query->num_rows();
	}

	function insert_data_pembatalan_haji_plus($data) {
		$this->db->insert('pembatalan_haji_plus',$data);
	}

	function get_pembatalan_haji_plus_by_id($id) {
	   	$this->db->where('id_pembatalan_haji_plus',$id);
	   	$this->db->join('haji_plus','haji_plus.id_haji_plus=pembatalan_haji_plus.id_haji_plus','left');
	   	return $this->db->get('pembatalan_haji_plus');
	}

	function update_data_pembatalan_haji_plus($data,$id) {
	  	$this->db->where('id_pembatalan_haji_plus',$id);
	   	$this->db->update('pembatalan_haji_plus',$data);
	}

	function delete_pembatalan_haji_plus($id) {
	   	$this->db->where('id_pembatalan_haji_plus',$id);
	   	$this->db->delete('pembatalan_haji_plus');
	}

	// Paket Umroh

	function kode_paket_umroh() {
		$this->db->select('RIGHT(paket_umroh.id_paket_umroh,4) as kode', FALSE);
		$this->db->order_by('id_paket_umroh','DESC');
		$this->db->limit(1);
		$query = $this->db->get('paket_umroh'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PKU".$kodemax; // Hasilnya PKU0001 dst
		return $kodejadi;
	}

	function paket_umroh() {
 		return $this->db->get('paket_umroh');
	}

	function get_paket_umroh($config) {  
        $hasilquery=$this->db->get('paket_umroh', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_paket_umroh($keyword) {
  		$this->db->like('id_paket_umroh', $keyword)->or_like('nama_program', $keyword)->or_like('biaya', $keyword)->or_like('tgl_keberangkatan', $keyword)->or_like('pesawat', $keyword)->or_like('sisa_seat', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('paket_umroh')->result();
	}

	function jumlah_paket_umroh() {
  		$query = $this->db->query("SELECT * FROM paket_umroh");
  		return $query->num_rows();
	}

	function insert_data_paket_umroh($data) {
		$this->db->insert('paket_umroh',$data);
	}

	function get_paket_umroh_by_id($id) {
	   	$this->db->where('id_paket_umroh',$id);
	   	return $this->db->get('paket_umroh');
	}

	function update_data_paket_umroh($data,$id) {
	  	$this->db->where('id_paket_umroh',$id);
	   	$this->db->update('paket_umroh',$data);
	}

	function delete_paket_umroh($id) {
	   	$this->db->where('id_paket_umroh',$id);
	   	$this->db->delete('paket_umroh');
	}

	// Umroh

	function kode_umroh() {
		$this->db->select('RIGHT(umroh.id_umroh,4) as kode', FALSE);
		$this->db->order_by('id_umroh','DESC');
		$this->db->limit(1);
		$query = $this->db->get('umroh'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "UMH".$kodemax; // Hasilnya UMH0001 dst
		return $kodejadi;  
	}

	function umroh() {
 		return $this->db->get('umroh');
	}

	function get_umroh($config) {
		$this->db->get('umroh');
	   	$this->db->join('paket_umroh','paket_umroh.id_paket_umroh=umroh.id_paket_umroh','left');
        $hasilquery=$this->db->get('umroh', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_umroh($keyword) {
		$this->db->where('id_umroh');
	   	$this->db->join('paket_umroh','paket_umroh.id_paket_umroh=umroh.id_paket_umroh','left');
  		$this->db->like('id_umroh', $keyword)->or_like('nama_program', $keyword)->or_like('nama_lengkap', $keyword)->or_like('jenis_kelamin', $keyword)->or_like('no_telepon', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('umroh')->result();
	}

	function jumlah_umroh() {
  		$query = $this->db->query("SELECT * FROM umroh");
  		return $query->num_rows();
	}

	function insert_data_umroh($data) {
		$this->db->insert('umroh',$data);
	}

	function get_umroh_by_id($id) {
	   	$this->db->where('id_umroh',$id);
	   	$this->db->join('paket_umroh','paket_umroh.id_paket_umroh=umroh.id_paket_umroh','left');
	   	return $this->db->get('umroh');
	}

	function update_data_umroh($data,$id) {
	  	$this->db->where('id_umroh',$id);
	   	$this->db->update('umroh',$data);
	}

	function delete_umroh($id) {
	   	$this->db->where('id_umroh',$id);
	   	$this->db->delete('umroh');
	}

	// Paspor Umroh

	function kode_paspor_umroh() {
		$this->db->select('RIGHT(paspor_umroh.id_paspor,4) as kode', FALSE);
		$this->db->order_by('id_paspor','DESC');
		$this->db->limit(1);
		$query = $this->db->get('paspor_umroh'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PRU".$kodemax; // Hasilnya PRU0001 dst
		return $kodejadi;  
	}

	function paspor_umroh() {
 		return $this->db->get('paspor_umroh')->result();
	}

	function get_paspor_umroh($config) {
		$this->db->get('paspor_umroh');
		$this->db->join('umroh','umroh.id_umroh=paspor_umroh.id_umroh','left');
        $hasilquery=$this->db->get('paspor_umroh', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_paspor_umroh($keyword) {
  		$this->db->where('id_paspor');
	   	$this->db->join('umroh','umroh.id_umroh=paspor_umroh.id_umroh','left');
  		$this->db->like('id_paspor', $keyword)->or_like('nama_lengkap', $keyword)->or_like('no_paspor', $keyword)->or_like('tempat_dikeluarkan', $keyword)->or_like('tgl_habis_berlaku', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('paspor_umroh')->result();
	}

	function jumlah_paspor_umroh() {
  		$query = $this->db->query("SELECT * FROM paspor_umroh");
  		return $query->num_rows();
	}

	function insert_data_paspor_umroh($data) {
		$this->db->insert('paspor_umroh',$data);
	}

	function get_paspor_umroh_by_id($id) {
	   	$this->db->where('id_paspor',$id);
	   	$this->db->join('umroh','umroh.id_umroh=paspor_umroh.id_umroh','left');
	   	return $this->db->get('paspor_umroh');
	}

	function update_data_paspor_umroh($data,$id) {
	  	$this->db->where('id_paspor',$id);
	   	$this->db->update('paspor_umroh',$data);
	}

	function delete_paspor_umroh($id) {
	   	$this->db->where('id_paspor',$id);
	   	$this->db->delete('paspor_umroh');
	}

	// Pembayaran Umroh

	function kode_pembayaran_umroh() {
		$this->db->select('RIGHT(pembayaran_umroh.id_biaya_umroh,4) as kode', FALSE);
		$this->db->order_by('id_biaya_umroh','DESC');
		$this->db->limit(1);
		$query = $this->db->get('pembayaran_umroh'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "BUH".$kodemax; // Hasilnya BUH0001 dst
		return $kodejadi;  
	}

	function pembayaran_umroh() {
 		return $this->db->get('pembayaran_umroh')->result();
	}

	function get_pembayaran_umroh($config) {
		$this->db->get('pembayaran_umroh');
		$this->db->join('umroh','umroh.id_umroh=pembayaran_umroh.id_umroh','left');
        $hasilquery=$this->db->get('pembayaran_umroh', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_pembayaran_umroh($keyword) {
		$this->db->where('id_biaya_umroh');
	   	$this->db->join('umroh','umroh.id_umroh=pembayaran_umroh.id_umroh','left');
  		$this->db->like('id_biaya_umroh', $keyword)->or_like('nama_lengkap', $keyword)->or_like('biaya_dp', $keyword)->or_like('biaya_pelunasan', $keyword)->or_like('keterangan', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('pembayaran_umroh')->result();
	}

	function jumlah_pembayaran_umroh() {
  		$query = $this->db->query("SELECT * FROM pembayaran_umroh");
  		return $query->num_rows();
	}

	function insert_data_pembayaran_umroh($data) {
		$this->db->insert('pembayaran_umroh',$data);
	}

	function get_pembayaran_umroh_by_id($id) {
	   	$this->db->where('id_biaya_umroh',$id);
	   	$this->db->join('umroh','umroh.id_umroh=pembayaran_umroh.id_umroh','left');
	   	return $this->db->get('pembayaran_umroh');
	}

	function update_data_pembayaran_umroh($data,$id) {
	  	$this->db->where('id_biaya_umroh',$id);
	   	$this->db->update('pembayaran_umroh',$data);
	}

	function delete_pembayaran_umroh($id) {
	   	$this->db->where('id_biaya_umroh',$id);
	   	$this->db->delete('pembayaran_umroh');
	}

	// Biaya Paspor Umroh

	function kode_biaya_paspor_umroh() {
		$this->db->select('RIGHT(biaya_paspor_umroh.id_biaya_paspor,4) as kode', FALSE);
		$this->db->order_by('id_biaya_paspor','DESC');
		$this->db->limit(1);
		$query = $this->db->get('biaya_paspor_umroh'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "BPU".$kodemax; // Hasilnya BPU0001 dst
		return $kodejadi;  
	}

	function biaya_paspor_umroh() {
 		return $this->db->get('biaya_paspor_umroh')->result();
	}

	function get_biaya_paspor_umroh($config) {
		$this->db->get('biaya_paspor_umroh');
		$this->db->join('umroh','umroh.id_umroh=biaya_paspor_umroh.id_umroh','left');
        $hasilquery=$this->db->get('biaya_paspor_umroh', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_biaya_paspor_umroh($keyword) {
		$this->db->where('id_biaya_paspor');
	   	$this->db->join('umroh','umroh.id_umroh=biaya_paspor_umroh.id_umroh','left');
  		$this->db->like('id_biaya_paspor', $keyword)->or_like('nama_lengkap', $keyword)->or_like('tgl_bayar', $keyword)->or_like('biaya', $keyword)->or_like('keterangan', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('biaya_paspor_umroh')->result();
	}

	function jumlah_biaya_paspor_umroh() {
  		$query = $this->db->query("SELECT * FROM biaya_paspor_umroh");
  		return $query->num_rows();
	}

	function insert_data_biaya_paspor_umroh($data) {
		$this->db->insert('biaya_paspor_umroh',$data);
	}

	function get_biaya_paspor_umroh_by_id($id) {
	   	$this->db->where('id_biaya_paspor',$id);
	   	$this->db->join('umroh','umroh.id_umroh=biaya_paspor_umroh.id_umroh','left');
	   	return $this->db->get('biaya_paspor_umroh');
	}

	function update_data_biaya_paspor_umroh($data,$id) {
	  	$this->db->where('id_biaya_paspor',$id);
	   	$this->db->update('biaya_paspor_umroh',$data);
	}

	function delete_biaya_paspor_umroh($id) {
	   	$this->db->where('id_biaya_paspor',$id);
	   	$this->db->delete('biaya_paspor_umroh');
	}

	// Pembatalan Umroh

	function kode_pembatalan_umroh() {
		$this->db->select('RIGHT(pembatalan_umroh.id_pembatalan_umroh,4) as kode', FALSE);
		$this->db->order_by('id_pembatalan_umroh','DESC');
		$this->db->limit(1);
		$query = $this->db->get('pembatalan_umroh'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PBU".$kodemax; // Hasilnya PBU0001 dst
		return $kodejadi;  
	}

	function pembatalan_umroh() {
 		return $this->db->get('pembatalan_umroh')->result();
	}

	function get_pembatalan_umroh($config) {
		$this->db->get('pembatalan_umroh');
		$this->db->join('umroh','umroh.id_umroh=pembatalan_umroh.id_umroh','left');
        $hasilquery=$this->db->get('pembatalan_umroh', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_pembatalan_umroh($keyword) {
		$this->db->where('id_pembatalan_umroh');
	   	$this->db->join('umroh','umroh.id_umroh=pembatalan_umroh.id_umroh','left');
  		$this->db->like('id_pembatalan_umroh', $keyword)->or_like('nama_lengkap', $keyword)->or_like('tgl_pembatalan', $keyword)->or_like('biaya_kembali', $keyword)->or_like('keterangan', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('pembatalan_umroh')->result();
	}

	function jumlah_pembatalan_umroh() {
  		$query = $this->db->query("SELECT * FROM pembatalan_umroh");
  		return $query->num_rows();
	}

	function insert_data_pembatalan_umroh($data) {
		$this->db->insert('pembatalan_umroh',$data);
	}

	function get_pembatalan_umroh_by_id($id) {
	   	$this->db->where('id_pembatalan_umroh',$id);
	   	$this->db->join('umroh','umroh.id_umroh=pembatalan_umroh.id_umroh','left');
	   	return $this->db->get('pembatalan_umroh');
	}

	function update_data_pembatalan_umroh($data,$id) {
	  	$this->db->where('id_pembatalan_umroh',$id);
	   	$this->db->update('pembatalan_umroh',$data);
	}

	function delete_pembatalan_umroh($id) {
	   	$this->db->where('id_pembatalan_umroh',$id);
	   	$this->db->delete('pembatalan_umroh');
	}

	// Bimbingan Manasik

	function kode_bimsik() {
		$this->db->select('RIGHT(bimbingan_manasik.id_peserta,4) as kode', FALSE);
		$this->db->order_by('id_peserta','DESC');
		$this->db->limit(1);
		$query = $this->db->get('bimbingan_manasik'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PST".$kodemax; // Hasilnya PST0001 dst
		return $kodejadi;  
	}

	function bimsik() {
 		return $this->db->get('bimbingan_manasik');
	}

	function get_bimsik($config) {  
        $hasilquery=$this->db->get('bimbingan_manasik', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_bimsik($keyword) {
  		$this->db->like('id_peserta', $keyword)->or_like('no_porsi', $keyword)->or_like('nama_lengkap', $keyword)->or_like('jenis_kelamin', $keyword)->or_like('tahun', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('bimbingan_manasik')->result();
	}

	function jumlah_bimsik() {
  		$query = $this->db->query("SELECT * FROM bimbingan_manasik");
  		return $query->num_rows();
	}

	function insert_data_bimsik($data) {
		$this->db->insert('bimbingan_manasik',$data);
	}

	function get_bimsik_by_id($id) {
	   	$this->db->where('id_peserta',$id);
	   	return $this->db->get('bimbingan_manasik');
	}

	function update_data_bimsik($data,$id) {
	  	$this->db->where('id_peserta',$id);
	   	$this->db->update('bimbingan_manasik',$data);
	}

	function delete_bimsik($id) {
	   	$this->db->where('id_peserta',$id);
	   	$this->db->delete('bimbingan_manasik');
	}

	// Paspor Haji

	function kode_paspor_haji() {
		$this->db->select('RIGHT(paspor_haji.id_paspor,4) as kode', FALSE);
		$this->db->order_by('id_paspor','DESC');
		$this->db->limit(1);
		$query = $this->db->get('paspor_haji'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PRH".$kodemax; // Hasilnya PRH0001 dst
		return $kodejadi;  
	}

	function paspor_haji() {
 		return $this->db->get('paspor_haji')->result();
	}

	function get_paspor_haji($config) {
		$this->db->get('paspor_haji');
		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=paspor_haji.id_peserta','left');
        $hasilquery=$this->db->get('paspor_haji', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_paspor_haji($keyword) {
		$this->db->where('id_paspor');
	   	$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=paspor_haji.id_peserta','left');
  		$this->db->like('id_paspor', $keyword)->or_like('nama_lengkap', $keyword)->or_like('no_paspor', $keyword)->or_like('tempat_dikeluarkan', $keyword)->or_like('tgl_habis_berlaku', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('paspor_haji')->result();
	}

	function jumlah_paspor_haji() {
  		$query = $this->db->query("SELECT * FROM paspor_haji");
  		return $query->num_rows();
	}

	function insert_data_paspor_haji($data) {
		$this->db->insert('paspor_haji',$data);
	}

	function get_paspor_haji_by_id($id) {
	   	$this->db->where('id_paspor',$id);
	   	$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=paspor_haji.id_peserta','left');
	   	return $this->db->get('paspor_haji');
	}

	function update_data_paspor_haji($data,$id) {
	  	$this->db->where('id_paspor',$id);
	   	$this->db->update('paspor_haji',$data);
	}

	function delete_paspor_haji($id) {
	   	$this->db->where('id_paspor',$id);
	   	$this->db->delete('paspor_haji');
	}

	// Pembayaran Bimbingan Manasik

	function kode_pembayaran_bimsik() {
		$this->db->select('RIGHT(pembayaran_bimsik.id_biaya_bimsik,4) as kode', FALSE);
		$this->db->order_by('id_biaya_bimsik','DESC');
		$this->db->limit(1);
		$query = $this->db->get('pembayaran_bimsik'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PBH".$kodemax; // Hasilnya PBH0001 dst
		return $kodejadi;  
	}

	function pembayaran_bimsik() {
 		return $this->db->get('pembayaran_bimsik')->result();
	}

	function get_pembayaran_bimsik($config) {
		$this->db->get('pembayaran_bimsik');
		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=pembayaran_bimsik.id_peserta','left');
        $hasilquery=$this->db->get('pembayaran_bimsik', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_pembayaran_bimsik($keyword) {
		$this->db->where('id_biaya_bimsik');
	   	$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=pembayaran_bimsik.id_peserta','left');
  		$this->db->like('id_biaya_bimsik', $keyword)->or_like('nama_lengkap', $keyword)->or_like('total_jumlah', $keyword)->or_like('keterangan', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('pembayaran_bimsik')->result();
	}

	function jumlah_pembayaran_bimsik() {
  		$query = $this->db->query("SELECT * FROM pembayaran_bimsik");
  		return $query->num_rows();
	}

	function insert_data_pembayaran_bimsik($data) {
		$this->db->insert('pembayaran_bimsik',$data);
	}

	function get_pembayaran_bimsik_by_id($id) {
	   	$this->db->where('id_biaya_bimsik',$id);
	   	$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=pembayaran_bimsik.id_peserta','left');
	   	return $this->db->get('pembayaran_bimsik');
	}

	function update_data_pembayaran_bimsik($data,$id) {
	  	$this->db->where('id_biaya_bimsik',$id);
	   	$this->db->update('pembayaran_bimsik',$data);
	}

	function delete_pembayaran_bimsik($id) {
	   	$this->db->where('id_biaya_bimsik',$id);
	   	$this->db->delete('pembayaran_bimsik');
	}

	// Biaya Paspor Haji

	function kode_biaya_paspor_haji() {
		$this->db->select('RIGHT(biaya_paspor_haji.id_biaya_paspor,4) as kode', FALSE);
		$this->db->order_by('id_biaya_paspor','DESC');
		$this->db->limit(1);
		$query = $this->db->get('biaya_paspor_haji'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "BPH".$kodemax; // Hasilnya BPH0001 dst
		return $kodejadi;  
	}

	function biaya_paspor_haji() {
 		return $this->db->get('biaya_paspor_haji')->result();
	}

	function get_biaya_paspor_haji($config) {
		$this->db->get('biaya_paspor_haji');
		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=biaya_paspor_haji.id_peserta','left');
        $hasilquery=$this->db->get('biaya_paspor_haji', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_biaya_paspor_haji($keyword) {
		$this->db->where('id_biaya_paspor');
	   	$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=biaya_paspor_haji.id_peserta','left');
  		$this->db->like('id_biaya_paspor', $keyword)->or_like('nama_lengkap', $keyword)->or_like('tgl_bayar', $keyword)->or_like('biaya', $keyword)->or_like('keterangan', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('biaya_paspor_haji')->result();
	}

	function jumlah_biaya_paspor_haji() {
  		$query = $this->db->query("SELECT * FROM biaya_paspor_haji");
  		return $query->num_rows();
	}

	function insert_data_biaya_paspor_haji($data) {
		$this->db->insert('biaya_paspor_haji',$data);
	}

	function get_biaya_paspor_haji_by_id($id) {
	   	$this->db->where('id_biaya_paspor',$id);
	   	$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=biaya_paspor_haji.id_peserta','left');
	   	return $this->db->get('biaya_paspor_haji');
	}

	function update_data_biaya_paspor_haji($data,$id) {
	  	$this->db->where('id_biaya_paspor',$id);
	   	$this->db->update('biaya_paspor_haji',$data);
	}

	function delete_biaya_paspor_haji($id) {
	   	$this->db->where('id_biaya_paspor',$id);
	   	$this->db->delete('biaya_paspor_haji');
	}

	// Hadyu & Tarwiyah Haji

	function kode_hadyu_tarwiyah_haji() {
		$this->db->select('RIGHT(biaya_hadyu_tarwiyah_haji.id_hadyu_tarwiyah,4) as kode', FALSE);
		$this->db->order_by('id_hadyu_tarwiyah','DESC');
		$this->db->limit(1);
		$query = $this->db->get('biaya_hadyu_tarwiyah_haji'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "HTH".$kodemax; // Hasilnya HTH0001 dst
		return $kodejadi;  
	}

	function hadyu_tarwiyah_haji() {
 		return $this->db->get('biaya_hadyu_tarwiyah_haji')->result();
	}

	function get_hadyu_tarwiyah_haji($config) {
		$this->db->get('biaya_hadyu_tarwiyah_haji');
		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=biaya_hadyu_tarwiyah_haji.id_peserta','left');
        $hasilquery=$this->db->get('biaya_hadyu_tarwiyah_haji', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_hadyu_tarwiyah_haji($keyword) {
		$this->db->where('id_hadyu_tarwiyah');
	   	$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=biaya_hadyu_tarwiyah_haji.id_peserta','left');
  		$this->db->like('id_hadyu_tarwiyah', $keyword)->or_like('nama_lengkap', $keyword)->or_like('biaya_hadyu', $keyword)->or_like('biaya_tarwiyah', $keyword)->or_like('keterangan', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('biaya_hadyu_tarwiyah_haji')->result();
	}

	function jumlah_hadyu_tarwiyah_haji() {
  		$query = $this->db->query("SELECT * FROM biaya_hadyu_tarwiyah_haji");
  		return $query->num_rows();
	}

	function insert_data_hadyu_tarwiyah_haji($data) {
		$this->db->insert('biaya_hadyu_tarwiyah_haji',$data);
	}

	function get_hadyu_tarwiyah_haji_by_id($id) {
	   	$this->db->where('id_hadyu_tarwiyah',$id);
	   	$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=biaya_hadyu_tarwiyah_haji.id_peserta','left');
	   	return $this->db->get('biaya_hadyu_tarwiyah_haji');
	}

	function update_data_hadyu_tarwiyah_haji($data,$id) {
	  	$this->db->where('id_hadyu_tarwiyah',$id);
	   	$this->db->update('biaya_hadyu_tarwiyah_haji',$data);
	}

	function delete_hadyu_tarwiyah_haji($id) {
	   	$this->db->where('id_hadyu_tarwiyah',$id);
	   	$this->db->delete('biaya_hadyu_tarwiyah_haji');
	}

	// Pembatalan Bimbingan Manasik

	function kode_pembatalan_bimsik() {
		$this->db->select('RIGHT(pembatalan_bimsik.id_pembatalan_bimsik,4) as kode', FALSE);
		$this->db->order_by('id_pembatalan_bimsik','DESC');
		$this->db->limit(1);
		$query = $this->db->get('pembatalan_bimsik'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PBM".$kodemax; // Hasilnya PBM0001 dst
		return $kodejadi;  
	}

	function pembatalan_bimsik() {
 		return $this->db->get('pembatalan_bimsik')->result();
	}

	function get_pembatalan_bimsik($config) {
		$this->db->get('pembatalan_bimsik');
		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=pembatalan_bimsik.id_peserta','left');
        $hasilquery=$this->db->get('pembatalan_bimsik', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_pembatalan_bimsik($keyword) {
		$this->db->where('id_pembatalan_bimsik');
	   	$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=pembatalan_bimsik.id_peserta','left');
  		$this->db->like('id_pembatalan_bimsik', $keyword)->or_like('nama_lengkap', $keyword)->or_like('tgl_pembatalan', $keyword)->or_like('biaya_kembali', $keyword)->or_like('keterangan', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('pembatalan_bimsik')->result();
	}

	function jumlah_pembatalan_bimsik() {
  		$query = $this->db->query("SELECT * FROM pembatalan_bimsik");
  		return $query->num_rows();
	}

	function insert_data_pembatalan_bimsik($data) {
		$this->db->insert('pembatalan_bimsik',$data);
	}

	function get_pembatalan_bimsik_by_id($id) {
	   	$this->db->where('id_pembatalan_bimsik',$id);
	   	$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=pembatalan_bimsik.id_peserta','left');
	   	return $this->db->get('pembatalan_bimsik');
	}

	function update_data_pembatalan_bimsik($data,$id) {
	  	$this->db->where('id_pembatalan_bimsik',$id);
	   	$this->db->update('pembatalan_bimsik',$data);
	}

	function delete_pembatalan_bimsik($id) {
	   	$this->db->where('id_pembatalan_bimsik',$id);
	   	$this->db->delete('pembatalan_bimsik');
	}

	// Badal Haji

	function kode_badal_haji() {
		$this->db->select('RIGHT(badal_haji.id_badal_haji,4) as kode', FALSE);
		$this->db->order_by('id_badal_haji','DESC');
		$this->db->limit(1);
		$query = $this->db->get('badal_haji'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "BDH".$kodemax; // Hasilnya BDH0001 dst
		return $kodejadi;  
	}

	function badal_haji() {
 		return $this->db->get('badal_haji');
	}

	function get_badal_haji($config) {  
        $hasilquery=$this->db->get('badal_haji', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_badal_haji($keyword) {
  		$this->db->like('id_badal_haji', $keyword)->or_like('nama_lengkap', $keyword)->or_like('bin_binti', $keyword)->or_like('dibadalkan_oleh', $keyword)->or_like('tahun', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('badal_haji')->result();
	}

	function jumlah_badal_haji() {
  		$query = $this->db->query("SELECT * FROM badal_haji");
  		return $query->num_rows();
	}

	function insert_data_badal_haji($data) {
		$this->db->insert('badal_haji',$data);
	}

	function get_badal_haji_by_id($id) {
	   	$this->db->where('id_badal_haji',$id);
	   	return $this->db->get('badal_haji');
	}

	function update_data_badal_haji($data,$id) {
	  	$this->db->where('id_badal_haji',$id);
	   	$this->db->update('badal_haji',$data);
	}

	function delete_badal_haji($id) {
	   	$this->db->where('id_badal_haji',$id);
	   	$this->db->delete('badal_haji');
	}

	// Pembayaran Badal Haji

	function kode_pembayaran_badal_haji() {
		$this->db->select('RIGHT(pembayaran_badal_haji.id_biaya_badal_haji,4) as kode', FALSE);
		$this->db->order_by('id_biaya_badal_haji','DESC');
		$this->db->limit(1);
		$query = $this->db->get('pembayaran_badal_haji'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PBD".$kodemax; // Hasilnya PBD0001 dst
		return $kodejadi;  
	}

	function pembayaran_badal_haji() {
 		return $this->db->get('pembayaran_badal_haji')->result();
	}

    function get_pembayaran_badal_haji($config) {
		$this->db->get('pembayaran_badal_haji');
		$this->db->join('badal_haji','badal_haji.id_badal_haji=pembayaran_badal_haji.id_badal_haji','left');
        $hasilquery=$this->db->get('pembayaran_badal_haji', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_pembayaran_badal_haji($keyword) {
		$this->db->where('id_biaya_badal_haji');
	   	$this->db->join('badal_haji','badal_haji.id_badal_haji=pembayaran_badal_haji.id_badal_haji','left');
  		$this->db->like('id_biaya_badal_haji', $keyword)->or_like('nama_lengkap', $keyword)->or_like('tgl_bayar', $keyword)->or_like('biaya', $keyword)->or_like('ket', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('pembayaran_badal_haji')->result();
	}

	function jumlah_pembayaran_badal_haji() {
  		$query = $this->db->query("SELECT * FROM pembayaran_badal_haji");
  		return $query->num_rows();
	}

	function insert_data_pembayaran_badal_haji($data) {
		$this->db->insert('pembayaran_badal_haji',$data);
	}

	function get_pembayaran_badal_haji_by_id($id) {
	   	$this->db->where('id_biaya_badal_haji',$id);
	   	$this->db->join('badal_haji','badal_haji.id_badal_haji=pembayaran_badal_haji.id_badal_haji','left');
	   	return $this->db->get('pembayaran_badal_haji');
	}

	function update_data_pembayaran_badal_haji($data,$id) {
	  	$this->db->where('id_biaya_badal_haji',$id);
	   	$this->db->update('pembayaran_badal_haji',$data);
	}

	function delete_pembayaran_badal_haji($id) {
	   	$this->db->where('id_biaya_badal_haji',$id);
	   	$this->db->delete('pembayaran_badal_haji');
	}

	// Kurban

	function kode_kurban() {
		$this->db->select('RIGHT(kurban.id_kurban,4) as kode', FALSE);
		$this->db->order_by('id_kurban','DESC');
		$this->db->limit(1);
		$query = $this->db->get('kurban'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "KRB".$kodemax; // Hasilnya KRB0001 dst
		return $kodejadi;  
	}

	function kurban() {
 		return $this->db->get('kurban');
	}

	function get_kurban($config) {  
        $hasilquery=$this->db->get('kurban', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_kurban($keyword) {
  		$this->db->like('id_kurban', $keyword)->or_like('nama_lengkap', $keyword)->or_like('bin_binti', $keyword)->or_like('jenis_kelamin', $keyword)->or_like('tahun', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('kurban')->result();
	}

	function jumlah_kurban() {
  		$query = $this->db->query("SELECT * FROM kurban");
  		return $query->num_rows();
	}

	function insert_data_kurban($data) {
		$this->db->insert('kurban',$data);
	}

	function get_kurban_by_id($id) {
	   	$this->db->where('id_kurban',$id);
	   	return $this->db->get('kurban');
	}

	function update_data_kurban($data,$id) {
	  	$this->db->where('id_kurban',$id);
	   	$this->db->update('kurban',$data);
	}

	function delete_kurban($id) {
	   	$this->db->where('id_kurban',$id);
	   	$this->db->delete('kurban');
	}

	// Pembayaran Kurban

	function kode_pembayaran_kurban() {
		$this->db->select('RIGHT(pembayaran_kurban.id_biaya_kurban,4) as kode', FALSE);
		$this->db->order_by('id_biaya_kurban','DESC');
		$this->db->limit(1);
		$query = $this->db->get('pembayaran_kurban'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PKB".$kodemax; // Hasilnya PKB0001 dst
		return $kodejadi;  
	}

	function pembayaran_kurban() {
 		return $this->db->get('pembayaran_kurban')->result();
	}

    function get_pembayaran_kurban($config) {
		$this->db->get('pembayaran_kurban');
		$this->db->join('kurban','kurban.id_kurban=pembayaran_kurban.id_kurban','left');
        $hasilquery=$this->db->get('pembayaran_kurban', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_pembayaran_kurban($keyword) {
		$this->db->where('id_biaya_kurban');
	   	$this->db->join('kurban','kurban.id_kurban=pembayaran_kurban.id_kurban','left');
  		$this->db->like('id_biaya_kurban', $keyword)->or_like('nama_lengkap', $keyword)->or_like('tgl_bayar', $keyword)->or_like('biaya', $keyword)->or_like('ket', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('pembayaran_kurban')->result();
	}

	function jumlah_pembayaran_kurban() {
  		$query = $this->db->query("SELECT * FROM pembayaran_kurban");
  		return $query->num_rows();
	}

	function insert_data_pembayaran_kurban($data) {
		$this->db->insert('pembayaran_kurban',$data);
	}

	function get_pembayaran_kurban_by_id($id) {
	   	$this->db->where('id_biaya_kurban',$id);
	   	$this->db->join('kurban','kurban.id_kurban=pembayaran_kurban.id_kurban','left');
	   	return $this->db->get('pembayaran_kurban');
	}

	function update_data_pembayaran_kurban($data,$id) {
	  	$this->db->where('id_biaya_kurban',$id);
	   	$this->db->update('pembayaran_kurban',$data);
	}

	function delete_pembayaran_kurban($id) {
	   	$this->db->where('id_biaya_kurban',$id);
	   	$this->db->delete('pembayaran_kurban');
	}

	// Pengeluaran Kantor

	function kode_pengeluaran_kantor() {
		$this->db->select('RIGHT(pengeluaran_kantor.id_pengeluaran,4) as kode', FALSE);
		$this->db->order_by('id_pengeluaran','DESC');
		$this->db->limit(1);
		$query = $this->db->get('pengeluaran_kantor'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PKT".$kodemax; // Hasilnya PKT0001 dst
		return $kodejadi;
	}

	function pengeluaran_kantor() {
 		return $this->db->get('pengeluaran_kantor');
	}

	function get_pengeluaran_kantor($config) {  
        $hasilquery=$this->db->get('pengeluaran_kantor', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_pengeluaran_kantor($keyword) {
  		$this->db->like('id_pengeluaran', $keyword)->or_like('nama_barang', $keyword)->or_like('jumlah', $keyword)->or_like('biaya', $keyword)->or_like('tgl_pengeluaran', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('pengeluaran_kantor')->result();
	}

	function jumlah_pengeluaran_kantor() {
  		$query = $this->db->query("SELECT * FROM pengeluaran_kantor");
  		return $query->num_rows();
	}

	function insert_data_pengeluaran_kantor($data) {
		$this->db->insert('pengeluaran_kantor',$data);
	}

	function get_pengeluaran_kantor_by_id($id) {
	   	$this->db->where('id_pengeluaran',$id);
	   	return $this->db->get('pengeluaran_kantor');
	}

	function update_data_pengeluaran_kantor($data,$id) {
	  	$this->db->where('id_pengeluaran',$id);
	   	$this->db->update('pengeluaran_kantor',$data);
	}

	function delete_pengeluaran_kantor($id) {
	   	$this->db->where('id_pengeluaran',$id);
	   	$this->db->delete('pengeluaran_kantor');
	}

	// Pengeluaran Operasional

	function kode_pengeluaran_operasional() {
		$this->db->select('RIGHT(pengeluaran_operasional.id_pengeluaran,4) as kode', FALSE);
		$this->db->order_by('id_pengeluaran','DESC');
		$this->db->limit(1);
		$query = $this->db->get('pengeluaran_operasional'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "PGO".$kodemax; // Hasilnya PGO0001 dst
		return $kodejadi;
	}

	function pengeluaran_operasional() {
 		return $this->db->get('pengeluaran_operasional');
	}

	function get_pengeluaran_operasional($config) {  
        $hasilquery=$this->db->get('pengeluaran_operasional', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_pengeluaran_operasional($keyword) {
  		$this->db->like('id_pengeluaran', $keyword)->or_like('nama_operasional', $keyword)->or_like('jumlah', $keyword)->or_like('biaya', $keyword)->or_like('tgl_pengeluaran', $keyword); // Mencari data yang serupa dengan keyword
  		return $this->db->get('pengeluaran_operasional')->result();
	}

	function jumlah_pengeluaran_operasional() {
  		$query = $this->db->query("SELECT * FROM pengeluaran_operasional");
  		return $query->num_rows();
	}

	function insert_data_pengeluaran_operasional($data) {
		$this->db->insert('pengeluaran_operasional',$data);
	}

	function get_pengeluaran_operasional_by_id($id) {
	   	$this->db->where('id_pengeluaran',$id);
	   	return $this->db->get('pengeluaran_operasional');
	}

	function update_data_pengeluaran_operasional($data,$id) {
	  	$this->db->where('id_pengeluaran',$id);
	   	$this->db->update('pengeluaran_operasional',$data);
	}

	function delete_pengeluaran_operasional($id) {
	   	$this->db->where('id_pengeluaran',$id);
	   	$this->db->delete('pengeluaran_operasional');
	}

	// Laporan Pendaftaran Haji

	function get_laporan_pendaftaran_haji() { 
	   	return $this->db->get('pendaftaran_haji')->result();
    }

    // Print Pendaftaran Haji

	function get_print_pendaftaran_haji() { 
		return $this->db->get('pendaftaran_haji')->result();
    }

    // Listing Pendaftaran Haji

 	function listing_pendaftaran_haji() {
 		$this->db->select('*');
		$this->db->from('pendaftaran_haji');
		$query = $this->db->get();
		return $query->result();
	}

    // Laporan Pendaftaran Umroh

	function get_laporan_pendaftaran_umroh() { 
	   	return $this->db->get('pendaftaran_umroh')->result();
    }

    // Print Pendaftaran Umroh

	function get_print_pendaftaran_umroh() { 
		return $this->db->get('pendaftaran_umroh')->result();
    }

    // Listing Pendaftaran Umroh

 	function listing_pendaftaran_umroh() {
 		$this->db->select('*');
		$this->db->from('pendaftaran_umroh');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Pendaftaran Bimbingan Manasik

	function get_laporan_pendaftaran_bimsik() { 
	   	return $this->db->get('pendaftaran_bimsik')->result();
    }

    // Print Pendaftaran Bimbingan Manasik

	function get_print_pendaftaran_bimsik() { 
		return $this->db->get('pendaftaran_bimsik')->result();
    }

    // Listing Pendaftaran Bimbingan Manasik

 	function listing_pendaftaran_bimsik() {
 		$this->db->select('*');
		$this->db->from('pendaftaran_bimsik');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Paket Haji Plus

	function get_laporan_paket_haji_plus() { 
	   	return $this->db->get('paket_haji_plus')->result();
    }

    // Print Paket Haji Plus

	function get_print_paket_haji_plus() { 
		return $this->db->get('paket_haji_plus')->result();
    }

    // Listing Paket Haji Plus

 	function listing_paket_haji_plus() {
 		$this->db->select('*');
		$this->db->from('paket_haji_plus');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Haji Plus

	function get_laporan_haji_plus() { 
		$this->db->join('paket_haji_plus','paket_haji_plus.id_paket_haji_plus=haji_plus.id_paket_haji_plus','left');
	   	return $this->db->get('haji_plus')->result();
    }

    // Print Haji Plus

	function get_print_haji_plus() { 
		$this->db->join('paket_haji_plus','paket_haji_plus.id_paket_haji_plus=haji_plus.id_paket_haji_plus','left');
		return $this->db->get('haji_plus')->result();
    }

    // Listing Haji Plus

 	function listing_haji_plus() {
 		$this->db->select('*');
 		$this->db->join('paket_haji_plus','paket_haji_plus.id_paket_haji_plus=haji_plus.id_paket_haji_plus','left');
		$this->db->from('haji_plus');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Paspor Haji Plus

	function get_laporan_paspor_haji_plus() { 
		$this->db->join('haji_plus','haji_plus.id_haji_plus=paspor_haji_plus.id_haji_plus','left');
	   	return $this->db->get('paspor_haji_plus')->result();
    }

    // Print Paspor Haji Plus

	function get_print_paspor_haji_plus() { 
		$this->db->join('haji_plus','haji_plus.id_haji_plus=paspor_haji_plus.id_haji_plus','left');
	   	return $this->db->get('paspor_haji_plus')->result();
    }

    // Listing Paspor Haji Plus

 	function listing_paspor_haji_plus() {
 		$this->db->select('*');
 		$this->db->join('haji_plus','haji_plus.id_haji_plus=paspor_haji_plus.id_haji_plus','left');
		$this->db->from('paspor_haji_plus');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Pembayaran Haji Plus

	function get_laporan_pembayaran_haji_plus() { 
		$this->db->join('haji_plus','haji_plus.id_haji_plus=pembayaran_haji_plus.id_haji_plus','left');
	   	return $this->db->get('pembayaran_haji_plus')->result();
    }

    // Print Pembayaran Haji Plus

	function get_print_pembayaran_haji_plus() { 
		$this->db->join('haji_plus','haji_plus.id_haji_plus=pembayaran_haji_plus.id_haji_plus','left');
	   	return $this->db->get('pembayaran_haji_plus')->result();
    }

    // Listing Pembayaran Haji Plus

 	function listing_pembayaran_haji_plus() {
 		$this->db->select('*');
 		$this->db->join('haji_plus','haji_plus.id_haji_plus=pembayaran_haji_plus.id_haji_plus','left');
		$this->db->from('pembayaran_haji_plus');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Pembayaran Paspor Haji Plus

	function get_laporan_pembayaran_paspor_haji_plus() { 
		$this->db->join('haji_plus','haji_plus.id_haji_plus=biaya_paspor_haji_plus.id_haji_plus','left');
	   	return $this->db->get('biaya_paspor_haji_plus')->result();
    }

    // Print Pembayaran Paspor Haji Plus

	function get_print_pembayaran_paspor_haji_plus() { 
		$this->db->join('haji_plus','haji_plus.id_haji_plus=biaya_paspor_haji_plus.id_haji_plus','left');
	   	return $this->db->get('biaya_paspor_haji_plus')->result();
    }

    // Listing Pembayaran Paspor Haji Plus

 	function listing_pembayaran_paspor_haji_plus() {
 		$this->db->select('*');
 		$this->db->join('haji_plus','haji_plus.id_haji_plus=biaya_paspor_haji_plus.id_haji_plus','left');
		$this->db->from('biaya_paspor_haji_plus');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Pembayaran Hadyu & Tarwiyah Haji Plus

	function get_laporan_hadyu_tarwiyah_haji_plus() { 
		$this->db->join('haji_plus','haji_plus.id_haji_plus=biaya_hadyu_tarwiyah_haji_plus.id_haji_plus','left');
	   	return $this->db->get('biaya_hadyu_tarwiyah_haji_plus')->result();
    }

    // Print Pembayaran Hadyu & Tarwiyah Haji Plus

	function get_print_hadyu_tarwiyah_haji_plus() { 
		$this->db->join('haji_plus','haji_plus.id_haji_plus=biaya_hadyu_tarwiyah_haji_plus.id_haji_plus','left');
	   	return $this->db->get('biaya_hadyu_tarwiyah_haji_plus')->result();
    }

    // Listing Pembayaran Hadyu & Tarwiyah Haji Plus

 	function listing_hadyu_tarwiyah_haji_plus() {
 		$this->db->select('*');
 		$this->db->join('haji_plus','haji_plus.id_haji_plus=biaya_hadyu_tarwiyah_haji_plus.id_haji_plus','left');
		$this->db->from('biaya_hadyu_tarwiyah_haji_plus');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Pembatalan Haji Plus

	function get_laporan_pembatalan_haji_plus() { 
		$this->db->join('haji_plus','haji_plus.id_haji_plus=pembatalan_haji_plus.id_haji_plus','left');
	   	return $this->db->get('pembatalan_haji_plus')->result();
    }

    // Print Pembatalan Haji Plus

	function get_print_pembatalan_haji_plus() { 
		$this->db->join('haji_plus','haji_plus.id_haji_plus=pembatalan_haji_plus.id_haji_plus','left');
	   	return $this->db->get('pembatalan_haji_plus')->result();
    }

    // Listing Pembatalan Haji Plus

 	function listing_pembatalan_haji_plus() {
 		$this->db->select('*');
 		$this->db->join('haji_plus','haji_plus.id_haji_plus=pembatalan_haji_plus.id_haji_plus','left');
		$this->db->from('pembatalan_haji_plus');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Paket Umroh

	function get_laporan_paket_umroh() { 
	   	return $this->db->get('paket_umroh')->result();
    }

    // Print Paket Umroh

	function get_print_paket_umroh() { 
		return $this->db->get('paket_umroh')->result();
    }

    // Listing Paket Umroh

 	function listing_paket_umroh() {
 		$this->db->select('*');
		$this->db->from('paket_umroh');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Umroh

	function get_laporan_umroh() { 
		$this->db->join('paket_umroh','paket_umroh.id_paket_umroh=umroh.id_paket_umroh','left');
	   	return $this->db->get('umroh')->result();
    }

    // Print Umroh

	function get_print_umroh() { 
		$this->db->join('paket_umroh','paket_umroh.id_paket_umroh=umroh.id_paket_umroh','left');
		return $this->db->get('umroh')->result();
    }

    // Listing Umroh

 	function listing_umroh() {
 		$this->db->select('*');
 		$this->db->join('paket_umroh','paket_umroh.id_paket_umroh=umroh.id_paket_umroh','left');
		$this->db->from('umroh');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Paspor Umroh

	function get_laporan_paspor_umroh() { 
		$this->db->join('umroh','umroh.id_umroh=paspor_umroh.id_umroh','left');
	   	return $this->db->get('paspor_umroh')->result();
    }

    // Print Paspor Umroh

	function get_print_paspor_umroh() { 
		$this->db->join('umroh','umroh.id_umroh=paspor_umroh.id_umroh','left');
	   	return $this->db->get('paspor_umroh')->result();
    }

    // Listing Paspor Umroh

 	function listing_paspor_umroh() {
 		$this->db->select('*');
 		$this->db->join('umroh','umroh.id_umroh=paspor_umroh.id_umroh','left');
		$this->db->from('paspor_umroh');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Pembayaran Umroh

	function get_laporan_pembayaran_umroh() { 
		$this->db->join('umroh','umroh.id_umroh=pembayaran_umroh.id_umroh','left');
	   	return $this->db->get('pembayaran_umroh')->result();
    }

    // Print Pembayaran Umroh

	function get_print_pembayaran_umroh() { 
		$this->db->join('umroh','umroh.id_umroh=pembayaran_umroh.id_umroh','left');
	   	return $this->db->get('pembayaran_umroh')->result();
    }

    // Listing Pembayaran Umroh

 	function listing_pembayaran_umroh() {
 		$this->db->select('*');
 		$this->db->join('umroh','umroh.id_umroh=pembayaran_umroh.id_umroh','left');
		$this->db->from('pembayaran_umroh');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Pembayaran Paspor Umroh

	function get_laporan_pembayaran_paspor_umroh() { 
		$this->db->join('umroh','umroh.id_umroh=biaya_paspor_umroh.id_umroh','left');
	   	return $this->db->get('biaya_paspor_umroh')->result();
    }

    // Print Pembayaran Paspor Umroh

	function get_print_pembayaran_paspor_umroh() { 
		$this->db->join('umroh','umroh.id_umroh=biaya_paspor_umroh.id_umroh','left');
	   	return $this->db->get('biaya_paspor_umroh')->result();
    }

    // Listing Pembayaran Paspor Umroh

 	function listing_pembayaran_paspor_umroh() {
 		$this->db->select('*');
 		$this->db->join('umroh','umroh.id_umroh=biaya_paspor_umroh.id_umroh','left');
		$this->db->from('biaya_paspor_umroh');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Pembatalan Umroh

	function get_laporan_pembatalan_umroh() { 
		$this->db->join('umroh','umroh.id_umroh=pembatalan_umroh.id_umroh','left');
	   	return $this->db->get('pembatalan_umroh')->result();
    }

    // Print Pembatalan Umroh

	function get_print_pembatalan_umroh() { 
		$this->db->join('umroh','umroh.id_umroh=pembatalan_umroh.id_umroh','left');
	   	return $this->db->get('pembatalan_umroh')->result();
    }

    // Listing Pembatalan Umroh

 	function listing_pembatalan_umroh() {
 		$this->db->select('*');
 		$this->db->join('umroh','umroh.id_umroh=pembatalan_umroh.id_umroh','left');
		$this->db->from('pembatalan_umroh');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Bimbingan Manasik

	function get_laporan_bimsik() { 
		return $this->db->get('bimbingan_manasik')->result();
    }

    // Print Bimbingan Manasik

	function get_print_bimsik() { 
		return $this->db->get('bimbingan_manasik')->result();
    }

    // Listing Bimbingan Manasik

 	function listing_bimsik() {
 		$this->db->select('*');
 		$this->db->from('bimbingan_manasik');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Paspor Bimbingan Manasik

	function get_laporan_paspor_bimsik() { 
		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=paspor_haji.id_peserta','left');
	   	return $this->db->get('paspor_haji')->result();
    }

    // Print Paspor Bimbingan Manasik

	function get_print_paspor_bimsik() { 
		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=paspor_haji.id_peserta','left');
	   	return $this->db->get('paspor_haji')->result();
    }

    // Listing Paspor Bimbingan Manasik

 	function listing_paspor_bimsik() {
 		$this->db->select('*');
 		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=paspor_haji.id_peserta','left');
		$this->db->from('paspor_haji');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Pembayaran Bimbingan Manasik

	function get_laporan_pembayaran_bimsik() {
		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=pembayaran_bimsik.id_peserta','left');
	   	return $this->db->get('pembayaran_bimsik')->result();
    }

    // Print Pembayaran Bimbingan Manasik

	function get_print_pembayaran_bimsik() { 
		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=pembayaran_bimsik.id_peserta','left');
	   	return $this->db->get('pembayaran_bimsik')->result();
    }

    // Listing Pembayaran Bimbingan Manasik

 	function listing_pembayaran_bimsik() {
 		$this->db->select('*');
 		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=pembayaran_bimsik.id_peserta','left');
		$this->db->from('pembayaran_bimsik');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Pembayaran Paspor Bimbingan Manasik

	function get_laporan_pembayaran_paspor_bimsik() { 
		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=biaya_paspor_haji.id_peserta','left');
	   	return $this->db->get('biaya_paspor_haji')->result();
    }

    // Print Pembayaran Paspor Bimbingan Manasik

	function get_print_pembayaran_paspor_bimsik() { 
		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=biaya_paspor_haji.id_peserta','left');
	   	return $this->db->get('biaya_paspor_haji')->result();
    }

    // Listing Pembayaran Paspor Bimbingan Manasik

 	function listing_pembayaran_paspor_bimsik() {
 		$this->db->select('*');
 		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=biaya_paspor_haji.id_peserta','left');
		$this->db->from('biaya_paspor_haji');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Pembayaran Hadyu & Tarwiyah Bimbingan Manasik

	function get_laporan_hadyu_tarwiyah_bimsik() { 
		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=biaya_hadyu_tarwiyah_haji.id_peserta','left');
	   	return $this->db->get('biaya_hadyu_tarwiyah_haji')->result();
    }

    // Print Pembayaran Hadyu & Tarwiyah Bimbingan Manasik

	function get_print_hadyu_tarwiyah_bimsik() { 
		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=biaya_hadyu_tarwiyah_haji.id_peserta','left');
	   	return $this->db->get('biaya_hadyu_tarwiyah_haji')->result();
    }

    // Listing Pembayaran Hadyu & Tarwiyah Bimbingan Manasik

 	function listing_hadyu_tarwiyah_bimsik() {
 		$this->db->select('*');
 		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=biaya_hadyu_tarwiyah_haji.id_peserta','left');
		$this->db->from('biaya_hadyu_tarwiyah_haji');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Pembatalan Bimbingan Manasik

	function get_laporan_pembatalan_bimsik() { 
		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=pembatalan_bimsik.id_peserta','left');
	   	return $this->db->get('pembatalan_bimsik')->result();
    }

    // Print Pembatalan Bimbingan Manasik

	function get_print_pembatalan_bimsik() { 
		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=pembatalan_bimsik.id_peserta','left');
	   	return $this->db->get('pembatalan_bimsik')->result();
    }

    // Listing Pembatalan Bimbingan Manasik

 	function listing_pembatalan_bimsik() {
 		$this->db->select('*');
 		$this->db->join('bimbingan_manasik','bimbingan_manasik.id_peserta=pembatalan_bimsik.id_peserta','left');
		$this->db->from('pembatalan_bimsik');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Badal Haji

	function get_laporan_badal_haji() { 
		return $this->db->get('badal_haji')->result();
    }

    // Print Badal Haji

	function get_print_badal_haji() { 
		return $this->db->get('badal_haji')->result();
    }

    // Listing Badal Haji

 	function listing_badal_haji() {
 		$this->db->select('*');
 		$this->db->from('badal_haji');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Pembayaran Badal Haji

	function get_laporan_pembayaran_badal_haji() { 
		$this->db->join('badal_haji','badal_haji.id_badal_haji=pembayaran_badal_haji.id_badal_haji','left');
	   	return $this->db->get('pembayaran_badal_haji')->result();
    }

    // Print Pembayaran Badal Haji

	function get_print_pembayaran_badal_haji() { 
		$this->db->join('badal_haji','badal_haji.id_badal_haji=pembayaran_badal_haji.id_badal_haji','left');
	   	return $this->db->get('pembayaran_badal_haji')->result();
    }

    // Listing Pembayaran Badal Haji

 	function listing_pembayaran_badal_haji() {
 		$this->db->select('*');
 		$this->db->join('badal_haji','badal_haji.id_badal_haji=pembayaran_badal_haji.id_badal_haji','left');
		$this->db->from('pembayaran_badal_haji');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Kurban

	function get_laporan_kurban() { 
		return $this->db->get('kurban')->result();
    }

    // Print Kurban

	function get_print_kurban() { 
		return $this->db->get('kurban')->result();
    }

    // Listing Kurban

 	function listing_kurban() {
 		$this->db->select('*');
 		$this->db->from('kurban');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Pembayaran Kurban

	function get_laporan_pembayaran_kurban() { 
		$this->db->join('kurban','kurban.id_kurban=pembayaran_kurban.id_kurban','left');
	   	return $this->db->get('pembayaran_kurban')->result();
    }

    // Print Pembayaran Kurban

	function get_print_pembayaran_kurban() { 
		$this->db->join('kurban','kurban.id_kurban=pembayaran_kurban.id_kurban','left');
	   	return $this->db->get('pembayaran_kurban')->result();
    }

    // Listing Pembayaran Kurban

 	function listing_pembayaran_kurban() {
 		$this->db->select('*');
 		$this->db->join('kurban','kurban.id_kurban=pembayaran_kurban.id_kurban','left');
		$this->db->from('pembayaran_kurban');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Pengeluaran Kantor

	function get_laporan_pengeluaran_kantor() { 
	   	return $this->db->get('pengeluaran_kantor')->result();
    }

    // Print Pengeluaran Kantor

	function get_print_pengeluaran_kantor() { 
		return $this->db->get('pengeluaran_kantor')->result();
    }

    // Listing Pengeluaran Kantor

 	function listing_pengeluaran_kantor() {
 		$this->db->select('*');
		$this->db->from('pengeluaran_kantor');
		$query = $this->db->get();
		return $query->result();
	}

	// Laporan Pengeluaran Operasional

	function get_laporan_pengeluaran_operasional() { 
	   	return $this->db->get('pengeluaran_operasional')->result();
    }

    // Print Pengeluaran Operasional

	function get_print_pengeluaran_operasional() { 
		return $this->db->get('pengeluaran_operasional')->result();
    }

    // Listing Pengeluaran Operasional

 	function listing_pengeluaran_operasional() {
 		$this->db->select('*');
		$this->db->from('pengeluaran_operasional');
		$query = $this->db->get();
		return $query->result();
	}

	// Manajemen User

	function kode_user() {
		$this->db->select('RIGHT(user.user_id,4) as kode', FALSE);
		$this->db->order_by('user_id','DESC');
		$this->db->limit(1);
		$query = $this->db->get('user'); // Cek dulu apakah ada sudah ada kode di tabel    
		if($query->num_rows() <> 0) {      
			// Jika kode ternyata sudah ada
		   	$data = $query->row();      
		   	$kode = intval($data->kode) + 1;    
		} else {      
			// Jika kode belum ada      
		   	$kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Angka 4 menunjukkan jumlah digit angka 0
		$kodejadi = "USR".$kodemax; // Hasilnya USR0001 dst
		return $kodejadi;  
	}

	function user() {
 		return $this->db->get('user')->result();
	}

	function get_user($config) { 
		$this->db->get('user');
		$this->db->join('level','level_id=user_level','left');
        $hasilquery=$this->db->get('user', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;
        }      
    }

	function search_user($keyword) {
  		$this->db->like('user_id', $keyword)->or_like('user_nama', $keyword)->or_like('user_jenis_kelamin', $keyword)->or_like('user_username', $keyword)->or_like('level_nama', $keyword); // Mencari data yang serupa dengan keyword
  		$this->db->join('level','level_id=user_level','left');
  		return $this->db->get('user')->result();
	}

	function jumlah_user() {
  		$query = $this->db->query("SELECT * FROM user");
  		return $query->num_rows();
	}

	function insert_data_user($data) {
		$this->db->insert('user',$data);
	}

	function get_user_by_id($id) {
	   	$this->db->where('user_id',$id);
	   	$this->db->join('level','level_id=user_level','left');
	   	return $this->db->get('user');
	}

	function update_data_user($data,$id) {
	  	$this->db->where('user_id',$id);
	   	$this->db->update('user',$data);
	}

	function delete_user($id) {
	   	$this->db->where('user_id',$id);
	   	$this->db->delete('user');
	}
}