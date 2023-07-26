<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Daftar Kurban di Tanah Suci </span>
      </div>
      <div id='main'>
         <form action="<?php echo site_url('welcome/search_kurban');?>" method="get">
            <input type="text" class="search" name="search_kurban" placeHolder="Search" width="141px" required />
            <button type="submit" class="button">Search</button>
            <a href="<?php echo base_url();?>index.php/welcome/insert_kurban" class="button"> Tambah </a>
            <a href="<?php echo base_url();?>index.php/welcome/kurban" class="button"> Kembali </a>
         </form>
         <br>
         <table class="bordered">
            <thead>
               <tr>
                  <th width="68px"> Id. Kurban </th>
                  <th> Nama Lengkap </th>
                  <th> Bin / Binti </th>
                  <th> Jenis Kelamin </th>
                  <th> Tahun </th>
                  <th width="123px"> Aksi </th>
               </tr>
            </thead>
            <?php
               $no=1;
               foreach($data_kurban as $row)
               {
                  ?>
                  <tr>
                     <td align='center'><?php echo $row->id_kurban;?></td>
                     <td><?php echo $row->nama_lengkap;?></td>
                     <td><?php echo $row->bin_binti;?></td>
                     <td><?php echo $row->jenis_kelamin;?></td>
                     <td><?php echo $row->tahun;?></td>
                     <td align='center'>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/detail_kurban/".$row->id_kurban ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/view.png" width="16" height="16" border="0"> 
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/edit_kurban/".$row->id_kurban ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/edit.png" width="16" height="16" border="0">
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/delete_kurban/".$row->id_kurban ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/delete.png" width="16" height="16" border="0">
                        </a>
                     </td>
                  </tr>
                  <?php
               }
            ?>
         </table>
         <p><font size="3"> Jumlah Data : <strong><?php echo $jumlah_kurban;?></strong> </font></p>
         <?php
            echo "<div class='pagination'>";
            echo $this->pagination->create_links();
            echo "</div>";
         ?>
      </div>
   </div>
</div>