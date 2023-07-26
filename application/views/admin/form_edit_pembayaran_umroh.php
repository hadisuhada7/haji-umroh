<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Edit Pembayaran Umroh </span>
      </div>
      <div id='main'>
    
         <?php
            $row = $pembayaran_umroh->row();
            echo form_open('welcome/edit_pembayaran_umroh/'.$row->id_biaya_umroh);
         ?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Pembayaran</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_biaya_umroh" class="kecil" value="<?php echo $row->id_biaya_umroh; ?>" readonly />
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
                        <option value="<?php echo $row->keterangan; ?>"> <?php echo $row->keterangan; ?> </option>
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
            <td colspan="3" align="center"><hr><b> Surat Mahrom </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_surat_mahrom" required value="<?php echo $row->tgl_surat_mahrom; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_surat_mahrom',$row->biaya_surat_mahrom,'class=sedang');?>
                  <?php echo form_error('biaya_surat_mahrom');?>
               </td>
            </tr>
            <td colspan="3" align="center"><hr><b> Visa Second Entry </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_visa_second_entry" required value="<?php echo $row->tgl_visa_second_entry; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya_visa_second_entry',$row->biaya_visa_second_entry,'class=sedang');?>
                  <?php echo form_error('biaya_visa_second_entry');?>
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