<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Rincian Data Paspor Haji Plus </span>
      </div>
      <div id='main'>

         <table width='100%'>
            <?php
               foreach($paspor_haji_plus->result() as $row)
               {
                  ?>
                  <tr>
                     <td width='180px'><b>Id. Paspor</b></td>
                     <td width='10px'>:</td>
                     <td>
                        <?php echo $row->id_paspor;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Nama Jamaah</b></td>
                     <td>:</td>
                     <td>
                        <a href='<?php echo base_url()."index.php/welcome/detail_haji_plus/".$row->id_haji_plus;?>'><?php echo $row->nama_lengkap;?></a>
                     </td>
                  </tr>
                  <tr>
                     <td><b>No. Paspor</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->no_paspor;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Tempat di Keluarkan</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tempat_dikeluarkan;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Tanggal di Keluarkan</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_dikeluarkan;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Tanggal Habis Berlaku</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_habis_berlaku;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Penambahan Nama</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->penambahan_nama;?>
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