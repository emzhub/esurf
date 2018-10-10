<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends MY_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth');
  }
 
  public function index()
  {
  }
 
  public function login()
{
 
           $this->load->library('ion_auth');
   if($this->ion_auth->in_group('super'))
{
  //redirect them to the login page
  redirect('super/dashboard/', 'refresh');
}
    elseif ($this->ion_auth->in_group('admin')) {
      redirect('admin/dashboard/', 'refresh');
}
    elseif ($this->ion_auth->in_group('student')) {
      redirect('student/dashboard/', 'refresh');
}
    elseif ($this->ion_auth->in_group('hod')) {
      redirect('hod/dashboard/', 'refresh');
}
    elseif ($this->ion_auth->in_group('lecturer')) {
      redirect('lecturer/dashboard/', 'refresh');
}
    elseif ($this->ion_auth->in_group('src')) {
      redirect('src/dashboard/', 'refresh');
}
    elseif ($this->ion_auth->in_group('librarian')) {
      redirect('librarian/dashboard/', 'refresh');
}


  $this->data['page_title'] = 'Login';
  if($this->input->post())
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('identity', 'Identity', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('remember','Remember me','integer');
    if($this->form_validation->run()===TRUE)
    {
      $remember = (bool) $this->input->post('remember');
      if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
      {
        //redirect('public', 'refresh');
          if($this->ion_auth->in_group('admin') )
    {
      //$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
      redirect('admin','refresh');
    }
        elseif($this->ion_auth->in_group('super') )
    {
      //$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
      redirect('super/dashboard/','refresh');
    }
        elseif($this->ion_auth->in_group('student'))
    {
      //$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
      redirect('student','refresh');
    }
        elseif($this->ion_auth->in_group('hod'))
    {
      //$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
      redirect('hod','refresh');
    }
        elseif($this->ion_auth->in_group('lecturer'))
    {
      //$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
      redirect('lecturer','refresh');
    }
        elseif($this->ion_auth->in_group('src'))
    {
      //$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
      redirect('src','refresh');
    }
        elseif($this->ion_auth->in_group('librarian'))
    {
      //$this->session->set_flashdata('message','You are not allowed to visit the Groups page');
      redirect('librarian','refresh');
    }
      }
     
      else
      {
        $this->session->set_flashdata('loginError', 'An Error occured,'.$this->ion_auth->errors().' ');
       // $this->session->set_flashdata('message',$this->ion_auth->errors());
        redirect('public/user/login', 'refresh');
      }
    }
  }
 $this->load->helper('form');
  $this->render('public/login_view','master');
  
  
  
}

 public function create()
    {
     $randid= mt_rand(13, rand(100, 99999990));
        $this->data['page_title'] = 'Create user';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name','First name','trim');
        $this->form_validation->set_rules('last_name','Last name','trim');
      //  $this->form_validation->set_rules('company','Company','trim');
        $this->form_validation->set_rules('phone','Phone','trim');
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','required|min_length[6]');
        $this->form_validation->set_rules('password_confirm','Password confirmation','required|matches[password]');
        $this->form_validation->set_rules('groups','Groups','required|integer');

        if($this->form_validation->run()===FALSE)
        {
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('public/create_view','public_master');
        }
        else
        {
             $user_id =  $randid;
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $group_ids = $this->input->post('groups');

            $additional_data = array(
                'user_id' =>  $randid,
                'firstname' => $this->input->post('first_name'),
                'lastname'  => $this->input->post('last_name'),
               'email'    => $this->input->post('email'),
                 'gender'    => $this->input->post('gender'),
                'country_id'      => $this->input->post('country'),
                  'state_id'    => $this->input->post('state'),
                'dob'      => $this->input->post('day'). '-' .$this->input->post('month'). '-' .$this->input->post('year'),
                'Address'      => $this->input->post('Address'),
                'phone_number'      => $this->input->post('phone'),
                 'terms' => $this->input->post('Terms'),
                        'date' => gmdate('d-m-Y h:i A'),
                        'time' => time()
            );
            $this->ion_auth->register($user_id,$username, $password, $email, $additional_data, $group_ids);
            $this->session->set_flashdata('message',$this->ion_auth->messages());
           //$this->postal->add($this->ion_auth->messages(),'success');
            redirect('public/user/login');
        }
    }

  // forgot password
  public function forgot_password()
  {
     // $this->data['page_title'] = 'Edit user';
        $this->load->library('form_validation');
    // setting validation rules by checking whether identity is username or email
    if($this->config->item('identity', 'ion_auth') != 'email' )
    {
       $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
    }
    else
    {
       $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
    }


    if ($this->form_validation->run() == false)
    {
      $this->data['type'] = $this->config->item('identity','ion_auth');
      // setup the input
      $this->data['identity'] = array('name' => 'identity',
        'id' => 'identity',
      );

      if ( $this->config->item('identity', 'ion_auth') != 'email' ){
        $this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
      }
      else
      {
        $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
      }

      // set any errors and display the form
      $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
      $this->load->view('auth/forgot_password', $this->data);
    }
    else
    {
      $identity_column = $this->config->item('identity','ion_auth');
      $identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

      if(empty($identity)) {

                  if($this->config->item('identity', 'ion_auth') != 'email')
                  {
                    $this->ion_auth->set_error('forgot_password_identity_not_found');
                  }
                  else
                  {
                     $this->ion_auth->set_error('forgot_password_email_not_found');
                  }

                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    redirect("auth/forgot_password", 'refresh');
                }

      // run the forgotten password method to email an activation code to the user
      $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

      if ($forgotten)
      {
        // if there were no errors
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect("public/user/login", 'refresh'); //we should display a confirmation page here instead of the login page
      }
      else
      {
        $this->session->set_flashdata('message', $this->ion_auth->errors());
        redirect("auth/forgot_password", 'refresh');
      }
    }
  }

  public function logout()
  {
      $this->ion_auth->logout();
     redirect('welcome', 'refresh');
  //redirect('public/user/login', 'refresh');
  }
  public function profile()
{
  if(!$this->ion_auth->logged_in())
  {
    redirect('admin');
  }
  $this->data['page_title'] = 'User Profile';
  $user = $this->ion_auth->user()->row();
  $this->data['user'] = $user;
  $this->data['current_user_menu'] = '';
  if($this->ion_auth->in_group('admin'))
  {
    $this->data['current_user_menu'] = $this->load->view('templates/_parts/user_menu_admin_view.php', NULL, TRUE);
  }
 
  $this->load->library('form_validation');
  $this->form_validation->set_rules('first_name','First name','trim');
  $this->form_validation->set_rules('last_name','Last name','trim');
  $this->form_validation->set_rules('company','Company','trim');
  $this->form_validation->set_rules('phone','Phone','trim');
 
  if($this->form_validation->run()===FALSE)
  {
    $this->render('admin/user/profile_view','admin_master');
  }
  else
  {
    $new_data = array(
      'first_name' => $this->input->post('first_name'),
      'last_name' => $this->input->post('last_name'),
      'company' => $this->input->post('company'),
      'phone' => $this->input->post('phone')
    );
    if(strlen($this->input->post('password'))>=6) $new_data['password'] = $this->input->post('password');
    $this->ion_auth->update($user->id, $new_data);
 
    $this->session->set_flashdata('message', $this->ion_auth->messages());
redirect('admin/user/profile','refresh');
  }
}
}
