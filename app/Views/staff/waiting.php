<?= $this->extend("layout/templateStaff"); ?>

<?= $this->section("content"); ?>
<!-- * Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- * Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Waiting Transaction</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Waiting Transaction</a></li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Waiting Transaction</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dataMobil" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order Number</th>
                                        <th>Tickets</th>
                                        <th>Customer Name</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($wait) : ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($wait as $key) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $key['no_pesanan']; ?></td>
                                                <td><?= $key['jumlah_tiket']; ?></td>
                                                <td><?= $key['passengers_name']; ?></td>
                                                <td id="changeTotal"><?= $key['total']; ?></td>
                                                <td>
                                                    <form role="form" class="d-inline" method="POST" action="/staff/confirm">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="id" value="<?= $key['id']; ?>">
                                                        <input type="hidden" name="confirm_by" value="<?= session()->get("id"); ?>">
                                                        <button class="btn btn-success"  type="submit" id="btnConfirm">Confirm</button>
                                                    </form>
                                                </td>
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