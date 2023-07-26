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
		<?php 
			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=laporan_pembayaran_bimsik.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
		?>			
		<center><h4> Laporan Data Pembayaran Bimbingan Manasik <br> KBIH Al-Hidayah Kota Cirebon <br> Bulan <?php echo $blnnama; echo " "; echo date('Y'); ?></h4></center>
		<table width="100%" border="solid" bgcolor="white" align="center">
			<tr style="font-weight:bold;" bgcolor="orange" align="center">
				<th> No. </th>
				<th> Id. Pembayaran </th>
				<th> Nama Peserta </th>
                <th> Tgl. Angsuran 1 </th>
                <th> Angsuran 1 </th>
                <th> Tgl. Angsuran 2 </th>
                <th> Angsuran 2 </th>
                <th> Tgl. Angsuran 3 </th>
                <th> Angsuran 3 </th>
                <th> Tgl. Angsuran 4 </th>
                <th> Angsuran 4 </th>
                <th> Tgl. Angsuran 5 </th>
                <th> Angsuran 5 </th>
                <th> Tgl. Angsuran 6 </th>
                <th> Angsuran 6 </th>
                <th> Tgl. Angsuran 7 </th>
                <th> Angsuran 7 </th>
                <th> Tgl. Angsuran 8 </th>
                <th> Angsuran 8 </th>
                <th> Tgl. Angsuran 9 </th>
                <th> Angsuran 9 </th>
                <th> Tgl. Angsuran 10 </th>
                <th> Angsuran 10 </th>
                <th> Tgl. Angsuran 11 </th>
                <th> Angsuran 11 </th>
                <th> Tgl. Angsuran 12 </th>
                <th> Angsuran 12 </th>
                <th> Tgl. Angsuran 13 </th>
                <th> Angsuran 13 </th>
                <th> Tgl. Angsuran 14 </th>
                <th> Angsuran 14 </th>
                <th> Tgl. Angsuran 15 </th>
                <th> Angsuran 15 </th>
                <th> Total Jumlah </th>
                <th> Keterangan </th>
			</tr>
			<?php
               $no_urut = 0;
               foreach($pembayaran_bimsik as $row)
               {
               	  $no_urut++;
                  ?>
                  <tr>
                  	 <td align='center'><?php echo $no_urut;?></td>
                     <td><?php echo $row->id_biaya_bimsik;?></td>
                     <td><?php echo $row->nama_lengkap;?></td>
                     <td><?php echo $row->tgl_angsuran_1;?></td>
                     <td><?php echo $row->angsuran_1;?></td>
                     <td><?php echo $row->tgl_angsuran_2;?></td>
                     <td><?php echo $row->angsuran_2;?></td>
                     <td><?php echo $row->tgl_angsuran_3;?></td>
                     <td><?php echo $row->angsuran_3;?></td>
                     <td><?php echo $row->tgl_angsuran_4;?></td>
                     <td><?php echo $row->angsuran_4;?></td>
                     <td><?php echo $row->tgl_angsuran_5;?></td>
                     <td><?php echo $row->angsuran_5;?></td>
                     <td><?php echo $row->tgl_angsuran_6;?></td>
                     <td><?php echo $row->angsuran_6;?></td>
                     <td><?php echo $row->tgl_angsuran_7;?></td>
                     <td><?php echo $row->angsuran_7;?></td>
                     <td><?php echo $row->tgl_angsuran_8;?></td>
                     <td><?php echo $row->angsuran_8;?></td>
                     <td><?php echo $row->tgl_angsuran_9;?></td>
                     <td><?php echo $row->angsuran_9;?></td>
                     <td><?php echo $row->tgl_angsuran_10;?></td>
                     <td><?php echo $row->angsuran_10;?></td>
                     <td><?php echo $row->tgl_angsuran_11;?></td>
                     <td><?php echo $row->angsuran_11;?></td>
                     <td><?php echo $row->tgl_angsuran_12;?></td>
                     <td><?php echo $row->angsuran_12;?></td>
                     <td><?php echo $row->tgl_angsuran_13;?></td>
                     <td><?php echo $row->angsuran_13;?></td>
                     <td><?php echo $row->tgl_angsuran_14;?></td>
                     <td><?php echo $row->angsuran_14;?></td>
                     <td><?php echo $row->tgl_angsuran_15;?></td>
                     <td><?php echo $row->angsuran_15;?></td>
                     <td><?php echo $row->total_jumlah;?></td>
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