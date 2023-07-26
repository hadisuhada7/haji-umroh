<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Edit Pembatalan Haji Plus </span>
      </div>
      <div id='main'>
    
         <?php
            $row = $pembatalan_haji_plus->row();
            echo form_open('welcome/edit_pembatalan_haji_plus/'.$row->id_pembatalan_haji_plus);
         ?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Pembatalan</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_pembatalan_haji_plus" class="kecil" value="<?php echo $row->id_pembatalan_haji_plus; ?>" readonly />
               </td>
            </tr>
            <tr>
               <td><b>Nama Jamaah</b></td>
               <td>:</td>
               <td>
                  <?php
                     // Menampilkan dropdown haji plus
                     foreach($haji_plus->result() as $rows)
                     {
                        $array_haji_plus[$rows->id_haji_plus] = $rows->nama_lengkap;
                     }
                     echo form_dropdown('haji_plus',$array_haji_plus,$row->id_haji_plus);
                  ?>
                  <?php echo form_error('haji_plus');?>
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
               <td><b>Biaya Hadyu</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_hadyu',$row->biaya_hadyu,'class=sedang');?>
                  <?php echo form_error('biaya_hadyu');?>
               </td>
            </tr>
            <tr>
               <td><b>Biaya Tarwiyah</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_tarwiyah',$row->biaya_tarwiyah,'class=sedang');?>
                  <?php echo form_error('biaya_tarwiyah');?>
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