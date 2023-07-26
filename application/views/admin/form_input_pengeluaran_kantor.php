<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Input Pengeluaran Kantor </span>
      </div>
      <div id='main'>

         <?php echo form_open('welcome/insert_pengeluaran_kantor');?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Pengeluaran</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_pengeluaran" class="kecil" value="<?php echo $kode_pengeluaran_kantor; ?>" readonly />
               </td>
            </tr>
            <tr>
               <td><b>Nama Barang</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('nama_barang',set_value('nama_barang'),'class=panjang');?>
                  <?php echo form_error('nama_barang');?>
               </td>
            </tr>
            <tr>
               <td><b>Jumlah</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('jumlah',set_value('jumlah'),'class=sedang');?>
                  <?php echo form_error('jumlah');?>
               </td>
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
               <td><b>Tanggal Pengeluaran</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_pengeluaran" required value="<?php echo ('tgl_pengeluaran'); ?>" /></td>
            </tr>
            <tr>
               <td><b>Keterangan</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('keterangan',set_value('keterangan'),'class=sedang');?>
                  <?php echo form_error('keterangan');?>
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