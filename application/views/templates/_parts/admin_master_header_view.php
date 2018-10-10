<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="platform for educational 
interactions Building a vast learning environment using an online application to 
merge and connect diverse institutes to enhance 
the student’s academic performance both within and outside their institution.">
        <link rel="icon" href="<?php echo site_url('assets/favicon.ico');?>" type="image/x-icon" />
        
    <meta name="Author" content="Esurf Tech">
<title><?php echo $page_title;?></title>
<link href="<?php echo site_url('assets/theme-default.css');?>" rel="stylesheet">
<?php echo $before_head;?>
</head>
<body>
<?php
if($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
?>
  <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">



                <!-- START X-NAVIGATION -->
               <ul class="x-navigation">
                    <li class="xn-log">
                        <a href="<?php echo site_url('admin');?>"><?php echo APP_NAME;?> ||  <?php 
     
if( !empty($sch))
{

      foreach ($sch as $chi) { ?>
                                       
        <?= $chi->school_abrv ?>            
                              <?php   } 
}
else{
    ?>    <p> Sorry You Not Assign To Any School </p>
    <?php
}
            ?>
           </a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                       <?php 
     
if( !empty($avatar))
{

      foreach ($avatar as $child) { ?>
                                       
            <img src="<?= base_url('files/avatar/'.$child->user_id.'/'. $child->user_id.'.png')   ?>" alt="<?php echo $this->ion_auth->user()->row()->username;?>"/>
            
                              <?php   } 
}
else{
    ?>
      <img src="<?= base_url('files/avatar/default_ava.gif')   ?>" alt="<?php echo $this->ion_auth->user()->row()->username;?>"/>
    <?php
}
            ?>

                        </a>
                        <div class="profile">
                            <div class="profile-image">
          <?php 
     
   // print_r($ur); 
//var_dump($users);
          if( !empty($avatar))
{
      foreach ($avatar as $child) { ?>
                                       
            <img src="<?= base_url('files/avatar/'.$child->user_id.'/'. $child->user_id.'.png')   ?>" alt="<?php echo $this->ion_auth->user()->row()->username;?>"/>
            
                              <?php  } } 
                              else{
    ?>
      <img src="<?= base_url('files/avatar/default_ava.gif')   ?>" alt="<?php echo $this->ion_auth->user()->row()->username;?>"/>
    <?php
}
//                               foreach ($users as $value) {
//     echo $value->first_name. " " . $value->last_name. " " . $value->uid;
// }  
            ?>
                            </div>
                            <div class="profile-data"> 
                                <div class="profile-data-name"><?php echo $this->ion_auth->user()->row()->username;?></div>
                                <div class="profile-data-title"> <?php echo $this->ion_auth->get_users_groups()->row()->description ;?> Access</div>
                            </div>

                            <div class="profile-controls">
                                <a href="#" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="#" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div>

                        </div>                                                                        
                    </li>
                    <li class="active">
                        <a href="<?php echo site_url('admin');?>"><span class="fa fa-desktop"></span> <span class="xn-text">Home</span></a>                        
                    </li>                    
                       <?php echo $current_user_menu;?>            
                    
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                




                <!-- START X-NAVIGATION VERTICAL -->
               <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
<!--
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>   
-->
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES -->

                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-comments"></span></a>
                        <div class="informer informer-danger"> <div id="show"></div></div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                              <!--   <div class="pull-right">
                                    <span class="label label-danger"><div id="show"></div> new</span>
                                </div> -->
                            </div>
                            <div  class="panel-body list-group list-group-contacts scroll  <?php if(!$recordb) echo 'hide';?>" style="height: 200px;">
                       <!--     <div id="meg"></div> -->
                                <?php if(is_array($recordb)): ?>
                <?php foreach($recordb as $row): ?>
                       <a href="#" class="list-group-item">
                        <?php if( $this->Message_model->get_online_status($row->user_from) == 1){?>
                                    <div class="list-group-status status-online"></div>
                                    <?php } else{ ?>
                                         <div class="list-group-status status-offline"></div>
                                            <?php }  ?>
                                           <?php 
          if( !empty($avatar))
{
      foreach ($avatar as $child) { ?>
                                       
            <img src="<?= base_url('files/avatar/'.$child->user_id.'/'. $child->user_id.'.png')   ?>" class="pull-left" alt="<?php echo $this->ion_auth->user()->row()->username;?>"/>
            
                              <?php  } } 
                              else{
    ?>
      <img src="<?= base_url('files/avatar/default_ava.gif')   ?>" class="pull-left" alt="<?php echo $this->ion_auth->user()->row()->username;?>"/>
    <?php
}
            ?>
                                    <span class="contacts-title">
                                           <a href="<?php echo site_url('admin/users/readmessage').'/'.$row->user_from;?>">
                                     
                              <?php  $status = $this->Message_model->get_status($row->user_from);?>
                            <?php if($status=='read') echo '</strong><del>'; ?>
                            <?php echo $this->Message_model->get_username($row->user_from); //echo $this->ion_auth->user()->row()->username;?>
                            <?php if($status=='read') echo '</del>'; ?>
                            
                         </a></span>
                                    <p><?php echo $this->Message_model->string_limit_words($this->Message_model->get_content($row->user_from),10); ?></p>
                           </a>
                <?php endforeach; ?>
                  <?php endif; ?>  
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="<?php echo site_url('admin/users/message')?>">Show all messages</a>
                            </div>                            
                        </div>                        
                    </li>

                    <!-- END MESSAGES -->
                    <!-- TASKS -->
<!--
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-tasks"></span></a>
                        <div class="informer informer-warning">3</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>                                
                                <div class="pull-right">
                                    <span class="label label-warning">3 active</span>
                                </div>
                            </div>
                            <div class="panel-body list-group scroll" style="height: 200px;">                                
                                <a class="list-group-item" href="#">
                                    <strong>Phasellus augue arcu, elementum</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Aenean ac cursus</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                                    </div>
                                    <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Lorem ipsum dolor</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Cras suscipit ac quam at tincidunt.</strong>
                                    <div class="progress progress-small">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 21 Sep 2014 /</small><small class="text-success"> Done</small>
                                </a>                                
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-tasks.html">Show all tasks</a>
                            </div>                            
                        </div>                        
                    </li>
-->
                    <!-- END TASKS -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo site_url('admin');?>">Home</a></li>                    
                    <li class="active">Dashboard</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">



<?php
if($this->session->flashdata('message'))
{
?>
  <div class="container" style="padding-top:40px;">
    <div class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
aria-hidden="true">&times;</span></button>
      <?php echo $this->session->flashdata('message');?>
    </div>
  </div>
<?php
}}?>
