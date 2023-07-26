<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Rincian Data Pembayaran Hadyu & Tarwiyah Haji Plus </span>
      </div>
      <div id='main'>

         <table width='100%'>
            <?php
               foreach($hadyu_tarwiyah_haji_plus->result() as $row)
               {
                  ?>
                  <tr>
                     <td width='180px'><b>Id. Pembayaran</b></td>
                     <td width='10px'>:</td>
                     <td>
                        <?php echo $row->id_hadyu_tarwiyah;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Nama Jamaah</b></td>
                     <td>:</td>
                     <td>
                        <a href='<?php echo base_url()."index.php/welcome/detail_haji_plus/".$row->id_haji_plus;?>'><?php echo $row->nama_lengkap;?></a>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Hadyu </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_bayar_hadyu;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya_hadyu;?>
                     </td>
                  </tr>
                  <td colspan="3" align="center"><hr><b> Tarwiyah </b><hr></td>
                  <tr> 
                     <td><b>Tanggal</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_bayar_tarwiyah;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya_tarwiyah;?>
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