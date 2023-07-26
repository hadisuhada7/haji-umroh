<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Daftar Paket Haji Plus </span>
      </div>
      <div id='main'>
         <form action="<?php echo site_url('welcome/search_paket_haji_plus');?>" method="get">
            <input type="text" class="search" name="search_paket_haji_plus" placeHolder="Search" width="141px" required />
            <button type="submit" class="button">Search</button>
            <a href="<?php echo base_url();?>index.php/welcome/insert_paket_haji_plus" class="button"> Tambah </a>
            <a href="<?php echo base_url();?>index.php/welcome/paket_haji_plus" class="button"> Kembali </a>
         </form>
         <br>
         <table class="bordered">
            <thead>
                <tr>
                  <th width="58px"> Id. Paket </th>
                  <th> Nama Program </th>
                  <th> Biaya </th>
                  <th> Keberangkatan </th>
                  <th> Pesawat </th>
                  <th> Seat Tersisa </th>
                  <th width="123px"> Aksi </th>
               </tr>
            </thead>
            <?php
               if(count($paket_haji_plus)>0) {
                  $no = 1;
                  foreach($paket_haji_plus as $row) { ?>
                  <tr>
                     <td align='center'><?php echo $row->id_paket_haji_plus;?></td>
                     <td><?php echo $row->nama_program;?></td>
                     <td><?php echo $row->biaya;?></td>
                     <td><?php echo $row->tgl_keberangkatan;?></td>
                     <td><?php echo $row->pesawat;?></td>
                     <td><font color='red'><?php echo $row->sisa_seat;?></font></td>
                     <td align='center'>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/detail_paket_haji_plus/".$row->id_paket_haji_plus ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/view.png" width="16" height="16" border="0"> 
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/edit_paket_haji_plus/".$row->id_paket_haji_plus ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/edit.png" width="16" height="16" border="0">
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/delete_paket_haji_plus/".$row->id_paket_haji_plus ?>">
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