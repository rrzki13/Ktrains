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
  <?php if ($history) : ?>
    <?php foreach ($history as $key) : ?>
      <div class="row">
        <div class="col-md-4 mb-3 card-container">
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <p class="font-weight-bold">Histori Tiket</p>
                </div>
                <div class="col-6 text-right">
                  <i class="fa fa-times point delete" id="<?= $key['id']; ?>"></i>
                </div>
              </div>
              <div class="row">
                <div class="col-5">No pesanan</div>
                <div class="col-1 text-center">:</div>
                <div class="col-6 text-right"><?= $key['no_pesanan']; ?></div>
              </div>
              <div class="row">
                <div class="col-5">status</div>
                <div class="col-1 text-center">:</div>
                <div class="col-6 text-right text-success">Lunas</div>
              </div>
              <div class="row mt-3">
                <div class="col-12 text-right">
                  <p class="text-primary point lihatTiket" id="<?= $key['id']; ?>">
                    Lihat Tiket
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  <?php else : ?>
    <div class="row my-3" id="noHistory">
      <div class="col-12 text-center">
        <h1 class="font-italic">You dont have history yet :(</h1>
      </div>
    </div>
  <?php endif ?>
</div>

<!-- /main -->

<!-- * restore -->

<div class="container">
  <div class="row justify-content-end">
    <div class="shadow p-3" id="restore" data-id="index.html">
      <img src="img/restore.png" width="35" height="35" />
      <span class="ml-3 font-weight-bold">Restore Tiket</span>
    </div>
  </div>
</div>

<!-- * /restore -->

<!-- * Tiket -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 p-2 position-absolute" id="theTiketHistory"></div>
  </div>
</div>
<!-- * /Tiket -->

<?= $this->endSection(); ?>