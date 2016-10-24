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
                                        <h4><i class="fa fa-dollar"></i><?=$page_title?></h4>
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
		                  echo validation_errors();

		                    if(isset($server_reply) && null !== $server_reply){
		                      echo $server_reply;
		                    }
		                   $form_attributes = array('class'=>'form-horizontal','role'=>'form');
		                   echo form_open_multipart('main/submit_advanceSalary_application',$form_attributes);
		                  ?>
                                            <div class="form-group">
                                                <label for="application_reason" class="col-lg-3 col-sm-3 control-label">Reason for Applying</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('application_reason'); ?>
                                                    <input type="text" class="form-control" id="application_reason" name="application_reason" required value="<?= set_value('application_reason')?>">
                                                    <p class="help-block">Reason for Applying for Salary Advance</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="amount" class="col-lg-3 col-sm-3 control-label">Amount(Ksh.)</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('amount'); ?>
                                                    <input type="number" class="form-control" id="amount" name="amount" step='50' required value="<?= set_value('amount')?>">
                                                    <p class="help-block">Amount applying for....</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="last_net_salary" class="col-lg-3 col-sm-3 control-label">Last Net Salary(Ksh.)</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('last_net_salary'); ?>
                                                    <input type="number" class="form-control" id="last_net_salary" name="last_net_salary" step='50' required value="<?= set_value('last_net_salary')?>">
                                                    <p class="help-block">Last Net salary Received</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="receiving_date">Expected date of receiving the advance</label>
                                                <div class="col-md-4">
                                                    <?php echo form_error('leaveStatartDate'); ?>
                                                    <div data-date="2012-12-21T15:25:00Z" class="input-group date form_datetime-meridian">
                                                        <input type="text" class="form-control" size="16" value="" required id="receiving_date" name="receiving_date">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-info date-set"><i class="fa fa-calendar"></i></button>
                                                        </div>
                                                    </div>
                                                    <p class="help-block">When do you expect to receive the advance salary?</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-3 control-label" for="repay_method">How to repay</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('repay_method'); ?>
                                                    <select class="form-control m-bot15" required id="repay_method" name="repay_method">
                                                        <option value="">-- Please Select repay method --</option>
                                                        <option>One payroll deduction in the following month</option>
                                                        <option>Installmentsfrom next pay periods</option>
                                                    </select>
                                                    <p class="help-block">How do you expect to repay the advance salary?</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="attorney_notes" class="control-label col-md-3">Purpose of advance</label>
                                                <div class="col-md-9">
                                                    <?php echo form_error('advance_purpose_description'); ?>
                                                    <textarea class="wysihtml5 form-control" type="text" id="advance_purpose_description" name="advance_purpose_description" placeholder="Describe purpose of the advance salary application" rows="10" required>
                                                        <?= set_value('advance_purpose_description')?>
                                                    </textarea>
                                                    <p class="help-block">Describe purpose of the advance salary application</p>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-top:30px;">
                                                <button type="submit" class="col-lg-offset-3 col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6 col-lg-6 btn btn-primary nextBtn">Submit advance application<i class="fa fa-arrow-circle-right"></i></button>
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
            <script src="<?= base_url()?>assets/js/jquery/jquery-2.0.3.min.js"></script>
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
