     <?php defined('BASEPATH') OR exit('No direct script access allowed');  //$csrf =array('name'=> $this->security->get_csrf_token_name(),'hash'=>$this->security->get_csrf_hash());
     ?>
<div class="row">
          
   <div class="col-md-12">
                            
        <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
<h3>Course Assignment &raquo; <?=$this->Message_model->get_school_name($this->ion_auth->user()->row()->school_id) ;?></h3>
      <span> You can now assign courses to Lecturers in your department via theis portal</span>
                                    </div>                                    
                                 </div>
                                    <div class="col-md-12">
                        <div id="lecturer_det" style="background:lightblue; "></div>
                   </div>
                         <div class="panel-body panel-body-table">
                         
                           <form id="assignCourse">     
                             <div class="col-md-12"><br/>
                             <a href="<?php echo site_url('hod/users/viewassigncourse');?>" class="btn btn-warning btn-sm btn-flat btn-rounded pull-right"><i class="fa fa-eye"></i> View Assigned Course(s)?</a><br/><br/>
                               <div class="table-responsive col-md-5">
                               <div class="form-group">
                                <br/><br/>
                                <h5><i class="fa fa-user"></i> Select Lecturer</h5>
                                <small>(select the lecturer(s) to assign courses to. *Note. You can select more than one lecturer and assign more than one course at once)</small>
     <select name="lecturer[]" id="lecturer[]" multiple="multiple" class="form-control">
                                    <?php
						    foreach($lecturers as $lecturer){
  if(!empty($lecturer->username) ){
                    echo '<option value="'.$lecturer->user_id.'">'.$lecturer->username.'</option>';
                }
           else{
          echo '<option value="">No Lecturer added yet for your department </option>';                              
             }
		
							}
		  	
						   ?>
                               </select>
                                <br/><br/>
                               </div>
                            </div>
                                    
                            <div class="table-responsive col-md-5">
                                <div class="form-group">
                                <br/><br/>
                            <h5><i class="fa fa-book"></i> Select Course(s)</h5>
                               <small>(select the course(s) to assign to selected lecture(s). *Note. You can select more than one course and assign to more than one lecturer at once)</small>
     <select name="course[]" id="course[]" multiple="multiple" class="form-control"  onchange="checkLecturer()">
                                    <?php
                                      foreach($coursed as $course){
  if(!empty($course->course_id) ){
                  echo '<option value="'.$course->course_id.'">'.$course->course.'</option>';
                }
           else{
        echo '<option value="">No Courses added yet for your department </option>';                                
             }
    
              }
						   ?>
                               </select>
                                  <br/><br/>
                                 </div>
                                 <div class="form-group">
                                      <input type="hidden" name="program_type" value="<?php echo $this->ion_auth->user()->row()->program_type;   ?>">
                                      </div>
                                    </div>
                                    
                          <div class="table-responsive col-md-2">
                                <div class="form-group">
                               <br/><br/> <br/><br/> <br/><br/><br/><br/>
                            <button class="btn btn-app btn-rounded btn-info" type="button" onclick="assignCourse()"> <i class="fa">&raquo;&raquo;</i> <span id="a_txt">Assign</span></button>
                                
                                
                                  <br/>
                                 </div>
                                    </div>
                                    
                                 </div>
                                    
                             
                                    
                                 </form>   
                                </div>
                                
                             
                
                             
                             
                 </div>
          </div>
  </div>
     <script type="text/javascript" src="<?php echo base_url().'assets/bootstrap/js/jquery-3.2.1.js'?>"></script>
 <script type="text/javascript" src="<?php echo site_url('assets/public/js/plugins/jquery/jquery.min.js');?>"></script>
 <script>

 function checkLecturer(){
  var query = $('#assignCourse').serialize(); 
            var url = '<?php echo site_url('hod/users/check')?>';
        $.post(url, query, function (data) {
              if (data.status == 'ok')
                {
                     var curcont = $("div#lecturer_det").show();
                    $("#lecturer_det").html(curcont + data.content);
        // $('#lecturer_det').show();
        // $('#lecturer_det').html(response);
      }}, "json");
     

    } 

     





 
   function assignCourse(){
  var query = $('#assignCourse').serialize();
    $('#a_txt').html('<i class="fa fa-spin"></i> Processing...');
        var url = '<?php echo site_url('hod/users/Assigned')?>';
        $.post(url, query, function (response) {
			//alert(response);
		   $('#a_txt').html('Done.. <i class="fa fa-check"></i>');
          noty({   text: 'Course(s) assigned Successfully to Lecturer(s)',
		         layout: 'topRight', 
			       type: 'success'
			  });
			 $('#a_txt').html('Assign');
			 
			 setTimeout('portBack()', 2000);
            });
	   

    } 

 function portBack(){
	location.href='<?php echo site_url('hod/users/asigncourse')?>';// port bck
 }
     
 </script>
