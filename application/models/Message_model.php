<?php

class Message_model  extends MY_Model {
    //put your code here
    
    function __construct()
    {

       
        parent::__construct();
    }
    public $total_unread;
    public $total_sent;
    public $total_trash;

	function get_contacts(){
        $id = $this->session->userdata('uid');
        $q = $this->db
                ->where('uid!=',$id)
                ->get('users')->result();
        return $q;
    }


    function insert_message($user_id, $message) {
        $ur= $this->session->userdata('uid');
             $data = array(
                'date' => date('Y-m-d G:i:s'),
                'user_from' =>  $ur,
                'user_to' => $user_id,
                'content' => $message,
                'location' => 'inbox',
                'status' => 'unread'
            );
        $this->db->insert('es_message',$data);
        return $this->db->insert_id();
    }

//    function send_message2(){
//    $fr=$this->input->post('send_from');    
//    $ur= $this->session->userdata('uid');
//  $dataw = array(
//        'msid' => $this->input->post('message_id'),
//              'date' => date('Y-m-d G:i:s'),
//                 'user_from' =>  $this->input->post('send_from'),
//                 'user_to' => $this->input->post('send_to'),
//                 'content' => $this->input->post('message'),
//                 'location' => 'inbox',
//                 'status' => 'unread'   
//             );  
//                  $data = array(
//                 'date' => date('Y-m-d G:i:s'),
//                 'user_from' =>  $this->input->post('send_from'),
//                 'user_to' => $this->input->post('send_to'),
//                 'content' => $this->input->post('message'),
//                 'location' => 'inbox',
//                 'status' => 'unread'
//             );
//                          $data2 = array(
//              'msid' => $this->input->post('message_id'),
//                 'date' => date('Y-m-d G:i:s'),
//                 'user_from' =>  $this->input->post('send_from'),
//                 'user_to' => $this->input->post('send_to'),
//                 'content' => $this->input->post('message'),
//                 'location' => 'inbox',
//                 'status' => 'unread'
                 
//             );
//  //        $this->db->select("*");
//  // $this->db->where("user_from", $fr);
//  //     $this->db->where("user_to", $ur);
//  // $this->db->from("es_new_message");
//  //   $q = $this->db->get();
//  //       if ($q->num_rows > 0) {
 
//  //       $post = $this->input->post('message_id');

//  //        $message_id = $post;
//  //      $this->db->where("user_from", $fr);
//  //     $this->db->where("user_to", $ur);
//  //        $this->db->update('es_new_message', $data2); 

//  //         $this->db->insert('es_message',$data);
//  //        $this->db->insert('es_message_sent',$data);
//  //        return TRUE;
//  //    // return $this->db->insert_id();
//  //       }
//        //else{
//        //   return false;      
//         $this->db->insert('es_message',$data);
//         $this->db->insert('es_message_sent',$data);      
//         $this->db->insert('es_new_message',$dataw);
// //return TRUE;
//       // }





//     //    $this->db->select("*");
//     // $this->db->from("es_new_message");
//     //    $this->db->where("user_from", $fr);
//     //  $this->db->where("user_to", $ur);
//     // $q = $this->db->get();
//     //    if ($q->num_rows() > 0) {
   
//     // }
//     // else{
           
//     // }


//        return $this->db->insert_id();
//        // return TRUE;
//     }

   function html_decode($data){
  return html_entity_decode($data);   
   }
   
  function html_encode($data){
  return htmlentities($data,ENT_COMPAT);   
   }

      function send_message_a(){
             foreach($this->input->post('to_id') as $k => $student_id){
        $data = array(
                'date' => date('Y-m-d G:i:s'),
                'user_from' => $this->session->userdata('uid'),
                'user_to' => $student_id,
                'subject' => $this->input->post('subject'),
                'content' => $this->input->post('content'),
                'location' => 'inbox',
                'status' => 'unread'
            );        
        $this->db->insert('es_message',$data);
        $this->db->insert('es_message_sent',$data);
        $re = $this->db->insert_id();
      }
        return $re;
    }
 

