/* eslint-disable no-undef */
const formatter = new FormatMoney();
const change = formatter.toRupiah(get("#total").textContent);
get("#total").innerHTML = change;

get("#beliTiket").addEventListener("click", function () {
  if (justText(get("#namaPemesan")) && justText(get("#namaPemesan"))) {
    alert("ok");
  }
});
