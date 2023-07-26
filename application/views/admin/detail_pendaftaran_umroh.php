<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Rincian Data Pendaftaran Umroh </span>
      </div>
      <div id='main'>

         <table width='100%'>
            <?php
               foreach($pendaftaran_umroh->result() as $row)
               {
                  ?>
                  <tr>
                     <td width='180px'><b>Id. Pendaftaran</b></td>
                     <td width='10px'>:</td>
                     <td>
                        <?php echo $row->id_pendaftaran_umroh;?>
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
                     <td><b>Nomor Induk Keluarga</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->nik;?>
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
                     <td><b>Alamat</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->alamat;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Kelurahan / Desa</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->kel_desa;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Kecamatan</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->kecamatan;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Kabupaten / Kota</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->kab_kota;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Provinsi</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->provinsi;?>
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
                     <td><b>No. Handphone</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->no_handphone;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Email</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->email;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Paket Umroh</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->paket_umroh;?>
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
                     <td><b>Keterangan</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->keterangan;?>
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