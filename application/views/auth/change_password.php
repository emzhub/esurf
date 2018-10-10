<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
//$this->load->view('templates/_parts/master_header_view'); 
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Checkpoint</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo site_url('assets/theme-default.css');?>"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
   
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
              <div class="login-body">
                <div class="login-title"><strong>
                <i class="fa fa-lock"></i> CheckPoint?</strong>, Pls enter your Username Thank You..!!
               <div id="infoMessage"><?php echo $message;?></div>
                 </div>
<!-- 
<h1><?php echo lang('change_password_heading');?></h1>

<div id="infoMessage"><?php echo $message;?></div>
 -->
<?php echo form_open("auth/change_password");?>

      <p>
            <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
            <?php echo form_input($old_password);?>
      </p>

      <p>
            <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
            <?php echo form_input($new_password ,'','class="form-control"');?>
      </p>

      <p>
            <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
            <?php echo form_input($new_password_confirm ,'','class="form-control"');?>
      </p>

      <?php echo form_input($user_id);?>
      <p><?php echo form_submit('submit', lang('change_password_submit_btn') , 'class="btn btn-primary btn-lg btn-block"');?></p>

<?php echo form_close();?>
   </div>
                
            </div>
            
        </div>
        
    </body>
    
</html> 






