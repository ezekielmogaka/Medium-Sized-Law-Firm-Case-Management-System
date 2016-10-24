<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
<!-- FONTS -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
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
                                    <a href="#">Case File</a>
                                </li>
                                <li>
                                <?=$page_title?>

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
                <div class="row">
                    <!-- <div class="col-md-1">
                        </div> -->
                    <div class="col-md-12">
                        <!-- BOX -->
                        <div class="box border blue">
                            <div class="box-title">
                                <h4><i class="fa fa-legal"></i><span class="hidden-inline-mobile"><?=$page_title?></span></h4>
                            </div>
                            <div class="box-body">
                                <div class="tabbable header-tabs">
                                    <ul class="nav nav-tabs">
                                       
                                        <li><a href="#box_tab3" data-toggle="tab"><i class="fa fa-book"></i> <span class="hidden-inline-mobile">Case Notes</span></a></li>
                                        <li><a href="#box_tab2" data-toggle="tab"><i class="fa fa-folder-open"></i> <span class="hidden-inline-mobile">Case Documents</span><span class="badge badge-blue font-11">10</span></a></li>
                                        <li class="active"><a href="#box_tab4" data-toggle="tab"><i class="fa fa-home"></i> <span class="hidden-inline-mobile">Case Details</span> </a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <!--  <div class="tab-pane fade in active" id="box_tab1">
                                                <p>Content #1</p>
                                                <p> There were flying cantaloupes, rainbows and songs of happiness near by, I mean I was a little frightened by the flying fruit but I'll take this any day over prison inmates. 
                                                </p>
                                             </div> -->
                                        <div class="tab-pane fade" id="box_tab2">
                                            <?php

                           foreach ($matter_assigned as $case){
                            print_r($case);
                            exit();
                            ?>
                                               
                                                ?>
                                                    <div class="box-body">
                                                        <table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr class="gradeX">
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Case File Document Name</th>
                                                                        <th>Description</th>
                                                                        <th class="hidden-xs">Date Added</th>
                                                                        <th>View</th>
                                                                         <th>Delete</th>
                                                                    </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $counter = 1;

                           foreach ($case_document as $document){
                           
                            
                                 echo "<tr class='gradeX'>";
                                 echo "<td> 
                                  ".$counter."
                                  </td>
                                  <td>
                                   ".$document['caseFile_document_name']."
                                   </td>
                                  
                                  <td>
                                   ".substr($document['caseFile_document_description'], 0,200)."
                                   </td>

                                    <td>
                                   ".$document['date_added']."
                                   </td>
                                  
                                   <td>
                                   <a href='". base_url()."assets/Documents/CaseFile_Documents/".$document['document_full_path']."'  class='btn btn-info fa fa-eye'>View Doc</a>
                                   </td>
                                   <td>
                                       <a href='".base_url()."index.php/main/delete_caseFile_document/".$document['case_file_document_id']."' class='btn btn-danger fa fa-trash-o'>Delete</a>
                                   </td>

                                  
                                   </tr>";    
                                    $counter++;

                                }

                          ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                        <th>#</th>
                                                                        <th>Case File Document Name</th>
                                                                        <th>Description</th>
                                                                        <th class="hidden-xs">Date Added</th>
                                                                        <th>View</th>
                                                                         <th>Delete</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                        </div>
                                        <div class="tab-pane fade" id="box_tab3">
                                           
                                            <!-- <div class="col-md-5 col-md-offset-1 box-container"> -->
                                            <!-- BOX WITH TOOLBOX-->
                                             <?php
                                                 foreach ($matter_assigned as $case){

                                                        ?>

                                            <div class="box border blue">
                                                <div class="box-title">
                                                    <h4><i class="fa book"></i>Case Notes: <?php echo $case['matter_name'];}?></h4>
                                                    <div class="pull-right">
                                                        <div class="make-switch switch-mini" data-on="warning" data-off="danger">
                                                            <input type="checkbox">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <div class="scroller" data-height="400px" data-always-visible="1" data-rail-visible="1">
                                                        <?php 
                                                      


                                                         foreach ($file as $case_detail){
                                                         

                                                      echo $case_detail['case_notes'];
                                                     
                                                  }


                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="toolbox bottom">
                                                    <div class="btn-group">
                                                    </div>
                                                    <div class="btn-group pull-right hidden-xs">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /BOX WITH TOOLBOX-->
                                            <!-- </div> -->
                                        </div>
                                        <div class="tab-pane fade in active" id="box_tab4">
                                            <!-- <div class="col-md-8"> -->
                                            <?php
                                                        foreach ($matter_assigned as $case){

                                                        ?>
                                                <div id="contact-card" class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h2 class="panel-title"><?php echo $case['matter_name'];?></h2>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div id="card" class="row">
                                                            <div class="col-md-1 headshot">
                                                            </div>
                                                            <div class="col-md-11">
                                                                <table class="table table-hover">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td><i class="fa fa-check-square"></i> Case Name:</td>
                                                                            <td id="card-name">
                                                                                <?php echo $case['matter_name'];?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><i class="fa fa-calendar"></i> Date of Incident:</td>
                                                                            <td id="card-name">
                                                                                <?php echo $case['date_of_incident'];?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><i class="fa fa-calendar"></i> Date Created:</td>
                                                                            <td id="card-name">
                                                                                <?php echo $case['date_created'];?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><i class="fa fa-calendar"></i> Hearing Date</td>
                                                                            <td id="card-name">
                                                                                <?php echo $case['date_created'];?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><i class="fa fa-globe"></i> Location of incident:</td>
                                                                            <td id="card-name">
                                                                                <?php echo $case['location_of_incident'];?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><i class="fa fa-legal"></i> Hearing Venue:</td>
                                                                            <td id="card-name">
                                                                                <?php echo $case['location_of_incident'];?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><i class="fa fa-user"></i> Client Name:</td>
                                                                            <td id="card-name">
                                                                                <?php echo $case['client_name'];?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><i class="fa fa-phone"></i> Client Phone:</td>
                                                                            <td>
                                                                                <?php echo $case['client_phone'];
                                                                                /*$case['matter_name']*/;?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><i class="fa fa-envelope"></i> Email</td>
                                                                            <td>
                                                                                <?php echo $case['client_email'];?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><i class="fa fa-home"></i> Client Address</td>
                                                                            <td>1st Ngong Avenue, 568-00200, Nairobi </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><i class="fa fa-file-text-o"></i> Description: </td>
                                                                            <td id="card-name">
                                                                                <div class="box border blue">
                                                                                    <div class="box-title">
                                                                                        <h4><i class="fa fa-youtube-play"></i>Case Description:</h4>
                                                                                        <div class="pull-right">
                                                                                            <div class="make-switch switch-mini" data-on="warning" data-off="danger">
                                                                                                <input type="checkbox">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="box-body">
                                                                                        <div class="scroller" data-height="200px" data-always-visible="1" data-rail-visible="1">
                                                                                            <?php echo $case['matter_description'];?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="toolbox bottom">
                                                                                        <div class="btn-group">
                                                                                        </div>
                                                                                        <div class="btn-group pull-right hidden-xs">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- </div> -->
                                                <?php
                                        }

                                            ?>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /BOX -->
                    </div>
                    <!-- <div class="col-md-1">
                        </div> -->
                </div>
                <!-- BOX TABS -->
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
<script>
jQuery(document).ready(function() {
    App.setPage("dynamic_table"); //Set current page
    App.init(); //Initialise plugins and elements
});
</script>
<!-- /JAVASCRIPTS -->
