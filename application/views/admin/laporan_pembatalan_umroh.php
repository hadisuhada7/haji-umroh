<html>
	<head>
		<title> Laporan Pembatalan Umroh </title>
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
		<center><h4> Laporan Data Pembatalan Umroh <br> KBIH Al-Hidayah Kota Cirebon <br> Bulan <?php echo $blnnama; echo " "; echo date('Y'); ?></h4></center>
		<table width="100%" border="solid" bgcolor="white" align="center">
			<tr style="font-weight:bold;" bgcolor="orange" align="center">
				<th> No. </th>
				<th> Id. Pembatalan </th>
				<th> Nama Jamaah </th>
                <th> Tgl. Pembatalan </th>
                <th> Biaya Paket </th>
                <th> Biaya Paspor </th>
                <th> Biaya Pengembalian </th>
                <th> Keterangan </th>
			</tr>
			<?php
               $no_urut = 0;
               foreach($laporan_pembatalan_umroh as $row)
               {
               	  $no_urut++;
                  ?>
                  <tr>
                  	 <td align='center'><?php echo $no_urut;?></td>
                     <td><?php echo $row->id_pembatalan_umroh;?></td>
                     <td><?php echo $row->nama_lengkap;?></td>
                     <td><?php echo $row->tgl_pembatalan;?></td>
                     <td><?php echo $row->biaya_paket;?></td>
                     <td><?php echo $row->biaya_paspor;?></td>
                     <td><?php echo $row->biaya_kembali;?></td>
                     <td><?php echo $row->keterangan;?></td>
                  </tr>
                  <?php
               }
            ?>
		</table>
		<br>
			<input type="button" style="margin-left:41.7%" class="button" value="Print Document" onclick="print_d()"/>
			<input type="button" class="button" value="Export Excel" onclick="export_e()"/>
		<script>
			function print_d(){
				window.open("<?php echo base_url();?>index.php/welcome/print_pembatalan_umroh","_blank");
			}
			function export_e(){
				window.open("<?php echo base_url();?>index.php/welcome/export_excel_pembatalan_umroh");
			}
		</script>
		<br>
		<div style="margin-left:85%;">
			Dicetak Oleh, <br><br><br>
			<u><?php echo $this->session->userdata('nama');?></u>
			<br>
			Dicetak Tanggal : <?php echo date('d-m-Y'); ?>
		</div>
		<br>
	</body>
</html>