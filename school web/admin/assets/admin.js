let hambarger = document.getElementsByClassName('hambargar')
let admin_left = document.getElementsByClassName('admin-left')
let status_alert = document.getElementById('status-alert');
hambarger[0].addEventListener('click', () => {

    admin_left[0].classList.toggle('item-hidener')
    // let cookies = setCookie("hambar", "on")
    // setCookie("username", "user", 365)
    if (admin_left[0].className == "hambargar") {

        document.cookie = "hambar=on"
    } else if (admin_left[0].className == "item-hidener") {

        document.cookie = "hambar=off"
    }
    console.log(document.cookie = "username=karim");

})
let loading = document.getElementById('loading');

let request_path = "../pages/config.php"
function admin_modal_hidener(e) {
    // let admin_modal = document.getElementById('admin-modal');
    // admin_modal.style.display = "none";

    // console.log()
    e.parentElement.parentElement.parentElement.style.display = "none"
}
function admindel(slno) {

    let output = { "slno": slno, "type": "admin-data", "action": "delete" }
    fetch('../pages/config.php', {
        method: "POST",
        headers: {
            "Content-type": "application/json",
        },
        body: JSON.stringify(output)
    }).then((response) => response.json()).then((result) => {
        // console.log(result);
        if (result.status == "success") {
            admin_list();
        } else if (result.status == "error") {
            alert("data not deleted")
        }
    })



}
function admin_load() {
    console.log("loaded")
}

function adminlist() {
    let table_body = document.getElementById('admin-table-body')
    let output = { "type": "admin-data", "action": "admin-read" }

    fetch("../pages/config.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(output)
    }).then((response) => response.json()).then((result) => {



        let table_data = "";
        let slno = 1;
        if (result.status == "empty") {
            table_body.innerHTML = `<tr>
            
            <td colspan="8" text-align="center">No data here please try again</td>
            </tr>`
        } else {
            for (let i in result) {
                table_data += `<tr>
            
                <td>${slno++}</td>
                <td>${result[i].id}</td>
                <td>${result[i].name}</td>
                <td>${result[i].email}</td>
                <td>${result[i].phone}</td>
                <td>${result[i].create_date}</td>
                <td>${result[i].last_log}</td>
                <td class='table-actions'>
                <button class='delete-btn' onclick='admindel(${result[i].slno})'>
                <svg class='delete-icon'>
                <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#delete'></use>
                </svg>
                </button>
                </td>
                </tr > `


            }
            table_body.innerHTML = table_data;
        }

    }).catch((error) => {
        console.log(error)
    })
}


function admin_search() {
    let admin_search = document.getElementById('admin-search').value;
    // console.log(admin_search)
    let output = { "type": "admin-data", "action": "admin-search", "data": admin_search };
    fetch("../pages/config.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(output)
    }).then((response) => response.json()).then((result) => {
        let table_body = document.getElementById('admin-table-body')
        console.log(result)
        if (result.status == "empty") {
            table_body.innerHTML = `<tr> <td colspan='8' text-align='center'>No data found</td></tr>`
        } else {

            let table_data = "";
            let slno = 1;
            for (let i in result) {
                table_data += `< tr >
            
                <td>${slno++}</td>
                <td>${result[i].id}</td>
                <td>${result[i].name}</td>
                <td>${result[i].email}</td>
                <td>${result[i].phone}</td>
                <td>${result[i].create_date}</td>
                <td>${result[i].last_log}</td>
                <td>
                <button class='delete-btn' onclick='admindel(${result[i].slno})'>
                <svg class='delete-icon'>
                <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#delete'></use>
                </svg>
                </button>
                </td>
                </tr > `
            }
            table_body.innerHTML = table_data;
        }
    }).catch((error) => {
        console.log(error)
    })
}

function admin_recall() {
    adminlist()
}
function admindel(slno) {
    let conf = confirm("Do You Want To Delete?")
    if (conf == true) {


        let output = { "type": "admin-data", "action": "delete", "data": slno };
        fetch("../pages/config.php", {
            method: "POST",
            headers: {
                "Content-type": "application/json"
            },
            body: JSON.stringify(output)
        }).then((response) => response.json()).then((result) => {
            // console.log(result);
            if (result.status == "success") {
                adminlist()
            } else if (result.status == "error") {
                alert("Some Error Here Please Try Again");
                adminlist()

            }


        }).catch((error) => {
            console.log(error)
        })
    }
}

