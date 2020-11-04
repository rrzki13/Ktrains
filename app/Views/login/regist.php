<?= $this->extend('layout/templateLogin'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-login">
                <div class="container-fluid">
                    <div class="row mt-4 mb-3">
                        <div class="col-12">
                            <a class="text-left position-absolute text-dark" href="/login">
                                <i class="fa fa-arrow-left"></i>
                            </a>
                            <h3 class="login-title text-center">Account Register</h3>
                        </div>
                    </div>
                    <form method="post" action="<?= base_URL(); ?>/registProses">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control inp-regist" id="namaDepan" placeholder="Nama Depan" name="namaDepan" value="<?= old("namaDepan") ?>">
                                <small class="text-danger" id="namaDepanTextValidate"></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control inp-regist" id="namaBelakang" placeholder="Nama Belakang" name="namaBelakang" value="<?= old("namaBelakang") ?>">
                                <small class="text-danger" id="namaBelakangTextValidate"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control inp-regist" id="username" placeholder="Username" name="username" value="<?= old("username") ?>" autocomplete="off">
                                <small class="text-danger" id="usernameUsernameValidate">
                                    <?= $validation->getError('username'); ?>
                                </small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="email" class="form-control inp-regist" id="email" placeholder="Email" name="email" value="<?= old("email") ?>" autocomplete="off">
                                <small class="text-danger" id="emailEmailValidate">
                                    <?= $validation->getError('email'); ?>
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <input type="password" name="password" class="form-control inp-regist" id="password" placeholder="Password">
                                <small class="text-danger" id="passwordPasswordValidate"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <button class="btn btn-primary w-100" id="sign-up" type="submit" disabled>Register</button>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-5">
                            <div class="col-md-12 text-center">
                                <a href="/Login">Allready have account? Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>