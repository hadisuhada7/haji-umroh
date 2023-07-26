<html>
	<head>
		<title> Pendaftaran Haji </title>
		<link rel='shortcut icon' href="<?php echo base_url();?>asset/admin/images/favicon.jpg"/>
	</head>
	<body>
		<?php
			$bln = date('m');
			switch($bln){
				case 1:
					$blnnama = "Januari";
					break;
				case 2:
					$blnnama = "Februari";
					break;
				case 3:
					$blnnama = "Maret";
					break;
				case 4:
					$blnnama = "April";
					break;
				case 5:
					$blnnama = "Mei";
					break;
				case 6:
					$blnnama = "Juni";
					break;
				case 7:
					$blnnama = "Juli";
					break;
				case 8:
					$blnnama = "Agustus";
					break;
				case 9:
					$blnnama = "September";
					break;
				case 10:
					$blnnama = "Oktober";
					break;
				case 11:
					$blnnama = "November";
					break;
				case 12:
					$blnnama = "Desember";
					break;
				case 1:
					$blnnama = "Januari";
					break;
			}
		?>
		<center>
         <img src="<?php echo base_url();?>asset/admin/images/logo.png" width="100" height="100" border="0">
         <h4> Data Pendaftaran Haji <br> KBIH Al-Hidayah Kota Cirebon </h4>
      </center>
      <br>
		<table width="70%" align="center">
            <?php
               foreach($print_pendaftaran_haji as $row)
               {
                  ?>
                  <tr>
                     <td width='180px'><b>Id. Pendaftaran</b></td>
                     <td width='10px'>:</td>
                     <td>
                        <?php echo $row->id_pendaftaran_haji;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Tanggal Pendaftaran</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_daftar;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Nomor Induk Keluarga</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->nik;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Nama Lengkap</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->nama_lengkap;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Tempat Lahir</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tempat_lahir;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Tanggal Lahir</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_lahir;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Jenis Kelamin</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->jenis_kelamin;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Alamat</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->alamat;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Kelelurahan / Desa</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->kel_desa;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Kecamatan</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->kecamatan;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Kabupaten / Kota</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->kab_kota;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Provinsi</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->provinsi;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>No. Telepon</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->no_telepon;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>No. Handphone</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->no_handphone;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Email</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->email;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Paket Haji</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->paket_haji;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Keterangan</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->keterangan;?>
                  </tr>
                  <?php
               }
            ?>
        </table>
      <br>
        <table width="70%" align="center">
            <tr>
               <td> Dengan ini, saya bersedia menandatangani formulir pendaftaran haji, serta akan menerima dan tunduk pada ketentuan yang berlaku. </td>
            </tr>
        </table>
		<br><br><br>
		<div style="margin-left:70%;">
			Cirebon, <?php echo date('d-m-Y'); ?> <br>
         	<b>Pendaftar,</b> <br><br><br><br><br>
			<u><b><?php echo $row->nama_lengkap;?></b></u>
			<br>
			Calon Jamaah Haji
		</div>
		<br><br>
		<script>
			window.load = print_d();
			function print_d(){
				window.print();
			}
		</script>
	</body>
</html>