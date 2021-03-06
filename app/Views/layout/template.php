<?php
if (!session()->get('username')) {
    header('location:' . base_URL() . '/login');
    die;
} else {
    if (session()->get('level') == "manager") {
        header('location:' . base_URL() . "/manager");
        die;
    } elseif (session()->get('level') == "staff") {
        header('location:' . base_URL() . '/staff');
        die;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="img/logo7.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />

    <title><?= $title; ?></title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="blank"></div>
    <?= $this->include('layout/navbar'); ?>

    <?= $this->renderSection('content'); ?>

    <?= $this->include('layout/footer'); ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper.js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://kit.fontawesome.com/d1a508a7c1.js" crossorigin="anonymous"></script>
    <script src="js/classes.js"></script>
    <script src="js/function.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/JsBarcode.all.min.js"></script>
    <script>
        get(".btn-logout").addEventListener("click", function() {
            const href = this.getAttribute("id");
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
        });
    </script>
    <?php if ($active == 'home') : ?>
        <script src="js/script.js"></script>
    <?php elseif ($active == 'history') : ?>
        <?php if ($title == "Ktrains | Restore Tiket") : ?>
            <script src="js/restore.js"></script>
        <?php else : ?>
            <script src="js/history.js"></script>
        <?php endif ?>
    <?php elseif ($active == 'buy') : ?>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/buy.js"></script>
    <?php elseif ($active == 'order') : ?>
        <script src="js/JsBarcode.all.min.js"></script>
        <script src="js/order.js"></script>
    <?php endif; ?>

</body>

</html>