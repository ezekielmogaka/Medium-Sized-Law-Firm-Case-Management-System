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
                                    <a href="#">Attorneys</a>
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
                                        <h4><i class="fa fa-bars"></i><?=$page_title?></h4>
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
                           echo form_open_multipart('admin/submit_new_attorney', $form_attributes);
                          ?>
                                            <div class="form-group">
                                                <label for="attorney_first_name" class="col-lg-3 col-sm-3 control-label">Attorney First Name</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <input type="text" class="form-control" id="attorney_first_name" name="attorney_first_name" required value="<?= set_value('client_first_name')?>">
                                                    <p class="help-block">First Name of attorney</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="attorney_last_name" class="col-lg-3 col-sm-3 control-label">Attorney Last Name</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('attorney_last_name'); ?>
                                                    <input type="text" class="form-control" id="client_last_name" name="attorney_last_name" required value="<?= set_value('attorney_last_name')?>">
                                                    <p class="help-block">Last Name of attorney</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="birthDate">Date of Birth</label>
                                                <div class="col-md-4">
                                                    <?php echo form_error('birthDate'); ?>
                                                    <div data-date="2012-12-21T15:25:00Z" class="input-group date form_datetime-meridian">
                                                        <input type="text" class="form-control" size="16" value="" required id="birthDate" name="birthDate">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-info date-set"><i class="fa fa-calendar"></i></button>
                                                        </div>
                                                    </div>
                                                    <p class="help-block">Birth Date</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-3 control-label" for="attorney_speciality">Speciality</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('attorney_speciality'); ?>
                                                    <select class="form-control m-bot15" required id="attorney_speciality" name="attorney_speciality">
                                                        <option value="">-- Please Select Attorney Speciality --</option>
                                                        <option>Criminal Law</option>
                                                        <option>Civil Law</option>
                                                        <option>Commercial Law</option>
                                                    </select>
                                                    <p class="help-block">Attorney Speciality</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-3 control-label" for="attorney_speciality">Employment Status</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('employment_status'); ?>
                                                    <select class="form-control m-bot15" required id="employment_status" name="employment_status">
                                                        <option value="">-- Please Employment Status --</option>
                                                        <option>Permanent</option>
                                                        <option>Casual/Temporary</option>
                                                    </select>
                                                    <p class="help-block">Employment Status</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="attorney_phone" class="col-lg-3 col-sm-3 control-label">Attorney Phone</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('attorney_phone'); ?>
                                                    <input type="text" class="form-control" id="attorney_phone" name="attorney_phone" required value="<?= set_value('attorney_phone')?>">
                                                    <p class="help-block">Phone Number</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" for="employmentDate">Date of Employment</label>
                                                <div class="col-md-4">
                                                    <?php echo form_error('employmentDate'); ?>
                                                    <div data-date="2012-12-21T15:25:00Z" class="input-group date form_datetime-meridian">
                                                        <input type="text" class="form-control" size="16" value="" required id="employmentDate" name="date_created">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                                                            <button type="button" class="btn btn-info date-set"><i class="fa fa-calendar"></i></button>
                                                        </div>
                                                    </div>
                                                    <p class="help-block">Empoyment Date</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="attorney_phone" class="col-lg-3 col-sm-3 control-label">NSSF Number</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('nssfNo'); ?>
                                                    <input type="text" class="form-control" id="nssfNo" name="nssfNo" required value="<?= set_value('nssfNo')?>">
                                                    <p class="help-block">NSSF No.</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="nhifNo" class="col-lg-3 col-sm-3 control-label">NHIF Number</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('nhifNo'); ?>
                                                    <input type="text" class="form-control" id="nhifNo" name="nhifNo" required value="<?= set_value('nhifNo')?>">
                                                    <p class="help-block">NHIF No.</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="attorney_phone" class="col-lg-3 col-sm-3 control-label">Attorney Email</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('attorney_email'); ?>
                                                    <input type="email" class="form-control" id="attorney_email" name="attorney_email" required value="<?= set_value('attorney_email')?>">
                                                    <p class="help-block">Email</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="attorney_password" class="col-lg-3 col-sm-3 control-label">Password</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('attorney_password'); ?>
                                                    <input type="password" class="form-control" id="attorney_password" name="attorney_password" required value="<?= set_value('attorney_password')?>">
                                                    <p class="help-block">Password</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="attorney_notes" class="control-label col-md-3">Attorney Profile</label>
                                                <div class="col-md-9">
                                                    <?php echo form_error('attorney_notes'); ?>
                                                    <textarea class="wysihtml5 form-control" type="text" id="attorney_notes" name="attorney_notes" placeholder="Attorney profile e.g Educational backgroung......" rows="12" required>
                                                        <?= set_value('attorney_notes')?>
                                                    </textarea>
                                                    <p class="help-block">Attorney Profile</p>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-top:30px;">
                                                <label for="attorney_cv" class="col-lg-3 col-sm-3 control-label">Attorney CV</label>
                                                <div class="col-lg-6">
                                                    <?php
                        if(isset($server_reply_file) && null !==$server_reply_file){
                          echo $server_reply_file;
                        }
                        ?>
                                                        <input type="file" class="form-control" id="attorney_cv" name="attorney_cv" required value="<?php echo set_value('attorney_cv'); ?>">
                                                        <p class="help-block">Upload Attorney CV here...</p>
                                                </div>
                                                <div class="col-lg-3">
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-top:30px;">
                                                <label for="scannned_id" class="col-lg-3 col-sm-3 control-label">Scanned ID/Passport</label>
                                                <div class="col-lg-6">
                                                    <?php
                        if(isset($server_reply_file) && null !==$server_reply_file){
                          echo $server_reply_file;
                        }
                        ?>
                                                        <input type="file" class="form-control" id="scannned_id" name="scannned_id" required value="<?php echo set_value('scannned_id'); ?>">
                                                        <p class="help-block">Upload Scanned Passport/ID here...</p>
                                                </div>
                                                <div class="col-lg-3">
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-top:30px;">
                                                <button type="submit" class="col-lg-offset-3 col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6 col-lg-6 btn btn-primary nextBtn">Save Attorney<i class="fa fa-arrow-circle-right"></i></button>
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
                App.setPage("add_new_matter"); //Set current page
                App.init(); //Initialise plugins and elements
            });
            </script>
            <!-- /JAVASCRIPTS -->
