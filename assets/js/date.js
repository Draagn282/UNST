var date = new Date();
var currentDate = date.toISOString().slice(0, 10);
var currentTime = date.getHours() + ":" + date.getMinutes();

var date2 = new Date();
var currentDate2 = date2.toISOString().slice(0, 10);

document.getElementById("currentDate").value = currentDate;
document.getElementById("currentDate2").value = currentDate;
