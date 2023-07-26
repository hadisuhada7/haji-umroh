<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<html>
  <head>
    <title><?php echo $title;?></title>
      <meta charset='utf-8'>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel='shortcut icon' href="<?php echo base_url();?>asset/admin/images/favicon.jpg"/>
      <link href="<?php echo base_url();?>asset/admin/css/style.css" rel="stylesheet" type="text/css"/>
      <link href="<?php echo base_url();?>asset/admin/css/js-image-slider.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url();?>asset/admin/css/slider.css" rel="stylesheet" type="text/css" />
      <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>asset/admin/js/script.js"></script>
      <script src="<?php echo base_url();?>asset/admin/js/js-image-slider.js" type="text/javascript"></script>
  </head>
  <body>
     <div id='header-wrap'>
        <div id='header'>
           <div id='logo'>
              <a href="<?php echo base_url();?>index.php/website">
                <img src="<?php echo base_url();?>asset/admin/images/logo-website.png">
              </a>
                 <div class="sosial-media">
                    <a href="#">
                      <img src="<?php echo base_url();?>asset/admin/images/sosmed/facebook.png" width="40" height="40" border="0"> 
                    </a>
                    <a href="#">
                      <img src="<?php echo base_url();?>asset/admin/images/sosmed/twitter.png" width="40" height="40" border="0"> 
                    </a>
                    <a href="#">
                      <img src="<?php echo base_url();?>asset/admin/images/sosmed/instagram.png" width="40" height="40" border="0"> 
                    </a>
                    <a href="#">
                      <img src="<?php echo base_url();?>asset/admin/images/sosmed/youtube.png" width="40" height="40" border="0"> 
                    </a>
                    <a href="<?php echo base_url();?>index.php/website/kontak_kami">
                      <img src="<?php echo base_url();?>asset/admin/images/sosmed/call_us_now.png" width="130" height="40" border="0"> 
                    </a>
                 </div>
           </div>
        </div>
     </div>
     <div id="content">

        <div id='menu-wrap'>
           <div id='menu-padding'>
              <div id='cssmenu'>
                  <ul>
                    <li><a href="<?php echo base_url();?>index.php/website/beranda">Beranda</a></li>
                    <li class='has-sub'><a href="<?php echo base_url();?>index.php/website/tentang_kami">Tentang Kami</a>
                      <ul>
                        <li><a href="<?php echo base_url();?>index.php/website/profil">Profil</a>
                        <li><a href="<?php echo base_url();?>index.php/website/visi_misi">Visi & Misi</a>
                        <li><a href="<?php echo base_url();?>index.php/website/struktur_organisasi">Struktur Organisasi</a>
                      </ul>
                    </li>
                    <li><a href="<?php echo base_url();?>index.php/website/berita">Berita</a></li>
                    <li class='has-sub'><a href="<?php echo base_url();?>index.php/website/umroh">Umroh</a>
                      <ul>
                        <li><a href="<?php echo base_url();?>index.php/website/umroh_hemat">Umroh Hemat</a>
                        <li><a href="<?php echo base_url();?>index.php/website/umroh_reguler">Umroh Reguler</a>
                        <li><a href="<?php echo base_url();?>index.php/website/umroh_vip">Umroh VIP</a>
                        <li><a href="<?php echo base_url();?>index.php/website/umroh_ramadhan">Umroh Ramadhan</a>
                        <li><a href="<?php echo base_url();?>index.php/website/umroh_plus_turki">Umroh Plus Turki</a>
                      </ul>
                    </li>
                    <li class='has-sub'><a href="<?php echo base_url();?>index.php/website/haji">Haji</a>
                      <ul>
                        <li><a href="<?php echo base_url();?>index.php/website/haji_reguler">Haji Reguler</a>
                        <li><a href="<?php echo base_url();?>index.php/website/haji_khusus">Haji Khusus</a>
                        <li><a href="<?php echo base_url();?>index.php/website/haji_plus">Haji Plus</a>
                        <li><a href="<?php echo base_url();?>index.php/website/cek_porsi_haji">Cek Porsi Haji</a>
                      </ul>
                    </li>
                    <li><a href="<?php echo base_url();?>index.php/website/bimbingan_manasik">Bimbingan Manasik</a></li>
                    <li><a href="<?php echo base_url();?>index.php/website/badal_haji">Badal Haji</a></li>
                    <li class='has-sub'><a href="<?php echo base_url();?>index.php/website/galeri">Galeri</a>
                      <ul>
                        <li><a href="<?php echo base_url();?>index.php/website/foto">Foto</a>
                        <li><a href="<?php echo base_url();?>index.php/website/video">Video</a>  
                      </ul>
                    </li>
                    <li class='has-sub'><a href="<?php echo base_url();?>index.php/website/pendaftaran">Pendaftaran</a>
                      <ul>
                        <li><a href="<?php echo base_url();?>index.php/website/pendaftaran_umroh">Umroh</a>
                        <li><a href="<?php echo base_url();?>index.php/website/pendaftaran_haji">Haji</a>
                        <li><a href="<?php echo base_url();?>index.php/website/pendaftaran_bimsik">Bimbingan Manasik</a>
                      </ul>
                    </li>
                    <li><a href="<?php echo base_url();?>index.php/website/kontak_kami">Kontak</a></li>
                  </ul>
              </div>
           </div>
        </div>
         
        <?php
           // Dynamic content loaded here
           echo $contents;
        ?>

        <div id='footer'>
           <div id='footer-wrap'>
              <div class="cleaner_h20"></div>
                 <div align="center">
                    Copyright &copy; 2018 KBIH Al-Hidayah Kota Cirebon <br>
                    All Rights Reserved.
                 </div>
              <div class="cleaner_h30"></div>
           </div>
        </div>   
         
        <div class="clear"></div>
     </div>
  </body>
</html>