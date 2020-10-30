<!-- * Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/staff" class="brand-link">
        <img src="/img/logo7.png" alt="Ktrains Logo" class="brand-image elevation-1" style="opacity: 0.8;" />
        <span class="brand-text font-weight-light">Ktrains</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/profile/<?= session()->get("gambar"); ?>" class="img-circle elevation-2" alt="User Image" />
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
                    <a href="/staff" class="nav-link <?= ($active == "home") ? "active" : ""; ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/staff/successTransaction" class="nav-link <?= ($active == "success") ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-check-circle"></i>
                        <p>Successful Transaction</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/staff/waitingTransaction" class="nav-link <?= ($active == "waiting") ? "active" : ""; ?>">
                        <i class="nav-icon fa fa-cut"></i>
                        <p>Waiting Transaction</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/staff/failedTransaction" class="nav-link <?= ($active == "failed") ? "active" : ""; ?>">
                        <i class="nav-icon far fa-times-circle"></i>
                        <p>Failed Transaction</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/Logout" class="nav-link" id="logoutBtnStaff">
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- ? /.sidebar -->
</aside>