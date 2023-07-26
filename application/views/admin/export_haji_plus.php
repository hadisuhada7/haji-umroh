<html>
	<head>
		<title> Laporan Haji Plus </title>
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
		<?php 
			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=laporan_haji_plus.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
		?>			
		<center><h4> Laporan Data Haji Plus <br> KBIH Al-Hidayah Kota Cirebon <br> Bulan <?php echo $blnnama; echo " "; echo date('Y'); ?></h4></center>
		<table width="100%" border="solid" bgcolor="white" align="center">
			<tr style="font-weight:bold;" bgcolor="orange" align="center">
				<th> No. </th>
				<th> Id. Haji Plus </th>
				<th> Tanggal Pendaftaran </th>
				<th> Program Haji </th>
				<th> Nomor Induk Keluarga </th>
                <th> Nama Lengkap </th>
                <th> Bin / Binti </th>
                <th> Tempat Lahir </th>
                <th> Tanggal Lahir </th>
                <th> Jenis Kelamin </th>
                <th> Golongan Darah </th>
                <th> Alamat </th>
                <th> Kode Pos </th>
                <th> Kelurahan / Desa </th>
                <th> Kecamatan </th>
                <th> Kabupaten / Kota </th>
                <th> Provinsi </th>
                <th> Agama </th>
                <th> Status Perkawinan </th>
                <th> Pendidikan </th>
                <th> Pekerjaan </th>
                <th> No. Telepon </th>
                <th> Email </th>
                <th> Riwayat Penyakit </th>
                <th> Status Haji </th>
                <th> Mahrom / Muhrim </th>
                <th> Tahun Keberangkatan </th>
                <th> Foto </th>
			</tr>
			<?php
               $no_urut = 0;
               foreach($haji_plus as $row)
               {
               	  $no_urut++;
                  ?>
                  <tr>
                  	 <td align='center'><?php echo $no_urut;?></td>
                     <td><?php echo $row->id_haji_plus;?></td>
                     <td><?php echo $row->tgl_daftar;?></td>
                     <td><?php echo $row->nama_program;?></td>
                     <td>'<?php echo $row->nik;?></td>
                     <td><?php echo $row->nama_lengkap;?></td>
                     <td><?php echo $row->bin_binti;?></td>
                     <td><?php echo $row->tempat_lahir;?></td>
                     <td><?php echo $row->tgl_lahir;?></td>
                     <td><?php echo $row->jenis_kelamin;?></td>
                     <td><?php echo $row->gol_darah;?></td>
                     <td><?php echo $row->alamat;?></td>
                     <td><?php echo $row->kode_pos;?></td>
                     <td><?php echo $row->kel_desa;?></td>
                     <td><?php echo $row->kecamatan;?></td>
                     <td><?php echo $row->kab_kota;?></td>
                     <td><?php echo $row->provinsi;?></td>
                     <td><?php echo $row->agama;?></td>
                     <td><?php echo $row->status_perkawinan;?></td>
                     <td><?php echo $row->pendidikan;?></td>
                     <td><?php echo $row->pekerjaan;?></td>
                     <td>'<?php echo $row->no_telepon;?></td>
                     <td><?php echo $row->email;?></td>
                     <td><?php echo $row->riwayat_penyakit;?></td>
                     <td><?php echo $row->status_haji;?></td>
                     <td><?php echo $row->mahrom_muhrim;?></td>
                     <td><?php echo $row->tahun;?></td>
                     <td><?php echo $row->foto;?></td>
                  </tr>
                  <?php
               }
            ?>
		</table>
		<br><br>
		<div style="margin-left:85%;">
			Dicetak Oleh, <br><br><br>
			<u><?php echo $this->session->userdata('nama');?></u>
			<br>
			Dicetak Tanggal : <?php echo date('d-m-Y'); ?>
		</div>
	</body>
</html>