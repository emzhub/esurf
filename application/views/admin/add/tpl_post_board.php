      <?php defined('BASEPATH') OR exit('No direct script access allowed'); 
     ?>


<div class="row">
          
   <div class="col-md-12">
     <h2><span class="fa fa-arrow-circle-o-left"></span> Post Board</h2>
         <div class="col-md-4 well">
            <div class="page-title">                    
                           
                            <span >&nbsp;&nbsp;  4=>> <strong class="label label-success"><?php
                            echo  $this->Message_model->get_school_name($this->ion_auth->user()->row()->school_id); 
                 ?></strong></span>
                        </div> 
                          <div class="form-group">
                            <h4>Create a new Announcement</h4>
                            <?php if ($this->session->flashdata('showErro')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('showErro') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('showSucces')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('showSucces') ?> </div>
    <?php } ?> 
                          <?php echo form_open('',array('class'=>'form-horizontal'));?>
                      
                                      <input type="hidden" name="program_type" id="program_type" value="<?php echo $this->ion_auth->user()->row()->program_type;  ?>">
                                                           
  <div class="form-group">
                         <!--     <label class="col-md-3 control-label">Message Priority</label>   -->
                                        <div class="col-md-9">
                    
                   <select  name="title" id="title" class="form-control">
                                         <option value="" selected>Select Priority</option>
                                         <option value="1">Primary</option>
                                         <option value="2">Succes</option>
                                         <option value="3">Warning</option>
                                        <option value="4">Danger</option>
                                         <option value="5">Info</option>
                                         </select>
                            <span class="help-block"></span>
                                        </div>
                                    </div>

  <?php
                              echo form_error('title');
                             ?>                         <br/>
  <textarea class="form-control push-down-10" name="new_post" id="new_post" rows="4" placeholder="Your post text here..."></textarea>   
     <?php
                              echo form_error('new_post');
                             ?> 
   <br/>
  Share Post: &nbsp;<input type="checkbox" name="mode" id="mode" class="icheckbox"/>        
  <br/>     <br/>             
   <?php echo form_submit('submit', '  Create New Post ', 'class="btn btn-primary btn-rounded  btn-sm"');?>              
                          <!--   <button class="btn btn-primary btn-rounded " id="add_new_post" type="button" ><span class="fa fa-pencil"></span>Create New Post</button> -->
                                 <?php echo form_close();?>
                        </div>  
         </div>

 <div class="row push-up-10">
                            <div class="col-md-8">
                                
                                <h3>Trending Now?</h3> 
                                <div class="tasks ui" id="board_posts"></div>                            

                            </div>
                            
                            
                        </div>   


                            
      </div>
                        
 </div>
 
 <script>

    setInterval(function(){
	  $('#board_posts').load('<?php echo site_url('admin/users/post_board')?>')

    }, 2500);
       

 </script>
