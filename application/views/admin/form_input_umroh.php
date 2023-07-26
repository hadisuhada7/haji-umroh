<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Input Umroh</span>
      </div>
      <div id='main'>

         <?php echo form_open('welcome/insert_umroh');?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Umroh</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_umroh" class="kecil" value="<?php echo $kode_umroh; ?>" readonly />
               </td>
            </tr>
            <tr> 
               <td><b>Tanggal Pendaftaran</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_daftar" required value="<?php echo ('tgl_daftar'); ?>" /></td>
            </tr>
            <tr>
               <td><b>Program Umroh</b></td>
               <td>:</td>
               <td>
                  <?php
                     // Menampilkan dropdown paket umroh
                     foreach($paket_umroh->result() as $row)
                     {
                        $array_paket_umroh[$row->id_paket_umroh] = $row->nama_program;
                     }
                     echo form_dropdown('paket_umroh',$array_paket_umroh,set_value('paket_umroh'));
                  ?>
                  <?php echo form_error('paket_umroh');?>
               </td> 
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
               <td><b>Nama Ayah</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('nama_ayah',set_value('nama_ayah'),'class=sedang');?>
                  <?php echo form_error('nama_ayah');?>
               </td>
            </tr>
            <tr>
               <td><b>Nama Ibu</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('nama_ibu',set_value('nama_ibu'),'class=sedang');?>
                  <?php echo form_error('nama_ibu');?>
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
               <td><b>Golongan Darah</b></td>
               <td>:</td>
               <td> <select name="gol_darah">
                        <option value='...'> ... </option>
                        <option value="O"> O </option>
                        <option value="O−"> O− </option>
                        <option value="O+"> O+ </option>
                        <option value="A"> A </option>
                        <option value="A−"> A− </option>
                        <option value="A+"> A+ </option>
                        <option value="B"> B </option>
                        <option value="B−"> B− </option>
                        <option value="B+"> B+ </option>
                        <option value="AB"> AB </option>
                        <option value="AB−"> AB− </option>
                        <option value="AB+"> AB+ </option>
                     </select>
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
               <td><b>Kode Pos</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('kode_pos',set_value('kode_pos'),'class=kecil');?>
                  <?php echo form_error('kode_pos');?>
               </td>
            </tr>
            <tr>
               <td><b>Kelurahan / Desa</b></td>
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
               <td><b>Agama</b></td>
               <td>:</td>
               <td> <select name="agama">
                        <option value='...'> ... </option>
                        <option value="Islam"> Islam </option>
                        <option value="Kristen Protestan"> Kristen Protestan </option>
                        <option value="Khatolik"> Khatolik </option>
                        <option value="Hindu"> Hindu </option>
                        <option value="Buddha"> Buddha </option>
                        <option value="Kong Hu Cu"> Kong Hu Cu </option>
                     </select>
               </td>
            </tr>
            <tr>
               <td><b>Status Perkawinan</b></td>
               <td>:</td>
               <td> <select name="status_perkawinan">
                        <option value='...'> ... </option>
                        <option value="Belum Kawin"> Belum Kawin </option>
                        <option value="Kawin"> Kawin </option>
                        <option value="Cerai Hidup"> Cerai Hidup </option>
                        <option value="Cerai Mati"> Cerai Mati </option>
                     </select>
               </td>
            </tr>
             <tr>
               <td><b>Pendidikan</b></td>
               <td>:</td>
               <td> <select name="pendidikan">
                        <option value='...'> ... </option>
                        <option value="SD"> SD </option>
                        <option value="SLTP"> SLTP </option>
                        <option value="SLTA"> SLTA </option>
                        <option value="D3"> D3 </option>
                        <option value="S1"> S1 </option>
                        <option value="S2"> S2 </option>
                        <option value="S3"> S3 </option>
                     </select>
               </td>
            </tr>
            <tr>
               <td><b>Pekerjaan</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('pekerjaan',set_value('pekerjaan'),'class=sedang');?>
                  <?php echo form_error('pekerjaan');?>
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
               <td><b>Email</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('email',set_value('email'),'class=sedang');?>
                  <?php echo form_error('email');?>
               </td>
            </tr>
            <tr> 
               <td><b>Terakhir Umroh</b></td>
               <td>:</td>
               <td><input type="date" name="terakhir_umroh" required value="<?php echo ('terakhir_umroh'); ?>" /></td>
            </tr>
            <tr>
               <td><b>Riwayat Penyakit</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('riwayat_penyakit',set_value('riwayat_penyakit'),'class=sedang');?>
                  <?php echo form_error('riwayat_penyakit');?>
               </td>
            </tr>
            <tr>
               <td><b>Mahrom / Muhrim</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('mahrom_muhrim',set_value('mahrom_muhrim'),'class=sedang');?>
                  <?php echo form_error('mahrom_muhrim');?>
               </td>
            </tr>
            <tr>
               <td><b>Foto</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('foto',set_value('foto'),'class=sedang');?>
                  <?php echo form_error('foto');?>
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