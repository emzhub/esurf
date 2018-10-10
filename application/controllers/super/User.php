<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends Super_Controller
{
  function __construct()
  {
    parent::__construct();
       $this->load->model('Message_model');
    $this->load->model('Welcome_model');
    $this->load->library('ion_auth');
     $this->load->library('session');
     if(!$this->ion_auth->in_group('super'))
        {
            $this->postal->add('You are not allowed to visit the Users page','error');
               redirect('public/user/logout', 'refresh');
        }

        $this->data['avatar'] = $this->Welcome_model->get_user_avatar();
       $this->data['recordb'] = $this->Message_model->get_new_messages();
  }
 
  public function index()
  {
  }

public function vs()
{
  $this->data['page_title'] = 'View All Register Schools';
       $this->data['school'] = $this->Welcome_model->get_all_school();
  $this->render('super/tpl_view_school','super_master');

}

// public function ac($cat)
// {
//   // $this->data['page_title'] = 'View All Register Schools';
//        $this->data['schl'] = $this->Welcome_model->get_all_school($cat);
//   // $this->render('super/tpl_view_school','super_master');

// }


    
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
else{
    redirect('public/user/logout', 'refresh');
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
        $this->session->set_flashdata('message',$this->ion_auth->errors());
        redirect('public/user/login', 'refresh');
      }
    }
  }
 $this->load->helper('form');
  $this->render('public/login_view','gen_master');
  
  
  
}

 public function Adsc()
    {
//$this->load->model('Welcome_model');
     $randid= mt_rand(13, rand(100, 99999990));
        $this->data['page_title'] = 'Create New School';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('school_name','School Name','trim|required|min_length[5]|required');
        $this->form_validation->set_rules('school_abrv','School Abbreviation','trim|required');
      //  $this->form_validation->set_rules('company','Company','trim');
        $this->form_validation->set_rules('school_location','School Location','trim|required');
      //  $this->form_validation->set_rules('school_type','School Type','trim|required|xss_clean');
        $this->form_validation->set_rules('school_population','School Population','trim|required');
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if($this->form_validation->run()===FALSE)
        {
          // Display error message
        //  $this->session->set_flashdata('flashError', 'An Error occured '.$this->ion_auth->errors().',Please Try again.');
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('super/tpl_add_school','super_master');
        }
        else
        {
          $dataarr = array(  
           'school_id' =>  $randid,
            'school_name' => $this->input->post('school_name'),
            'school_abrv' => $this->input->post('school_abrv'),
             'school_type' => $this->input->post('school_type'),
            'school_location' => $this->input->post('school_location'),
             'school_population' => $this->input->post('school_population'),
             'bsc_id'      =>  $this->input->post('bsc_id'),
              'ms_id'      =>  $this->input->post('ms_id'),
             'BSCandMASTER'  =>  $this->input->post('BSCandMASTER'),
             'date'              => gmdate('d-m-Y h:i A')
          );
            // $this->load->model('Welcome_model');
           $id=$this->Welcome_model->addschool($dataarr);
 // var_dump($dataarr);
        if($id!=TRUE){
// $this->db->error();
                // Display error message
         $this->session->set_flashdata('flashError', 'An Error occured ,Please Try again.');
         
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('super/tpl_add_school','super_master');

        }
        else
        {
        //   $this->Welcome_model->addschool($data_arr);
            //$this->session->set_flashdata('message',$this->ion_auth->messages());
             // Display Success message
          echo "<script>alert('Form Submitted Successfully....!!!! ');</script>";
          $this->session->set_flashdata('flashSuccess', 'New School  have successfully added '.$this->ion_auth->messages().',Thank You.');
          // $this->postal->add($this->ion_auth->messages(),'success');
            redirect('super/user/Adsc');
        }
        }
    }
  public function logout()
  {
        $id=$this->Welcome_model->upstudent($this->ion_auth->user()->row()->id);
      $this->ion_auth->logout();
    // redirect('welcome', 'refresh');
  redirect('public/user/login', 'refresh');
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

public function adn()
    {
//$this->load->model('Welcome_model');
     $randid= mt_rand(13, rand(100, 99999990));
        $this->data['page_title'] = 'New School Admin';
        $this->load->library('form_validation');
       $this->form_validation->set_rules('username','username','trim|required');
        $this->form_validation->set_rules('email','email','trim|required');
          // $this->form_validation->set_rules('groups[]','Groups','required|integer');
        $this->form_validation->set_rules('password','password','required|min_length[6]');
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        if($this->form_validation->run()===FALSE)
        {
          // Display error message
        //  $this->session->set_flashdata('flashError', 'An Error occured '.$this->ion_auth->errors().',Please Try again.');
            $this->data['groups'] = $this->ion_auth->groups()->result();
              $this->data['school'] = $this->Welcome_model->get_all_school();
            $this->load->helper('form');
            $this->render('super/tpl_add_account','super_master');
        }
        else
        {
            $uid =  $randid;
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
              $group_ids = 1;
             $school_id =  $this->input->post('school_id');
            $department_id   = 0;
            $program_type = $this->input->post('program_type');

          $additional = array(  
           'school_id' =>   $school_id,
            'program_type' => $program_type,
            'uid'           =>  $randid,
            'username' => $username,
             'date'              => gmdate('d-m-Y h:i A'),
             'time'              => time()
          );
          $dataarr = array(  
          'user_id'           =>  $randid,
             'date'              => gmdate('d-m-Y h:i A')
          );
            // $this->load->model('Welcome_model');
           $id=$this->ion_auth->reg($uid,$username, $password,$email, $school_id, $department_id, $program_type, $additional, $dataarr, $group_ids);
 // var_dump($dataarr);
        if($id!=TRUE){
// $this->db->error();
                // Display error message
         $this->session->set_flashdata('showError', 'An Error occured '.$this->ion_auth->errors().',Please Try again.');
       //   $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            //$this->data['groups'] = $this->ion_auth->groups()->result();
            $this->load->helper('form');
            $this->render('super/tpl_add_account','super_master');

        }
        else
        {
        //   $this->Welcome_model->addschool($data_arr);
            //$this->session->set_flashdata('message',$this->ion_auth->messages());
             // Display Success message
          $this->session->set_flashdata('showSuccess', 'New School  have successfully added '.$this->ion_auth->messages().',Thank You.');
          // $this->postal->add($this->ion_auth->messages(),'success');
            redirect('super/user/adn');
        }
        }
    }


    public function acc()
    {
  $this->data['page_title'] = 'View All Admin Register Schools';
       $this->data['admin'] = $this->Welcome_model->get_all_school_admin();
  $this->render('super/tpl_view_account','super_master');
    }

public function delacc($id)
{
  $this->Welcome_model->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
}

public function getdeprt()
{
  $r=$this->input->post('city');
   $y=$this->Welcome_model->get_id($r);
     echo json_encode($y);
}

}