       function send_message(){
       
        $data = array(
                'date' => date('Y-m-d G:i:s'),
                'user_from' => $this->session->userdata('uid'),
                'user_to' => $this->input->post('send_to'),
                'subject' => $this->input->post('subject'),
                'content' => $this->input->post('content'),
                'location' => 'inbox',
                'status' => 'unread'
            );        
        $this->db->insert('es_message',$data);
        $this->db->insert('es_message_sent',$data);
        return TRUE;
    }
           function get_date($id){
            $idd= $this->session->userdata('uid');
             $this->db->limit("1");
             $this->db->order_by('date','desc');
       $q = $this->db
                ->where('user_to',$idd)
                    ->where('user_from',$id)
                    ->get('es_message')
                    ->result();
        foreach($q as $row){
            return date('M d, Y h:i:s A',strtotime($row->date));   
        }
    }

      function get_online_status($id){
              $this->db->limit("1");
                $q = $this->db
                ->where('uid',$id)
                    ->get('users')
                    ->result();
        foreach($q as $row){
            return $row->status;   
        }
    }
              function get_status($id){
            $idd= $this->session->userdata('uid');
             $this->db->limit("1");
             $this->db->order_by('date','desc');
       $q = $this->db
                ->where('user_to',$idd)
                    ->where('user_from',$id)
                    ->get('es_message')
                    ->result();
        foreach($q as $row){
            return $row->status;   
        }
    }
               function get_user_from($id){
            $idd= $this->session->userdata('uid');
             $this->db->limit("1");
             $this->db->order_by('date','desc');
       $q = $this->db
                ->where('user_to',$idd)
                    ->where('user_from',$id)
                    ->get('es_message')
                    ->result();
        foreach($q as $row){
            return $row->user_to;   
        }
    }
    
       function get_message_id($id){
            $idd= $this->session->userdata('uid');
             $this->db->limit("1");
             $this->db->order_by('date','desc');
       $q = $this->db
                ->where('user_to',$idd)
                    ->where('user_from',$id)
                    ->get('es_message')
                    ->result();
        foreach($q as $row){
            return $row->message_id;   
        }
    }
         function get_subject($id){
            $idd= $this->session->userdata('uid');
             $this->db->limit("1");
             $this->db->order_by('date','desc');
       $q = $this->db
                ->where('user_to',$idd)
                    ->where('user_from',$id)
                    ->get('es_message')
                    ->result();
        foreach($q as $row){
            return $row->subject;   
        }
    }

function get_lecturer_id_name($id){
            $this->db->limit("1");
       $q = $this->db
                  ->where('user_id',$id)
                    ->get('es_lecturer')
                    ->result();
        foreach($q as $row){
            return $row->username;   
        }
    }

   function find_get_username($id){
       $q = $this->db
                    ->where('user_id',$id)
                    ->get('es_lecturer')
                    ->result();
        foreach($q as $row){
            return $row->username;   
        }
    }
    function find_course_code($id){
                $ur= $this->ion_auth->user()->row()->school_id; 
            $this->db->limit("1");
       $q = $this->db
                  ->where('course_id',$id)
                  ->where('school_id',$ur)
                    ->get('es_course')
                    ->result();
        foreach($q as $row){
            return $row->course_code;   
        }
    }


    function find_course($id){
                $ur= $this->ion_auth->user()->row()->school_id; 
            $this->db->limit("1");
       $q = $this->db
                  ->where('course_id',$id)
                  ->where('school_id',$ur)
                    ->get('es_course')
                    ->result();
        foreach($q as $row){
            return $row->course;   
        }
    }


function get_group_name($id)
{

    // return $this->db->select('users_groups'.'.'.$this->join['groups'].' as id, '.$this->tables['groups'].'.name, '.$this->tables['groups'].'.description')
    // ->where($this->tables['users_groups'].'.'.$this->join['users'], $id)
    // ->join($this->tables['groups'], $this->tables['users_groups'].'.'.$this->join['groups'].'='.$this->tables['groups'].'.id')
    // ->get($this->tables['users_groups']);


    // $this->db->select('users_groups.group_id');
    // $this->db->where('id',$id);
    // $this->db->join('groups','groups.description=es_message.user_from','left');        
    // $q = $this->db->get('es_message')->result();               

    // return $q;

//     $this->db->limit("1");
// $q = $this->db
//           ->where('id',$id)
//            ->get('groups')
//             ->result();
// foreach($q as $row){
//     return $row->description;   
// }
}