function adminchecker(value) {
    let uname_error = document.getElementById('uname-error');

    let output = { "type": "admin-data", "action": "uname-check", "data": value };
    fetch("../pages/config.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(output)
    }).then((response) => response.json()).then((result) => {
        if (result.status == "exist") {
            uname_error.innerHTML = "Email Alredy Taken"
            uname_error.style.display = "block"

        }
    })
}
function datainsert() {
    let gmail = document.getElementById('gmail')
    let name = document.getElementById('name')
    let phone = document.getElementById('phone')

    let output = { "type": "admin-data", "action": "admin-insert", "data": value };
    fetch("../pages/config.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(output)
    }).then((response) => response.json()).then((result) => {
        if (result.status == "exist") {
            uname_error.innerHTML = "Email Alredy Taken"
            uname_error.style.display = "block"

        }
    })
}


function alerthidener(e) {
    e.parentElement.style.display = 'none'
}
// adminlist()

function studentlist() {
    let students_tbody = document.getElementById('student-table-body');
    let output = { "type": "student-data", "action": "read" }
    fetch(request_path, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(output)
    }).then((response) => response.json()).then((result) => {
        // console.log(result);
        if (result.status == "success") {
            let table_data = "";
            let slno = 1;
            for (i in result.data) {
                table_data += `<tr>
                <td>${slno++}</td>
                <td>${result.data[i].id}</td>
                <td><img class="table-profile-photo" src="../../_images/students_photograph/${result.data[i].id}.png"></td>
                <td>${result.data[i].name}</td>
                <td>${result.data[i].class}</td>
                <td>${result.data[i].section}</td>
                <td>${result.data[i].roll_no}</td>
                <td>${result.data[i].fathers_name}</td>
                <td>${result.data[i].phone_no}</td>
                <td>${result.data[i].address}</td>
                <td class="table-actions">
                <svg class="svg-action-btn delete-btn" onclick="studentdel(${result.data[i].slno})"><use href="../../svg_logos/svg_icons.svg#delete"></use></svg>
                <svg class="svg-action-btn edit-btn"  onclick="studentedit(${result.data[i].slno})"><use href="../../svg_logos/svg_icons.svg#edit"></use></svg>
              </td>
                </tr>`
            }
            students_tbody.innerHTML = table_data
        } else if (result.status == "empty") {
            table_data = `<tr><td colspan="11" text-align="center">No Data Found</td></tr>`
            students_tbody.innerHTML = table_data
        }

    }).catch((error) => {
        console.log(error);
    })
}
studentlist()

function studentdel(slno) {
    let confirmation = confirm("Do You Want To Delete?");
    let output = { "type": "student-data", "action": "delete", "data": slno }
    if (confirmation == true) {
        loading.style.display = "flex"
        fetch(request_path, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(output)
        }).then((response) => response.json()).then((result) => {
            // console.log(result);
            if (result.status == "success") {
                studentlist()
                loading.style.display = "none"
            } else if (result.status == "empty") {
                alert("Student Not Valid");
            } else if (result.status == "error") {
                alert("Can't Delete ,Please try again");
            }

        }).catch((error) => {
            console.log(error)
        })
    }
}

