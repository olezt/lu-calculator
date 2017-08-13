function countDei() { 
	var formKw = document.getElementById('formKw').value;
	lunaTalk(300, 4);
//	document.getElementById('results').innerHTML = formKw;
	document.getElementById('results').style.display = "block";
	return false;
};

function lunaTalk(delay, times){
	setIntervalX(function () {
		$("#lunaUp").toggleClass('talkUp');
		$("#lunaDown").toggleClass('talkDown');
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