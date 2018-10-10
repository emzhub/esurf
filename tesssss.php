  <?php
            // counter for ul.tabs
            $i=0;
            $bulletin_types = get_object_taxonomies( 'bulletinboard' );
            foreach( $bulletin_types as $bulletin_type ) :
                    $terms = get_terms( $bulletin_type );
        foreach( $terms as $term ) :
        // increment each one
        $i++; ?>

        <li class="tabs-title
            <?php // only for the first one, add .is-active
            if($i == 1) { echo ' is-active'; } ?>
        "><a data-tabs-target="panel-<?php echo $term->slug ;?>" href="#panel-<?php echo $term->slug ;?>"><?php echo $term->name ;?></a></li>
        <?php endforeach;?>
    </ul>
    <div class="tabs-content" data-tabs-content="example-tabs">
        <?php foreach( $terms as $term ) : ?>
        <?php $bulletins = new WP_Query( array(
            'taxonomy' => $bulletin_type,
            'term' => $term->slug,
        ));?>
        <?php if( $bulletins->have_posts() ):
        // move the while up
        while( $bulletins->have_posts() ) : $bulletins->the_post();
        // reset the counter
        $i=0; ?>
        <div class="tabs-panel<?php // again add .is-active only for first
if($i==0) { echo ' is-active'; } ?>" id="panel-<?php echo $term->slug ;?>">
            <ul class="accordion" data-accordion data-allow-all-closed="true">
                <li class="accordion-item" data-accordion-item>
                    <a href="#" class="accordion-title"><?php the_title();?></a>
                    <div class="accordion-content" data-tab-content >
                        //POST CONTENT HERE
                    </div>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>
        <?php endif;?>
        <?php endforeach;?>
    </div>
    <?php endforeach; ?>








     <style type="text/css">
 .msg-container {
                        width: 100%;
                        height: 100%;
                    }

                    .msg-area {
                        height: calc(100% - 102px);
                        width: 100%;
                        background-color:#FFF;
                        overflow-y: scroll;
                    }
                    .msginput {
                        padding: 5px;
                        margin: 10px;
                        font-size: 14px;
                        width: calc(100% - 20px);
                        outline: none;
                    }
                    .bottom {
                        width: 100%;
                        height: 50px;
                        position: fixed;
                        bottom: 0px;
                        border-top: 1px solid #CCC;
                        background-color: #EBEBEB;
                    }

                    h1 {
                        padding: 0px;
                        margin: 20px 0px 0px 0px;
                        text-align: center;
                        font-weight: normal;
                    }
                    button {
                        background-color: #43ACEC;
                        border: none;
                        color: #FFF;
                        font-size: 16px;
                        margin: 0px auto;
                        width: 150px;
                    }
                    .buttonp {
                        width: 150px;
                        margin: 0px auto;
                    }

                    .msg {
                        margin: 10px 10px;
                        background-color: #fff;
                        max-width: calc(45% - 20px);
                        color: #000;
                        padding: 10px;
                        font-size: 14px;
                    }
                    .msgfrom {
                        background-color: #000;
                        color: #FFF;
                        margin: 10px 10px 10px 55%;
                    }
                    .msgarr {
                        width: 0;
                        height: 0;
                        border-left: 8px solid transparent;
                        border-right: 8px solid transparent;
                        border-bottom: 8px solid #fff;
                        transform: rotate(315deg);
                        margin: -12px 0px 0px 45px;
                    }
                    .msgarrfrom {
                        border-bottom: 8px solid #000;
                        float: right;
                        margin-right: 45px;

                    }
                    .msgsentby {
                        color: #8C8C8C;
                        font-size: 12px;
                        margin: 4px 0px 0px 10px;
                    }
                    .msgsentbyfrom {
                        float: right;
                        margin-right: 12px;
                    }

