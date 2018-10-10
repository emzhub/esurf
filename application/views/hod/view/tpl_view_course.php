     <?php defined('BASEPATH') OR exit('No direct script access allowed');  //$csrf =array('name'=> $this->security->get_csrf_token_name(),'hash'=>$this->security->get_csrf_hash());
     ?>

<div class="row">
                        
                        <div class="col-md-12">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3><i class="fa fa-building-o"></i> COURSE</h3>
                                        <span>view added in your department</span>
                                    </div>                                    
                                    
                                </div>
                                <?php if($this->ion_auth->user()->row()->program_type ==1){  ?> 
                                <div class="panel panel-default">
                                <div class="panel-heading">
                  <h3 class="panel-title"><a href="<?php echo site_url('hod/users/regcourse');?>" class="btn btn-success btn-sm btn-flat btn-rounded "><i class="fa fa-plus"></i> Add New Course?</a></h3> </div>
                                <div class="panel-body">
                                    <table id="course_data" class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course</th>
                                                <th>Credit Hrs</th>
                                                <th>Semester</th> 
                                                <th>Date Added</th> 
                                               
                                            </tr>
                                          </thead>
                                          <tbody>
                                          <?php
            
                foreach ($viewcourse as $child) {
                    ?>
                 <tr>
                      <td><?=  $child->course_code ?></td>
                 <td><?=  $child->course?></td>
                 <td><?=  $child->credit_hours?></td>
                  <td><?=  $child->semester?></td>
                   <td><?=$child->date?></td>
             
                  </tr>
                    <?php
                }
        
            ?> 
                                      </tbody>
                                    </table>                                    
                                    
                                </div>
                            </div>
                                   <?php  } elseif($this->ion_auth->user()->row()->program_type ==2)  {?>

                                   	         <div class="panel panel-default">
                                <div class="panel-heading">
                  <h3 class="panel-title"><a href="<?php echo site_url('hod/users/regcourse');?>" class="btn btn-success btn-sm btn-flat btn-rounded "><i class="fa fa-plus"></i> Add New Course?</a></h3> </div>
                                <div class="panel-body">
                                    <table id="course_data" class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course</th>
                                                <th>Credit Hrs</th>
                                                <th>Semester</th> 
                                                <th>Date Added</th> 
                                               
                                            </tr>
                                          </thead>
                                          <tbody>
                                          <?php
            
                foreach ($viewdepartment as $child) {
                    ?>
                 <tr>
                      <td><?=  $child->department_id ?></td>
                 <td><?=  $child->department?></td>
                 <td><?=  $child->description?></td>
                   <td><?=$child->date?></td>
                <!--    <td> <a href="#" onclick="delcosass(<?php echo $child->uid;?>)"><i class="fa fa-times text-danger fa-2x"></i> </a></td> 
                                              </td>  -->
                  </tr>
                    <?php
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
