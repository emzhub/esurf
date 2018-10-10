<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div id="mainBody">
	<div class="container">
	<div class="row">
            <div class="span3"></div>     
            <div class="span9">	
                <div class="well">
                       <?php echo form_open();?>
                    <h1>Sign Up</h1>
                        <h4>Your personal information</h4>
		
<!--	<div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>	-->

		
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

	<div class="control-group">
		<label class="control-label">Date of Birth <sup>*</sup></label>
		<div class="controls">
                      <select class="span1" name="day" id="day">
                                                      <?php
													  for($i=1; $i<=31; $i++)
									  echo '<option value="'.$i.'">'.$i.'</option>';
									                  ?>
                                                    </select>
                        <select class="span1" name="month" id="month">
                                                        <?php
													  for($i=1; $i<=12; $i++)
									  echo '<option value="'.$i.'">'.$i.'</option>';
									                  ?>
                                                    </select>
		 <select class="span1" name="year" id="year">
                                                         <?php
													  for($i=1920; $i<=(gmdate('Y')-1); $i++)
									       echo '<option value="'.$i.'">'.$i.'</option>';
									                  ?>                                                        
                                                    </select>
		</div>
	  </div>
		<div class="control-group">
			<label class="control-label" for="address">Gender<sup>*</sup></label>
			<div class="controls">
                           <select name="gender" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                     
                    </select>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="address">Address<sup>*</sup></label>
			<div class="controls">
                            <input type="text" id="address" name="Address" placeholder="Adress"/> <span>Street address, P.O. box, company name, c/o</span>
			</div>
		</div>
		

                	<div class="control-group">
                            	<label class="control-label" for="city">Country<sup>*</sup></label>
			<div class="controls">
             <select name="country" class="crs-country" data-region-id="two" data-default-option="Select a country, man."></select>

                        
                        </div>  
                        </div>
                            	<div class="control-group">
                                    	<label class="control-label" for="city">State<sup>*</sup></label>
			<div class="controls">
	                 <select name="state" id="two" data-blank-option="No country selected, mon. (blank value)" data-default-option="Select a region, pal. (default option)"></select>
                 </div> 
               
               </div>
		
		 <div class="control-group controls">
                     <input type="hidden"  id="groups" name="groups" value="2"/>
                  
                </div>
		
	
		<div class="control-group">
			  <?php
                echo form_label('Phone','phone');
                echo form_error('phone');
                echo form_input('phone',set_value('phone'),'class="form-control"');
                ?>
		</div>
 <div class="control-group controls">
                    <input type="checkbox" class="icheckbox" id="Terms" name="Terms" value="1"/><em> By Clicking You agree with,JL privacy and cookie policy</em>
                  
                </div>
	         <?php echo form_submit('submit', 'Create user', 'class="btn btn-success  btn-lg"');?>
            <?php echo anchor('/public/user/login', 'Cancel','class="btn btn-default btn-lg "');?>
            <?php echo form_close();?>
        </div>
    </div>
    </div>
        </div>
    </div>

