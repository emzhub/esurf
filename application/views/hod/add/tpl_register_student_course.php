     <?php defined('BASEPATH') OR exit('No direct script access allowed');  //$csrf =array('name'=> $this->security->get_csrf_token_name(),'hash'=>$this->security->get_csrf_hash());
     ?>

<div class="row">
                        
                        <div class="col-md-12">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
          <h3><i class="fa fa-book"></i> SELECT STUDENTS TO REGISTER TO A COURSE</h3>
                                        <span>view added Students for your school</span>
                                    </div>                                    
                                    
                                </div>
                                
                                <div class="panel panel-default">
                                <div class="panel-heading">
                  <h3 class="panel-title"></h3> </div>
                                <div class="panel-body">
                                    <?php if ($this->session->flashdata('Error')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('Error') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('Success')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('Success') ?> </div>
    <?php } ?>   
                                <form name="reg_course_form" id="reg_course_form">
                                    <table id="dept_data" class="table datatable">
                                        <thead>
                                            <tr> 
                                               <th>s/No</th>
                                                <th>Username</th>
                                                <th>Student's Full Name</th>
                                                <th>Selection</th> 
                                            </tr>
                                          </thead>
                                          <tbody>
                                          <?php
// $studs=$database->query('SELECT * FROM '.DB_PREFIX.'students WHERE school_id='.$user->data()->school_id.' && program_type='.$user->data()->program_type.' ORDER BY id DESC');
// 			               if($studs->count()){
// 						       foreach($studs->results() as $stud){
			 
// 			          $profileinfo=$utils->get_user_profile_id($stud->user_id);
			   
							

                   foreach($viewstudent as $stud){
         
                echo ' 
                <tr>
                  <td>'.$stud->id.'</td>
                <td>'.$stud->username.'</td>
                <td>';
                 if (isset($stud->children)) {
                foreach ($stud->children as $child) {
                if(!empty($child->first_name) && !empty($child->middle_name) && !empty($child->last_name)){
                  echo $child->last_name.' '.$child->first_name.' '.$child->middle_name;
                }
                                                                elseif
                                                                (!empty($child->first_name)&& !empty($child->last_name)){
                  echo $child->last_name.' '.$child->first_name;
                }
                                                                else{
              echo '<i class="fa fa-ban text-danger"></i> Student\'s name is empty';  
                }
              }
            }
                 echo'</td>
               <td><input type="checkbox" name="student_id[]" id="student_id[]" value="'.$stud->user_id.'"/></td>
                </tr>
                  ';
                          
               } 

							 
						  
						 ?>
                         
                      </tbody>
                      
                    </table> 
                    <table class="table">
                      <tr>
                         
                 <td colspan="8"  class="pull-right">
                 
                 <a href="#" onclick="javascript:selectAll();">mark all </a>| <a href="#" onclick="javascript:DeselectAll();">unmark all</a> <br/>
                 With Selected: <br/><select onchange="document.getElementById('s_course').style.display='block';" name="s_option" id="s_option">
                              <option value="" selected="selected">Select an Option</option>
                              <option value="1">Register</option>
                              <option value="2">De-Register</option>
                               </select><br/><br/>
                    <span id="s_course" style="display:none;">
                    <select name="s_course" id="s_course">
                              <option value="" selected="selected">Select a Course</option>
                               <?php
									
							 foreach($cos as $cs){
                  if(!empty($cs->course_id) ){
						      echo '<option value="'.$cs->course_id.'"> [ '.$cs->course_code.' ] &raquo; '.$cs->course.'</option>';
								 }
							    else{
          echo '<option value="">No Course added yet for your department </option>';                              
             }
           }
								   ?>
                               </select><br/>
                               <br/>
                                <div class="form-group">
                                      <input type="hidden" name="program_type" value="<?php echo $this->ion_auth->user()->row()->program_type;  ?>">
                                      </div>
                       <button type="button" name="btn_register_course" class="btn btn-danger btn-sm btn-rounded" onclick="addStudentCourse()"><span id="btn_reg_txt"> Go </span></button>
                     </span>
                    </td>
                         </tr>
                         </table>   
                   <?php echo form_close();?>                              
                    
                  </div>
                </div>
            
            </div>
            <!-- END PROJECTS BLOCK -->
            
        </div>
                        
                        
  </div>
  
  <script>
  
  // check all and uncheck all
  function selectAll(){
	 var ff=document.forms.reg_course_form;
       i=0;
       while(ff.length>i){
	    ff.elements[i].checked=1;
		i++;
	    }
	  return false;
    }
   
   function DeselectAll(){
      var ff=document.forms.reg_course_form;
      i=0;
      while(ff.length>i){
	    ff.elements[i].checked=0;
	    i++;
	    }
	  return false;
     }
	 
	 
	 function addStudentCourse(){
  var query = $('#reg_course_form').serialize();
    $('#btn_reg_txt').html('<i class="fa fa-spin"></i> Processing...');
        var url = '<?php echo site_url('hod/users/regstudentcourse')?>';
        $.post(url, query, function (response) {
			  //alert(response);
		   $('#btn_reg_txt').html('Done.. <i class="fa fa-check"></i>');
          noty({   text: 'Event was processed successfully..',
		         layout: 'topRight', 
			       type: 'success'
			  });
			 $('#btn_reg_txt').html('Go');
	 // setTimeout('portBack()', 7000);// port bck
            });
	   

    } 

     function portBack(){
  location.href='<?php echo site_url('hod/users/regstudentcourse')?>';// port bck
 }
  </script>
