<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Daftar User </span>
      </div>
      <div id='main'>
         <form action="<?php echo site_url('welcome/search_user');?>" method="get">
            <input type="text" class="search" name="search_user" placeHolder="Search" width="141px" required />
            <button type="submit" class="button">Search</button>
            <a href="<?php echo base_url();?>index.php/welcome/insert_user" class="button"> Tambah </a>
            <a href="<?php echo base_url();?>index.php/welcome/manajemen_user" class="button"> Kembali </a>
         </form>
         <br>
         <table class="bordered">
            <thead>
               <tr>
                  <th width="40px"> Id. User </th>
                  <th> Nama Lengkap </th>
                  <th> Jenis Kelamin </th>
                  <th> Usermane </th>
                  <th> Level </th>
                  <th width="123px"> Aksi </th>
               </tr>
            </thead>
            <?php
               if(count($user)>0) {
                  $no = 1;
                  foreach($user as $row) { ?>
                  <tr>
                     <td align='center'><?php echo $row->user_id;?></td>
                     <td><?php echo $row->user_nama;?></td>
                     <td><?php echo $row->user_jenis_kelamin;?></td>
                     <td><?php echo $row->user_username;?></td>
                     <td><?php echo $row->level_nama;?></td>
                     <td align='center'>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/detail_user/".$row->user_id ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/view.png" width="16" height="16" border="0"> 
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/edit_user/".$row->user_id ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/edit.png" width="16" height="16" border="0">
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/delete_user/".$row->user_id ?>">
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