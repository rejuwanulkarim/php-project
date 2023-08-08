let body=document.getElementsByTagName('body')[0]
let window_width = window.innerWidth;
// alert('hello');
// console.log(window_width)
// let scset = script.setAttribute("src", "/assets/js/bundle.js");
let slider_left_right = document.getElementsByClassName("quote_section")[0];
slider_left_right.style.right = `-${window_width}px`;

slider_left_right.setAttribute("id", "noslide");
// slider_left_right.style.zIndex='-1'
function getquote() {
  if (slider_left_right.getAttribute("id") == "noslide") {
    // slider_left_right.style.zIndex='10'
    slider_left_right.style.right = "0px";
    slider_left_right.setAttribute("id", "slide");
    get_quote.style.opacity='1'
    body.style.overflowY='hidden'
    
} else if (slider_left_right.getAttribute("id") == "slide") {
    slider_left_right.style.right = `-${window_width}px`;
    slider_left_right.setAttribute("id", "noslide");
    body.style.overflowY='scroll'
    
  }
}