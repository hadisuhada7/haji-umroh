<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Rincian Data Pembatalan Umroh </span>
      </div>
      <div id='main'>

         <table width='100%'>
            <?php
               foreach($pembatalan_umroh->result() as $row)
               {
                  ?>
                  <tr>
                     <td width='180px'><b>Id. Pembatalan</b></td>
                     <td width='10px'>:</td>
                     <td>
                        <?php echo $row->id_pembatalan_umroh;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Nama Jamaah</b></td>
                     <td>:</td>
                     <td>
                        <a href='<?php echo base_url()."index.php/welcome/detail_umroh/".$row->id_umroh;?>'><?php echo $row->nama_lengkap;?></a>
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
                     <td><b>Biaya Paket</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya_paket;?>
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
                     <td><b>Biaya Upgrade Kamar</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya_upgrade_kamar;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya Surat Mahrom</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya_surat_mahrom;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya Visa Second Entry</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya_visa_second_entry;?>
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