function short_sec(val) {
    let STclass = document.getElementById('class').value;
    let students_tbody = document.getElementById('student-table-body');
    let output = { "type": "student-data", "action": "search-sec", "sec-data": val, "class-data": STclass }
    if (val != "") {
        loading.style.display = "flex"
        fetch(request_path, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(output)
        }).then((response) => response.json()).then((result) => {
            // console.log(result);
            let table_data = ""
            if (result.status == "success") {
                let table_data = "";
                let slno = 1;
                for (i in result.data) {
                    table_data += `<tr>
                    <td>${slno++}</td>
                    <td>${result.data[i].id}</td>
                    <td><img class="table-profile-photo" src="../../_images/students_photograph/${result.data[i].id}.png"></td>
                    <td>${result.data[i].name}</td>
                    <td>${result.data[i].class}</td>
                    <td>${result.data[i].section}</td>
                    <td>${result.data[i].roll_no}</td>
                    <td>${result.data[i].fathers_name}</td>
                    <td>${result.data[i].phone_no}</td>
                    <td>${result.data[i].address}</td>
                    <td class="table-actions">
                    <svg class="svg-action-btn delete-btn" onclick="studentdel(${result.data[i].slno})"><use href="../../svg_logos/svg_icons.svg#delete"></use></svg>
                    <svg class="svg-action-btn edit-btn"  onclick="studentedit(${result.data[i].slno})"><use href="../../svg_logos/svg_icons.svg#edit"></use></svg>
                    <svg class="svg-action-btn profile-view-btn" onclick="viewprofile(${result.data[i].slno})"><use href="../../svg_logos/svg_icons.svg#angle_right"></use></svg>
                    
                    </td>
                    </tr>`
                }
                students_tbody.innerHTML = table_data
                loading.style.display = "none"
            } else if (result.status == "empty") {
                table_data = `<tr><td colspan="11" text-align="center">No Data Found</td></tr>`
                students_tbody.innerHTML = table_data
                loading.style.display = "none"
            }


        }).catch((error) => {
            console.log(error)
            loading.style.display = "none"
        })
    }
}
function short_class(val) {

    let students_tbody = document.getElementById('student-table-body');
    let output = { "type": "student-data", "action": "search-class", "data": val }
    if (val != "") {
        loading.style.display = "flex"
        fetch(request_path, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(output)
        }).then((response) => response.json()).then((result) => {
            console.log(result);
            let table_data = ""
            if (result.status == "success") {
                let table_data = "";
                let slno = 1;
                for (i in result.data) {
                    table_data += `<tr>
                    <td>${slno++}</td>
                    <td>${result.data[i].id}</td>
                    <td><img class="table-profile-photo" src="../../_images/students_photograph/${result.data[i].id}.png"></td>
                    <td>${result.data[i].name}</td>
                    <td>${result.data[i].class}</td>
                    <td>${result.data[i].section}</td>
                    <td>${result.data[i].roll_no}</td>
                    <td>${result.data[i].fathers_name}</td>
                    <td>${result.data[i].phone_no}</td>
                    <td>${result.data[i].address}</td>
                    <td class="table-actions">
                    <svg class="svg-action-btn delete-btn" onclick="studentdel(${result.data[i].slno})"><use href="../../svg_logos/svg_icons.svg#delete"></use></svg>
                    <svg class="svg-action-btn edit-btn"  onclick="studentedit(${result.data[i].slno})"><use href="../../svg_logos/svg_icons.svg#edit"></use></svg>
                    <svg class="svg-action-btn profile-view-btn" onclick="viewprofile(${result.data[i].slno})"><use href="../../svg_logos/svg_icons.svg#angle_right"></use></svg>
                    
                    </td>
                    </tr>`
                }
                students_tbody.innerHTML = table_data
                loading.style.display = "none"
            } else if (result.status == "empty") {
                table_data = `<tr><td colspan="11" text-align="center">No Data Found</td></tr>`
                students_tbody.innerHTML = table_data
                loading.style.display = "none"
            }


        }).catch((error) => {
            console.log(error)
        })
    }
}
function search_year(e) {
    let admiYear = e.split("-")[0];


    let STclass = document.getElementById('class').value;
    let section = document.getElementById('section').value;
    let students_tbody = document.getElementById('student-table-body');
    let output = { "type": "student-data", "action": "search-year", "sec-data": section, "class-data": STclass, "admission-year": admiYear }
    if (admiYear != "") {
        loading.style.display = "flex"
        fetch(request_path, {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(output)
        }).then((response) => response.json()).then((result) => {
            // console.log(result);
            let table_data = ""
            if (result.status == "success") {
                let table_data = "";
                let slno = 1;
                for (i in result.data) {
                    table_data += `<tr>
                    <td>${slno++}</td>
                    <td>${result.data[i].id}</td>
                    <td><img class="table-profile-photo" src="../../_images/students_photograph/${result.data[i].id}.png"></td>
                    <td>${result.data[i].name}</td>
                    <td>${result.data[i].class}</td>
                    <td>${result.data[i].section}</td>
                    <td>${result.data[i].roll_no}</td>
                    <td>${result.data[i].fathers_name}</td>
                    <td>${result.data[i].phone_no}</td>
                    <td>${result.data[i].address}</td>
                    <td class="table-actions">
                    <svg class="svg-action-btn delete-btn" onclick="studentdel(${result.data[i].slno})"><use href="../../svg_logos/svg_icons.svg#delete"></use></svg>
                    <svg class="svg-action-btn edit-btn"  onclick="studentedit(${result.data[i].slno})"><use href="../../svg_logos/svg_icons.svg#edit"></use></svg>
                    <svg class="svg-action-btn profile-view-btn" onclick="viewprofile(${result.data[i].slno})"><use href="../../svg_logos/svg_icons.svg#angle_right"></use></svg>
                    
                    </td>
                    </tr>`
                }
                students_tbody.innerHTML = table_data
                loading.style.display = "none"
            } else if (result.status == "empty") {
                table_data = `<tr><td colspan="11" text-align="center">No Data Found</td></tr>`
                students_tbody.innerHTML = table_data
                loading.style.display = "none"
            }
        }).catch((error) => {
            console.log(error)
            loading.style.display = "none"
        })
    }
}
function studentdel(slno) {
    let output = { "type": "student-data", "action": "delete", "data": slno }
    let confirmation = confirm("You Are Sure Delete Student?");
    if (confirmation == true) {
        loading.style.display = "flex"
        if (slno != "") {
            fetch(request_path, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(output)
            }).then((response) => response.json()).then((result) => {
                if (result.status == "success") {
                    alert("Delete Successfully")
                    studentlist()
                    loading.style.display = "none"
                } else {
                    alert("No data found")
                    studentlist()
                    loading.style.display = "none";
                }
            }).catch((error) => {

            })
        }
    }

}
function studentedit(slno) {
    let editModal = document.getElementById('editModal')
    let modal_form = document.getElementById('modal-form')
    editModal.style.display = 'flex'
    let student_name = document.getElementById('student-name');
    let father_name = document.getElementById('father-name');
    let STclass = document.getElementById('edt-class');
    let roll = document.getElementById('edt-roll');
    let STsection = document.getElementById('edt-section');
    let phone_no = document.getElementById('edt-phone');
    let address = document.getElementById('edt-address');
    let update_btn = document.getElementById('update-btn');


    // let data = { "name": student_name, "father-name": father_name, "class": STclass, "roll": roll, "section": section, "phone": phone, "address": address };
    // console.log(data)
    let output = { "type": "student-data", "action": "student-edit-fetch", "data": slno };

    fetch(request_path, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(output)
    }).then((response) => response.json()).then((result) => {
        console.log(result)
        if (result.status == "success") {
            // modal_form.innerHTML = ` `;
            student_name.value = result.data[0].name
            father_name.value = result.data[0].fathers_name
            STclass.value = result.data[0].class
            roll.value = result.data[0].roll_no
            STsection.value = result.data[0].section
            phone_no.value = result.data[0].phone_no
            address.value = result.data[0].address
            update_btn.value = result.data[0].slno
            update_btn.setAttribute("onclick", `student_update(${result.data[0].slno})`)
            // console.log(STclass)

        }


    }).catch((error) => {
        console.log(error)


    })


}
function modal_hide() {
    let editModal = document.getElementById('editModal')
    editModal.style.display = 'none'
}


