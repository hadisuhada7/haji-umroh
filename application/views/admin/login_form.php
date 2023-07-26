<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<head>   
   <meta charset='utf-8'>
   <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel='shortcut icon' href="<?php echo base_url();?>asset/admin/images/favicon.jpg"/>
   <link href="<?php echo base_url();?>asset/admin/css/style.css" rel="stylesheet" type="text/css"/>
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="<?php echo base_url();?>asset/admin/js/script.js"></script>
</head>
<body>
   <div id="login-form">
      <div class="head-loginform"> Login Administrator </div>
         <div class="field-login">
            <form action="<?php echo base_url('index.php/welcome/login'); ?>" method="post">  
               <label> Username </label><br>
                  <input type="text" class="login" name="username" placeHolder="Type Username" required /><br>
               <label> Password </label><br>
                  <input type="password" class="login" name="password" placeHolder="Type Password" required ><br>
                  <input type="submit" class="button" value="Login"/> 
                  <input type="reset" class="button" value="Cancel"/>
            </form>
         </div>
      </div>
   </div>
   <?php
      // Hanya untuk menampilkan informasi saja
      if(isset($login_info))
      {
         echo "<p><center><b>";
         echo $login_info;
         echo "</b></center></p>";
      }
   ?>
</body>