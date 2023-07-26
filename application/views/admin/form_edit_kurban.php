<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Edit Kurban </span>
      </div>
      <div id='main'>
    
         <?php
            $row = $kurban->row();
            echo form_open('welcome/edit_kurban/'.$row->id_kurban);
         ?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Kurban</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_kurban" class="kecil" value="<?php echo $row->id_kurban; ?>" readonly />
               </td>
            </tr>
            <tr> 
               <td><b>Tanggal Pendaftaran</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_daftar" required value="<?php echo $row->tgl_daftar; ?>" /></td>
            </tr>
            <tr>
               <td><b>Nama Lengkap</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('nama_lengkap',$row->nama_lengkap,'class=sedang');?>
                  <?php echo form_error('nama_lengkap');?>
               </td>
            </tr>
            <tr>
               <td><b>Bin / Binti</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('bin_binti',$row->bin_binti,'class=sedang');?>
                  <?php echo form_error('bin_binti');?>
               </td>
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
               <td><b>Tahun</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('tahun',$row->tahun,'class=kecil');?>
                  <?php echo form_error('tahun');?>
               </td>
            </tr>
            <tr>
               <td></td>
               <td></td>
               <td>
                  <?php echo form_submit('submit','Update','class=button');?>
                  <?php echo form_reset('reset','Cancel','class=button');?>
                  <input type=button class=button value=Kembali onclick=self.history.back()>
               </td>
            </tr>
         </table>
         <?php echo form_close();?>
         
      </div>
   </div>
</div>