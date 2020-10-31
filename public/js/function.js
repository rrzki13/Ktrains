/* eslint-disable no-undef */
/* eslint-disable no-unused-vars */
// function
const formater = new FormatMoney();

function checkedValidate() {
  if (get("#check-pulang").checked) {
    if (
      validate("dari", false) &&
      validate("ke", false) &&
      validateDate("berangkat", false) &&
      validateDate("pulang", false) &&
      checkJml("dewasa", false)
    ) {
      if (date()) {
        get("#cariTiket").removeAttribute("disabled");
        return true;
      } else {
        return false;
      }
    } else {
      get("#cariTiket").setAttribute("disabled", "disabled");
      return false;
    }
  } else if (
    get("#dari").value.toUpperCase() == get("#ke").value.toUpperCase()
  ) {
    get("#dariHelper").innerHTML = " ";
    get("#keHelper").innerHTML = " ";
    get("#dariValidate").innerHTML = "Stasiun tidak boleh sama";
    get("#keValidate").innerHTML = "Stasiun tidak boleh sama";
    return false;
  } else {
    if (
      validate("dari", false) &&
      validate("ke", false) &&
      validateDate("berangkat", false) &&
      checkJml("dewasa", false)
    ) {
      get("#cariTiket").removeAttribute("disabled");
      return true;
    } else {
      get("#cariTiket").setAttribute("disabled", "disabled");
      return false;
    }
  }
}

function appendTiket(jml_tiket, total) {
  let j, k;
  j = 0;
  k = 0;
  for (i = 0; i < train.length; i++) {
    const node = document.createElement("DIV");
    node.classList.add("col-md-4");
    const row = document.createElement("DIV");
    row.classList.add("row");
    row.classList.add("justify-content-center");
    const col = document.createElement("DIV");
    col.classList.add("col-11");
    col.classList.add("mb-3");
    col.classList.add("p-3");
    col.classList.add("shadow");
    col.classList.add("rounded");
    col.style.backgroundColor = "#fff";
    const nama_kereta = train[i];
    const kelas_kereta = train_class[k];
    const harga_kereta = train_fare[j];
    const harga = parseInt(harga_kereta) * parseInt(jml_tiket);
    const id_kereta = train_id[i];

    const href = "http://localhost:8080/BuyMyTicket";

    // change to money format
    const formatHarga = formater.toRupiah(harga);

    const test =
      `
      <div class="row">
        <div class="col-12 text-center">
                  <span class="font-weight-bold">Tiket</span>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-6">Nama Kereta</div>
                      <div class="col-6 text-right">` +
      nama_kereta +
      `</div>
                    </div>
                    <div class="row">
                      <div class="col-6">Jumlah tiket</div>
                      <div class="col-6 text-right">` +
      jml_tiket +
      `</div>
                    </div>
                    <div class="row">
                      <div class="col-6">Berangkat</div>
                      <div class="col-6 text-right">` +
      get("#berangkat").value +
      `</div>
                    </div>
                    <div class="row">
                      <div class="col-6">Dari</div>
                      <div class="col-6 text-right">` +
      get("#dari").value +
      `</div>
                    </div>
                    <div class="row">
                      <div class="col-6">Sampai</div>
                      <div class="col-6 text-right">` +
      get("#ke").value +
      `</div>
                    </div>
                    <div class="row">
                      <div class="col-6">Harga</div>
                      <div class="col-6 text-right">` +
      formatHarga +
      `</div>
                    </div>
                    <div class="row">
                      <div class="col-6">Kelas</div>
                      <div class="col-6 text-right">` +
      kelas_kereta +
      `</div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-6">
                      <form class="d-inline" method="POST" action = "` +
      href +
      `">
                        <input type="hidden" name="nama_kereta" value="` +
      nama_kereta +
      `"/>
                        <input type="hidden" name="kelas_kereta" value="` +
      kelas_kereta +
      `"/>
                        <input type="hidden" name="harga_kereta" value="` +
      harga_kereta +
      `"/>
                        <input type="hidden" name="jumlahTiket" value="` +
      jml_tiket +
      `"/>
                        <input type="hidden" name="berangkat" value="` +
      get("#berangkat").value +
      `"/>
                        <input type="hidden" name="dari" value="` +
      get("#dari").value +
      `"/>
                        <input type="hidden" name="ke" value="` +
      get("#ke").value +
      `"/>
                        <input type="hidden" name="dewasa" value="` +
      get("#dewasaIpt").value +
      `"/>
                        <input type="hidden" name="anak" value="` +
      get("#anakIpt").value +
      `"/>
                        <input type="hidden" name="total" value="` +
      harga +
      `"/>
                        <input type="hidden" name="id_kereta" value="` +
      id_kereta +
      `"/>
                        <button class="btn btn-primary w-100" type="submit">Beli tiket</button>
                      </form>
                      </div>
                    </div>
      `;
    col.innerHTML = test;
    node.appendChild(row);
    row.appendChild(col);
    get("#tiketPlace").appendChild(node);
    j++;
    k++;
  }
}

