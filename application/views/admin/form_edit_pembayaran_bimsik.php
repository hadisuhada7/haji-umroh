<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Edit Pembayaran Bimbingan Manasik </span>
      </div>
      <div id='main'>
    
         <?php
            $row = $pembayaran_bimsik->row();
            echo form_open('welcome/edit_pembayaran_bimsik/'.$row->id_biaya_bimsik);
         ?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Pembayaran</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_biaya_bimsik" class="kecil" value="<?php echo $row->id_biaya_bimsik; ?>" readonly />
               </td>
            </tr>
            <tr>
               <td><b>Nama Peserta</b></td>
               <td>:</td>
               <td>
                  <?php
                     // Menampilkan dropdown bimbingan manasik
                     foreach($bimsik->result() as $rows)
                     {
                        $array_bimsik[$rows->id_peserta] = $rows->nama_lengkap;
                     }
                     echo form_dropdown('bimsik',$array_bimsik,$row->id_peserta);
                  ?>
                  <?php echo form_error('bimsik');?>
               </td> 
            </tr>
            <td colspan="3" align="center"><hr><b> Angsuran 1 </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_angsuran_1" required value="<?php echo $row->tgl_angsuran_1; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('angsuran_1',$row->angsuran_1,'class=sedang');?>
                  <?php echo form_error('angsuran_1');?>
               </td>
            </tr>
            <td colspan="3" align="center"><hr><b> Angsuran 2 </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_angsuran_2" required value="<?php echo $row->tgl_angsuran_2; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('angsuran_2',$row->angsuran_2,'class=sedang');?>
                  <?php echo form_error('angsuran_2');?>
               </td>
            </tr>
            <td colspan="3" align="center"><hr><b> Angsuran 3 </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_angsuran_3" required value="<?php echo $row->tgl_angsuran_3; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('angsuran_3',$row->angsuran_3,'class=sedang');?>
                  <?php echo form_error('angsuran_3');?>
               </td>
            </tr>
            <td colspan="3" align="center"><hr><b> Angsuran 4 </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_angsuran_4" required value="<?php echo $row->tgl_angsuran_4; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('angsuran_4',$row->angsuran_4,'class=sedang');?>
                  <?php echo form_error('angsuran_4');?>
               </td>
            </tr>
            <td colspan="3" align="center"><hr><b> Angsuran 5 </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_angsuran_5" required value="<?php echo $row->tgl_angsuran_5; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('angsuran_5',$row->angsuran_5,'class=sedang');?>
                  <?php echo form_error('angsuran_5');?>
               </td>
            </tr>
            <td colspan="3" align="center"><hr><b> Angsuran 6 </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_angsuran_6" required value="<?php echo $row->tgl_angsuran_6; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('angsuran_6',$row->angsuran_6,'class=sedang');?>
                  <?php echo form_error('angsuran_6');?>
               </td>
            </tr>
            <td colspan="3" align="center"><hr><b> Angsuran 7 </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_angsuran_7" required value="<?php echo $row->tgl_angsuran_7; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('angsuran_7',$row->angsuran_7,'class=sedang');?>
                  <?php echo form_error('angsuran_7');?>
               </td>
            </tr>
            <td colspan="3" align="center"><hr><b> Angsuran 8 </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_angsuran_8" required value="<?php echo $row->tgl_angsuran_8; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('angsuran_8',$row->angsuran_8,'class=sedang');?>
                  <?php echo form_error('angsuran_8');?>
               </td>
            </tr>
            <td colspan="3" align="center"><hr><b> Angsuran 9 </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_angsuran_9" required value="<?php echo $row->tgl_angsuran_9; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('angsuran_9',$row->angsuran_9,'class=sedang');?>
                  <?php echo form_error('angsuran_9');?>
               </td>
            </tr>
            <td colspan="3" align="center"><hr><b> Angsuran 10 </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_angsuran_10" required value="<?php echo $row->tgl_angsuran_10; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('angsuran_10',$row->angsuran_10,'class=sedang');?>
                  <?php echo form_error('angsuran_10');?>
               </td>
            </tr>
            <td colspan="3" align="center"><hr><b> Angsuran 11 </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_angsuran_11" required value="<?php echo $row->tgl_angsuran_11; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('angsuran_11',$row->angsuran_11,'class=sedang');?>
                  <?php echo form_error('angsuran_11');?>
               </td>
            </tr>
            <td colspan="3" align="center"><hr><b> Angsuran 12 </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_angsuran_12" required value="<?php echo $row->tgl_angsuran_12; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('angsuran_12',$row->angsuran_12,'class=sedang');?>
                  <?php echo form_error('angsuran_12');?>
               </td>
            </tr>
            <td colspan="3" align="center"><hr><b> Angsuran 13 </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_angsuran_13" required value="<?php echo $row->tgl_angsuran_13; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('angsuran_13',$row->angsuran_13,'class=sedang');?>
                  <?php echo form_error('angsuran_13');?>
               </td>
            </tr>
            <td colspan="3" align="center"><hr><b> Angsuran 14 </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_angsuran_14" required value="<?php echo $row->tgl_angsuran_14; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('angsuran_14',$row->angsuran_14,'class=sedang');?>
                  <?php echo form_error('angsuran_14');?>
               </td>
            </tr>
            <td colspan="3" align="center"><hr><b> Angsuran 15 </b><hr></td>
            <tr> 
               <td><b>Tanggal</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_angsuran_15" required value="<?php echo $row->tgl_angsuran_15; ?>" /></td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('angsuran_15',$row->angsuran_15,'class=sedang');?>
                  <?php echo form_error('angsuran_15');?>
               </td>
            </tr>
            <td colspan="3"><hr></td>
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