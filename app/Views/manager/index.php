<?= $this->extend('layout/templateManager'); ?>

<?= $this->section('content'); ?>

<!-- * Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- * Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
            <!-- * Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= count($stasiun); ?></h3>

                            <p>Station</p>
                        </div>
                        <div class="icon">
                            <ion-icon name="ios-train"></ion-icon>
                        </div>
                        <a href="/manager/stationList" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-pink">
                        <div class="inner">
                            <h3><?= count($user); ?></h3>

                            <p>User Data</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="/manager/userList" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= count($best_train); ?></h3>

                            <p>Best Train</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="/manager/BestTrain" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3><?= count($kereta); ?></h3>

                            <p>Train List</p>
                        </div>
                        <!-- <div class="icon">
                            <i class="fa fa-train card-icon"></i>
                        </div> -->
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="/manager/TrainList" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= count($staff); ?></h3>

                            <p>Add Staff</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="/manager/addList" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= count($staff); ?></h3>

                            <p>Staff Data</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="/manager/staffList" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <!-- * table content -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Order Ticket</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dataMobil" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Pesanan</th>
                                        <th>Nama Pemesan</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($order as $key) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $key['no_pesanan']; ?></td>
                                            <td><?= $key['nama_pemesan']; ?></td>
                                            <td id="totalInManagerHome"><?= $key['total']; ?></td>
                                            <?php
                                            $today = date("Y-m-d");
                                            if ($key['confirmed'] == "1") {
                                                $status = "Lunas";
                                                $statusColor = "text-success";
                                            } else {
                                                $status = "Belum Lunas";
                                                $statusColor = "text-danger";
                                                if (strtotime($today) > strtotime($key['tanggal_berangkat'])) {
                                                    $status = "Gagal";
                                                    $statusColor = "text-danger";
                                                }
                                            }
                                            ?>
                                            <td class="<?= $statusColor; ?>"><?= $status; ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- ? /.content-wrapper -->

<?= $this->endSection(); ?>