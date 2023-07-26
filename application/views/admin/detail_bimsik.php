<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Rincian Data Peserta </span>
      </div>
      <div id='main'>

         <table width='100%'>
            <?php
               foreach($bimbingan_manasik->result() as $row)
               {
                  ?>
                  <tr>
                     <td width='180px'><b>Id. Peserta</b></td>
                     <td width='10px'>:</td>
                     <td>
                        <?php echo $row->id_peserta;?>
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
                     <td><b>Golongan Darah</b></td>
                      <td>:</td>
                     <td>
                        <?php echo $row->gol_darah;?>
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
                     <td><b>Kode Pos</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->kode_pos;?>
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
                     <td><b>Agama</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->agama;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Status Perkawinan</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->status_perkawinan;?>
                     </td>
                  </tr>
                   <tr>
                     <td><b>Pendidikan</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->pendidikan;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Pekerjaan</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->pekerjaan;?>
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
                     <td><b>Tanggal Pendaftaran</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->tgl_daftar;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>No. Porsi</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->no_porsi;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>No. SPPH</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->no_spph;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Status Haji</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->status_haji;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Mahrom / Muhrim</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->mahrom_muhrim;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Bank Penerima Setoran</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->bank_setoran;?>
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
                  
                  <?php
               }
            ?>
         </table>
         <br>
         <center><input type=button class=button value=Kembali onclick=self.history.back()></center>
      </div>
   </div>
</div>