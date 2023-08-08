// this script is for user page
// for customer list
const MyApi = "7b951ca15de226dfaf51232374a150eb";
let alert_msg = document.getElementsByClassName("alert-msg-nor")[0];
let username = document.getElementsByClassName("username");
let alertSec = document.getElementById("alert");

function alHide() {
  alertSec.style.display = "none";
}

function alShow() {
  alertSec.style.display = "block";
}
// print payment recipt function
function printRecipt(val) {
  let newWindow = window.open("", "", "width=256,height=256", "_top");
  //   newWindow.name="newWindow"
  newWindow.document.write(`<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet   " href="../assets/style.css">
    <title>Recipt</title>
</head>
<body>

<div class="card">
${val.parentElement.innerHTML}

</div>
<button onclick="window.print()">Print</button>
</body>
</html>`);
}
// fetch all details about customer
const customerDetails = () => {
  let output = { action: "read" };
  fetch("../api/crud.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/text",
      "X-API-Key": MyApi,
    },
    body: JSON.stringify(output),
  })
    .then((response) => response.json())
    .then((result) => {
      let Allcustomer = document.getElementsByClassName("user-cards")[0];
      let userCard = "";
      if (result.status == "success") {
        let printType;
        for (let i in result.data) {
          switch (result.data[i].print_type) {
            case "bp":
              printType = "blackprint";
              break;
            case "cp":
              printType = "color print";
              break;
            case "mp":
              printType = "Micro Print";
              break;
            case "bx":
              printType = "black xerox";
              break;
            case "cx":
              printType = "Color xerox";
              break;
            case "ps":
              printType = "Pasport size";
              break;
            case "ss":
              printType = "stamp size";
              break;
            default:
              printType = "others";
              break;
          }
          userCard += `  <div class="card">
        <p class="username">${result.data[i].name}</p>
        <p>Print Type:&nbsp;${printType}&nbsp;</p>
        <p>Quantity:&nbsp;${result.data[i].print_quantity}&nbsp;pice</p>
        <p>Cost :&nbsp; ${result.data[i].cost}</p>
        <p>Payment Mode :&nbsp; ${result.data[i].payment_type}</p>
        <p>Total Price: <b style="color:red;">₹&nbsp;${result.data[i].total_price}</b></p>
        <p>Date: ${result.data[i].date}</p>
        <button onclick="printRecipt(this)" class="recipt-print">Print Recipt</button>
        <button onclick="DelCustmer(${result.data[i].slno})" class="recipt-print">Delete Customer</button>

    </div>`;
        }
        Allcustomer.innerHTML = userCard;
      } else if (result.status == "empty") {
        alShow();
      }
    })
    .catch((err) => {
      console.log(err);
    });
};
// customer details delete
const DelCustmer = (slno) => {
  let deleteConfirm = confirm("Want to delete?");
  if (deleteConfirm == true) {
    let massage = document.getElementById("massage");
    let output = { action: "delete", data: slno };
    fetch("../api/crud.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/text",
        "X-API-Key": MyApi,
      },
      body: JSON.stringify(output),
    })
      .then((response) => response.json())
      .then((result) => {
        customerDetails();
        if (result.status == "success") {
          // overview function for recalled due to reload overview data
          overview();
          alert_msg.classList.toggle("alert-msg-exi");
          massage.innerHTML = "<b>Success!</b> Delete Success";
          alert_msg.style.backgroundColor = "green";
          setTimeout(() => {
            alert_msg.classList.toggle("alert-msg-exi");
          }, 2000);
        } else if (result.status == "empty") {
          customerDetails();
          massage.innerHTML = "<b>Sorry!</b> Customer Not Deleted ";
          alert_msg.style.backgroundColor = "red";
        }
      })
      .catch((err) => {
        console.log(err);
      });
  }
};

const search = (val) => {
  for (let i = 0; i < username.length; i++) {
    username[i].parentElement.style.display = "none";
    if (val.toLowerCase() == username[i].innerHTML.toLowerCase()) {
      username[i].parentElement.style.display = "flex";
      alHide();
    } else if (val == "") {
      for (let i = 0; i < username.length; i++) {
        username[i].parentElement.style.display = "flex";
      }
      alHide();
    } else {
      alShow();
    }
  }
};
// for add new customer

let addForm = document.getElementsByClassName("customer-form");
addForm[0].addEventListener("submit", (e) => {
  e.preventDefault();
  let formData = new FormData(addForm[0]);
  let name = formData.get("name");
  // let printType = formData.get("print-type");
  let printType = document.getElementsByClassName("print-type")[0].value;
  // console.log(printType[0].value);
  let printQuantity = formData.get("print-quantity");
  let printCost = formData.get("print-cost");
  let paymentType = formData.get("payment_type");
  let formValues = {
    name: name,
    print_type: printType,
    quantity: printQuantity,
    print_cost: printCost,
    payment_type: paymentType,
    // total: totalPrice,
  };
  let output = { data: formValues, action: "write" };
  fetch("../api/crud.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/text",
      "X-API-Key": "7b951ca15de226dfaf51232374a150eb",
    },
    body: JSON.stringify(output),
  })
    .then((response) => response.json())
    .then((result) => {
      let masssage = document.getElementById("massage");
      if (result.status == "success") {
        // overview function for recalled due to reload overview data
        overview();
        addForm[0].reset();
        let calPrice = document.getElementsByClassName("cal-price");
        calPrice[0].innerHTML = "";
        customerDetails();
        alert_msg.classList.toggle("alert-msg-exi");
        masssage.innerHTML = "<b>Success!</b> User Added Success";
        alert_msg.style.backgroundColor = "green";
        setTimeout(() => {
          alert_msg.classList.toggle("alert-msg-exi");
        }, 2000);
      } else {
        masssage.innerHTML = "<b>Sorry!</b> User Not Added";
        alert_msg.style.backgroundColor = "red";
      }
    })
    .catch((err) => {
      console.log(err);
    });
});

