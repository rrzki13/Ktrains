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
  <?php if ($deleted_tiket) : ?>
    <div class="row my-3 justify-content-center" id="noRestore">
      <div class="col-md-3 text-center">
        <img src="img/confused.png" class="w-100" />
      </div>
    </div>
    <div class="row my-3 justify-content-center" id="noRestore">
      <div class="col-12 text-center">
        <h4 class="font-italic">
          hmm, sepertinya kamu belum memiliki tiket untuk di restore
        </h4>
      </div>
    </div>
    <div class="row mt-3" id="restoreParent">
      <?php $i = 0; ?>
      <?php foreach ($deleted_tiket as $key) : ?>
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
                      <?= $key['no_pesanan']; ?>
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
                      <?= $station_name[$i]['first_station']; ?> (<?= $key['stasiun_awal']; ?>)
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
                      <?= $station_name[$i]['last_station']; ?> (<?= $key['stasiun_akhir']; ?>)
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
                      <?= $key['deleted_in']; ?>
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
                      <button class="btn btn-primary w-100 restoreTiket" id="<?= $key['id']; ?>">
                        Restore tiket
                      </button>
                    </div>
                    <div class="col-6">
                      <button class="btn btn-danger w-100 hapusTiket" id="<?= $key['id']; ?>">
                        Hapus Tiket
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php $i++; ?>
      <?php endforeach ?>
    </div>
  <?php else : ?>
    <div class="row my-3 justify-content-center">
      <div class="col-md-3 text-center">
        <img src="img/confused.png" class="w-100" />
      </div>
    </div>
    <div class="row my-3 justify-content-center">
      <div class="col-12 text-center">
        <h4 class="font-italic">
          hmm, sepertinya kamu belum memiliki tiket untuk di restore
        </h4>
      </div>
    </div>
  <?php endif ?>
</div>

<!-- /main -->
<?= $this->endSection(); ?>