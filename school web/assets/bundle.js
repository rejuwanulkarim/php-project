// console.log("This is work")
let notice_slider = document.getElementsByClassName("notice_slider");
// fetch images path from rest api
const galleryViewer = (path) => {
  let folderDir = path.getAttribute("path");
  let output = { type: "gallery-path-read", data: folderDir };
  fetch("./admin/pages/config.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(output),
  })
    .then((response) => response.json())
    .then((result) => {
      let trgElement = document.getElementsByClassName("viewer-image")[0];
      let galleryViewer = document.getElementsByClassName("gallery-viewer")[0];

      let finlimg = "";
      for (let i = 0; i < result.data[0].length; i++) {
        let imgpath = result.data[0][i];
        if (imgpath == "." || imgpath == "..") {
        } else {
          finlimg += ` <img src="_images/webImages/gallery_slider/${folderDir}/${imgpath}" class="gallery-images" alt="">`;
        }
      }
      trgElement.innerHTML = finlimg;
      galleryViewer.style.display = "flex";
    })
    .catch((err) => {
      console.log(err);
    });
};
// view gallery in index page start
// gallery images next and previous btn code

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}
function showSlides(n) {
  var i;
  let slides = document.getElementsByClassName("gallery-images");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}

function galleryCloser() {
  let galleryViewer = document.getElementsByClassName("gallery-viewer")[0];
  galleryViewer.style.display = "none";
}
// view gallery in index page close

// student profile

let profile_button = document.getElementsByClassName("profile_button");
let profile_sub_nav = document.getElementsByClassName("profile_sub_nav");
let top_slider = document.getElementsByClassName("top_slider");
let profile_angle = document.getElementsByClassName("profile_angle");

// setTimeout(profile_sub_nav[0].setAttribute('class', 'disable_slider'), 5000);

// profile_sub_nav[0].setAttribute('style', 'z-index:-1;')
let topslider = false;
// profile_button[0].addEventListener('click', () => {
function profileviewer() {
  if (topslider == false) {
    profile_sub_nav[0].setAttribute("style", "z-index:10;");
    profile_sub_nav[0].setAttribute("class", "top_slider");
    profile_angle[0].setAttribute(
      "href",
      "../svg_logos/svg_icons.svg#angle_up"
    );

    topslider = true;
  } else {
    top_slider[0].setAttribute("class", "profile_sub_nav");
    topslider = false;
    profile_angle[0].setAttribute(
      "href",
      "../svg_logos/svg_icons.svg#angle_down"
    );
  }
}

function otpsender(e) {
  // console.log(e.value)
  let loading = document.getElementById("loading");
  let massage = document.getElementById("massage");
  let username = document.getElementById("unic_id").value;
  let output = { type: "login-data", action: "otp-send", data: username };
  if (username == "") {
    alert("Please Enter User ID");
  } else {
    loading.style.display = "flex";
    fetch("../admin/pages/config.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(output),
    })
      .then((response) => response.json())
      .then((result) => {
        // console.log(result)
        if (result.status == "success") {
          loading.style.display = "none";
          let start = 1;
          let time = Math.floor(start * 60);
          let counter = setInterval(() => {
            time--;
            e.disabled = true;
            e.value = `Resend after(${time})`;
            if (time == 0) {
              clearInterval(counter);
              e.disabled = false;

              e.value = `Resend OTP`;
            }
          }, 1000);
          // console.log(counter);
          massage.innerHTML = "";
        } else if (result.status == "empty") {
          massage.style.color = "red";
          massage.innerHTML = "Invalid User";
          loading.style.display = "none";
        } else {
          loading.style.display = "none";
          alert("OTP not Send");
        }
      })
      .catch((error) => {
        console.log(error);
      });
  }
}

function otpalerthide(e) {
  // console.log(e.parentElement)
  let otp_error = document.getElementById("otp-error");
  // e.parentElement.style.display = 'none';
  otp_error.style.display = "none";
}

setTimeout(() => {
  let hide = document.getElementById("opterror");
  otpalerthide(hide);
}, 3000);

// new addmission page script
function username_checker(e) {
  let loading = document.getElementById("loading");
  loading.style.display = "flex";
  // console.log(e.split("@")[1]);
  let email = document.getElementById("email");
  // let emailvalue = document.getElementById('email').value;
  let user_alert = document.getElementById("user-alert");
  let submit_btn = document.getElementsByClassName("submit_btn");
  if (e.split("@")[1] === "gmail.com") {
    submit_btn[0].disabled = false;
    user_alert.style.display = "none";

    let output = { type: "registration-data", data: e };
    fetch("../admin/pages/config.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(output),
    })
      .then((response) => response.json())
      .then((result) => {
        if (result.status == "exist") {
          email.style.borderBottom = "2px solid red";
          email.style.color = "red";
          user_alert.style.display = "block";
          submit_btn.disabled = true;
          loading.style.display = "none";
        } else if (result.status == "empty") {
          email.style.color = "white";
          email.style.borderBottom = "2px solid white";
          submit_btn.disabled = false;
          user_alert.style.display = "none";
          loading.style.display = "none";
        }
      })
      .catch((error) => {
        console.log(error);
      });
  } else {
    submit_btn[0].disabled = true;
    user_alert.innerHTML = "Use a google account";
    user_alert.style.display = "block";
    loading.style.display = "none";
  }
}

let usererror = document.getElementsByClassName("user-error");
if (usererror != undefined) {
  setTimeout(() => {
    usererror[0].style.display = "none";
  }, 3000);
}
