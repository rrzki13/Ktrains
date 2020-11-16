/* eslint-disable no-undef */
const detail_button = getAll(".btn-detail");
const card = getAll(".cardTiketOrder");
const formatter = new FormatMoney();
for (let i = 0; i < card.length; i++) {
  const e = card[i];
  const total = e.childNodes[1].childNodes[11].childNodes[3];
  const totalFormat = formatter.toRupiah(total.textContent);
  total.innerHTML = totalFormat;
}

for (let i = 0; i < detail_button.length; i++) {
  const btn = detail_button[i];
  btn.addEventListener("click", function () {
    let id = this.getAttribute("id");
    let no_pesanan = this.parentNode.parentNode.parentNode.parentNode
      .childNodes[1].childNodes[3].childNodes[3];
    let id_user = get("#myId").textContent;

    get(".blank").style.opacity = "1";
    get(".blank").style.pointerEvents = "visible";
    get("#cardShowTiket").style.opacity = "1";
    get("#cardShowTiket").style.pointerEvents = "visible";
    get("#loadReceipt").style.opacity = 1;
    get("#loadReceipt").style.position = "";
    get("#loadReceipt").style.minHeight = "300px";
    get("#receipt").style.opacity = 0;
    get("#receipt").style.pointerEvents = "none";
    get("#receipt").innerHTML = "";

    test(id, no_pesanan.textContent, id_user);
  });
}

get(".blank").addEventListener("click", function () {
  get(".blank").style.opacity = "0";
  get(".blank").style.pointerEvents = "none";
  get("#cardShowTiket").style.opacity = "0";
  get("#cardShowTiket").style.pointerEvents = "none";
  get("#loadReceipt").style.minHeight = "0";
  get("#receipt").innerHTML = "";
});

function test(id, no_pesanan, id_user) {
  let no = `131004_${id_user}_${id}_${no_pesanan}`;
  var request = new XMLHttpRequest();
  request.open(
    "GET",
    "http://localhost/ktrains-rest/api/tiketOrder?no_pesanan=" + no,
    true
  );

  request.onload = function () {
    if (this.status >= 200 && this.status < 400) {
      // Success!
      var data = JSON.parse(this.response);

      if (data.status) {
        get("#loadReceipt").style.opacity = 0;
        get("#loadReceipt").style.position = "absolute";
        get("#loadReceipt").style.minHeight = "0";
        get("#receipt").style.opacity = 1;
        get("#receipt").style.pointerEvents = "visibled";
        const dataValue = data.data;
        let note =
          dataValue.confirmed == 0
            ? "Note: Harap Selesaikan Pembayaran"
            : "Note: Terimakasih telah mengorder tiket";
        let string = /* html */ `<div class="col-12">
          <div class="row">
            <div class="col-5">No. Pesanan</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${dataValue.no_pesanan}</div>
          </div>
          <div class="row">
            <div class="col-5">Nama Kereta ${(dataValue.pulang_pergi == 1) ? "(Berangkat)" : ''}</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${dataValue.nama_kereta}</div>
          </div>
          <div class="row pulang_pergi">
            <div class="col-5">Nama Kereta (Pulang)</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${dataValue.nama_kereta_pulang}</div>
          </div>
          <div class="row">
            <div class="col-5">Jumlah Tiket</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${dataValue.jumlah_tiket}</div>
          </div>
          <div class="row">
            <div class="col-5">Stasiun Awal</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${dataValue.stasiun_awal}</div>
          </div>
          <div class="row">
            <div class="col-5">Stasiun Akhir</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${dataValue.stasiun_akhir}</div>
          </div>
          <div class="row">
            <div class="col-5">Dewasa</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${dataValue.dewasa}</div>
          </div>
          <div class="row">
            <div class="col-5">Bayi</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${dataValue.bayi}</div>
          </div>
          <div class="row">
            <div class="col-5">Tanggal Berangkat</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${dataValue.tanggal_berangkat}</div>
          </div>
          <div class="row pulang_pergi">
            <div class="col-5">Tanggal Pulang</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${dataValue.tanggal_pulang}</div>
          </div>
          <div class="row">
            <div class="col-5">Tempat Duduk ${(dataValue.pulang_pergi == 1) ? "(Berangkat)" : ''}</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${dataValue.tempat_duduk}</div>
          </div>
          <div class="row pulang_pergi">
            <div class="col-5">Tempat Duduk (Pulang)</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${dataValue.tempat_duduk_pulang}</div>
          </div>
          <div class="row">
            <div class="col-5">Total</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right" id="totalCard">${dataValue.total}</div>
          </div>
          <div class="row mt-3">
            <svg id="receiptCardBarcode"></svg>
          </div>
          <div class="row mt-2">
            <div class="col-12 text-center">
              <span class="text-muted">${note}</span>
            </div>
          </div>
        </div>
            `;

        get("#receipt").innerHTML = string;

        setTimeout(() => {
          let harga = formatter.toRupiah(get("#totalCard").textContent);
          get("#totalCard").innerHTML = harga;
          if (dataValue.pulang_pergi == 0) {
            const pulang = Array.from(getAll(".pulang_pergi"));
            pulang.forEach(p => p.classList.add("d-none"));
          }

          JsBarcode("#receiptCardBarcode", dataValue.no_pesanan, {
            format: "codabar",
            lineColor: "#000",
            width: 1.7,
            height: 40,
            displayValue: true,
            background: "#fff",
            fontSize: "17",
          });
        }, 100);
      }
    } else {
      // We reached our target server, but it returned an error
      get(".blank").style.opacity = "0";
      get(".blank").style.pointerEvents = "none";
      get("#cardShowTiket").style.opacity = "0";
      get("#cardShowTiket").style.pointerEvents = "none";
      get("#loadReceipt").style.opacity = 0;
      get("#loadReceipt").style.position = "";
      get("#loadReceipt").style.minHeight = "300px";
      get("#receipt").style.opacity = 0;
      get("#receipt").style.pointerEvents = "none";
      Swal.fire(
        "opps, unable to get receipt, please try again later",
        "",
        "info"
      );
      return false;
    }
  };

  request.onerror = function () {
    // There was a connection error of some sort
    Swal.fire(
      "opps, unabled to connect check your internet connection",
      "",
      "info"
    );
    return false;
  };

  request.send();
}
