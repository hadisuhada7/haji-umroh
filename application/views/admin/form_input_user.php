<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Input User </span>
      </div>
      <div id='main'>

         <?php echo form_open('welcome/insert_user');?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. User</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="user_id" class="kecil" value="<?php echo $kode_user; ?>" readonly />
               </td>
            </tr>
            <tr>
               <td><b>Nama Lengkap</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('nama',set_value('nama'),'class=sedang');?>
                  <?php echo form_error('nama');?>
               </td>
            </tr>
            <tr>
               <td><b>Username</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('username',set_value('username'),'class=sedang');?>
                  <?php echo form_error('username');?>
               </td>
            </tr>
            <tr>
               <td><b>Password</b></td>
               <td>:</td>
               <td>
                  <?php echo form_password('password',set_value('password'),'class=sedang');?>
                  <?php echo form_error('password');?>
               </td>
            </tr>
            <tr>
               <td><b>Konfirmasi Password</b></td>
               <td>:</td>
               <td>
                  <?php echo form_password('password_conf',set_value('password_conf'),'class=sedang');?>
                  <?php echo form_error('password_conf');?>
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
               <td><b>No. Telepon</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('no_telepon',set_value('no_telepon'),'class=kecil');?>
                  <?php echo form_error('no_telepon');?>
               </td>
            </tr>
            <tr>
               <td><b>Level</b></td>
               <td>:</td>
               <td>
                  <?php
                     // Menampilkan dropdown level
                     foreach($level->result() as $row)
                     {
                        $array_level[$row->level_id] = $row->level_nama;
                     }
                     echo form_dropdown('level',$array_level,set_value('level'));
                  ?>
                  <?php echo form_error('level');?>
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