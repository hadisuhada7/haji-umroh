<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Daftar Pengeluaran Kantor </span>
      </div>
      <div id='main'>
         <form action="<?php echo site_url('welcome/search_pengeluaran_kantor');?>" method="get">
            <input type="text" class="search" name="search_pengeluaran_kantor" placeHolder="Search" width="141px" required />
            <button type="submit" class="button">Search</button>
            <a href="<?php echo base_url();?>index.php/welcome/insert_pengeluaran_kantor" class="button"> Tambah </a>
            <a href="<?php echo base_url();?>index.php/welcome/pengeluaran_kantor" class="button"> Kembali </a>
         </form>
         <br>
         <table class="bordered">
            <thead>
               <tr>
                  <th width="100px"> Id. Pengeluaran </th>
                  <th> Nama Barang </th>
                  <th> Jumlah </th>
                  <th> Biaya </th>
                  <th> Tgl. Pengeluaran </th>
                  <th width="123px"> Aksi </th>
               </tr>
            </thead>
            <?php
               if(count($pengeluaran_kantor)>0) {
                  $no = 1;
                  foreach($pengeluaran_kantor as $row) { ?>
                  <tr>
                     <td align='center'><?php echo $row->id_pengeluaran;?></td>
                     <td><?php echo $row->nama_barang;?></td>
                     <td><?php echo $row->jumlah;?></td>
                     <td><?php echo $row->biaya;?></td>
                     <td><?php echo $row->tgl_pengeluaran;?></td>
                     <td align='center'>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/detail_pengeluaran_kantor/".$row->id_pengeluaran ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/view.png" width="16" height="16" border="0"> 
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/edit_pengeluaran_kantor/".$row->id_pengeluaran ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/edit.png" width="16" height="16" border="0">
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/delete_pengeluaran_kantor/".$row->id_pengeluaran ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/delete.png" width="16" height="16" border="0">
                        </a>
                     </td>
                  </tr>
            <?php } } else { ?>
               <tr>
                  <td colspan="7" align="center"> Tidak Ada Data !!! </td>
               </tr>
            <?php } ?>
         </table>
      </div>
   </div>
</div>