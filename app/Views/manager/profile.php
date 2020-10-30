<?= $this->extend('layout/templateManager'); ?>

<?= $this->section("content"); ?>
<div id="myUsername" class="d-none"><?= session()->get("username"); ?></div>
<div id="myEmail" class="d-none"><?= session()->get("email"); ?></div>
<!-- * Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- * Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>My Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">My Profile</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- * table content -->
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" id="imgPreview" src="/profile/<?= session()->get("gambar"); ?>" alt="User profile picture" />
                            </div>
                            <h3 class="profile-username text-center" id="staffUsername">
                            <?= session()->get("username"); ?>
                            </h3>
                            <p class="text-muted text-center" id="staffEmail">
                            <?= session()->get("email"); ?>
                            </p>

                            <button class="btn btn-primary btn-block" id="btn-edit-profile"><b><i class="fa fa-user-edit mr-3"></i> Edit Profile</b></button>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <!-- left column -->
                <div class="col-md-9">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">My Profile</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="usernameProfile">Username</label>
                                            <input type="text" class="form-control" id="usernameProfile" placeholder="Enter username" disabled value="<?= session()->get("username"); ?>" />
                                            <small class="text-danger" id="usernameProfileUsernameValidate"></small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="emailProfile">Email address</label>
                                            <input type="email" class="form-control" id="emailProfile" placeholder="Enter email" disabled value="<?= session()->get("email"); ?>" />
                                            <small class="text-danger" id="emailProfileEmailValidate"></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="nameProfile">Your Name</label>
                                            <input type="text" class="form-control" id="nameProfile" placeholder="Enter username" disabled value="<?= session()->get("nama_lengkap"); ?>" />
                                            <small class="text-danger" id="nameProfileTextValidate"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="imgProfile">Profile Picture</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="imgProfile" accept="Image/jpg,Image/jpeg,Image/png" disabled />
                                            <label class="custom-file-label" for="imgProfile"><?= session()->get("gambar"); ?></label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" id="btn-edit-my-profile" class="btn btn-primary" disabled>
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- ? /.content-wrapper -->
<?= $this->endSection(); ?>