</style>
     <div class="row">
                        
                        <div class="col-md-12">
                               <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                               <h2><span class="fa fa-comments"></span> Messages</h2>
                                                   <div class="btn-group">
         <button class="btn btn-default btn-sm" onClick="history.back();"><span class="glyphicon glyphicon-envelope"></span> Previous page</button>
                  <button type="button" class="btn btn-default btn-sm" onclick='location.reload(true); return false;'><i class="fa fa-refresh"></i> Reload</button>
                  </div>
                                  <!--   <h2><span class="fa fa-inbox"></span> Inbox <?php echo $count_inbox; ?> <small><?php echo ($count_inbox<=1)?'Message':'Messages';?></small>   </h2> -->
                                          <?php if ($this->session->flashdata('2flashError')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('2flashError') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('2flashSuccess')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('2flashSuccess') ?> </div>
    <?php } ?> 

                                    </div>                                    
                                     
                                </div>

                                       <div class="panel-body">
                                       <div class="timeline-body comments">
                     <div id="imbox" style="height:400px;overflow:auto">
                    <div id="chat_box" style="height:400px;">

            <?php foreach($record as $row): ?>
     <div class="comment-item">
          <?php 
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
            ?>
         <p class="comment-head">
         <a href="#"> <?php echo $this->Message_model->get_username($row->user_from);?></a> <span class="text-muted">@<?php echo $this->Message_model->get_username($row->user_from);?></span>
         </p>
        <p><?php echo $this->Message_model->string_words($row->content); //html_decode($com->comment);?></p>
        <small class="text-muted"><?php echo $this->Message_model->time_diff($row->date); ?></small>
         </div>  
              <?php endforeach; ?>
            </div>
          </div>
     <?php //} ?>     
          <div class="panel panel-default push-up-10">
                            <div class="panel-body panel-body-search">
                               <p id="errmessage" class="alert-danger"></p>
                                     <!--  <from class="form-horizontal" id="reply">  --> 
                                       <?php echo form_open('',array('id'=>'reply','class'=>'btnsave form-horizontal'));?>
                                          <div class="form-group">
                                        <input type="hidden" class="send_to" id="send_to" value="<?php echo $row->user_from;?>" name="send_to">
                                        </div>
                                            <div class="form-group">
                                        <input type="hidden" class="send_from" id="send_from" value="<?php echo $row->user_to;?>" name="send_from">
                                        </div>
                                           <div class="form-group">
                                        <input type="hidden" class="send_from" id="message_id" value="<?php echo $row->message_id;?>"  name="message_id">
                                        </div>
                                        <!--  <div class="form-group">
                                        <input type="hidden" name='<?php //echo json_encode($this->security->get_csrf_token_name()); ?>' value=<?php //echo json_encode($this->security->get_csrf_hash()); ?>>
                                        </div> -->
                                <div class="input-group">
                                     <input type="text" class="form-control" name="message" id="message"   placeholder="Your message..."/>
                                    <div class="input-group-btn">
                                            <button type="submit"  id="btnsave" class="btn btn-primary">Save</button>
                                    </div>
                                   
                                </div>
                        <!--       </from> -->
                                  <?php echo form_close();?>
                            </div>
                        </div>                                         
    </div>
<?php //}else{
    // echo '<p class="comment-head">No comment for this topic, Be the first to comment</p>'; 
    // }
    ?>
                     


                                       </div>
                                </div>
                            </div>
                        </div>



 








var token = data.csrf;

$.ajax({
    url: '/next/ajax/request/url',
    type: 'POST',
    data: { new_data: 'new data to send via post', csrf_token:token },
    cache: false,
    success: function(data, textStatus, jqXHR) {
        // Get new csrf token for next ajax post
        var new_csrf_token = data.csrf     
       //Do something with data returned from post request
    },
    error: function(jqXHR, textStatus, errorThrown) {
      // Handle errors here
      console.log('ERRORS: ' + textStatus + ' - ' + errorThrown );
    }
});





                                      <div class="timeline-body comments">
                     <div id="imbox" style="height:400px;overflow:auto">
                    <div id="chat_box" style="height:400px;">

            <?php foreach($record as $row): ?>
     <div class="comment-item">
          <?php 
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
            ?>
         <p class="comment-head">
         <a href="#"> <?php echo $this->Message_model->get_username($row->user_from);?></a> <span class="text-muted">@<?php echo $this->Message_model->get_username($row->user_from);?></span>
         </p>
        <p><?php echo $this->Message_model->string_words($row->content); //html_decode($com->comment);?></p>
        <small class="text-muted"><?php echo $this->Message_model->time_diff($row->date); ?></small>
         </div>  
              <?php endforeach; ?>
            </div>
          </div>
     <?php //} ?>     
          <div class="panel panel-default push-up-10">
                            <div class="panel-body panel-body-search">
                                         <?php echo form_open('',array('id'=>'reply','class'=>'form-horizontal'));?>
                                          <div class="form-group">
                                        <input type="hidden" class="send_to" value="<?php echo $row->user_from;?>" name="send_to">
                                        </div>
                                            <div class="form-group">
                                        <input type="hidden" class="send_from" value="<?php echo $row->user_to;?>" name="send_from">
                                        </div>
                                           <div class="form-group">
                                        <input type="hidden" class="send_from" value="<?php echo $row->message_id;?>"  name="message_id">
                                        </div>
                                <div class="input-group">
                                     <input type="text" class="form-control" name="message" id="message"   placeholder="Your message..."/>
                                    <div class="input-group-btn">
                                        <button id="btnSave" onclick="save()" class="btn btn-default">Send</button>
                                    </div>
                                </div>
                                  <?php echo form_close();?>
                            </div>
                        </div>                                         
    </div>

 <?php












   string(70) "SELECT `DISTINCT` `from_id`
