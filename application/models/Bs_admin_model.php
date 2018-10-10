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
class Bs_admin_model extends MY_Model {
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
    
   function addstudent($data)
  {
    
    $this->db->insert('es_department', $data);
    return $this->db->insert_id();
  }
    
 function addstudentfee($data)
    {

        $this->db->insert('es_fees_statement',$data);
      $t= $this->db->insert_id();
       if($t==TRUE){

      $n =2;
      $sc=$this->ion_auth->user()->row()->school_id;
      $pt=$this->ion_auth->user()->row()->program_type;
      
       $this->db->select("*");
    $this->db->from("es_fees_statement");
     $this->db->where("user_id", $this->input->post('cid'));
  $this->db->where("school_id", $sc);
   $this->db->where("program_type", $pt);
    $q = $this->db->get();
    if ($q->num_rows() > 0) {
  foreach($q->result() as $cs){
     $new_credit = $cs->credit;
      $new_dues = $cs->dues;
   
        }
            $newpay=$department_price-$new_credit; 
  $rec = array(
              'school_id' =>   $this->ion_auth->user()->row()->school_id,
          'user_id' => $this->ion_auth->user()->row()->uid,
        'program_type' => $this->ion_auth->user()->row()->program_type,
         'utid' => 2,
        'transaction_id' =>$this->ion_auth->user()->row()->uid.'/FEES/ADV/'. $this->input->post('transcation_id'),
        'description' => 'Student Fees Charged To Register For A Program', 
         'debit' => $new_credit,
        'dues' => $newpay,
        'date' => gmdate('m-d-Y h:i A')
            );
               $this->db->insert('es_fees_statement',$rec);

}
       }

//      $this->db->select("*");
//     $this->db->from("es_fees_statement");
//      $this->db->where("user_id", $this->input->post('cid'));
//   $this->db->where("school_id", $sc);
//    $this->db->where("program_type", $pt);
//    $this->db->where("utid", $n);
//   $w = $this->db->result();
//   foreach($w as $cs){
//     $new_credit = $cs->debit;
//     $new_dues = $cs->dues;
//     $ti= $cs->transaction_id;
//     $id= $cs->id;  
//         }
//   $credi=$new_credit+$money;      
//   $newpay=$department_price-$credi;
//           $rec = array(
//                'debit' => $credi,
//         'dues' => $newpay,
//         'date' => gmdate('m-d-Y h:i A')
//             );
//               $this->db->where('id', $id);
//         $this->db->update('es_fees_statement', $rec); 
//    //  return TRUE;
//     }
// else{

//    $q = $this->db
//               ->select("*")
//                     ->where("user_id", $this->input->post('cid'))
//                     ->where("school_id", $sc)
//                     ->where("program_type", $pt)
//                     ->get('es_fees_statement')
//                     ->result();

  //    $this->db->select("*");
  //   $this->db->from("es_fees_statement");
  //    $this->db->where("user_id", $this->input->post('cid'));
  // $this->db->where("school_id", $sc);
  //  $this->db->where("program_type", $pt);
 // $w = $this->db->get();
  // foreach($q as $cs){
  //    $new_credit = $cs->credit;
  //     $new_dues = $cs->dues;
   
  //       }
  //  $rec = array(
  //             'school_id' =>   $this->ion_auth->user()->row()->school_id,
  //         'user_id' => $this->ion_auth->user()->row()->uid,
  //       'program_type' => $this->ion_auth->user()->row()->program_type,
  //        'utid' => 2,
  //       'transaction_id' =>$this->ion_auth->user()->row()->uid.'/FEES/ADV/'. $this->input->post('transcation_id'),
  //       'description' => 'Student Fees Charged To Register For A Program', 
  //        'debit' => $new_credit,
  //       'dues' => $newpay,
  //       'date' => gmdate('m-d-Y h:i A')
  //           );
  //              $this->db->insert('es_fees_statement',$rec);

  // //  return FALSE;

  //   }
    
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
 
function Assigned_course()
{
    $randid= mt_rand(13, rand(100, 99999990));
   foreach($this->input->post('lecturer') as $key => $lecturer_id){
         //echo 'Key:'.$key.' -> '.$lecturer.'<br/>';
        foreach($this->input->post('course') as $k => $courses_id){
      $sql = 'DELETE FROM es_course_assign WHERE lecturer_id='.$lecturer_id.' AND course_id='.$courses_id.'&& program_type='.$this->ion_auth->user()->row()->program_type.'  AND school_id='. $this->ion_auth->user()->row()->school_id.' '; 
       $this->db->query($sql);
 
 
  // Create an array with product information
            $data = array(
         'course_assign_id'   =>   $randid,
        'school_id'          => $this->ion_auth->user()->row()->school_id, 
        'program_type'   => $this->ion_auth->user()->row()->program_type,
        'lecturer_id'        => $lecturer_id,
        'course_id'          => $courses_id,
        'department_id'      => $this->ion_auth->user()->row()->department_id,
        'course_assigner_id' =>  $this->session->userdata('uid'),
        'date'               => gmdate('m-d-Y h:i A')
            );
 
  $dataarr = array(
           'user_id'      => $lecturer_id,
                 'type'         => 'Course Assigned',
                 'notification' => 'You have been assigned some course(s). Kindly Check your courses Catalog to verify',
                 'status'        =>0 ,
                 'date'          => gmdate('m-d-Y h:i A'),
                 'time'          => time()
            );

            // Add the data to the cart using the insert function that is available because we loaded the cart library
           $this->db->insert('es_course_assign',$data);
 
            // Add the data to the cart using the insert function that is available because we loaded the cart library
           $this->db->insert('es_notification',$dataarr);
$re = $this->db->insert_id();


         }
       }
       return $re;
}

function Assigned_student_course()
{


  $dept_id            = $this->ion_auth->user()->row()->department_id;//
  $course_registered_id   = mt_rand(13, rand(100, 99999990)); // random id
  $registra_id        = $this->session->userdata('uid');;//hod that assigned the course
  $school_id          = $this->ion_auth->user()->row()->school_id;
  $course             = $this->input->post('s_course');
  //$json =array();
  
  if($this->input->post('s_option') == 1){
        foreach($this->input->post('student_id') as $k => $student_id){
        //delete old record first, then add new one
            $sqlb = 'DELETE FROM es_course_registered_students WHERE course_id='.$course.' AND department_id='.$dept_id.'&& program_type='.$this->ion_auth->user()->row()->program_type.' AND student_id='.$student_id.' AND school_id='. $this->ion_auth->user()->row()->school_id.' '; 
       $this->db->query($sqlb);
         $data = array(
        'course_registered_id'   => $course_registered_id,
        'course_id'              => $course,
        'school_id'              => $school_id,
        'program_type'   => $this->ion_auth->user()->row()->program_type,
     'student_id'             => $student_id,
        'department_id'          => $dept_id,
        'semester'               => $this->Message_model->get_courses_id_semester($course ) ,
        'registra_id'            => $registra_id,
        'date'                   => gmdate('m-d-Y h:i A'),
        'time'                   => time()
            );
 $dataarr = array(
           'user_id'      => $student_id,
                 'type'         => 'Course Assigned',
                 'notification' => 'You have been registered to '. $this->Message_model->get_courses_id_name($course ).' course for Semester [ '. $this->Message_model->get_courses_id_semester($course ).' ]',
                 'status'        =>0 ,
                 'date'          => gmdate('m-d-Y h:i A'),
                 'time'          => time()
            );

        $daar = array(
                 'status'    =>0,
                'student_id'      =>  $student_id
            ); 
              
            // Add the data to the cart using the insert function that is available because we loaded the cart library
           $this->db->insert('es_course_grade',$daar);


            // Add the data to the cart using the insert function that is available because we loaded the cart library
           $this->db->insert('es_notification',$dataarr);

   $this->db->insert('es_course_registered_students',$data);
$re = $this->db->insert_id();


}
 return $re;
}


  if($this->input->post('s_option') == 2){
        foreach($this->input->post('student_id') as $k => $student_id){
        //delete old record first, then add new one
            $sqlvb = 'DELETE FROM es_course_registered_students WHERE course_id='.$course.' AND department_id='.$dept_id.'&& program_type='.$this->ion_auth->user()->row()->program_type.' AND student_id='.$student_id.' AND school_id='. $this->ion_auth->user()->row()->school_id.' '; 
       $this->db->query($sqlvb);
     //     $data = array(
     //    'course_registered_id'   => $course_registered_id,
     //    'course_id'              => $course,
     //    'school_id'              => $school_id,
     //    'program_type'   => $this->ion_auth->user()->row()->program_type,
     // 'student_id'             => $student_id,
     //    'department_id'          => $dept_id,
     //    'semester'               => $this->Message_model->get_courses_id_semester($course ) ,
     //    'registra_id'            => $registra_id,
     //    'date'                   => gmdate('m-d-Y h:i A'),
     //    'time'                   => time()
     //        );
 $dataarr = array(
           'user_id'      => $student_id,
                 'type'         => 'Course(s) De-Registered',
                 'notification' => 'You have been de - registered from '. $this->Message_model->get_courses_id_name($course ).' course for Semester [ '. $this->Message_model->get_courses_id_semester($course ).' ]',
                 'status'        =>0 ,
                 'date'          => gmdate('m-d-Y h:i A'),
                 'time'          => time()
            );

        // $daar = array(
        //          'status'    =>0,
        //         'student_id'      =>  $student_id
        //     ); 
              
            // Add the data to the cart using the insert function that is available because we loaded the cart library
           // $this->db->insert('es_course_grade',$daar);


            // Add the data to the cart using the insert function that is available because we loaded the cart library
           $this->db->insert('es_notification',$dataarr);

   // $this->db->insert('es_course_registered_students',$data);
$re = $this->db->insert_id();


}
 return $re;
}

}




 function addannoument($dataarr){
{
 $this->db->insert('es_post_board',$dataarr);

$re = $this->db->insert_id();

}
return $re;
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

 function hodregcourse($dataarr){
{
 $this->db->insert('es_course',$dataarr);

$re = $this->db->insert_id();

}
return $re;
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

function delete_lecturer($id)
{
  $this->db
                    ->where('id',$id)
                    ->delete('es_course_assign'); 
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

function get_all_assigned_course()
{
       $ur= $this->ion_auth->user()->row()->school_id; 
                $pr= $this->ion_auth->user()->row()->program_type; 
                $this->db->order_by('id', 'DESC');
            $this->db->select("*");
             $this->db->from("es_course_assign"); // Select the table products
           // return $query->result_array(); // Return the results in a array.
               $this->db->where("school_id", $ur);
               $this->db->where("program_type", $pr);
              $q = $this->db->get();
              $result = $q->result();
               return $result;
}

         // Function to retrieve an array with all product information
        function get_all_department(){
             $ur= $this->ion_auth->user()->row()->school_id; 
                $pr= $this->ion_auth->user()->row()->program_type; 
                $this->db->order_by('id', 'DESC');
            $this->db->select("*");
             $this->db->from("es_department"); // Select the table products
           // return $query->result_array(); // Return the results in a array.
               $this->db->where("school_id", $ur);
               $this->db->where("program_type", $pr);
              $q = $this->db->get();
              $result = $q->result();
               return $result;
        }

    


             // Function to retrieve an array with all product information
        function get_department(){
             $ur= $this->ion_auth->user()->row()->school_id; 
                $pr= $this->ion_auth->user()->row()->program_type; 
                $this->db->order_by('id', 'DESC');
            $this->db->select("*");
             $this->db->from("es_department"); // Select the table products
           // return $query->result_array(); // Return the results in a array.
               $this->db->where("school_id", $ur);
               $this->db->where("program_type", $pr);
              $q = $this->db->get();
              $result = $q->result();
               return $result;
        } 
          function get_all_depart_course(){
            $dp=$this->ion_auth->user()->row()->department_id;
             $ur= $this->ion_auth->user()->row()->school_id; 
                $pr= $this->ion_auth->user()->row()->program_type; 
                $this->db->order_by('id', 'DESC');
            $this->db->select("*");
             $this->db->from("es_course"); // Select the table products
         $this->db->where("department_id", $dp);
               $this->db->where("school_id", $ur);
               $this->db->where("program_type", $pr);
              $q = $this->db->get();
              $result = $q->result();
               return $result;
        }
  function get_all_course(){
             $ur= $this->ion_auth->user()->row()->school_id; 
                $pr= $this->ion_auth->user()->row()->program_type; 
                $this->db->order_by('course', 'DESC');
            $this->db->select("*");
             $this->db->from("es_course"); // Select the table products
           // return $query->result_array(); // Return the results in a array.
               $this->db->where("school_id", $ur);
               $this->db->where("program_type", $pr);
              $q = $this->db->get();
              $result = $q->result();
               return $result;
        } 
function get_all_users_same_school()
{
                $dr= $this->ion_auth->user()->row()->department_id; 
                $ur= $this->ion_auth->user()->row()->school_id; 
                $pr= $this->ion_auth->user()->row()->program_type; 
                $this->db->order_by('username', 'DESC');
            $this->db->select("*");
             $this->db->from("users"); // Select the table products
              // $this->db->where("department_id", $dr);
               $this->db->where("school_id", $ur);
               $this->db->where("program_type", $pr);
              $q = $this->db->get();
              $result = $q->result();
               return $result;

}
       // Function to retrieve an array with all product information
        function get_all_department2(){
          // $dr= $this->ion_auth->user()->row()->department_id;
             $ur= $this->ion_auth->user()->row()->school_id; 
              $pr= $this->ion_auth->user()->row()->program_type; 
              $this->db->order_by('id', 'DESC');
               $this->db->select("*");
              $this->db->from("es_department");
               $this->db->where("school_id", $ur);
               $this->db->where("program_type", $pr);
    $q = $this->db->get();

    $final = array();
    if ($q->num_rows() > 0) {
        foreach ($q->result() as $row) {
              $this->db->select("*");
             $this->db->from("users"); // Select the table products
               $this->db->where("department_id", $row->department_id);
               $this->db->where("school_id", $row->school_id);
               $this->db->where("program_type", $row->program_type);
                  $q = $this->db->get();
            if ($q->num_rows() > 0) {
                $row->children = $q->result();
            }
            array_push($final, $row);
        }
    }
    return $final;
             } 
               // Function to retrieve an array with all product information
        // function get_all_department2(){
        //      $ur= $this->ion_auth->user()->row()->school_id; 
        //         $pr= $this->ion_auth->user()->row()->program_type; 
        //         $this->db->order_by('id', 'DESC');
        //     $this->db->select("*");
        //      $this->db->from("es_department"); // Select the table products
        //    // return $query->result_array(); // Return the results in a array.
        //        $this->db->where("school_id", $ur);
        //        $this->db->where("program_type", $pr);
        //       $q = $this->db->get();
        //       $result = $q->result_array();
        //        return $result;
        // }

    function get_all_lecture(){
             $ur= $this->ion_auth->user()->row()->school_id; 
                $pr= $this->ion_auth->user()->row()->program_type; 
                $this->db->order_by('username', 'DESC');
            $this->db->select("*");
             $this->db->from("es_lecturer"); // Select the table products
           // return $query->result_array(); // Return the results in a array.
               $this->db->where("school_id", $ur);
               $this->db->where("program_type", $pr);
              $q = $this->db->get();
              $result = $q->result();
               return $result;
        } 
   


                   


           function get_all_course_assign_by_search(){         
   foreach($this->input->post('lecturer') as $key => $lecturer_id){
         //echo 'Key:'.$key.' -> '.$lecturer.'<br/>';
        foreach($this->input->post('course') as $k => $courses_id){
      $sql = 'SELECT * FROM es_course_assign WHERE lecturer_id='.$lecturer_id.' AND course_id='.$courses_id.'&& program_type='.$this->ion_auth->user()->row()->program_type.' '; 
        $count =$this->db->query($sql);
    return $count;
         }
       }
    




          //    $cur=implode(",",$this->input->post('course')); 
          //       $ur=implode(",",$this->input->post('lecturer')); 
          //       $pr= $this->ion_auth->user()->row()->program_type; 

          //        $this->db->select("*");
          //    $this->db->from("es_course_assign"); // Select the table products
          // $this->db->where("course_id", $cur);
          //      $this->db->where("lecturer_id", $ur);
          //      $this->db->where("program_type", $pr);
          //     $q = $this->db->get();
          //     $result = $q->result();
          //      return $result;
                           
        }
// function update($data,$id)
// {
//     try{
//         $this->db->where('id',$id);
//         $this->db->update('class', $data);
//         return true;
//     }
//     catch(Execption $e){
//         echo $e->getMessage();
//     }

// }

           function get_all_coursev(){
             $ur= $this->ion_auth->user()->row()->school_id; 
                $pr= $this->ion_auth->user()->row()->program_type; 
                $this->db->order_by('course', 'DESC');
            $this->db->select("*");
             $this->db->from("es_course"); // Select the table products
           // return $query->result_array(); // Return the results in a array.
               $this->db->where("school_id", $ur);
               $this->db->where("program_type", $pr);
              $q = $this->db->get();
              $result = $q->result();
               return $result;
        } 
      // Function to retrieve an array with all product information
        function get_all_student(){
             $ur= $this->ion_auth->user()->row()->school_id; 
              $pr= $this->ion_auth->user()->row()->program_type; 
              $this->db->order_by('id', 'DESC');
               $this->db->select("*");
              $this->db->from("es_students");
               $this->db->where("school_id", $ur);
               $this->db->where("program_type", $pr);
    $q = $this->db->get();

    $final = array();
    if ($q->num_rows() > 0) {
        foreach ($q->result() as $row) {

            $this->db->select("*");
            $this->db->from("profile");
            $this->db->where("user_id", $row->user_id);
            $q = $this->db->get();
            if ($q->num_rows() > 0) {
                $row->children = $q->result();
            }
            array_push($final, $row);
        }
    }
    return $final;
             } 

               // Function to retrieve an array with all product information
        function get_all_lecturer(){
             $ur= $this->ion_auth->user()->row()->school_id; 
              $pr= $this->ion_auth->user()->row()->program_type; 
              $this->db->order_by('id', 'DESC');
               $this->db->select("*");
              $this->db->from("es_lecturer");
               $this->db->where("school_id", $ur);
               $this->db->where("program_type", $pr);
    $q = $this->db->get();

    $final = array();
    if ($q->num_rows() > 0) {
        foreach ($q->result() as $row) {

            $this->db->select("*");
            $this->db->from("profile");
            $this->db->where("user_id", $row->user_id);
            $q = $this->db->get();
            if ($q->num_rows() > 0) {
                $row->children = $q->result();
            }
            array_push($final, $row);
        }
    }
    return $final;
             } 


               // Function to retrieve an array with all product information
        function get_all_hod()
        {
             $ur= $this->ion_auth->user()->row()->school_id; 
              $pr= $this->ion_auth->user()->row()->program_type; 
              $this->db->select("*");
              $this->db->from("es_hod");
     $this->db->join('es_department','es_department.department_id = es_hod.department_id');
    $this->db->join('profile','profile.user_id = es_hod.user_id');
  $this->db->where("es_hod.school_id", $ur);
  $this->db->where("es_hod.program_type", $pr);
  $q = $this->db->get();
if ($q->num_rows() > 0) {
return $q->result_array();
}
else{
  return FALSE;
}
  
             }


               // Function to retrieve an array with all product information
        function get_all_lib(){
             $ur= $this->ion_auth->user()->row()->school_id; 
              $pr= $this->ion_auth->user()->row()->program_type; 
              $this->db->order_by('id', 'DESC');
               $this->db->select("*");
              $this->db->from("es_librarian");
               $this->db->where("school_id", $ur);
               $this->db->where("program_type", $pr);
    $q = $this->db->get();

    $final = array();
    if ($q->num_rows() > 0) {
        foreach ($q->result() as $row) {

            $this->db->select("*");
            $this->db->from("profile");
            $this->db->where("user_id", $row->user_id);
            $q = $this->db->get();
            if ($q->num_rows() > 0) {
                $row->children = $q->result();
            }
            array_push($final, $row);
        }
    }
    return $final;
             } 



               // Function to retrieve an array with all product information
        function get_all_src(){
             $ur= $this->ion_auth->user()->row()->school_id; 
              $pr= $this->ion_auth->user()->row()->program_type; 
              $this->db->order_by('id', 'DESC');
               $this->db->select("*");
              $this->db->from("es_src");
               $this->db->where("school_id", $ur);
               $this->db->where("program_type", $pr);
    $q = $this->db->get();

    $final = array();
    if ($q->num_rows() > 0) {
        foreach ($q->result() as $row) {

            $this->db->select("*");
            $this->db->from("profile");
            $this->db->where("user_id", $row->user_id);
            $q = $this->db->get();
            if ($q->num_rows() > 0) {
                $row->children = $q->result();
            }
            array_push($final, $row);
        }
    }
    return $final;
             } 


 function count_admin(){
        $id = $this->ion_auth->user()->row()->school_id;
        $py=$this->ion_auth->user()->row()->program_type; 
        $q = "select * from es_admin where school_id=$id AND program_type=$py";
        $rs = $this->db->query($q);
        return $rs->num_rows();
    }
    
    function count_hod(){
          $id = $this->ion_auth->user()->row()->school_id;
        $py=$this->ion_auth->user()->row()->program_type; 
        $q = "select * from es_hod where school_id=$id AND program_type=$py";
        $rs = $this->db->query($q);
        return $rs->num_rows();
    }

 function count_lecturer(){
        $id = $this->ion_auth->user()->row()->school_id;
        $py=$this->ion_auth->user()->row()->program_type; 
        $q = "select * from es_lecturer where school_id=$id AND program_type=$py";
        $rs = $this->db->query($q);
        return $rs->num_rows();
    }
    
    function count_src(){
          $id = $this->ion_auth->user()->row()->school_id;
        $py=$this->ion_auth->user()->row()->program_type; 
        $q = "select * from es_src where school_id=$id AND program_type=$py";
        $rs = $this->db->query($q);
        return $rs->num_rows();
    }

 function count_student(){
        $id = $this->ion_auth->user()->row()->school_id;
        $py=$this->ion_auth->user()->row()->program_type; 
        $q = "select * from es_students where school_id=$id AND program_type=$py";
        $rs = $this->db->query($q);
        return $rs->num_rows();
    }
    
    function count_librarians(){
          $id = $this->ion_auth->user()->row()->school_id;
        $py=$this->ion_auth->user()->row()->program_type; 
        $q = "select * from es_librarian where school_id=$id AND program_type=$py";
        $rs = $this->db->query($q);
        return $rs->num_rows();
    }

 function count_inbox(){
        $id = $this->session->userdata('uid');
        $q = "select * from es_message where user_to=$id AND status='unread'";
        $rs = $this->db->query($q);
        return $rs->num_rows();
    }
    
    function count_sent(){
        $id = $this->session->userdata('uid');
        $q = "select * from es_message_sent where user_from=$id";
        $rs = $this->db->query($q);
        return $rs->num_rows();
    }
    
    function count_messages(){
            $id = $this->session->userdata('uid');
            $data['inbox'] = $this->db
                    ->where('user_to',$id)
                    ->count_all_results('es_message');
            $data['sent'] = $this->db
                    ->where('user_from',$id)
                    ->count_all_results('es_message_sent');            
            return $data;
        }
    
    function count_inserted($date){
            $id = $this->session->userdata('uid');
            $data['inbox'] = $this->db
                   ->where('user_to',$id)
                    ->like('date',$date,'both')
                    ->count_all_results('es_message');
            
            $data['sent'] = $this->db
                    ->where('user_from',$id)
                    ->like('date',$date,'both')
                    ->count_all_results('es_message_sent');

            return $data;
        }

  function user_info(){
        $user_id = $this->session->userdata('user_id');
        $q = $this->db
                    ->where('user_id',$user_id)
                    ->get('tbl_user');
        return $q->result();
    }
    
    function get_user_info(){
        $user_id = $this->input->post('id');
        $q = $this->db
                    ->select('DATE_FORMAT(date_created,"%b %d %Y %h:%i %p") as date_created,id_no,user_id,username')
                    ->where('user_id',$user_id)
                    ->get('tbl_user');
        return $q->result();
    }
    
    function get_contacts(){
        $id = $this->session->userdata('uid');
        $q = $this->db
                ->where('uid!=',$id)
                ->get('users')->result();
        return $q;
    }
    function get_all_users(){
        $id = $this->session->userdata('user_id');
        $q = $this->db
                    ->where('user_id!=',$id)
                    ->order_by('username','asc')
                    ->get('tbl_user')                    
                    ->result();
        return $q;
    }
    

    // function get_all_department_lecture(){
    //     $dr= $this->ion_auth->user()->row()->department_id; 
    //          $ur= $this->ion_auth->user()->row()->school_id; 
    //             $pr= $this->ion_auth->user()->row()->program_type; 
    //             $this->db->order_by('username', 'DESC');
    //         $this->db->select("*");
    //          $this->db->from("es_lecturer"); // Select the table products
    //            $this->db->where("department_id", $dr);
    //            $this->db->where("school_id", $ur);
    //            $this->db->where("program_type", $pr);
    //           $q = $this->db->get();
    //           $result = $q->result();
    //            return $result;
    //     } 
    
    function get_users_by_search(){
        $keyword = $this->input->post('keyword');
        $id = $this->session->userdata('user_id');
        $q = 'SELECT * FROM tbl_user WHERE user_id!='.$id.'
            AND (
                id_no LIKE "%'.$keyword.'%"
                OR username LIKE "%'.$keyword.'%"
            )
            ORDER BY username ASC
        ';
        $q = $this->db->query($q)->result();
        return $q;
    }
    
    
    function check_id($id){
        $user_id = $this->input->post('user_id');
        $q = $this->db->where('id_no',$id)
                      ->where('user_id!=',$user_id)
                      ->get('tbl_user');
        if($q->num_rows() > 0){
            return true;   
        }else{
            return false;   
        }
    }
    
    function check_username($username){
        $user_id = $this->input->post('user_id');
        $q = $this->db->where('username',$username)
                      ->where('user_id!=',$user_id)
                      ->get('tbl_user');
        if($q->num_rows() > 0){
            return true;   
        }else{
            return false;   
        }
    }
    
    function update_user(){
        $user_id = $this->input->post('user_id');
        $data = array(
                'id_no' => $this->input->post('id_no'),
                'username' => $this->input->post('username')
            );
        $password = $this->input->post('password');
        if($password):
            $data['password'] = $password; 
        endif;
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_user',$data);        
    }

       function upstudent($d){
        $user_id = $d;
        $data = array(
                'status' => 0
            );
        $this->db->where('id',$user_id);
        $this->db->update('users',$data);        
    }
    
    function delete_user(){
        $ids = $this->input->post('user_id');
        $c = count($ids);
        for($i=0; $i < $c; $i++){
            $user_id = $ids[$i];   
            $this->db
                    ->where('user_id',$user_id)
                    ->delete('tbl_user'); 
        }
        
    }

function calendar(){

  $type = $this->input->post('type');

if($type == 'new'){
  
  $startdate =  $this->input->post('startdate').'+'. $this->input->post('zone');
  $title = $this->input->post('title'); 
       $school_id= $this->ion_auth->user()->row()->school_id; 
     $user_id= $this->session->userdata('uid');
  $insert = $this->db->query( "INSERT INTO es_calendar(`title`, `startdate`, `enddate`, `allDay`,`user_id`,`school_id`) VALUES('$title','$startdate','$startdate','false','$user_id','$school_id')");
  
  $t='New Calendar Event';
  $n='A new event has been added to the calender. You can visit your calendar to check<br/> Start Date: '.$startdate;
  $d=gmdate('m-d-Y h:i A');
  $time=time();
  
  $query = $this->db->query( "SELECT * FROM users WHERE school_id=$school_id");
  foreach ($query->result_array() as $fetch) {
  $users_id = $fetch['uid'];
  
  //mysqli_query($con,"INSERT INTO es_notification(`user_id`, `type`, `notification`, `status`,`date`,`time`) VALUES('$users_id','$t','$n',0,'$d','$time')");

  }
            
    $lastid = $this->db->insert_id();
  echo json_encode(array('status'=>'success','eventid'=>$lastid));
}

if($type == 'changetitle')
{
  $school_id= $this->ion_auth->user()->row()->school_id; 
  $eventid = $this->input->post('eventid');
  $title = $this->input->post('title');
  $update = $this->db->query("UPDATE es_calendar SET title='$title' where id='$eventid'");
  
  $t='Calendar Event Updated';
  $n='A calendar event has been updated. You can visit your calendar to check
     <br/> Title: '.$title;
  $d=gmdate('m-d-Y h:i A');
  $time=time();
  
  $query =$this->db->query( "SELECT * FROM users WHERE school_id=$school_id");
   foreach ($query->result_array() as $fetch) {
  $users_id = $fetch['uid'];
  
  //mysqli_query($con,"INSERT INTO es_notification(`user_id`, `type`, `notification`, `status`,`date`,`time`) VALUES('$users_id','$t','$n',0,'$d','$time')");
  
  }
  
  if($update)
    echo json_encode(array('status'=>'success'));
  else
    echo json_encode(array('status'=>'failed'));
}

if($type == 'resetdate')
{
  $title = $this->input->post('title');
  $startdate = $this->input->post('start');
  $enddate = $this->input->post('end');
  $eventid = $this->input->post('eventid');
  $update = $this->db->query("UPDATE es_calendar SET title='$title', startdate = '$startdate', enddate = '$enddate' where id='$eventid'");
  
  $t='Calendar Event Updated';
  $n='A calendar event has been updated. You can visit your calendar to check
     <br/> Title: '.$title.'
     <br/> New Start Date: '.$startdate.'
     <br/> New End Date:m'.$enddate;
  $d=gmdate('m-d-Y h:i A');
  $time=time();
  
  $sr = $this->db->query( "SELECT * FROM es_users WHERE school_id=$school_id");
  foreach ($sr->result_array() as $fetch) 
  $users_id = $fetch['user_id'];
  
$this->db->query("INSERT INTO es_notification(`user_id`, `type`, `notification`, `status`,`date`,`time`) VALUES('$users_id','$t','$n',0,'$d','$time')");
    if($update)
    echo json_encode(array('status'=>'success'));
  else
    echo json_encode(array('status'=>'failed'));
  }



if($type == 'remove')
{
  $eventid =  $this->input->post('eventid');
  $delete = $this->db->query("DELETE FROM es_calendar where id='$eventid'");
  if($delete)
    echo json_encode(array('status'=>'success'));
  else
    echo json_encode(array('status'=>'failed'));
}

if($type == 'fetch')
{
  $events = array();
 // $query = "SELECT * FROM es_calendar";
   $sr=$this->db->query("SELECT * FROM es_calendar");
   foreach ($sr->result_array() as $fetch) 
  //while($fetch = $sr->result_array())
  {
  $e = array();
    $e['id'] = $fetch['id'];
    $e['title'] = stripslashes($fetch['title']);
    $e['start'] = $fetch['startdate'];
    $e['end'] = $fetch['enddate'];

    $allday = ($fetch['allDay'] == "true") ? true : false;
    $e['allDay'] = $allday;

   // array_push($events, $e);
   $events[] = $e;
  }
  echo json_encode($events);
}

}

          // Function to retrieve an array with all product information
        function get_user_department($id){
             $ur= $this->ion_auth->user()->row()->school_id; 
                $pr= $this->ion_auth->user()->row()->program_type; 
                $this->db->order_by('id', 'DESC');
            $this->db->select("*");
             $this->db->from("es_department"); // Select the table products
           $this->db->where("department_id", $id);
               $this->db->where("school_id", $ur);
               $this->db->where("program_type", $pr);
              $q = $this->db->get();
              $result = $q->result();
              foreach($result as $row){
            return $row->department;   
        }
        } 
    function get_users_id($id){
        
        $q = $this->db
                ->where('user_id=',$id)
                ->get(' users_groups')->result();
       foreach($q as $row){
            return $row->group_id;   
        }
    }
function get_group_name($id){
       $group='';
       if($id > 0){
      switch($id){
         case 1:
          $group= 'Administrator';
          break;
          case 2:
          $group= 'Student';
          break;
          case 3:
          $group= 'Super Admin';
          break;
          case 4:
          $group= 'hod';
          break;
          case 5:
          $group= 'Teachers';
          break;
          case 6:
          $group= 'Src';
          break;
           case 7:
          $group= 'Librarian';
          break;
          }
        return $group;
       }
      return false;
     }




}
