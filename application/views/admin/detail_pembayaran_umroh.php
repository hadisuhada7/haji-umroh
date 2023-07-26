<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Rincian Data Pembayaran Umroh </span>
      </div>
      <div id='main'>

         <table width='100%'>
            <?php
               foreach($pembayaran_umroh->result() as $row)
               {
                  ?>
                  <tr>
                     <td width='180px'><b>Id. Pembayaran</b></td>
                     <td width='10px'>:</td>
                     <td>
                        <?php echo $row->id_biaya_umroh;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Nama Jamaah</b></td>
                     <td>:</td>
                     <td>
                        <a href='<?php echo base_url()."index.php/welcome/detail_umroh/".$row->id_umroh;?>'><?php echo $row->nama_lengkap;?></a>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Deposit </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_dp;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya_dp;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Pelunasan </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_pelunasan;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya_pelunasan;?>
                     </td>
                  </tr>
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
                  <td colspan="3" align="center"><hr><b> Upgrade Kamar </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_upgrade_kamar;?>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya_upgrade_kamar;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Fasilitas</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->fasilitas;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Surat Mahrom </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_surat_mahrom;?>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya_surat_mahrom;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Visa Second Entry </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_visa_second_entry;?>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya_visa_second_entry;?>
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