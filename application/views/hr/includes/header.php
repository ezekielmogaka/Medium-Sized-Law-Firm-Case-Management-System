<?php  
        
        $attorneys = $this->db->get('attorneys');
        $attorneys = $attorneys->result_array();
    

        for($counter=0; $counter < count($attorneys); $counter++){
            $attorney_case_status = $this->db->get_where('matters',array('attorney_id'=>$attorneys[$counter]['attorney_id']));

            $attorney_caseStatus = $attorney_case_status->result_array();

            /*$open = "Open";

            if($attorney_caseStatus[0]['matter_status'] = $open)
            {
                $attorneys[$counter]['open'] = $this->db->get_where('matters', array('matter_status'=>$attorney_caseStatus[$counter]['matter_status'] ));

                $attorneys[$counter]['open'] = $attorneys[$counter]['open']->result_array();
                $attorneys[$counter]['open'] = $attorneys[$counter]['open']->num_rows();



            }
            $pending = "Pending";
            elseif ($attorney_caseStatus[0]['matter_status'] = $pending) {
                $attorneys[$counter]['pending'] = $this->db->get_where('matters', array('matter_status'=>$attorney_caseStatus[$counter]['matter_status'] ));
            }

            else{
                $attorneys[$counter]['closed'] = $this->db->get_where('matters', array('matter_status'=>$attorney_caseStatus[$counter]['matter_status'] ));

            }*/

            
        }
        ?>

<!-- HEADER -->
<header class="navbar clearfix navbar-fixed-top" id="header">
    <div class="container">
        <div class="navbar-brand">
            <!-- COMPANY LOGO -->
            <a href="index.html">
						<img src="<?= base_url()?>assets/img/logo/logo1.png" alt="Wakili CM Logo" class="img-responsive" height="100" width="120">
					</a>
            <!-- /COMPANY LOGO -->
            <!-- TEAM STATUS FOR MOBILE -->
            <div class="visible-xs">
                <a href="#" class="team-status-toggle switcher btn dropdown-toggle">
                    <i class="fa fa-users"></i>
                </a>
            </div>
            <!-- /TEAM STATUS FOR MOBILE -->
            <!-- SIDEBAR COLLAPSE -->
            <div id="sidebar-collapse" class="sidebar-collapse btn">
                <i class="fa fa-bars" data-icon1="fa fa-bars" data-icon2="fa fa-bars"></i>
            </div>
            <!-- /SIDEBAR COLLAPSE -->
        </div>
        <!-- NAVBAR LEFT -->
        <ul class="nav navbar-nav pull-left hidden-xs" id="navbar-left">
            <li class="dropdown">
                <a href="#" class="team-status-toggle dropdown-toggle tip-bottom" data-toggle="tooltip" title="Toggle Team View">
                    <i class="fa fa-users"></i>
                    <span class="name">Team Status</span>
                    <i class="fa fa-angle-down"></i>
                </a>
            </li>
            
        </ul>
        <!-- /NAVBAR LEFT -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <ul class="nav navbar-nav pull-right">
            <!-- BEGIN NOTIFICATION DROPDOWN -->
           
           
          
           
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user" id="header-user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img alt="" src="<?= base_url()?>assets/img/avatars/avatar3.jpg" />
							<span class="username"><?php if($this->session->userdata('hr_email')!==null){ echo $this->session->userdata('user_name');} ?></span>
							<i class="fa fa-angle-down"></i>
						</a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-user"></i> My Profile</a></li>
                   
                    <li><a href="<?= base_url()?>index.php/hr/logout"><i class="fa fa-power-off"></i> Log Out</a></li>
                </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- TEAM STATUS -->
        <div class="container team-status" id="team-status">
          <div id="scrollbar">
            <div class="handle">
            </div>
          </div>
          
          <div id="teamslider">

              <ul class="team-list">
              <?php
          foreach ($attorneys as $status){
            ?>
                <li class="current">
                  <a href="javascript:void(0);">
                  <span class="image">
                      <img src="<?= base_url()?>assets/img/avatars/avatar3.jpg" alt="" />
                  </span>
                  <span class="title">
                    <?php
                    echo $status['attorney_first_name'];

                    ?>
                  </span>
                    <div class="progress">
                      <div class="progress-bar progress-bar-success" style="width: 35%">
                        <span class="sr-only">35% Complete (success)</span>
                      </div>
                      <div class="progress-bar progress-bar-warning" style="width: 20%">
                        <span class="sr-only">20% Complete (warning)</span>
                      </div>
                      <div class="progress-bar progress-bar-danger" style="width: 10%">
                        <span class="sr-only">10% Complete (danger)</span>
                      </div>
                    </div>
                    <span class="status">
                        <div class="field">
                            <span class="badge badge-green">10<?php
                    /*echo $status['open'];*/

                    ?>
                            </span> Open
                            <span class="pull-right fa fa-check"></span>
                        </div>
                        <div class="field">
                            <span class="badge badge-orange">3</span> Pending
                            <span class="pull-right fa fa-adjust"></span>
                        </div>
                        <div class="field">
                            <span class="badge badge-red">1</span> Closed
                            <span class="pull-right fa fa-list-ul"></span>
                        </div>
                    </span>
                  </a>
                </li>
                <?php
                }

                ?>

            

              </ul>
            </div>
          </div>
        <!-- /TEAM STATUS -->
    </header>
    <!--/HEADER -->
    
