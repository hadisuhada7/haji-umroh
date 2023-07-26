<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Edit Pembatalan Umroh </span>
      </div>
      <div id='main'>
    
         <?php
            $row = $pembatalan_umroh->row();
            echo form_open('welcome/edit_pembatalan_umroh/'.$row->id_pembatalan_umroh);
         ?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Pembatalan</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_pembatalan_umroh" class="kecil" value="<?php echo $row->id_pembatalan_umroh; ?>" readonly />
               </td>
            </tr>
            <tr>
               <td><b>Nama Jamaah</b></td>
               <td>:</td>
               <td>
                  <?php
                     // Menampilkan dropdown umroh
                     foreach($umroh->result() as $rows)
                     {
                        $array_umroh[$rows->id_umroh] = $rows->nama_lengkap;
                     }
                     echo form_dropdown('umroh',$array_umroh,$row->id_umroh);
                  ?>
                  <?php echo form_error('umroh');?>
               </td> 
            </tr>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_pembatalan" required value="<?php echo $row->tgl_pembatalan; ?>" /></td>
            </tr>
            <tr>
               <td><b>Alasan</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('alasan',$row->alasan,'class=panjang');?>
                  <?php echo form_error('alasan');?>
               </td>
            </tr>
            <tr>
               <td><b>Biaya Paket</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_paket',$row->biaya_paket,'class=sedang');?>
                  <?php echo form_error('biaya_paket');?>
               </td>
            </tr>
            <tr>
               <td><b>Biaya Paspor</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_paspor',$row->biaya_paspor,'class=sedang');?>
                  <?php echo form_error('biaya_paspor');?>
               </td>
            </tr>
            <tr>
               <td><b>Biaya Upgrade Kamar</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_upgrade_kamar',$row->biaya_upgrade_kamar,'class=sedang');?>
                  <?php echo form_error('biaya_upgrade_kamar');?>
               </td>
            </tr>
            <tr>
               <td><b>Biaya Surat Mahrom</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_surat_mahrom',$row->biaya_surat_mahrom,'class=sedang');?>
                  <?php echo form_error('biaya_surat_mahrom');?>
               </td>
            </tr>
            <tr>
               <td><b>Biaya Visa Second Entry</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_visa_second_entry',$row->biaya_visa_second_entry,'class=sedang');?>
                  <?php echo form_error('biaya_visa_second_entry');?>
               </td>
            </tr>
            <tr>
               <td><b>Biaya Administrasi</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_admin',$row->biaya_admin,'class=sedang');?>
                  <?php echo form_error('biaya_admin');?>
               </td>
            </tr>
            <tr>
               <td><b>Biaya Pengembalian</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_kembali',$row->biaya_kembali,'class=sedang');?>
                  <?php echo form_error('biaya_kembali');?>
               </td>
            </tr>
            <tr>
               <td><b>Keterangan</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('keterangan',$row->keterangan,'class=sedang');?>
                  <?php echo form_error('keterangan');?>
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