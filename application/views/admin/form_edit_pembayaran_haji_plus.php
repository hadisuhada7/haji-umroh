<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Edit Pembayaran Haji Plus </span>
      </div>
      <div id='main'>
    
         <?php
            $row = $pembayaran_haji_plus->row();
            echo form_open('welcome/edit_pembayaran_haji_plus/'.$row->id_biaya_haji_plus);
         ?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Pembayaran</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_biaya_haji_plus" class="kecil" value="<?php echo $row->id_biaya_haji_plus; ?>" readonly />
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
            <td colspan="3" align="center"><hr><b> Deposit </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_dp" required value="<?php echo $row->tgl_dp; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_dp',$row->biaya_dp,'class=sedang');?>
                  <?php echo form_error('biaya_dp');?>
               </td>
            </tr>
            <td colspan="3" align="center"><hr><b> Pelunasan </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_pelunasan" required value="<?php echo $row->tgl_pelunasan; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_pelunasan',$row->biaya_pelunasan,'class=sedang');?>
                  <?php echo form_error('biaya_pelunasan');?>
               </td>
            </tr>
            <tr>
               <td><b>Total Jumlah</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('total_jumlah',$row->total_jumlah,'class=sedang');?>
                  <?php echo form_error('total_jumlah');?>
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
            <td colspan="3" align="center"><hr><b> Upgrade Kamar </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_upgrade_kamar" required value="<?php echo $row->tgl_upgrade_kamar; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_upgrade_kamar',$row->biaya_upgrade_kamar,'class=sedang');?>
                  <?php echo form_error('biaya_upgrade_kamar');?>
               </td>
            </tr>
            <tr>
               <td><b>Fasilitas</b></td>
               <td>:</td>
               <td> <select name="fasilitas">
                        <option value="<?php echo $row->fasilitas; ?>"> <?php echo $row->fasilitas; ?> </option>
                        <option value='...'> ... </option>
                        <option value="Quard (Sekamar Berempat)"> Quard (Sekamar Berempat) </option>
                        <option value="Triple (Sekamar Bertiga)"> Triple (Sekamar Bertiga) </option>
                        <option value="Double (Sekamar Berdua)"> Double (Sekamar Berdua) </option>
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