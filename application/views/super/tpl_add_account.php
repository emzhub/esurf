<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="row">
                        
                        <div class="col-md-12">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3><i class="fa fa-user"></i> ACCOUNT</h3>
                                        <span>add a new admin account for a school</span>
                                    </div>                                    
                                     
                                </div>
                               
                                <p class="col-xs-offset-6 pull-right"><br/><br/> <a href="<?php echo site_url('super/user/acc');?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-eye"></i> Preview Accounts?</a></p>
                                <div class="panel-body">
                            
                         <div id="infoMessage"><?php// echo $message;?></div>        
                    <?php if ($this->session->flashdata('showError')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('showError') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('showSuccess')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('showSuccess') ?> </div>
    <?php } ?>
                           <?php echo form_open();?>  
                          
                                        
                        
                          
                                    <div class="form-group">
                             <label class="col-md-3 control-label">Admin Username:</label>  
                                        <div class="col-md-9">
                                                                                 <?php
                // echo form_label('First name','first_name');
                echo form_error('username');
                echo form_input('username',set_value('username'),'class="form-control" placeholder="Enter the admin username" ');
                ?>
  
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                     <div class="form-group">
                             <label class="col-md-3 control-label">Admin   Email:</label>  
                                        <div class="col-md-9">
                                                                                 <?php
                // echo form_label('First name','first_name');
                echo form_error('Email');
                echo form_input('email',set_value('email'),'class="form-control" placeholder="Enter the admin email" ');
                ?>
  
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                             <label class="col-md-3 control-label">Admin Password:</label>  
                                        <div class="col-md-9">
                                                                                 <?php
                // echo form_label('First name','first_name');
                echo form_error('password');
                echo form_input('password',set_value('password'),'class="form-control" placeholder="Enter the admin password"');
                ?>
                  
                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                             <label class="col-md-3 control-label">School Name:</label>  
                                        <div class="col-md-9">
                                 <select name="school_id" id="school_id" class="form-control demoInputBox"  required >
                                      <option value="">Select School</option>
                               <?php
            
                foreach ($school as $child) {
                    ?>
                  
                    <option value="<?=$child->school_id ?>"><?=  $child->school_name ?></option>
            
                    <?php
                }
        
            ?> 

                                 </select>
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                   
                                      <div class="form-group">
        <?php
        // if(isset($groups))
        // {
        //   echo form_label('Groups','groups[]');
        //   foreach($groups as $group)
        //   {
        //     echo '<div class="checkbox">';
        //     echo '<label>';
        //     echo form_checkbox('groups[]', $group->id, set_checkbox('groups[]', $group->id));
        //     echo ' '.$group->name;
        //     echo '</label>';
        //     echo '</div>';
        //   }
        // }
        ?>
      </div>
      
                      <!-- <div class="form-group"> -->
         <!--                                <div class="col-md-9">
        <select name="program_type" id="program_type" required>
                                <option value="">Select</option>
                                
                            </select> -->
               
                          <!--  <span  id="subspan" class="help-block"></span>
                                        </div>
                                    </div>    -->  
                    <!--  <div class="form-group">
                             <label class="col-md-3 control-label">Program Type:</label>  
                                        <div class="col-md-9">
                                 <select name="program_type" id="program_type" required>
                                     <option value="">Select</option>
                                     <option value="1">BSC</option>
                                     <option value="2">master</option>
                                     <option value="3">BSC && MASTER</option>
                                 </select>
                           <span class="help-block"></span>
                                        </div>
                                    </div> -->               
                                                  <div class="form-group">
                             <label class="col-md-3 control-label">Program Type:</label>  
                                        <div class="col-md-9">
                                           <select  name="program_type" id='sel_depart'>
                        <option>-- Select deparment --</option>
                    </select>
</div> 
</div>
 <div class="form-group">
                                <?php echo form_submit('submit', '  Add / Save ', 'class="btn btn-success  btn-sm"');?>
          </div>
            <?php echo form_close();?> 
                                    
                                    
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>
                        
                        
                        
                    </div>
