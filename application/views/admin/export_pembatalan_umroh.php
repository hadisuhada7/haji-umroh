<html>
	<head>
		<title> Laporan Pembatalan Umroh </title>
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
			header("Content-Disposition: attachment; filename=laporan_pembatalan_umroh.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
		?>			
		<center><h4> Laporan Data Pembatalan Umroh <br> KBIH Al-Hidayah Kota Cirebon <br> Bulan <?php echo $blnnama; echo " "; echo date('Y'); ?></h4></center>
		<table width="100%" border="solid" bgcolor="white" align="center">
			<tr style="font-weight:bold;" bgcolor="orange" align="center">
				<th> No. </th>
				<th> Id. Pembatalan </th>
				<th> Nama Jamaah </th>
                <th> Tgl. Pembatalan </th>
                <th> Alasan </th>
                <th> Biaya Paket </th>
                <th> Biaya Paspor </th>
                <th> Biaya Upgrade Kamar </th>
                <th> Biaya Surat Mahrom </th>
                <th> Biaya Visa Second Entry </th>
                <th> Biaya Administrasi </th>
                <th> Biaya Pengembalian </th>
                <th> Keterangan </th>
			</tr>
			<?php
               $no_urut = 0;
               foreach($pembatalan_umroh as $row)
               {
               	  $no_urut++;
                  ?>
                  <tr>
                  	 <td align='center'><?php echo $no_urut;?></td>
                     <td><?php echo $row->id_pembatalan_umroh;?></td>
                     <td><?php echo $row->nama_lengkap;?></td>
                     <td><?php echo $row->tgl_pembatalan;?></td>
                     <td><?php echo $row->alasan;?></td>
                     <td><?php echo $row->biaya_paket;?></td>
                     <td><?php echo $row->biaya_paspor;?></td>
                     <td><?php echo $row->biaya_upgrade_kamar;?></td>
                     <td><?php echo $row->biaya_surat_mahrom;?></td>
                     <td><?php echo $row->biaya_visa_second_entry;?></td>
                     <td><?php echo $row->biaya_admin;?></td>
                     <td><?php echo $row->biaya_kembali;?></td>
                     <td><?php echo $row->keterangan;?></td>
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