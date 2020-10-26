/* eslint-disable no-undef */
const restoreBtn = getAll(".restoreTiket");
const hapusBtn = getAll(".hapusTiket");
const idCard = [];

restoreBtn.forEach((i) => {
  let id = i.getAttribute("id");
  idCard.push(id);
});

const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 5000,
});

for (let i = 0; i < restoreBtn.length; i++) {
  restoreBtn[i].addEventListener("click", function () {
    Swal.fire({
      title: "Apakah kamu ingin merestore tiket ini?",
      showCancelButton: true,
      confirmButtonText: `Ya`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        Toast.fire({
          icon: "success",
          title: "Tiket sukses direstore",
        });

        let id = this.getAttribute("id");
        const index = idCard.indexOf(id);
        if (index > -1) {
          idCard.splice(index, 1);
        }

        checkArray();
        let key = 131004;
        let id_pemesan = get("#id_pemesan").textContent;
        let no_pesanan = this.parentElement.parentElement.parentElement
          .parentElement.parentElement.parentElement.children[0].children[1]
          .children[0].children[0].children[2].textContent;

        let card = this.parentElement.parentElement.parentElement.parentElement
          .parentElement.parentElement;
        let cardParent = this.parentElement.parentElement.parentElement
          .parentElement.parentElement.parentElement.parentElement;
        card.style.opacity = "0";
        card.style.pointerEvents = "none";
        setTimeout(() => {
          card.style.position = "absolute";
          cardParent.style.position = "absolute";
        }, 500);

        let url = "http://localhost/ktrains-rest/api/Restore";
        let data = `?key=${key}&no_pesanan=${no_pesanan}&id=${id}&id_pemesan=${id_pemesan}`;
        postAjax(data, url);
      }
    });
  });
}

for (let i = 0; i < hapusBtn.length; i++) {
  hapusBtn[i].addEventListener("click", function () {
    Swal.fire({
      title: "Apakah kamu yakin?",
      text: "Kamu akan menghapus tiket ini secara permanen",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, Hapus!",
    }).then((result) => {
      if (result.isConfirmed) {
        Toast.fire({
          icon: "success",
          title: "Tiket sukses dihapus",
        });

        let id = this.getAttribute("id");
        const index = idCard.indexOf(id);
        if (index > -1) {
          idCard.splice(index, 1);
        }

        let key = 131004;
        let id_pemesan = get("#id_pemesan").textContent;
        let no_pesanan = this.parentElement.parentElement.parentElement
          .parentElement.parentElement.parentElement.children[0].children[1]
          .children[0].children[0].children[2].textContent;
        checkArray();

        let card = this.parentElement.parentElement.parentElement.parentElement
          .parentElement.parentElement;
        let cardParent = this.parentElement.parentElement.parentElement
          .parentElement.parentElement.parentElement.parentElement;
        card.style.opacity = "0";
        card.style.pointerEvents = "none";
        setTimeout(() => {
          card.style.position = "absolute";
          cardParent.style.position = "absolute";
        }, 500);

        let url = "http://localhost/ktrains-rest/api/Delete";
        let data = `?key=${key}&no_pesanan=${no_pesanan}&id=${id}&id_pemesan=${id_pemesan}`;
        postAjax(data, url);
      }
    });
  });
}

const checkArray = () => {
  if (idCard.length == 0) {
    setTimeout(() => {
      const noRestore = getAll("#noRestore");
      noRestore.forEach((i) => {
        get("#restoreParent").style.display = "none";
        i.style.opacity = "1";
        i.style.position = "static";
        i.style.pointerEvent = "visible";
      });
    }, 500);
  }
};

function postAjax(data, url, method = "POST") {
  var request = new XMLHttpRequest();
  request.open(method, url, true);
  request.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded; charset=UTF-8"
  );
  request.send(data);
}
