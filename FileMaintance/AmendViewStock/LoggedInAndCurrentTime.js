//Calls the set time function every second in order to update the time
window.setInterval(function(){
  setTime();
}, 100);

function setTime() {
	
	var label = document.getElementById("currentTime"); 										//Get the label that will store the time
	var date = new Date();																		//Instanciate a new date object
	var time; 																					//String which will hold the current time
	var secs = date.getSeconds();
	var mins = date.getMinutes();
	var hours = date.getHours();
	
	if (secs < 10) {
		secs = "0" + secs;
	}
	
	if (mins < 10) {
		mins = "0" + mins;
	}
	
	if (hours < 10) {
		hours = "0" + hours;
	}
	time = "Time: " + hours + ":" + mins + ":" + secs;
	label.innerHTML = time;																		//Set the inner html to the current time
}
