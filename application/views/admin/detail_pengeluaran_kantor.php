<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Rincian Data Pengeluaran Kantor </span>
      </div>
      <div id='main'>

         <table width='100%'>
            <?php
               foreach($pengeluaran_kantor->result() as $row)
               {
                  ?>
                  <tr>
                     <td width='180px'><b>Id. Pengeluaran</b></td>
                     <td width='10px'>:</td>
                     <td>
                        <?php echo $row->id_pengeluaran;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Nama Barang</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->nama_barang;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Jumlah</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->jumlah;?>
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
                     <td><b>Tanggal Pengeluaran</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_pengeluaran;?>
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