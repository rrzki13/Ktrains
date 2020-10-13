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
          <input type="hidden" name="id_kereta" id="id_kereta" value="<?= $data_pesan_tiket['id_kereta']; ?>">
          <input type="hidden" name="id_user" id="id_user" value="<?= session()->get('id'); ?>">
          <div class="row mb-2">
            <div class="col-md-6">
              <label for="namaKereta" class="form-label">Nama Kereta</label>
              <input
                type="text"
                class="form-control"
                id="namaKereta"
                value="<?= $data_pesan_tiket['nama_kereta']; ?>"
                readonly
              />
            </div>
            <div class="col-md-6">
              <label for="jumlahTiket" class="form-label">Jumlah Tiket</label>
              <input
                type="text"
                class="form-control"
                id="jumlahTiket"
                value="<?= $data_pesan_tiket['jumlahTiket']; ?>"
                readonly
              />
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-6">
              <label for="stasiunAwal" class="form-label">Stasiun Awal</label>
              <input
                type="text"
                class="form-control"
                id="stasiunAwal"
                value="<?= $data_pesan_tiket['dari']; ?>"
                readonly
              />
            </div>
            <div class="col-md-6">
              <label for="stasiunAkhir" class="form-label">Stasiun Akhir</label>
              <input
                type="text"
                class="form-control"
                id="stasiunAkhir"
                value="<?= $data_pesan_tiket['ke']; ?>"
                readonly
              />
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-6">
              <label for="dewasa" class="form-label">Dewasa</label>
              <input
                type="text"
                class="form-control"
                id="dewasa"
                value="<?= $data_pesan_tiket['dewasa']; ?>"
                readonly
              />
            </div>
            <div class="col-md-6">
              <label for="anak" class="form-label">Anak</label>
              <input
                type="text"
                class="form-control"
                id="anak"
                value="<?= $data_pesan_tiket['anak']; ?>"
                readonly
              />
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-6">
              <label for="namaPemesan" class="form-label">Nama Pemesan</label>
              <input
                type="text"
                class="form-control"
                id="namaPemesan"
                value="Rizki"
                onkeyup="justText(this)"
              />
              <small class="text-danger" id="namaPemesanTextValidate"></small>
            </div>
            <div class="col-md-6">
              <label for="emailPemesan" class="form-label">Email Pemesan</label>
              <input
                type="email"
                class="form-control"
                id="emailPemesan"
                value="rizki@gmail.com"
                onkeyup="ValidateEmail(this)"
              />
              <small class="text-danger" id="emailPemesanEmailValidate"></small>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-6">
              <label for="tglBerangkat" class="form-label"
                >Tanggal Berangkat</label
              >
              <input
                type="text"
                class="form-control"
                id="tglBerangkat"
                value="<?= $data_pesan_tiket['berangkat']; ?>"
                readonly
              />
            </div>
            <?php if(isset($data_pesan_tiket['pulang'])): ?>
              <div class="col-md-6">
              <label for="tglPulang" class="form-label"
                >Tanggal Pulang</label
              >
              <input
                type="text"
                class="form-control"
                id="tglPulang"
                value="<?= $data_pesan_tiket['pulang']; ?>"
                readonly
              />
            </div>
            <?php endif; ?>
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
              <a href="/Order" class="text-primary" id="lihatDetail"
                >Lihat Detail</a
              >
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