<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Data Pendaftaran Haji </span>
      </div>
      <div id='main'>
         <form action="<?php echo site_url('welcome/search_pendaftaran_haji');?>" method="get">
            <input type="text" class="search" name="search_pendaftaran_haji" placeHolder="Search" width="141px" required />
            <button type="submit" class="button">Search</button>
            <a href="<?php echo base_url();?>index.php/welcome/insert_pendaftaran_haji" class="button"> Tambah </a>
            <a href="<?php echo base_url();?>index.php/welcome/pendaftaran_haji" class="button"> Kembali </a>
         </form>
         <br>
         <table class="bordered">
            <thead>
               <tr>
                  <th width="100px"> Id. Pendaftaran </th>
                  <th> Nama Lengkap </th>
                  <th> Jenis Kelamin </th>
                  <th> No. Handphone </th>
                  <th> Keterangan </th>
                  <th width="123px"> Aksi </th>
               </tr>
            </thead>
            <?php
               if(count($pendaftaran_haji)>0) {
                  $no = 1;
                  foreach($pendaftaran_haji as $row) { ?>
                  <tr>
                     <td align='center'><?php echo $row->id_pendaftaran_haji;?></td>
                     <td><?php echo $row->nama_lengkap;?></td>
                     <td><?php echo $row->jenis_kelamin;?></td>
                     <td><?php echo $row->no_handphone;?></td>
                     <td><?php echo $row->keterangan;?></td>
                     <td align='center'>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/detail_pendaftaran_haji/".$row->id_pendaftaran_haji ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/view.png" width="16" height="16" border="0"> 
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/edit_pendaftaran_haji/".$row->id_pendaftaran_haji ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/edit.png" width="16" height="16" border="0">
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/delete_pendaftaran_haji/".$row->id_pendaftaran_haji ?>">
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