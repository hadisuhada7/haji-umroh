<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Daftar Pembatalan Bimbingan Manasik </span>
      </div>
      <div id='main'>
         <form action="<?php echo site_url('welcome/search_pembatalan_bimsik');?>" method="get">
            <input type="text" class="search" name="search_pembatalan_bimsik" placeHolder="Search" width="141px" required />
            <button type="submit" class="button">Search</button>
            <a href="<?php echo base_url();?>index.php/welcome/insert_pembatalan_bimsik" class="button"> Tambah </a>
            <a href="<?php echo base_url();?>index.php/welcome/pembatalan_bimsik" class="button"> Kembali </a>
         </form>
         <br>
         <table class="bordered">
            <thead>
               <tr>
                  <th width="95px"> Id. Pembatalan </th>
                  <th> Nama Peserta </th>
                  <th> Tgl. Pembatalan </th>
                  <th> Pengembalian </th>
                  <th> Keterangan </th>
                  <th width="123px"> Aksi </th>
               </tr>
            </thead>
            <?php
               $no=1;
               foreach($data_pembatalan_bimsik as $row)
               {
                  ?>
                  <tr>
                     <td align='center'><?php echo $row->id_pembatalan_bimsik;?></td>
                     <td><a href='<?php echo base_url()."index.php/welcome/detail_bimsik/".$row->id_peserta;?>'><?php echo $row->nama_lengkap;?></a></td>
                     <td><?php echo $row->tgl_pembatalan;?></td>
                     <td><?php echo $row->biaya_kembali;?></td>
                     <td><?php echo $row->keterangan;?></td>
                     <td align='center'>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/detail_pembatalan_bimsik/".$row->id_pembatalan_bimsik ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/view.png" width="16" height="16" border="0"> 
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/edit_pembatalan_bimsik/".$row->id_pembatalan_bimsik ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/edit.png" width="16" height="16" border="0">
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/delete_pembatalan_bimsik/".$row->id_pembatalan_bimsik ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/delete.png" width="16" height="16" border="0">
                        </a>
                     </td>
                  </tr>
                  <?php
               }
            ?>
         </table>
         <p><font size="3"> Jumlah Data : <strong><?php echo $jumlah_pembatalan_bimsik;?></strong> </font></p>
         <?php
            echo "<div class='pagination'>";
            echo $this->pagination->create_links();
            echo "</div>";
         ?>
      </div>
   </div>
</div>