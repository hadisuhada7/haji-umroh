<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Pendaftaran Umroh </span>
      </div>
      <div id='main'>

         <?php echo form_open('website/pendaftaran_umroh');?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Pendaftaran</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_pendaftaran_umroh" class="kecil" value="<?php echo $kode_pendaftaran_umroh; ?>" readonly />
               </td>
            </tr>
            <tr> 
               <td><b>Tanggal Pendaftaran</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_daftar" required value="<?php echo ('tgl_daftar'); ?>" /></td>
            </tr>
            <tr>
               <td><b>Nomor Induk Keluarga</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('nik',set_value('nik'),'class=sedang');?>
                  <?php echo form_error('nik');?>
               </td>
            </tr>
            <tr>
               <td><b>Nama Lengkap</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('nama_lengkap',set_value('nama_lengkap'),'class=sedang');?>
                  <?php echo form_error('nama_lengkap');?>
               </td>
            </tr>
            <tr>
               <td><b>Tempat Lahir</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('tempat_lahir',set_value('tempat_lahir'),'class=sedang');?>
                  <?php echo form_error('tempat_lahir');?>
               </td>
            </tr>
            <tr> 
               <td><b>Tanggal Lahir</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_lahir" required value="<?php echo ('tgl_lahir'); ?>" /></td>
            </tr>
            <tr> 
               <td><b>Jenis Kelamin</b></td>
               <td>:</td>
               <td>
                  <input type="radio" name="jenis_kelamin" value="Laki-Laki"/> Laki-Laki
                  <input type="radio" name="jenis_kelamin" value="Perempuan"/> Perempuan  
               </td>
            </tr>
            <tr>
               <td><b>Alamat</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('alamat',set_value('alamat'),'class=panjang');?>
                  <?php echo form_error('alamat');?>
               </td>
            </tr>
            <tr>
               <td><b>Kelelurahan / Desa</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('kel_desa',set_value('kel_desa'),'class=sedang');?>
                  <?php echo form_error('kel_desa');?>
               </td>
            </tr>
            <tr>
               <td><b>Kecamatan</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('kecamatan',set_value('kecamatan'),'class=sedang');?>
                  <?php echo form_error('kecamatan');?>
               </td>
            </tr>
            <tr>
               <td><b>Kabupaten / Kota</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('kab_kota',set_value('kab_kota'),'class=sedang');?>
                  <?php echo form_error('kab_kota');?>
               </td>
            </tr>
            <tr>
               <td><b>Provinsi</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('provinsi',set_value('provinsi'),'class=sedang');?>
                  <?php echo form_error('provinsi');?>
               </td>
            </tr> 
            <tr>
               <td><b>No. Telepon</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('no_telepon',set_value('no_telepon'),'class=kecil');?>
                  <?php echo form_error('no_telepon');?>
               </td>
            </tr>
            <tr>
               <td><b>No. Handphone</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('no_handphone',set_value('no_handphone'),'class=kecil');?>
                  <?php echo form_error('no_handphone');?>
               </td>
            </tr>
            <tr>
               <td><b>Email</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('email',set_value('email'),'class=sedang');?>
                  <?php echo form_error('email');?>
               </td>
            </tr>
            <tr>
               <td><b>Paket Umroh</b></td>
               <td>:</td>
               <td> <select name="paket_umroh">
                        <option value='...'> ... </option>
                        <option value="Umroh Hemat"> Umroh Hemat </option>
                        <option value="Umroh Reguler"> Umroh Reguler </option>
                        <option value="Umroh VIP"> Umroh VIP </option>
                        <option value="Umroh Ramadhan"> Umroh Ramadhan </option>
                        <option value="Umroh Plus Turki"> Umroh Plus Turki </option>
                     </select>
               </td>
            </tr>
            <tr> 
               <td><b>Tanggal Keberangkatan</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_keberangkatan" required value="<?php echo ('tgl_keberangkatan'); ?>" /></td>
            </tr>
            <tr>
            <tr> 
               <td><b>Keterangan</b></td>
               <td>:</td>
               <td>
                  <input type="text" name="keterangan" class="sedang" value="Belum di Konfirmasi" readonly />
               </td>
            </tr>
            <tr>
               <td></td>
               <td></td>
               <td>
                  <?php echo form_submit('submit','Submit','class=button');?>
                  <?php echo form_reset('reset','Cancel','class=button');?>
                  <input type=button class=button value=Kembali onclick=self.history.back()>
               </td>
            </tr>
         </table>
         <?php echo form_close();?>
         
      </div>
   </div>   
</div>