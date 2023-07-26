<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Rincian Data Pembayaran Bimbingan Manasik </span>
      </div>
      <div id='main'>

         <table width='100%'>
            <?php
               foreach($pembayaran_bimsik->result() as $row)
               {
                  ?>
                  <tr>
                     <td width='180px'><b>Id. Pembayaran</b></td>
                     <td width='10px'>:</td>
                     <td>
                        <?php echo $row->id_biaya_bimsik;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Nama Jamaah</b></td>
                     <td>:</td>
                     <td>
                        <a href='<?php echo base_url()."index.php/welcome/detail_bimsik/".$row->id_peserta;?>'><?php echo $row->nama_lengkap;?></a>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Angsuran 1 </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_angsuran_1;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->angsuran_1;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Angsuran 2 </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_angsuran_2;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->angsuran_2;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Angsuran 3 </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_angsuran_3;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->angsuran_3;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Angsuran 4 </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_angsuran_4;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->angsuran_4;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Angsuran 5 </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_angsuran_5;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->angsuran_5;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Angsuran 6 </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_angsuran_6;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->angsuran_6;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Angsuran 7 </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_angsuran_7;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->angsuran_7;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Angsuran 8 </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_angsuran_8;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->angsuran_8;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Angsuran 9 </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_angsuran_9;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->angsuran_9;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Angsuran 10 </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_angsuran_10;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->angsuran_10;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Angsuran 11 </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_angsuran_11;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->angsuran_11;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Angsuran 12 </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_angsuran_12;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->angsuran_12;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Angsuran 13 </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_angsuran_13;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->angsuran_13;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Angsuran 14 </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_angsuran_14;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->angsuran_14;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Angsuran 15 </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_angsuran_15;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->angsuran_15;?>
                     </td>
                  </tr>
                  <td colspan="3"><hr></td>
                  <tr> 
                     <td><b>Total Jumlah</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->total_jumlah;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Keterangan</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->keterangan;?>
                     </td>
                  </tr>
                  
                  <?php
               }
            ?>
         </table>
         <br>
         <center><input type=button class=button value=Kembali onclick=self.history.back()></center>
      </div>
   </div>
</div>