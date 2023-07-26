<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Edit Peserta </span>
      </div>
      <div id='main'>
    
         <?php
            $row = $bimbingan_manasik->row();
            echo form_open('welcome/edit_bimsik/'.$row->id_peserta);
         ?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Peserta</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_peserta" class="kecil" value="<?php echo $row->id_peserta; ?>" readonly />
               </td>
            </tr>
            <tr>
               <td><b>Nomor Induk Keluarga</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('nik',$row->nik,'class=sedang');?>
                  <?php echo form_error('nik');?>
               </td>
            </tr>
            <tr>
               <td><b>Nama Lengkap</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('nama_lengkap',$row->nama_lengkap,'class=sedang');?>
                  <?php echo form_error('nama_lengkap');?>
               </td>
            </tr>
            <tr>
               <td><b>Bin / Binti</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('bin_binti',$row->bin_binti,'class=sedang');?>
                  <?php echo form_error('bin_binti');?>
               </td>
            </tr>
            <tr>
               <td><b>Tempat Lahir</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('tempat_lahir',$row->tempat_lahir,'class=sedang');?>
                  <?php echo form_error('tempat_lahir');?>
               </td>
            </tr>
            <tr> 
               <td><b>Tanggal Lahir</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_lahir" required value="<?php echo $row->tgl_lahir; ?>" /></td>
            </tr>
            <tr> 
               <td><b>Jenis Kelamin</b></td>
               <td>:</td>
               <td>
                  <input type="radio" name="jenis_kelamin" value="Laki-Laki"/> Laki-Laki 
                  <input type="radio" name="jenis_kelamin" value="Perempuan"/> Perempuan  
               </td>
            </tr>
            <tr>
               <td><b>Golongan Darah</b></td>
               <td>:</td>
               <td> <select name="gol_darah">
                        <option value="<?php echo $row->gol_darah ?>"> <?php echo $row->gol_darah; ?> </option>
                        <option value='...'> ... </option>
                        <option value="O"> O </option>
                        <option value="O−"> O− </option>
                        <option value="O+"> O+ </option>
                        <option value="A"> A </option>
                        <option value="A−"> A− </option>
                        <option value="A+"> A+ </option>
                        <option value="B"> B </option>
                        <option value="B−"> B− </option>
                        <option value="B+"> B+ </option>
                        <option value="AB"> AB </option>
                        <option value="AB−"> AB− </option>
                        <option value="AB+"> AB+ </option>
                     </select>
               </td>
            </tr>
            <tr>
               <td><b>Alamat</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('alamat',$row->alamat,'class=panjang');?>
                  <?php echo form_error('alamat');?>
               </td>
            </tr>
            <tr>
               <td><b>Kode Pos</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('kode_pos',$row->kode_pos,'class=kecil');?>
                  <?php echo form_error('kode_pos');?>
               </td>
            </tr>
            <tr>
               <td><b>Kelurahan / Desa</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('kel_desa',$row->kel_desa,'class=sedang');?>
                  <?php echo form_error('kel_desa');?>
               </td>
            </tr>
            <tr>
               <td><b>Kecamatan</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('kecamatan',$row->kecamatan,'class=sedang');?>
                  <?php echo form_error('kecamatan');?>
               </td>
            </tr>
            <tr>
               <td><b>Kabupaten / Kota</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('kab_kota',$row->kab_kota,'class=sedang');?>
                  <?php echo form_error('kab_kota');?>
               </td>
            </tr>
            <tr>
               <td><b>Provinsi</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('provinsi',$row->provinsi,'class=sedang');?>
                  <?php echo form_error('provinsi');?>
               </td>
            </tr>
            <tr>
               <td><b>Agama</b></td>
               <td>:</td>
               <td> <select name="agama">
                        <option value="<?php echo $row->agama ?>"> <?php echo $row->agama; ?> </option>
                        <option value='...'> ... </option>
                        <option value="Islam"> Islam </option>
                        <option value="Kristen Protestan"> Kristen Protestan </option>
                        <option value="Khatolik"> Khatolik </option>
                        <option value="Hindu"> Hindu </option>
                        <option value="Buddha"> Buddha </option>
                        <option value="Kong Hu Cu"> Kong Hu Cu </option>
                     </select>
               </td>
            </tr>
            <tr>
               <td><b>Status Perkawinan</b></td>
               <td>:</td>
               <td> <select name="status_perkawinan">
                        <option value="<?php echo $row->status_perkawinan ?>"> <?php echo $row->status_perkawinan; ?> </option>
                        <option value='...'> ... </option>
                        <option value="Belum Kawin"> Belum Kawin </option>
                        <option value="Kawin"> Kawin </option>
                        <option value="Cerai Hidup"> Cerai Hidup </option>
                        <option value="Cerai Mati"> Cerai Mati </option>
                     </select>
               </td>
            </tr>
             <tr>
               <td><b>Pendidikan</b></td>
               <td>:</td>
               <td> <select name="pendidikan">
                        <option value="<?php echo $row->pendidikan ?>"> <?php echo $row->pendidikan; ?> </option>
                        <option value='...'> ... </option>
                        <option value="SD"> SD </option>
                        <option value="SLTP"> SLTP </option>
                        <option value="SLTA"> SLTA </option>
                        <option value="D3"> D3 </option>
                        <option value="S1"> S1 </option>
                        <option value="S2"> S2 </option>
                        <option value="S3"> S3 </option>
                     </select>
               </td>
            </tr>
            <tr>
               <td><b>Pekerjaan</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('pekerjaan',$row->pekerjaan,'class=sedang');?>
                  <?php echo form_error('pekerjaan');?>
               </td>
            </tr>
            <tr>
               <td><b>No. Telepon</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('no_telepon',$row->no_telepon,'class=kecil');?>
                  <?php echo form_error('no_telepon');?>
               </td>
            </tr>
            <tr> 
               <td><b>Tanggal Pendaftaran</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_daftar" required value="<?php echo $row->tgl_daftar; ?>" /></td>
            </tr>
            <tr>
               <td><b>No. Porsi</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('no_porsi',$row->no_porsi,'class=kecil');?>
                  <?php echo form_error('no_porsi');?>
               </td>
            </tr>
            <tr>
               <td><b>No. SPPH</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('no_spph',$row->no_spph,'class=kecil');?>
                  <?php echo form_error('no_spph');?>
               </td>
            </tr>
            <tr>
               <td><b>Status Haji</b></td>
               <td>:</td>
               <td> <select name="status_haji">
                        <option value="<?php echo $row->status_haji ?>"> <?php echo $row->status_haji; ?> </option>
                        <option value='...'> ... </option>
                        <option value="Belum Pernah"> Belum Pernah </option>
                        <option value="Sudah Pernah"> Sudah Pernah </option>
                     </select>
               </td>
            </tr>
            <tr>
               <td><b>Mahrom / Muhrim</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('mahrom_muhrim',$row->mahrom_muhrim,'class=sedang');?>
                  <?php echo form_error('mahrom_muhrim');?>
               </td>
            </tr>
            <tr>
               <td><b>Bank Penerima Setoran</b></td>
               <td>:</td>
               <td> <select name="bank_setoran">
                        <option value="<?php echo $row->bank_setoran ?>"> <?php echo $row->bank_setoran; ?> </option>
                        <option value='...'> ... </option>
                        <option value="Bank Panin (Panin Bank) Syariah"> Bank Panin (PaninBank) Syariah </option>
                        <option value="Bank Mega Syariah"> Bank Mega Syariah </option>
                        <option value="Bank Mandiri Syariah"> Bank Mandiri Syariah </option>
                        <option value="Bank Muamalat"> Bank Muamalat </option>
                        <option value="Bank Permata (Permata Bank)"> Bank Permata (Permata Bank) </option>
                        <option value="Bank SUMUT (Sumatra Utara)"> Bank SUMUT (Sumatra Utara) </option>
                        <option value="Bank SUMSEL (Sumatra Selatan)"> Bank SUMSEL (Sumatra Selatan) </option>
                        <option value="Bank BNI Syariah"> Bank BNI Syariah </option>
                        <option value="Bank JATENG (Jawa Tengah)"> Bank JATENG (Jawa Tengah) </option>
                        <option value="Bank DKI"> Bank DKI </option>
                        <option value="Bank Nagari"> Bank Nagari </option>
                        <option value="Bank BRI Syariah"> Bank BRI Syariah </option>
                        <option value="Bank CIMB Niaga Syariah"> Bank CIMB Niaga Syariah </option>
                        <option value="Bank JATIM (Jawa Timur)"> Bank JATIM (Jawa Timur) </option>
                        <option value="Bank BTN Syariah"> Bank BTN Syariah </option>
                        <option value="Bank Riau Kepri"> Bank Riau Kepri </option>
                        <option value="Bank Aceh Syariah"> Bank Aceh Syariah </option>
                     </select>
               </td>
            </tr>
            <tr>
               <td><b>Tahun</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('tahun',$row->tahun,'class=kecil');?>
                  <?php echo form_error('tahun');?>
               </td>
            </tr>
            <tr>
               <td><b>Foto</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('foto',$row->foto,'class=sedang');?>
                  <?php echo form_error('foto');?>
               </td>
            </tr>
            <tr>
               <td></td>
               <td></td>
               <td>
                  <?php echo form_submit('submit','Update','class=button');?>
                  <?php echo form_reset('reset','Cancel','class=button');?>
                  <input type=button class=button value=Kembali onclick=self.history.back()>
               </td>
            </tr>
         </table>
         <?php echo form_close();?>
         
      </div>
   </div>
</div>