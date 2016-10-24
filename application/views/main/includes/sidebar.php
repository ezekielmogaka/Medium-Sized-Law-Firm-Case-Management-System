<!-- SIDEBAR -->
<div id="sidebar" class="sidebar">
    <div class="sidebar-menu nav-collapse">
        <div class="divide-20"></div>
        <!-- SEARCH BAR -->
        <div id="search-bar">
            <input class="search" type="text" placeholder="Search"><i class="fa fa-search search-icon"></i>
        </div>
        <!-- /SEARCH BAR -->
        <!-- SIDEBAR QUICK-LAUNCH -->
        <!-- <div id="quicklaunch">
						<!-- /SIDEBAR QUICK-LAUNCH -->
        <!-- SIDEBAR MENU -->
        <ul>
            <li>
                <a href="<?= base_url().'index.php/main/staff_dashboard' ?>">
                    <i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="fa fa-archive"></i> <span class="menu-text">Legal Documents<span class="badge pull-right"><?php echo $this->db->get('legal_documents')->num_rows();?></span></span>
                    <span class="arrow"></span>
                </a>
                 <ul class="sub">
                    
                    <li class="has-sub-sub">
                        <a href="javascript:;" class=""><span class="sub-menu-text">Documents</span>
                                        <span class="arrow"></span>
                                        </a>
                        <ul class="sub-sub">
                            <li><a class="" href="<?= base_url().'index.php/main/laws'?>"><span class="sub-sub-menu-text">Laws</span></a></li>
                            <li><a class="" href="<?= base_url().'index.php/main/lawsuits'?>"><span class="sub-sub-menu-text">Lawsuits</span></a></li>
                            <li><a class="" href="<?= base_url().'index.php/main/contracts'?>"><span class="sub-sub-menu-text">Contracts</span></a></li>
                            <li><a class="" href="<?= base_url().'index.php/main/real_estate'?>"><span class="sub-sub-menu-text">Real Estate</span></a></li>
                            <li><a class="" href="<?= base_url().'index.php/main/estate_planning'?>"><span class="sub-sub-menu-text">Estate Planning</span></a></li>
                            <li><a class="" href="<?= base_url().'index.php/main/wills_power_of_attorney'?>"><span class="sub-sub-menu-text">Wills and power of Attorney</span></a></li>
                            <li><a class="" href="<?= base_url().'index.php/main/forms'?>"><span class="sub-sub-menu-text">Forms Collection</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="fa fa-legal"></i> <span class="menu-text">Cases/Matters</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                   
                    <li class="has-sub-sub">
                        <a href="javascript:;" class=""><span class="sub-menu-text">Assigned Cases</span>
										<span class="arrow"></span>
										</a>
                        <ul class="sub-sub">
                            <li><a class="" href="<?= base_url()?>index.php/main/assigned_open"><span class="sub-sub-menu-text">Open</span><span class="badge pull-right"><?php
                            $status = "Open";

                            $attorney_id = $this->session->userdata('attorney_id');

                            $query = $this->db->get_where('matters',array('matter_status'=>$status,'attorney_id'=> $attorney_id));
                            echo $query->num_rows();


                            ?></span></a></li>
                            <li><a class="" href="<?= base_url()?>index.php/main/assigned_pending"><span class="sub-sub-menu-text">Pending</span><span class="badge pull-right">
                                <?php
                            $status = "Pending";

                            $attorney_id = $this->session->userdata('attorney_id');

                            $query = $this->db->get_where('matters',array('matter_status'=>$status,'attorney_id'=> $attorney_id));
                            echo $query->num_rows();


                            ?>
                            </span></a></li>
                            <li><a class="" href="<?= base_url()?>index.php/main/assigned_closed"><span class="sub-sub-menu-text">Closed</span><span class="badge pull-right">
                                
                                 <?php
                            $status = "Closed";

                            $attorney_id = $this->session->userdata('attorney_id');

                            $query = $this->db->get_where('matters',array('matter_status'=>$status,'attorney_id'=> $attorney_id));
                            echo $query->num_rows();


                            ?>
                            </span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="fa fa-book"></i> <span class="menu-text">Applications</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= base_url()?>index.php/main/leave_application"><span class="sub-menu-text">Leave Application</span></a></li>
                    <li><a class="" href="<?= base_url()?>index.php/main/advance_application"><span class="sub-menu-text">Advance Application</span></a></li>
                </ul>
            </li>
            
        </ul>
        <!-- /SIDEBAR MENU -->
    </div>
</div>
<!-- /SIDEBAR -->
<script>
jQuery(document).ready(function() {
    App.setPage("widgets_box"); //Set current page
    App.init(); //Initialise plugins and elements
});
</script>
<!-- /JAVASCRIPTS -->
