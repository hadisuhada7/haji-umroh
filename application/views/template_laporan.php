<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<html>
  <head>
    <title><?php echo $title;?></title>
      <meta charset='utf-8'>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel='shortcut icon' href="<?php echo base_url();?>asset/admin/images/favicon.jpg"/>
  </head>
  <body>
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

        <div class="clear"></div>
     </div>
  </body>
</html>