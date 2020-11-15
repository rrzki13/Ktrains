/* eslint-disable no-undef */
const formatter = new FormatMoney();
const change = formatter.toRupiah(get("#total").textContent);

function jml_gerbong_test() {
  $.ajax({
    url: `http://localhost/ktrains-rest/api/Train?id=${
      get("#id_kereta").value
    }`,
    type: "get",
    dataType: "json",
    success: function (result) {
      let jml_gerbong_test = result.data[0].jml_gerbong;
      get("#jml_gerbong").innerHTML = jml_gerbong_test;
    },
  });
}

jml_gerbong_test();
get("#total").innerHTML = change;
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
});

get("#beliTiket").addEventListener("click", function () {
  const penumpang = Array.from(getAll(".namaPenumpang"));
  let validated = true;
  penumpang.forEach((p) => {
    if (!justText(p)) {
      validated = false;
    }
  });

  if (get("#seat").value === "") {
    Toast.fire({
      icon: "warning",
      title: `Pilih kursi terlebih dahulu`,
    });
    validated = false;
  }

  const splitSeatValue = get("#seat").value.split(",");
  if (
    splitSeatValue.length <
    parseInt(get("#dewasa").value) + parseInt(get("#anak").value)
  ) {
    Toast.fire({
      icon: "warning",
      title: `Pilih ${
        parseInt(get("#dewasa").value) + parseInt(get("#anak").value)
      } kursi`,
    });
    validated = false;
  }

  if (validated) {
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

    if (get("#tglPulang") != null) {
      // * if tiket pulang pergi
      // TODO: buat method post untuk tiket pulang pergi
      pesanTiket(get("#tglPulang").value);
    } else {
      // * if tike sekali jalan
      // TODO: buat method post untuk tiket sekali jalan
      pesanTiket(0);
    }
  }
});

