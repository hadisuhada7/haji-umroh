<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Rincian Data Pembatalan Bimbingan Manasik </span>
      </div>
      <div id='main'>

         <table width='100%'>
            <?php
               foreach($pembatalan_bimsik->result() as $row)
               {
                  ?>
                  <tr>
                     <td width='180px'><b>Id. Pembatalan</b></td>
                     <td width='10px'>:</td>
                     <td>
                        <?php echo $row->id_pembatalan_bimsik;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Nama Jamaah</b></td>
                     <td>:</td>
                     <td>
                        <a href='<?php echo base_url()."index.php/welcome/detail_bimsik/".$row->id_peserta;?>'><?php echo $row->nama_lengkap;?></a>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_pembatalan;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Alasan</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->alasan;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya Bimbingan Manasik</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya_bimsik;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya Paspor</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya_paspor;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya Hadyu</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya_hadyu;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya Tarwiyah</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya_tarwiyah;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya Administrasi</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya_admin;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya Pengembalian</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya_kembali;?>
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