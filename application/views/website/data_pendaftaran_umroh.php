<html>
	<head>
		<title> Pendaftaran Umroh </title>
		<link rel='shortcut icon' href="<?php echo base_url();?>asset/admin/images/favicon.jpg"/>
		<style>
			.button {
				font-size: 12px;
				font-weight:bold;
				padding: 7px 12px;
				cursor:pointer;	
				line-height:16px;
				display:inline-block;	
				border-radius: 2px;
				-moz-border-radius: 2px;
				-webkit-border-radius: 2px;	
				box-shadow: #e3e3e3 0 1px 1px;	
				-moz-box-shadow:
					0px 1px 1px rgba(000,000,000,0.1),
					inset 0px 1px 1px rgba(255,255,255,0.7);
				-webkit-box-shadow:
					0px 1px 1px rgba(000,000,000,0.1),
					inset 0px 1px 1px rgba(255,255,255,0.7);	
				behavior:url(PIE.htc);				
			}
			.button {
				text-shadow: 1px 1px 0px #f8f8f8;
				color: #717171;
				border: 1px solid #d3d3d3;	
			    background: #ededed;
			    background: -webkit-gradient(linear, 0 0, 0 100%, from(#f9f9f9) to(#ededed)); 
			    background: -webkit-linear-gradient(#f9f9f9, #ededed);
			    background: -moz-linear-gradient(#f9f9f9, #ededed); 
			    background: -ms-linear-gradient(#f9f9f9, #ededed);
			    background: -o-linear-gradient(#f9f9f9, #ededed); 
			    background: linear-gradient(#f9f9f9, #ededed); 
			    -pie-background: linear-gradient(#f9f9f9, #ededed); 	
			}
			.button:hover {
			    background: #ededed; 
			    background: -webkit-gradient(linear, 0 0, 0 100%, from(#ededed) to(#f9f9f9)); 
			    background: -webkit-linear-gradient(#ededed, #f9f9f9); 
			    background: -moz-linear-gradient(#ededed, #f9f9f9); 
			    background: -ms-linear-gradient(#ededed, #f9f9f9); 
			    background: -o-linear-gradient(#ededed, #f9f9f9); 
			    background: linear-gradient(#ededed, #f9f9f9); 
			    -pie-background: linear-gradient(#ededed, #f9f9f9);
			}
		</style>
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
         <h4> Data Pendaftaran Umroh <br> KBIH Al-Hidayah Kota Cirebon </h4>
      </center>
      <br>
		<table width="70%" align="center">
            <?php
               foreach($pendaftaran_umroh->result() as $row)
               {
                  ?>
                  <tr>
                     <td width='180px'><b>Id. Pendaftaran</b></td>
                     <td width='10px'>:</td>
                     <td>
                        <?php echo $row->id_pendaftaran_umroh;?>
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
                     <td><b>Paket Umroh</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->paket_umroh;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Tanggal Keberangkatan</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_keberangkatan;?>
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
               <td> Dengan ini, saya bersedia menandatangani formulir pendaftaran umroh, serta akan menerima dan tunduk pada ketentuan yang berlaku. </td>
            </tr>
        </table>
		<br><br><br>
		<div style="margin-left:70%;">
			Cirebon, <?php echo date('d-m-Y'); ?> <br>
         <b>Pendaftar,</b> <br><br><br><br><br>
			<u><b><?php echo $row->nama_lengkap;?></b></u>
			<br>
			Calon Jamaah Umroh
		</div>
		<br><br>
      <input type="button" style="margin-left:41.7%" class="button" value="Print Document" onclick="print_d()"/>
      <script>
         function print_d(){
            window.open("<?php echo base_url();?>index.php/website/print_pendaftaran_umroh","_blank");
         }
      </script>
      <br><br>
	</body>
</html>