        <?php if(is_array($recordb)): ?>
                <?php foreach($recordb as $row): ?>
                       <a href="#" class="list-group-item">
                        <?php if( $this->Message_model->get_online_status($row->user_from) == 1){?>
                                    <div class="list-group-status status-online"></div>
                                    <?php } else{ ?>
                                         <div class="list-group-status status-offline"></div>
                                            <?php }  ?>
                                           <?php 
          if( !empty($avatar))
{
      foreach ($avatar as $child) { ?>
                                       
            <img src="<?= base_url('files/avatar/'.$child->user_id.'/'. $child->user_id.'.png')   ?>" class="pull-left" alt="<?php echo $this->ion_auth->user()->row()->username;?>"/>
            
                              <?php  } } 
                              else{
    ?>
      <img src="<?= base_url('files/avatar/default_ava.gif')   ?>" class="pull-left" alt="<?php echo $this->ion_auth->user()->row()->username;?>"/>
    <?php
}
            ?>
                                    <span class="contacts-title">
                                           <a href="<?php echo site_url('admin/users/readmessage').'/'.$row->user_from;?>">
                                     
                              <?php  $status = $this->Message_model->get_status($row->user_from);?>
                            <?php if($status=='read') echo '</strong><del>'; ?>
                            <?php echo $this->Message_model->get_username($row->user_from); //echo $this->ion_auth->user()->row()->username;?>
                            <?php if($status=='read') echo '</del>'; ?>
                            
                         </a></span>
                                    <p><?php echo $this->Message_model->string_limit_words($this->Message_model->get_content($row->user_from),10); ?></p>
                           </a>
                <?php endforeach; ?>
                  <?php endif; ?> 