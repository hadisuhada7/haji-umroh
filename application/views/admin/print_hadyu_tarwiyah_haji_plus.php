<html>
	<head>
		<title> Laporan Pembayaran Hadyu & Tarwiyah Haji Plus </title>
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
		<center><h4> Laporan Data Pembayaran Hadyu & Tarwiyah Haji Plus <br> KBIH Al-Hidayah Kota Cirebon <br> Bulan <?php echo $blnnama; echo " "; echo date('Y'); ?></h4></center>
		<table width="100%" border="solid" bgcolor="white" align="center">
			<tr style="font-weight:bold;" bgcolor="orange" align="center">
				<th> No. </th>
				<th> Id. Pembayaran </th>
				<th> Nama Jamaah </th>
                <th> Tgl. Bayar Hadyu </th>
                <th> Biaya Hadyu </th>
                <th> Tgl. Bayar Tarwiyah </th>
                <th> Biaya Tarwiyah </th>
                <th> Keterangan </th>
			</tr>
			<?php
               $no_urut = 0;
               foreach($print_hadyu_tarwiyah_haji_plus as $row)
               {
               	  $no_urut++;
                  ?>
                  <tr>
                  	 <td align='center'><?php echo $no_urut;?></td>
                     <td><?php echo $row->id_hadyu_tarwiyah;?></td>
                     <td><?php echo $row->nama_lengkap;?></td>
                     <td><?php echo $row->tgl_bayar_hadyu;?></td>
                     <td><?php echo $row->biaya_hadyu;?></td>
                     <td><?php echo $row->tgl_bayar_tarwiyah;?></td>
                     <td><?php echo $row->biaya_tarwiyah;?></td>
                     <td><?php echo $row->keterangan;?></td>
                  </tr>
                  <?php
               }
            ?>
		</table>
		<script>
			window.load = print_d();
			function print_d(){
				window.print();
			}
		</script>
		<br><br>
		<div style="margin-left:85%;">
			Dicetak Oleh, <br><br><br>
			<u><?php echo $this->session->userdata('nama');?></u>
			<br>
			Dicetak Tanggal : <?php echo date('d-m-Y'); ?>
		</div>
	</body>
</html>