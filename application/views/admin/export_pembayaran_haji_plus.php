<html>
	<head>
		<title> Laporan Pembayaran Haji Plus </title>
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
			header("Content-Disposition: attachment; filename=laporan_pembayaran_haji_plus.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
		?>			
		<center><h4> Laporan Data Pembayaran Haji Plus <br> KBIH Al-Hidayah Kota Cirebon <br> Bulan <?php echo $blnnama; echo " "; echo date('Y'); ?></h4></center>
		<table width="100%" border="solid" bgcolor="white" align="center">
			<tr style="font-weight:bold;" bgcolor="orange" align="center">
				<th> No. </th>
				<th> Id. Pembayaran </th>
				<th> Nama Jamaah </th>
                <th> Tgl. Deposit </th>
                <th> Biaya Deposit </th>
                <th> Tgl. Pelunasan </th>
                <th> Biaya Pelunasan </th>
                <th> Total Jumlah </th>
                <th> Tgl. Upgrade Kamar </th>
                <th> Biaya Upgrade Kamar </th>
                <th> Fasilitas </th>
                <th> Keterangan </th>
			</tr>
			<?php
               $no_urut = 0;
               foreach($pembayaran_haji_plus as $row)
               {
               	  $no_urut++;
                  ?>
                  <tr>
                  	 <td align='center'><?php echo $no_urut;?></td>
                     <td><?php echo $row->id_biaya_haji_plus;?></td>
                     <td><?php echo $row->nama_lengkap;?></td>
                     <td><?php echo $row->tgl_dp;?></td>
                     <td><?php echo $row->biaya_dp;?></td>
                     <td><?php echo $row->tgl_pelunasan;?></td>
                     <td><?php echo $row->biaya_pelunasan;?></td>
                     <td><?php echo $row->total_jumlah;?></td>
                     <td><?php echo $row->tgl_upgrade_kamar;?></td>
                     <td><?php echo $row->biaya_upgrade_kamar;?></td>
                     <td><?php echo $row->fasilitas;?></td>
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