    function find_semester($id){
     $ur= $this->ion_auth->user()->row()->school_id; 
            $this->db->limit("1");
       $q = $this->db
                  ->where('course_id',$id)
                  ->where('school_id',$ur)
                    ->get('es_course')
                    ->result();
        foreach($q as $row){
            return $row->semester;   
        }
    }

   function find_credit_hours($id){
      $ur= $this->ion_auth->user()->row()->school_id; 
            $this->db->limit("1");
       $q = $this->db
                  ->where('course_id',$id)
                  ->where('school_id',$ur)
                    ->get('es_course')
                    ->result();
        foreach($q as $row){
            return $row->credit_hours;   
        }    }

        function get_courses_id_name($id){
            $this->db->limit("1");
       $q = $this->db
                  ->where('course_id',$id)
                    ->get('es_course')
                    ->result();
        foreach($q as $row){
            return $row->course;   
        }
    }

        function get_courses_id_semester($id){
            $this->db->limit("1");
       $q = $this->db
                  ->where('course_id',$id)
                    ->get('es_course')
                    ->result();
        foreach($q as $row){
            return $row->semester;   
        }
    }

             function get_school_name($id){
            $this->db->limit("1");
       $q = $this->db
                  ->where('school_id',$id)
                    ->get('es_schools')
                    ->result();
        foreach($q as $row){
            return $row->school_name;   
        }
    }

           function get_departname($id){
            $this->db->limit("1");
       $q = $this->db
                  ->where('department_id',$id)
                    ->get('es_department')
                    ->result();
        foreach($q as $row){
            return $row->department;   
        }
    }

     function get_content($id){
            $idd= $this->session->userdata('uid');
             $this->db->limit("1");
             $this->db->order_by('date','desc');
       $q = $this->db
                ->where('user_to',$idd)
                    ->where('user_from',$id)
                    ->get('es_message')
                    ->result();
        foreach($q as $row){
            return $row->content ; 
        }
    }
    function get_username($id){
       $q = $this->db
                    ->where('uid',$id)
                    ->get('users')
                    ->result();
        foreach($q as $row){
            return $row->username;   
        }
    }
    function get_all_messages(){
        $q = $this->db
                    ->where('location','inbox')
                    ->order_by('date','desc')
                    ->get('es_message')                    
                    ->result();
        return $q;
    }
        function get_messages2($from){
        $id = $this->session->userdata('uid');
    // $sql= 'SELECT * FROM es_message WHERE user_to='.$id.' AND user_from='.$from.' OR user_to='.$from.' AND user_from='.$id.'   ORDER BY es_message.date DESC';
           $sqlw= 'UPDATE  es_message SET status="read" WHERE user_to='.$id.' AND user_from='.$from.'  ';
 $this->db->query($sqlw);
          $sql= 'SELECT * FROM es_message WHERE user_to='.$id.' AND user_from='.$from.' OR user_to='.$from.' AND user_from='.$id.' ORDER BY es_message.date ASC';
          //  $sql= 'SELECT * FROM es_message WHERE msid='.$from.'  ';
       $q = $this->db->query($sql, array($from));
        return $q;
 
   
    }
   

