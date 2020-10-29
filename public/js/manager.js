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

$(function () {
  $("#dataMobil").DataTable({
    responsive: true,
    autoWidth: false,
  });

  bsCustomFileInput.init();

  if (get("#usernameStaff").value != "") {
    $("#staffUsername").html(get("#usernameStaff").value);
  } else if (get("#emailStaff").value != "") {
    $("#staffEmail").html(get("#emailStaff").value);
  }

  $("#usernameStaff").keyup(function () {
    let val = $("#usernameStaff").val();
    if (val.length > 0) {
      $("#staffUsername").html(val);
    } else {
      $("#staffUsername").html("Staff");
    }

    if (justUsername(this)) {
      if (invalidUsername.indexOf(this.value) != -1) {
        get("#usernameStaffUsernameValidate").innerHTML =
          "Username tidak tersedia";
      }
    }
  });

  $("#emailStaff").keyup(function () {
    let val = $("#emailStaff").val();
    if (val.length > 0) {
      $("#staffEmail").html(val);
    } else {
      $("#staffEmail").html("staff@gmail.com");
    }

    if (ValidateEmail(this)) {
      if (invalidEmail.indexOf(this.value) != -1) {
        get("#emailStaffEmailValidate").innerHTML = "Email tidak tersedia";
      }
    }
  });

  $("#firstNameStaff").keyup(function () {
    justText(this);
  });

  $("#lastNameStaff").keyup(function () {
    justText(this);
  });

  $("#staffPass").keyup(function () {
    justPassword(this);
  });

  $("#submitAddStaff").click(function (e) {
    e.preventDefault();
    if (
      justUsername(get("#usernameStaff")) &&
      ValidateEmail(get("#emailStaff")) &&
      justText(get("#firstNameStaff")) &&
      justText(get("#lastNameStaff")) &&
      justPassword(get("#staffPass"))
    ) {
      if (invalidUsername.indexOf(get("#usernameStaff").value) != -1) {
        get("#usernameStaffUsernameValidate").innerHTML =
          "Username tidak tersedia";
      } else if (invalidEmail.indexOf(get("#emailStaff").value) != -1) {
        get("#emailStaffEmailValidate").innerHTML = "Email tidak tersedia";
      } else {
        // unbind button
        $(this).unbind("click").click();
      }
    }
  });

  $("#staffProfile").change(function () {
    const input = document.getElementById("staffProfile");
    const imgPreview = document.querySelector("#imgPreview");

    const file = new FileReader();
    file.readAsDataURL(input.files[0]);

    file.onload = function (e) {
      imgPreview.src = e.target.result;
    };
  });

  // auto type
  // const words = ["Rizki Ramadhan"];
  // let i = 0;
  // let timer;
  // let check = function () {
  //   if ($("#usernameStaff").val() == "") {
  //     typingEffect();
  //   }
  // };

  // $("#usernameStaff").focus(function () {
  //   $("#usernameStaff").val("Staff");
  //   setTimeout(() => {
  //     check();
  //   }, 500);
  // });

  // function typingEffect() {
  //   let word = words[i].split("");
  //   var loopTyping = function () {
  //     if (word.length > 0) {
  //       document.getElementById("usernameStaff").value += word.shift();
  //     } else {
  //       setTimeout(() => {
  //         deletingEffect();
  //       }, 1500);
  //       return false;
  //     }
  //     timer = setTimeout(loopTyping, 80);
  //   };

  //   loopTyping();

  //   function deletingEffect() {
  //     let word = words[i].split("");
  //     var loopDeleting = function () {
  //       if (word.length > 0) {
  //         word.pop();
  //         document.getElementById("usernameStaff").value = word.join("");
  //         timer = setTimeout(loopDeleting, 80);
  //       } else {
  //         setTimeout(() => {
  //           typingEffect();
  //         }, 1500);
  //       }
  //     };
  //     loopDeleting();
  //   }
  // }
});
