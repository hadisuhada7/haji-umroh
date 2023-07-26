<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Input Pembatalan Umroh </span>
      </div>
      <div id='main'>

         <?php echo form_open('welcome/insert_pembatalan_umroh');?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Pembatalan</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_pembatalan_umroh" class="kecil" value="<?php echo $kode_pembatalan_umroh; ?>" readonly />
               </td>
            </tr>
            <tr>
               <td><b>Nama Jamaah</b></td>
               <td>:</td>
               <td>
                  <?php
                     // Menampilkan dropdown umroh
                     foreach($umroh->result() as $row)
                     {
                        $array_umroh[$row->id_umroh] = $row->nama_lengkap;
                     }
                     echo form_dropdown('umroh',$array_umroh,set_value('umroh'));
                  ?>
                  <?php echo form_error('umroh');?>
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
               <td><b>Biaya Upgrade Kamar</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_upgrade_kamar',set_value('biaya_upgrade_kamar'),'class=sedang');?>
                  <?php echo form_error('biaya_upgrade_kamar');?>
               </td>
            </tr>
            <tr>
               <td><b>Biaya Surat Mahrom</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_surat_mahrom',set_value('biaya_surat_mahrom'),'class=sedang');?>
                  <?php echo form_error('biaya_surat_mahrom');?>
               </td>
            </tr>
            <tr>
               <td><b>Biaya Visa Second Entry</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_visa_second_entry',set_value('biaya_visa_second_entry'),'class=sedang');?>
                  <?php echo form_error('biaya_visa_second_entry');?>
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