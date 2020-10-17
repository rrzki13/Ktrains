<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- * main -->

<div class="container my-5" style="min-height: 400px;">
      <div class="row">
        <div class="col-12">
          <h3>Restore Tiket</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <hr class="bg-primary" style="height: 2px;" />
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-6 mb-3">
          <div class="card shadow">
            <div class="card-body">
              <div class="row">
                <span class="font-weight-bold">Restore Tiket</span>
              </div>
              <div class="row mt-2">
                <div class="col-12">
                  <div class="row">
                    <div class="col-5">
                      No. Pesanan
                    </div>
                    <div class="col-1 text-center">
                      :
                    </div>
                    <div class="col-6 text-right">
                      8983098120980298
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5">
                      Stasiun Awal
                    </div>
                    <div class="col-1 text-center">
                      :
                    </div>
                    <div class="col-6 text-right">
                      Jakarta Kota (JAKK)
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5">
                      Stasiun Akhir
                    </div>
                    <div class="col-1 text-center">
                      :
                    </div>
                    <div class="col-6 text-right">
                      Bandung (BD)
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5">
                      Dihapus Pada tanggal
                    </div>
                    <div class="col-1 text-center">
                      :
                    </div>
                    <div class="col-6 text-right">
                      2020-10-20
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-md-7">
                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-primary w-100 restoreTiket" id="1">
                        Restore tiket
                      </button>
                    </div>
                    <div class="col-6">
                      <button class="btn btn-danger w-100 hapusTiket" id="1">
                        Hapus Tiket
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- /main -->
<?= $this->endSection(); ?>