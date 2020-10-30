/* eslint-disable no-undef */
const invalidUsername = [];
const invalidEmail = [];
getSuccessUsername();

function getSuccessUsername() {
  var request = new XMLHttpRequest();
  request.open("GET", "http://localhost/ktrains-rest/api/User", true);

  request.onload = function () {
    if (this.status >= 200 && this.status < 400) {
      // Success!
      var data = JSON.parse(this.response);
      if (data.status) {
        const dataValue = data.data;
        for (i = 0; i < dataValue.length; i++) {
          const username = dataValue[i].username;
          invalidUsername.push(username);
        }
        for (i = 0; i < dataValue.length; i++) {
          const email = dataValue[i].email;
          invalidEmail.push(email);
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

bsCustomFileInput.init();

$("#usernameProfile").keyup(function () {
  let val = $("#usernameProfile").val();
  if (val.length > 0) {
    $("#staffUsername").html(val);
  } else {
    $("#staffUsername").html(get("#myUsername").textContent);
  }

  if (justUsername(this)) {
    if (invalidUsername.indexOf(this.value) != -1) {
      if (get("#myUsername").textContent != this.value) {
        get("#usernameProfileUsernameValidate").innerHTML =
          "Username tidak tersedia";
      }
    }
  }
});

$("#emailProfile").keyup(function () {
  let val = $("#emailProfile").val();
  if (val.length > 0) {
    $("#staffEmail").html(val);
  } else {
    $("#staffEmail").html(get("#myEmail").textContent);
  }

  if (ValidateEmail(this)) {
    if (invalidEmail.indexOf(this.value) != -1) {
      if (get("#myEmail").textContent != this.value) {
        get("#emailProfileEmailValidate").innerHTML =
          "Email tidak tersedia";
      }
    }
  }
});

$("#nameProfile").keyup(function () {
  justText(this);
});

$("#imgProfile").change(function () {
  const input = document.getElementById("imgProfile");
  const imgPreview = document.querySelector("#imgPreview");

  const file = new FileReader();
  file.readAsDataURL(input.files[0]);

  file.onload = function (e) {
    imgPreview.src = e.target.result;
  };
});

$("#btn-edit-profile").on("click", function () {
  if (this.innerHTML == "Cancel") {
    $(this).addClass("btn-primary");
    $(this).removeClass("btn-danger");
    this.innerHTML = `<b><i class="fa fa-user-edit mr-3"></i> Edit Profile</b>`;

    editMyProfile(false);
  } else {
    $(this).removeClass("btn-primary");
    $(this).addClass("btn-danger");
    this.innerHTML = "Cancel";

    editMyProfile();
  }
});

let editMyProfile = (edited = true) => {
  if (edited) {
    $("#usernameProfile").removeAttr("disabled");
    $("#emailProfile").removeAttr("disabled");
    $("#nameProfile").removeAttr("disabled");
    $("#imgProfile").removeAttr("disabled");
    $("#btn-edit-my-profile").removeAttr("disabled");
  } else {
    $("#usernameProfile").attr("disabled", "disabled");
    $("#emailProfile").attr("disabled", "disabled");
    $("#nameProfile").attr("disabled", "disabled");
    $("#btn-edit-my-profile").attr("disabled", "disabled");
    $("#imgProfile").attr("disabled", "disabled");
  }
};
