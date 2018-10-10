<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<li class="divider"></li>
     <li class="xn-openable ">
              <a href="#"><span class="fa fa-building-o"></span> <span class="xn-text">Schools</span></a>
                        <ul>
                     <li class="active"><a href="<?php echo site_url('super/user/Adsc');?>"><span class="fa fa-plus"></span> Add New School</a></li>
                     <li class="active"><a href="<?php echo site_url('super/user/vs');?>"><span class="fa fa-eye"></span> View School</a></li>

                       </ul>
                    </li>
                    <li class="xn-openable">
       <a href="#"><span class="fa fa-lock"></span> <span class="xn-text">Accounts</span></a>
                        <ul>
                <li class="active"><a href="<?php echo site_url('super/user/adn');?>"><span class="fa fa-plus"></span> Add New Admin Account</a></li>
                <li class="active"><a href="<?php echo site_url('super/user/acc');?>"><span class="fa fa-eye"></span> View Admin Account</a></li>
                        </ul>
                    </li>

                    <li class="xn-openable">
                  <a href="#"><span class="fa fa-lock"></span> <span class="xn-text">Subcription</span></a>
                        <ul>
                  <li class="active"><a href="<?php echo site_url('super/user/adn');?>"><span class="fa fa-plus"></span> Add New Admin Account</a></li>
                  <li class="active"><a href="<?php echo site_url('super/user/acc');?>"><span class="fa fa-eye"></span> View Admin Account</a></li>
                        </ul>
                    </li>
                    <!-- <li class="xn-title">Notification &amp; Alert</li>
                    <li>
           <a href="admin_main_p/views/app.php?target=5"><span class="fa fa-bullhorn"></span> <span class="xn-text">Send Notifications</span></a>
                    </li> -->




                       <li>
           <a href="<?php echo site_url('super/user/logout');?>"><span class="fa fa-sign-out"></span> <span class="xn-text">Log Out</span></a>
                    </li>
