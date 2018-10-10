<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller
{
 
  function __construct()
  {
    parent::__construct();
    //$this->load->model('Welcome_model');
//     $this->load->model('Category_model');
  }
	public function index()
	{
           // $this->data['sector'] = $this->Welcome_model->get_all_sector();
            // $this->data['gen_prod'] = $this->Welcome_model->get_all_gen_product();
               // $this->load->helper('url');
//                 $this->load->helper('directory');
//                 $dir= "files/product/";
//                $this->data['map']= directory_map($dir);
//            $this->data['sector']= $this->Sector_model->with('category')->get_all();
//             $this->data['category']= $this->Category_model->with('sector')->get($this->data['sector']->sector_id);
		  $this->render('welcome_message');
	}
}
