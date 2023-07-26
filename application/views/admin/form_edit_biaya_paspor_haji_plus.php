<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Edit Biaya Paspor Haji Plus </span>
      </div>
      <div id='main'>
    
         <?php
            $row = $biaya_paspor_haji_plus->row();
            echo form_open('welcome/edit_biaya_paspor_haji_plus/'.$row->id_biaya_paspor);
         ?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Biaya Paspor</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_biaya_paspor" class="kecil" value="<?php echo $row->id_biaya_paspor; ?>" readonly />
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
               <td><b>Keterangan</b></td>
               <td>:</td>
               <td> <select name="keterangan">
                        <option value="<?php echo $row->keterangan ?>"> <?php echo $row->keterangan; ?> </option>
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