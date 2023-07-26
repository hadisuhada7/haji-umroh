<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Input Badal Haji </span>
      </div>
      <div id='main'>

         <?php echo form_open('welcome/insert_badal_haji');?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Badal Haji</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_badal_haji" class="kecil" value="<?php echo $kode_badal_haji; ?>" readonly />
               </td>
            </tr>
            <tr> 
               <td><b>Tanggal Pendaftaran</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_daftar" required value="<?php echo ('tgl_daftar'); ?>" /></td>
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
               <td><b>Bin / Binti</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('bin_binti',set_value('bin_binti'),'class=sedang');?>
                  <?php echo form_error('bin_binti');?>
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
               <td><b>Dibadalkan Oleh</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('dibadalkan_oleh',set_value('dibadalkan_oleh'),'class=sedang');?>
                  <?php echo form_error('dibadalkan_oleh');?>
               </td>
            </tr>
            <tr>
               <td><b>Tahun</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('tahun',set_value('tahun'),'class=kecil');?>
                  <?php echo form_error('tahun');?>
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
               <td><b>Keterangan</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('keterangan',set_value('keterangan'),'class=sedang');?>
                  <?php echo form_error('keterangan');?>
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