FROM `es_messag`
WHERE `to_id` = '1399031'"
$msgs = $database->query('SELECT DISTINCT(from_id) FROM '.DB_PREFIX.'message WHERE to_id='.$user->data()->user_id.''); 
                   if($msgs->count()){
          foreach($msgs->results() as $msg){
          $msguser = new User($utils->get_user_id($msg->from_id)->id);
            
     $mm= $database->query('SELECT * FROM '.DB_PREFIX.'message WHERE to_id='.$user->data()->user_id.' AND from_id='.$msguser->data()->user_id.'  ORDER BY id DESC');
                      $minfo = $mm->first();
                   ?>
                        












<?php $page=""; include 'abspath.php'; require ABSPATH.'core/init.php'; 


 $course_id = $_GET['course_id'];
 $comments  = $database->query('SELECT * FROM '.DB_PREFIX.'group_comment WHERE  group_id='.$course_id.' ORDER BY id ASC');
  
  if($comments->count()){
 
 ?>
<div class="timeline-body comments">
  <?php
    foreach($comments->results() as $com){
    $utils = new Utils($com->user_id);
    $user = new User($com->user_id);
    ?>
     <div class="comment-item">
       <img src="<?=$utils->get_user_avatar();?>"/>
         <p class="comment-head">
         <a href="#"><?=$user->data()->username;?></a> <span class="text-muted">@<?=$user->data()->username;?></span>
         </p>
        <p><?=html_decode($com->comment);?></p>
        <small class="text-muted"><?=$timestamp->time_since($com->time);?></small>
         </div>  
     <?php } ?>                                              
    </div>
<?php }else{
   echo '<p class="comment-head">No comment for this topic, Be the first to comment</p>'; 
   }?>
<!--        <script type="text/javascript" src="<?=APP_URL;?>js/plugins/summernote/summernote.js"></script>-->



  <!-- Info boxes -->
        <!--   <div class="row">
        <div class="col-xs-6">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-envelope"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Inbox</span>
                  <span class="info-box-number"><?php echo $count_inbox; ?> <small><?php echo ($count_inbox<=1)?'Message':'Messages';?></small></span>
                </div><!-- /.info-box-content -->
             <!--  </div> --><!-- /.info-box -->
            <!-- </div> --><!-- /.col -->

           <!--  <div class="col-xs-6">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Sent Items</span>
                  <span class="info-box-number"><?php echo $count_sent; ?> <small><?php echo ($count_sent<=1)?'Message':'Messages';?></small></span> -->
              <!--   </div> --><!-- /.info-box-content -->
            <!--  --><!-- /.info-box -->
          <!--   </div> --><!-- /.col -->
   <!--       </div> -->
    
  <!--     <div class="row">
        <div class="col-lg-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Messages Chart</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="bar" style="height: 300px; position: relative;"></div>
                </div> -->
                <!-- /.box-body -->
      <!--       </div> -->
            <!-- /.box -->            
        <!-- </div>
 -->        <!-- /.col -->
          
        <!--   <div class="col-lg-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Messages Report</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="line" style="height: 300px; position: relative;"></div>
                </div> -->
                <!-- /.box-body -->
           <!--  </div> -->
            <!-- /.box -->            
   <!--      </div> -->
        <!-- /.col -->
      <!-- </div> -->
      <!-- /.row -->
        
    <!-- </section> -->
    <!-- /.content -->
<!-- </div> -->
<!-- /.content-wrapper --> 

<!-- <?php // $this->load->view('admin/modal/compose'); ?>
    <script src="<?php //echo base_url('assets/public/jquery/jquery-3.1.0.min.js')?>"></script>
<link rel="stylesheet" href="<?php //echo base_url();?>assets/public/plugins/morris/morris.css">
<script src="<?php //echo base_url();?>assets/public/plugins/morris/raphael-min.js"></script>
<script src="<?php //echo base_url();?>assets/public/plugins/morris/morris.js"></script> 
 -->

<!-- <script type="text/javascript">
$(function(){
    var data = null;
    <?php echo "var url='".base_url()."';";?>
    $.ajax({    
        url: url+'admin/users/barGraph', 
        type: 'POST',
        success: function(dataJim) {  
           
            data = jQuery.parseJSON(dataJim);
            Morris.Bar({
              element: 'bar',
              data: data,
              xkey: 'section',
              ykeys: ['messages'],
              labels: ['Messages'],
              resize: true,
              xLabelAngle: 60
            });
        }
     }); 

    
    $.ajax({    
        url: url+'admin/users/lineGraph', 
        type: 'POST',
        success: function(dataJim) {                                                
            data = jQuery.parseJSON(dataJim);
            Morris.Line({
              element: 'line',
              data: data,
              xkey: 'period',
              ykeys: ['inbox', 'sent'],
              labels: ['Inbox', 'Sent Items'],
              resize: true
            });  
        }
     }); 
    
});
</script>
 -->














<?if($this->session->flashdata('flashSuccess')):?>
<p class='flashMsg flashSuccess'> <?=$this->session->flashdata('flashSuccess')?> </p>
<?endif?>
 
<?if($this->session->flashdata('flashError')):?>
<p class='flashMsg flashError'> <?=$this->session->flashdata('flashError')?> </p>
<?endif?>
 
<?if($this->session->flashdata('flashInfo')):?>
<p class='flashMsg flashInfo'> <?=$this->session->flashdata('flashInfo')?> </p>
<?endif?>
 
<?if($this->session->flashdata('flashWarning')):?>
<p class='flashMsg flashWarning'> <?=$this->session->flashdata('flashWarning')?> </p>
<?endif?>


<!-- <div id="mainBody">
    <div class="container">
    <div class="row">
            <div class="span3"></div>     
            <div class="span9"> 
                <div class="well">
                       <?php echo form_open();?>
                    <h1>Sign Up</h1>
                        <h4>Your personal information</h4>
        
    

        
        <div class="control-group">
              <?php
                echo form_label('First name','first_name');
                echo form_error('first_name');
                echo form_input('first_name',set_value('first_name'),'class="form-control"');
                ?>
        </div>
        <div class="control-group">
               <?php
                echo form_label('Last name','last_name');
                echo form_error('last_name');
                echo form_input('last_name',set_value('last_name'),'class="form-control"');
                ?>
        </div>

               <div class="form-group">
                <?php
                echo form_label('Username','username');
                echo form_error('username');
                echo form_input('username',set_value('username'),'class="form-control"');
                ?>
            </div>
        <div class="control-group">
         <?php
                echo form_label('Email','email');
                echo form_error('email');
                echo form_input('email',set_value('email'),'class="form-control"');
                ?>
      </div>
<div class="control-group">
  <?php
                echo form_label('Password','password');
                echo form_error('password');
                echo form_password('password','','class="form-control"');
                ?>
</div>
    <div class="control-group">
         
         <?php
                echo form_label('Confirm password','password_confirm');
                echo form_error('password_confirm');
                echo form_password('password_confirm','','class="form-control"');
                ?>
      </div>


             <?php echo form_submit('submit', 'Create user', 'class="btn btn-success  btn-lg"');?>
            <?php echo anchor('/public/user/login', 'Cancel','class="btn btn-default btn-lg "');?>
            <?php echo form_close();?>
        </div>
    </div>
    </div>
        </div>
    </div>
 -->





                               <?php
$user_img = !empty($this->session->userdata('user_id')) ? $this->session->userdata('user_id') : 'no-avatar.jpg';
?>
<img height="180px" width="180px" class="ppborder" src="<?= base_url('files/avatar/'.$this->session->userdata('user_id').'/'.$this->session->userdata('user_id').'.png')   ?>"> 
<?php
//if($this->ion_auth->logged_in() && $this->ion_auth->in_group('super')) {
?>

                            <?php
$user_img = !empty($this->session->userdata('user_id')) ? $this->session->userdata('user_id') : 'no-avatar.jpg';
?>
<img height="180px" width="180px" class="ppborder" src="<?php echo base_url().'/uploads/'.$user_img; ?>"> 
<?php
//if($this->ion_auth->logged_in() && $this->ion_auth->in_group('super')) {
?>
<!-- <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url('super');?>"> 
<?php echo $this->config->item('cms_title');?></a>
    </div>
   <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><?php echo anchor('super/menus','Menus');?></li>
                    <li><?php echo anchor('super/contents/index/page','Pages');?></li>
                    <li><?php echo anchor('super/contents/index/category','Categories');?></li>
                    <li><?php echo anchor('super/contents/index/post','Posts');?></li>
                    <li><?php echo anchor('super/rake','RAKE Tool');?></li>
                </ul>
                <ul class="nav navbar-nav navbar-right"> -->
<!--                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Multilanguage <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo site_url('admin/languages');?>">Languages</a></li>
                            <li class="divider"></li>
                            <?php
                            foreach($langs as $slug=>$language)
                            {
                                echo '<li>';
                                echo anchor('admin/dictionary/index/'.$slug.'/1','Dictionary '.$language['name']);
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </li>-->
              <!--       <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Take care! <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo site_url('super/master');?>">Website settings</a></li>
                            </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $this->ion_auth->user()->row()->username;?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo site_url('super/user/profile');?>">Profile page</a></li>
                            <?php echo $current_user_menu;?>
                            <li class="divider"></li>
                            <li><a href="<?php echo site_url('super/user/logout');?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
  </div>
</nav> -->
<?php
if($this->session->flashdata('message'))
{
?>
 <!--  <div class="container" style="padding-top:40px;">
    <div class="alert alert-info alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
aria-hidden="true">&times;</span></button>
      <?php echo $this->session->flashdata('message');?>
    </div>
  </div> -->
<?php
}}?>









                  <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal">
                                                            
                                <div class="panel panel-default tabs"> 
                                  <!-- START OF YOUR CODE -->
    <ul class="nav nav-tabs" id="lb-tabs">
    <?php 
    // I just made an array with some data, since I don't have your data source
        // $sqlCat =   array(
        //                 array('tab_title'=>'Home'),
        //                 array('tab_title'=>'Profile'),
        //                 array('tab_title'=>'Messages'),
        //                 array('tab_title'=>'Settings')
        //             );
foreach ($bulletin_types  as $value) {
    # code...
     $sqlC =$value->department_id;
}
        //set the current tab to be the first one in the list.... or whatever one you specify
        $current_tab = $sqlC;
    ?>
    <?php 
    foreach ($bulletin_types as $row):
        //set the class to "active" for the active tab.
        $tab_class = ($row->department_id==$current_tab) ? 'active' : '' ;
        echo '<li class="'.$tab_class.'"><a href="#' . urlencode($row->department_id) .  '" data-toggle="tab">' .           
        $row->department .  ' </a></li>';
    endforeach;
    ?>
    </ul><!-- /nav-tabs -->
    <div class="tab-content">
        <?php foreach ($bulletin_types as $row2): 
        $tab = $row2->department_id;
        //set the class to "active" for the active content.
        $content_class = ($tab==$current_tab) ? 'active' : '' ;
        ?>
        <div class="tab-pane <?php echo $content_class;?>" id="<?php echo $tab; //--  this right here is from yoru code, but there was no "echo" ?>">
            <div class="links">
                <ul class="col">
                    <?php  
                    // Again, I just made an array with some data, since I don't have your data source
                    // $items = array(
                    //             array('title'=>'Home','tab_link'=>'http://home.com'),
                    //             array('title'=>'Profile','tab_link'=>'http://profile.com'),
                    //             array('title'=>'Messages','tab_link'=>'http://messages.com'),
                    //             array('title'=>'Settings','tab_link'=>'http://settings.com'),
                    //             array('title'=>'Profile','tab_link'=>'http://profile2.com'),
                    //             array('title'=>'Profile','tab_link'=>'http://profile3.com'),
                    //         );
                    // you have a while loop here, my array doesn't have a "fetch" method, so I use a foreach loop here        
                    foreach($row as $children) {
              //output the links with the title that matches this content's tab.
            var_dump($row);  if($children['department_id'] == $tab){
                           // echo '<li>' . $item['title'] . ' - '. $item['tab_link'] .'</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div><!-- /tab-pane  -->
    <?php endforeach; ?>
    </div><!-- /tab-content  -->

<!-- END OF YOUR CODE -->  
<!--                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="active"><a href="#tab-first" role="tab" data-toggle="tab">Personal Data</a></li>
                                        <li><a href="#tab-second" role="tab" data-toggle="tab">Payment Settings</a></li>
                                        <li><a href="#tab-third" role="tab" data-toggle="tab">Email Settings</a></li>
                                    </ul>
                                    <div class="panel-body tab-content">
                                        <div class="tab-pane active" id="tab-first">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum dolor sem, quis pharetra dui ultricies vel. Cras non pulvinar tellus, vel bibendum magna. Morbi tellus nulla, cursus non nisi sed, porttitor dignissim erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc facilisis commodo lectus. Vivamus vel tincidunt enim, non vulputate ipsum. Ut pellentesque consectetur arcu sit amet scelerisque. Fusce commodo leo eros, ut eleifend massa congue at.</p>

                                  
                                            
                                        </div>
                                        <div class="tab-pane" id="tab-second">
                                            <p>Donec tristique eu sem et aliquam. Proin sodales elementum urna et euismod. Quisque nisl nisl, venenatis eget dignissim et, adipiscing eu tellus. Sed nulla massa, luctus id orci sed, elementum consequat est. Proin dictum odio quis diam gravida facilisis. Sed pharetra dolor a tempor tristique. Sed semper sed urna ac dignissim. Aenean fermentum leo at posuere mattis. Etiam vitae quam in magna viverra dictum. Curabitur feugiat ligula in dui luctus, sed aliquet neque posuere.</p>
                                            
                                      
                                            
                                        </div>                                        
                                        <div class="tab-pane" id="tab-third">
                                            <p>This is non libero bibendum, scelerisque arcu id, placerat nunc. Integer ullamcorper rutrum dui eget porta. Fusce enim dui, pulvinar a augue nec, dapibus hendrerit mauris. Praesent efficitur, elit non convallis faucibus, enim sapien suscipit mi, sit amet fringilla felis arcu id sem. Phasellus semper felis in odio convallis, et venenatis nisl posuere. Morbi non aliquet magna, a consectetur risus. Vivamus quis tellus eros. Nulla sagittis nisi sit amet orci consectetur laoreet.</p>
                                            
                                       
                                            
                                        </div>
                                    </div>
                                    <div class="panel-footer">                                                                        
                                        <button class="btn btn-primary pull-right">Save Changes <span class="fa fa-floppy-o fa-right"></span></button>
                                    </div>-->
                                </div>                                
                            
                            </form>
                            
                        </div>
                    </div>   








                     <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body">
                        <div class="block">
                             <div class="modal-header">
                       <?php if ($this->session->flashdata('2flashError')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('2flashError') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('2flashSuccess')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('2flashSuccess') ?> </div>
    <?php } ?> 
                        <h5 class="modal-title" id="defModalHead">Select a User to begin Conversation</h5><p>Statistics: <?=$this->Message_model->get_school_name($this->ion_auth->user()->row()->school_id) ;?>  currently has:</p>
<span class="badge bg-primary">  [<?php echo $count_admin; ?>] Admin  </span>,
<span class="badge bg-warning">  [<?php echo $count_hod; ?>] Hod  </span>,
<span class="badge bg-info">  [<?php echo $count_lecturer; ?>] Lecturer  </span>,
<span class="badge bg-success">  [<?php echo $count_src; ?>] Src  </span>
<span class="badge bg-default">  [<?php echo $count_student; ?>] Students  </span>
<span class="badge bg-default">  [<?php echo $count_librarians; ?>] Librarians  </span>
                    </div>
                            <div class="list-group border-bottom">
                                <a href="<?php echo site_url('hod/users/message');?>" class="list-group-item"><span class="fa fa-inbox"></span> Inbox <span class="badge badge-success"><?php echo $count_inbox; ?></span></a>
                                <a href="#" class="list-group-item"><span class="fa fa-rocket"></span> Sent <span class="badge badge-warning"><?php echo $count_sent; ?></span></a>
                             <!--   <a href="#" class="list-group-item"><span class="fa fa-flag"></span> Flagged</a>
                                <a href="#" class="list-group-item"><span class="fa fa-trash-o"></span> Deleted <span class="badge badge-default">1.4k</span></a>         -->                    
                            </div>                        
                        </div>
                        <div class="block">
                        <?php echo form_open('hod/users/sendmessage',array('class'=>'form-horizontal'));?>
                          <!--   <div class="form-group">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <button class="btn btn-default"><span class="fa fa-trash-o"></span> Delete Draft</button>
                                    </div>
                                    <div class="pull-right">
                                        <button class="btn btn-danger"><span class="fa fa-envelope"></span> Send Message</button>
                                    </div>                                    
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-md-2 control-label">From:</label>
                                <div class="col-md-9">                                        
                                     <input type="text" name="user_from" class="tagsinput" value="<?=$this->ion_auth->user()->row()->uid ;?>" data-placeholder="<?=$this->ion_auth->user()->row()->email;?>"  disabled/>
                                </div>
                            </div>                        
                            <div class="form-group">
                                <label class="col-md-2 control-label">To:</label>
                                <div class="col-md-10">                                        
                                 
                                     <select  id="to_id[]" name="to_id" multiple="multiple" class="form-control select">
                                         <?php
                            foreach($to_id as $lecturer){
  if(!empty($lecturer->username) ){
    
                    echo '<option value="'.$lecturer->uid.'">'.$lecturer->username.'     ['.$this->Bs_admin_model->get_user_department($lecturer->department_id).'  Department ]     ['.$this->Bs_admin_model->get_group_name($this->Bs_admin_model->get_users_id($lecturer->id)).']</option>';
                }
           else{
          echo '<option value="">Contact Unavailable  </option>';                              
             }
        
                            }
            
                           ?>                                                    
                                    </select>                                
                                </div>
                               <!--  <div class="col-md-1">
                                    <button class="btn btn-link toggle" data-toggle="mail-cc">Cc</button>
                                </div> -->
                            </div>
                          <!--   <div class="form-group hidden" id="mail-cc">
                                <label class="col-md-2 control-label">Cc:</label>
                                <div class="col-md-10">                                        
                                <input type="text" class="tagsinput" value="" data-placeholder="add email"/>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-md-2 control-label">Subject:</label>
                                <div class="col-md-10">                                        
                                    <input type="text" class="form-control" name="subject" id="subject"   value=""/>                                
                                </div>                                
                            </div>
                           <!--  <div class="form-group">
                                <label class="col-md-2 control-label">Attachments:</label>
                                <div class="col-md-10">                                        
                                    <input type="file" class="file" data-filename-placement="inside"/>
                                </div>                                
                            </div> -->
                            <div class="form-group">
                                <div class="col-md-12">                            
                                    <textarea class="summernote_email" name="content"><p>Hello Sir/Madam,</p>








<p><strong>Best Regards<br/><?=$this->ion_auth->user()->row()->username ;?><br/><?=$this->ion_auth->user()->row()->email ;?><br/><?=$this->Bs_admin_model->get_user_department($lecturer->department_id) ;?> Department</strong></p>                                        
                                    </textarea>                            
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                  <!--   <div class="pull-left">
                                        <button class="btn btn-default"><span class="fa fa-trash-o"></span> Delete Draft</button>
                                    </div> -->
                                    <div class="pull-right">
                                        <button class="btn btn-danger"><span class="fa fa-envelope"></span> Send Message</button>
                                    </div>                                    
                                </div>
                            </div>
                      <?php echo form_close();?>
                        </div>
                        
                    </div>
                    <!-- END CONTENT FRAME BODY -->
                </div>
                <!-- END CONTENT FRAME -->   -->
            </div>


             <!-- Bootstrap4 CSS - -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">   
  
  <!-- Note - If your website not use Bootstrap4 CSS as main style, please use custom css style below and delete css line above. 
  It isolate Bootstrap CSS to a particular class 'bootstrapiso' to avoid css conflicts with your site main css style -->
  <!-- <link rel="stylesheet" href="css/bootstrapcustom.min.css" crossorigin="anonymous"> -->
  
  
  <!-- JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" crossorigin="anonymous"></script>
 
 
  <!-- CSS for Payment Box -->
  <style>
            html { font-size: 14px; }
            @media (min-width: 768px) { html { font-size: 16px; } .tooltip-inner { max-width: 350px; } }
            .mncrpt .container { max-width: 980px; }
            .mncrpt .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }
            img.radioimage-select { padding: 7px; border: solid 2px #ffffff; margin: 7px 1px; cursor: pointer; box-shadow: none; }
            img.radioimage-select:hover { border: solid 2px #a5c1e5; }
            img.radioimage-select.radioimage-checked { border: solid 2px #7db8d9; background-color: #f4f8fb; }
    </style>



<div id="container">
  <h1>Welcome to the Hod Dashboard!</h1>

  <?php
  /**** CONFIGURATION VARIABLES ****/ 
   $userID    = $this->ion_auth->user()->row()->uid;        // place your registered userID or md5(userID) here (user1, user7, uo43DC, etc).
   // you don't need to use userID for unregistered website visitors
   // if userID is empty, system will autogenerate userID and save in cookies
$userFormat   = "COOKIE";     // save userID in cookies (or you can use IPADDRESS, SESSION)
$orderID    = "invoice".$this->ion_auth->user()->row()->uid;  // invoice number - 000383
$amountUSD    = 2.21;       // invoice amount - 2.21 USD
$period     = "NOEXPIRY";   // one time payment, not expiry
$def_language = "en";       // default Payment Box Language
$public_key   = "31206AAtfI2sBitcoin77BTCPUBvAuGLNO8ZH3rzcdSRcptnch"; // from gourl.io
$private_key  = "31206AAtfI2sBitcoin77BTCPRVSz4ey8a2v0Mfe3hXhslt7Vs";// from gourl.io

  
   
   // *** For convert Euro/GBP/etc. to USD/Bitcoin, use function convert_currency_live() with Google Finance
   // *** examples: convert_currency_live("EUR", "BTC", 22.37) - convert 22.37 Euro to Bitcoin
   // *** convert_currency_live("EUR", "USD", 22.37) - convert 22.37 Euro to USD
 
   // IMPORTANT: Please read description of options here - https://gourl.io/api-php.html#options  
 
 
 
    /** PAYMENT BOX **/
  $options = array(
    "public_key"  => $public_key,   // your public key from gourl.io
    "private_key" => $private_key,  // your private key from gourl.io
    "webdev_key"  => "",    // optional, gourl affiliate key
    "orderID"     => $orderID,    // order id or product name
    "userID"      => $userID,     // unique identifier for every user
    "userFormat"  => $userFormat,   // save userID in COOKIE, IPADDRESS or SESSION
    "amount"      => 0,       // product price in coins OR in USD below
    "amountUSD"   => $amountUSD,  // we use product price in USD
    "period"      => $period,     // payment valid period
    "language"    => $def_language  // text on EN - english, FR - french, etc
);
 

// Initialise Payment Class
$box = new Cryptobox ($options);
  
// coin name
$coinName = $box->coin_name(); 

// Successful Cryptocoin Payment received
if ($box->is_paid()) 
{
  if (!$box->is_confirmed()) {
    $message =  "Thank you for order (order #".$orderID.", payment #".$box->payment_id()."). Awaiting transaction/payment confirmation";
  }                     
  else 
  { // payment confirmed (6+ confirmations)

    // one time action
    if (!$box->is_processed())
    {
      // One time action after payment has been made/confirmed
      // !!For update db records, please use function cryptobox_new_payment()!!
       
      $message = "Thank you for order (order #".$orderID.", payment #".$box->payment_id()."). Payment Confirmed. <br>(User will see this message one time after payment has been made)"; 
      
      // Set Payment Status to Processed
      $box->set_status_processed();  
    }
    else $message = "Thank you for order (order #".$orderID.", payment #".$box->payment_id()."). Payment Confirmed. <br>(User will see this message during ".$period." period after payment has been made)"; // General message
  }
}
else $message = "This invoice has not been paid yet";


// Optional - Language selection list for payment box (html code)
$languages_list = display_language_box($def_language);





// ...
// Also you need to use IPN function cryptobox_new_payment($paymentID = 0, $payment_details = array(), $box_status = "") 
// for send confirmation email, update database, update user membership, etc.
// You need to modify file - cryptobox.newpayment.php, read more - https://gourl.io/api-php.html#ipn
// ...
    


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
 "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<title>Pay-Per-Download Cryptocoin (payments in multiple cryptocurrencies) Payment Example</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='Expires' content='-1'>
<meta name='robots' content='all'>
<script src='<?php echo site_url('assets/public/js/cryptobox.min.js');?>' type='text/javascript'></script>
</head>
<body style='font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#666;margin:0'>

<br>
<!-- <img style='position:absolute;margin-left:auto;margin-right:auto;left:0;right:0;' alt='status' src='https://gourl.io/images/<?php echo ($box->is_paid()?"paid":"unpaid"); ?>.png'>
<img alt='Invoice' border='0' height='500' src='https://gourl.io/images/invoice.png'> -->

<?php if (!$box->is_paid()) echo "<h2>Pay Invoice Now - </h2>"; else echo "<br><br>";  ?>
<div style='margin:30px 0 5px 300px'>Language: &#160; <?php echo $languages_list; ?></div>
<?php echo $box->display_cryptobox(true, 580, 230); ?>
<br><br><br>
<h3>Message :</h3>
<h2 style='color:#999'><?php echo $message; ?></h2>


</div><br><br><br><br><br><br>

 </div>
 
