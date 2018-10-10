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

                <?php echo form_open("auth/forgot_password");?>

      <p>
      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?> </label> <br />
      	<?php echo form_input($identity ,'','class="form-control"');?>
      </p>

      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn') , 'class="btn btn-primary btn-lg btn-block"');?></p>

<?php echo form_close();?>
<p class="login-title pull-right"><a href="login"><?php echo lang('login_heading');?></a></p>
   
                </div>
                
            </div>
            
        </div>
        
    </body>
    
</html> 








