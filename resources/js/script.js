const time = document.getElementById("currentTime");
const date = document.getElementById("currentDate");
const timeCheckEl = document.getElementById("checkTime");
const toggle = document.getElementById("togglePass");
const passShow = document.getElementById("passShow");
const passHide = document.getElementById("passHide");
const passInput = document.getElementById("passInput");

window.onload = updateScreen; //load update screen

//update screen every 1 second
function updateScreen() {
    console.log('Hi');

    if (toggle) {
        toggle.addEventListener('click', togglePassword);
    }

    if (!time || !date || !timeCheckEl)
        return;

    updateTime();

    setInterval(updateTime, 1000);
}

function updateTime() {
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

    switch (passInput.type) {
        case 'password':
            passHide.style.setProperty('display', 'none');
            passShow.style.removeProperty('display');
            passInput.type = 'text';
            break;
        case 'text':
            passHide.style.removeProperty('display');
            passShow.style.setProperty('display', 'none');
            passInput.type = 'password';
            break;
    }
}
