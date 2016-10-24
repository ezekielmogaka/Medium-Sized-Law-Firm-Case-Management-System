				<!-- /SIDEBAR -->
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
											<a href="<?= base_url()?>/index.php/admin">Home</a>
										</li>
										<li>Calendar</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Calendar</h3>
									</div>
									<div class="description">Dates and Events</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- CALENDAR -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border">
									<div class="box-title">
										<h4><i class="fa fa-calendar"></i>My Calendar</h4>
										<div class="tools">
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
										<div class="row">
											<!-- <div class="col-md-3">
												<div class="input-group">
													 <input type="text" value="" class="form-control" placeholder="Event Event Title..." id="event-title" />
													 <span class="input-group-btn">
														<a href="javascript:;" id="add-event" class="btn btn-success">Add Event</a>
													 </span>
											    </div>
												<div class="divide-20"></div>
												<div id='external-events'>
													<h4>Draggable Events</h4>
													<div id="event-box">
														<div class='external-event'>See Proff</div>
														<div class='external-event'>See Client 1</div>
														<div class='external-event'>My Event 3</div>
														<div class='external-event'>My Event 4</div>
														<div class='external-event'>My Event 5</div>
													</div>
													<p>
													<input type='checkbox' id='drop-remove' class="uniform"/> <label for='drop-remove'>remove after drop</label>
													</p>
												</div>
											</div> -->
											<div class="col-md-12">
												<div id='calendar'></div>
											</div>
										</div>
									</div>
								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- /CALENDAR -->
						
					</div><!-- /CONTENT-->
				</div>
			</div>
		</div>

		<!-- Event Modal -->
		<div class = "hide">
			<div class id = "createEvent" class = "cbox_content">
				 <h6 class="widget-header text-center" style = "background:#0E8FAB;color:white;border-radius:10px;">
		        	Create Event
		        </h6>
			    <div class="sepH_c tac">
				    <form id="createAppointmentForm" class="form-horizontal">
				        <div class="control-group">
				            <label class="control-label" for="inputPatient">Event:</label>
				            <div class="controls">
				                <input type="text" name="event" id="event" class="input-xlarge" style = "height:2.5em;"
				                placeholder = "E.g Event">

				                <input type="hidden" name="	attorney_id" id="attorney_id" value = "<?php echo $this->session->userdata('attorney_id');}?>" />
				            	<input type="hidden" name="eventStartTime" id="eventStartTime" />
				            	<input type="hidden" id="eventEndTime" />
				            	<input type="hidden" id="eventAllDay" />
				            </div>
				        </div>
				        <div class="control-group">
				            <label class="control-label" for="inputPatient">Description:</label>
				            <!-- <div class="controls">
				            	<textarea name="farm_activity_description" id="txtarea_limit_chars" cols="30" rows="3" class="input-xlarge"></textarea>
				            </div> -->
				        </div>
				        <div class="control-group formSep">
				            <label class="control-label" for="when">When:</label>
				            <div class="controls controls-row" id="when" style="margin-top:2px;font-size:9pt">
				            </div>
				        </div>
				    </form>
			    </div>
			    <div class="tac">
			    	<button type="submit" class="btn btn-gebo" id="submitEvent" style = "background:green">Save</button>
			        <button class="btn btn-gebo" id = "cancelEvent" style = "background:brown">Cancel</button>
			    </div>
				
			</div>
		</div>

			<!-- JQUERY -->
	<script src="<?= base_url()?>assets/js/jquery/jquery-2.0.3.min.js"></script>


		<script>
		jQuery(document).ready(function() {		
			App.setPage("calendar");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>