function getTrain() {
  var request = new XMLHttpRequest();
  request.open("GET", "http://localhost/ktrains-rest/api/Train", true);

  request.onload = function () {
    if (this.status >= 200 && this.status < 400) {
      // Success!
      var data = JSON.parse(this.response);
      if (data.status) {
        const dataValue = data.data;
        for (i = 0; i < dataValue.length; i++) {
          const trainData = dataValue[i].train_name;
          const trainFare = dataValue[i].train_fare;
          const trainClass = dataValue[i].train_class;
          const trainId = dataValue[i].id;
          train.push(trainData);
          train_fare.push(trainFare);
          train_class.push(trainClass);
          train_id.push(trainId);
        }
      }
    } else {
      // We reached our target server, but it returned an error
      return false;
    }
  };

  request.onerror = function () {
    // There was a connection error of some sort
    return false;
  };

  request.send();
}

function appendTiket2(jml_tiket, total) {
  var j = 0;
  k = 0;
  for (i = 0; i < train.length; i++) {
    const node = document.createElement("DIV");
    node.classList.add("col-md-6");
    const nama_kereta = train[i];
    const kelas_kereta = train_class[k];
    const harga_kereta = train_fare[j];
    const total = parseInt(harga_kereta) * parseInt(jml_tiket);
    const total_format = formater.toRupiah(total);
    const id_kereta = train_id[i];

    const href = "http://localhost:8080/BuyMyTicket";

    const string =
      `
      <div class="row justify-content-center">
      <div
        class="col-11 shadow p-3 rounded mb-3"
        style="background-color: #fff"
      >
        <div class="row">
          <div class="col-6">
            <span class="font-weight-bold">Tiket</span>
          </div>
          <div class="col-6 text-right text-primary">
            <i class="fa fa-check-circle mr-2"></i>Tiket pulang pergi
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="row">
              <div class="col-11">
                <div class="row mt-3">
                  <div class="col-6">Nama Kereta</div>
                  <div class="col-6 text-right">` +
      nama_kereta +
      `</div>
                </div>
                <div class="row">
                  <div class="col-6">Jumlah tiket</div>
                  <div class="col-6 text-right">` +
      jml_tiket +
      `</div>
                </div>
                <div class="row">
                  <div class="col-6">Berangkat</div>
                  <div class="col-6 text-right">` +
      get("#berangkat").value +
      `</div>
                </div>
                <div class="row">
                  <div class="col-6">Dari</div>
                  <div class="col-6 text-right">` +
      get("#dari").value +
      `</div>
                </div>
                <div class="row">
                  <div class="col-6">Sampai</div>
                  <div class="col-6 text-right">` +
      get("#ke").value +
      `</div>
                </div>
                <div class="row">
                  <div class="col-6">Harga</div>
                  <div class="col-6 text-right">` +
      total_format +
      `</div>
                </div>
                <div class="row">
                  <div class="col-6">Kelas</div>
                  <div class="col-6 text-right">` +
      kelas_kereta +
      `</div>
                </div>
                <div class="row mt-3">
                  <div class="col-6">
                  <form class="d-inline" method="POST" action = "` +
      href +
      `">
                        <input type="hidden" name="nama_kereta" value="` +
      nama_kereta +
      `"/>
                        <input type="hidden" name="kelas_kereta" value="` +
      kelas_kereta +
      `"/>
                        <input type="hidden" name="harga_kereta" value="` +
      harga_kereta +
      `"/>
                        <input type="hidden" name="jumlahTiket" value="` +
      jml_tiket +
      `"/>
                        <input type="hidden" name="berangkat" value="` +
      get("#berangkat").value +
      `"/>
                        <input type="hidden" name="pulang" value="` +
      get("#pulang").value +
      `"/>
                        <input type="hidden" name="dari" value="` +
      get("#dari").value +
      `"/>
                        <input type="hidden" name="ke" value="` +
      get("#ke").value +
      `"/>
                        <input type="hidden" name="dewasa" value="` +
      get("#dewasaIpt").value +
      `"/>
                        <input type="hidden" name="anak" value="` +
      get("#anakIpt").value +
      `"/>
                        <input type="hidden" name="total" value="` +
      total * 2 +
      `"/>
                        <input type="hidden" name="id_kereta" value="` +
      id_kereta +
      `"/>
                        <button class="btn btn-primary w-100" type="submit">Beli tiket</button>
                      </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
          <div class="col-6">
            <div class="row justify-content-end">
              <div class="col-11">
                <div class="row mt-3">
                  <div class="col-6">Nama Kereta</div>
                  <div class="col-6 text-right">` +
      nama_kereta +
      `</div>
                </div>
                <div class="row">
                  <div class="col-6">Jumlah tiket</div>
                  <div class="col-6 text-right">` +
      jml_tiket +
      `</div>
                </div>
                <div class="row">
                  <div class="col-6">Berangkat</div>
                  <div class="col-6 text-right">` +
      get("#pulang").value +
      `</div>
                </div>
                <div class="row">
                  <div class="col-6">Dari</div>
                  <div class="col-6 text-right">` +
      get("#ke").value +
      `</div>
                </div>
                <div class="row">
                  <div class="col-6">Sampai</div>
                  <div class="col-6 text-right">` +
      get("#dari").value +
      `</div>
                </div>
                <div class="row">
                  <div class="col-6">Harga</div>
                  <div class="col-6 text-right">` +
      total_format +
      `</div>
                </div>
                <div class="row">
                  <div class="col-6">Kelas</div>
                  <div class="col-6 text-right">` +
      kelas_kereta +
      `</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      `;
    node.innerHTML = string;
    get("#tiketPlace").appendChild(node);
    j++;
    k++;
  }
}

