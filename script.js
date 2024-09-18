window.addEventListener("load",
  function () {
    document.querySelector(".loader").classList.add("d-none");
  }
);

// window.onscroll = function () { myFunction() };

// var header = document.getElementById("myHeader");
// var margtop = header.clientHeight + 300;

// function myFunction() {
//   if (window.pageYOffset > margtop) {
//     header.classList.add("headertop");
//   } else {
//     header.classList.remove("headertop");
//   }
// }

function headermanu() {

  var menubox = document.getElementById("menubox");

  menubox.classList.toggle("d-none");
  menubox.classList.toggle("d-display");

}


function changeView() {

  var signupBox = document.getElementById("signupBox");
  var loginBox = document.getElementById("loginBox");

  signupBox.classList.toggle("d-none");
  loginBox.classList.toggle("d-none");

}

function signup() {

  var signupBox = document.getElementById("signupBox");
  var loginBox = document.getElementById("loginBox");

  var fname = document.getElementById("sfname");
  var lname = document.getElementById("slname");
  var email = document.getElementById("semail");
  var password = document.getElementById("spassword");
  var mobile = document.getElementById("smobile");
  var gender = document.getElementById("sgender");

  var f = new FormData();
  f.append("f", fname.value);
  f.append("l", lname.value);
  f.append("e", email.value);
  f.append("p", password.value);
  f.append("m", mobile.value);
  f.append("g", gender.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;

      if (response == "success") {
        document.getElementById("msg").innerHTML = response;
        document.getElementById("msgdiv").className = "d-block alert alert-success";
        swal("Good job!", "Registration success.", "success");
        signupBox.classList.toggle("d-none");
        loginBox.classList.toggle("d-none");
      } else {
        document.getElementById("msg").innerHTML = response;
        document.getElementById("msgdiv").className = "d-block alert alert-danger";
      }
    }
  }

  r.open("POST", "signupProcess.php", true);
  r.send(f);

}

function login() {

  var email = document.getElementById("lemail");
  var password = document.getElementById("lpassword");
  var rememberme = document.getElementById("rememberme");

  var f = new FormData();
  f.append("e", email.value);
  f.append("p", password.value);
  f.append("r", rememberme.checked);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var response = r.responseText;
      if (response == "success") {
        document.getElementById("msg2").innerHTML = response;
        document.getElementById("msgdiv2").className = "d-block alert alert-success";
        swal("Good job!", "Login success.", "success");
        window.location = "index.php";
      } else {
        document.getElementById("msg2").innerHTML = response;
        document.getElementById("msgdiv2").className = "d-block alert alert-danger";
      }
    }
  }

  r.open("POST", "loginProcess.php", true);
  r.send(f);

}


function sendvcode() {

  var email = document.getElementById("femail").value;

  var r = new XMLHttpRequest();

  document.querySelector(".loader").classList.toggle("d-none");

  r.onreadystatechange = function () {
    if (r.readyState == 4 && r.status == 200) {
      var response = r.responseText;

      if (response == "success") {
        document.querySelector(".loader").classList.toggle("d-none");
        document.getElementById("fpmsg").innerHTML = "Verification code sent successfully. Please check your email inbox Or email spams!";
        document.getElementById("fpmsgdiv").className = "d-block alert alert-warning";
        swal("Verification code sent successfully.", "Please check your email inbox Or email spams! ", "success");

      } else {
        document.getElementById("fpmsg").innerHTML = response;
        document.getElementById("fpmsgdiv").className = "d-block alert alert-danger";
        document.querySelector(".loader").classList.toggle("d-none");

      }


    }
  }

  r.open("GET", "sendvcodeProcess.php?e=" + email, true);
  r.send();
}

function p1show() {
  var f1p = document.getElementById("f1password");

  if (f1p.type == "password") {

    f1p.type = "text";
    var eye1 = document.getElementById("eye1").classList.toggle("bi-eye");


  } else {
    f1p.type = "password";
    var eye1 = document.getElementById("eye1").classList.toggle("bi-eye");

  }

}

function p2show() {
  var f2p = document.getElementById("f2password");

  if (f2p.type == "password") {

    f2p.type = "text";
    document.getElementById("eye2").classList.toggle("bi-eye");


  } else {
    f2p.type = "password";
    document.getElementById("eye2").classList.toggle("bi-eye");

  }

}



