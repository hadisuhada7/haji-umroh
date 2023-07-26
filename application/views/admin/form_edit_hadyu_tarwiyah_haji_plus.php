<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Edit Pembayaran Hadyu & Tarwiyah Haji Plus </span>
      </div>
      <div id='main'>
    
         <?php
            $row = $hadyu_tarwiyah_haji_plus->row();
            echo form_open('welcome/edit_hadyu_tarwiyah_haji_plus/'.$row->id_hadyu_tarwiyah);
         ?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Pembayaran</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_hadyu_tarwiyah" class="kecil" value="<?php echo $row->id_hadyu_tarwiyah; ?>" readonly />
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
            <td colspan="3" align="center"><hr><b> Hadyu </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_bayar_hadyu" required value="<?php echo $row->tgl_bayar_hadyu; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_hadyu',$row->biaya_hadyu,'class=sedang');?>
                  <?php echo form_error('biaya_hadyu');?>
               </td>
            </tr>
            <td colspan="3" align="center"><hr><b> Tarwiyah </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_bayar_tarwiyah" required value="<?php echo $row->tgl_bayar_tarwiyah; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_tarwiyah',$row->biaya_tarwiyah,'class=sedang');?>
                  <?php echo form_error('biaya_tarwiyah');?>
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