function date() {
  var tgl_awal = new Date(get("#berangkat").value);
  var tgl_akhir = new Date(get("#pulang").value);
  if (tgl_akhir.getTime() < tgl_awal.getTime()) {
    get("#berangkatValidate").innerHTML = "";
    get("#pulangValidate").innerHTML = "Tidak boleh kurang dari hari berangkat";
    return false;
  } else if (tgl_awal.getTime() == tgl_akhir.getTime()) {
    get("#pulangValidate").innerHTML = "Hari tidak boleh sama";
    get("#berangkatValidate").innerHTML = "Hari tidak boleh sama";
    return false;
  } else {
    get("#pulangValidate").innerHTML = "";
    get("#berangkatValidate").innerHTML = "";
    return true;
  }
}

function searchInList(select, num) {
  const list = getAll(".list-group-item" + num);
  const filter = get("#" + select).value.toUpperCase();

  for (i = 0; i < list.length; i++) {
    const txtValue = list[i].innerText || list[i].textContent;

    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      list[i].style.display = "";
    } else {
      list[i].style.display = "none";
    }
  }
}

function validate(select, checked = true) {
  const list = dataStation;
  const filter = get("#" + select).value.toUpperCase();
  if (get("#" + select).value == "") {
    if (checked) {
      if (select == "dari" || select == "ke") {
        get("#" + select + "Helper").innerHTML = " ";
      }
      get("#" + select + "Validate").innerHTML = "Harus diisi";
    }
    return false;
  } else if (list.indexOf(filter) == -1) {
    if (checked) {
      if (select == "dari" || select == "ke") {
        get("#" + select + "Helper").innerHTML = "";
      }
      get("#" + select + "Validate").innerHTML = "Stasiun tidak valid";
    }
    return false;
  } else {
    if (checked) {
      if (select == "dari" || select == "ke") {
        get("#" + select + "Helper").innerHTML = "Masukan kode stasiun";
      }
      get("#" + select + "Validate").innerHTML = " ";
    }
    return true;
  }
}

function get(selector) {
  return document.querySelector(selector);
}

function validateDate(selector, check = true) {
  const today = new Date().toISOString().slice(0, 10);
  const checked = new Date(get("#" + selector).value);
  const date = new Date(today);

  if (get("#" + selector).value == "") {
    if (check) {
      get("#" + selector + "Validate").innerHTML = "Harus diisi";
    }
    return false;
  } else if (checked.getTime() < date.getTime()) {
    if (check) {
      get("#" + selector + "Validate").innerHTML = "Harus lebih dari hari ini";
    }
    return false;
  } else {
    if (check) {
      get("#" + selector + "Validate").innerHTML = "";
    }
    return true;
  }
}