    //    function get_messages($pchat_id, $pchat_tbl, $last_msg_id = 0) {
    //     $query_str = "SELECT pt.cont_id, "
    //             . "pt.user_id, pt.message, "
    //             . "from_unixtime(pt.time, '%D %M %y %h:%i:%s') AS time, "
    //             . "us.user_nickname "
    //             . "FROM $pchat_tbl pt "
    //             . "JOIN users us ON us.user_id = pt.user_id "
    //             . "WHERE pt.pchat_id = ? "
    //             . "AND pt.cont_id > ? "
    //             . "ORDER BY pt.cont_id ASC";
    //     $result = $this->db->query($query_str, array($pchat_id, $last_msg_id));
    //     return $result;
    //   $id = $this->session->userdata('uid');
    //       $this->db->select("*");
    //     $q = $this->db
    //                 ->where('user_to',$id)
    //                 ->order_by('date','desc')
    //                 ->group_by('user_from')
    //                 ->get_compiled_select('es_message')->result(); 
    //     return $q;
    // }


function get_messages()
{
     $id = $this->session->userdata('uid');
    $this->db->select('user_from');
    $this->db->from('es_message');      
   $this->db->where('user_to',$id);
   //$this->db->group_by('user_from');
   $this->db->distinct('user_from');
   $q=$this->db->get();
   // $final = array();
    if ($q->num_rows() > 0) {

 // foreach ($q->result() as $row) {
     // $this->db->select("*");
     //    $q = $this->db
     //                ->where('user_to',$id)
     //                ->where("user_from", $row->user_from)
     //                ->get_compiled_select('es_message')->result(); 
     //    return $q;

  // $this->db->order_by('id', 'DESC');
  //           $this->db->select("*");
  //           $this->db->from("es_message");
  //           $this->db->where("user_to", $id);
  //            $this->db->where("user_from", $row->user_from);
  //           $q = $this->db->get();
  //           if ($q->num_rows() > 0) {
  //               $row->children = $q->result();
  //           }
  //           array_push($final, $row);
       // }
       return $q->result();


  }
 else {
      return FALSE;
  }
    // return $final;
}

    function get_price($de,$sc,$pro){
         $q = $this->db
                ->where('school_id',$sc)
                    ->where('department_id',$de)
                      ->where('program_type',$pro)
                    ->get('es_department')
                    ->result();
        foreach($q as $row){
       
       return $row->price;
           
        }
    }




