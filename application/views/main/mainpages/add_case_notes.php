 <link href="<?= base_url()?>assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" type="text/css" rel="stylesheet" />
 <link href="<?= base_url()?>assets/assets/bootstrap-wysihtml5/wysiwyg-color.css" type="text/css" rel="stylesheet" />
 <link href="<?= base_url()?>assets/assets/bootstrap-datepicker/css/datepicker.css" type="text/css" rel="stylesheet" />
  <link href="<?= base_url()?>assets/assets/bootstrap-timepicker/compiled/timepicker.css" type="text/css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/assets/bootstrap-datetimepicker/css/datetimepicker.css" />

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
                url: "http://localhost/firm/index.php/main/get_matter_subcategories/"+matter_category_id, //here we are calling our Admin controller and get_matter_subcategories method passing the matter_category_id
 
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
											<a href="#"><?=$page_title?></a>
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
									<div class="col-md-1">

										
									</div>
									<div class="col-md-10">
										<div class="box border primary">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Case Notes</h4>
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
												<h3 class="form-title"></h3>

												 <?php
                                  if(isset($server_reply) && null !== $server_reply){
                                    echo $server_reply;
                                  }
                                 $form_attributes = array('class'=>'form-horizontal','role'=>'form');
                                 echo form_open_multipart('main/add_case_notes', $form_attributes);
                                 echo validation_errors();
                                ?>

               
               <div class="form-group">


                        <label class="control-label col-md-1" for="case_notes">Case Notes</label>
                        <div class="col-md-11">
                        <?php echo form_error('case_notes'); ?>
                            <textarea class="wysihtml5 form-control" type="text" id="case_notes" name ="case_notes" rows="15" required>
                               <?= set_value('case_notes')?> 
                            </textarea>
                             <p class="help-block">Case Notes</p>
                        </div>
                    </div>

                     <div class="form-group">
                  <label for="matter_id" class="col-lg-1 col-sm-1 control-label"></label>
                  <div class="col-lg-11 col-md-11 col-sm-11">
                  <?php echo form_error('matter_id'); ?>
                      <input type="hidden" class="form-control" id="matter_id" name="matter_id" required value="<?= $matter_id?>" value="<?= set_value('matter_id')?>" readonly>
                      
                  </div>
              </div>




              


              <div class="form-group" style="margin-top:30px;">
                <button type="submit" class="col-lg-offset-3 col-md-offset-3 col-md-6  col-sm-offset-3 col-sm-6 col-lg-6 btn btn-primary nextBtn">Submit Notes<i class="fa fa-arrow-circle-right"></i></button>              	
              </div>




            
    
												 
												 </form>
											</div>
										</div>
										
									</div>
									<div class="col-md-1">

										
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