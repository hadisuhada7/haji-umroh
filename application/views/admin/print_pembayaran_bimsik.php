<html>
	<head>
		<title> Laporan Pembayaran Bimbingan Manasik </title>
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
		<center><h4> Laporan Data Pembayaran Bimbingan Manasik <br> KBIH Al-Hidayah Kota Cirebon <br> Bulan <?php echo $blnnama; echo " "; echo date('Y'); ?></h4></center>
		<table width="100%" border="solid" bgcolor="white" align="center">
			<tr style="font-weight:bold;" bgcolor="orange" align="center">
				<th> No. </th>
				<th> Id. Pembayaran </th>
				<th> Nama Peserta </th>
                <th> Angsuran 1 </th>
                <th> Angsuran 2 </th>
                <th> Angsuran 3 </th>
                <th> Angsuran 4 </th>
                <th> Angsuran 5 </th>
                <th> Total Jumlah </th>
                <th> Keterangan </th>
			</tr>
			<?php
               $no_urut = 0;
               foreach($print_pembayaran_bimsik as $row)
               {
               	  $no_urut++;
                  ?>
                  <tr>
                  	 <td align='center'><?php echo $no_urut;?></td>
                     <td><?php echo $row->id_biaya_bimsik;?></td>
                     <td><?php echo $row->nama_lengkap;?></td>
                     <td><?php echo $row->angsuran_1;?></td>
                     <td><?php echo $row->angsuran_2;?></td>
                     <td><?php echo $row->angsuran_3;?></td>
                     <td><?php echo $row->angsuran_4;?></td>
                     <td><?php echo $row->angsuran_5;?></td>
                     <td><?php echo $row->total_jumlah;?></td>
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