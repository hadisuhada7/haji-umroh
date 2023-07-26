<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Edit Pengeluaran Kantor </span>
      </div>
      <div id='main'>
    
         <?php
            $row = $pengeluaran_kantor->row();
            echo form_open('welcome/edit_pengeluaran_kantor/'.$row->id_pengeluaran);
         ?>
         <table width='100%'>
             <tr>
               <td width='180px'><b>Id. Pengeluaran</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_pengeluaran" class="kecil" value="<?php echo $row->id_pengeluaran; ?>" readonly />
               </td>
            </tr>
            <tr>
               <td><b>Nama Barang</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('nama_barang',$row->nama_barang,'class=panjang');?>
                  <?php echo form_error('nama_barang');?>
               </td>
            </tr>
            <tr>
               <td><b>Jumlah</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('jumlah',$row->jumlah,'class=sedang');?>
                  <?php echo form_error('jumlah');?>
               </td>
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
               <td><b>Tanggal Pengeluaran</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_pengeluaran" required value="<?php echo $row->tgl_pengeluaran; ?>" /></td>
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