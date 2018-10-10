     <?php var_dump($record)?>
                <?php if(is_array($record)): ?>
                <?php foreach($record as $row): 
                     //if (isset($row2->children)): 
              //  foreach ($row2->children as $row) :?>
                  <tr>                    
                    <td>                        
                        <input type="checkbox" name="message_id[]" value="<?php echo $this->Message_model->get_message_id($row->user_from); //echo $row->message_id;?>">
                    </td>
                    <td>
                        <?php 
                          echo $this->Message_model->get_date($row->user_from); 
                         
                        ?>  
                    </td>
                    <td class="mailbox-name">
                            <!--     <a href="<?php //echo site_url('admin/users/readmessage').'/'.$row->msid;?>"> -->
                      <a href="<?php echo site_url('admin/users/readmessage').'/'.$row->user_from;?>">
                      <!--   <a href="#read_admin_mail" data-toggle="modal" class="read_admin_message" data-id="<?php// echo $row->message_id; ?>"> -->
                            <strong>
                              <?php  $status = $this->Message_model->get_status($row->user_from);?>
                            <?php if($status=='read') echo '</strong><del>'; ?>
                            <?php echo $this->Message_model->get_username($row->user_from); //echo $this->ion_auth->user()->row()->username;?>
                            <?php if($status=='read') echo '</del>'; ?>
                            
                            </strong>
                        </a>
                      </td>
                      
                      <td class="mailbox-name">
                            <!--  <a href="<?php //echo site_url('admin/users/readmessage').'/'.$row->user_from;?>"> -->
                       <!--  <a href="#read_admin_mail" data-toggle="modal" class="read_admin_message" data-id="<?php echo $row->message_id; ?>"> -->
                            <strong>
                            <?php if($status=='read') echo '</strong><del>'; ?>
                            <?php echo  $this->Message_model->get_username($this->Message_model->get_user_from($row->user_from)) ;?>
                            <?php if($status=='read') echo '</del>'; ?>
                            
                            </strong>
                    <!--     </a>         -->
                      </td>
                    <td class="mailbox-subject"><strong><?php echo ($this->Message_model->get_subject($row->user_from)!='') ? $this->Message_model->get_subject($row->user_from):'[No Subject]'; ?></strong></td>
                    <td class="mailbox-attachment"><?php echo $this->Message_model->string_limit_words($this->Message_model->get_content($row->user_from),10); ?>...
                    </td>
                      
                    <td class="mailbox-date"><?php echo $this->Message_model->time_diff($this->Message_model->get_date($row->user_from)); ?></td>
                    
                  </tr> 
                     <?php //endforeach; ?>
                  <?php// endif; ?>         
                  <?php endforeach; ?>
                  <?php endif; ?> 

                  