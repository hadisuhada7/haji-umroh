<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<html>
   <head> 
      <title><?php echo $title;?></title>
      <meta charset='utf-8'>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel='shortcut icon' href="<?php echo base_url();?>asset/admin/images/favicon.jpg"/>
      <link href="<?php echo base_url();?>asset/admin/css/style.css" rel="stylesheet" type="text/css" />
      <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url();?>asset/admin/js/script.js"></script>
   </head>
   <body id="background-image">
      <div id="content">
          
         <?php
            // Dynamic content loaded here
            echo $contents;
         ?>

         <div class="clear"></div>
      </div>
   </body>
</html>