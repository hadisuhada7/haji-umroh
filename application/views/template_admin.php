<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<html>
  <head>
    <title><?php echo $title;?></title>
      <meta charset='utf-8'>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel='shortcut icon' href="<?php echo base_url();?>asset/admin/images/favicon.jpg"/>
      <link href="<?php echo base_url();?>asset/admin/css/style.css" rel="stylesheet" type="text/css"/>
      <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>asset/admin/js/script.js"></script>
  </head>
  <body>
     <div id='header-wrap'>
        <div id='header'>
           <div id='logo'>
              <a href="<?php echo base_url();?>index.php/welcome">
                <img src="<?php echo base_url();?>asset/admin/images/logo-admin.png">
              </a>
                 <div class="admin"> Selamat Datang, <?php echo $this->session->userdata('nama');?><br>
                    <a href="<?php echo base_url();?>index.php/website" target="_blank"> Lihat Website </a> | <a href="<?php echo base_url();?>index.php/welcome/help"> Help </a> | <?php echo anchor('welcome/logout','Logout');?>
                 </div>
           </div>
        </div>
     </div>
     <div id="content">

        <?php
          // Tampilkan menubar hanya apabila user telah login
          if($this->auth->is_logged_in() == true):
          //-------------------------------------
          // PINDAHAN DARI VIEW INDEX.PHP
          //-------------------------------------
          // Level untuk user ini
          $level = $this->session->userdata('level');
          // Ambil menu dari database sesuai dengan level
          $menu = $this->usermodel->get_menu_for_level($level);
        ?>
        
        <div id='menu-wrap'>
           <div id='menu-padding'>
              <div id='cssmenu'>
                 <ul>
                    <?php
                      foreach($menu->result() as $row)
                        {
                          echo '<li><a href="'. site_url($row->menu_uri) .'">'. $row->menu_nama .'</a>';
                          
                          $a = $row->menu_id;
                          $submenu = $this->db->query("SELECT * FROM sub_menu WHERE menu_id = '$a'");
                          echo '<ul>';
                            foreach ($submenu->result() as $submenus) 
                            { 
                              echo '<li><a href="'. site_url($submenus->submenu_uri) .'">'. $submenus->submenu .'</a></li>';
                            }
                          echo '</ul></li>';
                        }
                    ?>
                 </ul>
              </div>
           </div>
        </div>
        
        <?php
          //--------------------------------------
            //    END PINDAHAN
            //--------------------------------------
          endif;
        ?>
         
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