// forgot otp sender

function forgotOtp(e) {
  let loading = document.getElementById("loading");
  loading.style.display = "flex";
  let email = e.previousElementSibling.value;
  if (email != "") {
    let data = { email: email };
    let output = { action: "forgot", data: data };

    fetch("../api/crud.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/text",
        "X-API-Key": "7b951ca15de226dfaf51232374a150eb",
      },
      body: JSON.stringify(output),
    })
      .then((response) => response.json())
      .then((result) => {
        if (result.status == "success") {
          loading.style.display = "none";
          let alert_msg_nor = document.getElementsByClassName("alert-msg-nor");
          alert_msg_nor[0].classList.toggle("alert-msg-exi");
          alert_msg_nor[0].innerHTML = `<b>OTP Send Successfully</b>`;
          setTimeout(() => {
            alert_msg_nor[0].classList.toggle("alert-msg-exi");
          }, 3000);
        } else {
          alert_msg_nor[0].innerHTML = `<b>Sorry OTP Not Sent</b>`;
          setTimeout(() => {
            alert_msg_nor[0].classList.toggle("alert-msg-exi");
          }, 3000);
          alert_msg_nor[0].style.backgroundColor = "red";
        }
      })
      .catch((err) => {
        alert_msg_nor[0].innerHTML = `<b>Sorry some error occurred</b>`;
        loading.style.display = "none";
        setTimeout(() => {
          alert_msg_nor[0].classList.toggle("alert-msg-exi");
        }, 3000);
      });
  }
}

// customer adder for frontent
let printCost = document.getElementsByClassName("print-cost");
let printQuantity = document.getElementsByClassName("print-quantity");
let calPrice = document.getElementsByClassName("cal-price");

printCost[0].addEventListener("input", (e) => {
  calPrice[0].innerHTML = printCost[0].value * printQuantity[0].value;
});

// overview sections
const overview = () => {
  let due = document.getElementById("due");
  let total = document.getElementById("total");
  let output = { action: "overview", data: "due" };
  fetch("../api/crud.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/text",
      "X-API-Key": "7b951ca15de226dfaf51232374a150eb",
    },
    body: JSON.stringify(output),
  })
    .then((response) => response.json())
    .then((result) => {
      let b = 0;
      for (let j in result) {
        if (result[j].status == "success") {
          let dtype;
          if (result[j].dtype == "due") {
            for (let i in result[j].data) {
              if (result[j].data[i] != "") {
                let a = parseInt(result[j].data[i]);
                b += a;
                due.innerHTML = b;
              }
            }
          } else if (result[j].dtype == "total") {
            let b = 0;
            for (let i in result[j].data) {
              if (result[j].data[i] != "") {
                let a = parseInt(result[j].data[i]);
                b += a;
                total.innerHTML = b;
              }
            }
          } else if (result[j].dtype == "cp") {
            let totalCprint = 0;
            for (let i in result[j].data) {
              if (result[j].data[i] != "") {
                let t = parseInt(result[j].data[i]);
                totalCprint += t;
                document.getElementById("cp").innerHTML = `${totalCprint}pice`;
              }
            }
          } else if (result[j].dtype == "bp") {
            let totalCprint = 0;
            for (let i in result[j].data) {
              if (result[j].data[i] != "") {
                let t = parseInt(result[j].data[i]);
                totalCprint += t;
                document.getElementById("bp").innerHTML = `${totalCprint}pice`;
              }
            }
          } else if (result[j].dtype == "mp") {
            let totalCprint = 0;
            for (let i in result[j].data) {
              if (result[j].data[i] != "") {
                let t = parseInt(result[j].data[i]);
                totalCprint += t;
                document.getElementById("mp").innerHTML = `${totalCprint}pice`;
              }
            }
          } else if (result[j].dtype == "bx") {
            let totalCprint = 0;
            for (let i in result[j].data) {
              if (result[j].data[i] != "") {
                let t = parseInt(result[j].data[i]);
                totalCprint += t;
                document.getElementById("bx").innerHTML = `${totalCprint}pice`;
              }
            }
          } else if (result[j].dtype == "cx") {
            let totalCprint = 0;
            for (let i in result[j].data) {
              if (result[j].data[i] != "") {
                let t = parseInt(result[j].data[i]);
                totalCprint += t;
                document.getElementById("cx").innerHTML = `${totalCprint}pice`;
              }
            }
          } else if (result[j].dtype == "others") {
            let totalCprint = 0;
            for (let i in result[j].data) {
              if (result[j].data[i] != "") {
                let t = parseInt(result[j].data[i]);
                totalCprint += t;
                document.getElementById(
                  "others"
                ).innerHTML = `${totalCprint}pice`;
              }
            }
          }
        } else {
          // total.innerHTML = 000;
        }
      }
    })
    .catch((err) => {
      console.log(err);
    });
};

// option choice for type of printing or xerox

const printchoicer = (val) => {
  let printType = document.getElementsByClassName("print-type");
  printType[0].value = val;
};