function closeall() {
  get("#dariStasiunChoose").style.display = "none";
  get("#jmlTiketCard").style.display = "none";
  get("#keStasiunChoose").style.display = "none";
}

function closeallExcept(select) {
  get("#dariStasiunChoose").style.display = "none";
  get("#jmlTiketCard").style.display = "none";
  get("#keStasiunChoose").style.display = "none";
  get("#" + select).style.display = "block";
}

function getAll(selector) {
  return document.querySelectorAll(selector);
}

function setStationData() {
  const list = getAll(".list-group-item1");
  for (i = 0; i < list.length; i++) {
    const station_id = list[i].getAttribute("id");
    dataStation.push(station_id);
  }
}

function checkJml(select, check = true) {
  if (parseInt(get("#" + select + "Ipt").value) == 0) {
    if (check) {
      const check_jml = select == "dewasa" ? "dewasa" : "anak";
      get("#dewasaValidate").innerHTML =
        "tiket " + check_jml + " tidak boleh 0";
    }
    return false;
  } else {
    if (check) {
      get("#dewasaValidate").innerHTML = "";
    }
    return true;
  }
}

function ValidateEmail(r, report = true) {
  const id = r.getAttribute("id");
  if (
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(
      r.value
    )
  ) {
    if (report) {
      get("#" + id + "EmailValidate").innerHTML = "";
    }
    return true;
  }
  if (report) {
    get("#" + id + "EmailValidate").innerHTML = "Alamat Email tidak valid";
  }
  return false;
}

function justText(r, report = true) {
  const id = r.getAttribute("id");
  if (r.value == "") {
    if (report) {
      get("#" + id + "TextValidate").innerHTML = "Harus diisi";
    }
    return false;
  } else if (/^[a-zA-Z][a-z A-Z]*$/.test(r.value)) {
    if (report) {
      get("#" + id + "TextValidate").innerHTML = "";
    }
    return true;
  } else {
    if (report) {
      get("#" + id + "TextValidate").innerHTML =
        "Hanya boleh menggunakan huruf";
    }
    return false;
  }
}

function justUsername(r, report = true) {
  const id = r.getAttribute("id");
  if (r.value == "") {
    if (report) {
      get("#" + id + "UsernameValidate").innerHTML = "Harus diisi";
    }
    return false;
  } else if (r.value.length < 5) {
    if (report) {
      get("#" + id + "UsernameValidate").innerHTML = "Minimal 5 karakter";
    }
    return false;
  } else if (r.value.length > 11) {
    if (report) {
      get("#" + id + "UsernameValidate").innerHTML = "Maksimal 10 karakter";
    }
    return false;
  } else if (/^[a-zA-Z0-9]*$/.test(r.value)) {
    if (report) {
      get("#" + id + "UsernameValidate").innerHTML = "";
    }
    return true;
  } else {
    if (report) {
      get("#" + id + "UsernameValidate").innerHTML =
        "Hanya boleh menggunakan huruf dan angka";
    }
    return false;
  }
}

function justPassword(r, report = true) {
  const id = r.getAttribute("id");
  if (r.value == "") {
    if (report) {
      get("#" + id + "PasswordValidate").innerHTML = "Harus diisi";
    }
    return false;
  } else if (r.value.length < 5) {
    if (report) {
      get("#" + id + "PasswordValidate").innerHTML = "Minimal 5 karakter";
    }
    return false;
  } else if (r.value.length > 21) {
    if (report) {
      get("#" + id + "PasswordValidate").innerHTML = "Maksimal 21 karakter";
    }
    return false;
  } else {
    if (report) {
      get("#" + id + "PasswordValidate").innerHTML = "";
    }
    return true;
  }
}

function formatMoney(number, decPlaces, decSep, thouSep) {
  (decPlaces = isNaN((decPlaces = Math.abs(decPlaces))) ? 2 : decPlaces),
    (decSep = typeof decSep === "undefined" ? "." : decSep);
  thouSep = typeof thouSep === "undefined" ? "," : thouSep;
  var sign = number < 0 ? "-" : "";
  var i = String(
    parseInt((number = Math.abs(Number(number) || 0).toFixed(decPlaces)))
  );
  var j = (j = i.length) > 3 ? j % 3 : 0;

  return (
    sign +
    (j ? i.substr(0, j) + thouSep : "") +
    i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) +
    (decPlaces
      ? decSep +
        Math.abs(number - i)
          .toFixed(decPlaces)
          .slice(2)
      : "")
  );
}
