      <?php defined('BASEPATH') OR exit('No direct script access allowed'); 
     ?>
     <div class="row">
                        
                        <div class="col-md-12">
                               <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                         <h3><i class="fa fa-user"></i> MESSAGE</h3>
                                          <div id="show"></div>
                                    <h2><span class="fa fa-inbox"></span> Inbox <?php //echo $count_inbox; ?> <small><?php //echo ($count_inbox<=1)?'Message':'Messages';?></small>   </h2>
                                    </div>                                    
                                     
                                </div>
                                  <p class="pull-left">
                                   <a href="<?php echo site_url('admin/users/compose');?>" class="btn btn-danger btn-block btn-sm"><span class="fa fa-edit"></span> COMPOSE</a>     </p>             
                                <p class="col-xs-offset-6 pull-right"><br/><br/><a href="#" class="btn btn-primary btn-sm btn-flat btn-rounded "><i class="fa fa-eye"></i> Inbox <span class="badge badge-success"><?php echo $count_inbox; ?></span></a> <a href="#" class="btn btn-primary btn-sm btn-flat btn-rounded "><i class="fa fa-eye"></i> Sent <span class="badge badge-warning"><?php echo $count_sent; ?> </span></a></p>

                                                   
                                <div class="panel-body">
                                   <?php //echo form_open('messages/delete'); ?>
            <?php //$this->load->view('admin/modal/confirm'); ?>
            <div class="box-body no-padding <?php if(!$record) echo 'hide';?>">
          <!--     <div class="mailbox-controls"> -->
                <!-- Check all button -->
         <!--        <div class="btn-group"> -->
                  <!-- <button type="button" data-target="#search_admin_modal" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-search"></i> Search</button> -->
              <!--     <button type="button" data-target="#delete" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i> Remove</button>
                  <button type="button" class="btn btn-default btn-sm" onclick='location.reload(true); return false;'><i class="fa fa-refresh"></i> Reload</button>
                  </div> -->
                <!-- /.pull-right -->
      <!--         </div> -->
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped" id="mydata">
                <thead>
                    <tr>
                        <th></th>
                        <th>Date / Time Received</th>
                        <th>Sender</th>
                        <th>Receipient</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th></th>
                        
                    </tr>    
                </thead>
                   <tbody id="show_data">
               
                  
                  </tbody>
                </table>
                
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <?php if(isset($nodata)): ?>
                <p class="text-center"><img src="<?php echo base_url(); ?>assets/img/message.png"></p>
                <p class="text-center text-danger" style="font-size:1.5em;">Woohoo! No messages in this section! | <a href="#" onclick='location.reload(true); return false;'>Reload</a></p>
            <?php endif; ?>
            
            
            <!-- /.box-body -->
            
        <!--       </form>  -->         
                <?php if(isset($nosearch)): ?>
                <div class="error-page">
                    <br>
                    <h2 class="headline text-yellow"> 404</h2>

                    <div class="error-content">
                      <h3><i class="fa fa-warning text-yellow"></i> Oops! Data not found.</h3>

                      <p>
                        We could not find the data you were looking for.
                        Meanwhile, you may <a href="<?php echo base_url();?>messages">refresh this page</a> or try using the <a href="#search_admin_modal" data-toggle="modal">search again</a>.
                      </p>

                      <form class="search-form" method="POST" action="<?php echo base_url(); ?>admin/users/search">
                        <div class="input-group">
                          <input type="text" name="keyword" class="form-control" placeholder="Enter keyword...">

                          <div class="input-group-btn">
                            <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                            </button>
                          </div>
                        </div>
                        <!-- /.input-group -->
                      </form>
                    </div>
                    <!-- /.error-content -->
                  </div>
            <?php endif; ?>
                
          
<?php $this->load->view('admin/modal/read'); ?>
<?php $this->load->view('admin/modal/search'); ?>
<?php $this->load->view('admin/script/message'); ?>
<?php if(isset($_GET['delete'])): ?>
    <script>
        Lobibox.notify('success', {
            msg: 'Deleted Successfully!'
        });
    </script>
<?php endif; ?>
<?php if(isset($_GET['update'])): ?>
    <script>
        Lobibox.notify('success', {
            msg: 'Updated Successfully!'
        });
    </script>
<?php endif; ?>
                         
              
                                    
                                    
                                </div>
                  
                        </div>
                        
                        
                        
                    </div>
                              
             </div>

<script type="text/javascript">
  
  </script>