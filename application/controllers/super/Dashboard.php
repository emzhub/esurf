<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard extends Super_Controller
{
 
  function __construct()
  {
    parent::__construct();
       $this->load->model('Message_model');
        $this->load->model('Welcome_model');
        $this->load->library('session');
    $this->load->library('ion_auth');
     if(!$this->ion_auth->in_group('super'))
        {
           // $this->postal->add('You are not allowed to visit the Users page','error');
               redirect('public/user/logout', 'refresh');
        }
           $this->data['avatar'] = $this->Welcome_model->get_user_avatar();
   $this->data['recordb'] = $this->Message_model->get_new_messages();
  }
 
  public function index()
  {

   $this->data['page_title'] = 'Dashboard';
  // $this->data['users'] = $this->ion_auth->users()->result();
     
         // $this->data['it'] = $this->Welcome_model->get_product($cat_id,$sec_id,$post_id);
         // $this->data['avatar'] = $this->Welcome_model->get_item_avatar($cat_id,$sec_id);
      $this->render('super/dashboard_view');
  }
   public function logout()
  {
        $id=$this->Welcome_model->upstudent($this->ion_auth->user()->row()->id);
      $this->ion_auth->logout();
     redirect('welcome', 'refresh');
  //redirect('public/user/login', 'refresh');
  }
}
