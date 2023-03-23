  function myFunction() {
    var pw_ele = document.getElementById("main_password");
    if (pw_ele.type === "password") {
      pw_ele.type = "text";
    } else {
      pw_ele.type = "password";
    }
  }
function myConfirm() {
    var cpw_ele = document.getElementById("confirm_password");
    if (cpw_ele.type === "password") {
      cpw_ele.type = "text";
    } else {
      cpw_ele.type = "password";
    }
  }
function myNew() {
    var npw_ele = document.getElementById("new_password");
    if (npw_ele.type === "password") {
      npw_ele.type = "text";
    } else {
      npw_ele.type = "password";
    }
  }