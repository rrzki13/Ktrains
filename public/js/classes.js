let separator;

// * FormatMoney Class
class FormatMoney {
  constructor(bilangan) {
    this.bilangan = bilangan;
  }

  toRupiah() {
    let number_string = this.bilangan.toString(),
      sisa = number_string.length % 3,
      rupiah = number_string.substr(0, sisa),
      ribuan = number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
      separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
      return `Rp. ${rupiah}`;
    }
  }
}
