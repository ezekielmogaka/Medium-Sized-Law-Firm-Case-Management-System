<link href="<?= base_url()?>assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet" />
<link href="<?= base_url()?>assets/assets/bootstrap-wysihtml5/wysiwyg-color.css" type="text/css" rel="stylesheet" />
<link href="<?= base_url()?>assets/assets/bootstrap-datepicker/css/datepicker.css" type="text/css" rel="stylesheet" />
<link href="<?= base_url()?>assets/assets/bootstrap-timepicker/compiled/timepicker.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
<!-- JQUERY -->
<script src="<?= base_url()?>assets/js/jquery/jquery-2.0.3.min.js"></script>
<div id="main-content">
    <!-- SAMPLE BOX CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="box-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Box Settings</h4>
                </div>
                <div class="modal-body">
                    Here goes box setting content.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /SAMPLE BOX CONFIGURATION MODAL FORM-->
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
                                    <a href="#">Cases/Matters</a>
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
                <!-- FORMS -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <div class="box border primary">
                                    <div class="box-title">
                                        <h4><i class="fa fa-unlink"></i><?=$page_title?></h4>
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
                                    <div class="box-body big">
                                        <?php

                            if(isset($server_reply) && null !== $server_reply){
                              echo $server_reply;
                            }
                           $form_attributes = array('class'=>'form-horizontal','role'=>'form');
                           echo form_open_multipart('main/submit_leave_application', $form_attributes);
                          ?>
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-3 control-label" for="leave_type">Type of Leave</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('leave_type'); ?>
                                                    <select class="form-control m-bot15" required id="leave_type" name="leave_type" value="<?= set_value('leave_type')?>">
                                                        <option value="">-- Please Select type of leave --</option>
                                                        <option>Annual Leave</option>
                                                        <option>Military Leave</option>
                                                        <option>Personal Leave</option>
                                                        <option>Paid Parental Leave(Maternity)</option>
                                                        <option>Workers' compensation</option>
                                                        <option>Sick Leave</option>
                                                    </select>
                                                    <p class="help-block">Indicate type of leave</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-3 control-label" for="paid_leave">Paid Leave?</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('paid_leave'); ?>
                                                    <select class="form-control m-bot15" required id="paid_leave" name="paid_leave" value="<?= set_value('paid_leave')?>">
                                                        <option value="">-- Please choose yes or no if leave is paid or not --</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                    <p class="help-block">Please choose yes or no if leave is paid </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="leaveStartDate">Leave Start Date</label>
                                                <div class="col-md-4">
                                                    <?php echo form_error('leaveStartDate'); ?>
                                                    <div data-date="2012-12-21T15:25:00Z" class="input-group date form_datetime-meridian">
                                                        <input type="text" class="form-control" size="16" value="" required id="leaveStartDate" name="leaveStartDate" value="<?= set_value('leaveStartDate')?>">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-info date-set"><i class="fa fa-calendar"></i></button>
                                                        </div>
                                                    </div>
                                                    <p class="help-block">When do you expect your leave to start?</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="leave_duration" class="col-lg-3 col-sm-3 control-label">Leave Duration(In months)</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('leave_duration'); ?>
                                                    <input type="text" class="form-control" id="leave_duration" name="leave_duration" required value="<?= set_value('leave_duration')?>">
                                                    <p class="help-block">In months, Leave Duration</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="attorney_notes" class="control-label col-md-3">Leave Application in 200 words</label>
                                                <div class="col-md-9">
                                                    <?php echo form_error('leave_description'); ?>
                                                    <textarea class="wysihtml5 form-control" type="text" id="leave_description" name="leave_description" placeholder="Describe your Leave in 200 words" rows="13" required value="<?= set_value('leave_description')?>">
                                                        <?= set_value('leave_description')?>
                                                    </textarea>
                                                    <p class="help-block">Describe your Leave in 200 words</p>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-top:30px;">
                                                <button type="submit" class="col-lg-offset-3 col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6 col-lg-6 btn btn-primary nextBtn">Submit Leave Application<i class="fa fa-arrow-circle-right"></i></button>
                                            </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            <script>
            jQuery(document).ready(function() {
                App.setPage("leave_form"); //Set current page
                App.init(); //Initialise plugins and elements
            });
            </script>
            <!-- /JAVASCRIPTS -->
