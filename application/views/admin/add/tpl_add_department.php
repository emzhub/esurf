     <?php defined('BASEPATH') OR exit('No direct script access allowed');  //$csrf =array('name'=> $this->security->get_csrf_token_name(),'hash'=>$this->security->get_csrf_hash());
     ?>

<div class="row">
     <div class="col-md-12">
   <?php if ($this->session->flashdata('showErro')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('showErro') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('showSucces')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('showSucces') ?> </div>
    <?php } ?> 
                    
<?php if($this->ion_auth->user()->row()->program_type ==1){  ?> 
       
         
                                                            
                                <div class="panel panel-default tabs">                            
                                    <ul class="nav nav-tabs" role="tablist">
      <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Department</a></li>
                                     </ul>
                                    <div class="panel-body tab-content">
                                        <div class="tab-pane active" id="tab-first">
                                        <a href="<?php echo site_url('admin/users/viewdepartment');?>" class="btn btn-primary btn-sm btn-flat btn-rounded pull-right"><i class="fa fa-eye"></i> View Department?</a>
                            
                            <p>Add a new department to your school using this field below</p>
                                <?php echo form_open('',array('class'=>'form-horizontal'));?>
                            <!--   <form action="<?php //echo site_url('admin/users/adddepartment')?>" id="form" class="form-horizontal"> -->
                                           <div class="form-group">
          <label class="col-md-3 col-xs-12 control-label">Department</label>
                                                <div class="col-md-6 col-xs-12">        
                                                   <?php
                              echo form_error('department');
                             ?>                                              
   <input type="text" class="form-control" placeholder="Enter the department name here" name="department" id="department" />                                                    
                                                </div>
                                            </div>
                                 <!--     <div class="form-group">
                                      <input type="hidden" id="<?= $csrf['name'] ?>" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">
                               </div> -->
                                           
                        <div class="form-group">
                                      <input type="hidden" id="program_type" name="program_type" value="<?php echo $this->ion_auth->user()->row()->program_type;?>">
                               </div>
                                          <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Description</label>
                                                <div class="col-md-6 col-xs-12">  
                                                   <?php
                              echo form_error('description');
                             ?>                       
                                                <textarea class="form-control" rows="5" placeholder="Kindly describe what the department entails." name="description" id="description"></textarea>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>                                           
                                            
                                        </div>  
                                                                                
                                        
                                    </div>
                                    <div class="panel-footer">     <div class="col-md-6 col-xs-12"> </div>                            
                                      <div class="col-md-6 col-xs-12">  
                                        
                                        <button type="submit" class="btn btn-primary btn-rounded" onclick="savec()" name="btnSave" id="btnSave" >Save Changes <span class="fa fa-floppy-o fa-right"></span></button></div>
                                    </div>
                                           <?php echo form_close();?>
                                </div>                                
                            
                      
            
           <?php  } elseif($this->ion_auth->user()->row()->program_type ==2)  {?>
      
                                                            
                                <div class="panel panel-default tabs">                            
                                    <ul class="nav nav-tabs" role="tablist">
      <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Department</a></li>
                                     </ul>
                                    <div class="panel-body tab-content">
                                        <div class="tab-pane active" id="tab-first">
                                        <a href="<?php echo site_url('admin/users/viewdepartment');?>" class="btn btn-primary btn-sm btn-flat btn-rounded pull-right"><i class="fa fa-eye"></i> View Department?</a>
                            
                            <p>Add a new department to your school using this field below</p>
                                 <?php echo form_open('admin/users/adddepartment2',array('class'=>'form-horizontal'));?>
                            <!--   <form action="<?php //echo site_url('admin/users/adddepartment')?>" id="form" class="form-horizontal"> -->
                                           <div class="form-group">
          <label class="col-md-3 col-xs-12 control-label">Department</label>
                                                <div class="col-md-6 col-xs-12">        
                                                   <?php
                              echo form_error('department');
                             ?>                                              
   <input type="text" class="form-control" placeholder="Enter the department name here" name="department" id="department" />                                                    
                                                </div>
                                            </div>
                                 <!--     <div class="form-group">
                                      <input type="hidden" id="<?= $csrf['name'] ?>" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>">
                               </div> -->
                                           
                        <div class="form-group">
                                      <input type="hidden" id="program_type" name="program_type" value="<?php echo $this->ion_auth->user()->row()->program_type;?>">
                               </div>
                                          <div class="form-group">
              <label class="col-md-3 col-xs-12 control-label">Description</label>
                                                <div class="col-md-6 col-xs-12">  
                                                   <?php
                              echo form_error('description');
                             ?>                       
                                                <textarea class="form-control" rows="5" placeholder="Kindly describe what the department entails." name="description" id="description"></textarea>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>                                           
                                                 <div class="form-group">
          <label class="col-md-3 col-xs-12 control-label">Price</label>
                                                <div class="col-md-6 col-xs-12">                                                                                    <?php
                              echo form_error('price');
                             ?>                                                                                            
   <input type="text" class="form-control" placeholder="Enter the Price For Enrolling" name="price" id="price" />                                                    
                                                </div>
                                            </div>
                                        </div>  
                                                                                
                                        
                                    </div>
                                    <div class="panel-footer">     <div class="col-md-6 col-xs-12"> </div>                            
                                      <div class="col-md-6 col-xs-12">  
                                        
                                        <button type="submit" class="btn btn-primary btn-rounded" onclick="savec()" name="btnSave" id="btnSave" >Save Changes <span class="fa fa-floppy-o fa-right"></span></button></div>
                                    </div>
                                           <?php echo form_close();?>

                                        
                                </div>                                
                            
                     
              <?php  } elseif($this->ion_auth->user()->row()->program_type ==3)  { ?>

                    <?php } else {?>

                             Menu Has Been Disabled
                <?php } ?>
           
            
            
            
             </div>
                        
      </div>

  <script>

 function savec()
    // {
      
    //       // ajax adding data to database
    //       $.ajax({
    //         url : "<?php echo site_url('admin/users/adddepartment')?>",
    //         type: "POST",
    //         data: $('#form').serialize(),
    //         dataType: "JSON",
    //         success: function(data)
    //         {
    //            //if success close modal and reload ajax table
    //                 alert('New Department  have successfully added Thank You..');
    //           location.reload();// for reload a page
    //         },
    //         error: function (jqXHR, textStatus, errorThrown)
    //         {
    //             alert('Error occured ,Please Try again..');

    //         }
    //     });
    // }
  </script>