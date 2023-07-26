<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Input Biaya Paspor Umroh </span>
      </div>
      <div id='main'>

         <?php echo form_open('welcome/insert_biaya_paspor_umroh');?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Biaya Paspor</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_biaya_paspor" class="kecil" value="<?php echo $kode_biaya_paspor_umroh; ?>" readonly />
               </td>
            </tr>
            <tr>
               <td><b>Nama Jamaah</b></td>
               <td>:</td>
               <td>
                  <?php
                     // Menampilkan dropdown umroh
                     foreach($umroh->result() as $row)
                     {
                        $array_umroh[$row->id_umroh] = $row->nama_lengkap;
                     }
                     echo form_dropdown('umroh',$array_umroh,set_value('umroh'));
                  ?>
                  <?php echo form_error('umroh');?>
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
               <td><b>Keterangan</b></td>
               <td>:</td>
               <td> <select name="keterangan">
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