// let manu_item = document.getElementsByClassName('manu_item');
// let container_iframe = document.getElementsByClassName('container_iframe');
// let create_admin_li=document.getElementsByClassName('create_admin_li')[0]
// // const holla = document.getElementById("holla");
// create_admin_li.addEventListener('click', () => {
//     // console.log("this is holla message from bikrata")
//     container_iframe[0].setAttribute('src', './iframe/admin_create.php')
// })


// // console.log(create_admin_li[0])
// try{
// create_admin_li[0].addEventListener('click', () => {
//     container_iframe[0].setAttribute('src', './iframe/admin_create.php')
//     // console.log("hoola holla holla :)")
// })
// }catch{
//     // console.error('hi');
// }

    


// function iframechanger(lielement,source){
//     lielement.addEventListener('click',()=>{
//         container_iframe[0].setAttribute('src', `./iframe/${source}`);
//     })
// }

// let admin_list=document.getElementsByClassName('admin_list')[0];
// let dashboard=document.getElementsByClassName('dashboard')[0];
// let product_update=document.getElementsByClassName('product_update')[0];
// try{
// iframechanger(admin_list,'admin_list.php');
// }catch{
//     console.log('hello');
// }
// try{
// iframechanger(dashboard,'dashboard.php');
// }catch{
//     console.log('hello');
// }
// try{
// iframechanger(product_update,'add_product.php');
// }catch{
//     console.log('hello');
// }

// // console.log('all')
// // let manu_bar_item_link = document.getElementsByClassName('manu_bar_item_link');

// // const buttonGroup = document.getElementsByClassName("admin_manu_ul")[0];

// // buttonGroup.addEventListener('click', (e) => {



// // })



// /* my code (james) */

// // const anubarItemLink = document.getElementsByClassName('manu_bar_item_link');

// // var eventFunc = function (e) {
// //     // var attribute = this.getAttribute("manu_bar_item_link");
// //     let a=e.path[1]
// //     console.log(a)
// // }


// // for (var i = 0; i < anubarItemLink.length; i++) {
// //     anubarItemLink[i].addEventListener('click', eventFunc, true);
// // }


// // my code end (james)


// // function demo() {
// // iframe. = "./iframe/admin_create.php"

// // }
// // C:\xampp\htdocs\karim\project1\_assets\admin\iframe\admin_create.php

// // let manu_item = document.getElementsByClassName('manu_item');

// // manu_item[0].addEventListener('click', () => {
// //     // container_iframe.src="./iframe/admin_create.php"
// // })
// // manu_item[1].addEventListener('click', () => {
// //     container_iframe.src = "./iframe/admin_create.php"
// // })
// // // manu_item[0].addEventListener('click',()=>{
// // //     // container_iframe.src="./iframe/admin_create.php"
// // // })

// // let Password_viewer_para = document.getElementsByClassName('Password_viewer_para')[0];
// // let Password_viewer_icon = document.getElementById('Password_viewer_icon');
// // // Password_viewer_icon
// // Password_viewer_icon.setAttribute('class', 'fa-solid fa-eye')
// // let Password_viewer = document.querySelector('#password_viewer')
// // Password_viewer.addEventListener('click', () => {
// //     // if (Password_viewer_icon.getAttribute('class') == 'fa-solid fa-eye') {
// //     //     Password_viewer_para.innerHTML="Show Password"
// //     //     Password_viewer_icon.setAttribute('class', 'fa-solid fa-eye-slash')
// //     // } else if (Password_viewer_icon.getAttribute('class') == 'fa-solid fa-eye-slash') {
// //     //     Password_viewer_para.innerHTML="Hide Password"
// //     //     Password_viewer_icon.setAttribute('class', 'fa-solid fa-eye')

// //     // }
// // })
// // function demo() {
// //     // console.log
// // }


let delete_alert=document.getElementById('delete_alert');
let delete_hidener=document.getElementById('delete_hidener');

    if(delete_alert!=undefined){
delete_hidener.addEventListener('click',()=>{
    console.log('work')
    delete_alert.setAttribute('id','delete_alert_out')
    
})

setTimeout(()=>{
    delete_alert.setAttribute('id','delete_alert_out')

},4000);}



// admin create password show and hide code
let password_viewer_btn = document.getElementById('password_viewer');
if(password_viewer_btn!=undefined){
let password = document.getElementsByClassName('password');
let password_show = true;
password_viewer_btn.addEventListener('click', () => {
    if (password_show == true) {
        for (let i = 0; i < password.length; i++) {
            password[i].setAttribute('type', 'text');
        }
        Password_viewer_icon.setAttribute('class', 'fa-solid fa-eye')

        password_show = false
    } else if (password_show == false) {
        for (let i = 0; i < password.length; i++) {
            password[i].setAttribute('type', 'password');
        }
        Password_viewer_icon.setAttribute('class', 'fa-solid fa-eye-slash')
        password_show = true
    }
    // console.log(password_show);
})}

// let  insert_alert=document.getElementById('insert_alert');
let insert_alert=document.getElementById('insert_alert');

let insert_hidener=document.getElementById('insert_hidener');
if(insert_alert!=undefined){
insert_hidener.addEventListener('click',()=>{
   
    insert_alert.setAttribute('id','insert_alert_out')
    
})
setTimeout(()=>{
    insert_alert.setAttribute('id','insert_alert_out')
    
},4000);

}
// product insert alert Selection 

let product_insert_sucess_slider=document.getElementsByClassName('product_insert_sucess_slider')[0]
if(product_insert_sucess_slider!=undefined){
let slider_hide_btn=document.getElementById('slider_hide_btn');
slider_hide_btn.addEventListener('click',()=>{
    console.log('work')
    product_insert_sucess_slider.setAttribute('class','product_insert_sucess_slider_remover')
    
})
setTimeout(()=>{
    product_insert_sucess_slider.setAttribute('class','product_insert_sucess_slider_remover')
    
},4000);
}