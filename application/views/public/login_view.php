 <?php defined('BASEPATH') OR exit('No direct script access allowed');?>
 <br><br>
<br>
       
       <div class="login-container lightmode"> <div class="bg_img"> <img class="img-responsive" src="../../assets/public/img/Untitled-1.png" height="auto" width="580"> </div>
 
        
        <div class="login-logo">
  <span class="btn btn-primary btn-sm btn-flat  pull-right text-info text-sm">E-surf&raquo;Verison:<?=CI_VERSION ?> </span>
        
   <div class="col-md-12">
     <a href="<?php echo site_url('welcome');?>" class="btn btn-primary btn-sm btn-flat btn-rounded pull-left"><i class="fa fa-eye"></i> Welcome Page?</a>
            <div class="login-box animated fadeInDown">
                <div class="badge bg-info fa-lg">E-surf, Registered members only!</div>
                <br/><br/>
                <div class="login-body ">  <?php if ($this->session->flashdata('loginError')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('loginError') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('flashSuccess')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('flashSuccess') ?> </div>
    <?php } ?><hr><br>
                   <div class="newsfeeds">
                       <div class="badge bg-primary fa-lg">Please Enter User id && Password!</div>
                                                
      
                         <?php echo form_open('',array('class'=>'form-horizontal'));?>

         
        <fieldset>
                <?php echo form_label('Username','identity');?>
        <?php echo form_error('identity');?>
        <?php echo form_input('identity','','class="form-control"');?>     
       
              <?php echo form_label('Password','password');?>
        <?php echo form_error('password');?>
        <?php echo form_password('password','','class="form-control"');?>
   
                <?php echo form_checkbox('remember','1',FALSE); echo form_label('Remember me','Remember me'); ?> 
 <a href="<?php echo site_url('auth/forgot_password');?>"  class="pull-right">forgot password...</a>
             </fieldset>

       <?php echo form_submit('submit', 'Log in', 'class="btn btn-primary btn-lg btn-block"');?>
    <?php echo form_close();?>
   
                         <div class="create-account">
                    <p>
                         <a href="javascript:;" id="post-somer"  class="btn btn-info btn-block btn-rounded ">Create an Account...</a>
                    </p>
                    
                </div>
                 
                    </div>
                     <div class="some">
                              <div class="badge bg-primary fa-lg">Please Check Mail && Enter First Key && Second Key!</div><hr><br>
                              <form class="form-horizontal " method="post" action="tpl_confirm_key.php">
                    <div class="form-group">
                        <div class="col-md-12">
           <input type="text" class="form-control" placeholder="First Key" name="fkey" id="fkey" value=""   required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
      <input type="password" class="form-control" placeholder="Second Key" name="skey" id="skey" value=""   required/>
                        </div>
                    </div>
                    <div class="form-group">
                     
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-danger btn-block btn-rounded"  name="btn_key"><i class="fa fa-arrow-circle-o-right"></i><span id="user_login_btn">Confirm</span></button>
                        </div>
                        
                         
                    
                    </div>
                         <div class="create-account">
                    <p>
<!--                                <a href="register"  class="btn btn-info btn-block btn-rounded">Submit...</a>-->
                         <a href="javascript:;"  id="postback-btn"  class="btn btn-info btn-block btn-rounded ">Login...</a>
                
                    </p>
                    
                </div>
                  
                    </form>       
                    </div>    
                     
             
            
                    </div>
            </div>
<!--             end partition -->
         </div>


             <div class="col-md-4 col-xs-offset-4">
             <br/><br/> <br/><br/> <br/><br/> <br/><br/> <br/><br/>
             <div class="login-footer">
                   <div class="pull-left">
                  E-surf &copy; 
                   </div>
                   <div class="pull-right">
                     <a href="#">About  E-surf</a> |
                     <a href="#">Privacy</a> |
                     <a href="#">Contact Us</a>
                    </div>
                </div>
        </div>
        
        </div>
        </div>
                
