     <?php defined('BASEPATH') OR exit('No direct script access allowed');  //$csrf =array('name'=> $this->security->get_csrf_token_name(),'hash'=>$this->security->get_csrf_hash());
     ?>

<div class="row">
                        
                        <div class="col-md-12">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                             <h3><i class="fa fa-building-o"></i> ASSIGNED COURSE(S)</h3>
                                        <span>courses you have assigned to lecturers.</span>
                                    </div>                                    
                                    
                                </div>
                                
                                <div class="panel panel-default">
                                <div class="panel-heading">
                  <h3 class="panel-title"><a href="<?php echo site_url('hod/users/asigncourse');?>" class="btn btn-success btn-sm btn-flat btn-rounded"><i class="fa fa-plus"></i> Assign a Course?</a></h3> </div>
                                <div class="panel-body">
                                    <table id="course_data" class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course</th>
                                                <th>Credit Hrs</th>
                                                <th>Semester</th> 
                                                <th>Lecturer</th>
                                                <th>Date Added</th> 
                                                <th>Option</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          <?php
						   foreach($viewassigncourse as $cs){
											  echo ' 
											    <tr>
                            <td>'.$this->Message_model->find_course_code($cs->course_id).'</td>
                            <td>'.$this->Message_model->find_course($cs->course_id).'</td>
                            <td>'.$this->Message_model->find_credit_hours($cs->course_id).'</td>
						    <td>'.$this->Message_model->find_semester($cs->course_id).'</td>
							<td>'.$this->Message_model->find_get_username($cs->lecturer_id).'</td>
                                                <td>'.$cs->date.'</td> 
						      <td>
						
							  <a href="#" onclick="delcosass('.$cs->id.')"><i class="fa fa-times text-danger fa-2x"></i> </a></td> 
                                
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
                    
<script>
 function delcosass(id){
        var url = '<?php echo site_url('hod/users/assigndelete');?>';
		var data='id='+id;
        $.post(url, data, function (response) {
			//alert(response);
		
          noty({   text: 'Assigned course(s) removed successfully',
		         layout: 'topRight', 
			       type: 'success'
			  });
			  
            });
	   

    } 
	
	function submitform(id,lid){
	    var topic = document.getElementById('topic_'+id).value;
		var topic_info = document.getElementById('topic_info_'+id).value;
		
		if(topic!="" || topic_info!=""){
        var url = 'template/action/tpl_course_topic_save.php';
	    var data ='topic='+topic+'&topic_info='+topic_info+'&course_id='+id+'&lecturer_id='+lid;
		 // alert(''+data);
		   $('#add_t_'+id).html('Saving...');
          $.post(url, data, function (response) {
			//alert(response);
		    noty({   text: 'New topic was added successfully',
		         layout: 'topRight', 
			       type: 'success'
			     });
			  });
			   $('#add_t_'+id).html('Saved');
			   $('#add_t_'+id).hide();
			   $('#createTopic_'+id).hide();
			   setTimeout('reloadPage()',2000);
			   
	        }
 }
 
 function reloadPage(){
	 location.href='?target=18';
 }
     
 </script>
