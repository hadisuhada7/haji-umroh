<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Daftar Pembayaran Bimbingan Manasik </span>
      </div>
      <div id='main'>
         <form action="<?php echo site_url('welcome/search_pembayaran_bimsik');?>" method="get">
            <input type="text" class="search" name="search_pembayaran_bimsik" placeHolder="Search" width="141px" required />
            <button type="submit" class="button">Search</button>
            <a href="<?php echo base_url();?>index.php/welcome/insert_pembayaran_bimsik" class="button"> Tambah </a>
            <a href="<?php echo base_url();?>index.php/welcome/pembayaran_bimsik" class="button"> Kembali </a>
         </form>
         <br>
         <table class="bordered">
            <thead>
               <tr>
                  <th width="100px"> Id. Pembayaran </th>
                  <th> Nama Peserta </th>
                  <th> Total Jumlah </th>
                  <th> Keterangan </th>
                  <th width="123px"> Aksi </th>
               </tr>
            </thead>
            <?php
               $no=1;
               foreach($data_pembayaran_bimsik as $row)
               {
                  ?>
                  <tr>
                     <td align='center'><?php echo $row->id_biaya_bimsik;?></td>
                     <td><a href='<?php echo base_url()."index.php/welcome/detail_bimsik/".$row->id_peserta;?>'><?php echo $row->nama_lengkap;?></a></td>
                     <td><?php echo $row->total_jumlah;?></td>
                     <td><?php echo $row->keterangan;?></td>
                     <td align='center'>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/detail_pembayaran_bimsik/".$row->id_biaya_bimsik ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/view.png" width="16" height="16" border="0"> 
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/edit_pembayaran_bimsik/".$row->id_biaya_bimsik ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/edit.png" width="16" height="16" border="0">
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/delete_pembayaran_bimsik/".$row->id_biaya_bimsik ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/delete.png" width="16" height="16" border="0">
                        </a>
                     </td>
                  </tr>
                  <?php
               }
            ?>
         </table>
         <p><font size="3"> Jumlah Data : <strong><?php echo $jumlah_pembayaran_bimsik;?></strong> </font></p>
         <?php
            echo "<div class='pagination'>";
            echo $this->pagination->create_links();
            echo "</div>";
         ?>
      </div>
   </div>
</div>