function resetpassword() {

  document.querySelector(".loader").classList.toggle("d-none");

  var email = document.getElementById("femail");
  var password1 = document.getElementById("f1password");
  var password2 = document.getElementById("f2password");
  var passwordvcode = document.getElementById("passwordvcode");

  var f = new FormData();

  f.append("e", email.value);
  f.append("p1", password1.value);
  f.append("p2", password2.value);
  f.append("pvcode", passwordvcode.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var response = r.responseText;

      if (response == "success") {

        document.querySelector(".loader").classList.toggle("d-none");
        document.getElementById("fpmsg").innerHTML = response;
        document.getElementById("fpmsgdiv").className = "d-block alert alert-success";
        swal("Password reset successfully.", "Try to login now. ", "success");
        document.getElementById("loginnow").classList.toggle("d-none");

      } else {
        document.getElementById("fpmsg").innerHTML = response;
        document.getElementById("fpmsgdiv").className = "d-block alert alert-danger";
        document.querySelector(".loader").classList.toggle("d-none");

      }

    }
  }

  r.open("POST", "forgotpasswordProcess.php", true);
  r.send(f);

}

function updateProfileimage() {
  var img = document.getElementById("profileimage");

  img.onchange = function () {
    var file = img.files[0];
    var url = window.URL.createObjectURL(file);
    document.getElementById("img").src = url;
  }


}

function district_load() {
  var pv = document.getElementById("province").value;
  var re = new XMLHttpRequest();

  re.onreadystatechange = function () {
    if (re.readyState == 4 & re.status == 200) {
      var rt = re.responseText;
      document.getElementById("district").innerHTML = rt;

    }
  }
  re.open("GET", "districtLoadProccess.php?pv=" + pv, true);
  re.send();
}

function updateProfile() {

  document.querySelector(".loader").classList.toggle("d-none");

  var img = document.getElementById("profileimage");
  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var mobile = document.getElementById("mobile").value;
  var address = document.getElementById("address").value;
  var province = document.getElementById("province").value;
  var district = document.getElementById("district").value;
  var city = document.getElementById("city").value;
  var postalCode = document.getElementById("postalCode").value;

  var f = new FormData();
  f.append("img", img.files[0]);
  f.append("fname", fname);
  f.append("lname", lname);
  f.append("mobile", mobile);
  f.append("address", address);
  f.append("province", province);
  f.append("district", district);
  f.append("city", city);
  f.append("postalCode", postalCode);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;

      if (response == "updated") {
        document.querySelector(".loader").classList.toggle("d-none");
        swal("Updated.", "You clicked the button!", "success");
      } else if (response == "updatedupdated") {
        document.querySelector(".loader").classList.toggle("d-none");
        alert("Profile picture updated.");
      } else {
        document.querySelector(".loader").classList.toggle("d-none");
        swal(response, "", "error");

      }

    }
  }

  request.open("POST", "profileUpdateProcess.php", true);
  request.send(f);

}

function logout() {

  swal({
    title: "Are you sure to Log Out?",
    text: "",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
          if (r.readyState == 4 && r.status == 200) {
            var response = r.responseText;
            if (response == "success") {
              window.location.reload();
            } else {
              alert(response);
            }
          }
        }

        r.open("GET", "logoutProcess.php", true);
        r.send();

      }
    });

}

function addToCard(x){

  document.querySelector(".loader").classList.toggle("d-none");

  swal({
    title: "Are you sure add to cart?",
    text: "",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
    .then((willDelete) => {
      if (willDelete) {

        var r = new XMLHttpRequest();

        r.onreadystatechange = function(){
          if(r.readyState == 4 && r.status == 200){
            var response = r.responseText;
            if(response == "cart add"){
            document.querySelector(".loader").classList.toggle("d-none");
              
            }else{
            document.querySelector(".loader").classList.toggle("d-none");
              
            }
          }
        }
      
        r.open("GET","cartAddProcess.php?id="+ x,true);
        r.send();

      }else{
        document.querySelector(".loader").classList.toggle("d-none");
      }
    });


}

function loginFirst(){
  alert("Please Login !");
  window.location = "signin.php";
}


