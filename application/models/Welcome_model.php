<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Welcome_model
 *
 * @author kennypc
 */
class Welcome_model extends MY_Model {
    //put your code here
    
	function __construct()
    {

       
        parent::__construct();
    }

      function get_user_avatar()
    {
    //$ur= $this->ion_auth->users()->result();
    //$user_id = $this->ion_auth->get_us_id() ;
    // $user_id = $this->session->userdata('user_id') ;
     $ur= $this->ion_auth->user()->row()->uid;
       $this->db->select("*");
    $this->db->from("es_avatar");
     $this->db->where("user_id", $ur);
    $q = $this->db->get();
    $result = $q->result();
       if ($q->num_rows() > 0) {
        return $result;
    }
    else{
        $error='img/avatar/default_ava.gif';
        return FALSE;
    }
    }
        function get_all_gen_product()
    {
            
            $this->db->limit("1");
       $this->db->select("*");
    $this->db->from("artist_avatar_product");
    $q = $this->db->get();

    $final = array();
    if ($q->num_rows() > 0) {
        foreach ($q->result() as $row) {
  $this->db->order_by('id', 'DESC');
            $this->db->select("*");
            $this->db->from("artist_product_post");
            $this->db->where("post_title", $row->category_id);
            $q = $this->db->get();
            if ($q->num_rows() > 0) {
                $row->children = $q->result();
            }
            array_push($final, $row);
        }
    }
    return $final;
//       if(isset($where)){
//           $this->db->where($where);
//       } 
//       $query = $this->db->get('sectors');
//       if($query->num_rows()>0)
//       {
//           return $query->result();
//       }
//       return FALSE;
//          $this->db->select('*');
//        $this->db->from('sectors');
       // $this->db->join('categories','sectors.sector_id = categories.sector_id', 'left');
//        $query =$this->db->get();
//        $result = $query->result();
//        return $result;
    }
    
    function get_all_sector()
    {
       $this->db->select("*");
    $this->db->from("sectors");
    $q = $this->db->get();

    $final = array();
    if ($q->num_rows() > 0) {
        foreach ($q->result() as $row) {

            $this->db->select("*");
            $this->db->from("categories");
            $this->db->where("sector_id", $row->sector_id);
            $q = $this->db->get();
            if ($q->num_rows() > 0) {
                $row->children = $q->result();
            }
            array_push($final, $row);
        }
    }
    return $final;
//       if(isset($where)){
//           $this->db->where($where);
//       } 
//       $query = $this->db->get('sectors');
//       if($query->num_rows()>0)
//       {
//           return $query->result();
//       }
//       return FALSE;
//          $this->db->select('*');
//        $this->db->from('sectors');
       // $this->db->join('categories','sectors.sector_id = categories.sector_id', 'left');
//        $query =$this->db->get();
//        $result = $query->result();
//        return $result;
    }
    
 
    
    function get_item_avatar($category_id= NULL,$sec_id= NULL)
    {
              
         $this->db->limit("1");
       $this->db->select("*");
    $this->db->from("artist_avatar_product");
    $this->db->where("category_id", $category_id,"sector_id", $sec_id);
    $q = $this->db->get();
$result = $q->result();
        return $result;
      }
    
     function get_item_color($category_id= NULL,$sec_id= NULL,$post_id= NULL)
    {         
          $this->db->select("*");
    $this->db->from("artist_product_color");
 $this->db->where("post_title", $category_id);
  $this->db->where("post_content", $sec_id);
   $this->db->where("post_id", $post_id);
    $q = $this->db->get();
$result = $q->result();
        return $result;
      }
      
