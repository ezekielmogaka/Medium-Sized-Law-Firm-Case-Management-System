 <link href="<?= base_url()?>assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet" />
 <link href="<?= base_url()?>assets/assets/bootstrap-wysihtml5/wysiwyg-color.css" type="text/css" rel="stylesheet" />
 <link href="<?= base_url()?>assets/assets/bootstrap-datepicker/css/datepicker.css" type="text/css" rel="stylesheet" />
  <link href="<?= base_url()?>assets/assets/bootstrap-timepicker/compiled/timepicker.css" type="text/css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/assets/bootstrap-datetimepicker/css/datetimepicker.css" />

   <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/cloud-admin.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/themes/default.css" id="skin-switcher">
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/responsive.css">
    <link href="<?= base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- DATE RANGE PICKER -->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <!-- TYPEAHEAD -->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/typeahead/typeahead.css" />
    <!-- FILE UPLOAD -->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/bootstrap-fileupload/bootstrap-fileupload.min.css" />
    <!-- SELECT2 -->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/select2/select2.min.css" />
    <!-- UNIFORM -->
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/uniform/css/uniform.default.min.css" />
    <!-- JQUERY UPLOAD -->
    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="<?= base_url()?>assets/js/blueimp/gallery/blueimp-gallery.min.css">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="<?= base_url()?>assets/js/jquery-upload/css/jquery.fileupload.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/js/jquery-upload/css/jquery.fileupload-ui.css">

	<!-- JQUERY -->
	<script src="<?= base_url()?>assets/js/jquery/jquery-2.0.3.min.js"></script>
	<script type="text/javascript">
  
  $(document).ready(function(){
        $('#matter_category').change(function(){ //any select change on the dropdown with id matter_category trigger this code
            $("#matter_subcategory > option").remove(); //first of all clear select items
            var matter_category_id = $('#matter_category').val();  // here we are taking matter_category id of the selected one.

            if(matter_category_id == '#'){
                return false; // return false after clearing sub matter_category if 'please select was chosen'
            }

            $.ajax({
                type: "POST",
                url: "http://localhost/e-lawfirm/index.php/admin/get_matter_subcategories/"+matter_category_id, //here we are calling our Admin controller and get_matter_subcategories method passing the matter_category_id
 
                success: function(matter_subcategory) //we're calling the response json array 'matter_subcategory'
                {
                    $.each(matter_subcategory,function(id,value) //here we're doing a foeach loop round each subcategory with id as the key and value as the value
                    {
                        var opt = $('<option />'); // here we're creating a new select option for each suboption
                        opt.val(id);
                        opt.text(value);
                        $('#matter_subcategory').append(opt); //here we will append these new select matter_category to a dropdown with the id 'subcategories'
                    });

                }
 
            });
 
        });
    });


