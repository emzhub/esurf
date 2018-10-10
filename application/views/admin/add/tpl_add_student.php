  <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
                        
                        <div class="col-md-12">
                               <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3><i class="fa fa-user"></i>STUDENT</h3>
                                        <span>add a new student for your school</span>
                                    </div>                                    
                                     
                                </div>
                               
                                <p class="col-xs-offset-6 pull-right"><br/><br/> <a href="<?php echo site_url('admin/users/viewstudent');?>" class="btn btn-primary btn-sm btn-flat btn-rounded "><i class="fa fa-eye"></i> Preview Students Accounts?</a></p>

                               <?php if ($this->session->flashdata('2flashError')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('2flashError') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('2flashSuccess')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('2flashSuccess') ?> </div>
    <?php } ?> 

                    
<?php if($this->ion_auth->user()->row()->program_type ==1){  ?> 
                         
                                <div class="panel-body">
                                                          
                  <?php echo form_open('admin/users/regstudent',array('class'=>'form-horizontal'));?>
                 <div class="form-group">
                             <label class="col-md-3 control-label">Department Name:</label>  
                                        <div class="col-md-9">
                                            <?php
                              echo form_error('department_id');
                             ?>                     
                                 <select name="department_id" id="department_id">
                       '<option value="">Select</option>
							 <?php   foreach($depts as $dept){
				 echo '<option value="'.$dept->department_id.'">'.$dept->department.'</option>';
								}
					          
							 ?>
                                 </select>
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                  <div class="form-group">
                             <label class="col-md-3 control-label">Student's Username:</label>  
                                        <div class="col-md-9">
                                            <?php
                              echo form_error('username');
                             ?>                     
    <input type="text"  name="username" id="username" class="form-control" placeholder="Enter the Student username"/>
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                       <div class="form-group">
                             <label class="col-md-3 control-label">Student   Email:</label>  
                                        <div class="col-md-9">
                                                                                 <?php
                // echo form_label('First name','first_name');
                echo form_error('email');
                echo form_input('email',set_value('email'),'class="form-control" placeholder="Enter the student email" ');
                ?>
  
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                             <label class="col-md-3 control-label">Student's Password:</label>  
                                        <div class="col-md-9">
                                              <?php
                              echo form_error('password');
                             ?>             
                   <input type="password"  name="password" id="password" class="form-control" placeholder="Enter the Student password"/>
                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                     <div class="form-group">
                             <label class="col-md-3 control-label">Student's Password Again:</label>  
                                        <div class="col-md-9">
                                  <?php
                            echo form_error('password_confirm');
                ?>       
                   <input type="password"  name="password_confirm" id="password_confirm" class="form-control" placeholder="Enter the Student password"/>
                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                        <div class="control-group">
         
        
      </div>
                                     <div class="form-group">
                                      <input type="hidden" name="program_type" value="<?php echo $this->ion_auth->user()->row()->program_type;  ?>">
                                      </div>
                                    <div class="form-group"> 
                                    <div class="col-md-3"></div>
                                           <!--  <input type="hidden" name="token" value="<?php //echo Token::generate();  ?>"> -->
                                        <div class="col-md-9">
                      <button type="submit" class="btn btn-success btn-sm btn-rounded " name="btn_add_account">
              <i class="fa fa-save"></i> Add / Save 
                                        </button>
                                        </div>
                                    </div>
                                   
                                   
                                   
                             <?php echo form_close();?>
                                    
                                    
                                </div>
                  
                                       <?php  } elseif($this->ion_auth->user()->row()->program_type ==2)  {?>


                                <div class="panel-body">
                                                          
                  <?php echo form_open('admin/users/regstudent',array('class'=>'form-horizontal'));?>
                 <div class="form-group">
                             <label class="col-md-3 control-label">Department Name:</label>  
                                        <div class="col-md-9">
                                            <?php
                              echo form_error('department_id');
                             ?>                     
                                 <select name="department_id" id="department_id">
                       '<option value="">Select</option>
               <?php   foreach($depts as $dept){
         echo '<option value="'.$dept->department_id.'">'.$dept->department.'</option>';
                }
                    
               ?>
                                 </select>
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                  <div class="form-group">
                             <label class="col-md-3 control-label">Student's Username:</label>  
                                        <div class="col-md-9">
                                            <?php
                              echo form_error('username');
                             ?>                     
    <input type="text"  name="username" id="username" class="form-control" placeholder="Enter the Student username"/>
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                       <div class="form-group">
                             <label class="col-md-3 control-label">Student   Email:</label>  
                                        <div class="col-md-9">
                                                                                 <?php
                // echo form_label('First name','first_name');
                echo form_error('email');
                echo form_input('email',set_value('email'),'class="form-control" placeholder="Enter the student email" ');
                ?>
  
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                             <label class="col-md-3 control-label">Student's Password:</label>  
                                        <div class="col-md-9">
                                              <?php
                              echo form_error('password');
                             ?>             
                   <input type="password"  name="password" id="password" class="form-control" placeholder="Enter the Student password"/>
                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                     <div class="form-group">
                             <label class="col-md-3 control-label">Student's Password Again:</label>  
                                        <div class="col-md-9">
                                  <?php
                            echo form_error('password_confirm');
                ?>       
                   <input type="password"  name="password_confirm" id="password_confirm" class="form-control" placeholder="Enter the Student password"/>
                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                        <div class="control-group">
         
        
      </div>
                                     <div class="form-group">
                                      <input type="hidden" name="program_type" value="<?php echo $this->ion_auth->user()->row()->program_type;  ?>">
                                      </div>
                                    <div class="form-group"> 
                                    <div class="col-md-3"></div>
                                           <!--  <input type="hidden" name="token" value="<?php //echo Token::generate();  ?>"> -->
                                        <div class="col-md-9">
                      <button type="submit" class="btn btn-success btn-sm btn-rounded " name="btn_add_account">
              <i class="fa fa-save"></i> Add / Save 
                                        </button>
                                        </div>
                                    </div>
                                   
                                   
                                   
                             <?php echo form_close();?>
                                    
                                    
                                </div>


                     
              <?php  } elseif($this->ion_auth->user()->row()->program_type ==3)  { ?>

                    <?php } else {?>

                             Menu Has Been Disabled
                <?php } ?>
                        </div>
                        
                        
                        
                    </div>
                    
<?php if(isset($_GET['success'])): ?>
    <script>
        Lobibox.notify('success', {
            msg: 'Registered Successfully!'
        });
    </script>
<?php endif; ?>   