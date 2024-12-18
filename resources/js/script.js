const time = document.getElementById("currentTime");
const date = document.getElementById("currentDate");
const timeCheckEl = document.getElementById("checkTime");
const toggle = document.getElementById("togglePass");

window.onload = updateScreen; //load update screen

//update screen every 1 second
function updateScreen(){
    if (!time || !date || !timeCheckEl)
        return;

    updateTime();

    setInterval(updateTime, 1000);
}

function updateTime(){
    const now = new Date();
    let hour = now.getHours();
    let min = now.getMinutes();
    let sec = now.getSeconds();

    if (now.getMinutes() < 10){
        min = "0" + min;
    }

    if (now.getSeconds() < 10){
      sec = "0" + sec;
    }

    if (hour < 12) {
        timeCheckEl.innerHTML = "AM";
    } else if (hour >= 12) {
        timeCheckEl.innerHTML = "PM";
    } else if (hour == 12 && min == 0) {
        timeCheckEl.innerHTML = "NN";
    } else if (hour == 0 && min == 0) {
        timeCheckEl.innerHTML = "MN";
    }

    time.innerHTML = (hour % 12 || 12) + ":" + min + ":" + sec;
    date.innerHTML = now.toLocaleDateString();
}

function togglePassword() {
    const passwordEl = document.getElementById("passwordEl");

    if (passwordEl.type === "password") {
        passwordEl.type = "text";
    } else {
        passwordEl.type = "password";
    }
}
