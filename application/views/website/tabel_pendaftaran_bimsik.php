<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Data Pendaftaran Bimbingan Manasik </span>
      </div>
      <div id='main'>
         <table class="bordered">
            <thead>
               <tr>
                  <th width="15px"> No. </th>
                  <th width="100px"> Id. Pendaftaran </th>
                  <th> No. Porsi </th>
                  <th> Nomor Induk Keluarga </th>
                  <th> Nama Lengkap </th>
                  <th> Jenis Kelamin </th>
                  <th> No. Handphone </th>
                  <th width="30px"> Aksi </th>
               </tr>
            </thead>
            <?php
               $no_urut = 0;
               foreach($data_pendaftaran_bimsik as $row)
               {
                  $no_urut++;
                  ?>
                  <tr>
                     <td align='center'><?php echo $no_urut;?></td>
                     <td><?php echo $row->id_pendaftaran_bimsik;?></td>
                     <td><?php echo $row->no_porsi;?></td>
                     <td><?php echo $row->nik;?></td>
                     <td><?php echo $row->nama_lengkap;?></td>
                     <td><?php echo $row->jenis_kelamin;?></td>
                     <td><?php echo $row->no_handphone;?></td>
                     <td align='center'>
                        <a class="btn" href="<?php echo base_url()."index.php/website/data_pendaftaran_bimsik/".$row->id_pendaftaran_bimsik ?>">
                           <img src="<?php echo base_url();?>asset/admin/images/print.png" width="18" height="18" border="0"> 
                        </a>
                     </td>
                  </tr>
                  <?php
               }
            ?>
         </table>
      </div>
   </div>
</div>