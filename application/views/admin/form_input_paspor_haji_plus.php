<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Input Paspor Haji Plus</span>
      </div>
      <div id='main'>

         <?php echo form_open('welcome/insert_paspor_haji_plus');?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Paspor</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_paspor" class="kecil" value="<?php echo $kode_paspor_haji_plus; ?>" readonly />
               </td>
            </tr>
            <tr>
               <td><b>Nama Jamaah</b></td>
               <td>:</td>
               <td>
                  <?php
                     // Menampilkan dropdown haji plus
                     foreach($haji_plus->result() as $row)
                     {
                        $array_haji_plus[$row->id_haji_plus] = $row->nama_lengkap;
                     }
                     echo form_dropdown('haji_plus',$array_haji_plus,set_value('haji_plus'));
                  ?>
                  <?php echo form_error('haji_plus');?>
               </td> 
            </tr>
            <tr>
               <td><b>No. Paspor</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('no_paspor',set_value('no_paspor'),'class=kecil');?>
                  <?php echo form_error('no_paspor');?>
               </td>
            </tr>
            <tr>
               <td><b>Tempat di Keluarkan</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('tempat_dikeluarkan',set_value('tempat_dikeluarkan'),'class=sedang');?>
                  <?php echo form_error('tempat_dikeluarkan');?>
               </td>
            </tr>
            <tr> 
               <td><b>Tanggal di Keluarkan</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_dikeluarkan" required value="<?php echo ('tgl_dikeluarkan'); ?>" /></td>
            </tr>
            <tr> 
               <td><b>Tanggal Habis Belaku</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_habis_berlaku" required value="<?php echo ('tgl_habis_berlaku'); ?>" /></td>
            </tr>
            <tr>
               <td><b>Penambahan Nama</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('penambahan_nama',set_value('penambahan_nama'),'class=panjang');?>
                  <?php echo form_error('penambahan_nama');?>
               </td>
            </tr>
            <tr>
               <td><b>Keterangan</b></td>
               <td>:</td>
               <td> <select name="keterangan">
                        <option value='...'> ... </option>
                        <option value="Pembuatan Paspor Baru"> Pembuatan Paspor Baru </option>
                        <option value="Penggantian Paspor Habis Berlaku"> Penggantian Paspor Habis Berlaku </option>
                        <option value="Penambahan Nama Paspor"> Penambahan Nama Paspor </option>
                     </select>
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