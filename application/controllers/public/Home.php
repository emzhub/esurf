<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Home extends Public_Controller
{
 
  function __construct()
  {
    parent::__construct();
       //$this->load->model('Welcome_model');
  }
 
  public function index()
  {
//        $this->data['sector'] = $this->Welcome_model->get_all_sector();
//             $this->data['gen_prod'] = $this->Welcome_model->get_all_gen_product();
           $this->load->helper('url');
  $this->render('public/home_view');
  }
  
  
  
  
  
}
