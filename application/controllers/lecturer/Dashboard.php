<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard extends Lecturer_Controller
{
 
  function __construct()
  {
    parent::__construct();
     $this->load->model('Message_model');
            $this->load->model('Welcome_model');
        $this->load->library('session');
    $this->load->library('ion_auth');
     if(!$this->ion_auth->in_group('lecturer'))
        {
           // $this->postal->add('You are not allowed to visit the Users page','error');
               redirect('public/user/logout', 'refresh');
        }
    $this->data['sch'] = $this->Welcome_model->get_user_schabr();
    $this->data['avatar'] = $this->Welcome_model->get_user_avatar();
     $this->data['recordb'] = $this->Message_model->get_new_messages();
  }
 
  public function index()
  {
  	  $this->data['page_title'] = 'Dashboard';
  // $this->data['users'] = $this->ion_auth->users()->result();
  	       $this->data['sch'] = $this->Welcome_model->get_user_schabr();
        $this->data['avatar'] = $this->Welcome_model->get_user_avatar();
  $this->render('lecturer/dashboard_view');
  }
  
}