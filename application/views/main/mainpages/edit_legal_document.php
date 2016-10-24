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
                                        <h4><i class="fa fa-bars"></i>Edit Legal Documents</h4>
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
                             $form_attributes = array('class'=>'form-horizontal tasi-form','role'=>'form', 'method'=>'POST');
                             echo form_open_multipart('main/submit_new_legal_document', $form_attributes);

                             foreach ($package as $detail){
                            ?>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Document Name</label>
                                                <div class="col-sm-10">
                                                    <?php
                        if(isset($server_reply) && null !==$server_reply){
                          echo $server_reply;
                        }
                        ?>
                                                        <input type="text" class="form-control" id="legal_document_name" name="legal_document_name" value="<?php echo $doc_detail['legal_document_name'];?>" required />
                                                        <p class="help-block">Descriptive name of the legal Document</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Document Category</label>
                                                <div class="col-lg-10">
                                                    <?php
                                                foreach ($document_categoryname as $cat_name){

                                                ?>
                                                        <select class="form-control m-bot15" id="document_category" name="document_category" required>
                                                            <?php
                                                        foreach ($document_categoryname as $cat_name){
                                                        echo "<option value='".$cat_name['legal_document_cat_id']."'>".$cat_name['legal_document_cat_name']."</option>";
                                                            }
                                                            ?>
                                                                <?php
                                                                foreach ($categories as $category) { 
                                                                	echo "<option value='".$category[' legal_document_cat_id ']."'>".$category['legal_document_cat_name']."</option>"; } ?>
                                                        </select>
                                                        <?php
                                                }

                                                    ?>
                                                            <p class="help-block">Select Document Category</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Legal Document Description</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <?php
                        if(isset($server_reply) && null !==$server_reply){
                          echo $server_reply;
                        }
                        ?>
                                                        <textarea class="wysihtml5 form-control" rows="10" id="legal_document_description" name="legal_document_description" value="<?php echo set_value('legal_document_description'); ?>" required>
                                                            <?php echo $doc_detail['legal_document_description'];?>
                                                        </textarea>
                                                        <p class="help-block">Description of the legal Document</p>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-top:30px;">
                                                <label for="documentfile" class="col-lg-3 col-sm-3 control-label">Document Upload</label>
                                                <div class="col-lg-6">
                                                    <?php
                        if(isset($server_reply_file) && null !==$server_reply_file){
                          echo $server_reply_file;
                        }
                        ?>
                                                        <input type="file" class="form-control" id="documentfile" name="documentfile" required value="<?php echo $doc_detail['document_full_path'];?>">
                                                        <p class="help-block">Upload the legal document Here...</p>
                                                </div>
                                                <div class="col-lg-3">
                                                </div>
                                            </div>
                                            <?php
          }

              ?>
                                                <div class="form-group" style="margin-top:30px;">
                                                    <button type="submit" class="col-lg-offset-3 col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6 col-lg-6 btn btn-primary nextBtn">Update Document<i class="fa fa-arrow-circle-right"></i></button>
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
                App.setPage("edit_legal_document"); //Set current page
                App.init(); //Initialise plugins and elements
            });
            </script>
            <!-- /JAVASCRIPTS -->
