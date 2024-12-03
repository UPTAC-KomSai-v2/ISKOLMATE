let time = document.getElementById("currentTime");
let date = document.getElementById("currentDate");
let timeCheckEl = document.getElementById("checkTime");
let checkAnnouncementsEl = document.getElementById("checkAnnouncements");

let announcementNum = 1; //Placeholder only for testing announcement popup

window.onload = updateScreen; //load update screen

//update screen every 1 second
function updateScreen(){ 
  setInterval(() => {
    updateTime();
    updateAnnouncement();
  }, 1000);
}

function updateAnnouncement() {
  if(announcementNum > 0) {
    checkAnnouncementsEl.removeAttribute("hidden");
  }
  else {
    checkAnnouncementsEl.setAttribute("hidden");
  }
}

function updateTime(){
    let now = new Date();
    let hour = now.getHours();
    let min = now.getMinutes();
    let sec = now.getSeconds();

    if(now.getMinutes() < 10){
      min = "0" + min;
    }
    
    if(now.getSeconds() < 10){
      sec = "0" + sec;
    }
  
    if(hour < 12) {
      timeCheckEl.innerHTML = "AM";
    }
    else if(hour > 12) {
      timeCheckEl.innerHTML = "PM";
    }
    else if(hour == 12) {
      timeCheckEl.innerHTML = "NN";
    }
    else {
      timeCheckEl.innerHTML = "MN";
    }

    time.innerHTML = (hour % 12 || 12) + ":" + min + ":" + sec;
    date.innerHTML = now.toLocaleDateString();
}
