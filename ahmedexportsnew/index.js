let login_modal_div = document.querySelector(".login-modal");
let modal_btn = document.querySelector("#modal-btn");
// console.log(login_modal_div);
let singup_modal_div = document.querySelector(".singup-modal");

let singup_modal = document.querySelector(".singup-modal");

// login form modal
modal_btn.addEventListener("click", () => {
  login_modal_div.style.display = "block";
});
// login form hide x btn
let login_hiddener = document.querySelector(".login_hiddener");
login_hiddener.addEventListener("click", () => {
  login_modal_div.style.display = "none";
});

let login_a = document.querySelector("#login-modal-a");
login_a.addEventListener("click", () => {
  singup_modal_div.style.display = "block";
  login_modal_div.style.display = "none";
});

let singup_hiddener = document.querySelector(".singup_hiddener");
singup_hiddener.addEventListener("click", () => {
  singup_modal_div.style.display = "none";
});
let account_exist_text = document.querySelector("#account_exist_text");
account_exist_text.addEventListener("click", () => {
  singup_modal_div.style.display = "none";
  login_modal_div.style.display = "block";
});


let countNumber = document.querySelectorAll(".exportnumber");
function updatelist() {
  countNumber.forEach((counter) => {
    counter.innerText = "0";
    const updateCounter = () => {
      const terget = +counter.getAttribute("data-val");
      const c = +counter.innerText;
      const increment = terget / 250;

      if (c < terget) {
        counter.innerText = `${Math.ceil(c + increment)}`;
        setTimeout(updateCounter, 1);
      } else {
        counter.innerText = terget;
      }
    };
    updateCounter();
  });
}
// console.log('kdhskfhkufhliahfladh')
// onview counter
let obj = new IntersectionObserver((entry) => {
  // entry[0].target.style.background='red';
  updatelist();
});
obj.observe(numberCountid);