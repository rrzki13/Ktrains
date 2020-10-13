/* eslint-disable no-undef */
const formatter = new FormatMoney();
const change = formatter.toRupiah(get("#total").textContent);
get("#total").innerHTML = change;

get("#beliTiket").addEventListener("click", function () {
  if (justText(get("#namaPemesan")) && justText(get("#namaPemesan"))) {
    if (get("#tglPulang") != null) {
      // * if tiket pulang pergi
      // TODO: buat method post untuk tiket pulang pergi
      postTiket(get("#tglPulang").value);
    } else {
      // * if tike sekali jalan
      // TODO: buat method post untuk tiket sekali jalan
      postTiket(0);
    }
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
      console.log(result);
    },
  });
}
