/* eslint-disable no-undef */
const idCard = new Array();
const deleteCard = getAll(".delete");

deleteCard.forEach((i) => {
  let id = i.getAttribute("id");
  idCard.push(id);
});

const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 5000,
});

for (i = 0; i < deleteCard.length; i++) {
  deleteCard[i].addEventListener("click", function () {
    Swal.fire({
      title: "Apa kamu yakin ingin mengahapus tiket?",
      showDenyButton: false,
      showCancelButton: true,
      confirmButtonText: `Ya, Hapus`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        let id = this.getAttribute("id");
        const index = idCard.indexOf(id);
        if (index > -1) {
          idCard.splice(index, 1);
        }
        checkArray();

        var request = new XMLHttpRequest();
        request.open("POST", "http://localhost/ktrains-rest/api/History", true);
        request.setRequestHeader(
          "Content-Type",
          "application/x-www-form-urlencoded; charset=UTF-8"
        );
        request.send("id=" + id);

        const card = this.parentElement.parentElement.parentElement
          .parentElement.parentElement;

        card.style.opacity = "0";
        card.style.pointerEvents = "none";
        setTimeout(function () {
          card.style.position = "absolute";
        }, 500);

        Toast.fire({
          icon: "success",
          title: "Tiket Sukses Dihapus",
        });
      }
    });
  });
}

let lihatTiket = getAll(".lihatTiket");
for (let i = 0; i < lihatTiket.length; i++) {
  lihatTiket[i].addEventListener("click", function () {
    get(".blank").style.opacity = 1;
    get(".blank").style.pointerEvents = "visible";
    get("#theTiketHistory").style.opacity = 1;
    get("#theTiketHistory").style.pointerEvents = "visible";

    let id = this.getAttribute("id");
    let myId = get(".myId").textContent;
    let key = 131004;
    let pesanan = this.parentElement.parentElement.parentElement.children[1]
      .children[2].textContent;

    let loading = /* html */ `
    <div class="row justify-content-center" style="margin-top: -20rem;">
    <div class="col-md-11">
      <div class="card">
        <div class="card-body d-inline">
          <div class="row">
            <div class="col-3">
              <img src="img/833.gif" width="100" class="mr-3" />
            </div>
            <div class="col-7 ml-3">
              <h2 class="mt-4">Loading your ticket</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>`;

    get("#theTiketHistory").innerHTML = loading;

    getHistory(key, id, myId, pesanan);
  });
}

get(".blank").addEventListener("click", function () {
  this.style.opacity = 0;
  this.style.pointerEvents = "none";
  get("#theTiketHistory").style.opacity = 0;
  get("#theTiketHistory").style.pointerEvents = "none";
});

get("#restore").addEventListener("click", function () {
  let href = this.getAttribute("data-id");
  document.location.href = href;
});

function getHistory(key, id, id_user, no_pesanan) {
  let orderNum = `${key}_${id_user}_${id}_${no_pesanan}`;
  var request = new XMLHttpRequest();
  request.open(
    "GET",
    "http://localhost/ktrains-rest/api/History?no_pesanan=" + orderNum,
    true
  );

  request.onload = function () {
    if (this.status >= 200 && this.status < 400) {
      // Success!
      var data = JSON.parse(this.response);
      if (data.status) {
        const dataTiket = data.data;

        let string = /* html */ `<div class="card-tiket shadow">
            <div class="headTiket"></div>
            <div class="bodyTiket user-select-none">
              <div class="container">
                <div class="row">
                  <div class="col-7 mt-2">
                    <img src="img/kai_2.png" width="50" />
                  </div>
                  <div class="col-5 mt-2 text-center h5">
                    BOARDING PASS
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-7">
                    <div class="row">
                      <div class="col-6">
                        <small>nama / name</small><br />
                        <small class="font-weight-bold">${dataTiket.nama_penumpang}</small>
                      </div>
                      <div class="col-6">
                        <small>no. pesanan</small><br />
                        <small class="font-weight-bold">${dataTiket.no_pesanan}</small>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <small>kereta / train</small><br />
                        <small class="font-weight-bold">${dataTiket.nama_kereta}</small>
                      </div>
                      <div class="col-6">
                        <small>kelas / class</small><br />
                        <small class="font-weight-bold">${dataTiket.kelas_kereta}</small>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <small>Dari</small><br />
                        <small class="font-weight-bold">${dataTiket.stasiun_awal}</small>
                      </div>
                      <div class="col-6">
                        <small>Ke</small><br />
                        <small class="font-weight-bold">${dataTiket.stasiun_akhir}</small>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-6">
                        <small>Perkiraan Jam</small><br />
                        <small class="font-weight-bold">${dataTiket.jam}</small>
                      </div>
                      <div class="col-6">
                        <small>Tempat duduk</small><br />
                        <small class="font-weight-bold">${dataTiket.seat}</small>
                      </div>
                    </div>
                  </div>
                  <div class="col-5">
                    <div class="row justify-content-center">
                      <svg id="barcodeTiketHistory"></svg>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="footTiket"></div>
          </div>`;

        get("#theTiketHistory").innerHTML = string;

        let widthWindow = window.innerWidth;

        setTimeout(() => {
          JsBarcode("#barcodeTiketHistory", 160259771197911, {
            format: "codabar",
            lineColor: "#000",
            width: widthWindow < 768 ? 0.9 : 1.5,
            height: widthWindow < 768 ? 35 : 39,
            displayValue: true,
            background: "#f5f5f5",
            fontSize: "17",
          });
        }, 100);
      } else {
        get(".blank").style.opacity = 0;
        get(".blank").style.pointerEvents = "none";
        get("#theTiketHistory").style.opacity = 0;
        get("#theTiketHistory").style.pointerEvents = "none";
        Swal.fire(data.message, "", "info");
      }
    } else {
      // We reached our target server, but it returned an error
      get(".blank").style.opacity = 0;
      get(".blank").style.pointerEvents = "none";
      get("#theTiketHistory").style.opacity = 0;
      get("#theTiketHistory").style.pointerEvents = "none";
      Swal.fire(
        "Opps, we think the server is down or your ticket is not found, please try again later",
        "",
        "info"
      );
    }
  };

  request.onerror = function () {
    // There was a connection error of some sort
    get(".blank").style.opacity = 0;
    get(".blank").style.pointerEvents = "none";
    get("#theTiketHistory").style.opacity = 0;
    get("#theTiketHistory").style.pointerEvents = "none";
    Swal.fire(
      "Opps, we cant connect, please check your internet connection",
      "",
      "info"
    );
  };

  request.send();
}

const checkArray = () => {
  if (idCard.length == 0) {
    setTimeout(() => {
      const noHistory = getAll("#noHistory");
      noHistory.forEach((i) => {
        get("#historyParent").style.display = "none";
        i.style.opacity = "1";
        i.style.position = "static";
        i.style.pointerEvent = "visible";
      });
    }, 500);
  }
};
