<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
<link href="<?= base_url()?>assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet" />
<link href="<?= base_url()?>assets/assets/bootstrap-wysihtml5/wysiwyg-color.css" type="text/css" rel="stylesheet" />
<link href="<?= base_url()?>assets/assets/bootstrap-datepicker/css/datepicker.css" type="text/css" rel="stylesheet" />
<link href="<?= base_url()?>assets/assets/bootstrap-timepicker/compiled/timepicker.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/assets/bootstrap-datetimepicker/css/datetimepicker.css" />

<!-- FONTS -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

<script src="<?= base_url()?>assets/js/jquery/jquery-2.0.3.min.js"></script>


<div id="main-content">
    <div class="container">
        <div class="row">
            <div id="content" class="col-lg-12">
                <!-- PAGE HEADER-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-header">
                            <!-- STYLER -->
                            <!-- /STYLER -->
                            <!-- BREADCRUMBS -->
                            <ul class="breadcrumb">
                                <li>
                                    <i class="fa fa-home"></i>
                                    <a href="index.html">Home</a>
                                </li>
                          
                                <li>
                                    <?=$page_title?>
                                </li>
                            </ul>
                            <!-- /BREADCRUMBS -->
                            <div class="clearfix">
                                <h3 class="content-title pull-left"><?=$page_title?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /PAGE HEADER -->
                <!-- DATA TABLES -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BOX -->
                        <div class="box border blue">
                            <div class="box-title">
                                <h4><i class="fa fa-legal"></i><?=$page_title?></h4>
                                <div class="tools hidden-xs">
                                    <a href="#box-config" data-toggle="modal" class="config">
                                        <i class="fa fa-cog"></i>
                                    </a>
                                    <a href="javascript:;" class="reload">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <a href="javascript:;" class="collapse">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a href="javascript:;" class="remove">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="box-body">
                                <table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr class="gradeX">
                                            <tr>
                                                <th>#</th>
                                                <th>Employee Names</th>
                                                <th>Advance Reason</th>
                                                <th class="hidden-xs">Amount</th>
                                                <th class="hidden-xs">Last Net Salary</th>
                                                <th class="hidden-xs">Application Date</th>
                                                <th class="hidden-xs">Status</th>
                                                <th class="hidden-xs">Repay Method</th>
                                                <th>Advance decription</th>    
                                                <th>Approve/Reject</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                           foreach ($advance_applications as $advance){
                           	$count=1;
                           	
                           
                            
                           	 	 echo "<tr class='gradeX'>";
                           	 	 echo "<td> 
                           	      ".$count."
	                       	      </td>
	                       	      <td>
                           	       ".$advance['staff_name']."
                           	       </td>
                           	       <td>
                           	       ".$advance['application_reason']."
                           	       </td>
                                   <td>
                                   ".$advance['amount']."
                                   </td>
                                  
                                   <td>
                                   ".$advance['last_net_salary']."
                                   </td>
                                    <td>
                                   ".$advance['applicationDate']."
                                   </td>
                                    <td>
                                   ".$advance['status']."
                                   </td>
                                   <td>
                                   ".$advance['repay_method']."
                                   </td>
                                   
	                       	      <td>
                           	       ".substr($advance['advance_purpose_description'], 0,300)."....."."
                           	       </td>


                                   <td>
                                         <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>
                                 Accept/Reject
                                </button>
                                   </td>

                           	      
                           	       </tr>";
                                   ?>
                                   <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                      <div class="modal-dialog" role="document">

                        <div class="modal-content">

                          <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Accept/Reject application for: <B><?=$advance['staff_name']?></B></h4>
                          </div>
                          <div class="modal-body">
                          <?php
                      echo validation_errors();

                        if(isset($server_reply) && null !== $server_reply){
                          echo $server_reply;
                        }
                       $form_attributes = array('class'=>'form-horizontal','role'=>'form');
                       echo form_open_multipart('hr/accept_or_reject_advanceApplication', $form_attributes);
                      ?>

                                             <input type="hidden" class="form-control" id="advance_application_id" name="advance_application_id" required value="<?php echo $advance['advance_salary_applicationID'];?>" >
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-3 control-label" for="status">Application Status</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('status'); ?>
                                                    <select class="form-control m-bot15" required id="status" name="status" >
                                                        <option value="<?php echo $advance['status'];?>"><?php echo $advance['status'];?></option>
                                                        <option>Pending</option>
                                                        <option>Accepted</option>
                                                        <option>Rejected</option>
                                                       
                                                    </select>
                                                    <p class="help-block">Accept/Reject application</p>
                                                </div>
                                            </div>
                                                    <div class="form-group">
                                                    <label for="reason" class="control-label col-md-3">Accept/Reject Reason</label>
                                                    <div class="col-md-9">
                                                        <?php echo form_error('status_reason'); ?>
                                                        <textarea class="wysihtml5 form-control" type="text" id="status_reason" name="status_reason" rows="12" required>
                                                           <?php echo $advance['status_reason'];?>
                                                        </textarea>
                                                        <p class="help-block">Reason for accepting/Rejecting</p>
                                                    </div>
                                                </div>


                              <div class="form-group" style="margin-top:30px;">
                                  <button type="submit" class="col-lg-offset-3 col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6 col-lg-6 btn btn-primary nextBtn">Update Record<i class="fa fa-arrow-circle-right"></i></button>
                              </div>

                                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                                   <?php

                                    $count++;

                             
                           }

                          ?>
                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                               <th>#</th>
                                                <th>Employee Names</th>
                                                <th>Advance Reason</th>
                                                <th class="hidden-xs">Amount</th>
                                                <th class="hidden-xs">Last Net Salary</th>
                                                <th class="hidden-xs">Application Date</th>
                                                <th class="hidden-xs">Status</th>
                                                <th class="hidden-xs">Repay Method</th>
                                                <th>Advance decription</th>    
                                                <th>Approve/Reject</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /BOX -->
                    </div>
                </div>
                <div class="separator"></div>
            </div>
            <!-- /CONTENT-->
        </div>
    </div>
</div>
<!-- /CONTENT-->
<script src="<?= base_url()?>assets/js/jquery/jquery-2.0.3.min.js"></script>
<!-- DATA TABLES -->
<script type="text/javascript" src="<?= base_url()?>assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/datatables/media/assets/js/datatables.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>
 <script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
                <script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
                <script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
                <script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
                <script type="text/javascript" src="<?= base_url()?>assets/js/advanced-form-components.js"></script>
                <script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
                <script type="text/javascript" src="<?= base_url()?>assets/assets/fuelux/js/spinner.min.js"></script>
                <script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
                <script type="text/javascript" src="<?= base_url()?>assets/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
                <script type="text/javascript" src="<?= base_url()?>assets/assets/jquery-multi-select/js/jquery.multi-select.js"></script>
                <script type="text/javascript" src="<?= base_url()?>assets/assets/jquery-multi-select/js/jquery.quicksearch.js"></script>
                <!--this page  script only-->
                <script type="text/javascript" src="<?= base_url()?>assets/js/advanced-form-components.js"></script>
<!-- CUSTOM SCRIPT -->
  <script src="<?= base_url()?>assets/js/script.js"></script>
<script>
jQuery(document).ready(function() {
    App.setPage("dynamic_table"); //Set current page
    App.init(); //Initialise plugins and elements
});
</script>
<!-- /JAVASCRIPTS -->
