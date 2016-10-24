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
                <a href="<?= base_url().'index.php/admin/admin_dashboard' ?>">
                    <i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="fa fa-legal"></i> <span class="menu-text">Manage Matters<span class="badge pull-right"><?php echo $this->db->get('matters')->num_rows();?></span></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= base_url()?>index.php/admin/add_new_matter"><span class="sub-menu-text">Add New</span></a></li>
                    <li class="has-sub-sub">
                        <a href="javascript:;" class=""><span class="sub-menu-text">Cases</span>
										<span class="arrow"></span>
										</a>
                        <ul class="sub-sub">
                            <li><a class="" href="<?= base_url()?>index.php/admin/open_cases"><span class="sub-sub-menu-text">Open</span></a></li>
                            <li><a class="" href="<?= base_url()?>index.php/admin/pending_cases"><span class="sub-sub-menu-text">Pending</span></a></li>
                            <li><a class="" href="<?= base_url()?>index.php/admin/closed_cases"><span class="sub-sub-menu-text">Closed</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="fa fa-archive"></i> <span class="menu-text">Legal Documents<span class="badge pull-right"><?php echo $this->db->get('legal_documents')->num_rows();?></span></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= base_url().'index.php/admin/add_new_legal_document'?>"><span class="sub-menu-text">Add New Document</span></a></li>
                    <li class="has-sub-sub">
                        <a href="javascript:;" class=""><span class="sub-menu-text">Documents</span>
										<span class="arrow"></span>
										</a>
                        <ul class="sub-sub">
                            <li><a class="" href="<?= base_url().'index.php/admin/laws'?>"><span class="sub-sub-menu-text">Laws</span></a></li>
                            <li><a class="" href="<?= base_url().'index.php/admin/lawsuits'?>"><span class="sub-sub-menu-text">Lawsuits</span></a></li>
                            <li><a class="" href="<?= base_url().'index.php/admin/contracts'?>"><span class="sub-sub-menu-text">Contracts</span></a></li>
                            <li><a class="" href="<?= base_url().'index.php/admin/real_estate'?>"><span class="sub-sub-menu-text">Real Estate</span></a></li>
                            <li><a class="" href="<?= base_url().'index.php/admin/estate_planning'?>"><span class="sub-sub-menu-text">Estate Planning</span></a></li>
                            
                            <li><a class="" href="<?= base_url().'index.php/admin/forms'?>"><span class="sub-sub-menu-text">Forms Collection</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="fa fa-users"></i> <span class="menu-text">Manage Clients<span class="badge pull-right"><?php echo $this->db->get('clients')->num_rows();?></span></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= base_url().'index.php/admin/add_new_client'?>"><span class="sub-menu-text">Add New Client</span></a></li>
                    <li><a class="" href="<?= base_url().'index.php/admin/manage_clients'?>"><span class="sub-menu-text">List of Clients</span></a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="fa fa-users"></i> <span class="menu-text">Manage Attorneys<span class="badge pull-right"><?php echo $this->db->get('attorneys')->num_rows();?></span></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?= base_url().'index.php/admin/new_attorney'?>"><span class="sub-menu-text">Add New Attorney</span></a></li>
                    <li><a class="" href="<?= base_url().'index.php/admin/manage_attorneys'?>"><span class="sub-menu-text">List of attorneys</span></a></li>
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
