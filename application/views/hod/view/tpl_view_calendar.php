      <?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
if($this->ion_auth->get_users_groups()->row()->id==1 || $this->ion_auth->get_users_groups()->row()->id==4):
?>
 <script src='<?php echo site_url('assets/calendar/js/jquery.min.js');?>');?>'></script>
  <script src='<?php echo site_url('assets/calendar/js/moment.min.js');?>');?>'></script> 
 <script src='<?php echo site_url('assets/calendar/js/jquery-ui.min.js');?>');?>'></script>
 <script src='<?php echo site_url('assets/calendar/js/fullcalendar.min.js');?>');?>'></script>
 <div class="container">
    <div class="row">
    <div class="col-md-12">

    <h1>Calendar</h1>

    <div id="calendar">

    </div>

    </div>
    </div>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Calendar Event</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open(site_url("hod/users/add_event"), array("class" => "form-horizontal")) ?>
      <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Event Name</label>
                <div class="col-md-8 ui-front">
                    <input type="text" class="form-control" name="name" value="">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Description</label>
                <div class="col-md-8 ui-front">
                    <input type="text" class="form-control" name="description">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Start Date</label>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="start_date">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">End Date</label>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="end_date">
                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Add Event">
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Calendar Event</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open(site_url("hod/users/edit_event"), array("class" => "form-horizontal")) ?>
      <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Event Name</label>
                <div class="col-md-8 ui-front">
                    <input type="text" class="form-control" name="name" value="" id="name">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Description</label>
                <div class="col-md-8 ui-front">
                    <input type="text" class="form-control" name="description" id="description">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">Start Date</label>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="start_date" id="start_date">
                </div>
        </div>
        <div class="form-group">
                <label for="p-in" class="col-md-4 label-heading">End Date</label>
                <div class="col-md-8">
                    <input type="date" class="form-control" name="end_date" id="end_date">
                </div>
        </div>
        <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading">Delete Event</label>
                    <div class="col-md-8">
                        <input type="checkbox" name="delete" value="1">
                    </div>
            </div>
            <input type="hidden" name="eventid" id="event_id" value="0" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Update Event">
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>
    
<script type="text/javascript">
$(document).ready(function() {

    var date_last_clicked = null;

    $('#calendar').fullCalendar({
        eventSources: [
           {
           events: function(start, end, timezone, callback) {
                $.ajax({
                    url: '<?php echo base_url() ?>hod/users/get_events',
                    dataType: 'json',
                    data: {
                        // our hypothetical feed requires UNIX timestamps
                        start: start.unix(),
                        end: end.unix()
                    },
                    success: function(msg) {
                        var events = msg.events;
                        callback(events);
                    }
                });
              }
            },
        ],
        dayClick: function(date, jsEvent, view) {
            date_last_clicked = $(this);
            $(this).css('background-color', '#bed7f3');
            $('#addModal').modal();
        },
       eventClick: function(event, jsEvent, view) {
          $('#name').val(event.title);
          $('#description').val(event.description);
          $('#start_date').val(moment(event.start).format('YYYY/MM/DD HH:mm'));
          if(event.end) {
            $('#end_date').val(moment(event.end).format('YYYY/MM/DD HH:mm'));
          } else {
            $('#end_date').val(moment(event.start).format('YYYY/MM/DD HH:mm'));
          }
          $('#event_id').val(event.id);
          $('#editModal').modal();
       },
    });
});
</script>

<?php
 else:
 ?>
 
 
<div class="row">
          
   <div class="col-md-12">
  <style type="text/css"> 
  /* Tables
--------------------------------------------------------------------------------------------------*/

	#wrap {
		width: 100%;
		margin: 0 auto;
	}
	

	#calendar {
		float: left;
		width: 900px;
	}

</style>

<div id='wrap'>
 <div id='calendar'></div>

		<div style='clear:both'></div>

	<!-- 	<xspan class="tt">x</xspan> -->

	</div>                       
   
                            
      </div>
                        
 </div>
 <script src='<?php echo site_url('assets/calendar/js/jquery.min.js');?>');?>'></script>
  <script src='<?php echo site_url('assets/calendar/js/moment.min.js');?>');?>'></script> 
 <script src='<?php echo site_url('assets/calendar/js/jquery-ui.min.js');?>');?>'></script>
 <script src='<?php echo site_url('assets/calendar/js/fullcalendar.min.js');?>');?>'></script>
   <script src='<?php //echo site_url('assets/calendar/js/gcal.js');?>');?>'></script>
  <script>

	$(document).ready(function() {

		    $('#calendar').fullCalendar({
        eventSources: [
           {
           events: function(start, end, timezone, callback) {
                $.ajax({
                    url: '<?php echo base_url() ?>hod/users/get_events',
                    dataType: 'json',
                    data: {
                        // our hypothetical feed requires UNIX timestamps
                        start: start.unix(),
                        end: end.unix()
                    },
                    success: function(msg) {
                        var events = msg.events;
                        callback(events);cal
                    }
                });
              }
            },
        ],

	});

	});
</script>

<?php 
 endif;
 ?>
 