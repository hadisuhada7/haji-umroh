<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Daftar Paspor Haji Plus </span>
      </div>
      <div id='main'>
         <form action="<?php echo site_url('welcome/search_paspor_haji_plus');?>" method="get">
            <input type="text" class="search" name="search_paspor_haji_plus" placeHolder="Search" width="141px" required />
            <button type="submit" class="button">Search</button>
            <a href="<?php echo base_url();?>index.php/welcome/insert_paspor_haji_plus" class="button"> Tambah </a>
            <a href="<?php echo base_url();?>index.php/welcome/paspor_haji_plus" class="button"> Kembali </a>
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
               $no=1;
               foreach($data_paspor_haji_plus as $row)
               {
                  ?>
                  <tr>
                     <td align='center'><?php echo $row->id_paspor;?></td>
                     <td><a href='<?php echo base_url()."index.php/welcome/detail_haji_plus/".$row->id_haji_plus;?>'><?php echo $row->nama_lengkap;?></a></td>
                     <td><?php echo $row->no_paspor;?></td>
                     <td><?php echo $row->tempat_dikeluarkan;?></td>
                     <td><?php echo $row->tgl_habis_berlaku;?></td>
                     <td align='center'>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/detail_paspor_haji_plus/".$row->id_paspor ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/view.png" width="16" height="16" border="0"> 
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/edit_paspor_haji_plus/".$row->id_paspor ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/edit.png" width="16" height="16" border="0">
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/delete_paspor_haji_plus/".$row->id_paspor ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/delete.png" width="16" height="16" border="0">
                        </a>
                     </td>
                  </tr>
                  <?php
               }
            ?>
         </table>
         <p><font size="3"> Jumlah Data : <strong><?php echo $jumlah_paspor_haji_plus;?></strong> </font></p>
         <?php
            echo "<div class='pagination'>";
            echo $this->pagination->create_links();
            echo "</div>";
         ?>
      </div>
   </div>
</div>