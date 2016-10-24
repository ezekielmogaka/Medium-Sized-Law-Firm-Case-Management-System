 <!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>e-Law Firm</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	

	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/cloud-admin.css" >
	<link rel="stylesheet" type="text/css"  href="<?= base_url()?>assets/css/themes/default.css" id="skin-switcher" >
	<link rel="stylesheet" type="text/css"  href="<?= base_url()?>assets/css/themes/default.css" id="skin-switcher" >




	-->
	<link rel="stylesheet" type="text/css"  href="<?= base_url()?>assets/css/responsive.css" >
	<!-- STYLESHEETS --><!--[if lt IE 9]><script src="js/flot/excanvas.min.js"></script><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
	<link href="<?= base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- ANIMATE -->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/css/animatecss/animate.min.css" />

	<!-- DATE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/datepicker/themes/default.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/datepicker/themes/default.date.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/datepicker/themes/default.time.min.css" />
	<!-- DATE RANGE PICKER -->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
	<!-- TODO -->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/jquery-todo/css/styles.css" />
	<!-- FULL CALENDAR -->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/fullcalendar/fullcalendar.min.css" />
	<!-- GRITTER -->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/gritter/css/jquery.gritter.css" />
	<!-- FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

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

	<!-- DATA TABLES -->
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/datatables/media/assets/css/datatables.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
</head>


 <body>
    <section id="page">
      <?php
        include 'includes/header.php';
        include 'includes/sidebar.php';
        include 'adminpages/'.$page;
        include 'includes/footer.php';

      ?>
      </section>
      </body>

     




      <!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- JQUERY -->
	<script src="<?= base_url()?>assets/js/jquery/jquery-2.0.3.min.js"></script>
	<!-- JQUERY UI-->
	<script src="<?= base_url()?>assets/js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
	<!-- BOOTSTRAP -->
	<script src="<?= base_url()?>assets/bootstrap-dist/js/bootstrap.min.js"></script>

	<!-- DATE PICKER -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/datepicker/picker.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/datepicker/picker.date.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/datepicker/picker.time.js"></script>
	
		
	<!-- DATE RANGE PICKER -->
	<script src="<?= base_url()?>assets/js/bootstrap-daterangepicker/moment.min.js"></script>
	
	<script src="<?= base_url()?>assets/js/bootstrap-daterangepicker/daterangepicker.min.js"></script>
	
	<!-- SLIMSCROLL -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/jQuery-slimScroll-1.3.0/slimScrollHorizontal.min.js"></script>
	<!-- BLOCK UI -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/jQuery-BlockUI/jquery.blockUI.min.js"></script>
	<!-- SPARKLINES -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/sparklines/jquery.sparkline.min.js"></script>
	<!-- EASY PIE CHART -->
	<script src="<?= base_url()?>assets/js/jquery-easing/jquery.easing.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/easypiechart/jquery.easypiechart.min.js"></script>
	<!-- FLOT CHARTS -->
	<script src="<?= base_url()?>assets/js/flot/jquery.flot.min.js"></script>
	<script src="<?= base_url()?>assets/js/flot/jquery.flot.time.min.js"></script>
    <script src="<?= base_url()?>assets/js/flot/jquery.flot.selection.min.js"></script>
	<script src="<?= base_url()?>assets/js/flot/jquery.flot.resize.min.js"></script>
    <script src="<?= base_url()?>assets/js/flot/jquery.flot.pie.min.js"></script>
    <script src="<?= base_url()?>assets/js/flot/jquery.flot.stack.min.js"></script>

	<!-- TYPEHEAD -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/typeahead/typeahead.min.js"></script>
	<!-- AUTOSIZE -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/autosize/jquery.autosize.min.js"></script>
	<!-- COUNTABLE -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/countable/jquery.simplyCountable.min.js"></script>
	<!-- INPUT MASK -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	<!-- FILE UPLOAD -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
	<!-- SELECT2 -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/select2/select2.min.js"></script>
	<!-- UNIFORM -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/uniform/jquery.uniform.min.js"></script>
	<!-- JQUERY UPLOAD -->
	<!-- The Templates plugin is included to render the upload/download listings -->
	<script src="<?= base_url()?>assets/js/blueimp/javascript-template/tmpl.min.js"></script>
	<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
	<script src="<?= base_url()?>assets/js/blueimp/javascript-loadimg/load-image.min.js"></script>
	<!-- The Canvas to Blob plugin is included for image resizing functionality -->
	<script src="<?= base_url()?>assets/js/blueimp/javascript-canvas-to-blob/canvas-to-blob.min.js"></script>
	<!-- blueimp Gallery script -->
	<script src="<?= base_url()?>assets/js/blueimp/gallery/jquery.blueimp-gallery.min.js"></script>
	<!-- The basic File Upload plugin -->
	<script src="<?= base_url()?>assets/js/jquery-upload/js/jquery.fileupload.min.js"></script>
	<!-- The File Upload processing plugin -->
	<script src="<?= base_url()?>assets/js/jquery-upload/js/jquery.fileupload-process.min.js"></script>
	<!-- The File Upload image preview & resize plugin -->
	<script src="<?= base_url()?>assets/js/jquery-upload/js/jquery.fileupload-image.min.js"></script>
	<!-- The File Upload audio preview plugin -->
	<script src="<?= base_url()?>assets/js/jquery-upload/js/jquery.fileupload-audio.min.js"></script>
	<!-- The File Upload video preview plugin -->
	<script src="<?= base_url()?>assets/js/jquery-upload/js/jquery.fileupload-video.min.js"></script>
	<!-- The File Upload validation plugin -->
	<script src="<?= base_url()?>assets/js/jquery-upload/js/jquery.fileupload-validate.min.js"></script>
	<!-- The File Upload user interface plugin -->
	<script src="<?= base_url()?>assets/js/jquery-upload/js/jquery.fileupload-ui.min.js"></script>
	<!-- The main application script -->
	<script src="<?= base_url()?>assets/js/jquery-upload/js/main.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>


    <script src="<?= base_url()?>assets/js/flot/jquery.flot.crosshair.min.js"></script>
	<!-- TODO -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/jquery-todo/js/paddystodolist.js"></script>
	<!-- TIMEAGO -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/timeago/jquery.timeago.min.js"></script>
	<!-- FULL CALENDAR -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/fullcalendar/fullcalendar.min.js"></script>
	<!-- COOKIE -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/jQuery-Cookie/jquery.cookie.min.js"></script>
	<!-- GRITTER -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/gritter/js/jquery.gritter.min.js"></script>

	<!-- DATA TABLES -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/datatables/media/assets/js/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>
	<!-- CUSTOM SCRIPT -->
	<script src="<?= base_url()?>assets/js/script.js"></script>
	<script>
		jQuery(document).ready(function() {		
			App.setPage("index");  //Set current page
			App.init(); //Initialise plugins and elements
		});
	</script>
	<!-- /JAVASCRIPTS -->