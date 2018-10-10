<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<li class="divider"></li>
	                  
<?php if($this->ion_auth->user()->row()->program_type ==1){  ?>		

<li class="xn-openable">
			<a href="#"><span class="fa fa-book"></span> <span class="xn-text">My Courses</span></a>
			 <ul>
 	   <li><a href="<?php echo site_url('lecturer/users/ac');?>"><span class="fa fa-plus-circle"></span>My Assigned Courses</a></li>
                <li><a href="<?php echo site_url('lecturer/users/regstudent');?>"><span class="fa fa-plus-circle"></span>Assignments</a></li>
	   	</ul>
		  </li>
		 
		  
	<li>
	<a href=""><span class="fa fa-calendar-o"></span> <span class="xn-text">School Calendar</span></a> </li>
  
  <li>
  <a href="<?php echo site_url('lecturer/users/regstudent');?>"><span class="fa fa-envelope-o"></span> <span class="xn-text">Message Center</span></a>
  </li>  
  <li>
  <a href="<?php echo site_url('lecturer/users/regstudent');?>"><span class="fa fa-pencil"></span> <span class="xn-text">Post Board</span></a>
  </li> 
  
  <li>
<a href="<?php echo site_url('lecturer/users/regstudent');?>"><span class="fa fa-globe"></span> <span class="xn-text">Public Center</span></a>
</li>
     



  <li>
   <a href="<?php echo site_url('lecturer/users/cp');?>"><span class="fa fa-key"></span> <span class="xn-text">Change Password</span></a>
  </li> 
  <li>
  <a href="<?php echo site_url('public/user/logout');?>"><span class="fa fa-sign-out"></span> <span class="xn-text">Log Out</span></a>
  </li>
  					   <?php  } elseif($this->ion_auth->user()->row()->program_type ==2)  {?>
<li class="xn-openable">
			<a href="#"><span class="fa fa-book"></span> <span class="xn-text">My Courses</span></a>
			 <ul>
 	   <li><a href="<?php echo site_url('lecturer/users/cp');?>"><span class="fa fa-plus-circle"></span>My Assigned Courses</a></li>
	    <li><a href="<?php echo site_url('lecturer/users/cp');?>"><span class="fa fa-plus-circle"></span>Assignments</a></li>	
            </ul>
		  </li>
		  
	 
			<li class="xn-openable">
			<a href="#"><span class="fa fa-book"></span> <span class="xn-text">Group</span></a>
			 <ul>
 	   <li><a href="<?php echo site_url('lecturer/users/cp');?>"><span class="fa fa-plus-circle"></span>Create Group</a></li>
                  <li><a href="<?php echo site_url('lecturer/users/cp');?>"><span class="fa fa-eye"></span>View Group</a></li>
	    <li><a href="<?php echo site_url('lecturer/users/cp');?>"><span class="fa fa-plus-circle"></span>Assign Student</a></li>	
            </ul>
		  </li>
  <li>
  <a href="<?php echo site_url('lecturer/users/cp');?>"><span class="fa fa-envelope-o"></span> <span class="xn-text">Message Center</span></a>
  </li>  
   <li>
  <a href="<?php echo site_url('lecturer/users/cp');?>"><span class="fa fa-envelope-o"></span> <span class="xn-text">Assign Grade</span></a>
  </li> 
    <li>
<a href="<?php echo site_url('lecturer/users/cp');?>"><span class="fa fa-users"></span> <span class="xn-text">Project</span></a>
</li>
  <li>
   <a href="<?php echo site_url('lecturer/users/cp');?>"><span class="fa fa-key"></span> <span class="xn-text">Change Password</span></a>
  </li> 
  <li>
  <a href="<?php echo site_url('public/user/logout');?>"><span class="fa fa-sign-out"></span> <span class="xn-text">Log Out</span></a>
  </li>

                    <?php  } elseif($this->ion_auth->user()->row()->program_type ==3)  { ?>

                    <?php } else {?>

                             Menu Has Been Disabled
                <?php } ?>