</script>


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
										<li><?=$page_title?></li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left"><?=$page_title?></h3>
									</div>
									<div class="description">Matter Intake</div>
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
												<h4><i class="fa fa-bars"></i>Matter Intake</h4>
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
												<h3 class="form-title">Add a new case</h3>

												 <?php
                                  if(isset($server_reply) && null !== $server_reply){
                                    echo $server_reply;
                                  }
                                 $form_attributes = array('class'=>'form-horizontal','role'=>'form');
                                 echo form_open_multipart('admin/submit_new_casematter', $form_attributes);
                                 echo validation_errors();
                                ?>

												 <div class="form-group">
                                      <label class="col-lg-3 col-sm-3 control-label" for="matter_category">Matter/Case Category</label>
                                      <div class="col-lg-9 col-md-9 col-sm-9">

                                      <?php echo form_error('matter_category'); ?>
                                         
                                          <select class="form-control m-bot15" id="matter_category" name="matter_category" value="<?php echo set_value('matter_category'); ?>" required>
                                          <option value="">-- Please Select Case Category --</option>
                                         
                                          <?php
                                          foreach($matter_category as $category){
                                              echo '<option value="' . $category->matter_category_id . '">' . $category->matter_category_name . '</option>';
                                          }
                                          ?>
                                      </select>
                                    <p class="help-block">Case Category</p>
                                          
                                      </div>

                                  </div>



                                   <div class="form-group">
                          <label class="col-lg-3 col-sm-3 control-label" for="matter_subcategory">Matter/Case Subcategory</label>
                          <div class="col-lg-9 col-md-9 col-sm-9">
                          <?php echo form_error('matter_subcategory'); ?>
                             

                            
                              <select class="form-control m-bot15" id="matter_subcategory" name="matter_subcategory" value="<?php echo set_value('matter_subcategory'); ?>" required>
                                  <option value="#">-- Please Select Sub-categories --</option>
                                  
                              </select>
                              <p class="help-block">Case Subcategories</p>
                              
                          </div>

                      </div>



              <div class="form-group">
                  <label for="matter_name" class="col-lg-3 col-sm-3 control-label">Matter/case Name</label>
                  <div class="col-lg-9 col-md-9 col-sm-9">
                  <?php echo form_error('matter_name'); ?>
                      <input type="text" class="form-control" id="matter_name" name="matter_name" required value="<?= set_value('matter_name')?>" >
                      <p class="help-block">Descriptive name of the case/matter</p>
                  </div>
              </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="incident_date">Date of incident</label>
                  <div class="col-md-4">
                  <?php echo form_error('incident_date'); ?>
                      <div data-date="2012-12-21T15:25:00Z" class="input-group date form_datetime-meridian">
                          <input type="text" class="form-control"   size="16" value="<?php echo set_value('incident_date'); ?>" required id="incident_date" name="incident_date">
                          
                           <div class="input-group-btn">
                                <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                                <button type="button" class="btn btn-warning date-set"><i class="fa fa-calendar"></i></button>
                                 
                            </div>

                      </div>
                       <p class="help-block">The date that the incident happened</p>
                  </div>
              </div>



                <div class="form-group">
                  <label class="control-label col-md-3" for="date_created">Date Created</label>
                  <div class="col-md-4">
                  <?php echo form_error('date_created'); ?>
                      <div data-date="2012-12-21T15:25:00Z" class="input-group date form_datetime-meridian">
                          <input type="text" class="form-control"   size="16" value="" required id="date_created" name="date_created">
                          
                          <div class="input-group-btn">
                              <button type="button" class="btn btn-danger date-reset"><i class="fa fa-times"></i></button>
                              <button type="button" class="btn btn-info date-set"><i class="fa fa-calendar"></i></button>

                          </div>

                      </div>
                       <p class="help-block">Date the case was created</p>
                  </div>
              </div>


               <div class="form-group">
                  <label for="case_location" class="col-lg-3 col-sm-3 control-label">Location of incident</label>
                  <div class="col-lg-9 col-md-9 col-sm-9">
                  <?php echo form_error('case_location'); ?>
                      <input type="text" class="form-control" id="case_location" name="case_location" required value="<?= set_value('case_location')?>" >
                      <p class="help-block">Geographical location of the incident</p>
                  </div>
              </div>

               <div class="form-group">
                  <label for="defendant" class="col-lg-3 col-sm-3 control-label">Defendant</label>
                  <div class="col-lg-9 col-md-9 col-sm-9">
                   <?php echo form_error('defendant'); ?>
                      <input type="text" class="form-control" id="defendant" name="defendant" required value="<?= set_value('defendant')?>" >
                      <p class="help-block">The defendant</p>
                  </div>
              </div>


               <div class="form-group">

                        <label class="control-label col-md-3" for="matter_description">Matter Description</label>
                        <div class="col-md-9">
                        <?php echo form_error('matter_description'); ?>
                            <textarea class="wysihtml5 form-control" type="text" id="matter_description" name ="matter_description" rows="12" required>
                               <?= set_value('matter_description')?> 
                            </textarea>
                             <p class="help-block">Vivid description of the case/matter</p>
                        </div>
                    </div>



                      <div class="form-group">
                  <label class="col-lg-3 col-sm-3 control-label" for="matter_status">Matter/Case status</label>
                  <div class="col-lg-9 col-md-9 col-sm-9">
                  <?php echo form_error('matter_status'); ?>
          
                      <select class="form-control m-bot15" required id="matter_status" name ="matter_status">
                          <option>Open</option>
                          <option>Closed</option>
                          <option>Pending</option>
                      </select>
                      <p class="help-block">Case status</p>
                      
                  </div>

              </div>


              <div class="form-group">
                    <label class="col-lg-3 col-sm-3 control-label" for="billable">Billable</label>
                    <div class="col-lg-9 col-md-9 col-sm-9">
                    <?php echo form_error('billable'); ?>
                       

                      
                        <select class="form-control m-bot15" required id="billable" name ="billable">
                            <option>Yes</option>
                            <option>No</option>
                            
                        </select>
                        <p class="help-block">Is the case Billable?</p>
                       
                    </div>
                </div>


                 <div class="form-group">
              <label class="col-lg-3 col-sm-3 control-label" for="client_id">Client</label>
              <div class="col-lg-9 col-md-9 col-sm-9">
              <?php echo form_error('client_id'); ?>
       
                  <select class="form-control m-bot15 spinner" id="client_id" name="client_id" required>
                  <option value="">-- Client Name --</option>
                 
                  <?php
                  foreach($clients as $cl){
                      echo '<option value="' . $cl->client_id . '">' . $cl->client_firstName . ' ' .$cl->client_lastName .'</option>';
                  }
                  ?>
              </select>
            <p class="help-block">Client</p>
                  
              </div>

          </div>

                          


           <div class="form-group">
                  <label class="col-lg-3 col-sm-3 control-label" for="urgency">Urgency</label>
                  <div class="col-lg-9 col-md-9 col-sm-9">
                  <?php echo form_error('urgency'); ?>
                    
                      <select class="form-control m-bot15" required id="urgency" name ="urgency">
                          <option>Urgent</option>
                          <option>Not urgent</option>
                          
                      </select>
                      <p class="help-block">Is the case urgent?</p>
                     
                  </div>
              </div>

             


              <div class="form-group" style="margin-top:30px;">
                <button type="submit" class="col-lg-offset-3 col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6 col-lg-6 btn btn-primary nextBtn">Submit Case<i class="fa fa-arrow-circle-right"></i></button>              	
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
			App.setPage("add_new_matter");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->