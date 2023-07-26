<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
   <div id='main-center'>
      <div id='head-main'>
         <span> Form Input Paket Umroh </span>
      </div>
      <div id='main'>

         <?php echo form_open('welcome/insert_paket_umroh');?>
         <table width='100%'>
            <tr>
               <td width='180px'><b>Id. Paket Umroh</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="id_paket_umroh" class="kecil" value="<?php echo $kode_paket_umroh; ?>" readonly />
               </td>
            </tr>
            <tr>
               <td><b>Nama Program</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('nama_program',set_value('nama_program'),'class=sedang');?>
                  <?php echo form_error('nama_program');?>
               </td>
            </tr>
            <tr>
               <td><b>Durasi</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('durasi',set_value('durasi'),'class=sedang');?>
                  <?php echo form_error('durasi');?>
               </td>
            </tr>
            <tr>
               <td><b>Biaya</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('biaya',set_value('biaya'),'class=sedang');?>
                  <?php echo form_error('biaya');?>
               </td>
            </tr>
            <tr> 
               <td><b>Tanggal Keberangkatan</b></td>
               <td>:</td>
               <td><input type="date" name="tgl_keberangkatan" required value="<?php echo ('tgl_keberangkatan'); ?>" /></td>
            </tr>
            <tr>
               <td><b>Pesawat</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('pesawat',set_value('pesawat'),'class=sedang');?>
                  <?php echo form_error('pesawat');?>
               </td>
            </tr>
            <tr>
               <td><b>Hotel Makkah</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('hotel_makkah',set_value('hotel_makkah'),'class=sedang');?>
                  <?php echo form_error('hotel_makkah');?>
               </td>
            </tr>
            <tr>
               <td><b>Hotel Madinah</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('hotel_madinah',set_value('hotel_madinah'),'class=sedang');?>
                  <?php echo form_error('hotel_madinah');?>
               </td>
            </tr>
            <tr>
               <td><b>Hotel Turki</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('hotel_turki',set_value('hotel_turki'),'class=sedang');?>
                  <?php echo form_error('hotel_turki');?>
               </td>
            </tr>
            <tr>
               <td><b>Fasilitas</b></td>
               <td>:</td>
               <td> <select name="fasilitas">
                        <option value='...'> ... </option>
                        <option value="Quard (Sekamar Berempat)"> Quard (Sekamar Berempat) </option>
                        <option value="Triple (Sekamar Bertiga)"> Triple (Sekamar Bertiga) </option>
                        <option value="Double (Sekamar Berdua)"> Double (Sekamar Berdua) </option>
                     </select>
               </td>
            </tr>
            <tr>
               <td><b>Seat</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('seat',set_value('seat'),'class=sedang');?>
                  <?php echo form_error('seat');?>
               </td>
            </tr>
            <tr>
               <td><b>Seat Tersisa</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('sisa_seat',set_value('sisa_seat'),'class=sedang');?>
                  <?php echo form_error('sisa_seat');?>
               </td>
            </tr>
            <tr>
               <td><b>Nama Travel</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('nama_travel',set_value('nama_travel'),'class=panjang');?>
                  <?php echo form_error('nama_travel');?>
               </td>
            </tr>
            <tr>
               <td><b>No. Izin Travel</b></td>
               <td>:</td>
               <td>
                  <?php echo form_input('no_izin',set_value('no_izin'),'class=sedang');?>
                  <?php echo form_error('no_izin');?>
               </td>
            </tr>
            <tr>
               <td></td>
               <td></td>
               <td>
                  <?php echo form_submit('submit','Submit','class=button');?>
                  <?php echo form_reset('reset','Cancel','class=button');?>
                  <input type=button class=button value=Kembali onclick=self.history.back()>
               </td>
            </tr>
         </table>
         <?php echo form_close();?>
         
      </div>
   </div>   
</div>