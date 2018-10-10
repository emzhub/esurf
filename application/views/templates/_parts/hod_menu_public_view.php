<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<li class="divider"></li>
	                  
<?php if($this->ion_auth->user()->row()->program_type ==1){  ?>		

 <li class="xn-openable">
      <a href="#"><span class="fa fa-book"></span> <span class="xn-text">Courses</span></a>
       <ul>
     <li><a href="<?php echo site_url('hod/users/regcourse');?>"><span class="fa fa-plus-circle"></span> Register New Course</a></li>
     <li><a href="<?php echo site_url('hod/users/viewcourse');?>"><span class="fa fa-user"></span> View Courses</a></li>
     <li><a href="<?php echo site_url('hod/users/asigncourse');?>"><span class="fa fa-plus"></span> Assign Course to Lecturer</a></li>
     <li><a href="<?php echo site_url('hod/users/viewassigncourse');?>"><span class="fa fa-eye"></span> View Assigned List</a></li>
      </ul>
      </li>
      
      <li class="xn-openable">
      <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Students &raquo; Course(s)</span></a>
       <ul>
     <li><a href="<?php echo site_url('hod/users/regstudentcourse');?>"><span class="fa fa-pencil"></span> Register New Student</a></li> 
      </ul>
      </li>
      
     <li>
  <a href="<?php echo site_url('hod/users/timetable');?>"><span class="fa fa-calendar"></span> <span class="xn-text">Time Table</span></a> </li>
        
      
  <li>
		 
		  
	<li>
	<a href="<?php echo site_url('hod/users/calendar');?>"><span class="fa fa-calendar-o"></span> <span class="xn-text">School Calendar</span></a> </li>
  
  <li>
  <a href="<?php echo site_url('hod/users/message');?>"><span class="fa fa-envelope-o"></span> <span class="xn-text">Message Center</span></a>
  </li>  
  <li>
  <a href="<?php echo site_url('hod/users/pb');?>"><span class="fa fa-pencil"></span> <span class="xn-text">Post Board</span></a>
  </li> 
  
  <li>
<a href="<?php echo site_url('hod/users/pc');?>"><span class="fa fa-globe"></span> <span class="xn-text">Public Center</span></a>
</li>
     



  <li>
   <a href="<?php echo site_url('hod/users/cp');?>"><span class="fa fa-key"></span> <span class="xn-text">Change Password</span></a>
  </li> 
  <li>
  <a href="<?php echo site_url('public/user/logout');?>"><span class="fa fa-sign-out"></span> <span class="xn-text">Log Out</span></a>
  </li>
  					   <?php  }

                elseif($this->ion_auth->user()->row()->program_type ==2)  {?>
  <li class="xn-openable">
      <a href="#"><span class="fa fa-book"></span> <span class="xn-text">Courses</span></a>
       <ul>
     <li><a href="' . APP_URL . 'static_pages/views/app.php?target=15"><span class="fa fa-plus-circle"></span> Register New Course</a></li>
     <li><a href="' . APP_URL . 'static_pages/views/app.php?target=16"><span class="fa fa-user"></span> View Courses</a></li>
     <li><a href="' . APP_URL . 'static_pages/views/app.php?target=17"><span class="fa fa-plus"></span> Assign Course to Lecturer</a></li>
     <li><a href="' . APP_URL . 'static_pages/views/app.php?target=18"><span class="fa fa-eye"></span> View Assigned List</a></li>
      </ul>
      </li>
      
      <li class="xn-openable">
      <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Students &raquo; Course(s)</span></a>
       <ul>
     <li><a href="' . APP_URL . 'static_pages/views/app.php?target=22"><span class="fa fa-pencil"></span> Register New Student</a></li> 
      </ul>
      </li>
                    <li class="xn-openable">
      <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Project</span></a>
       <ul>
      <li>
<a href="' . APP_URL . 'static_pages/views/app.php?target=56"><span class="fa fa-users"></span> <span class="xn-text">Assign Guide</span></a>
</li>
</ul>
      </li>
  <li>
  <a href="<?php echo site_url('hod/users/cp');?>"><span class="fa fa-envelope-o"></span> <span class="xn-text">Message Center</span></a>
  </li>  
  <li>
  <a href="<?php echo site_url('hod/users/regstudent');?>"><span class="fa fa-pencil"></span> <span class="xn-text">Post Board</span></a>
  </li> 
  
  <li>
<a href="<?php echo site_url('hod/users/regstudent');?>"><span class="fa fa-globe"></span> <span class="xn-text">Public Center</span></a>
</li>
  <li>
   <a href="<?php echo site_url('hod/users/cp');?>"><span class="fa fa-key"></span> <span class="xn-text">Change Password</span></a>
  </li> 
  <li>
  <a href="<?php echo site_url('public/user/logout');?>"><span class="fa fa-sign-out"></span> <span class="xn-text">Log Out</span></a>
  </li>

                    <?php  } elseif($this->ion_auth->user()->row()->program_type ==3)  { ?>

                    <?php } else {?>

                             Menu Has Been Disabled
                <?php } ?>