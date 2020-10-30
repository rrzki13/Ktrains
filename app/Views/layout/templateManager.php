<?php
if (session()->get("id")) {
    if (session()->get('level') == "user") {
        header('location:' . base_URL());
        die;
    } elseif (session()->get('level') == "staff") {
        header('location:' . base_URL() . '/staff');
        die;
    }
} else {
    header('location:' . base_URL() . '/login');
    die;
}
?>
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
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- My Script -->
    <script>
        $(function() {
            $("#logoutBtnManager").on("click", function(e) {
                e.preventDefault();
                let href = $(this).attr("href");
                Swal.fire({
                    title: "Are you sure want to logout?",
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: `Logout`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        document.location.href = href;
                    }
                });
            })
        });
    </script>
    <?php if ($active == "home") : ?>
        <script src="/js/classes.js"></script>
        <script src="/js/function.js"></script>
        <script>
            $(function() {
                let moneyFormat = new FormatMoney();

                let formatThis = getAll("#totalInManagerHome");
                for (let i = 0; i < formatThis.length; i++) {
                    let rupiah = moneyFormat.toRupiah(formatThis[i].textContent);
                    formatThis[i].innerHTML = rupiah;
                }
            });
        </script>
    <?php elseif ($active == "train_list") : ?>
        <script src="/js/classes.js"></script>
        <script src="/js/function.js"></script>
        <script>
            $(function() {
                let moneyFormat = new FormatMoney();

                let formatThis = getAll("#trainFare");
                for (let i = 0; i < formatThis.length; i++) {
                    let rupiah = moneyFormat.toRupiah(formatThis[i].textContent);
                    formatThis[i].innerHTML = rupiah;
                }
            });
        </script>
    <?php endif ?>
    <?php if ($active == "add_staff") : ?>
        <script src="/js/bs-custom-file-input.min.js"></script>
        <script src="/js/classes.js"></script>
        <script src="/js/function.js"></script>
        <script src="/js/manager.js"></script>
    <?php elseif($active == "profile") : ?>
        <script src="/js/bs-custom-file-input.min.js"></script>
        <script src="/js/classes.js"></script>
        <script src="/js/function.js"></script>
        <script src="/js/profile.js"></script>
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

    <?php if ($active == "staff_list") : ?>
        <?php if (session()->getFlashData('successAddStaff')) : ?>
            <script type="text/javascript">
                $(function() {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000
                    });

                    setTimeout(function() {
                        Toast.fire({
                            icon: 'success',
                            title: 'Staff Berhasil di tambahkan'
                        })
                    }, 200);

                });
            </script>
        <?php endif; ?>
    <?php endif ?>
</body>

</html>