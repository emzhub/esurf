      <?php defined('BASEPATH') OR exit('No direct script access allowed'); 
     ?>

<style>
    div#pc_viewport{
        height: 350px;
        border: 1px solid #777;
        overflow-y: auto;
        background-image: url(../assets/images/pcbg.png);
    }

    div#pc_viewport ul{
        list-style-type: none;
    }

    div#pc_viewport ul li.by_current_user{
        min-width: 65%;
        color: whitesmoke;
        text-shadow: 1px 1px black;
        float: left;
        border: 1px solid black;
        border-radius: 7px;
        margin-left: -30px;
        margin-top: 7px;
        background-color:lightgrey;
    }

    div#pc_viewport ul li.other_user{
        min-width: 65%;
        color: black;
        text-shadow: 1px 1px black;
        float:right;;
        background-color: lightgoldenrodyellow;
        border: 1px solid black;
        border-radius: 3px;
        margin-top: 7px;
    }


    span.msg_header{
        font-size: .7em;
        color: paleturquoise;
    }

    input#pchat_message {
        width: 98%
    }
</style>
   
    <div id='plate'>
        <div id='innerplate' style='background-color: lightgrey;'>
            <div id='container' class='move' style="color: #00406c">
                <b><?php echo $this->Message_model->get_username($id). '</b> is chatting with <b><em style="color: green ; font-size: 1.2em;">' . $this->session->userdata('username') ;?></b>
                <div id='pc_viewport'></div>
                <br />
                <div id='chat_input'>
                    <input id='pchat_message' name='pchat_message' type='text' value='' tabindex="1" /><br /><br />
                    <?php echo anchor('#', 'Send Message', array('title' => 'Send Chat Message', 'id' => 'submit_message', 'class' => 'actbut btn btn-primary')); ?>
                    <div class='clearer'></div>

                </div>
            </div>
   

        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url().'assets/bootstrap/js/jquery-3.2.1.js'?>"></script>
 <script type="text/javascript" src="<?php echo site_url('assets/public/js/plugins/jquery/jquery.min.js');?>"></script>
  <script>   

$(document).ready(function(){
   setInterval(function() {
            get_chat_messages();
        }, 25000);
      $("input#pchat_message").keypress(function(e) {
            if (e.which == 13) {
                $("a#submit_message").click();
                return false;
            }
        });
      $("a#submit_message").click(function() {
               var user_id = "<?php echo $id;?>";
            var message = $("input#pchat_message").val();
            if (message == "") {
                return false;
            }
            $.post("<?php echo site_url('admin/users/reply')?>",
             {message: message, user_id: user_id},
              function(data) {
                if (data.status == 'ok')
                {
                    var curcont = $("div#pc_viewport").html();
                    $("#pc_viewport").html(curcont + data.content);
                    $('#pc_viewport').animate({scrollTop: $('#pc_viewport').get(0).scrollHeight}, 3000);
                }

            }, "json");

            $("input#pchat_message").val("");

            return false;

        });


   function get_chat_messages()
        {
            var pchat_id = "<?php echo $this->Message_model->get_message_id($id);?>";
    var user_id = "<?php echo $id;?>";
    // var pchat_tbl = "<?php //echo $this->session->userdata('pchat_tbl'); ?>";

            $.post('<?php echo site_url('admin/users/ajax_get_pchat_messages')?>', 
              {pchat_id: pchat_id, user_id: user_id}, 
              function(data) {

                if (data.status == 'ok')
                {
                    var curcont = $("div#pc_viewport").html();
                    $("#pc_viewport").html(curcont + data.content);
                    $('#pc_viewport').animate({scrollTop: $('#pc_viewport').get(0).scrollHeight}, 3000);
                }
                else
                {
                    ///something wrong
                }
            }, "json");
        }
        get_chat_messages();
          });
      </script>