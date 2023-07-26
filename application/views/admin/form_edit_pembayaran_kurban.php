<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Edit Pembayaran Kurban </span>
      </div>
      <div id='main'>
    
         <?php
            $row = $pembayaran_kurban->row();
            echo form_open('welcome/edit_pembayaran_kurban/'.$row->id_biaya_kurban);
         ?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Biaya</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_biaya_kurban" class="kecil" value="<?php echo $row->id_biaya_kurban; ?>" readonly />
               </td>
            </tr>
            <tr>
               <td><b>Nama Lengkap</b></td>
               <td>:</td>
               <td>
                  <?php
                     // Menampilkan dropdown kurban
                     foreach($kurban->result() as $rows)
                     {
                        $array_kurban[$rows->id_kurban] = $rows->nama_lengkap;
                     }
                     echo form_dropdown('kurban',$array_kurban,$row->id_kurban);
                  ?>
                  <?php echo form_error('kurban');?>
               </td> 
            </tr>
            <tr> 
               <td><b>Tanggal Pembayaran</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_bayar" required value="<?php echo $row->tgl_bayar; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya',$row->biaya,'class=sedang');?>
                  <?php echo form_error('biaya');?>
               </td>
            </tr>
            <tr>
               <td><b>Dibayar Oleh</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('dibayar_oleh',$row->dibayar_oleh,'class=sedang');?>
                  <?php echo form_error('dibayar_oleh');?>
               </td>
            </tr>
            <tr>
               <td><b>No. Telepon</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('no_telepon',$row->no_telepon,'class=sedang');?>
                  <?php echo form_error('no_telepon');?>
               </td>
            </tr>
            <tr>
               <td><b>Alamat</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('alamat',$row->alamat,'class=panjang');?>
                  <?php echo form_error('alamat');?>
               </td>
            </tr>
            <tr>
               <td><b>Keterangan</b></td>
               <td>:</td>
               <td> <select name="ket">
                        <option value="<?php echo $row->ket ?>"> <?php echo $row->ket; ?> </option>
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