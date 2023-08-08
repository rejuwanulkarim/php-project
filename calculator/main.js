let cal_button = document.getElementsByClassName('cal-button');
let display = document.getElementById('display')

for (let i = 0; i < cal_button.length; i++) {


    cal_button[i].addEventListener('click', () => {
        if (cal_button[i].value == 'AC') {
            display.value = ''
        } else if (cal_button[i].value == 'DE') {

            display.value = display.value.toString().slice(0, -1)

        } else if (cal_button[i].value == '=') {
            display.value = eval(display.value)
        }
        else {
            display.value += cal_button[i].value
        }


    })
}
console.log("Developed By Rejuwan")