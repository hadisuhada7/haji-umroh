<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Daftar Biaya Paspor Haji </span>
      </div>
      <div id='main'>
         <form action="<?php echo site_url('welcome/search_biaya_paspor_haji');?>" method="get">
            <input type="text" class="search" name="search_biaya_paspor_haji" placeHolder="Search" width="141px" required />
            <button type="submit" class="button">Search</button>
            <a href="<?php echo base_url();?>index.php/welcome/insert_biaya_paspor_haji" class="button"> Tambah </a>
            <a href="<?php echo base_url();?>index.php/welcome/biaya_paspor_haji" class="button"> Kembali </a>
         </form>
         <br>
         <table class="bordered">
            <thead>
               <tr>
                  <th width="55px"> Id. Biaya </th>
                  <th> Nama Peserta </th>
                  <th> Tgl. Pembayaran </th>
                  <th> Biaya</th>
                  <th> Keterangan </th>
                  <th width="123px"> Aksi </th>
               </tr>
            </thead>
            <?php
               if(count($biaya_paspor_haji)>0) {
                  $no = 1;
                  foreach($biaya_paspor_haji as $row) { ?>
                  <tr>
                     <td align='center'><?php echo $row->id_biaya_paspor;?></td>
                     <td><a href='<?php echo base_url()."index.php/welcome/detail_bimsik/".$row->id_peserta;?>'><?php echo $row->nama_lengkap;?></a></td>
                     <td><?php echo $row->tgl_bayar;?></td>
                     <td><?php echo $row->biaya;?></td>
                     <td><?php echo $row->keterangan;?></td>
                     <td align='center'>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/detail_biaya_paspor_haji/".$row->id_biaya_paspor ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/view.png" width="16" height="16" border="0"> 
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/edit_biaya_paspor_haji/".$row->id_biaya_paspor ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/edit.png" width="16" height="16" border="0">
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/delete_biaya_paspor_haji/".$row->id_biaya_paspor ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/delete.png" width="16" height="16" border="0">
                        </a>
                     </td>
                  </tr>
            <?php } } else { ?>
               <tr>
                  <td colspan="6" align="center"> Tidak Ada Data !!! </td>
               </tr>
            <?php } ?>
         </table>
      </div>
   </div>
</div>