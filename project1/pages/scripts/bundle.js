// console.log("working");
let filter_section = document.getElementsByClassName("filter_section");
let select = document.getElementsByClassName("select");

let catagory_name = ["Men", "Women", "Kids", "Electronics", "Beauty"];
let catagory_selector = document.getElementsByClassName(
  "sub_menu_anchor_mid_span"
);
let sub_menu_images = document.getElementsByClassName("sub_menu_images");
let search_input = document.getElementById("search_input");
let images_path = "./_images/catagory_images/";
images_path.replace(" ", "");
for (let i = 0; i < catagory_selector.length; i++) {
  catagory_selector[i].innerHTML = catagory_name[i];
  sub_menu_images[i].setAttribute("src",images_path + catagory_name[i] + "_catagory.jpg"
  );
  sub_menu_images[i].setAttribute("alt", catagory_name[i]);
}

let product_title = document.getElementsByClassName("product_title");
let card_table_tr = document.getElementsByClassName("card_table_tr");
let cards = document.getElementsByClassName("products");
let light_dark_btn = document.getElementById("light_dark_btn");
light_dark_btn.innerHTML = "Light Mood";
search_input.style.backgroundColor = "white";
search_input.style.color = "black";
for (let i = 0; i < product_title.length; i++) {
  product_title[i].style.color = "black";
}
for (let i = 0; i < cards.length; i++) {
  cards[i].style.background = "white";
  cards[i].style.color = "black";
}
// console.log(product_title.length);
light_dark_btn.addEventListener("click", () => {
  if (light_dark_btn.getAttribute("value") == "Light Mood") {
    light_dark_btn.setAttribute("value", "Dark Mood");
    light_dark_btn.setAttribute("style", "background-color:blue;color:white;");
    document.getElementsByTagName("body")[0].style.backgroundColor = "black";
    search_input.style.backgroundColor = "black";
    search_input.style.color = "white";
    search_input.style.transition = "1s";
    for (let i = 0; i < product_title.length; i++) {
      product_title[i].style.color = "white";
    }
    for (let i = 0; i < card_table_tr.length; i++) {
      card_table_tr[i].style.color = "white";
    }
    for (let i = 0; i < cards.length; i++) {
      cards[i].style.background = "black";
      cards[i].style.color = "white";
    }
    for (let i = 0; i < select.length; i++) {
      select[i].style.background = "black";
      select[i].style.color = "white";
    }
    filter_section[0].style.background = "black";
    filter_section[0].style.color = "white";
  } else if (light_dark_btn.getAttribute("value") == "Dark Mood") {
    document.getElementsByTagName("body")[0].style.backgroundColor = "white";
    light_dark_btn.setAttribute("style", "background-color:white;color:black;");
    light_dark_btn.setAttribute("value", "Light Mood");
    search_input.style.backgroundColor = "black";
    search_input.style.color = "white";
    search_input.style.backgroundColor = "white";
    search_input.style.color = "black";
    search_input.style.transition = "1s";
    for (let i = 0; i < product_title.length; i++) {
      product_title[i].style.color = "black";
    }
    for (let i = 0; i < card_table_tr.length; i++) {
      card_table_tr[i].style.color = "black";
    }
    for (let i = 0; i < select.length; i++) {
      select[i].style.background = "white";
      select[i].style.color = "black";
    }
    for (let i = 0; i < cards.length; i++) {
      cards[i].style.background = "white";
      cards[i].style.color = "black";
    }
    filter_section[0].style.background = "white";
    filter_section[0].style.color = "black";
  }
});

// console.log(document.body.offsetWidth)

let body = document.getElementsByTagName("body")[0];
// if(body.style.backgroundColor=='black'){
// alert(0)
// }
// else{
//   alert(1)
// }
// for (let i = 0; i < product_title.length; i++) {
//   // const element = product_title[i];

// }

let products_card_body =
  document.getElementsByClassName("products_card_body")[0];

let product_cards_section = document.getElementsByClassName(
  "product_cards_section"
)[0];
// product_cards_section.addEventListener('load',()=>{
function loaded() {
  console.log("hello");
}
//   console.log(product_cards_section)
// })









