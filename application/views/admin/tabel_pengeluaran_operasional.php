<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Daftar Pengeluaran Operasional </span>
      </div>
      <div id='main'>
         <form action="<?php echo site_url('welcome/search_pengeluaran_operasional');?>" method="get">
            <input type="text" class="search" name="search_pengeluaran_operasional" placeHolder="Search" width="141px" required />
            <button type="submit" class="button">Search</button>
            <a href="<?php echo base_url();?>index.php/welcome/insert_pengeluaran_operasional" class="button"> Tambah </a>
            <a href="<?php echo base_url();?>index.php/welcome/pengeluaran_operasional" class="button"> Kembali </a>
         </form>
         <br>
         <table class="bordered">
            <thead>
               <tr>
                  <th width="100px"> Id. Pengeluaran </th>
                  <th> Nama Operasional </th>
                  <th> Jumlah </th>
                  <th> Biaya </th>
                  <th> Tgl. Pengeluaran </th>
                  <th width="123px"> Aksi </th>
               </tr>
            </thead>
            <?php
               $no=1;
               foreach($data_pengeluaran_operasional as $row)
               {
                  ?>
                  <tr>
                     <td align='center'><?php echo $row->id_pengeluaran;?></td>
                     <td><?php echo $row->nama_operasional;?></td>
                     <td><?php echo $row->jumlah;?></td>
                     <td><?php echo $row->biaya;?></td>
                     <td><?php echo $row->tgl_pengeluaran;?></td>
                     <td align='center'>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/detail_pengeluaran_operasional/".$row->id_pengeluaran ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/view.png" width="16" height="16" border="0"> 
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/edit_pengeluaran_operasional/".$row->id_pengeluaran ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/edit.png" width="16" height="16" border="0">
                        </a>
                        <a class="btn" href="<?php echo base_url()."index.php/welcome/delete_pengeluaran_operasional/".$row->id_pengeluaran ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/delete.png" width="16" height="16" border="0">
                        </a>
                     </td>
                  </tr>
                  <?php
               }
            ?>
         </table>
         <p><font size="3"> Jumlah Data : <strong><?php echo $jumlah_pengeluaran_operasional;?></strong> </font></p>
         <?php
            echo "<div class='pagination'>";
            echo $this->pagination->create_links();
            echo "</div>";
         ?>
      </div>
   </div>
</div>