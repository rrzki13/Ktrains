<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- * section tiket -->
<div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-4 position-absolute">
          <div class="card shadow rounded w-100" id="cardShowTiket">
            <div class="card-body">
              <div class="row">
                <div class="col-12 text-center h5">Receipt</div>
              </div>
              <div
                class="row mt-3 justify-content-center"
                id="loadReceipt"
              >
                <div class="col-3 my-5">
                  <img src="img/833.gif" class="w-100" />
                </div>
              </div>
              <div
                class="row mt-3"
                id="receipt"
                style="opacity: 0; pointer-events: none;"
              >
                <!-- TODO : Locasi Penyimpanan receipt -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- */tiket -->

<!-- main -->

<div class="container mb-5" style="min-height: 400px">
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
                            <button class="btn btn-success w-100 btn-detail">Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /main -->
<?= $this->endSection(); ?>