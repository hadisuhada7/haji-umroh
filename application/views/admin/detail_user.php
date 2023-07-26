<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Rincian Data User </span>
      </div>
      <div id='main'>

         <table width='100%'>
            <?php
               foreach($user->result() as $row)
               {
                  ?>
                  <tr>
                     <td width='180px'><b>Id. User</b></td>
                     <td width='10px'>:</td>
                     <td>
                        <?php echo $row->user_id;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Nama Lengkap</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->user_nama;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Username</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->user_username;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Tempat Lahir</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->user_tempat_lahir;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Tanggal Lahir</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->user_tgl_lahir;?>
                     </td>
                  </tr>
                  <tr> 
                     <td><b>Jenis Kelamin</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->user_jenis_kelamin;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>No. Telepon</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->user_no_telepon;?>
                     </td>
                  </tr>
                  <tr>
                     <td><b>Level</b></td>
                     <td>:</td>
                     <td>
                        <?php echo $row->level_nama;?>
                     </td> 
                  </tr>
                  
                  <?php
               }
            ?>
         </table>
         <br>
         <center><input type=button class=button value=Kembali onclick=self.history.back()></center>
      </div>
   </div>
</div>