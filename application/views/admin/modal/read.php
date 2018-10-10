<style>
    #chatbox {
    overflow:   none;
    position:   relative;
    width:      100%;
    height:     400px;
    border: 1px solid #ccc;
}
#chatmessages
{
    overflow:   auto;
    position:   absolute;
    bottom:     0;
    width: 100%;
    max-height: 400px;
}
#chatmessages div {
    border:1px solid #e2e4e3;
    border-radius: 5px;
    margin:2px;
    padding:10px;
}
    
</style>
<div class="modal fade" id="read_mail">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Read Message</h4>
            </div>
            <div class="modal-body">
                <table style="font-size:1.2em;" class="table table-striped">
                    <tr>
                        <td class="col-sm-5">Date</td>
                        <td>:</td>
                        <td class="text-primary"><span class="date_here"></span></td>
                    </tr>
                    <tr>
                        <td class="col-sm-5">Sender</td>
                        <td>:</td>
                        <td class="text-danger"><span class="sender_here"></span></td>
                    </tr>
                    <tr>
                        <td class="col-sm-5">Subject</td>
                        <td>:</td>
                        <td class="text-danger"><span class="subject_here"></span></td>
                    </tr>
                    <tr>
                        <td  colspan="3">Message</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <textarea name="content" cols="40" rows="10" class="form-control message_here" readonly style="resize: none;"></textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="button" class="btn btn-primary" data-target="#reply_mail" data-toggle="modal" data-dismiss="modal"><i class="fa fa-reply"></i> Reply</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="read_admin_mail">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Read Message</h4>
            </div>
            <?php echo form_open('admin/users/update'); ?>
            <input type="hidden" name="message_id" class="message_id">
            <div class="modal-body">
           <!--      <table style="font-size:1.2em;" class="table table-striped">
                    <tr>
                        <td class="col-sm-5">Date</td>
                        <td>:</td>
                        <td class="text-primary"><span class="date_here"></span></td>
                    </tr>
                    <tr>
                        <td class="col-sm-5">Sender</td>
                        <td>:</td>
                        <td class="text-danger"><span class="sender_here"></span></td>
                    </tr>
                    <tr>
                        <td class="col-sm-5">Receipient</td>
                        <td>:</td>
                        <td class="text-danger"><span class="receipient_here"></span></td>
                    </tr>
                    <tr>
                        <td class="col-sm-5">Subject</td>
                        <td>:</td>
                        <td class="text-danger"><input type="text" name="subject" class="subject_here form-control"></td>
                    </tr>
                    <tr>
                        <td  colspan="3">Message</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <textarea name="content" cols="40" rows="10" class="form-control message_here" style="resize: none;"></textarea>
                        </td>
                    </tr>
                </table> -->

                  <div class="messages messages-img" >
                    
                            <div class="item in">
                                <div class="image">
                                    <img src="assets/images/users/user2.jpg" alt="John Doe">
                                </div>
                                <div class="text">
                                    <div class="heading">
                                        <a href="#">John Doe</a>
                                        <span class="date">08:33</span>
                                    </div>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis suscipit eros vitae iaculis.
                                </div>
                            </div>
                            <div class="item">
                                <div class="image">
                                    <img src="assets/images/users/user.jpg" alt="Dmitry Ivaniuk">
                                </div>                                
                                <div class="text">
                                    <div class="heading">
                                        <a href="#">Dmitry Ivaniuk</a>
                                        <span class="date">08:39</span>
                                    </div>                                    
                                    Integer et ipsum vitae urna mattis dictum. Sed eu sollicitudin nibh, in luctus velit.
                                </div>
                            </div>
                            <div class="item">
                                <div class="image">
                                    <img src="assets/images/users/user.jpg" alt="Dmitry Ivaniuk">
                                </div>                                
                                <div class="text">
                                    <div class="heading">
                                        <a href="#">Dmitry Ivaniuk</a>
                                        <span class="date">08:42</span>
                                    </div>                                    
                                    In dapibus ex ut nisl laoreet aliquam. Donec in mollis leo. Aenean nec suscipit neque, non iaculis justo. Quisque eget odio efficitur, porta risus vitae, sagittis neque.
                                </div>
                            </div>
                            <div class="item in">
                                <div class="image">
                                    <img src="assets/images/users/user2.jpg" alt="John Doe">
                                </div>
                                <div class="text">
                                    <div class="heading">
                                        <a href="#">John Doe</a>
                                        <span class="date">08:58</span>
                                    </div>
                                    Curabitur et euismod urna?
                                </div>
                            </div>
                            <div class="item">
                                <div class="image">
                                    <img src="assets/images/users/user.jpg" alt="Dmitry Ivaniuk">
                                </div>                                
                                <div class="text">
                                    <div class="heading">
                                        <a href="#">Dmitry Ivaniuk</a>
                                        <span class="date">09:11</span>
                                    </div>                                    
                                    Fusce ultricies erat quis massa interdum, eu elementum urna iaculis
                                </div>
                            </div>
                            <div class="item in">
                                <div class="image">
                                    <img src="assets/images/users/user2.jpg" alt="John Doe">
                                </div>
                                <div class="text">
                                    <div class="heading">
                                        <a href="#">John Doe</a>
                                        <span class="date">09:22</span>
                                    </div>
                                    Vestibulum cursus ipsum ut dolor vulputate dapibus. Donec elementum est vel vulputate malesuada?
                                </div>
                            </div>
                           
                        </div>                    
                        
                        <div class="panel panel-default push-up-10">
                            <div class="panel-body panel-body-search">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default"><span class="fa fa-camera"></span></button>
                                        <button class="btn btn-default"><span class="fa fa-chain"></span></button>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Your message..."/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-default">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
               <!--  <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update</button> -->
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="read_sent_mail">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Read Sent Message</h4>
            </div>
            <div class="modal-body">
                <table style="font-size:1.2em;" class="table table-striped">
                    <tr>
                        <td class="col-sm-5">Date</td>
                        <td>:</td>
                        <td class="text-primary"><span class="date_here"></span></td>
                    </tr>
                    <tr>
                        <td class="col-sm-5">Receipient</td>
                        <td>:</td>
                        <td class="text-danger"><span class="receiver_here"></span></td>
                    </tr>
                    <tr>
                        <td class="col-sm-5">Subject</td>
                        <td>:</td>
                        <td class="text-danger"><span class="subject_here"></span></td>
                    </tr>
                    <tr>
                        <td  colspan="3">Message</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <textarea name="content" cols="40" rows="10" class="form-control message_here" readonly style="resize: none;"></textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>                
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="reply_mail">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Reply Message</h4>
            </div>
            <div class="modal-body" style="font-size:1.2em">
                <?php echo form_open('admin/users/send'); ?>
                <div class="form-group">
                    <label for="send_to">Send To:</label>
                    <font class="sender text-primary"></font>
                    <input type="hidden" class="send_to" name="send_to">
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control reply_subject" name="subject">
                </div>   
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="content" cols="40" rows="10" class="form-control" placeholder="Your Message Here" style="resize: none;"></textarea>
                </div>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="submit" name="send" value="1" class="btn btn-primary"><i class="fa fa-send"></i> Send</button>
                </form>
            </div>
        </div>
    </div>
</div>