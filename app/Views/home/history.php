<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- main -->

<div class="container my-5" style="min-height: 400px">
    <div class="row">
        <div class="col-12">
            <h3>Histori Transaksi</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <hr class="bg-primary" style="height: 2px" />
        </div>
    </div>
    <div class="row my-3" style="display: none" id="noHistory">
        <div class="col-12 text-center">
            <h1 class="font-italic">You dont have history yet :(</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3 card-container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="font-weight-bold">Histori Tiket</p>
                        </div>
                        <div class="col-6 text-right">
                            <i class="fa fa-times point delete" id="1"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">No pesanan</div>
                        <div class="col-2 text-center">:</div>
                        <div class="col-5 text-right">1598190426</div>
                    </div>
                    <div class="row">
                        <div class="col-5">status</div>
                        <div class="col-2 text-center">:</div>
                        <div class="col-5 text-right text-success">Lunas</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-right">
                            <p class="text-primary point">Lihat Tiket</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3 card-container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="font-weight-bold">Histori Tiket</p>
                        </div>
                        <div class="col-6 text-right">
                            <i class="fa fa-times point delete" id="2"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">No pesanan</div>
                        <div class="col-2 text-center">:</div>
                        <div class="col-5 text-right">1598190427</div>
                    </div>
                    <div class="row">
                        <div class="col-5">status</div>
                        <div class="col-2 text-center">:</div>
                        <div class="col-5 text-right text-success">Lunas</div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-right">
                            <p class="text-primary point">Lihat Tiket</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /main -->
<?= $this->endSection(); ?>