    function get_post_board(){
      $sql = 'SELECT * FROM es_post_board WHERE school_id='.$this->ion_auth->user()->row()->school_id.' && program_type='.$this->ion_auth->user()->row()->program_type.' ORDER BY id DESC LIMIT 0,20';
       //$sql= 'SELECT * FROM es_message WHERE user_to='.$id.' AND user_from='.$from.' OR user_to='.$from.' AND user_from='.$id.' ';
          
       $q = $this->db->query($sql);
        return $q;
        // $q = $this->db
        //             ->where('school_id',$this->ion_auth->user()->row()->school_id)
        //             ->where('program_type',$this->ion_auth->user()->row()->program_type)
        //             ->order_by('id','desc')
        //             ->get('es_post_board')                    
        //             ->result();
        //      //$q = $this->db->count_all_results();      
        // return $q;
    }

function get_new_messages()
{
      $id = $this->session->userdata('uid');
    $this->db->select('user_from');
    $this->db->from('es_message');      
   $this->db->where('user_to',$id);
   $this->db->where('status','unread');
   $this->db->distinct('user_from');
   $q=$this->db->get();
    if ($q->num_rows() >=1) {
       return $q->result();
  }
 else {
      return FALSE;
  }
}



// $id = $this->session->userdata('uid');
//$this->db->select('user_from, message_id, user_to, subject, content, date, status', FALSE);
//$this->db->where('user_to',$id);
//$this->db->order_by('date','desc');
//$q = $this->db->get('es_message')->result();
//return $q;
   //    $id = $this->session->userdata('uid');
   //  $this->db->select('user_from');
   //  $this->db->from('es_message');      
   // $this->db->where('user_to',$id);
   // //$this->db->group_by('user_from');
   // $this->db->distinct('user_from');
   // $q=$this->db->get();
   // $final = array();
   //  if ($q->num_rows() > 0) {
   //     return $q->result();
       //    foreach ($q->result() as $row) {
       //        //$co = $row->user_from;
       //     $this->db->select("*");
       //     $this->db->from("es_message");
       //       $this->db->where('user_to',$id);
       //     $this->db->where("user_from", $row->user_from);
       //     $q = $this->db->get();
       //     if ($q->num_rows() > 0) {
       //         $row->children = $q->result();
       //     }
       //     array_push($final, $row);
       // }
        //return  $co;
 //  }
 // else {
 //      return FALSE;
 //  }
   // return $final;
   //return $q->result();




//     function get_messages()
//     {
//  //             $id = $this->session->userdata('uid');
//  // $this->db->select('user_from');
//  //   $this->db->group_by('user_from')
//  //   ->where('user_to',$id);
//  //   $query= $this->db->get('es_message')->result_array();
//  //   $final = array();
//  //   if(!empty($query)){
//  //    return $query;
//   //      foreach ($query->result() as $row) {
//   // $this->db->order_by('id', 'DESC');
//   //           $this->db->select("*");
//   //           $this->db->from("es_messag");
//   //           $this->db->where("to_id", $id);
//   //           $this->db->where("from_id", $row->from_id);
//   //           $q = $this->db->get();

//   //           if ($q !== FALSE && $q->num_rows() == 1) {
//   //               $row->children = $q->result();
//   //           }
//   //           array_push($final, $row);

//   //       }
//    // }else{
//    //     return false;
//    // }


//          $id = $this->session->userdata('uid');
//              $this->db->select('user_from');
//    $this->db->group_by('user_from')
//    ->where('user_to',$id);
//   // $q = $this->db->get_compiled_select("es_message");
//   // $this->db->from("es_message");
//     //   $q = $this->db->get();
//      $q = $this->db->get('es_message')->result();
//      //return $q->num_rows();
//  //  $final = array();
// if (!empty($q)) {
//    return $q;
//   // return $q->result();
//   //       foreach ($q as $row) {
//   // $this->db->order_by('message_id', 'DESC');
//   //           $this->db->select("*");
//   //        //   $this->db->from("es_message");
//   //           $this->db->where("user_to", $id);
//   //           $this->db->where("user_from", $row->user_from);
//   //        return   $q = $this->db->get_compiled_select("es_message");

//   //           if (!empty($q)) {
//   //              return  $q;  // $row->children = $q->result();
//   //           }
//   //           else
//   //   {
//   //     return FALSE;  
//   //   }
 

//   //  // array_push($final, $row);

//   //       }
//     }else
//     {
//       return FALSE;  
//     }
 


//            //   $this->db->select("DISTINCT *");
//            //                 // $this->db->select("DISTINCT(user_from)");
//            //    $this->db->from('es_message');
//            //    $q = $this->db
//            //           ->where('user_to',$id);
//            //          // ->order_by('message_id','desc'); return   $q = $this->db->get_compiled_select('es_message');
//            //          $this->db->group_by("user_from");
//            // $q = $this->db->get();                            
//            //    if ($q !== FALSE && $q->num_rows() > 0) {     
//            //          return TRUE;
//            //      }
//            //      else{
//            //          return FALSE;
//            //      }

//  //         $id = $this->session->userdata('uid');
//  //             $this->db->select('user_from');
//  //             $this->db->distinct();
//  //             $this->db->get('es_message'); 
//  // $this->db->where("user_to",$id);
//  //     $q = $this->db->get();
//    //  return $q;
//     }

    function get_messages3(){
        $id = $this->session->userdata('uid');
                   $this->db->limit("1");
        $q = $this->db
                    ->where('user_to',$id)
                    ->where('location','inbox')
                    ->order_by('date','desc')
                    ->get('es_message')                    
                    ->result();
        return $q;
    }
    function get_messages_by_search(){
        $id = $this->session->userdata('uid');
        $keyword = $this->input->post('keyword');
        
        $q = 'SELECT users.username,DATE_FORMAT(es_message.date,"%b %d %Y %h:%i %p") as date,es_message.content,es_message.message_id,es_message.subject,es_message.user_from,es_message.status
            FROM es_message
            LEFT JOIN es_user on es_message.user_from = users.uid
            WHERE es_message.user_to='.$id.'
            AND (
                es_message.subject LIKE "%'.$keyword.'%"
                OR es_message.content LIKE "%'.$keyword.'%"
                OR users.username LIKE "%'.$keyword.'%"
            )
            ORDER BY es_message.date DESC
        ';
        $q = $this->db->query($q)->result();
        return $q;
    }
    
