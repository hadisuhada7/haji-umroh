<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Daftar Paspor Umroh </span>
      </div>
      <div id='main'>
         <form action="<?php echo site_url('welcome/search_paspor_umroh');?>" method="get">
            <input type="text" class="search" name="search_paspor_umroh" placeHolder="Search" width="141px" required />
            <button type="submit" class="button">Search</button>
            <a href="<?php echo base_url();?>index.php/welcome/insert_paspor_umroh" class="button"> Tambah </a>
            <a href="<?php echo base_url();?>index.php/welcome/paspor_umroh" class="button"> Kembali </a>
         </form>
         <br>
         <table class="bordered">
            <thead>
               <tr>
                  <th width="65px"> Id. Paspor </th>
                  <th> Nama Jamaah </th>
                  <th> No. Paspor </th>
                  <th> Tempat di Keluarkan</th>
                  <th> Tgl. Habis Belaku </th>
                  <th width="123px"> Aksi </th>
               </tr>
            </thead>
            <?php
               if(count($paspor_umroh)>0) {
                  $no = 1;
                  foreach($paspor_umroh as $row) { ?>
                  <tr>
                     <td align='center'><?php echo $row->id_paspor;?></td>
                     <td><a href='<?php echo base_url()."index.php/welcome/detail_umroh/".$row->id_umroh;?>'><?php echo $row->nama_lengkap;?></a></td>
                     <td><?php echo $row->no_paspor;?></td>
                     <td><?php echo $row->tempat_dikeluarkan;?></td>
                     <td><?php echo $row->tgl_habis_berlaku;?></td>
                     <td align='center'>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/detail_paspor_umroh/".$row->id_paspor ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/view.png" width="16" height="16" border="0"> 
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/edit_paspor_umroh/".$row->id_paspor ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/edit.png" width="16" height="16" border="0">
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/delete_paspor_umroh/".$row->id_paspor ?>">
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