let update_modal = document.getElementById('update-modal')

if (update_modal != undefined) {
    update_modal.addEventListener('click', (e) => {
        e.preventDefault();
    })

}


function student_update(slno) {


    let student_name = document.getElementById('student-name').value;
    let father_name = document.getElementById('father-name').value;
    let STclass = document.getElementById('edt-class').value;
    let roll = document.getElementById('edt-roll').value;
    let section = document.getElementById('edt-section').value;
    let phone = document.getElementById('edt-phone').value;
    let address = document.getElementById('edt-address').value;


    let data = { "slno": slno, "name": student_name, "father-name": father_name, "class": STclass, "roll": roll, "section": section, "phone": phone, "address": address };
    // console.log(data)
    let output = { "type": "student-data", "action": "student-update", "data": data };

    fetch(request_path, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(output)
    }).then((response) => response.json()).then((result) => {
        // console.log(result)
        if (result.status == "success") {
            editModal.style.display = 'none'
            studentlist()
        } else {
            editModal.style.display = 'none'
            studentlist()
            alert("Please Try Again")
        }

    }).catch((error) => {
        console.log(error)
    })
    console.log(slno)
}


function student_print() {
    let divContents = document.getElementsByClassName('student-table')[0].innerHTML;

    var a = window.open('', 'Test', 'height=1000px, width=1000px');
    a.document.write('<link rel="stylesheet" href="../assets/admin.css">');
    a.document.write(`
    <style>
    .student-table{
        overflow: hidden;
    }
    </style>
    <button onclick='window.print()' class="print-btn">Print</button>
    
    <div class='student-table'>${divContents}</div>
   <script>
    let table_heding = document.getElementsByClassName('table-heding')[0];
    // table_heding.style.display='none';
    let table_actions = document.getElementsByClassName('table-actions');
    let action_heading = document.getElementsByClassName('action-heading');
    // action_heading[0].style.display='none';
    for (let i = 0; i < table_actions.length; i++) {
        table_actions[i].style.display = 'none';
    }
    for (let i = 0; i < action_heading.length; i++) {
        action_heading[i].style.display = 'none';
    }
let tableactions=document.getElementsByClassName('table-actions');
for (let i = 0; i < tableactions.length; i++) {
    tableactions[i].style.display = 'none';
}
let tableheding = document.getElementsByClassName('table-heding')[0].style.display='none';

    </script>`);
    a.document.close();
}





