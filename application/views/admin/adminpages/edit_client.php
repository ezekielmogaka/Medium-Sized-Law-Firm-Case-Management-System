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
                                        <h3 class="form-title">New Client</h3>
                                        <?php
		                  echo validation_errors();

		                    if(isset($server_reply) && null !== $server_reply){
		                      echo $server_reply;
		                    }
		                   $form_attributes = array('class'=>'form-horizontal','role'=>'form');
		                   echo form_open_multipart('admin/submit_edited_client', $form_attributes);

		                   foreach ($client_details as $detail){
		                  ?>
                                            <input type="hidden" id="client_id" name="client_id" required value="<?php echo $detail['client_id'];?>">
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-3 control-label" for="client_type">Client type</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('client_type'); ?>
                                                    <select class="form-control m-bot15" required id="client_type" name="client_type" value="<?php echo $detail['client_type'];?>">
                                                        <option>Company</option>
                                                        <option>Individual</option>
                                                    </select>
                                                    <p class="help-block">Type of client</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="client_first_name" class="col-lg-3 col-sm-3 control-label">Client First Name</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <input type="text" class="form-control" id="client_first_name" name="client_first_name" required value="<?php echo $detail['client_firstName'];?>">
                                                    <p class="help-block">First Name of client</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="client_last_name" class="col-lg-3 col-sm-3 control-label">Client Last Name</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('client_last_name'); ?>
                                                    <input type="text" class="form-control" id="client_last_name" name="client_last_name" required value="<?php echo $detail['client_lastName'];?>">
                                                    <p class="help-block">Last Name of client</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 col-sm-3 control-label" for="client_county">County location of Client</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('client_county'); ?>
                                                    <select class="form-control m-bot15" required id="client_county" name="client_county" value="<?php echo $detail['client_countyName'];?>">
                                                        <option>Mombasa</option>
                                                        <option>Kwale</option>
                                                        <option>Kilifi</option>
                                                        <option>Tana River</option>
                                                        <option>Lamu</option>
                                                        <option>Taita Taveta</option>
                                                        <option>Garissa</option>
                                                        <option>Wajir</option>
                                                        <option>Mandera</option>
                                                        <option>Marsabit</option>
                                                        <option>Isiolo</option>
                                                        <option>Meru</option>
                                                        <option>Tharaka Nithi</option>
                                                        <option>Embu</option>
                                                        <option>Kitui</option>
                                                        <option>Machakos</option>
                                                        <option>Makueni</option>
                                                        <option>Nyandarua</option>
                                                        <option>Nyeri</option>
                                                        <option>Kirinyaga</option>
                                                        <option>Murang'a</option>
                                                        <option>Kiambu</option>
                                                        <option>Turkana</option>
                                                        <option>West Pokot</option>
                                                        <option>Samburu</option>
                                                        <option>Trans Nzoia</option>
                                                        <option>Uasin Gishu</option>
                                                        <option>Elgeyo/Marakwet</option>
                                                        <option>Nandi</option>
                                                        <option>Baringo</option>
                                                        <option>Laikipia</option>
                                                        <option>Nairobi City</option>
                                                        <option>Nakuru</option>
                                                        <option>Narok</option>
                                                        <option>Kajiado</option>
                                                        <option>Kericho</option>
                                                        <option>Bomet</option>
                                                        <option>Kakamega</option>
                                                        <option>Vihiga</option>
                                                        <option>Bung'oma</option>
                                                        <option>Busia</option>
                                                        <option>Siaya</option>
                                                        <option>Kisumu</option>
                                                        <option>Homa Bay</option>
                                                        <option>Migori</option>
                                                        <option>Kisii</option>
                                                        <option>Nyamira</option>
                                                    </select>
                                                    <p class="help-block">County Location of client</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="client_location" class="col-lg-3 col-sm-3 control-label">Nearest town</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('client_location'); ?>
                                                    <input type="text" class="form-control" id="client_location" name="client_location" required value="<?php echo $detail['client_location'];?>">
                                                    <p class="help-block">Geographical location of the Client</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="client_phone" class="col-lg-3 col-sm-3 control-label">Client Email</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php echo form_error('client_email'); ?>
                                                    <input type="email" class="form-control" id="client_email" name="client_email" required value="<?php echo $detail['client_email'];?>">
                                                    <p class="help-block">Client Email</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="client_phone" class="col-lg-3 col-sm-3 control-label">Client Phone</label>
                                                    <div class="col-lg-9 col-md-9 col-sm-9">
                                                        <?php echo form_error('client_phone'); ?>
                                                        <input type="text" class="form-control" id="client_phone" name="client_phone" required value="<?php echo $detail['client_phone'];?>">
                                                        <p class="help-block">Phone Number</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="client_description" class="control-label col-md-3">Client Description</label>
                                                    <div class="col-md-9">
                                                        <?php echo form_error('client_description'); ?>
                                                        <textarea class="wysihtml5 form-control" type="text" id="client_description" name="client_description" rows="12" required>
                                                            <?php echo $detail['client_description'];?>
                                                        </textarea>
                                                        <p class="help-block">Vivid description of the client</p>
                                                    </div>
                                                </div>
                                                <?php
          }

              ?>
                                                    <div class="form-group" style="margin-top:30px;">
                                                        <button type="submit" class="col-lg-offset-3 col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6 col-lg-6 btn btn-primary nextBtn">Update Client<i class="fa fa-arrow-circle-right"></i></button>
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
                    App.setPage("edit_client"); //Set current page
                    App.init(); //Initialise plugins and elements
                });
                </script>
                <!-- /JAVASCRIPTS -->
