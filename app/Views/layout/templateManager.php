<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= $title; ?></title>

    <link rel="icon" href="/img/logo7.png" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_URL(); ?>/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_URL(); ?>/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="<?= base_URL(); ?>/css/responsive.bootstrap4.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_URL(); ?>/css/adminlte.min.css" />
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?= $this->include("layout/navbarManager"); ?>

        <?= $this->include("layout/sidebarManager"); ?>

        <?= $this->renderSection('content'); ?>

        <?= $this->include('layout/footerManager'); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <!-- jQuery -->
    <script src="<?= base_URL(); ?>/js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_URL(); ?>/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_URL(); ?>/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_URL(); ?>/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_URL(); ?>/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_URL(); ?>/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_URL(); ?>/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_URL(); ?>/js/demo.js"></script>
    <!-- My Script -->
    <?php if ($active == "add_staff") : ?>
        <script src="/js/bs-custom-file-input.min.js"></script>
        <script src="/js/classes.js"></script>
        <script src="/js/function.js"></script>
        <script src="/js/manager.js"></script>
    <?php else : ?>
        <script>
            $(function() {
                $("#dataMobil").DataTable({
                    responsive: true,
                    autoWidth: false,
                });
            });
        </script>
    <?php endif ?>
</body>

</html>