// function sum(terget_class, e) {


// let obtain_numbers = document.getElementsByClassName('obtain-numbers');
// let total = "";
// let num = "";
// let num1 = "";
// let num2 = 0;
// for (let i = 0; i < obtain_numbers.length; i++) {

//     num = obtain_numbers[i].innerHTML
//     num1 = parseInt(num);
//     num2 = num1 + num2;
// }
// let total_Sec = document.getElementById('total')
// total_Sec.innerHTML = num2

// }


// result section script


function resultEdit(e) {
    let modal = document.getElementsByClassName('modal')[0]
    modal.setAttribute('class', 'result-edt-modal')

    let oralMark = document.getElementById('modal-oral')
    let theoryMark = document.getElementById('modal-theory')
    let ModalrollNo = document.getElementById('ModalrollNo')
    let roll = document.getElementById('rollNO')
    let student_name = document.getElementById('modal-name')
    let oral = e.parentElement.parentElement.children[4].innerHTML;
    let theory = e.parentElement.parentElement.children[3].innerHTML;
    let rollNo = e.parentElement.parentElement.children[1].innerHTML;
    oralMark.value = oral
    theoryMark.value = theory
    let roll_no = e.parentElement.parentElement.children
    console.log(roll_no);
    ModalrollNo.innerHTML = rollNo;
    roll.value = rollNo;
    student_name.value = e.parentElement.parentElement.children[2].innerHTML;
    console.log(e.parentElement.parentElement.children)
    // sessionStorage.setItem("rollNo", `${rollNo}`);
}



function modalCloser(e) {
    let modal = document.getElementsByClassName('result-edt-modal')[0]
    modal.setAttribute('class', 'modal')
}

function modalChangesSave() {
    let oralMark = document.getElementById('modal-oral').value
    let theoryMark = document.getElementById('modal-theory').value
    let modal_name = document.getElementById('modal-name').value
    let data = { "oral": oralMark, "theory": theoryMark, "name": modal_name };
    let output = { "type": "result-data", "action": "bengali-data", "data": data }


}








// admin notice script 

// function notice_del(e) {
//     console.log("work" + e);
// }

// const notice_del = (e) => {
//     console.log("work" + e);
//     return e;
// }
function notice_del(slno) {
    // console.log(data)
    // let data = { "slno": slno }
    let output = { "type": "notice-data", "action": "delete", "data": slno }
    fetch(request_path, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(output)
    }).then((response) => response.json()).then((result) => {
        console.log(result);
        let status_alert = document.getElementById('status-alert');
        let notice_list = document.getElementsByClassName('notice-list');
        if (result.status == "success") {
            status_alert.setAttribute("style", "color:white;background-color:red;height:3rem;width:13rem;")
            status_alert.innerHTML = "Delete Success Fully"
            setTimeout(() => {
                status_alert.style.display = "none"
                location.reload();
            }, 2000);
        }

    }).catch((error) => {
        console.log(error)
    })
}


// staff   scripting

