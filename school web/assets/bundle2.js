// document.querySelector("#textarea").innerHTML = "";
// document.querySelector("#submit_form").innerHTML=''
// images preview
// images preview function

function imagepreview(input, preview) {
  input.addEventListener("input", () => {
    preview.src = URL.createObjectURL(input.files[0]);
  });
}


// images preview img target using Id
let previewimage1 = document.getElementById("previewimage1");
let previewimage2 = document.getElementById("previewimage2");
let previewimage3 = document.getElementById("previewimage3");
let previewimage4 = document.getElementById("previewimage4");
let previewimage5 = document.getElementById("previewimage5");
// all link extract from preview images anchor
let preview_image_link1 = document.getElementById("preview_image_link1");
let preview_image_link2 = document.getElementById("preview_image_link2");
let preview_image_link3 = document.getElementById("preview_image_link3");
let preview_image_link4 = document.getElementById("preview_image_link4");
let preview_image_link5 = document.getElementById("preview_image_link5");
// image file input
let school_certificate = document.getElementById("school_certificate");
let marksheet = document.getElementById("marksheet");
let address_proof = document.getElementById("address_proof");
let photograph = document.getElementById("photograph");
let signature = document.getElementById("signature");

// images preview function call
imagepreview(school_certificate, previewimage1);
imagepreview(marksheet, previewimage2);
imagepreview(address_proof, previewimage3);
imagepreview(photograph, previewimage4);
imagepreview(signature, previewimage5);
//   set link anchor tag where Please upload in open a new tab
// 1st attribute is for->set link in anchore tag
// 3st attribute is for -> get image path from image src
// 2st attribute is for ->set a event listener and get preview a image
function openurl(linkgetattribute, seturlId, getId) {
  getId.addEventListener("input", () => {
    let urlseter = seturlId.getAttribute("src");
    linkgetattribute.setAttribute("href", urlseter);
  });
}
openurl(preview_image_link1, previewimage1, school_certificate);
openurl(preview_image_link2, previewimage2, marksheet);
openurl(preview_image_link3, previewimage3, address_proof);
openurl(preview_image_link4, previewimage4, photograph);
openurl(preview_image_link5, previewimage5, signature);

// preview remover
let remover = document.getElementsByClassName('preview_remove');
function previewremover(removeimage, previewno) {
  removeimage.addEventListener('click', () => {
    previewno.setAttribute('src', "")
  })
}
previewremover(remover[0], previewimage1)
previewremover(remover[1], previewimage2)
previewremover(remover[2], previewimage3)
previewremover(remover[3], previewimage4)
previewremover(remover[4], previewimage5)

let sidemanu = document.getElementById('sidemanu');
function manubar() {
  let hambarger_font = document.getElementsByClassName('hambarger_font');

  // console.log('work')
  if (sidemanu.style.display == 'block') {
    sidemanu.style.display = 'none'
    hambarger_font[0].removeAttribute('id')
    hambarger_font[1].removeAttribute('id')
    hambarger_font[2].removeAttribute('id')
  }
  else {
    sidemanu.style.display = 'block'
    hambarger_font[0].setAttribute('id', 'rotate1');
    hambarger_font[2].setAttribute('id', 'rotate2');
    hambarger_font[1].setAttribute('id', 'none');
    // hambarger_font[1].style.display='none';

  }

}

if (document.getElementsByClassName('navbar')[0].style.display == 'none') {
  document.getElementById('sidemanu').style.display = 'none';
}
// console.log(document.getElementsByClassName('navbar')[0])




// admin page JS
// if

function slider() {

  if (document.getElementById('admin_left_body').style.left == '-1000px') {
    document.getElementById('admin_left_body').style.left = '0'
    document.getElementById('admin_left_body').style.zIndex = '10'
    document.getElementById('admin_left_body').setAttribute('class', 'manu-bar-slide-l-r');
    // console.log('working')
    document.getElementById('admin_left_body').style.transform = '';


  }
  else {
    document.getElementById('admin_left_body').style.zIndex = '-1'
    document.getElementById('admin_left_body').setAttribute('class', 'manu-bar-slide');
    document.getElementById('admin_left_body').style.left = '-1000px'
    document.getElementById('admin_left_body').style.transform = ' rotateY(45deg)';

  }

}
try {
  if (document.getElementById('admin_left_body').style.left !== '-1000px') {
    document.getElementsByClassName('hamberger_line')[0].style.transform = 'rotate(45deg)'
  }
  // console.log(document.getElementById('admin_left_body').getAttribute('class'))
} catch {
  // console.log('error')
}



