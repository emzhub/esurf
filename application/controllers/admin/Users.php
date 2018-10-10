<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('ajax');
          $this->load->helper('url');
        $this->load->model('User_model');
          $this->load->model('Message_model');
            $this->load->model('Bs_admin_model');
   $this->load->model("calendar_model");
    $this->load->library('ion_auth');
     $this->load->library('session');
        if(!$this->ion_auth->in_group('admin'))
        {
            $this->postal->add('You are not allowed to visit the Users page','error');
            redirect('public');
        }
          $this->Message_model->count_messages();
          $this->data['sch'] = $this->Bs_admin_model->get_user_schabr();
    $this->data['avatar'] = $this->Bs_admin_model->get_user_avatar();
 $this->data['recordb'] = $this->Message_model->get_new_messages();
      
       
    }

    public function index($group_id = NULL)
    {
        $this->data['page_title'] = 'Users';
       $this->data['users'] = $this->ion_auth->users($group_id)->result();
        //$this->data['users'] = $this->ion_auth->users(array(1,'members'))->result();
        $this->render('admin/users/index_view');
	}

   
    public function edit($user_id = NULL)
    {
        $user_id = $this->input->post('user_id') ? $this->input->post('user_id') : $user_id;
        if($this->data['current_user']->id == $user_id)
        {
            $this->postal->add('Use the profile page to change your own credentials.','error');
            redirect('admin/users');
        }
        $this->data['page_title'] = 'Edit user';
        $this->load->library('form_validation');

        $this->form_validation->set_rules('first_name','First name','trim');
        $this->form_validation->set_rules('last_name','Last name','trim');
        $this->form_validation->set_rules('company','Company','trim');
        $this->form_validation->set_rules('phone','Phone','trim');
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','min_length[6]');
        $this->form_validation->set_rules('password_confirm','Password confirmation','matches[password]');
        $this->form_validation->set_rules('groups[]','Groups','required|integer');
        $this->form_validation->set_rules('user_id','User ID','trim|integer|required');

        if($this->form_validation->run() === FALSE)
        {
            if($user = $this->ion_auth->user((int) $user_id)->row())
            {
                $this->data['user'] = $user;
            }
            else
            {
                $this->postal->add('The user doesn\'t exist.','error');
                redirect('admin/users');
            }
            $this->data['groups'] = $this->ion_auth->groups()->result();
            $this->data['usergroups'] = array();
            if($usergroups = $this->ion_auth->get_users_groups($user->id)->result())
            {
                foreach($usergroups as $group)
                {
                    $this->data['usergroups'][] = $group->id;
                }
            }
            $this->load->helper('form');
            $this->render('admin/users/edit_view');
        }
        else
        {
            $user_id = $this->input->post('user_id');
            $new_data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'company'    => $this->input->post('company'),
                'phone'      => $this->input->post('phone')
            );
            if(strlen($this->input->post('password'))>=6) $new_data['password'] = $this->input->post('password');

            $this->ion_auth->update($user_id, $new_data);

            //Update the groups user belongs to
            $groups = $this->input->post('groups');
            if (isset($groups) && !empty($groups))
            {
                $this->ion_auth->remove_from_group('', $user_id);
                foreach ($groups as $group)
                {
                    $this->ion_auth->add_to_group($group, $user_id);
                }
            }
$this->session->set_flashdata('message',$this->ion_auth->messages());           
// $this->postal->add($this->ion_auth->messages(),'success');
            redirect('admin/users');
        }
    }

    public function delete($user_id = NULL)
    {
        if(is_null($user_id))
        {
            $this->postal->add('There\'s no user to delete','error');
        }
        else
        {
            $this->ion_auth->delete_user($user_id);
            $this->session->set_flashdata('message',$this->ion_auth->messages());
            //$this->postal->add($this->ion_auth->messages(),'success');
        }
        redirect('admin/users');
    }

   public function cp()
    {
        $randid= mt_rand(13, rand(100, 99999990));
        $this->data['page_title'] = 'Change Password';
        $this->load->library('form_validation');
         $this->form_validation->set_rules('password','password','required|min_length[6]');
         $this->form_validation->set_rules('password_confirm','Password confirmation','required|matches[password]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if($this->form_validation->run()===FALSE)
        {
          // Display error message
        //  $this->session->set_flashdata('flashError', 'An Error occured '.$this->ion_auth->errors().',Please Try again.');
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('admin/add/tpl_change_password','admin_master');
        }
        else
        {
         $new_data = array();
            if(strlen($this->input->post('password'))>=6) $new_data['password'] = $this->input->post('password');

            $user_id =  $this->ion_auth->user()->row()->id; 
    
            $id = $this->ion_auth->update($user_id, $new_data);
                 // $id=$this->ion_auth->adminregstud($uid,$username, $password,$email, $school_id, $department_id, $program_type, $additional, $dataarr, $group_ids);
          // $id=$this->Bs_admin_model->addstudent($dataarr);

        if($id!=TRUE){

                // Display error message
         $this->session->set_flashdata('2flashError', 'An Error occured ,Please Try again.');
         
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('admin/tpl_change_password','admin_master');

        }
        else
        {
  
             // Display Success message
          // echo "<script>alert('Change Submitted Successfully....!!!! ');</script>";
          $this->session->set_flashdata('2flashSuccess', 'Change Submitted Successfully....!!!!  Thank You.');
          // $this->postal->add($this->ion_auth->messages(),'success');
            redirect('admin/users/cp');
        }
        }  
    }


    public function regstudent()
    {
        $randid= mt_rand(13, rand(100, 99999990));
        $this->data['page_title'] = 'Create New Student';
        $this->load->library('form_validation');
          $this->form_validation->set_rules('department_id','department Name','trim|required|required');
       $this->form_validation->set_rules('username','username','trim|required');
        $this->form_validation->set_rules('email','email','trim|required');
          // $this->form_validation->set_rules('groups[]','Groups','required|integer');
        $this->form_validation->set_rules('password','password','required|min_length[6]');
         $this->form_validation->set_rules('password_confirm','Password confirmation','required|matches[password]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if($this->form_validation->run()===FALSE)
        {
          // Display error message
        //  $this->session->set_flashdata('flashError', 'An Error occured '.$this->ion_auth->errors().',Please Try again.');
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
                $this->data['depts'] = $this->Bs_admin_model->get_all_department();
            $this->render('admin/add/tpl_add_student','admin_master');
        }
        else
        {
           $uid =  $randid;
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
              $group_ids = 2;
             $school_id =  $this->ion_auth->user()->row()->school_id; 
            $department_id   = $this->input->post('department_id');
            $program_type = $this->ion_auth->user()->row()->program_type; 

           $additional = array(  
             'school_id'         => $this->ion_auth->user()->row()->school_id,
             'department_id'     => $this->input->post('department_id'),
            'program_type'      => $this->ion_auth->user()->row()->program_type,
            'user_id'           => $randid,
            'username'          => $this->input->post('username'),
             'date'              => gmdate('d-m-Y h:i A'),
             'time'              => time()
          );
            $dataarr = array(  
          'user_id'           =>  $randid,
          'email'           =>  $this->input->post('email'),
             'date'              => gmdate('d-m-Y h:i A')
          );



            // $this->load->model('Bs_admin_model');
                  $id=$this->ion_auth->adminregstud($uid,$username, $password,$email, $school_id, $department_id, $program_type, $additional, $dataarr, $group_ids);
          // $id=$this->Bs_admin_model->addstudent($dataarr);

        if($id!=TRUE){

                // Display error message
         $this->session->set_flashdata('2flashError', 'An Error occured ,Please Try again.');
         
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('admin/add/tpl_add_student','admin_master');

        }
        else
        {
  
             // Display Success message
          $this->session->set_flashdata('2flashSuccess', 'New Student  have successfully added Thank You.');
          // $this->postal->add($this->ion_auth->messages(),'success');
            redirect('admin/users/regstudent');
        }
        }  
    }
     public function reglecturer()
    {
        $randid= mt_rand(13, rand(100, 99999990));
        $this->data['page_title'] = 'Create New Lecturer';
        $this->load->library('form_validation');
          $this->form_validation->set_rules('department_id','department Name','trim|required|required');
       $this->form_validation->set_rules('username','username','trim|required');
        $this->form_validation->set_rules('email','email','trim|required');
          // $this->form_validation->set_rules('groups[]','Groups','required|integer');
        $this->form_validation->set_rules('password','password','required|min_length[6]');
         $this->form_validation->set_rules('password_confirm','Password confirmation','required|matches[password]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if($this->form_validation->run()===FALSE)
        {
          // Display error message
        //  $this->session->set_flashdata('flashError', 'An Error occured '.$this->ion_auth->errors().',Please Try again.');
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
                $this->data['depts'] = $this->Bs_admin_model->get_all_department();
            $this->render('admin/add/tpl_add_lecturer','admin_master');
        }
        else
        {
           $uid =  $randid;
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
              $group_ids = 5;
             $school_id =  $this->ion_auth->user()->row()->school_id; 
            $department_id   = $this->input->post('department_id');
            $program_type = $this->ion_auth->user()->row()->program_type; 

           $additional = array(  
               'school_id'         => $this->ion_auth->user()->row()->school_id,
                    'program_type'     => $this->ion_auth->user()->row()->program_type,
                   'department_id'       => $this->input->post('department_id'),
                   'user_id'           => $randid,
                    'username'          => $this->input->post('username'),
                     'date'              => gmdate('d-m-Y h:i A'),
                     'time'              => time()
          );

  
            $dataarr = array(  
          'user_id'           =>  $randid,
          'email'           =>  $this->input->post('email'),
             'date'              => gmdate('d-m-Y h:i A')
          );



            // $this->load->model('Bs_admin_model');
                  $id=$this->ion_auth->adminreglecturer($uid,$username, $password,$email, $school_id, $department_id, $program_type, $additional, $dataarr, $group_ids);
          // $id=$this->Bs_admin_model->addstudent($dataarr);

        if($id!=TRUE){

                // Display error message
         $this->session->set_flashdata('2flashError', 'An Error occured ,Please Try again.');
         
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('admin/add/tpl_add_lecturer','admin_master');

        }
        else
        {
  
             // Display Success message
          $this->session->set_flashdata('2flashSuccess', 'New Lecturer  have successfully added Thank You.');
          // $this->postal->add($this->ion_auth->messages(),'success');
            redirect('admin/users/reglecturer');
        }
        }  
    }




      public function compose()
    {
        $randid= mt_rand(13, rand(100, 99999990));
        $this->data['page_title'] = 'Create New Message';
      
            $this->data['count_admin'] = $this->Bs_admin_model->count_admin();
        $this->data['count_hod'] = $this->Bs_admin_model->count_hod();
         $this->data['count_lecturer'] = $this->Bs_admin_model->count_lecturer();
        $this->data['count_src'] = $this->Bs_admin_model->count_src();
         $this->data['count_student'] = $this->Bs_admin_model->count_student();
        $this->data['count_librarians'] = $this->Bs_admin_model->count_librarians();
         $this->data['count_inbox'] = $this->Bs_admin_model->count_inbox();
        $this->data['count_sent'] = $this->Bs_admin_model->count_sent();

           $this->data['to_id'] = $this->Bs_admin_model->get_all_users_same_school();
           $this->data['bulletin_types'] = $this->Bs_admin_model->get_all_department2();
            $this->load->helper('form');
               $this->render('admin/add/tpl_mailbox-compose','admin_master');
        
    }
  public function sendmessage(){
        $msg = $this->Message_model;        
       $r=$msg->send_message_a();
       $id=$r;
          //  echo json_encode(array("status" => TRUE));
        if($id!=TRUE){

                // Display error message
         $this->session->set_flashdata('2flashError', 'An Error occured ,Please Try again.');
         
            //$this->data['groups'] = $this->ion_auth->groups()->result();
           // $this->load->helper('form');
            $this->render('admin/add/tpl_mailbox-compose','admin_master');

        }
        else
        {
       // echo json_encode(array("status" => TRUE));
             // Display Success message
          $this->session->set_flashdata('2flashSuccess', ' Message successfully Sent Thank You.');
          // $this->postal->add($this->ion_auth->messages(),'success');
            redirect('admin/users/compose');
        }
    }


       public function reghod()
    {
        $randid= mt_rand(13, rand(100, 99999990));
        $this->data['page_title'] = 'Create New Hod';
        $this->load->library('form_validation');
          $this->form_validation->set_rules('department_id','department Name','trim|required|required');
       $this->form_validation->set_rules('username','username','trim|required');
        $this->form_validation->set_rules('email','email','trim|required');
          // $this->form_validation->set_rules('groups[]','Groups','required|integer');
        $this->form_validation->set_rules('password','password','required|min_length[6]');
         $this->form_validation->set_rules('password_confirm','Password confirmation','required|matches[password]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if($this->form_validation->run()===FALSE)
        {
          // Display error message
        //  $this->session->set_flashdata('flashError', 'An Error occured '.$this->ion_auth->errors().',Please Try again.');
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
                $this->data['depts'] = $this->Bs_admin_model->get_all_department();
            $this->render('admin/add/tpl_add_hod','admin_master');
        }
        else
        {
           $uid =  $randid;
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
              $group_ids = 4;
             $school_id =  $this->ion_auth->user()->row()->school_id; 
            $department_id   = $this->input->post('department_id');
            $program_type = $this->ion_auth->user()->row()->program_type; 

           $additional = array(  
               'school_id'         => $this->ion_auth->user()->row()->school_id,
                    'program_type'     => $this->ion_auth->user()->row()->program_type,
                      'user_id'           => $randid,
                   'department_id'       => $this->input->post('department_id'),
                    'username'          => $this->input->post('username'),
                     'date'              => gmdate('d-m-Y h:i A'),
                     'time'              => time()
          );
    
            $dataarr = array(  
          'user_id'           =>  $randid,
          'email'           =>  $this->input->post('email'),
             'date'              => gmdate('d-m-Y h:i A')
          );



            // $this->load->model('Bs_admin_model');
                  $id=$this->ion_auth->adminreghod($uid,$username, $password,$email, $school_id, $department_id, $program_type, $additional, $dataarr, $group_ids);
          // $id=$this->Bs_admin_model->addstudent($dataarr);

        if($id!=TRUE){

                // Display error message
         $this->session->set_flashdata('2flashError', 'An Error occured '.$this->ion_auth->errors().',Please Try again.');
         
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('admin/tpl_add_hod','admin_master');

        }
        else
        {
  
             // Display Success message
          $this->session->set_flashdata('2flashSuccess', 'New Lecturer  have successfully added Thank You.');
          // $this->postal->add($this->ion_auth->messages(),'success');
            redirect('admin/users/reghod');
        }
        }  
    }


  public function regsrc()
    {
        $randid= mt_rand(13, rand(100, 99999990));
        $this->data['page_title'] = 'Create New Src';
        $this->load->library('form_validation');
           $this->form_validation->set_rules('username','username','trim|required');
        $this->form_validation->set_rules('email','email','trim|required');
          // $this->form_validation->set_rules('groups[]','Groups','required|integer');
        $this->form_validation->set_rules('password','password','required|min_length[6]');
         $this->form_validation->set_rules('password_confirm','Password confirmation','required|matches[password]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if($this->form_validation->run()===FALSE)
        {
          // Display error message
        //  $this->session->set_flashdata('flashError', 'An Error occured '.$this->ion_auth->errors().',Please Try again.');
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
           $this->render('admin/add/tpl_add_src','admin_master');
        }
        else
        {
           $uid =  $randid;
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
              $group_ids = 6;
             $school_id =  $this->ion_auth->user()->row()->school_id; 
            $department_id   = $this->input->post('department_id');
            $program_type = $this->ion_auth->user()->row()->program_type; 

           $additional = array(  
               'school_id'         => $this->ion_auth->user()->row()->school_id,
                    'program_type'     => $this->ion_auth->user()->row()->program_type,
                     'user_id'           => $randid,
                    'username'          => $this->input->post('username'),
                     'date'              => gmdate('d-m-Y h:i A'),
                     'time'              => time()
    
          );

  
            $dataarr = array(  
          'user_id'           =>  $randid,
          'email'           =>  $this->input->post('email'),
             'date'              => gmdate('d-m-Y h:i A')
          );



            // $this->load->model('Bs_admin_model');
                  $id=$this->ion_auth->adminregsrc($uid,$username, $password,$email, $school_id, $program_type, $additional, $dataarr, $group_ids);
          // $id=$this->Bs_admin_model->addstudent($dataarr);

        if($id!=TRUE){

                // Display error message
         $this->session->set_flashdata('2flashError', 'An Error occured ,Please Try again.');
         
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('admin/tpl_add_src','admin_master');

        }
        else
        {
  
             // Display Success message
          $this->session->set_flashdata('2flashSuccess', 'New Lecturer  have successfully added Thank You.');
          // $this->postal->add($this->ion_auth->messages(),'success');
            redirect('admin/users/regsrc');
        }
        }  
    }

       public function reglib()
    {
        $randid= mt_rand(13, rand(100, 99999990));
        $this->data['page_title'] = 'Create New Librarian';
        $this->load->library('form_validation');
         $this->form_validation->set_rules('username','username','trim|required');
        $this->form_validation->set_rules('email','email','trim|required');
          // $this->form_validation->set_rules('groups[]','Groups','required|integer');
        $this->form_validation->set_rules('password','password','required|min_length[6]');
         $this->form_validation->set_rules('password_confirm','Password confirmation','required|matches[password]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if($this->form_validation->run()===FALSE)
        {
          // Display error message
        //  $this->session->set_flashdata('flashError', 'An Error occured '.$this->ion_auth->errors().',Please Try again.');
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
               $this->render('admin/add/tpl_add_librarian','admin_master');
        }
        else
        {
           $uid =  $randid;
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
              $group_ids = 7;
             $school_id =  $this->ion_auth->user()->row()->school_id; 
            $program_type = $this->ion_auth->user()->row()->program_type; 

           $additional = array(  
               'school_id'         => $this->ion_auth->user()->row()->school_id,
                    'program_type'     => $this->ion_auth->user()->row()->program_type,
                      'user_id'           => $randid,
                     'username'          => $this->input->post('username'),
                     'date'              => gmdate('d-m-Y h:i A'),
                     'time'              => time()
          );
    
            $dataarr = array(  
          'user_id'           =>  $randid,
          'email'           =>  $this->input->post('email'),
             'date'              => gmdate('d-m-Y h:i A')
          );



            // $this->load->model('Bs_admin_model');
                  $id=$this->ion_auth->adminreglib($uid,$username, $password,$email, $school_id, $program_type, $additional, $dataarr, $group_ids);
          // $id=$this->Bs_admin_model->addstudent($dataarr);

        if($id!=TRUE){

                // Display error message
         $this->session->set_flashdata('2flashError', 'An Error occured '.$this->ion_auth->errors().',Please Try again.');
         
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('admin/add/tpl_add_librarian','admin_master');

        }
        else
        {
  
             // Display Success message
          $this->session->set_flashdata('2flashSuccess', 'New Lecturer  have successfully added Thank You.');
          // $this->postal->add($this->ion_auth->messages(),'success');
            redirect('admin/users/reglib');
        }
        }  
    }


  public function pb()
    {
        $randid= mt_rand(13, rand(100, 99999990));
        $this->data['page_title'] = 'Post Board';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title','Title','trim|required|required');
        $this->form_validation->set_rules('new_post','Message','trim|required');
        $this->form_validation->set_rules('program_type','program type','required|integer');
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if($this->form_validation->run()===FALSE)
        {
          // Display error message
        //  $this->session->set_flashdata('flashError', 'An Error occured '.$this->ion_auth->errors().',Please Try again.');
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('admin/add/tpl_post_board','admin_master');
        }
        else
        {
           
      
          $dataarr = array(  
           'post_id' =>   $randid,
           'school_id' => $this->ion_auth->user()->row()->school_id,
             'program_type' => $this->input->post('program_type'),
            'user_id' => $this->ion_auth->user()->row()->uid,
             'type'   => $this->input->post('title'),
             'post'     =>  $this->input->post('new_post'),
             'mode'  => ($this->input->post('mode')=='on')? 1: 0,
             'date'              => gmdate('d-m-Y h:i A'),
            'time'              => time()
          );
            // $this->load->model('Bs_admin_model');
           $id=$this->Bs_admin_model->addannoument($dataarr);
          //  echo json_encode(array("status" => TRUE));
        if($id!=TRUE){

                // Display error message
         $this->session->set_flashdata('showErro', 'An Error occured ,Please Try again.');
         
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('admin/add/tpl_post_board','admin_master');

        }
        else
        {
       // echo json_encode(array("status" => TRUE));
             // Display Success message
          $this->session->set_flashdata('showSucces', ' Announcement  have Been added  successfully Thank You.');
          // $this->postal->add($this->ion_auth->messages(),'success');
            redirect('admin/users/pb');
        }
        }  
    }

  public function adddepartment()
    {
        $randid= mt_rand(13, rand(100, 99999990));
        $this->data['page_title'] = 'Create New Department';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('department','department Name','trim|required|required');
        $this->form_validation->set_rules('description','description','trim|required');
        $this->form_validation->set_rules('program_type','program type','required|integer');
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if($this->form_validation->run()===FALSE)
        {
          // Display error message
        //  $this->session->set_flashdata('flashError', 'An Error occured '.$this->ion_auth->errors().',Please Try again.');
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('admin/add/tpl_add_department','admin_master');
        }
        else
        {
          $dataarr = array(  
           'school_id' =>   $this->ion_auth->user()->row()->school_id,
             'program_type' => $this->input->post('program_type'),
            'department_id' => $randid,
             'department' => $this->input->post('department'),
             'description'      =>  $this->input->post('description'),
             'date'              => gmdate('d-m-Y h:i A')
          );
            // $this->load->model('Bs_admin_model');
           $id=$this->Bs_admin_model->addstudent($dataarr);
          //  echo json_encode(array("status" => TRUE));
        if($id!=TRUE){

                // Display error message
         $this->session->set_flashdata('showErro', 'An Error occured ,Please Try again.');
         
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('admin/add/tpl_add_department','admin_master');

        }
        else
        {
       // echo json_encode(array("status" => TRUE));
             // Display Success message
          $this->session->set_flashdata('showSucces', 'New Department  have successfully added Thank You.');
          // $this->postal->add($this->ion_auth->messages(),'success');
            redirect('admin/users/adddepartment');
        }
        }  
    }
  public function adddepartment2()
    {
        $randid= mt_rand(13, rand(100, 99999990));
        $this->data['page_title'] = 'Create New Department';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('department','department Name','trim|required|required');
        $this->form_validation->set_rules('description','description','trim|required');
        $this->form_validation->set_rules('program_type','program type','required|integer');
            $this->form_validation->set_rules('price','price','required|integer');
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if($this->form_validation->run()===FALSE)
        {
          // Display error message
        //  $this->session->set_flashdata('flashError', 'An Error occured '.$this->ion_auth->errors().',Please Try again.');
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('admin/add/tpl_add_department','admin_master');
        }
        else
        {
          $dataarr = array(  
           'school_id' =>   $this->ion_auth->user()->row()->school_id,
             'program_type' => $this->input->post('program_type'),
            'department_id' => $randid,
             'department' => $this->input->post('department'),
              'price' => $this->input->post('price'),
             'description'      =>  $this->input->post('description'),
             'date'              => gmdate('d-m-Y h:i A')
          );
            // $this->load->model('Bs_admin_model');
           $id=$this->Bs_admin_model->addstudent($dataarr);
          //  echo json_encode(array("status" => TRUE));
        if($id!=TRUE){

                // Display error message
         $this->session->set_flashdata('showErro', 'An Error occured ,Please Try again.');
         
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('admin/add/tpl_add_department','admin_master');

        }
        else
        {
       // echo json_encode(array("status" => TRUE));
             // Display Success message
          $this->session->set_flashdata('showSucces', 'New Department  have successfully added Thank You.');
          // $this->postal->add($this->ion_auth->messages(),'success');
            redirect('admin/users/adddepartment');
        }
        }  
    }

  public function fees()
    {
         $randid= mt_rand(13, rand(100, 99999990));
        $this->data['page_title'] = 'Fees Statement'; 
        $this->load->library('form_validation');
        $this->form_validation->set_rules('transcation_id','Transcation id','trim|required|required');
        $this->form_validation->set_rules('description','description','trim|required');
        $this->form_validation->set_rules('credit','Amount','required|integer');
               $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if($this->form_validation->run()===FALSE)
        {
                  $this->load->helper('form');
            $this->data['viewstudfee'] = $this->Bs_admin_model->get_all_student();
             $this->render('admin/add/tpl_update_fees_statement','admin_master');
       }
        else
        {

          $dataarr = array(  
           'school_id' =>   $this->ion_auth->user()->row()->school_id,
          'user_id' => $this->ion_auth->user()->row()->uid,
        'program_type' => $this->ion_auth->user()->row()->program_type,
         'utid' => 1,
        'transaction_id' =>$this->ion_auth->user()->row()->uid.'/FEES/ADV/'. $this->input->post('transcation_id'),
        'description' => "Draft,Cheque/Transcation/Deposite",
        'credit' => $this->input->post('credit'),
        'date' => gmdate('m-d-Y h:i A')
          );
            // $this->load->model('Bs_admin_model');
           $id=$this->Bs_admin_model->addstudentfee($dataarr);
          //  echo json_encode(array("status" => TRUE));'description' => $this->input->post('description'),"Draft,cheque/transcation/deposite"
        if($id!=TRUE){

    //             // Display error message
         $this->session->set_flashdata('Error', 'An Error occured ,Please Try again.');
         
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->data['viewstudfee'] = $this->Bs_admin_model->get_all_student();
  
             $this->render('admin/add/tpl_update_fees_statement','admin_master'); 

        }
        else
        {
       // echo json_encode(array("status" => TRUE));
             // Display Success message
          $this->session->set_flashdata('Success', 'Account have been credited successfully added Thank You.');
          // $this->postal->add($this->ion_auth->messages(),'success');
            redirect('admin/users/fees');
        }
    }
   } 
  // public    function barGraph(){
  //       $count = $this->Bs_admin_model->count_messages();
  //       $data = array(
  //               array(
  //                   'section'=>'Inbox',
  //                   'messages' => $count['inbox']
  //                   ),
  //               array(
  //                   'section'=>'Sent Items',
  //                   'messages' => $count['sent']
  //                   )
  //           );
  //       //var_dump($data);
  //       echo json_encode($data);
  //   }
   
    
  //  public   function lineGraph(){
  //       $data = array();
  //       for($i=0; $i <= 15; $i++){             
  //           $date = date ( 'Y-m-d', strtotime ( "-$i day" ) );
  //           $count = $this->Bs_admin_model->count_inserted($date);
  //           $data[] = array(
  //                   'period' => $date,
  //                   'inbox' => $count['inbox'],
  //                   'sent' => $count['sent']
  //               );
  //       }
  //        echo json_encode($data); 
  //   }

 function reply(){

        $user_id = $this->input->post('user_id');
        $message = $this->input->post('message', TRUE);
          $id= $this->Message_model->insert_message($user_id, $message);
  echo $this->_get_pchat_messages($user_id);
  
       

//         $msg = $this->Message_model;        
//         $insert['rspo']  = $msg->send_message2();
// $insert['csrf_hash'] = $this->security->get_csrf_hash();

//     $this->ajax->output_ajax($insert);
// if($this->input->is_ajax_request())
// {
//    header("Content-type: application/json; charset=utf-8");
// //   echo json_encode($insert);
// echo json_encode(array("data" => $insert,'csrf_hash'=> $$ajax_data));
// //die; 
// }

  
      //$this->render('admin/tpl_read_message','admin_master'); 
    }

 public function ajax_get_pchat_messages() {
        $pchat_id = $this->input->post('user_id');
        // $pchat_tbl = $this->input->post('pchat_tbl');
        echo $this->_get_pchat_messages($pchat_id);
    }

      public function _get_pchat_messages($pchat_id) {
       // $last_msg_id = (int) $this->session->userdata('last_msg_id_' . $pchat_id);

        $msg_data = $this->Message_model->get_messages2($pchat_id);

        if ($msg_data->num_rows() > 0) {
           // $last_msg_id = $msg_data->row($msg_data->num_rows() - 1)->cont_id;
            //$this->session->set_userdata('last_msg_id_' . $pchat_id, $last_msg_id);

            $msg_html = "<ul>";

            foreach ($msg_data->result() as $pcmsg) {

                $time = $pcmsg->date;

                $li_class = ($this->session->userdata('uid') == $pcmsg->user_to) ? 'class="triangle-isosceles left by_current_user"' : 'class="triangle-isosceles right other_user"';
                $msg_html .= '<li ' . $li_class . '>' . "<span class='msg_header'>" . $this->Message_model->get_username($pcmsg->user_from) . ' on ' . $time . "</span><p class='msg_content'>" . $this->Message_model->string_words($pcmsg->content). "</p></li>";
            }

            $msg_html .= "</ul>";

            $result = array('status' => 'ok', 'content' => $msg_html);
            return json_encode($result);
            exit();
        } else {
            $result = array('status' => 'ok', 'content' => '');
            return json_encode($result);
            exit();
        }
    }
 public function getmessagechatcontent()
  {
    $msg_data= $msg->get_new_messages();  
           if ($msg_data->num_rows() > 0) {
                $msg_html = "<ul>";
                 foreach ($msg_data->result() as $pcmsg) {

                $time = $pcmsg->date;

                $li_class = ($this->session->userdata('uid') == $pcmsg->user_to) ? 'class="triangle-isosceles left by_current_user"' : 'class="triangle-isosceles right other_user"';
                $msg_html .= '<li ' . $li_class . '>' . "<span class='msg_header'>" . $this->Message_model->get_username($pcmsg->user_from) . ' on ' . $time . "</span><p class='msg_content'>" . $this->Message_model->string_words($pcmsg->content). "</p></li>";
            }

            $msg_html .= "</ul>";

            $result = array('status' => 'ok', 'content' => $msg_html);
            return json_encode($result);
            exit();
             // $this->load->view('admin/view/tpl_view_alert_content',$data);   
           }

   
  }


public function post_board()
  {
    $msg_= $this->Message_model->get_post_board();  
 // var_dump($msg_);
           if ($msg_->num_rows() > 0) {
                $msg_html = "<ul>";
                 foreach ($msg_->result() as $pcmsg) {
 //$type=0; 
 $color='';
     // $type = rand(1,6);
      if($pcmsg->type==1)
       $color = 'task-primary';
       if($pcmsg->type==2)
       $color = 'task-success';
       if($pcmsg->type==3)
       $color = 'task-warning';
       if($pcmsg->type==4)
       $color = 'task-danger';
       if($pcmsg->type==5)
       $color = 'task-info';
  $by= $this->ion_auth->get_users_groups()->row()->name; 
    
       
   echo '<div class="task-item '.$color.'">                                    
  <div class="task-text">'.$this->Message_model->html_decode($pcmsg->post).'</div>
     <div class="task-footer">
        <div class="pull-left"><span class="fa fa-clock-o"></span> '.$this->Message_model->time_diff($pcmsg->time).'</div>    
      <div class="pull-right">By:'. $this->Message_model->get_username($pcmsg->user_id).' ['.$by.'] <a href="#"><span class="fa fa-chain"></span></a> <a href="#"><span class="fa fa-comments"></span></a></div>     
          </div>                                    
       </div>';

            }

             // $this->load->view('admin/view/tpl_view_alert_content',$data);   
           }
else{

  echo  '<div class="task-item task-danger">                                    
  <div class="task-text"> Nothing is trending now for '. $this->Message_model->get_school_name($this->ion_auth->user()->row()->school_id).', To create a new post, use the form fields by the left pane. to send notifications all around to your users.</div>
     <div class="task-footer">
           <div class="pull-right">By: [system] </div>     
          </div>                                    
       </div> ';
          // $result = array('status' => 'ok', 'content' => $msg);
          //   return json_encode($result);
          //   exit();
}
   
  }


    public function get_events() 
    {
        // Our Stand and End Dates
        $start = $this->input->get("start");
        $end = $this->input->get("end");

        $startdt = new DateTime('now'); // setup a local datetime
        $startdt->setTimestamp($start); // Set the date based on timestamp
        $format = $startdt->format('Y-m-d H:i:s');

        $enddt = new DateTime('now'); // setup a local datetime
        $enddt->setTimestamp($end); // Set the date based on timestamp
        $format2 = $enddt->format('Y-m-d H:i:s');

        $events = $this->calendar_model->get_events($format, 
            $format2);

        $data_events = array();

        foreach($events->result() as $r) { 

            $data_events[] = array(
                "id" => $r->id,
                "title" => $r->title,
                "description" => $r->description,
                "end" => $r->end,
                "start" => $r->start
            );
        }

        echo json_encode(array("events" => $data_events));
        exit();
    }

    public function add_event() 
    {
        /* Our calendar data */
        $name = $this->input->post("name");
        $desc = $this->input->post("description");
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");

        // if(!empty($start_date)) {
        //     $sd = DateTime::createFromFormat("Y/m/d H:i", $start_date);
        //     $start_date = $sd->format('Y-m-d H:i:s');
        //     $start_date_timestamp = $sd->getTimestamp();
        // } else {
        //     $start_date = date("Y-m-d H:i:s", time());
        //     $start_date_timestamp = time();
        // }

        // if(!empty($end_date)) {
        //     $ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
        //     $end_date = $ed->format('Y-m-d H:i:s');
        //     $end_date_timestamp = $ed->getTimestamp();
        // } else {
        //     $end_date = date("Y-m-d H:i:s", time());
        //     $end_date_timestamp = time();
        // }

        $this->calendar_model->add_event(array(
            "title" => $name,
            "description" => $desc,
            "start" => $start_date,
            "end" => $end_date,
            "allDay" => "false",
            "user_id" => $this->ion_auth->user()->row()->uid,
            "school_id" => $this->ion_auth->user()->row()->school_id
            )
        );
        redirect('admin/users/calendar');
       
    }

    public function edit_event() 
    {
        $eventid = $this->input->post("eventid");
        $event = $this->calendar_model->get_event($eventid);
        if($event->num_rows() == 0) {
            echo"Invalid Event";
            exit();
        }

        $event->row();

        /* Our calendar data */
        $name = $this->input->post("name");
        $desc = $this->input->post("description");
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");
        $delete = $this->input->post("delete");

        if(!$delete) {

            if(!empty($start_date)) {
                $sd = DateTime::createFromFormat("Y/m/d H:i", $start_date);
                $start_date = $this->input->post("start_date");
                $start_date_timestamp = time();
            } else {
                $start_date = date("Y-m-d H:i:s", time());
                $start_date_timestamp = time();
            }

            if(!empty($end_date)) {
                $ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
                $end_date = $this->input->post("end_date");
                $end_date_timestamp = time();
            } else {
                $end_date = date("Y-m-d H:i:s", time());
                $end_date_timestamp = time();
            }

            $this->calendar_model->update_event($eventid, array(
                "title" => $name,
                "description" => $desc,
                "start" => $start_date,
                "end" => $end_date,
                )
            );
            
        } else {
            $this->calendar_model->delete_event($eventid);
        }
 redirect('admin/users/calendar');
    }

  public function calendar()
    {
       $pro = $this->input->post('type');
        $this->data['page_title'] = 'Calendar';   
            $data = $this->Bs_admin_model->calendar($pro);
      if($this->input->is_ajax_request())
{
   header("Content-type: application/json; charset=utf-8");
   echo json_encode($data);
} 
             $this->render('admin/view/tpl_view_calendar','admin_master');

    }

public function readmessage($id)
{
  $msg = $this->Message_model;
        $this->data['id'] = $id;
        $this->data['record'] = $msg->get_messages2($id);  
        if(!$this->data['record']){
            $this->data['nodata'] = TRUE;   
        }
     
         $this->data['page_title'] = 'Read Message';
            $this->data['contacts'] = $msg->get_contacts();
           $this->data['user'] = $this->User_model->user_info();
              $this->data['count_inbox'] = $this->Bs_admin_model->count_inbox();
        $this->data['count_sent'] = $this->Bs_admin_model->count_sent();
           $this->render('admin/view/tpl_read_message','admin_master');  


}
 public function message()
  {
  
    $msg = $this->Message_model;
        
        $this->data['record'] = $msg->get_messages();  
        if(!$this->data['record']){
            $this->data['nodata'] = TRUE;   
        }
     
         $this->data['page_title'] = 'View Message';
            $this->data['contacts'] = $msg->get_contacts();
           $this->data['user'] = $this->User_model->user_info();
         //   $data['count_inbox'] = $this->Bs_admin_model->count_inbox();
        $this->data['count_inbox'] = $this->Bs_admin_model->count_inbox();
        $this->data['count_sent'] = $this->Bs_admin_model->count_sent();
       // echo json_encode($data['count_inbox']);
        $this->render('admin/view/tpl_view_message','admin_master');  
        
  }
 public function getmessageco()
  {
    $msg = $this->Message_model;       
            $data = $this->Bs_admin_model->count_inbox();
      if($this->input->is_ajax_request())
{
   header("Content-type: application/json; charset=utf-8");
   echo json_encode($data);
}     
  }


 public function getmessagechat()
  {
    $msg = $this->Message_model;  
      $data['record']= $msg->get_messages();  
     $this->load->view('admin/view/tpl_view_alert_message',$data);   
  }

 public function message2()
  {
  
    $msg = $this->Message_model;
        
        $this->data['record'] = $msg->get_messages();  
        if(!$this->data['record']){
            $this->data['nodata'] = TRUE;   
        }
     
         $this->data['page_title'] = 'View Message';
            $this->data['contacts'] = $msg->get_contacts();
           $this->data['user'] = $this->User_model->user_info();
        $this->data['count_inbox'] = $this->Bs_admin_model->count_inbox();
        $this->data['count_sent'] = $this->Bs_admin_model->count_sent();
        $this->render('admin/tpl_view_message','admin_master');  
        
  }



  function search(){
        $msg = $this->Message_model;
        $this->data['record'] = $msg->get_all_messages_by_search();
        if(!$this->data['record']){
            $this->data['nosearch'] = TRUE;   
        }
        
         $this->data['page_title'] = 'Search Message';
        $this->data['user'] = $this->User_model->user_info();
        $this->render('admin/tpl_view_message_search','admin_master');  
    }
    
    function read_message(){
        $id = $this->input->post('id');
        $msg = $this->message_model->get_admin_message_by_id($id);
        foreach($msg as $row):
            $receipient = $this->get_username($row->user_to);            
        endforeach;
        $msg[1] = $receipient;
        //$this->load->view('readMessage',$data);
        echo json_encode($msg); 
    }
    
    function delete2(){
        $msg = $this->message_model;        
        $msg->delete_message();
        redirect('messages?delete');
    }
    function get_username($id){
        $username = $this->message_model->get_username($id);
        return $username;
    }
    
    function update(){
        $this->message_model->update_message();
        redirect('messages?update');
    }

      public function logout()
  {
    $id=$this->Bs_admin_model->upstudent($this->ion_auth->user()->row()->id);
      $this->ion_auth->logout();
  redirect('welcome', 'refresh');
  }

 
     public function viewdepartment()
    {
      $this->data['page_title'] = 'View Department';
       $this->data['viewdepartment'] = $this->Bs_admin_model->get_all_department();
  $this->render('admin/view/tpl_view_department','admin_master');  
    }

    public function viewstudent()
    {
      $this->data['page_title'] = 'View Student';
       $this->data['viewstudent'] = $this->Bs_admin_model->get_all_student();
  $this->render('admin/view/tpl_view_student','admin_master');  
    }

    public function viewlecturer()
    {
      $this->data['page_title'] = 'View Lecturer';
       $this->data['viewlecturer'] = $this->Bs_admin_model->get_all_lecturer();
  $this->render('admin/view/tpl_view_lecturer','admin_master');  
    }
  public function viewhod()
    {
      $this->data['page_title'] = 'View Hod';
       $this->data['viewhod'] = $this->Bs_admin_model->get_all_hod();
  $this->render('admin/view/tpl_view_hod','admin_master');  
    }
 public function viewsrc()
    {
      $this->data['page_title'] = 'View Src';
       $this->data['viewsrc'] = $this->Bs_admin_model->get_all_src();
  $this->render('admin/view/tpl_view_src','admin_master');  
    }
     public function viewlib()
    {
      $this->data['page_title'] = 'View Librarian';
       $this->data['viewlib'] = $this->Bs_admin_model->get_all_lib();
  $this->render('admin/view/tpl_view_librarian','admin_master');  
    }
}


