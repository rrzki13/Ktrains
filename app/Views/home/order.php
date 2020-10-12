<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- main -->

<div class="container my-5" style="min-height: 400px">
    <div class="row">
        <div class="col-12">
            <h3>Order tiket</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <hr class="bg-primary" style="height: 2px" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="font-weight-bold">Data Tiket</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">No pesanan</div>
                        <div class="col-6 text-right">Bima</div>
                    </div>
                    <div class="row">
                        <div class="col-6">Stasiun awal</div>
                        <div class="col-6 text-right">Bima</div>
                    </div>
                    <div class="row">
                        <div class="col-6">Stasiun akhir</div>
                        <div class="col-6 text-right">Bima</div>
                    </div>
                    <div class="row">
                        <div class="col-6">Berangkat</div>
                        <div class="col-6 text-right">Bima</div>
                    </div>
                    <div class="row">
                        <div class="col-6">Total</div>
                        <div class="col-6 text-right">Bima</div>
                    </div>
                    <div class="row">
                        <div class="col-6">status</div>
                        <div class="col-6 text-right text-success">Lunas</div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row justify-content-end">
                        <div class="col-6">
                            <button class="btn btn-success w-100">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="font-weight-bold">Data Tiket</p>
                        </div>
                        <div class="col-6 text-primary text-right">
                            <i class="fa fa-check-circle mr-2"></i>tiket pulang pergi
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">No pesanan</div>
                        <div class="col-6 text-right">Bima</div>
                    </div>
                    <div class="row">
                        <div class="col-6">Stasiun awal</div>
                        <div class="col-6 text-right">Bima</div>
                    </div>
                    <div class="row">
                        <div class="col-6">Stasiun akhir</div>
                        <div class="col-6 text-right">Bima</div>
                    </div>
                    <div class="row">
                        <div class="col-6">Berangkat</div>
                        <div class="col-6 text-right">Bima</div>
                    </div>
                    <div class="row">
                        <div class="col-6">Pulang</div>
                        <div class="col-6 text-right">Bima</div>
                    </div>
                    <div class="row">
                        <div class="col-6">Total</div>
                        <div class="col-6 text-right">Bima</div>
                    </div>
                    <div class="row">
                        <div class="col-6">status</div>
                        <div class="col-6 text-right text-success">Lunas</div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row justify-content-end">
                        <div class="col-6">
                            <button class="btn btn-success w-100">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="font-weight-bold">Data Tiket</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">No pesanan</div>
                        <div class="col-6 text-right">Bima</div>
                    </div>
                    <div class="row">
                        <div class="col-6">Stasiun awal</div>
                        <div class="col-6 text-right">Bima</div>
                    </div>
                    <div class="row">
                        <div class="col-6">Stasiun akhir</div>
                        <div class="col-6 text-right">Bima</div>
                    </div>
                    <div class="row">
                        <div class="col-6">Berangkat</div>
                        <div class="col-6 text-right">Bima</div>
                    </div>
                    <div class="row">
                        <div class="col-6">Total</div>
                        <div class="col-6 text-right">Bima</div>
                    </div>
                    <div class="row">
                        <div class="col-6">status</div>
                        <div class="col-6 text-right text-danger">Gagal</div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row justify-content-end">
                        <div class="col-6">
                            <button class="btn btn-danger w-100">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /main -->
<?= $this->endSection(); ?>