// admin page
function studentpage() {
  document.getElementById("myFrame").src = "../adminPages/students.php";
}

// student gender and reletionship 
// reletion start
const reletion = document.getElementById('reletion');
const reletionship_div = document.getElementById('reletionship_div');
let input = document.createElement('input');
input.setAttribute('class', 'reletion_input form_input')
input.setAttribute('type', 'text')
input.setAttribute('name', 'gurdian_reletion')
input.setAttribute('placeholder', 'Enter Guardian Reletion')
input.setAttribute('maxlength', '20')
input.required = true;
reletion.onchange = () => {
  if (reletion.value == 'others') {
    reletionship_div.appendChild(input)
  } else if (input != undefined) {
    input.remove()
  }
}
// reletion close
// gender start
const gender = document.getElementById('gender');
const student_info_sec_2 = document.getElementsByClassName('student_info_sec_2')[0];
let gender_input = document.createElement('input');
gender_input.setAttribute('class', 'reletion_input form_input')
gender_input.setAttribute('type', 'text')
gender_input.setAttribute('name', 'gender')
// input.value=input.value;
gender_input.setAttribute('placeholder', 'Enter Gender')
gender_input.setAttribute('maxlength', '20')
gender_input.required = true
gender.onchange = () => {
  if (gender.value == 'others') {
    student_info_sec_2.appendChild(gender_input)
  } else if (gender_input != undefined) {
    gender_input.remove()
  }
}
// gender close

const textarea = document.getElementsByClassName('textarea');
for (let i = 0; i < textarea.length; i++) {
  textarea[i].innerHTML = ""
}

let address_copyer = document.getElementById('address_copyer')
address_copyer.onchange = () => {
  // console.log(address_copyer.value)

  if (address_copyer.value == 'on') {
    address_copyer.value = 'off';
    let student_address = document.getElementById('student_address');
    let gurdian_address = document.getElementById('gurdian_address');
    gurdian_address.value = student_address.value;

    let student_district_input = document.getElementById('student_district_input');
    let G_district = document.getElementById('G_district');
    G_district.value = student_district_input.value;

    console.log(address_copyer.value)
  } else if (address_copyer.value == 'off') {
    address_copyer.value = 'on';
    console.log(address_copyer.value)
    gurdian_address.value = "";

  }

}

// here check new student uplaod documents type
// let upload = document.getElementsByClassName('document_upload_input');//file input where class socument_upload_input
// let upload_error = document.getElementsByClassName('upload_error');//file error viewer
// for (let i = 0; i < upload.length; i++) {
//   upload[i].onchange = () => {

//     let file = upload[i].value
//     let file_name = file.split("\\")
//     let final = file_name[2].split(".")
//     let alert = document.createElement('p');

//     if (final[1] != 'jpg') {
//       alert.setAttribute('class', 'invalid_picture_type')
//       alert.innerHTML = null
//       alert.innerHTML = "This is not match <br> any file type"
//       upload_error[i].appendChild(alert);
//       alert.setAttribute('class', 'invalid_picture_type')
//       alert.innerHTML = null
//       alert.innerHTML = "This is not match <br> any file type"
//       upload_error[i].appendChild(alert);
//     } else if (final[1] != 'png') {
//       alert.setAttribute('class', 'invalid_picture_type')
//       alert.innerHTML = null
//       alert.innerHTML = "This is not match <br> any file type"
//       upload_error[i].appendChild(alert);

//     } else {
//    input.remove()
//     }


//     console.log(alert.innerHTML)
//   }
// }

// contact page script

// let innerwidth=window.innerHeight;
// let Contact_item=document.getElementsByClassName('Contact_item');
// Contact_item[0].setAttribute('style','top:'+innerwidth-10+'%;')
