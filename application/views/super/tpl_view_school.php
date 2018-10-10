<?php defined('BASEPATH') OR exit('No direct script access allowed');?>


<div class="row">
                        
                        <div class="col-md-12">
                            

                             <!-- START DEFAULT TABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                     <h3 class="panel-title"><a href="<?php echo site_url('super/user/Adsc');?>" class="btn btn-success btn-sm btn-flat"><i class="fa fa-plus"></i> Add New School?</a></h3>
                                    <div class="pull-right">
                                        <button class="btn btn-danger toggle" data-toggle="exportTable"><i class="fa fa-bars"></i> Export Data</button>
                                    </div>
                                </div>
                                <div class="panel-body" id="exportTable" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="list-group border-bottom">
                                                <a href="#" class="list-group-item" onClick ="$('#customers').tableExport({type:'json',escape:'false'});"><img src='../../assets/public/icons/json.png' width="24"/> JSON</a>
                                                <a href="#" class="list-group-item" onClick ="$('#customers').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src='../../assets/public/icons/json.png' width="24"/> JSON (ignoreColumn)</a>
                                                <a href="#" class="list-group-item" onClick ="$('#customers').tableExport({type:'json',escape:'true'});"><img src='../../assets/public/icons/json.png' width="24"/> JSON (with Escape)</a>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="list-group border-bottom">
                                                <a href="#" class="list-group-item" onClick ="$('#customers').tableExport({type:'xml',escape:'false'});"><img src='../../assets/public/icons/xml.png' width="24"/> XML</a>
                                                <a href="#" class="list-group-item" onClick ="$('#customers').tableExport({type:'sql'});"><img src='../../assets/public/icons/sql.png' width="24"/> SQL</a>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="list-group border-bottom">
                                                <a href="#" class="list-group-item" onClick ="$('#customers').tableExport({type:'csv',escape:'false'});"><img src='../../assets/public/icons/csv.png' width="24"/> CSV</a>
                                                <a href="#" class="list-group-item" onClick ="$('#customers').tableExport({type:'txt',escape:'false'});"><img src='../../assets/public/icons/txt.png' width="24"/> TXT</a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="list-group border-bottom">
                                                <a href="#" class="list-group-item" onClick ="$('#customers').tableExport({type:'excel',escape:'false'});"><img src='../../assets/public/icons/xls.png' width="24"/> XLS</a>
                                                <a href="#" class="list-group-item" onClick ="$('#customers').tableExport({type:'doc',escape:'false'});"><img src='../../assets/public/icons/word.png' width="24"/> Word</a>
                                                <a href="#" class="list-group-item" onClick ="$('#customers').tableExport({type:'powerpoint',escape:'false'});"><img src='../../assets/public/icons/ppt.png' width="24"/> PowerPoint</a>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="list-group border-bottom">
                                                <a href="#" class="list-group-item" onClick ="$('#customers').tableExport({type:'png',escape:'false'});"><img src='../../assets/public/icons/png.png' width="24"/> PNG</a>
                                                <a href="#" class="list-group-item" onClick ="$('#customers').tableExport({type:'pdf',escape:'false'});"><img src='../../assets/public/icons/pdf.png' width="24"/> PDF</a>
                                            </div>
                                        </div>
                                    </div>                               
                                </div>
                                <div class="panel-body panel-body-table">
                                    <div class="table-responsive">
                                        <table id="customers" class="table table-striped">
                                            <thead>         
                                                <tr>
                                                    <th>School Name</th>
                                                <th>School Abrv</th>
                                                <th>School Type</th>
                                                <th>School Location</th>
                                                <th>School Population</th>
                                                <th>Bsc</th>
                                                <th>Master</th>
                                                <th>Bsc && Master</th>
                                                <th>Date Added</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
            
                foreach ($school as $child) {
                    ?>
                 <tr>
                 <td><?=  $child->school_name ?></td>
                  <td><?=  $child->school_abrv ?></td>
                   <td><?=  $child->school_type ?></td>
                    <td><?=  $child->school_location ?></td>
                     <td><?=  $child->school_population ?></td>
                      <td><?=  $child->bsc_id ?></td>
                      <td><?=  $child->ms_id ?></td>
                      <td><?=  $child->BSCandMASTER ?></td>
                      <td><?=  $child->date ?></td>
                  </tr>
                    <?php
                }
        
            ?> 
                                             
                                            </tbody>
                                        </table>                                    
                                    </div>
                                </div>
                            </div>
                            <!-- END DEFAULT TABLE EXPORT -->




                            </div>
                        </div>
