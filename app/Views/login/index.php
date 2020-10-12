<?= $this->extend('layout/templateLogin'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card-login">
                <div class="container-fluid">
                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <h3 class="login-title">Account Login</h3>
                        </div>
                    </div>
                    <?php if (session()->getFlashData("wrong")) : ?>
                        <div class="row">
                            <div class="col-12 text-center text-danger">
                                <span>Username atau Pasword salah</span>
                            </div>
                        </div>
                    <?php endif ?>
                    <form method="post" action="<?= base_URL(); ?>/loginProses">
                    <?= csrf_field(); ?>
                        <div class="row justify-content-center mt-3">
                            <div class="col-md-10">
                                <input type="text" name="username" id="username" class="form-control inp-login" placeholder="Username or Email" autofocus autocomplete="off">
                            </div>
                        </div>
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-10">
                                <input type="password" name="password" id="password" class="form-control inp-login" placeholder="Password" autofocus autocomplete="off">
                            </div>
                        </div>
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-10">
                                <button class="btn btn-primary inp-login w-100" id="sign-in">Sign In</button>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-5">
                            <div class="col-md-12 text-center">
                                <a href="/Regist">dont have account? regist now</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>