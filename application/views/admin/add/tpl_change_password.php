 <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 <div class="row">
     <div class="col-md-12">
     
             
                               <?php if ($this->session->flashdata('2flashError')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('2flashError') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('2flashSuccess')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('2flashSuccess') ?> </div>
    <?php } ?> 

            
               <?php echo form_open('admin/users/cp',array('class'=>'form-horizontal'));?>
                                                            
                                <div class="panel panel-default tabs">                            
                                    <ul class="nav nav-tabs" role="tablist">
      <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Change Password</a></li>
                                     </ul>
                                    <div class="panel-body tab-content">
                                        
                            <p>Please provide a new password using this field below</p>
                                <div class="form-group">
                             <label class="col-md-3 control-label">NEW Password:</label>  
                                        <div class="col-md-9">
                                              <?php
                              echo form_error('password');
                             ?>             
                   <input type="password"  name="password" id="password" class="form-control" placeholder="Enter the NEW password"/>
                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                           <div class="form-group">
                             <label class="col-md-3 control-label">NEW Password Again:</label>  
                                        <div class="col-md-9">
                                  <?php
                            echo form_error('password_confirm');
                ?>       
                   <input type="password"  name="password_confirm" id="password_confirm" class="form-control" placeholder="Enter the NEWpassword"/>
                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                            
                                        </div>
                                                                                
                                        
                                    </div>
                                    <div class="panel-footer">                                        <div class="col-md-3 col-xs-12">  </div>
                                        
                                                    <div class="col-md-6 col-xs-12">  
                                        <button type="submit" class="btn btn-primary btn-rounded " name="btn_chp">Changes Pasword <span class="fa fa-floppy-o fa-right"></span></button></div>
                                    </div>
                                </div>                                
                            
                            </form>
            
            
            
            
            
             </div>
                        
      </div>