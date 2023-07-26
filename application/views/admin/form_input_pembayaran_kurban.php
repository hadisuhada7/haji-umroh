<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Input Pembayaran Kurban </span>
      </div>
      <div id='main'>

         <?php echo form_open('welcome/insert_pembayaran_kurban');?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Biaya</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_biaya_kurban" class="kecil" value="<?php echo $kode_pembayaran_kurban; ?>" readonly />
               </td>
            </tr>
            <tr>
               <td><b>Nama Lengkap</b></td>
               <td>:</td>
               <td>
                  <?php
                     // Menampilkan dropdown kurban
                     foreach($kurban->result() as $row)
                     {
                        $array_kurban[$row->id_kurban] = $row->nama_lengkap;
                     }
                     echo form_dropdown('kurban',$array_kurban,set_value('kurban'));
                  ?>
                  <?php echo form_error('kurban');?>
               </td> 
            </tr>
            <tr> 
               <td><b>Tanggal Pembayaran</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_bayar" required value="<?php echo ('tgl_bayar'); ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya',set_value('biaya'),'class=sedang');?>
                  <?php echo form_error('biaya');?>
               </td>
            </tr>
            <tr>
               <td><b>Dibayar Oleh</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('dibayar_oleh',set_value('dibayar_oleh'),'class=sedang');?>
                  <?php echo form_error('dibayar_oleh');?>
               </td>
            </tr>
            <tr>
               <td><b>No. Telepon</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('no_telepon',set_value('no_telepon'),'class=sedang');?>
                  <?php echo form_error('no_telepon');?>
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
               <td><b>Keterangan</b></td>
               <td>:</td>
               <td> <select name="ket">
                        <option value='...'> ... </option>
                        <option value="Lunas"> Lunas </option>
                        <option value="Belum Lunas"> Belum Lunas </option>
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