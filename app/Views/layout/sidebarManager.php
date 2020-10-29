<!-- * Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/manager" class="brand-link">
        <img src="<?= base_URL(); ?>/img/logo7.png" alt="Ktrains Logo" class="brand-image elevation-1" style="opacity: 0.8;" />
        <span class="brand-text font-weight-light">Ktrains</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_URL(); ?>/profile/<?= session()->get("gambar"); ?>" class="img-circle elevation-2" alt="User Image"/>
            </div>
            <div class="info">
                <a href="#" target="blank" class="d-block"><?= session()->get("username"); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/manager" class="nav-link <?= ($active == "home") ? "active" : ""; ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/manager/stationlist" class="nav-link <?= ($active == "station") ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-train"></i>
                        <p>Station</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/manager/userList" class="nav-link <?= ($active == "user") ? "active" : ""; ?>">
                        <i class="nav-icon ion ion-person"></i>
                        <p>User Data</p>
                    </a>
                </li>
                <li class="nav-item <?= ($active == "train_best") ? "menu-open" : ""; ?><?= ($active == "train_list") ? "menu-open" : ""; ?>">
                    <a href="#" class="nav-link <?= ($active == "train_best") ? "has-treeview active" : ""; ?><?= ($active == "train_list") ? "has-treeview active" : ""; ?>">
                        <i class="nav-icon ion ion-stats-bars"></i>
                        <p>
                            Train
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/manager/BestTrain" class="nav-link <?= ($active == "train_best") ? "active" : ""; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Best Train</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/manager/TrainList" class="nav-link <?= ($active == "train_list") ? "active" : ""; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Train Data</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/manager/AddStaff" class="nav-link <?= ($active == "add_staff") ? "active" : ""; ?>">
                        <i class="nav-icon ion ion-person-add"></i>
                        <p>Add Staff</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/manager/StaffList" class="nav-link <?= ($active == "staff_list") ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-user"></i>
                        <p>Staff Data</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>/Logout" class="nav-link" id="logoutBtnManager">
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</aside>
<!-- ? /.sidebar -->