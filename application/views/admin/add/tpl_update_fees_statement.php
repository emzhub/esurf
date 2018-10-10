     <?php defined('BASEPATH') OR exit('No direct script access allowed'); 
     ?>

<div class="row">
                        
                        <div class="col-md-12">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3><i class="fa fa-building-o"></i> STUDENTS</h3>
                                        <span>view added Students for your school</span>
                                    </div>                                    
                                  
                               <?php if ($this->session->flashdata('Error')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('Error') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('Success')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('Success') ?> </div>
    <?php } ?>   
                                </div>
                                
                                <div class="panel panel-default">
                               
                                <div class="panel-body">
                        
                                    <table id="dept_data" class="table datatable">
                                        <thead>
                                            <tr> 
                                                <th>Username</th>
                                                <th>Student's Full Name</th>
                                                <th>Credit || Debit</th> 
                                                 <th>Record</th> 
                                            </tr>
                                          </thead>
                                          <tbody>

                                      <?php

                   foreach($viewstudfee as $stud){
       
              
         
                echo ' 
                <tr>    
            
                <td>'.$stud->username.'</td>
                <td>';
                   
                if(!empty($child['first_name']) && !empty($child['middle_name']) && !empty($child['last_name'])){
                  echo $child['last_name'].' '.$child['first_name'].' '.$child['middle_name'];
                }
                                                                elseif
                                                                (!empty($child['first_name'])&& !empty($child['last_name'])){
                     echo $child['last_name'].' '.$child['first_name'];
                }
                                                                else{
              echo '<i class="fa fa-ban text-danger"></i> Hod\'s name is empty';  
                }
          
                 echo'</td>     
                <td><a href="#" class="btn btn-info btn-sm btn-rounded" data-toggle="modal" data-target="#view_' .$stud->user_id. '">
                                                                                        <i class="fa fa-pencil fa-1x"></i>View</a>  &nbsp;&nbsp;&nbsp;
                                                                                          </td>
                                 <td><a href="#" class="btn btn-info btn-sm btn-rounded">
                                                                                    
                                                                                          <i class="fa fa-eye fa-1x"></i>Statement</a>  &nbsp;&nbsp;&nbsp;</td>                                                            

                                                                                         <div class="modal" id="view_' . $stud->user_id . '" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

                                                                </div>
                                              <div class="modal-body">

                                             <div class="col-md-4 col-xs-12 col-sm-12"><div class="col-md-2"> <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button> 
                                                                    </div><br>
                                                        <div class="portlet light portlet-fit ">
                                                            <div class="portlet-title">'.$this->Message_model->get_departname($stud->department_id) .' Department<br>
                                                           Enrolling Fee : '.$this->Message_model->get_price($stud->department_id,$stud->school_id,$stud->program_type).' <span>Credit Account</span>
                                                                <div class="caption col-md-6">
                                                                    <img src="" class="img-responsive"/>
                                                                       </div>
                                                            </div>
                                                            <div class="portlet-body ">
                                                                <div class="cd-horizontal-timeline mt-timeline-horizontal loaded" data-spacing="60">
                                                                    <!-- .timeline -->
                                                                    <div class="events-content">
                                                                        <ol>

                                                                                <div class="clearfix"></div>
                                                                                     '. form_open('admin/users/fees',array('class'=>'form-horizontal')).'
                                                                                  
                                                                                <div class="mt-content border-grey-steel">
                                                                                    <div class="form-group"> 
                                                                                    '. form_error('transcation_id').'
                                                                                Transaction Id :     <input type="text"  name="transcation_id" id="result" class="form-control" placeholder=" " required/>
                                                                                    <span class="help-block"></span>    '. form_error('description').'
                                                                                     Description :  <input type="text"  name="description" id="result" class="form-control" placeholder=" "required />   
                                                                                    <span class="help-block"></span>'.  form_error('credit').'
                                                                                    Amount :  <input type="text"  name="credit" id="credit" class="form-control" placeholder=" " required />  
                                                                                        <span class="help-block"></span>
                                                                                             <input type="hidden"  name="dprice" id="result" value="' .$this->Message_model->get_price($stud->department_id,$stud->school_id,$stud->program_type) . '"class="form-control" placeholder=" " required/>  
                                                                                        <span class="help-block"></span>
                                                                                       
                                                                                  <input type="hidden"  name="cid" id="cid" class="form-control" value="' . $stud->user_id . '" required/>

                                                                                    </div>
                                                            
                                                                                    <div class="form-group"> 
                                                                      <div class="col-md-4">
                                                  <button type="submit" class="btn btn-success btn-sm btn-rounded " name="btn_add_account">
                                          <i class="fa fa-save"></i> Add / Save 
                                                                    </button></div>
                                                                </div>
                                                                                      <span class="help-block"></span>
                                                                           </div>
                                                                     '.form_close().'
                                                                                   <div class="clearfix"></div>

                                                                        </ol>
                                                                    </div>
                                                                    <!-- .events-content -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>







                                            </div>
                                              <div class="modal-footer">
                                                                        
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> </td> 
                </tr>
                  ';
                          
               } 
               
             ?>


                                                 
                      </tbody>
                    </table>                                    
                    
                  </div>
                </div>
            
            </div>
            <!-- END PROJECTS BLOCK -->
            
        </div>
                        
                        
  </div>

