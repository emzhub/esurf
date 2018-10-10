<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="row">
                        
                        <div class="col-md-12">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3><i class="fa fa-building-o"></i> SCHOOL</h3>
                                        <span>add a new school</span>
                                    </div>                                    
                                     
                                </div>
                               
                                <p class="col-xs-offset-6 pull-right"><br/><br/> <a href="<?php echo site_url('super/user/vs');?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-eye"></i> Preview Schools?</a></p>
                                <div class="panel-body">
                            
        <?php if ($this->session->flashdata('flashError')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('flashError') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('flashSuccess')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('flashSuccess') ?> </div>
    <?php } ?>
                           <?php echo form_open();?>         
                   <!--    <form method="post" action="<?php //echo base_url('super/user/Adsc'); ?>"> -->
                                   <div class="form-group">
                             <label class="col-md-3 control-label">School Name</label>  
                                        <div class="col-md-9">
                                              <?php
                 //echo form_label('School Name','school_name');
                echo form_error('school_name');
                echo form_input('school_name',set_value('school_name'),'class="form-control" placeholder="Enter the school name to add (Max Length: 100)"');
                ?>
 <!--     <input type="text"  name="school_name" id="school_name" class="form-control" placeholder="Enter the school name to add (Max Length: 100)" required/> -->
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                             <label class="col-md-3 control-label">School Abbreviation</label>  
                                        <div class="col-md-9">
                                            <?php
              //  echo form_label('School Abbreviation','school_abrv');
                echo form_error('school_abrv');
                echo form_input('school_abrv',set_value('school_abrv'),'class="form-control" placeholder="Enter the school abrv (Max Length: 50)"');
                ?>
<!--     <input type="text"  name="school_abrv" id="school_abrv" class="form-control" placeholder="Enter the school abrv (Max Length: 50)" required/> -->
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                             <label class="col-md-3 control-label">School Location</label>  
                                        <div class="col-md-9">
                                             <?php
                // echo form_label('First name','first_name');
                echo form_error('school_location');
                echo form_input('school_location',set_value('school_location'),'class="form-control" placeholder="Enter the school location (Max Length: 50)"');
                ?>
    
                           <span class="help-block"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                             <label class="col-md-3 control-label">School Type</label>  
                                        <div class="col-md-9">
                    
                   <select name="school_type" id="school_type" class="form-control">
                                         <option value="" selected>Select School Type</option>
                                         <option value="Public">Public</option>
                                         <option value="Private">Private</option>
                                         <option value="Other">Other</option>
                                         </select>
                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                             <label class="col-md-3 control-label">School Population</label>  
                                  <div class="col-md-9">
                                                           <?php
                // echo form_label('First name','first_name');
                echo form_error('school_population');
                echo form_input('school_population',set_value('school_population'),'class="form-control" ');
                ?>

                           <span class="help-block"></span>
                                        </div>
                                    </div>   
                          <div class="form-group">
                             <label class="col-md-3 control-label">Select Program: Bsc</label>  
                                 <input type="checkbox" class="icheckbox" name="bsc_id" id="bsc_id" value="1"/>
                                 
                                        </div>  
                          <div class="form-group">
                             <label class="col-md-3 control-label">Select Program: Master</label>  
                                 <input type="checkbox" class="icheckbox" name="ms_id" id="ms_id" value="2"/>
                                 
                                        </div> 
                                         <div class="form-group">
                             <label class="col-md-3 control-label">Select Program: Master && Bsc</label>  
                                 <input type="checkbox" class="icheckbox" name="BSCandMASTER" id="BSCandMASTER" value="3"/>
                                 
                                        </div> 
                                      <!--   <div class="form-group">
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                        </div> -->
                                  <!--   <div class="form-group"> 
                                    <div class="col-md-3"></div>
                                        <div class="col-md-9">
                      <button type="submit" class="btn btn-success btn-sm" >
              <i class="fa fa-save"></i> Add / Save 
                                        </button>
                                        </div>
                                    </div> -->
                                   
                                   <?php echo form_submit('submit', '  Add / Save ', 'class="btn btn-success  btn-sm"');?>
          
            <?php echo form_close();?> 
                                   
                               <!--     </form>  -->
                                    
                                    
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>
                        
                        
                        
                    </div>