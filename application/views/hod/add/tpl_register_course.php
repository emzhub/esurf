                 
<div class="row">
                        
                        <div class="col-md-12">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3><i class="fa fa-user"></i> REGISTER A COURSE</h3>
                                        <span>add a new course for  <?=$this->Message_model->get_departname($this->ion_auth->user()->row()->department_id) ;?> department in <?=$this->Message_model->get_school_name($this->ion_auth->user()->row()->school_id) ;?></span>
                                    </div>                                    
                                                       <?php if ($this->session->flashdata('Error')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('Error') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('Success')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('Success') ?> </div>
    <?php } ?>     
                                </div>
                               
                                <p class="col-xs-offset-6 pull-right"><br/><br/> <a href="<?php echo site_url('hod/users/viewcourse');?>" class="btn btn-primary btn-sm btn-flat btn-rounded "><i class="fa fa-eye"></i> Preview Courses</a></p>
                     <?php if($this->ion_auth->user()->row()->program_type ==1){  ?> 
                                <div class="panel-body">
                                  
                      <?php echo form_open('hod/users/regcourse',array('class'=>'form-horizontal'));?>
                                 <div class="form-group">
                             <label class="col-md-3 control-label">Course Name:</label>  
                                        <div class="col-md-9">         
                                            <?php
                              echo form_error('course');
                             ?>   
                           <input type="text" name="course" id="course" required="required"/>
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                             <label class="col-md-3 control-label">Course Code:</label>  
                                        <div class="col-md-9">
                                                       <?php
                              echo form_error('course_code');
                             ?>   
                      <input type="text" name="course_code" id="course_code" required="required"/>
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                             <label class="col-md-3 control-label">Semester:</label>  
                                        <div class="col-md-9">
                                                       <?php
                              echo form_error('semester');
                             ?>   
                           <input type="number" name="semester" id="semester" required="required"/>
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                             <label class="col-md-3 control-label">Credit Hours</label>  
                                        <div class="col-md-9">
                                                       <?php
                              echo form_error('hours');
                             ?>   
                           <input type="number" name="hours" id="hours" required="required"/>
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                      <input type="hidden" name="program_type" value="<?php echo $this->ion_auth->user()->row()->program_type;  ?>">
                                      </div>
                                       <div class="form-group">
                                      <input type="hidden" name="department_id" value="<?php echo $this->ion_auth->user()->row()->department_id;  ?>">
                                      </div>
                                    <div class="form-group"> 
                                    <div class="col-md-3"></div>
                                         <input type="hidden" name="token" value="">
                                        <div class="col-md-9">
                      <button type="submit" class="btn btn-success btn-sm btn-rounded " name="btn_add_course">
              <i class="fa fa-save"></i> Add / Save 
                                        </button>
                                        </div>
                                    </div>
                                   
                                   
                                   
                                     <?php echo form_close();?>
                                    
                                    
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                 
                 <?php  } elseif($this->ion_auth->user()->row()->program_type ==2)  {?>
                   
                    <div class="panel-body">
                      <form method="post" action="">
                            <div class="form-group">
                             <label class="col-md-3 control-label">Course:</label>  
                                        <div class="col-md-9">
                           <input type="text" name="course" id="course" required="required"/>
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                             <label class="col-md-3 control-label">Course Code:</label>  
                                        <div class="col-md-9">
                      <input type="text" name="course_code" id="course_code" required="required"/>
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                             <label class="col-md-3 control-label">Credit Hours</label>  
                                        <div class="col-md-9">
                           <input type="number" name="hours" id="hours" required="required"/>
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                             <label class="col-md-3 control-label">Course starts</label>  
                                        <div class="col-md-9">
                      <input type="date" name="course_start" id="course_start" required="required"/>
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                     <div class="form-group">
                             <label class="col-md-3 control-label">Course ends</label>  
                                        <div class="col-md-9">
                      <input type="date" name="course_end" id="course_end" required="required"/>
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                     <div class="form-group">
                                      <input type="hidden" name="program_type" value="">
                                      </div>
                                       <div class="form-group">
                                      <input type="hidden" name="department_id" value="">
                                      </div>
                                    
                                    <div class="form-group"> 
                                        <div class="col-md-9">
                                          
                      <button type="submit" class="btn btn-success btn-sm btn-rounded " name="btn_add_course">
              <i class="fa fa-save"></i> Add / Save 
                                        </button>
                                        </div>
                                    </div>
                                   
                                   
                                   
                                   </form> 
                                    
                                    
                                </div> 

              <?php  } elseif($this->ion_auth->user()->row()->program_type ==3)  { ?>

                    <?php } else {?>

                             Menu Has Been Disabled
                <?php } ?>
                        
                    </div>
         </div>
