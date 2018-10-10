     <?php defined('BASEPATH') OR exit('No direct script access allowed');  //$csrf =array('name'=> $this->security->get_csrf_token_name(),'hash'=>$this->security->get_csrf_hash());
     ?>
<div class="row">
                        
                        <div class="col-md-12">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                           <h3><i class="fa fa-building-o"></i> HOD</h3>
                                        <span>view added HOD for your school</span>
                                    </div>                                    
                                    
                                </div>
                                <?php if($this->ion_auth->user()->row()->program_type ==1){  ?> 
                                <div class="panel panel-default">
                                <div class="panel-heading">
                  <h3 class="panel-title"><a href="<?php echo site_url('admin/users/reghod');?>" class="btn btn-success btn-sm btn-flat btn-rounded "><i class="fa fa-plus"></i> Add New Hod?</a></h3> </div>
                                <div class="panel-body">
                                    <table id="dept_data" class="table datatable">
                                        <thead>
                                            <tr> 
                                                 <th>Department ID</th>
                                                <th>Department</th>
                                                <th>Username</th>
                                                <th>HOD Full Name</th>
                                                <th>Date Added</th> 
                                            </tr>
                                          </thead>
                                          <tbody>
                                                           <?php

                   foreach($viewhod as $stud){
       
              
         
                echo ' 
                <tr>    
                 <td>'.$stud['department_id'].'</td>
                <td>'.$stud['department'].'</td>
                <td>'.$stud['username'].'</td>
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
                <td>'.$stud['date'].'</td> 
                </tr>
                  ';
                          
               } 
               
             ?>
                      </tbody>
                    </table>                                    
                    
                  </div>
                </div>
                          
           <?php  } elseif($this->ion_auth->user()->row()->program_type ==2)  {?>
              <div class="panel panel-default">
                                <div class="panel-heading">
              <h3 class="panel-title"><a href="<?php echo site_url('admin/users/reghod');?>" class="btn btn-success btn-sm btn-flat btn-rounded "><i class="fa fa-plus"></i> Add New Hod?</a></h3> </div>
                                <div class="panel-body">
                                    <table id="dept_data" class="table datatable">
                                        <thead>
                                            <tr> 
                                                  <th>Department ID</th>
                                                <th>Department</th>
                                                <th>Username</th>
                                                <th>HOD Full Name</th>
                                                <th>Date Added</th> 
                                            </tr>
                                          </thead>
                                          <tbody>
                                          <?php

                   foreach($viewhod as $stud){
       
              
         
                echo ' 
                <tr>    
                 <td>'.$stud['department_id'].'</td>
                <td>'.$stud['department'].'</td>
                <td>'.$stud['username'].'</td>
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
                <td>'.$stud['date'].'</td> 
                </tr>
                  ';
                          
               } 
               
             ?>
                      </tbody>
                    </table>                                    
                    
                  </div>
                </div>
                 <?php  } elseif($this->ion_auth->user()->row()->program_type ==3)  { ?>

                    <?php } else {?>

                             Menu Has Been Disabled
                <?php } ?>
            </div>
            <!-- END PROJECTS BLOCK -->
            
        </div>
                        
                        
  </div>



