<html>
	<head>
		<title> Laporan Pembayaran Kurban </title>
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
		<center><h4> Laporan Data Pembayaran Kurban <br> KBIH Al-Hidayah Kota Cirebon <br> Bulan <?php echo $blnnama; echo " "; echo date('Y'); ?></h4></center>
		<table width="100%" border="solid" bgcolor="white" align="center">
			<tr style="font-weight:bold;" bgcolor="orange" align="center">
				<th> No. </th>
				<th> Id. Pembayaran </th>
				<th> Nama Jamaah </th>
                <th> Tgl. Pembayaran </th>
                <th> Biaya </th>
                <th> Dibayar Oleh </th>
                <th> No. Telepon </th>
                <th> Alamat </th>
                <th> Keterangan </th>
			</tr>
			<?php
               $no_urut = 0;
               foreach($print_pembayaran_kurban as $row)
               {
               	  $no_urut++;
                  ?>
                  <tr>
                  	 <td align='center'><?php echo $no_urut;?></td>
                     <td><?php echo $row->id_biaya_kurban;?></td>
                     <td><?php echo $row->nama_lengkap;?></td>
                     <td><?php echo $row->tgl_bayar;?></td>
                     <td><?php echo $row->biaya;?></td>
                     <td><?php echo $row->dibayar_oleh;?></td>
                     <td><?php echo $row->no_telepon;?></td>
                     <td><?php echo $row->alamat;?></td>
                     <td><?php echo $row->ket;?></td>
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