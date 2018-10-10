<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class MY_Controller extends CI_Controller
{
  protected $data = array();
  function __construct()
  {
    parent::__construct();
    $this->data['page_title'] = 'E-surf';
    $this->data['before_head'] = '';
    $this->data['before_body'] ='';
  }
 
  protected function render($the_view = NULL, $template = 'master')
  {
    if($template == 'json' || $this->input->is_ajax_request())
    {
      header('Content-Type: application/json');
      echo json_encode($this->data);
    }
    else
    {
        
      $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view,$this->data, TRUE);
      $this->load->view('templates/'.$template.'_view', $this->data);
    }
  }
}
 
class Super_Controller extends MY_Controller
{
 
  function __construct()
  {
    parent::__construct();
       $this->load->library('ion_auth');
    if (!$this->ion_auth->logged_in())
    {
      //redirect them to the login page
      redirect('public/user/login', 'refresh');
    }
        elseif (!$this->ion_auth->in_group('super')) {
      redirect('public/user/logout', 'refresh');
}

 $this->data['current_user'] = $this->ion_auth->user()->row();
    $this->data['current_user_menu'] = '';
    if($this->ion_auth->in_group('super'))
    {
      $this->data['current_user_menu'] = $this->load->view('templates/_parts/super_menu_super_view.php', NULL, TRUE);
    }
    $this->data['page_title'] = 'E-surf - Dashboard';
  }
 
  protected function render($the_view = NULL, $template = 'super_master')
  {
    parent::render($the_view, $template);
  }
}


class Admin_Controller extends MY_Controller
{
 
  function __construct()
  {
    parent::__construct();
       $this->load->library('ion_auth');
    if (!$this->ion_auth->logged_in())
    {
      //redirect them to the login page
      redirect('admin/user/login', 'refresh');
    }
        elseif (!$this->ion_auth->is_admin()) {
      redirect('public/user/logout', 'refresh');
}

 $this->data['current_user'] = $this->ion_auth->user()->row();
    $this->data['current_user_menu'] = '';
    if($this->ion_auth->in_group('admin'))
    {
      $this->data['current_user_menu'] = $this->load->view('templates/_parts/user_menu_admin_view.php', NULL, TRUE);
    }
    $this->data['page_title'] = 'E-surf - Dashboard';
  }
 
  protected function render($the_view = NULL, $template = 'admin_master')
  {
    parent::render($the_view, $template);
  }
}
 
class Public_Controller extends MY_Controller
{
 
  function __construct()
  {
    parent::__construct();
       $this->load->library('ion_auth');
    if (!$this->ion_auth->logged_in())
    {
      //redirect them to the login page
      redirect('public/user/login', 'refresh');
    }
    elseif ($this->ion_auth->is_admin()) {
      redirect('admin/dashboard/', 'refresh');
}
  $this->data['current_user'] = $this->ion_auth->user()->row();
    $this->data['current_user_menu'] = '';
    if($this->ion_auth->in_group('members'))
    {
      $this->data['current_user_menu'] = $this->load->view('templates/_parts/user_menu_public_view.php', NULL, TRUE);
    }
    $this->data['page_title'] = 'E-surf - Dashboard';
  }
 
  protected function render($the_view = NULL, $template = 'public_master')
  {
    parent::render($the_view, $template);
  }
}


class Hod_Controller extends MY_Controller
{
 
  function __construct()
  {
    parent::__construct();
       $this->load->library('ion_auth');
    if (!$this->ion_auth->logged_in())
    {
      //redirect them to the login page
      redirect('public/user/login', 'refresh');
    }
//     elseif ($this->ion_auth->is_admin()) {
//       redirect('admin/dashboard/', 'refresh');
// }
  $this->data['current_user'] = $this->ion_auth->user()->row();
    $this->data['current_user_menu'] = '';
    if($this->ion_auth->in_group('hod'))
    {
      $this->data['current_user_menu'] = $this->load->view('templates/_parts/hod_menu_public_view.php', NULL, TRUE);
    }
    $this->data['page_title'] = 'E-surf - Dashboard';
  }
 
  protected function render($the_view = NULL, $template = 'hod_master')
  {
    parent::render($the_view, $template);
  }
}

class Lecturer_Controller extends MY_Controller
{
 
  function __construct()
  {
    parent::__construct();
       $this->load->library('ion_auth');
    if (!$this->ion_auth->logged_in())
    {
      //redirect them to the login page
      redirect('public/user/login', 'refresh');
    }
//     elseif ($this->ion_auth->is_admin()) {
//       redirect('admin/dashboard/', 'refresh');
// }
  $this->data['current_user'] = $this->ion_auth->user()->row();
    $this->data['current_user_menu'] = '';
    if($this->ion_auth->in_group('lecturer'))
    {
      $this->data['current_user_menu'] = $this->load->view('templates/_parts/lecturer_menu_public_view.php', NULL, TRUE);
    }
    $this->data['page_title'] = 'E-surf - Dashboard';
  }
 
  protected function render($the_view = NULL, $template = 'lecturer_master')
  {
    parent::render($the_view, $template);
  }
}


class Gen_Controller extends MY_Controller
{
 
  function __construct()
  {
    parent::__construct();
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
    $this->data['page_title'] = 'E-surf - Welcome';
  }
 
  protected function render($the_view = NULL, $template = 'gen_master')
  {
    parent::render($the_view, $template);
  }
}
