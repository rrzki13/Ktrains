/* eslint-disable no-undef */
const formatter = new FormatMoney();
const change = formatter.toRupiah(get("#total").textContent);
get("#total").innerHTML = change;

get("#beliTiket").addEventListener("click", function () {
  if (justText(get("#namaPemesan")) && justText(get("#namaPemesan"))) {
    get("#load").style.opacity = "1";
    get("#receiptTitle").style.pointerEvent = "none";
    get("#receiptTitle").style.position = "absolute";
    get("#receiptTitle").style.opacity = "0";
    get("#receiptCard").style.pointerEvent = "none";
    get("#receiptCard").style.position = "absolute";
    get("#receiptCard").style.opacity = "0";
    get("#tiketPlace").innerHTML = "";
    get("#beliTiket").style.display = "none";
    get("#lihatDetail").style.display = "block";

    setTimeout(() => {
      if (get("#tglPulang") != null) {
        // * if tiket pulang pergi
        // TODO: buat method post untuk tiket pulang pergi
        postTiket(get("#tglPulang").value);
      } else {
        // * if tike sekali jalan
        // TODO: buat method post untuk tiket sekali jalan
        postTiket(0);
      }
    }, 3000);
  }
});

function postTiket(pulang) {
  let no_pesan = new Date().getTime();
  let no_pesanan =
    no_pesan.toString() + get("#id_kereta").value + get("#id_user").value;
  let data = {
    no_pesanan: no_pesanan,
    id_kereta: get("#id_kereta").value,
    nama_kereta: get("#namaKereta").value,
    jumlah_tiket: get("#jumlahTiket").value,
    stasiun_awal: get("#stasiunAwal").value,
    stasiun_akhir: get("#stasiunAkhir").value,
    dewasa: get("#dewasa").value,
    bayi: get("#anak").value,
    tanggal_berangkat: get("#tglBerangkat").value,
    tanggal_pulang: pulang,
    total: get("#totalOy").textContent,
    id_pemesan: get("#id_user").value,
    nama_pemesan: get("#namaPemesan").value,
    email_pemesan: get("#emailPemesan").value,
  };

  $.ajax({
    url: "http://localhost/ktrains-rest/api/TiketOrder",
    type: "post",
    dataType: "json",
    data: data,
    success: function (result) {
      get("#load").style.opacity = "0";
      get("#load").style.pointerEvent = "none";
      get("#load").style.position = "absolute";
      get("#receiptTitle").style.pointerEvent = "visible";
      get("#receiptTitle").style.position = "static";
      get("#receiptTitle").style.opacity = "1";
      get("#receiptCard").style.pointerEvent = "visible";
      get("#receiptCard").style.position = "static";
      get("#receiptCard").style.opacity = "1";
      if (result.status) {
        let string;
        if (pulang == 0) {
          string =
            `
  <div class="card p-3 shadow" style="background-color: #fff">
  <div class="row">
    <div class="col-12 text-center">Receipt</div>
  </div>
  <div class="row mt-3">
    <div class="col-5">No. Pesanan</div>
    <div class="col-2 text-center">:</div>
    <div class="col-5 text-right">` +
            result.data.no_pesanan +
            `</div>
  </div>
  <div class="row mt-1">
    <div class="col-5">Nama Kereta</div>
    <div class="col-2 text-center">:</div>
    <div class="col-5 text-right">` +
            result.data.nama_kereta +
            `</div>
  </div>
  <div class="row mt-1">
    <div class="col-5">Jumlah Tiket</div>
    <div class="col-2 text-center">:</div>
    <div class="col-5 text-right">` +
            result.data.jumlah_tiket +
            `</div>
  </div>
  <div class="row mt-1">
    <div class="col-5">Stasiun Awal</div>
    <div class="col-2 text-center">:</div>
    <div class="col-5 text-right">` +
            result.data.stasiun_awal +
            `</div>
  </div>
  <div class="row mt-1">
    <div class="col-5">Stasiun Akhir</div>
    <div class="col-2 text-center">:</div>
    <div class="col-5 text-right">` +
            result.data.stasiun_akhir +
            `</div>
  </div>
  <div class="row mt-1">
    <div class="col-5">Dewasa</div>
    <div class="col-2 text-center">:</div>
    <div class="col-5 text-right">` +
            result.data.dewasa +
            `</div>
  </div>
  <div class="row mt-1">
    <div class="col-5">Anak</div>
    <div class="col-2 text-center">:</div>
    <div class="col-5 text-right">` +
            result.data.bayi +
            `</div>
  </div>
  <div class="row mt-1">
    <div class="col-5">Tanggal Berangkat</div>
    <div class="col-2 text-center">:</div>
    <div class="col-5 text-right">` +
            result.data.tanggal_berangkat +
            `</div>
  </div>
  <div class="row mt-1">
    <div class="col-5">Total</div>
    <div class="col-2 text-center">:</div>
    <div class="col-5 text-right">` +
            formatter.toRupiah(result.data.total) +
            `</div>
  </div>
  <div class="row justify-content-center mt-3">
    <div class="col-12 text-center">
      <svg id="barcodeTiket"></svg>
    </div>
  </div>
  <div class="row justify-content-center mt-3">
    <div class="col-12 text-center">
      <span class="text-muted"
        >Note: harap selesaikan pembayaran</span
      >
    </div>
  </div>
</div>
  `;
        } else {
          string =
            `
            <div class="card p-3 shadow" style="background-color: #fff">
            <div class="row">
              <div class="col-12 text-center">Receipt</div>
            </div>
            <div class="row mt-3">
              <div class="col-5">No. Pesanan</div>
              <div class="col-2 text-center">:</div>
              <div class="col-5 text-right">` +
            result.data.no_pesanan +
            `</div>
            </div>
            <div class="row mt-1">
              <div class="col-5">Nama Kereta</div>
              <div class="col-2 text-center">:</div>
              <div class="col-5 text-right">` +
            result.data.nama_kereta +
            `</div>
            </div>
            <div class="row mt-1">
              <div class="col-5">Jumlah Tiket</div>
              <div class="col-2 text-center">:</div>
              <div class="col-5 text-right">` +
            result.data.jumlah_tiket +
            `</div>
            </div>
            <div class="row mt-1">
              <div class="col-5">Stasiun Awal</div>
              <div class="col-2 text-center">:</div>
              <div class="col-5 text-right">` +
            result.data.stasiun_awal +
            `</div>
            </div>
            <div class="row mt-1">
              <div class="col-5">Stasiun Akhir</div>
              <div class="col-2 text-center">:</div>
              <div class="col-5 text-right">` +
            result.data.stasiun_akhir +
            `</div>
            </div>
            <div class="row mt-1">
              <div class="col-5">Dewasa</div>
              <div class="col-2 text-center">:</div>
              <div class="col-5 text-right">` +
            result.data.dewasa +
            `</div>
            </div>
            <div class="row mt-1">
              <div class="col-5">Anak</div>
              <div class="col-2 text-center">:</div>
              <div class="col-5 text-right">` +
            result.data.bayi +
            `</div>
            </div>
            <div class="row mt-1">
              <div class="col-5">Tanggal Berangkat</div>
              <div class="col-2 text-center">:</div>
              <div class="col-5 text-right">` +
            result.data.tanggal_berangkat +
            `</div>
            </div>
            <div class="row mt-1">
              <div class="col-5">Tanggal Pulang</div>
              <div class="col-2 text-center">:</div>
              <div class="col-5 text-right">` +
            result.data.tanggal_pulang +
            `</div>
            </div>
            <div class="row mt-1">
              <div class="col-5">Total</div>
              <div class="col-2 text-center">:</div>
              <div class="col-5 text-right">` +
            formatter.toRupiah(result.data.total) +
            `</div>
            </div>
            <div class="row justify-content-center mt-3">
              <div class="col-12 text-center">
                <svg id="barcodeTiket"></svg>
              </div>
            </div>
            <div class="row justify-content-center mt-3">
              <div class="col-12 text-center">
                <span class="text-muted"
                  >Note: harap selesaikan pembayaran</span
                >
              </div>
            </div>
          </div>
            `;
        }
        get("#tiketPlace").innerHTML = string;
        setTimeout(() => {
          JsBarcode("#barcodeTiket", result.data.no_pesanan, {
            format: "codabar",
            lineColor: "#000",
            width: 1.7,
            height: 40,
            displayValue: true,
            background: "#fff",
            fontSize: "17",
          });
        }, 200);
      } else {
        get("#beliTiket").style.display = "block";
        get("#lihatDetail").style.display = "none";
        alert(result.message);
      }
    },
  });
}
