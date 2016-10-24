<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/datatables/media/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/datatables/media/assets/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/datatables/extras/TableTools/media/css/TableTools.min.css" />
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
                                    <a href="<?= base_url()?>index.php/main/staff_dashboard">Home</a>
                                </li>
                                <li>
                                    <?=$page_title?>
                                </li>
                            </ul>
                            <!-- /BREADCRUMBS -->
                            <div class="clearfix">
                                <h3 class="content-title pull-left">Dashboard</h3>
                                
                            
                        </div>
                        <div class="description">Overview and Statistics</div>
                    </div>
                </div>
            </div>
            <!-- /PAGE HEADER -->
            <!-- DASHBOARD CONTENT -->
            <div class="row">
                                <!-- COLUMN 1 -->
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-body">
                                                <!-- BOX -->
                        <div class="box border blue">
                            <div class="box-title">
                                <h4><i class="fa fa-file"></i><?=$page_title." - ".$name?></h4>
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
                            <div class="box-body">
                                <table id="datatable2" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr class="gradeX">
                                            <tr>
                                                <th>#</th>
                                                <th>Attorney Name</th>
                                                <th class="hidden-xs">Leave Type</th>
                                                <th>Application date</th>
                                                <th>Status</th>
                                                <th class="hidden-xs">Leave type</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $count= 1;

                           foreach ($leave as $leav){
                           
                            
                                 echo "<tr class='gradeX'>";

                                 echo "<td> 
                                  ".$count."
                                  </td>
                                  <td>
                                   ".$leav['staff_name']." <a href='#'> 
                                   </td>
                                   <td>
                                   ".$leav['leave_type']."
                                   </td>
                                   <td>
                                   ".$leav['applicationDate']."
                                   </td>
                                   <td>
                                   ".$leav['status']."
                                   </td>
                                    <td>
                                   ".$leav['leave_type']."
                                   </td>
                                  
                                   </tr>";


                                  

                             
                           }
                            $count++

                          ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                                <th>#</th>
                                                <th>Attorney Name</th>
                                                <th class="hidden-xs">Leave Type</th>
                                                <th>Application date</th>
                                                <th>Status</th>
                                                <th class="hidden-xs">Leave type</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
                <!-- /COLUMN 1 -->
                <!-- COLUMN 2 -->
                <div class="col-md-3">
                            <div class="box border inverse">
                                <div class="box-title">
                                    <h4><i class="fa fa-money"></i>Advance Applications Summary</h4>
                                    <div class="tools">
                                        <a href="javascript:;" class="reload">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                        <a href="javascript:;" class="remove">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="sparkline-row">
                                        <span class="title">Total  This month</span>
                                        <span class="value">21</span>
                                        <span class="sparkline big" data-color="blue">16,7,23,13,12</span>
                                    </div>
                                    <div class="sparkline-row">
                                        <span class="title">Accepted</span>
                                        <span class="value">12</span>
                                        <span class="sparkline big" data-color="red">6,3,24,25,27</span>
                                    </div>
                                    <div class="sparkline-row">
                                        <span class="title">Accepted</span>
                                        <span class="value">3</span>
                                        <span class="sparkline big" data-color="green">11,19,20,20,5</span>
                                    </div>
                                    <div class="sparkline-row">
                                        <span class="title">Rejected</span>
                                        <span class="value">6</span>
                                        <span class="sparkline big" data-color="green">11,19,20,20,5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-md-1">
                    <div class="box solid grey">
                        
                        <div class="box-body">
                            <div id="chart-revenue" style="height:1px"></div>
                        </div>
                    </div>
                </div>
               
                <!-- /COLUMN 2 -->
            </div>
            <!-- /DASHBOARD CONTENT -->
            <!-- HERO GRAPH -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BOX -->
                    <div class="box border green">
                        <div class="box-title">
                            <h4><i class="fa fa-bars"></i> <span class="hidden-inline-mobile">Leave Applications last Month</span></h4>
                        </div>


                        <div class="box-body">
                            <div class="tabbable header-tabs">
                                <ul class="nav nav-tabs">
                                    <li><a href="#box_tab2" data-toggle="tab"><i class="fa fa-search-plus"></i> <span class="hidden-inline-mobile">Select & Zoom Sales Chart</span></a></li>
                                    <li class="active"><a href="#box_tab1" data-toggle="tab"><i class="fa fa-bar-chart-o"></i> <span class="hidden-inline-mobile">Leave Applications</span></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="box_tab1">
                                        <!-- TAB 1 -->
                                        <div id="chart-dash" class="chart"></div>
                                        <hr class="margin-bottom-0">
                                        <!-- /TAB 1 -->
                                    </div>
                                    <div class="tab-pane fade" id="box_tab2">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="demo-container">
                                                    <div id="placeholder" class="demo-placeholder"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="demo-container" style="height:2px;">
                                                    <div id="overview" class="demo-placeholder"></div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /BOX -->
                </div>
            </div>
            <!-- /HERO GRAPH -->

        <!-- JQUERY -->
        <script src="<?= base_url()?>assets/js/jquery/jquery-2.0.3.min.js"></script>
        <!-- /CONTENT-->
<script src="<?= base_url()?>assets/js/jquery/jquery-2.0.3.min.js"></script>
<!-- DATA TABLES -->
<script type="text/javascript" src="<?= base_url()?>assets/js/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/datatables/media/assets/js/datatables.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/datatables/extras/TableTools/media/js/TableTools.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/datatables/extras/TableTools/media/js/ZeroClipboard.min.js"></script>