    function get_all_messages_by_search(){
        $id = $this->session->userdata('uid');
        $keyword = $this->input->post('keyword');
        
        $q = 'SELECT users.username,DATE_FORMAT(es_message.date,"%b %d %Y %h:%i %p") as date,es_message.content,es_message.message_id,es_message.subject,es_message.user_from,es_message.user_to,es_message.status
            FROM es_message
            LEFT JOIN users on es_message.user_from = users.uid
            WHERE es_message.subject LIKE "%'.$keyword.'%"
                OR es_message.content LIKE "%'.$keyword.'%"
                OR users.username LIKE "%'.$keyword.'%"
            ORDER BY es_message.date DESC
        ';
        $q = $this->db->query($q)->result();
        return $q;
    }
    
    function get_messages_sent_by_search(){
        $id = $this->session->userdata('user_id');
        $keyword = $this->input->post('keyword');
        
        $q = 'SELECT es_user.username,DATE_FORMAT(es_message_sent.date,"%b %d %Y %h:%i %p") as date,es_message_sent.content,es_message_sent.message_id,es_message_sent.subject,es_message_sent.user_to,es_message_sent.status
            FROM es_message_sent
            LEFT JOIN es_user on es_message_sent.user_to = es_user.user_id
            WHERE es_message_sent.user_from='.$id.'
            AND (
                es_message_sent.subject LIKE "%'.$keyword.'%"
                OR es_message_sent.content LIKE "%'.$keyword.'%"
                OR es_user.username LIKE "%'.$keyword.'%"
            )
            ORDER BY es_message_sent.date DESC
        ';
        $q = $this->db->query($q)->result();
        return $q;
    }
    
    function get_messages_sent(){
        $id = $this->session->userdata('user_id');
        $q = $this->db
                    ->where('user_from',$id)
                    ->order_by('status,date','desc')
                    ->get('es_message_sent')                    
                    ->result();
        return $q;
    }
    
    function get_messages_trash(){
        $id = $this->session->userdata('user_id');
        $q = $this->db
                    ->where('user_to',$id)
                    ->where('location','trash')
                    ->order_by('status,date','desc')
                    ->get('es_message')                    
                    ->result();
        return $q;
    }
    
    function get_message_by_id($message_id,$location=null){
        $id = $this->session->userdata('user_id');
        $this->db->select('es_user.username,DATE_FORMAT(es_message.date,"%b %d %Y %h:%i %p") as date,es_message.content,es_message.message_id,es_message.subject,es_message.user_from');
        $this->db->where('message_id',$message_id);
        $this->db->join('es_user','es_user.user_id=es_message.user_from','left');        
        $q = $this->db->get('es_message')->result();               
        if($location!=null){
            $this->read_message($message_id);
        }
        
        return $q;
    }
    
    function get_admin_message_by_id($message_id){
        $id = $this->session->userdata('user_id');
        $this->db->select('es_user.username,DATE_FORMAT(es_message.date,"%b %d %Y %h:%i %p") as date,es_message.content,es_message.message_id,es_message.subject,es_message.user_from,es_message.user_to');
        $this->db->where('message_id',$message_id);
        $this->db->join('es_user','es_user.user_id=es_message.user_from','left');        
        $q = $this->db->get('es_message')->result();               

        return $q;
    }
    
    function get_message_sent_by_id($message_id){
        $id = $this->session->userdata('user_id');
        $this->db->select('es_user.username,DATE_FORMAT(es_message.date,"%b %d %Y %h:%i %p") as date,es_message.content,es_message.message_id,es_message.subject,es_message.user_to');
        $this->db->where('message_id',$message_id);
        $this->db->join('es_user','es_user.user_id=es_message.user_to','left');        
        $q = $this->db->get('es_message')->result();               

        return $q;
    }
    
