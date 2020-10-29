<?= $this->extend('layout/templateManager'); ?>

<?= $this->section('content'); ?>
<!-- * Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- * Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Staff</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Add Staff</a></li>
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
                                <img class="profile-user-img img-fluid img-circle" id="imgPreview" src="/dist/img/user1-128x128.jpg" alt="User profile picture" />
                            </div>
                            <h3 class="profile-username text-center" id="staffUsername">
                                Staff
                            </h3>
                            <p class="text-muted text-center" id="staffEmail">
                                staff@gmail.com
                            </p>
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
                            <h3 class="card-title">Add Staff</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST" enctype="multipart/form-data" action="/manager/addStaffProgress">
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="usernameStaff">Username</label>
                                            <input type="text" class="form-control" id="usernameStaff" placeholder="Enter username" name="usernameStaff" autocomplete="off" value="<?= old("usernameStaff"); ?>" />
                                            <small class="text-danger" id="usernameStaffUsernameValidate">
                                                <?= $validation->getError('usernameStaff'); ?>
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="emailStaff">Email address</label>
                                            <input type="email" class="form-control" id="emailStaff" placeholder="Enter email" name="emailStaff" autocomplete="off" value="<?= old("emailStaff"); ?>" />
                                            <small class="text-danger" id="emailStaffEmailValidate">
                                                <?= $validation->getError('emailStaff'); ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="firstNameStaff">First Name</label>
                                            <input type="text" class="form-control" id="firstNameStaff" placeholder="Enter first name" name="firstNameStaff" value="<?= old("firstNameStaff"); ?>" />
                                            <small class="text-danger" id="firstNameStaffTextValidate"></small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="lastNameStaff">Last Name</label>
                                            <input type="text" class="form-control" id="lastNameStaff" placeholder="Enter last name" name="lastNameStaff" value="<?= old("lastNameStaff"); ?>" />
                                            <small class="text-danger" id="lastNameStaffTextValidate"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="staffPass">Password</label>
                                    <input type="password" class="form-control" id="staffPass" placeholder="Password" name="staffPass" />
                                    <small class="text-danger" id="staffPassPasswordValidate"></small>
                                </div>
                                <div class="form-group">
                                    <label for="staffProfile">Input Profile Picture</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="staffProfile" accept="Image/jpg,Image/jpeg,Image/png" name="staffProfile" />
                                            <label class="custom-file-label" for="staffProfile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                    <small class="text-danger">
                                        <?= $validation->getError('staffProfile'); ?>
                                    </small>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="submitAddStaff">
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