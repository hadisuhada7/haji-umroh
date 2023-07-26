<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Input Pembatalan Haji Plus </span>
      </div>
      <div id='main'>

         <?php echo form_open('welcome/insert_pembatalan_haji_plus');?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Pembatalan</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_pembatalan_haji_plus" class="kecil" value="<?php echo $kode_pembatalan_haji_plus; ?>" readonly />
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
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_pembatalan" required value="<?php echo ('tgl_pembatalan'); ?>" /></td>
            </tr>
            <tr>
               <td><b>Alasan</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('alasan',set_value('alasan'),'class=panjang');?>
                  <?php echo form_error('alasan');?>
               </td>
            </tr>
            <tr>
               <td><b>Biaya Paket</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_paket',set_value('biaya_paket'),'class=sedang');?>
                  <?php echo form_error('biaya_paket');?>
               </td>
            </tr>
            <tr>
               <td><b>Biaya Paspor</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_paspor',set_value('biaya_paspor'),'class=sedang');?>
                  <?php echo form_error('biaya_paspor');?>
               </td>
            </tr>
            <tr>
               <td><b>Biaya Hadyu</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_hadyu',set_value('biaya_hadyu'),'class=sedang');?>
                  <?php echo form_error('biaya_hadyu');?>
               </td>
            </tr>
            <tr>
               <td><b>Biaya Tarwiyah</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_tarwiyah',set_value('biaya_tarwiyah'),'class=sedang');?>
                  <?php echo form_error('biaya_tarwiyah');?>
               </td>
            </tr>
            <tr>
               <td><b>Biaya Administrasi</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_admin',set_value('biaya_admin'),'class=sedang');?>
                  <?php echo form_error('biaya_admin');?>
               </td>
            </tr>
            <tr>
               <td><b>Biaya Pengembalian</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_kembali',set_value('biaya_kembali'),'class=sedang');?>
                  <?php echo form_error('biaya_kembali');?>
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