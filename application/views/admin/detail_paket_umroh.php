<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Rincian Data Paket Umroh </span>
      </div>
      <div id='main'>

         <table width='100%'>
            <?php
               foreach($paket_umroh->result() as $row)
               {
                  ?>
                  <tr>
                     <td width='180px'><b>Id. Paket Umroh</b></td>
                     <td width='10px'>:</td>
                     <td>
                        <?php echo $row->id_paket_umroh;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Nama Program</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->nama_program;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Durasi</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->durasi;?>
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
                     <td><b>Tanggal Keberangkatan</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_keberangkatan;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Pesawat</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->pesawat;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Hotel Makkah</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->hotel_makkah;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Hotel Madinah</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->hotel_madinah;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Hotel Turki</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->hotel_turki;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Fasilitas</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->fasilitas;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Seat</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->seat;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Seat Tersisa</b></td>
                     <td>:</td>
                     <td>
                        <font color='red'><?php echo $row->sisa_seat;?></font>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Nama Travel</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->nama_travel;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>No. Izin Travel</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->no_izin;?>
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