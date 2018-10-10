<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<li class="divider"></li>
	                  
<?php if($this->ion_auth->user()->row()->program_type ==1){  ?>		 
			<li class="xn-openable">
			<a href="#"><span class="fa fa-users"></span> <span class="xn-text">Students</span></a>
			 <ul>
 	   <li><a href="<?php echo site_url('admin/users/regstudent');?>"><span class="fa fa-plus-circle"></span> Register New Student</a></li>
	   <li><a href="<?php echo site_url('admin/users/viewstudent');?>"><span class="fa fa-user"></span> View Student</a></li>
			</ul>
		  </li>
		  
		  <li class="xn-openable">
			<a href="#"><span class="fa fa-users"></span> <span class="xn-text">Lecturer</span></a>
			 <ul>
 	   <li><a href="<?php echo site_url('admin/users/reglecturer');?>"><span class="fa fa-plus-circle"></span> Register New Lecturer</a></li>
	   <li><a href="<?php echo site_url('admin/users/viewlecturer');?>"><span class="fa fa-user"></span> View Lecturer</a></li>
			</ul>
		  </li>
		  
		  <li class="xn-openable">
			<a href="#"><span class="fa fa-users"></span> <span class="xn-text">HOD</span></a>
			 <ul>
 	   <li><a href="<?php echo site_url('admin/users/reghod');?>"><span class="fa fa-plus-circle"></span> Register New HOD</a></li>
	   <li><a href="<?php echo site_url('admin/users/viewhod');?>"><span class="fa fa-user"></span> View HOD</a></li>
			</ul>
		  </li>
		  
		  <li class="xn-openable">
			<a href="#"><span class="fa fa-meh-o"></span> <span class="xn-text">SRC</span></a>
			 <ul>
 	   <li><a href="<?php echo site_url('admin/users/regsrc');?>"><span class="fa fa-plus-circle"></span> Register New SRC</a></li>
	   <li><a href="<?php echo site_url('admin/users/viewsrc');?>"><span class="fa fa-meh-o"></span> View SRC</a></li>
			</ul>
		  </li>
		  
		  
		  <li class="xn-openable">
			<a href="#"><span class="fa fa-ellipsis-v"></span> <span class="xn-text">Department</span></a>
			 <ul>
 	   <li><a href="<?php echo site_url('admin/users/adddepartment');?>"><span class="fa fa-plus-circle"></span> Register New Department</a></li>
	   <li><a href="<?php echo site_url('admin/users/viewdepartment');?>"><span class="fa fa-ellipsis-v"></span> View Department</a></li>
			</ul>
		  </li>
		    
		  
		  <li>
	<a href="<?php echo site_url('admin/users/calendar');?>"><span class="fa fa-calendar-o"></span> <span class="xn-text">School Calendar</span></a>
		 </li>
  
  <li>
  <a href="<?php echo site_url('admin/users/message');?>"><span class="fa fa-envelope-o"></span> <span class="xn-text">Message Center</span></a>
  </li>
  <li>
  <a href="<?php echo site_url('admin/users/pb');?>"><span class="fa fa-pencil"></span> <span class="xn-text">Post Board</span></a>
  </li> 
  <li>
  <a href="<?php echo site_url('admin/users/cp');?>"><span class="fa fa-key"></span> <span class="xn-text">Change Password</span></a>
  </li> 

                    
                       <li>
           <a href="<?php echo site_url('admin/user/logout');?>"><span class="fa fa-sign-out"></span> <span class="xn-text">Log Out</span></a>                        
                    </li>  
                    <?php  } elseif($this->ion_auth->user()->row()->program_type ==2)  {?>
    <li>
 <a href="<?php echo site_url('admin/users/message');?>"><span class="fa fa-envelope-o"></span> <span class="xn-text">Message Center</span></a>
</li> 
    <li class="xn-openable">
			<a href="#"><span class="fa fa-ellipsis-v"></span> <span class="xn-text">Department</span></a>
			 <ul>
 	 <li><a href="<?php echo site_url('admin/users/adddepartment');?>"><span class="fa fa-plus-circle"></span> Register New Department</a></li>
	   <li><a href="<?php echo site_url('admin/users/viewdepartment');?>"><span class="fa fa-ellipsis-v"></span> View Department</a></li>
			</ul>
		  </li>

<li class="xn-openable">
			<a href="#"><span class="fa fa-users"></span> <span class="xn-text">Students</span></a>
			 <ul>
 	    <li><a href="<?php echo site_url('admin/users/regstudent');?>"><span class="fa fa-plus-circle"></span> Register New Student</a></li>
	   <li><a href="<?php echo site_url('admin/users/viewstudent');?>"><span class="fa fa-user"></span> View Student</a></li>
			</ul>
		  </li>
   <li class="xn-openable">
			<a href="#"><span class="fa fa-users"></span> <span class="xn-text">Staff</span></a>
			 <ul>
              <li><a href="<?php echo site_url('admin/users/reghod');?>"><span class="fa fa-plus-circle"></span> Register New HOD</a></li>
	   <li><a href="<?php echo site_url('admin/users/viewhod');?>"><span class="fa fa-user"></span> View HOD</a></li>
 	  <li><a href="<?php echo site_url('admin/users/reglecturer');?>"><span class="fa fa-plus-circle"></span> Register New Lecturer</a></li>
	   <li><a href="<?php echo site_url('admin/users/viewlecturer');?>"><span class="fa fa-user"></span> View Lecturer</a></li>
           <li><a href="<?php echo site_url('admin/users/reglib');?>"><span class="fa fa-plus-circle"></span> Register New Librarian</a></li>
	   <li><a href="<?php echo site_url('admin/users/viewlib');?>"><span class="fa fa-user"></span> View Librarian</a></li>
			</ul>
		  </li>
<!--   <li>
<a href="<?php echo site_url('admin/users/fees');?>"><span class="fa fa-money"></span> <span class="xn-text">Student Fee Statement</span></a>
</li> -->
  <li>
   <a href="<?php echo site_url('admin/users/cp');?>"><span class="fa fa-key"></span> <span class="xn-text">Change Password</span></a>
  </li> 
  <li>
  <a href="<?php echo site_url('admin/user/logout');?>"><span class="fa fa-sign-out"></span> <span class="xn-text">Log Out</span></a>
  </li>

                    <?php  } elseif($this->ion_auth->user()->row()->program_type ==3)  { ?>

                    <?php } else {?>

                             Menu Has Been Disabled
                <?php } ?>