<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Client
 *
 * @author kennypc
 */
class Client extends Public_Controller {
    //put your code here
     function __construct()
    {
        parent::__construct();
            $this->load->model('Welcome_model');
        if(!$this->ion_auth->in_group('members'))
        {
           // $this->postal->add('You are not allowed to visit the Users page','error');
            redirect('admin');
        }
    }

    public function index($group_id = NULL)
    {
//        $this->data['page_title'] = 'Users';
//       $this->data['users'] = $this->ion_auth->users($group_id)->result();
//        //$this->data['users'] = $this->ion_auth->users(array(1,'members'))->result();
//        $this->render('admin/users/index_view');
	}
        
        
         
          public function viewt($cat_id = NULL,$sec_id = NULL,$post_id = NULL)
    {
       //$data = array('cat_id'=>$cat_id,'sec_id'=>$sec_id,'post_id'=>$post_id );
       //var_dump($data);
       $this->data['page_title'] = 'View Product';
        $this->data['color'] = $this->Welcome_model->get_item_color($cat_id,$sec_id,$post_id);
         $this->data['it'] = $this->Welcome_model->get_product($cat_id,$sec_id,$post_id);
         $this->data['avatar'] = $this->Welcome_model->get_item_avatar($cat_id,$sec_id);
      $this->render('public/view_it_product');

      
    }
      public function view($cat_id = NULL,$sec_id = NULL,$post_id = NULL)
    {
       //$data = array('cat_id'=>$cat_id,'sec_id'=>$sec_id,'post_id'=>$post_id );
       //var_dump($data);
       $this->data['page_title'] = 'View Product';
        $this->data['color'] = $this->Welcome_model->get_item_color($cat_id,$sec_id,$post_id);
         $this->data['item'] = $this->Welcome_model->get_item_product($post_id);
         $this->data['avatar'] = $this->Welcome_model->get_item_avatar($cat_id,$sec_id);
      $this->render('public/view_product');

      
    }
      public function views($cat_id = NULL,$sec_id = NULL)
    {
      
       $this->data['page_title'] = 'View All Product';
               $this->data['sector'] = $this->Welcome_model->get_all_sector();
        $this->data['product'] = $this->Welcome_model->get_pro_product($cat_id,$sec_id);
      $this->render('public/view_all_product');

      
    }
   // start here 
    public function update_profile()
    {
       $this->render('public/view_profile');  
    }
    
}
