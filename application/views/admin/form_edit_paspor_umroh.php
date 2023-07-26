<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Edit Paspor Umroh </span>
      </div>
      <div id='main'>
    
         <?php
            $row = $paspor_umroh->row();
            echo form_open('welcome/edit_paspor_umroh/'.$row->id_paspor);
         ?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Paspor</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_paspor" class="kecil" value="<?php echo $row->id_paspor; ?>" readonly />
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
               <td><b>No. Paspor</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('no_paspor',$row->no_paspor,'class=kecil');?>
                  <?php echo form_error('no_paspor');?>
               </td>
            </tr>
            <tr>
               <td><b>Tempat di Keluarkan</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('tempat_dikeluarkan',$row->tempat_dikeluarkan,'class=sedang');?>
                  <?php echo form_error('tempat_dikeluarkan');?>
               </td>
            </tr>
            <tr> 
               <td><b>Tanggal di Keluarkan</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_dikeluarkan" required value="<?php echo $row->tgl_dikeluarkan; ?>" /></td>
            </tr>
            <tr> 
               <td><b>Tanggal Habis Belaku</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_habis_berlaku" required value="<?php echo $row->tgl_habis_berlaku; ?>" /></td>
            </tr>
            <tr>
               <td><b>Penambahan Nama</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('penambahan_nama',$row->penambahan_nama,'class=panjang');?>
                  <?php echo form_error('penambahan_nama');?>
               </td>
            </tr>
            <tr>
               <td><b>Keterangan</b></td>
               <td>:</td>
               <td> <select name="keterangan">
                        <option value="<?php echo $row->keterangan ?>"> <?php echo $row->keterangan; ?> </option>
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