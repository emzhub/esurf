      <?php defined('BASEPATH') OR exit('No direct script access allowed'); 
     ?>

       <!-- START CONTENT FRAME -->
                <div class="content-frame">                                    
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">
                        <div class="page-title">                    
                            <h2><span class="fa fa-pencil"></span> Compose</h2>
                             <?php if ($this->session->flashdata('2flashError')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('2flashError') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('2flashSuccess')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('2flashSuccess') ?> </div>
    <?php } ?> 
        Statistics: <?=$this->Message_model->get_school_name($this->ion_auth->user()->row()->school_id) ;?>  currently has:<br>
<span class="badge bg-primary">  [<?php echo $count_admin; ?>] Admin  </span>,
<span class="badge bg-warning">  [<?php echo $count_hod; ?>] Hod  </span>,
<span class="badge bg-info">  [<?php echo $count_lecturer; ?>] Lecturer  </span>,
<span class="badge bg-success">  [<?php echo $count_src; ?>] Src  </span>
<span class="badge bg-default">  [<?php echo $count_student; ?>] Students  </span>
<span class="badge bg-default">  [<?php echo $count_librarians; ?>] Librarians  </span>
                        </div>                         
                        
                   <!--      <div class="pull-right">                                                                                    
                            <button class="btn btn-default"><span class="fa fa-cogs"></span> Settings</button>
                            <button class="btn btn-default"><span class="fa fa-floppy-o"></span> Save</button>
                            <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
                        </div> -->
                    </div>
                    <!-- END CONTENT FRAME TOP -->
                    
                    <!-- START CONTENT FRAME LEFT -->
                    <div class="content-frame-left">
                        <div class="block">
                            <div class="list-group border-bottom">
                                <a href="<?php echo site_url('admin/users/message');?>" class="list-group-item"><span class="fa fa-inbox"></span> Inbox <span class="badge badge-success"><?php echo $count_inbox; ?></span></a>
                                <a href="#" class="list-group-item"><span class="fa fa-rocket"></span> Sent <span class="badge badge-warning"><?php echo $count_sent; ?></span></a>
                             <!--   <a href="#" class="list-group-item"><span class="fa fa-flag"></span> Flagged</a>
                                <a href="#" class="list-group-item"><span class="fa fa-trash-o"></span> Deleted <span class="badge badge-default">1.4k</span></a>         -->                    
                            </div>                        
                        </div>
                      <!--   <div class="block">
                            <h4>Labels</h4>
                            <div class="list-group list-group-simple">                                
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-success"></span> Clients</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-warning"></span> Social</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-danger"></span> Work</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-info"></span> Family</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-primary"></span> Friends</a>
                            </div>
                        </div> -->
                    </div>
                    <!-- END CONTENT FRAME LEFT -->
                    
                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body">
                        <div class="block">
                        <?php echo form_open('admin/users/sendmessage',array('class'=>'form-horizontal'));?>
                          <!--   <div class="form-group">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <button class="btn btn-default"><span class="fa fa-trash-o"></span> Delete Draft</button>
                                    </div>
                                    <div class="pull-right">
                                        <button class="btn btn-danger"><span class="fa fa-envelope"></span> Send Message</button>
                                    </div>                                    
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-md-2 control-label">From:</label>
                                <div class="col-md-9">                                        
                                     <input type="text" name="user_from" class="tagsinput" value="<?=$this->ion_auth->user()->row()->uid ;?>" data-placeholder="<?=$this->ion_auth->user()->row()->email;?>"  disabled/>
                                </div>
                            </div>                        
                            <div class="form-group">
                                <label class="col-md-2 control-label">To:</label>
                                <div class="col-md-10">                                        
                                 
                                     <select name="to_id[]" id="to_id[]" multiple="multiple" class="form-control select">
                               <?php
                            foreach($to_id as $lecturer){
  if(!empty($lecturer->username) ){
    
                    echo '<option value="'.$lecturer->uid.'">'.$lecturer->username.'     ['.$this->Bs_admin_model->get_user_department($lecturer->department_id).'  Department ]     ['.$this->Bs_admin_model->get_group_name($this->Bs_admin_model->get_users_id($lecturer->id)).']</option>';
                }
           else{
          echo '<option value="">Contact Unavailable  </option>';                              
             }
        
                            }
            
                           ?>                                                    
                                    </select>                                
                                </div>
                                <!-- <div class="col-md-1">
                                    <button class="btn btn-link toggle" data-toggle="mail-cc">Cc</button>
                                </div> -->
                            </div>
                           <!--  <div class="form-group hidden" id="mail-cc">
                                <label class="col-md-2 control-label">Cc:</label>
                                <div class="col-md-10">                                        
                                <input type="text" class="tagsinput" value="" data-placeholder="add email"/>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-md-2 control-label">Subject:</label>
                                <div class="col-md-10">                                        
                                    <input type="text" class="form-control" name="subject" id="subject"   value=""/>                                
                                </div>                                
                            </div>
                           <!--  <div class="form-group">
                                <label class="col-md-2 control-label">Attachments:</label>
                                <div class="col-md-10">                                        
                                    <input type="file" class="file" data-filename-placement="inside"/>
                                </div>                                
                            </div> -->
                            <div class="form-group">
                                <div class="col-md-12">                            
                                     <textarea class="summernote_email" name="content"><p>Hello Sir/Madam,</p>








<p><strong>Best Regards<br/><?=$this->ion_auth->user()->row()->username ;?><br/><?=$this->ion_auth->user()->row()->email ;?><br/><?=$this->Bs_admin_model->get_user_department($lecturer->department_id) ;?> Department</strong></p>                                        
                                    </textarea>                      
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                  <!--   <div class="pull-left">
                                        <button class="btn btn-default"><span class="fa fa-trash-o"></span> Delete Draft</button>
                                    </div> -->
                                    <div class="pull-right">
                                        <button class="btn btn-danger"><span class="fa fa-envelope"></span> Send Message</button>
                                    </div>                                    
                                </div>
                            </div>
                      <?php echo form_close();?>
                        </div>
                        
                    </div>
                    <!-- END CONTENT FRAME BODY -->
                </div>
                <!-- END CONTENT FRAME -->  