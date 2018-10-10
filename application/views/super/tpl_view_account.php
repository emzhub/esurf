

<div class="row">
                        
                        <div class="col-md-12">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3><i class="fa fa-users"></i> ACCOUNTS</h3>
                                        <span>view added accounts ( admin accounts )</span>
                                    </div>                                    
                                    
                                </div>
                                
                                <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><a href="<?php echo site_url('super/user/adn');?>" class="btn btn-success btn-sm btn-flat"><i class="fa fa-plus"></i> Add New Account?</a></h3>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#account_data').tableExport({type:'csv',escape:'false'});"><img src='../../assets/public/icons/csv.png' width="24"/> CSV</a></li>
                                            <li><a href="#" onClick ="$('#account_data').tableExport({type:'txt',escape:'false'});"><img src='../../assets/public/icons/txt.png' width="24"/> TXT</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#account_data').tableExport({type:'excel',escape:'false'});"><img src='../../assets/public/icons/xls.png' width="24"/> XLS</a></li>
                                            <li><a href="#" onClick ="$('#account_data').tableExport({type:'doc',escape:'false'});"><img src='../../assets/public/icons/word.png' width="24"/> Word</a></li>
                                            <li><a href="#" onClick ="$('#account_data').tableExport({type:'powerpoint',escape:'false'});"><img src='../../assets/public/icons/ppt.png' width="24"/> PowerPoint</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#account_data').tableExport({type:'png',escape:'false'});"><img src='../../assets/public/icons/png.png' width="24"/> PNG</a></li>
                                            <li><a href="#" onClick ="$('#account_data').tableExport({type:'pdf',escape:'false'});"><img src='../../assets/public/icons/pdf.png' width="24"/> PDF</a></li>
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                   <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                  <th>ID</th>
                                                   <th>Name</th>
                                                 <th>School</th>
                                                <th>Date Added</th>
                                                <th>Option</th> 
                                            </tr>
                                          </thead>
                                          <tbody>
                                             <?php
            
                foreach ($admin as $child) {
                    ?>
                 <tr>
                      <td><?=  $child->uid ?></td>
                 <td><?=  $child->username ?></td>
                
                     <?php
            if (isset($child->children)) {
                foreach ($child->children as $chi) {
                    ?>
                   <td><?=$chi->school_name?></td>
                         <?php
                }
            }
            ?>
                    <td><?=$child->date?></td>
                   <td> <a href="#" onclick="delcosass(<?php echo $child->uid;?>)"><i class="fa fa-times text-danger fa-2x"></i> </a></td> 
                                              </td> 
                  </tr>
                    <?php
                }
        
            ?> 
                                           </tbody>
                                </table>                                    
                                    
                                </div>
                            </div>
                            
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>
                        
                        
                        
                    </div>

<script>
    $(document).ready( function () {
      $('#table_id').DataTable();
  } );
 function delcosass(id)
    {
        // var csrfName= "<?php echo $this->security->get_csrf_token_name();?>",
        //     csrfHash ="<?php echo $this->security->get_csrf_hash();?>";
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
              url : "<?php echo site_url('super/user/delacc')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {  
                location.reload();
                //alert('Error deleting data');
            }
        });

      }
    }
	   

   
     </script>
