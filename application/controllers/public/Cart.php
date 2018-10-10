<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cart
 *
 * @author kennypc
 */
class Cart extends Public_Controller
{
  function __construct()
  {
    parent::__construct();
    	//$this->load->library('cart');
          // $this->load->model('Welcome_model');
      if(!$this->ion_auth->in_group('members'))
        {
           // $this->postal->add('You are not allowed to visit the Users page','error');
            redirect('admin');
        }
  }
 
//  public function index()
//  {
//       $this->data['products'] = $this->Welcome_model->retrieve_products(); // Retrieve an array with all products
//   // print_r($data['products']); // Print out the array to see if it works (Remove this line when done testing)
//      $this->render('public/view_it_cart');
//    
//    
//  }
function index()
	{
		$this->view_cart();	
	}
	
	/*
	*	Add item to shopping cart
	*/
	function add()
	{
		$product_id = $this->input->post('product_id');
		
		//Check for valid product id
		$query = $this->db->get_where('product',array('product_id'=>$product_id),1);
		if($query->num_rows() > 0)
		{
			$item = $query->row();
			
			$data = array('id' => $item->product_id,
						  'qty' => 1,
						  'price' => $item->product_price,
						  'name' => $item->product_sku .' '.$item->product_description
						  );
			
			$this->cart->insert($data);
		}
		redirect('public/view_cart');
	}
	/*
	*	Delete item from cart
	*/
	function delete()
	{
		$row_id = $this->uri->segment(3,FALSE);
		$data = array('rowid'=>$row_id,
					  'qty' => 0);
		$this->cart->update($data);
		
		redirect('public/view_cart');
	}
	
	/*
	*	Empty cart contents
	*/
	function empty_cart()
	{
		
		$this->cart->destroy();
		redirect('public/view_cart');
	}
	
	/*
	*	Update items in cart
	*/
	function update()
	{
		
		//Get number of items in cart
		$count = $this->cart->total_items();
		
		//Get info from POST
		$item = $this->input->post('rowid');
	    $qty = $this->input->post('qty');
		
		//Step through items
		for($i=0;$i < $count;$i++)
		{
			$data = array(
               'rowid' => $item[$i],
               'qty'   => $qty[$i]
            );
			$this->cart->update($data);
		}
		
		redirect('public/view_cart');
	}
	
	
	/*
	*	Display shopping cart contents
	*/
	function view_cart()
	{
		
		$this->data['custom_jquery'] = '
		$("input[name=\'delete\']").click(function(){
		   var status = $(this).val();
		   location.href = "'.site_url('cart/delete').'/" + status; 
			
})';
		$this->data['page_title'] = 'View Cart';
		//$this->load->view('public/cart/view',$data);
               //   $this->data['products'] = $this->Welcome_model->retrieve_products(); // Retrieve an array with all products
 
      $this->render('public/view');
	}
	
	/*
	*	Display items for sale
	*/
	function view_items()
	{
	
		//Get item from DB
		$query = $this->db->get('product');
		 $this->data['items'] = $query;
		
		 $this->data['page_title'] = 'View Items for Sale';
                     $this->render('public/view_items');
		//$this->load->view('public/view_items',$data);
	}
}