    function read_message($message_id){
        $rec = array(
               'status' => 'read'
            );
        
        $this->db->where('message_id', $message_id);
        $this->db->update('es_message', $rec); 
        return true;
        
    }
    
    function update_message(){
        $post = $this->input->post();
        $data = array(
                'subject' => $post['subject'],
                'content' => $post['content'],
                'status' => 'unread'
            );
        $message_id = $post['message_id'];
        $this->db->where('message_id', $message_id);
        $this->db->update('es_message', $data); 
        return true;
    }
    
    function count_messages(){
        $id = $this->session->userdata('uid');
        $q = "select * from es_message where user_to=$id and status='unread'";
        $rs = $this->db->query($q);
        $this->total_unread = $rs->num_rows();
        
        $q = "select * from es_message_sent where user_from=$id";
        $rs = $this->db->query($q);
        $this->total_sent = $rs->num_rows();
        
        $q = "select * from es_message where location='trash' and user_to=$id";
        $rs = $this->db->query($q);
        $this->total_trash = $rs->num_rows();
    }

    
    function delete_message(){
        $ids = $this->input->post('message_id');
        $c = count($ids);
        if($c == 0){
            $ids = array($this->uri->segment(3));   
        }
        $c = count($ids);
        for($i=0; $i < $c; $i++){
            $message_id = $ids[$i];   
            echo $message_id;
            $this->db
                    ->where('message_id',$message_id)
                    ->delete('es_message'); 
        }
        
    }
    

    function delete_message_sent(){
        $ids = $this->input->post('message_id');
        $c = count($ids);
        if($c == 0){
            $ids = array($this->uri->segment(3));   
        }
        $c = count($ids);
        for($i=0; $i < $c; $i++){
            $message_id = $ids[$i];   
            $this->db
                    ->where('message_id',$message_id)
                    ->delete('es_message_sent'); 
        }
        
    }
        
    
 function string_words($string) { 
        $words = explode(' ', $string); 
        return implode(' ', $words); 
    }

    function string_limit_words($string, $word_limit) { 
        $words = explode(' ', $string); 
        return implode(' ', array_slice($words, 0, $word_limit)); 
    }
    
    function time_diff($date_in){
            $start_date = $date_in;
            $end_date=date('Y-m-d H:i:s');

            $start_time = strtotime($start_date);
            $end_time = strtotime($end_date);
            $difference = $end_time - $start_time;

            $seconds = $difference % 60;            //seconds
            $difference = floor($difference / 60);

            $min = $difference % 60;              // min
            $difference = floor($difference / 60);

            $hours = $difference % 24;  //hours
            $difference = floor($difference / 24);

            $days = $difference % 30;  //days
            $difference = floor($difference / 30);

            $month = $difference % 12;  //month
            $difference = floor($difference / 12);
            
            $year = $difference % 1;  //month
            $difference = floor($difference / 1);


            $result = null;
            if($year!=0) {                
                if($year == 1){
                    $result.=$year.' Year ';    
                }else{
                    $result.=$year.' Years ';   
                }
            }
            if($month!=0) {                
                if($month == 1){
                    $result.=$month.' Month ';    
                }else{
                    $result.=$month.' Months ';   
                }
            }
            if($days!=0) {                
                if($days == 1){
                    $result.=$days.' Day ';    
                }else{
                    $result.=$days.' Days ';   
                }
            }
            if($hours!=0) {                
                if($hours == 1){
                    $result.=$hours.' Hour ';    
                }else{
                    $result.=$hours.' Hours ';   
                }
            }
            if($min!=0) {                
                if($min == 1){
                    $result.=$min.' Minute ';    
                }else{
                    $result.=$min.' Minutes ';   
                }
            }
            
            if($result==null){
                return 'Just Now';   
            }
            return $result.' ago';
        }
}
?>