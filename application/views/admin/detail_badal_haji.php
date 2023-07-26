<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Rincian Data Badal Haji </span>
      </div>
      <div id='main'>

         <table width='100%'>
            <?php
               foreach($badal_haji->result() as $row)
               {
                  ?>
                  <tr>
                     <td width='180px'><b>Id. Badal Haji</b></td>
                     <td width='10px'>:</td>
                     <td>
                        <?php echo $row->id_badal_haji;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Tanggal Pendaftaran</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_daftar;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Nama Lengkap</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->nama_lengkap;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Bin / Binti</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->bin_binti;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Tempat Lahir</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tempat_lahir;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Tanggal Lahir</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_lahir;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Jenis Kelamin</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->jenis_kelamin;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Dibadalkan Oleh</b></td>
                      <td>:</td>
                     <td>
                        <?php echo $row->dibadalkan_oleh;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Tahun</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tahun;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Foto</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->foto;?>
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