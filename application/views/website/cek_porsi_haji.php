<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
 
<div id='main-wrap'>
	<div id='main-center'>
		<div id='head-main'>
			<span> Perkiraan Keberangkatan </span>
		</div>
		<div id='main'>
			
			<table width='100%'>
            <tr>
               <td width='85px'><b>Nomor Porsi</b></td>
               <td width='10px'>:</td>
               <td>
                  <input type="text" name="" class="sedang" value="" />
               </td>
            </tr>
            <tr>
               <td colspan='3'><font size="1">* Perkiraan berangkat dapat berubah, sesuai dengan regulasi.</font></td>
            </tr>
            <tr>
               <td></td>
               <td></td>
               <td>
                  <?php echo form_submit('submit','Search','class=button');?>
                  <input type=button class=button value=Kembali onclick=self.history.back()>
               </td>
            </tr>
         </table>

		</div>
	</div>
</div>