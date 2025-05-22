<?php
// Check if session is not already started, then start it
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get the current filename without the ".php" extension
$currentPage = basename($_SERVER['PHP_SELF'], ".php");
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand --><?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Secondary')): ?>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">    <?php endif; ?>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Production'): ?>
                  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="report.php">
                     <?php endif; ?>
                                 <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Ework'): ?>
                  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="ework.php">
                     <?php endif; ?>
                <div class="sidebar-brand-icon rotate-n-15">
            
                </div>
                <div class="sidebar-brand-text mx-3">PrintTrack</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
<?php if (isset($_SESSION['role']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Secondary')): ?>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboards</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading 
            <div class="sidebar-heading">
                Interface
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>PrePress</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="jobs.php">Jobs</a>
                        <a class="collapse-item" href="plating.php">Plating</a>
                        <a class="collapse-item" href="ework_admin.php">E-work Request</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Press</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="machine.php">Machines</a>
                        <a class="collapse-item" href="report.php">Reports</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>PostPress</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="login.html">Blank</a>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading 
            <div class="sidebar-heading">
                Addons
            </div> -->


        
            
    <?php endif; ?>
 <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Admin'): ?>
    <li class="nav-item">
                <a class="nav-link" href="user_approval.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>User Approval</span></a>
       </li>
           <?php endif; ?>
    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Ework'): ?>
     
                <li class="nav-item">
                <a class="nav-link" href="ework.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>E-Work Request</span></a>
            </li>

                <?php endif; ?>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Production'): ?>
                <li class="nav-item">
                <a class="nav-link" href="report.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Reports</span></a>
            </li>
                   <?php endif; ?>
                       <li class="nav-item">
                <a class="nav-link" href="profile.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Profile</span></a>
            </li>
            <!-- Nav Item - Charts 
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> -->

            <!-- Nav Item - Tables 
            <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message 
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->
        </ul>