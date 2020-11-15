<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- main -->

<div class="container my-5" style="min-height: 400px">
  <div class="row mb-3">
    <div class="col-12">
      <h3>Beli Tiket</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <small id="jml_gerbong" class="d-none"></small>
      <input type="hidden" name="waktu_berangkat" id="waktu_berangkat" value="<?= $data_pesan_tiket['waktu_berangkat']; ?>">
      <input type="hidden" name="waktu_sampai" id="waktu_sampai" value="<?= $data_pesan_tiket['waktu_sampai']; ?>">
      <input type="hidden" name="stasiunAwal" id="stasiunAwal" value="<?= $data_pesan_tiket['dari']; ?>">
      <input type="hidden" name="stasiunAkhir" id="stasiunAkhir" value="<?= $data_pesan_tiket['ke']; ?>">
      <input type="hidden" name="id_kereta" id="id_kereta" value="<?= $data_pesan_tiket['id_kereta']; ?>">
      <input type="hidden" class="form-control" id="dewasa" value="<?= $data_pesan_tiket['dewasa']; ?>" readonly />
      <input type="hidden" class="form-control" id="anak" value="<?= $data_pesan_tiket['anak']; ?>" readonly />
      <input type="hidden" class="form-control" id="tglBerangkat" value="<?= $data_pesan_tiket['berangkat']; ?>" readonly />
      <?php if (isset($data_pesan_tiket['pulang'])) : ?>
        <input type="hidden" class="form-control" id="tglPulang" value="<?= $data_pesan_tiket['pulang']; ?>" readonly />
      <?php endif; ?>
      <input type="hidden" name="id_user" id="id_user" value="<?= session()->get('id'); ?>">
      <div class="row mb-2">
        <h4>Masukan Nama penumpang</h4>
      </div>
      <div class="row mb-2">
        <?php for ($i = 0; $i < intval($data_pesan_tiket['jumlahTiket']); $i++) : ?>
          <div class="col-md-6 mb-3">
            <input type="text" class="form-control namaPenumpang" onkeyup="justText(this)" id="namaPenumpang<?= $i + 1; ?>" autofocus placeholder="Nama Penumpang <?= $i + 1; ?>" />
            <small class="text-danger" id="namaPenumpang<?= $i + 1; ?>TextValidate"></small>
          </div>
        <?php endfor; ?>
      </div>
      <div class="row mb-2">
        <h4>Pilih tempat duduk</h4>
        <input type="text" id="seat" />
      </div>
      <div class="row mb-3">
        <div class="col-md-9" id="seat_select"></div>
      </div>
      <div class="row mb-3 center-in-md">
        <div class="col-8">
          <div class="row">
            <div class="col-5">
              <div class="row">
                <img src="/img/button_left.png" class="button_arrow" id="gerbongSebelum" />
              </div>
            </div>
            <div class="col-2 h1 text-center">
              <h1 class="my-3" id="gerbongIni">1</h1>
            </div>
            <div class="col-5">
              <div class="row justify-content-end">
                <img src="/img/button_right.png" class="button_arrow" id="gerbongSelanjutnya" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-12">
          <h3>Sub total</h3>
          <span class="text-muted" id="total"><?= $data_pesan_tiket['total']; ?></span>
          <small id="totalOy" class="d-none"><?= $data_pesan_tiket['total']; ?></small>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-md-6">
          <button class="btn btn-primary w-100" id="beliTiket">
            Beli tiket
          </button>
          <a href="/Order" class="text-primary" id="lihatDetail">Lihat Detail</a>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="row justify-content-center" id="load">
        <div class="col-2">
          <img src="img/833.gif" alt="load" class="w-100" />
        </div>
      </div>
      <div class="row none-in-md" id="receiptTitle">
        <div class="col-12 text-center">
          <h4>Ini bukti pembelian mu</h4>
        </div>
      </div>
      <div class="row mt-3 justify-content-center" id="receiptCard">
        <div class="col-md-9" id="tiketPlace"></div>
      </div>
    </div>
  </div>
</div>

<!-- /main -->
<?= $this->endSection(); ?>