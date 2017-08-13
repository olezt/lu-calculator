function countDei() { 
	var formKw = document.getElementById('formKw').value;
    console.log("counting dei "+formKw);
	lunaTalk(300, 4);
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