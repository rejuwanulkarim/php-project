console.log("Holla ;)")

const prev = document.getElementById('prev')
const next = document.getElementById('next')
const domCountNum = document.getElementsByClassName(`imgCont`)
let globCount = 2;

const showSlide = () => {

    for (let i = 0; i < domCountNum.length; i++) {
        domCountNum[i].style.display = 'none'
    }

    domCountNum[globCount].style.display = 'block'
}

showSlide()


prev.addEventListener('click', () => {
    globCount == 0 ? globCount = 2 : globCount -= 1
    showSlide()

})

next.addEventListener('click', () => {
    globCount == 2 ? globCount = 0 : globCount += 1
    showSlide()

})


setInterval(() => {
    globCount == 2 ? globCount = 0 : globCount += 1
    showSlide()
}, 6000);