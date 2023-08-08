// console.log(password1.value);
// document.querySelector('#password1').value

let success_unsuccess_slider=document.getElementsByClassName('success_unsuccess_slider');
let hide_btn=document.getElementsByClassName('hide_btn');
hide_btn[0].addEventListener('click',()=>{
    success_unsuccess_slider[0].setAttribute('style','display:none;')
})

