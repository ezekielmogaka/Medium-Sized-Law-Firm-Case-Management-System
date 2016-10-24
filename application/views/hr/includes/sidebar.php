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
                <a href="<?= base_url().'index.php/hr/hr_dashboard' ?>">
                    <i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="fa fa-chain-broken"></i> <span class="menu-text">Leave & Rota<span class="badge pull-right"><?php echo $this->db->get('leave_applications')->num_rows();?></span></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= base_url().'index.php/hr/pending_leave_applications'?>"><span class="sub-menu-text">Pending Applications</span></a></li>
                    <li><a class="" href="<?= base_url().'index.php/hr/approved_leave_applications'?>"><span class="sub-menu-text">Approved</span></a></li>
                    <li><a class="" href="<?= base_url().'index.php/hr/rejected_leave_applications'?>"><span class="sub-menu-text">Rejected</span></a></li>
                </ul>
            </li>

             <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="fa fa-rocket"></i> <span class="menu-text">Staff Advance<span class="badge pull-right"><?php echo $this->db->get('advanceSalary_applications')->num_rows();?></span></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= base_url().'index.php/hr/pending_advance_applications'?>"><span class="sub-menu-text">Pending Applications</span></a></li>
                    <li><a class="" href="<?= base_url().'index.php/hr/approved_advance_applications'?>"><span class="sub-menu-text">Approved</span></a></li>
                    <li><a class="" href="<?= base_url().'index.php/hr/rejected_advance_applications'?>"><span class="sub-menu-text">Rejected</span></a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="fa fa-users"></i> <span class="menu-text">Manage Attorneys<span class="badge pull-right"><?php echo $this->db->get('attorneys')->num_rows();?></span></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= base_url().'index.php/hr/new_attorney'?>"><span class="sub-menu-text">Add New Attorney</span></a></li>
                    <li><a class="" href="<?= base_url().'index.php/hr/manage_attorneys'?>"><span class="sub-menu-text">List of attorneys</span></a></li>
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