    function get_item_product($post_id= NULL)
    {
          $this->db->limit("1");
       $this->db->select("*");
    $this->db->from("artist_product_post");
    $this->db->where("post_id", $post_id);
    $q = $this->db->get();
$result = $q->result();
        return $result;
    }
        function get_product($category_id= NULL,$sec_id= NULL,$post_id= NULL)
    {
              
         $this->db->limit("1");
       $this->db->select("*");
    $this->db->from("artist_product_post");
    $this->db->where("post_content", $sec_id);
     $this->db->where("post_title", $category_id);
     $this->db->where("post_id", $post_id);
    $q = $this->db->get();
$result = $q->result();
        return $result;
      }
  
    
         // Function to retrieve an array with all product information
        function retrieve_products(){
            $query = $this->db->get('products'); // Select the table products
            return $query->result_array(); // Return the results in a array.
        } 
    
// Add an item to the cart
function validate_add_cart_item(){
     
    $id = $this->input->post('product_id'); // Assign posted product_id to $id
    $cty = $this->input->post('quantity'); // Assign posted quantity to $cty
     
    $this->db->where('id', $id); // Select where id matches the posted id
    $query = $this->db->get('products', 1); // Select the products where a match is found and limit the query by 1
     
    // Check if a row has matched our product id
    if($query->num_rows > 0){
     
    // We have a match!
        foreach ($query->result() as $row)
        {
            // Create an array with product information
            $data = array(
                'id'      => $id,
                'qty'     => $cty,
                'price'   => $row->price,
                'name'    => $row->name
            );
 
            // Add the data to the cart using the insert function that is available because we loaded the cart library
            $this->cart->insert($data); 
             
            return TRUE; // Finally return TRUE
        }
     
    }else{
        // Nothing found! Return FALSE! 
        return FALSE;
    }
}
 

 function addschool($dataarr){
{
 $this->db->insert('es_schools',$dataarr);

$re = $this->db->insert_id();

}
return $re;
//$this->db->_error_number();
 //  return $idOfInsertedData = $this->db->insert_id();
// $error = $this->db->error();
// if (isset($error['message'])) {
//     return $error['message'];
// }
}

  function get_all_school()
    {
              
        // $this->db->limit("1");
       $this->db->select("*");
    $this->db->from("es_schools");
    //$this->db->where("category_id", $category_id,"sector_id", $sec_id);
    $q = $this->db->get();
$result = $q->result();
        return $result;
      }
function get_all_school_admin()
{
     $this->db->select("*");
    $this->db->from("es_admin");
    //$this->db->where("category_id", $category_id,"sector_id", $sec_id);
    $q = $this->db->get();
  $final = array();
    if ($q->num_rows() > 0) {
        foreach ($q->result() as $row) {

            $this->db->select("*");
            $this->db->from("es_schools");
            $this->db->where("school_id", $row->school_id);
            $q = $this->db->get();
            if ($q->num_rows() > 0) {
                $row->children = $q->result();
            }
            array_push($final, $row);
        }
    }

    return $final;
}

  public function delete_by_id($id)
  {
     $this->db->select("*");
    $this->db->from("users");
    $this->db->where("uid", $id);
        $q = $this->db->get();
          foreach ($q->result() as $row) {
             $this->db->where('uid', $row->id);
    $this->db->delete('users_groups');
                }
    $tabs = array('es_admin','users');
    $this->db->where('uid', $id);
    $this->db->delete($tabs);
  }
    function get_user_schabr()
    {
             $ur= $this->ion_auth->user()->row()->school_id;    
         $this->db->limit("1");
       $this->db->select("*");
    $this->db->from("es_schools");
    $this->db->where("school_id", $ur);
    $q = $this->db->get();
$result = $q->result();
        return $result;
      }
    function get_id($ur)
    {
            //$ur= $this->ion_auth->user()->row()->school_id;    
         //$this->db->limit("1");
       $this->db->select("*");
    $this->db->from("es_schools");
    $this->db->where("school_id", $ur);
    $q = $this->db->get();
$result = $q->result();
        return $result;
      }

       function upstudent($d){
        $user_id = $d;
        $data = array(
                'status' => 0
            );
        $this->db->where('id',$user_id);
        $this->db->update('users',$data);        
    }

}
