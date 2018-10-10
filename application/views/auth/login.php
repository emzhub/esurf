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
                <i class="fa fa-lock"></i> CheckPoint?</strong>,
               <div id="infoMessage"><?php echo $message;?></div>
                 </div>

<?php echo form_open("auth/login");?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity ,'','class="form-control"');?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password ,'','class="form-control"');?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>


  <p><?php echo form_submit('submit', lang('login_submit_btn')  , 'class="btn btn-primary btn-lg btn-block"');?></p>

<?php echo form_close();?>

<p class="login-title pull-right"><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
  </div>
                
            </div>
            
        </div>
        
    </body>
    
</html> 