function pesanTiket(pulang) {
  let no_pesan = new Date().getTime();
  let no_pesanan =
    no_pesan.toString() + get("#id_kereta").value + get("#id_user").value;
  let passengers_name_array = Array.from(getAll(".namaPenumpang"));
  let passengers_name = "";
  passengers_name_array.forEach((p) => {
    if (passengers_name.length > 0) {
      passengers_name += `,${p.value}`;
    } else {
      passengers_name += p.value;
    }
  });
  let waktu = `${get("#waktu_berangkat").value}-${get("#waktu_sampai").value}`;
  let data = {
    no_pesanan: no_pesanan,
    id_kereta: get("#id_kereta").value,
    jumlah_tiket: parseInt(get("#dewasa").value) + parseInt(get("#anak").value),
    stasiun_awal: get("#stasiunAwal").value,
    stasiun_akhir: get("#stasiunAkhir").value,
    dewasa: get("#dewasa").value,
    bayi: get("#anak").value,
    tanggal_berangkat: get("#tglBerangkat").value,
    tanggal_pulang: pulang,
    perkiraan_jam: waktu,
    total: get("#totalOy").textContent,
    id_pemesan: get("#id_user").value,
    passengers_name: passengers_name,
    seat: get("#seat").value,
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
        if (pulang == 0) {
          console.log(result);
          Toast.fire({
            icon: "success",
            title: result.message,
          });
          const data = result.data;
          let string = /*html*/ `<div class="card p-3 shadow" style="background-color: #fff">
          <div class="row">
            <div class="col-12 text-center">Receipt</div>
          </div>
          <div class="row mt-3">
            <div class="col-5">No. Pesanan</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${data.no_pesanan}</div>
          </div>
          <div class="row mt-1">
            <div class="col-5">Nama Kereta</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${data.nama_kereta}</div>
          </div>
          <div class="row mt-1">
            <div class="col-5">Jumlah Tiket</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${data.jumlah_tiket}</div>
          </div>
          <div class="row mt-1">
            <div class="col-5">Stasiun Awal</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${data.stasiun_awal}</div>
          </div>
          <div class="row mt-1">
            <div class="col-5">Stasiun Akhir</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${data.stasiun_akhir}</div>
          </div>
          <div class="row mt-1">
            <div class="col-5">Tempat Duduk</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${data.seat}</div>
          </div>
          <div class="row mt-1">
            <div class="col-5">Dewasa</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${data.dewasa}</div>
          </div>
          <div class="row mt-1">
            <div class="col-5">Anak</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${data.bayi}</div>
          </div>
          <div class="row mt-1">
            <div class="col-5">Tanggal Berangkat</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${data.tanggal_berangkat}</div>
          </div>
          <div class="row mt-1">
            <div class="col-5">Total</div>
            <div class="col-2 text-center">:</div>
            <div class="col-5 text-right">${formatter.toRupiah(data.total)}</div>
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
          get("#tiketPlace").innerHTML = string;
          setTimeout(() => {
            JsBarcode("#barcodeTiket", data.no_pesanan, {
              format: "codabar",
              lineColor: "#000",
              width: 1.7,
              height: 40,
              displayValue: true,
              background: "#fff",
              fontSize: "17",
            });
          }, 200);
        }
      } else {
        get("#beliTiket").style.display = "block";
        get("#lihatDetail").style.display = "none";
        Toast.fire({
          icon: "warning",
          title: result.message,
        });
      }
    },
  });
}

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

// * new one

const notAvailable = [
  "A01",
  "A02",
  "A03",
  "A13",
  "A11",
  "A25",
  "A27",
  "A40",
  "B40",
  "C01",
  "C02",
  "C03",
];
setTimeout(() => {
  createTemplateChosseSeat("A", notAvailable);

  const jml_gerbong = get("#jml_gerbong").textContent;
  get("#gerbongSebelum").addEventListener("click", function () {
    this.style.opacity = 0.8;
    const checkThisOut = parseInt(get("#gerbongIni").textContent) - 1;
    if (checkThisOut > 0) {
      const ranger = [];
      // * get range a-z
      for (const x of Array(26).keys()) {
        let huruf = String.fromCharCode("A".charCodeAt(0) + x);
        ranger.push(huruf);
      }
      get("#gerbongIni").innerHTML = checkThisOut;
      get(".train").style.marginLeft = "-450px";
      get(".train").style.marginRight = "450px";
      get(".train").style.opacity = 0;
      setTimeout(() => {
        this.style.opacity = 1;
        createTemplateChosseSeat(
          ranger[checkThisOut - 1],
          notAvailable,
          false,
          true
        );
        setTimeout(() => {
          get(".train").style.marginLeft = "0px";
          get(".train").style.marginRight = "0px";
        }, 50);
      }, 500);
    }
  });

  get("#gerbongSelanjutnya").addEventListener("click", function () {
    this.style.opacity = 0.8;
    const checkThisOut = parseInt(get("#gerbongIni").textContent) + 1;
    if (checkThisOut <= jml_gerbong) {
      const ranger = [];
      // * get range a-z
      for (const x of Array(26).keys()) {
        let huruf = String.fromCharCode("A".charCodeAt(0) + x);
        ranger.push(huruf);
      }
      get("#gerbongIni").innerHTML = checkThisOut;
      get(".train").style.marginLeft = "450px";
      get(".train").style.marginRight = "-450px";
      get(".train").style.opacity = "0";
      setTimeout(() => {
        this.style.opacity = 1;
        createTemplateChosseSeat(
          ranger[checkThisOut - 1],
          notAvailable,
          true,
          false
        );
        setTimeout(() => {
          get(".train").style.marginLeft = "0px";
          get(".train").style.marginRight = "0px";
        }, 50);
      }, 500);
    }
  });

  const maxChosse =
    parseInt(get("#dewasa").value) + parseInt(get("#anak").value);
  document.addEventListener("click", function (e) {
    if (e.target.classList.contains("seat")) {
      // * check max chosse
      // const maxin = getAll("[data-chossen]");
      const id = e.target.getAttribute("id");
      const available = e.target.dataset.available;
      if (available == "0") {
        const checkVal = get("#seat").value;
        let jml_check = checkVal.split(",");
        let jml = jml_check.length;
        if (get("#seat").value == "") {
          jml = 0;
        }
        if (jml < maxChosse) {
          if (e.target.dataset.chossen) {
            e.target.removeAttribute("data-chossen");
            const valueInArray = checkVal.split(",");
            const filterThat = valueInArray.filter((v) => !v.includes(id));
            let theRealValue = "";
            filterThat.map((f) => {
              if (theRealValue.length > 0) {
                theRealValue += `,${f}`;
              } else {
                theRealValue += f;
              }
            });
            get("#seat").value = theRealValue;
            e.target.src = "img/seat4.png";
          } else {
            e.target.setAttribute("data-chossen", "1");
            if (checkVal.length > 0) {
              get("#seat").value = `${checkVal},${id}`;
            } else {
              get("#seat").value = id;
            }
            e.target.src = "img/seat5.png";
          }
        } else {
          if (e.target.dataset.chossen == "1") {
            e.target.removeAttribute("data-chossen", "0");
            const valueInArray = checkVal.split(",");
            const filterThat = valueInArray.filter((v) => !v.includes(id));
            let theRealValue = "";
            filterThat.map((f) => {
              if (theRealValue.length > 0) {
                theRealValue += `,${f}`;
              } else {
                theRealValue += f;
              }
            });
            get("#seat").value = theRealValue;
            e.target.src = "img/seat4.png";
          } else {
            Toast.fire({
              icon: "warning",
              title: `Maksimal ${maxChosse} kursi`,
            });
          }
        }
      } else {
        Toast.fire({
          icon: "warning",
          title: "Kursi sudah dipesan",
        });
      }
    }
  });
}, 300);

function createTemplateChosseSeat(
  gerbongKe,
  notAvailable,
  start = false,
  end = false
) {
  const containt = get("#seat_select");
  const range = [];
  const seat = [];

  for (const x of Array(50).keys()) {
    range.push(x + 1);
  }

  range.forEach((r) => {
    let seatNum = "";
    if (r < 10) {
      seatNum = gerbongKe + "0" + r;
    } else {
      seatNum = gerbongKe + r;
    }
    seat.push(seatNum);
  });

  let a = "";
  let b = "";
  let c = "";
  let d = "";
  let string = /* html */ `
<div class="train p-2 ${start ? "start-from-zero" : ""}${
    end ? "end-from-zero" : ""
  }">
<div class="row justify-content-center">
  <div class="col-md-10 test1">
  ${seat.forEach((s, i) => {
    if (i < 10) {
      let seatId = s;
      let checking = "img/seat4.png";
      let dataset = "0";
      let notEmpty = notAvailable.filter((na) => na.includes(seatId));
      if (notEmpty.length > 0) {
        dataset = "1";
        checking = "img/seat3.png";
      }
      a += `<img src="${checking}" class="seat" id="${seatId}" data-available="${dataset}"/>`;
      setTimeout(() => {
        get(".test1").innerHTML = a;
      }, 100);
    }
  })}
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-10 test2">
  ${seat.forEach((s, i) => {
    if (i >= 10 && i < 20) {
      let seatId = s;
      let checking = "img/seat4.png";
      let dataset = "0";
      let notEmpty = notAvailable.filter((na) => na.includes(seatId));
      if (notEmpty.length > 0) {
        dataset = "1";
        checking = "img/seat3.png";
      }
      b += `<img src="${checking}" class="seat" id="${seatId}" data-available="${dataset}"/>`;
      setTimeout(() => {
        get(".test2").innerHTML = b;
      }, 100);
    }
  })}
  </div>
</div>
<div class="row my-3"></div>
<div class="row justify-content-center">
  <div class="col-md-10 test3">
  ${seat.forEach((s, i) => {
    if (i >= 20 && i < 30) {
      let seatId = s;
      let checking = "img/seat4.png";
      let dataset = "0";
      let notEmpty = notAvailable.filter((na) => na.includes(seatId));
      if (notEmpty.length > 0) {
        dataset = "1";
        checking = "img/seat3.png";
      }
      c += `<img src="${checking}" class="seat" id="${seatId}" data-available="${dataset}"/>`;
      setTimeout(() => {
        get(".test3").innerHTML = c;
      }, 100);
    }
  })}
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-md-10 test4">
  ${seat.forEach((s, i) => {
    if (i >= 30 && i < 40) {
      let seatId = s;
      let checking = "img/seat4.png";
      let dataset = "0";
      let notEmpty = notAvailable.filter((na) => na.includes(seatId));
      if (notEmpty.length > 0) {
        dataset = "1";
        checking = "img/seat3.png";
      }
      d += `<img src="${checking}" class="seat" id="${seatId}" data-available="${dataset}"/>`;
      setTimeout(() => {
        get(".test4").innerHTML = d;
      }, 100);
    }
  })}
  </div>
</div>
</div>
`;

  containt.innerHTML = string;
}