function stafflist() {
    let output = { "type": "staff-data", "action": "read" }
    fetch(request_path, {
        method: "POST",
        headers: {
            "Content-type": "application/json"
        },
        body: JSON.stringify(output)
    }).then((response) => response.json()).then((result) => {
        let admin_table = document.getElementById('staff-table-body')

        if (result.status == "success") {
            let table_data = "";
            let slno = 1;
            for (let i in result.data) {
                table_data += `<tr>
                <td>${slno++}</td>
                <td>${result.data[i].slno}</td>
                <td>${result.data[i].name}</td>
                <td>${result.data[i].subject}</td>
                <td>${result.data[i].email}</td>
                <td>${result.data[i].phone}</td>
                <td>${result.data[i].address}</td>
                <td>${result.data[i].joining_date}</td>
                <td class='table-actions'>
                <button class='delete-btn' onclick='staffdel(${result.data[i].slno})'>
                <svg class='delete-icon'>
                <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#delete'></use>
                </svg>
                
                </button>
                <button class='edit-btn' onclick='staffedit(${result.data[i].slno})'>
                <svg class='edit-icon'>
                <use href='http://localhost/karim/school web/svg_logos/svg_icons.svg#edit'></use>
                </svg>
                
                </button>
                </td>
                </tr > `
            }

            admin_table.innerHTML = table_data
        } else {

            admin_table.innerHTML = `<tr><td colspan='9' text-align='center'>This Table id Empty</td></tr>`
        }

    }).catch((error) => {
        console.log(error)
    })

}

function staffdel(slno) {
    // console.log("delete")
    let confirmation = confirm(`Sure you want to delete'${name}'`)
    if (confirmation == true) {

        let output = { "type": "staff-data", "action": "delete", "data": slno }
        fetch(request_path, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(output)
        }).then((response) => response.json()).then((result) => {
            if (result.status == "deleted") {
                // status_alert.style.display='flex'
                status_alert.setAttribute("style", "display:flex;background-color:red;")
                stafflist();
                let time = 5;
                status_alert.innerHTML = `Data Deleted Successfully(5)`;
                const status_alert_hidener = setInterval(() => {
                    time--
                    status_alert.innerHTML = `Data Deleted Successfully(${time})`;
                }, 1000);
                setTimeout(() => {
                    status_alert.setAttribute("style", "display:none;")
                    status_alert.style.display = "none"
                    clearInterval(status_alert_hidener);
                }, 5000)
            } else if (result.status == "empty") {
                alert('data not found')
                stafflist();
            } else {
                alert('data not found')
                stafflist();
            }


        }).catch((error) => {
            console.log(error);
        })


    }
}
function staffedit(slno) {
    // console.log("edit")
    let staff_editModal = document.getElementById('staff-editModal');
    staff_editModal.style.display = 'flex'
    let inputs = document.querySelectorAll('#update-modal input')

    let output = { "type": "staff-data", "action": "read-single", "data": slno }
    fetch(request_path, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(output)
    }).then((response) => response.json()).then((result) => {
        if (result.status == "success") {
            // console.log(result);

            document.getElementById('update-btn').setAttribute('onclick', `update_staff(${result.data[0].slno})`)
            document.getElementById('staff-name').value = result.data[0].name
            document.getElementById('edt-subject').value = result.data[0].subject
            document.getElementById('edt-phone').value = result.data[0].phone
            document.getElementById('edt-email').value = result.data[0].email
            document.getElementById('edt-address').value = result.data[0].address
            document.getElementById('edt-joiningdate').value = result.data[0].joining_date




        } else if (result.status == "empty") {
            alert('data not found')
            stafflist();
        }

    }).catch((error) => {
        console.log(error)
    })
}


function update_staff(slno) {
    loading.style.display = "flex"
    let staff_editModal = document.getElementById('staff-editModal');
    staff_editModal.style.display = 'flex'
    let inputs = document.querySelectorAll('#update-modal input')
    let name = document.getElementById('staff-name').value
    let subject = document.getElementById('edt-subject').value
    let phone = document.getElementById('edt-phone').value
    let email = document.getElementById('edt-email').value
    let address = document.getElementById('edt-address').value
    let joining_date = document.getElementById('edt-joiningdate').value
    let data = { "slno": slno, "name": name, "subject": subject, "phone": phone, "email": email, "address": address, "joining_date": joining_date }

    let output = { "type": "staff-data", "action": "update", "data": data }
    fetch(request_path, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(output)
    }).then((response) => response.json()).then((result) => {
        if (result.status == "success") {
            stafflist();
            loading.style.display = "none"
            let updatemodalhidener = document.getElementById('update-modal-hidener')
            admin_modal_hidener(updatemodalhidener);
        } else if (result.status == "empty") {
            alert('data not found')
            stafflist();
            loading.style.display = "none"
        }

    }).catch((error) => {
        console.log(error)
    })
}