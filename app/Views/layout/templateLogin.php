<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="img/logo7.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous" />
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="/fontawesome/all.min.css">
    <!-- login style -->
    <link rel="stylesheet" type="text/css" href="/css/login.css">
</head>

<body>
    <?= $this->renderSection('content'); ?>
</body>
<!-- Option 1: Bootstrap Bundle with Popper.js -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<script src="fontawesome/all.min.js"></script>
<script src="js/function.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="/js/function.js"></script>
<?php if($active == "regist"): ?>
<script src="/js/regist.js"></script>
<?php elseif($active == "login") : ?>
    <?php if(session()->getFlashData("success")) : ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 5000,
            });

            Toast.fire({
            icon: "success",
            title: "User Berhasil Di buat",
            });
        </script>
    <?php endif; ?>
<script>
    get("#sign-in").addEventListener('click', function(e) {
        if (justRequired("username") && justRequired("password")) {

        } else {
            e.preventDefault()
            justRequired("username")
            justRequired("password")
        }
    })

    get("#username").addEventListener("keyup", function() {
        justRequired("username")
    })

    get("#password").addEventListener("keyup", function() {
        justRequired("password")
    })

    function justRequired(selector) {
        if (get("#" + selector).value == "") {
            get("#" + selector).style.border = "1px solid #dc3545"
            return false
        } else {
            get("#" + selector).style.border = "1px solid #28a745"
            return true
        }
    }
</script>
<?php endif; ?>

</html>