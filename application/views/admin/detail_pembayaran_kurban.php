<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Rincian Data Pembayaran Kurban </span>
      </div>
      <div id='main'>

         <table width='100%'>
            <?php
               foreach($pembayaran_kurban->result() as $row)
               {
                  ?>
                  <tr>
                     <td width='180px'><b>Id. Biaya</b></td>
                     <td width='10px'>:</td>
                     <td>
                        <?php echo $row->id_biaya_kurban;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Nama Jamaah</b></td>
                     <td>:</td>
                     <td>
                        <a href='<?php echo base_url()."index.php/welcome/detail_kurban/".$row->id_kurban;?>'><?php echo $row->nama_lengkap;?></a>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Tanggal Pembayaran</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_bayar;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Biaya</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->biaya;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Dibayar Oleh</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->dibayar_oleh;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>No. Telepon</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->no_telepon;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Alamat</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->alamat;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Keterangan</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->ket;?>
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