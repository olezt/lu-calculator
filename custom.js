function countDei() { 
	var formKw = document.getElementById('formKw').value;
    console.log("counting dei "+formKw);
	lunaTalk("50px", 300, 5);
	return false;
};

function lunaTalk(lunaMargin, delay, times){
	var tempLunaMargin = lunaMargin;
	setIntervalX(function () {
		if(tempLunaMargin=="0px"){
			tempLunaMargin = lunaMargin;
		}else{
			tempLunaMargin = "0px";
		}
		document.getElementById("lunaDown").style.marginTop = tempLunaMargin;
	}, delay, times);
}

function setIntervalX(callback, delay, repetitions) {
    var x = 0;
    var intervalID = window.setInterval(function () {

       callback();

       if (++x === repetitions) {
           window.clearInterval(intervalID);
       }
    }, delay);
};