<?= $this->extend("layout/templateStaff"); ?>

<?= $this->section("content"); ?>
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
                            <h3><?= count($order); ?></h3>

                            <p>Order Ticket</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-checkmark-circle"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-pink">
                        <div class="inner">
                            <h3><?= count($success); ?></h3>

                            <p>Successful Transaction</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-checkmark-circle"></i>
                        </div>
                        <a href="/staff/successTransaction" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= count($waiting); ?></h3>

                            <p>Waiting Transaction</p>
                        </div>
                        <div class="icon">
                            <i class="icon ion-checkmark-circle"></i>
                        </div>
                        <a href="/staff/waitingTransaction" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3><?= count($fail); ?></h3>

                            <p>Failed Transaction</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-checkmark-circle"></i>
                        </div>
                        <a href="/staff/failedTransaction" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                    <?php if ($order) : ?>
                                        <?php $i=1; ?>
                                        <?php foreach ($order as $key) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $key['no_pesanan']; ?></td>
                                                <td><?= $key['nama_pemesan']; ?></td>
                                                <td id="changeTotal"><?= $key['total']; ?></td>
                                                <?php 
                                                    if ($key['confirmed'] == "1") {
                                                        $status = "Lunas";
                                                        $color = "text-success";
                                                    }else {
                                                        $status = "Belum Lunas";
                                                        $color = "text-danger";
                                                        $today = date("Y-m-d");
                                                        if (strtotime($today) > strtotime($key['tanggal_berangkat'])) {
                                                            $status = "Gagal";
                                                        }
                                                    }
                                                ?>
                                                <td class="<?= $color; ?>"><?= $status; ?></td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach ?>
                                    <?php endif ?>
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