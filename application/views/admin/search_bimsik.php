<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Daftar Peserta </span>
      </div>
      <div id='main'>
         <form action="<?php echo site_url('welcome/search_bimsik');?>" method="get">
            <input type="text" class="search" name="search_bimsik" placeHolder="Search" width="141px" required />
            <button type="submit" class="button">Search</button>
            <a href="<?php echo base_url();?>index.php/welcome/insert_bimsik" class="button"> Tambah </a>
            <a href="<?php echo base_url();?>index.php/welcome/bimbingan_manasik" class="button"> Kembali </a>
         </form>
         <br>
         <table class="bordered">
            <thead>
               <tr>
                  <th width="69px"> Id. Peserta </th>
                  <th> No. Porsi </th>
                  <th> Nama Lengkap </th>
                  <th> Jenis Kelamin </th>
                  <th> Tahun Keberangkatan </th>
                  <th width="123px"> Aksi </th>
               </tr>
            </thead>
            <?php
               if(count($bimbingan_manasik)>0) {
                  $no = 1;
                  foreach($bimbingan_manasik as $row) { ?>
                  <tr>
                     <td align='center'><?php echo $row->id_peserta;?></td>
                     <td><?php echo $row->no_porsi;?></td>
                     <td><?php echo $row->nama_lengkap;?></td>
                     <td><?php echo $row->jenis_kelamin;?></td>
                     <td><?php echo $row->tahun;?></td>
                     <td align='center'>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/detail_bimsik/".$row->id_peserta ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/view.png" width="16" height="16" border="0"> 
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/edit_bimsik/".$row->id_peserta ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/edit.png" width="16" height="16" border="0">
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/delete_bimsik/".$row->id_peserta ?>">
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